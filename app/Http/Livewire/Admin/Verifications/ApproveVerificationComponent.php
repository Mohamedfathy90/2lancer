<?php

namespace App\Http\Livewire\Admin\Verifications;

use App\Models\User;
use Livewire\Component;
use Twilio\Rest\Client;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\VerificationCenter;
use Illuminate\Validation\ValidationException;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Notifications\User\Everyone\VerificationApproved;


class ApproveVerificationComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $verification ;
    public $document_id ;
    
    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
    
        // Get verification
        $verification = VerificationCenter::where('id', $id)->where('status', 'pending')->firstOrFail();
    
        // Set comment
        $this->verification = $verification;
    }
    
      
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_approve_files'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.verifications.approve-verification')->extends('livewire.admin.layout.app')->section('content');
    }

    public function verify(){
        
       $existing_user = User::where('verification_document_id' , $this->document_id)->first();
       
       if($existing_user){
        
        throw ValidationException::withMessages(['document_id' => 
        'user already existing with same document ID '.'('.$existing_user->email.')']);
       }

       else{
         
        // Get user
         $user         = User::where('id', $this->verification->user_id)->firstOrFail();

         // Update user status
         $user->status = 'verified';
         $user->verification_document_id = $this->document_id ;
         $user->save();
 
         // Send notification
         $user->notify( (new VerificationApproved)->locale(config('app.locale')) );

         // Update verification status
         $this->verification->status      = 'verified';
         $this->verification->verified_at = now();
         $this->verification->save();
 
         // Send notification
         notification([
             'text'    => 't_ur_account_has_verified',
             'action'  => url('account/verification'),
             'user_id' => $user->id
         ]);
 
         // Success
         $this->notification([
             'title'       => __('messages.t_success'),
             'description' => __('messages.t_toast_operation_success'),
             'icon'        => 'success'
         ]);
       }

        try{
        // send whatsapp message
        if($user->phone){
            $account_sid = getenv("TWILIO_ACCOUNT_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_service_sid = getenv("TWILIO_SERVICE_SID");
            $twilioWhatsAppNumber = getenv("TWILIO_WHATSAPP_NUMBER");
            $template_sid = "HXd100307a95728fe208a218a71753e306";
            $recipientNumber = "whatsapp:+".$user->phone;
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($recipientNumber, 
                          [
                               "contentSid" => $template_sid,
                               "from" => $twilio_service_sid
                           ]
               );
            }
            }catch (\Twilio\Exceptions\TwilioException $th){
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => $th->getMessage(),
                    'icon'        => 'error'
                ]);
            }
    }
}

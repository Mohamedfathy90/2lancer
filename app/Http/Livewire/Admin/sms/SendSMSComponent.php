<?php

namespace App\Http\Livewire\Admin\sms;

use App\Models\User;
use Livewire\Component;
use App\Models\SmsMessage;
use WireUi\Traits\Actions;
use App\Models\SettingsSms;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use App\Http\Validators\Admin\sms\SendValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SendSMSComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $options = [];
    public $user ;
    public $message_body;
    
    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount()
    {
        $users = User::all();
            foreach($users as $key=>$user){
             $this->options[$key]=['text'=>$user->username , 'value'=>$user->id];
            }
    }
    
    
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_send_sms'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        
        return view('livewire.admin.sms.send-sms-component')->extends('livewire.admin.layout.app')->section('content');
    }


     /**
     *  send message
     *
     * @return void
     */
    public function send()
    {
        
        // Validate form
        SendValidator::validate($this);
        $receiver = User::where('id',$this->user)->first();
        $message = $this->message_body;  
        $settings = SettingsSms::where('id',1)->get()[0];
        $headers = ['Authorization' => 'App '.$settings->api_key,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'];

        $body = [
            "messages" => [
                  [
                     "destinations" => [
                        [
                           "to" => $receiver->phone
                        ] 
                     ], 
                     "from" => "2Lancer", 
                     "text" => $message 
                  ] 
               ] 
         ]; 

        try {
            $response = HTTP::withHeaders($headers)->withBody(json_encode($body))->post(($settings->base_url.'/sms/2/text/advanced'));
            
            if ($response->Status() == 200) {
                
                // add message to database
                SmsMessage::create([
                    'to_id' => $this->user , 
                    'body'  => $message
                ]);
                
                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_toast_operation_success'),
                    'icon'        => 'success'
                ]);
            }
            else {  
                $response->throw();
            }
        }
        catch(RequestException $e) {
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
                ]);
        }
    
    
    }
}

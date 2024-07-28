<?php

namespace App\Http\Livewire\Admin\Conversations;

use Livewire\Component;
use App\Models\ChMessage;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ViewConversationComponent extends Component
{
 
    use SEOToolsTrait, Actions;
    
    public $user1_id ;
    public $user2_id ;

    public function mount($user1_id,$user2_id){
    $this->user1_id = $user1_id ;
    $this->user2_id = $user2_id ;
   }
      
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_view_conversation'), true) );
         $this->seo()->setDescription( settings('seo')->description );
  
         return view('livewire.admin.conversations.view-conversation-component', ['messages'=>$this->messages
            ])->extends('livewire.admin.layout.app')->section('content');
        
    }

    
      /**
     * Get list of conversations
     *
     * @return object
     */
    public function getMessagesProperty(){
        return ChMessage::where([ ['to_id',$this->user1_id] , ['from_id',$this->user2_id] ])
        ->orWhere ([ ['to_id',$this->user2_id] , ['from_id',$this->user1_id] ])
        ->oldest()
        ->get();
    }

     /**
     * Confirm delete conversation
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
                
            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_msg') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => $id,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }    
    }

    /**
     * Delete conversation
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
            
            // Get message
            $message = ChMessage::where('id', $id)->firstOrFail();
            
            if ($message->attachment) {
                
                // Decode attachment
                $attachment   = json_decode($message->attachment);

                // Get path to this file
                $path         = config('chatify.attachments.folder') . '/' . $attachment->new_name;

                // Check if file exists
                if (Storage::disk(config('chatify.storage_disk_name'))->exists($path)) {
                    
                    // Delete
                    Storage::disk(config('chatify.storage_disk_name'))->delete($path);

                }

            }

            // Delete message
            $message->delete();
            
            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        }
}

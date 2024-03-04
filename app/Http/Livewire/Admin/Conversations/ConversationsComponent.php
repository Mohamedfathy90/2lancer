<?php

namespace App\Http\Livewire\Admin\Conversations;

use Livewire\Component;
use App\Models\ChMessage;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ConversationsComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_conversations'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.conversations.conversations', [
            'conversations' => $this->conversations
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of conversations
     *
     * @return object
     */
    public function getConversationsProperty()
    {
        
        $keys=[];
        $conversations = ChMessage::whereHas('from')
        ->whereHas('to')
        ->with(['to', 'from'])
        ->groupBy('from_id','to_id')
        ->latest()
        ->paginate(42); 
        for($i=0;$i<count($conversations);$i++){
                for($k=$i+1;$k<count($conversations);$k++){
                    if($conversations[$i]->to_id == $conversations[$k]->from_id && $conversations[$i]->from_id == $conversations[$k]->to_id){
                        $keys[]=$k;
                    }
                }
        }

        if($keys){
        foreach($keys as $key){
            unset($conversations[$key]);
        }       
        }
     
        
        return($conversations);
       
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
            
            // Get conversation members 
            $message = ChMessage::where('id', $id)->firstOrFail();
            $user1_id = $message->to->id ;
            $user2_id = $message->from->id ;
            
            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_conv') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => [$user1_id,$user2_id],
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
    public function delete($user1_id , $user2_id)
    {
            
            // Get conversation messages
             $conversation_messages = ChMessage::where([ ['to_id',$user1_id] , ['from_id',$user2_id] ])
                                                            ->orWhere ([ ['to_id',$user2_id] , ['from_id',$user1_id] ])
                                                            ->get();
            
            foreach($conversation_messages as $message){
            // Check if message has attachment
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
            }
            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

       
    }
    
}

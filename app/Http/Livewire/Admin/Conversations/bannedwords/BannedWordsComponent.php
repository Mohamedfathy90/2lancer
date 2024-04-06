<?php

namespace App\Http\Livewire\Admin\Conversations\BannedWords;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ChBannedWords;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BannedWordsComponent extends Component
{
    
    use WithPagination, SEOToolsTrait, Actions;
    public function render()
    {
             // Seo
             $this->seo()->setTitle( setSeoTitle(__('messages.t_banned_words'), true) );
             $this->seo()->setDescription( settings('seo')->description );
     
             return view('livewire..admin.conversations.bannedwords.bannedwords',['words'=>$this->words])->extends('livewire.admin.layout.app')->section('content');

    }

    
    /**
     * Get list of categories
     *
     * @return object
     */
    public function getWordsProperty()
    {
        return ChBannedWords::orderByDesc('id')->paginate(42);
    }



     /**
     * Delete category
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get word
        $word = ChBannedWords::where('id', $id)->firstOrFail();
        
        // Delete word
        $word->delete();
        

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
}

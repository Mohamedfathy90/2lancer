<?php

namespace App\Http\Livewire\Admin\Conversations\BannedWords\Options;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ChBannedWords;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class EditComponent extends Component
{

    use  SEOToolsTrait, Actions;

    public $word;
    public $banned_word;
 

    public function mount($id)
    {
        // Get word
        $this->banned_word = ChBannedWords::where('id', $id)->firstOrFail();
        
        // Set word
        $this->word = $this->banned_word->word;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_banned_word'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.conversations.bannedwords.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update category
     *
     * @return void
     */
    public function update()
    {
        try {

            // Update word
            $this->banned_word->word            = $this->word;
            $this->banned_word->save();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}
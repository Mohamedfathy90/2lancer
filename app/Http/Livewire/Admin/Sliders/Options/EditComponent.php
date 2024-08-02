<?php

namespace App\Http\Livewire\Admin\Sliders\Options;

use App\Models\Slider;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Categories\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    
    use WithFileUploads, SEOToolsTrait, Actions;
    
    public $image;
    public $url;
    public $slider;


    public function mount($id)
    {
        // Get category
        $slider = Slider::where('id', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'url'         => $slider->image_url,
        ]);

        // Set category
        $this->slider = $slider;
    }
    
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_slider'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.sliders.options.edit-component')->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Update category
     *
     * @return void
     */
    public function update()
    {
        try {

            // Upload slider image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)
                                        ->deleteById($this->slider->image_id)
                                        ->folder('sliders')
                                        ->handle();
            } else {
                $image_id = $this->slider->image_id;
            }

            // Update slider
            $this->slider->image_url     = $this->url;
            $this->slider->image_id    = $image_id;
            $this->slider->save();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

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

<?php

namespace App\Http\Livewire\Admin\Sliders\Options;

use App\Models\Slider;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    
    use WithFileUploads, SEOToolsTrait, Actions;

    public $url;
    public $image;

    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_add_slider'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.sliders.options.create-component')->extends('livewire.admin.layout.app')->section('content');
    }

       /**
     * Create new category
     *
     * @return void
     */
    public function create()
    {
        try {

            $this->validate([
                'image'       => 'required|image|mimes:jpg,jpeg,png',
            ]);
            
            
            $image_id = ImageUploader::make($this->image)->folder('sliders')->handle();
             

            // Save slider
            $slider              = new Slider();
            $slider->image_url   = $this->url;
            $slider->image_id    = $image_id;
            $slider->save();

            // Reset form
            $this->reset();

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
                'description' => $e->getMessage(),
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

<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Schema;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SliderComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_sliders'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.sliders.slider-component', [
            'sliders' => $this->sliders
        ])->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Get list of categories
     *
     * @return object
     */
    public function getSlidersProperty()
    {
        return Slider::orderByDesc('id')->get();
    }

     /**
     * Delete slider
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get category
        $slider = Slider::where('id', $id)->firstOrFail();

        // Disable foreign key check
        Schema::disableForeignKeyConstraints(); 
        
         // delete slider image
         if ($slider->image) {
            deleteModelFile($slider->image);
        }
        
        // Delete slider
        $slider->delete();
        
        // enable foreign key check
        Schema::enableForeignKeyConstraints();
        
        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
}

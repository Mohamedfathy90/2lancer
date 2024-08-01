<?php

namespace App\Http\Livewire\Admin\Settings;


use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsFirstDiscount;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class FirstDiscountComponent extends Component
{

    use SEOToolsTrait , Actions ;

    public $enable_first_discount;
    public $discount_percentage;

    
        /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('first-discount');
    
        // Fill default settings
        $this->fill([
            'enable_first_discount'               => $settings->is_enabled ? 1 : 0,
            'discount_percentage'                 => $settings->discount_percentage,
            
        ]);
    }
    
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_first_discount_settings'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.settings.first-discount-component')->extends('livewire.admin.layout.app')->section('content');
    }

         /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {
            
            // Get settings
            $settings = settings('first-discount');

            // Update settings
            SettingsFirstDiscount::first()->update([
                'is_enabled'                          => $this->enable_first_discount,
                'discount_percentage'                 => $this->discount_percentage ,
                
            ]);

            // Update cache
            settings('first-discount', true);

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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
}

<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsCashback;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CashbackComponent extends Component
{
    
    use SEOToolsTrait , Actions ;
    
    public $enable_cashback;
    public $cashback_percentage;

        /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('cashback');
        
        // Fill default settings
        $this->fill([
            'enable_cashback'               => $settings->is_enabled ? 1 : 0,
            'cashback_percentage'           => $settings->cashback_percentage,
            
        ]);
    }
    
    
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_cashback_settings'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.settings.cashback-component')->extends('livewire.admin.layout.app')->section('content');
    }

     /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {
            
            // Validate form
            // AppearanceValidator::validate($this);

            // Get settings
            $settings = settings('cashback');

            // Update settings
            SettingsCashback::first()->update([
                'is_enabled'                          => $this->enable_cashback,
                'cashback_percentage'                 => $this->cashback_percentage ,
                
            ]);

            // Update cache
            settings('cashback', true);

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

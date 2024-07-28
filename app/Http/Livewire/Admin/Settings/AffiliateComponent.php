<?php

namespace App\Http\Livewire\admin\settings;

use Livewire\Component;
use App\Models\SettingsAffiliate;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AffiliateComponent extends Component
{
    
    use SEOToolsTrait , Actions ;
    
    public $enable_affiliate;
    public $expiry_months;
    public $profit_percentage;
    
    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('affiliate');
        
        // Fill default settings
        $this->fill([
            'enable_affiliate'               => $settings->is_enabled ? 1 : 0,
            'profit_percentage'              => $settings->profit_percentage,
            'expiry_months'                  => $settings->expiry_months,
        ]);
    }
    
    
    public function render()
    {      
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_affiliate_settings'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        
        return view('livewire.admin.settings.affiliate-component')->extends('livewire.admin.layout.app')->section('content');
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
            $settings = settings('affiliate');

            // Update settings
            SettingsAffiliate::first()->update([
                'is_enabled'                          => $this->enable_affiliate,
                'expiry_months'                       => $this->expiry_months,
                'profit_percentage'                   => $this->profit_percentage ,
                
            ]);

            // Update cache
            settings('affiliate', true);

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

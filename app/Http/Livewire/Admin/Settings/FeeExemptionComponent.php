<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsFeeExemption;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class FeeExemptionComponent extends Component
{

    use SEOToolsTrait , Actions ;

    public $enable_fee_exemption;
    public $gigs_number;


            /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('fee-exemption');
    
        // Fill default settings
        $this->fill([
            'enable_fee_exemption'                => $settings->is_enabled ? 1 : 0,
            'gigs_number'                         => $settings->gigs_number,
            
        ]);
    }

    public function render()
    {
       // Seo
       $this->seo()->setTitle( setSeoTitle(__('messages.t_fee_exemption_settings'), true) );
       $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.settings.fee-exemption-component')->extends('livewire.admin.layout.app')->section('content');
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
            $settings = settings('fee-exemption');

            // Update settings
            SettingsFeeExemption::first()->update([
                'is_enabled'                  => $this->enable_fee_exemption,
                'gigs_number'                 => $this->gigs_number ,
                
            ]);

            // Update cache
            settings('fee-exemption', true);

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

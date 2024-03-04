<?php

namespace App\Http\Livewire\Admin\sms;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsSms;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Settingscomponent extends Component
{
    
    use SEOToolsTrait, Actions;
    
    public $api_key ;
    public $base_url ;
    public $settings ;
    
    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $this->settings = SettingsSms::where('id',1)->get()[0];
        
        // Fill default settings
        $this->fill([
            'api_key'              => $this->settings->api_key,
            'base_url'             => $this->settings->base_url,
        ]);
    }
    
    
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_sms_settings'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        
        
        return view('livewire.admin.sms.settingscomponent')->extends('livewire.admin.layout.app')->section('content');
    }


     /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {
            
            // Update settings
            SettingsSms::first()->update([
                'api_key'                       => $this->api_key,
                'base_url'                      => $this->base_url ,
                
            ]);

          
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

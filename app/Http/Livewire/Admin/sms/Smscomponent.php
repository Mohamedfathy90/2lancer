<?php

namespace App\Http\Livewire\Admin\sms;

use App\Models\User;
use Livewire\Component;
use App\Models\SmsMessage;
use WireUi\Traits\Actions;
use App\Models\SettingsSms;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use App\Http\Validators\Admin\sms\SendValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Smscomponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $options = [];
    public $user ;
    public $message_body;
    

    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_sms_messages'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        
        return view('livewire.admin.sms.smscomponent',['messages'=>SmsMessage::all()])->extends('livewire.admin.layout.app')->section('content');
    }


}

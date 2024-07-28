<?php

namespace App\Http\Validators\Admin\sms;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SendValidator
{
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {  
        
            // Set rules
            $rules    = [
                'user'         => ['required'],
                'message_body'      => ['required'],
            ];

            // Set errors messages
            $messages = [
                'user.required'     => __('messages.t_validator_required'),
                'message_body.required'     => __('messages.t_validator_required'),
            ];

            // Set data to validate
            $data     = [
                'user'         => $request->user,
                'message_body'      => $request->message_body,
            ];

            // Validate data
            Validator::make($data, $rules,$messages)->validate();

            // Reset validation
            $request->resetValidation();

        
    }

}

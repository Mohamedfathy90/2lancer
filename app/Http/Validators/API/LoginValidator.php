<?php

namespace App\Http\Validators\API;

use App\Rules\UsernameRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class LoginValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {    
        try {

         // Set rules
         $rules    = [
            'email'    => 'required|max:60|email',
            'password' => 'required|max:60'
        ];

        // Set errors messages
        $messages = [
            'email.required'    => __('messages.t_validator_required'),
            'email.email'       => __('messages.t_validator_email'),
            'email.max'         => __('messages.t_validator_max', ['max' => 60]),
            'password.required' => __('messages.t_validator_required'),
            'password.max'      => __('messages.t_validator_max', ['max' => 60]),
        ];

        // Set data to validate
        $data     = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        // Validate data
        $validator = Validator::make($data, $rules, $messages);
        return ($validator);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

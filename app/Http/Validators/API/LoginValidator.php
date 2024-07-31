<?php

namespace App\Http\Validators\API;

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
            $validation = Validator::make($data, $rules, $messages);

            return $validation ;


        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

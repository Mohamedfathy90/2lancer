<?php

namespace App\Http\Validators\Admin\Registered_admins;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class EditValidator
{
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request,$admin)
    {  
        
            // Set rules
            $rules    = [
                'username'     => ['required','max:60',Rule::unique('admins')->ignore($admin->id)],
                'email'        => ['required','max:60',Rule::unique('admins')->ignore($admin->id)],
                'role'         => 'required|exists:roles,name',
            ];

            // Set errors messages
            $messages = [
                'username.required'     => __('messages.t_validator_required'),
                'username.max'          => __('messages.t_validator_max', ['max' => 60]),
                'username.unique'       => __('messages.t_validator_unique'),
                'email.required'        => __('messages.t_validator_required'),
                'email.max'             => __('messages.t_validator_max', ['max' => 60]),
                'email.unique'          => __('messages.t_validator_unique'),
                'role.required'         => __('messages.t_validator_required'),
                'role.exists'           => __('messages.t_validator_exists'),
            ];

            // Set data to validate
            $data     = [
                'username'     => $request->username,
                'email'        => $request->email,
                'role'         => $request->role,
            
            ];

            // Validate data
            Validator::make($data, $rules,$messages)->validate();

            // Reset validation
            $request->resetValidation();

        
    }

}

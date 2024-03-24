<?php

namespace App\Http\Validators\API;

use App\Rules\UsernameRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SetupValidator
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
            'username' => ['required', 'max:60', 'min:3', Rule::unique('users')->ignore($request->user_id), new UsernameRule()],
            'email'    => ['required', 'max:60', 'min:6', Rule::unique('users')->ignore($request->user_id)],
            'fullname' => 'required|max:60',
            'country'  => 'nullable|exists:countries,id',
            'city'     => 'nullable|max:60',
            'phone'    => 'required|numeric',
        ];

        // Set errors messages
        $messages = [
            'username.required' => __('messages.t_validator_required'),
            'username.max'      => __('messages.t_validator_max', ['max' => 60]),
            'username.min'      => __('messages.t_validator_min', ['min' => 3]),
            'username.unique'   => __('messages.t_validator_unique'),
            'email.required'    => __('messages.t_validator_required'),
            'email.max'         => __('messages.t_validator_max', ['max' => 60]),
            'email.min'         => __('messages.t_validator_min', ['min' => 6]),
            'email.unique'      => __('messages.t_validator_unique'),
            'fullname.required'      => __('messages.t_validator_required'),
            'fullname.max'      => __('messages.t_validator_max', ['max' => 60]),
            'country.exists'    => __('messages.t_validator_exists'),
            'city.max'          => __('messages.t_validator_max', ['max' => 60]),
            'timezone.max'      => __('messages.t_validator_max', ['max' => 60]),
            'timezone.required' => __('messages.t_validator_required'),
            'phone.required'        => __('messages.t_validator_required'),
            'phone.numeric'         => __('messages.t_validator_numeric'),

        ];

        // Set data to validate
        $data     = [
            'email'    => $request->email,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'country'  => $request->country,
            'city'     => $request->city,
            'phone'    => $request->phone,
        ];

        // Validate data
        Validator::make($data, $rules, $messages)->validate();


        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

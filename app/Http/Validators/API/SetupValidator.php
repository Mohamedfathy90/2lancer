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
            'username'     => ['required', 'max:60', 'min:3', Rule::unique('users')->ignore($request->user_id), new UsernameRule()],
            'email'        => ['required', 'max:60', 'min:6', Rule::unique('users')->ignore($request->user_id)],
            'fullname'     => 'required|max:60',
            'country'      => 'required|exists:countries,id',
            'city'         => 'nullable|max:60',
            'phone'        => 'required|numeric',
            'timezone'     => 'required' ,
            'description'  => 'required' ,
        ];

        // Set errors messages
        $messages = [
            'username.required'      => __('username is required'),
            'username.max'           => __('messages.t_validator_max', ['max' => 60]),
            'username.min'           => __('messages.t_validator_min', ['min' => 3]),
            'username.unique'        => __('username is already taken'),
            'email.required'         => __('Email address is required'),
            'email.max'              => __('messages.t_validator_max', ['max' => 60]),
            'email.min'              => __('messages.t_validator_min', ['min' => 6]),
            'email.unique'           => __('Email address is already taken'),
            'fullname.required'      => __('Fullname is required'),
            'fullname.max'           => __('messages.t_validator_max', ['max' => 60]),
            'country.exists'         => __('messages.t_validator_exists'),
            'city.max'               => __('messages.t_validator_max', ['max' => 60]),
            'timezone.max'           => __('messages.t_validator_max', ['max' => 60]),
            'timezone.required'      => __('Timezone is required'),
            'phone.required'         => __('Phone Number is required'),
            'phone.numeric'          => __('Phone Number should be numeric value'),

        ];

        // Set data to validate
        $data     = [
            'email'          => $request->email,
            'username'       => $request->username,
            'fullname'       => $request->fullname,
            'country'        => $request->country,
            'city'           => $request->city,
            'phone'          => $request->phone,
            'timezone'       => $request->timezone,
            'description'    => $request->description,
        ];

        // Validate data
        $validator = Validator::make($data, $rules, $messages);
        return($validator);


        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

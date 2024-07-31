<?php

namespace App\Http\Validators\API;

use Illuminate\Support\Facades\Validator;
use App\Rules\UsernameRule;
use Illuminate\Validation\Rule;

class CreateValidator
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
                'username'     => ['required','max:60','min:3',Rule::unique('users')->ignore($request->user_id), new UsernameRule()],
                'email'        => ['required','max:60','rfc','dns','filter','spoof', Rule::unique('users')->ignore($request->user_id)],
                'fullname'     => 'required|max:60|min:3',
                'country'      => 'required|exists:countries,id',
                'city'         => 'nullable|max:60',
                'timezone'     => 'required|max:60',
                'description'  => 'required|max:1500',
                'phone'        => 'required|numeric',
            ];

            // Set errors messages
            $messages = [
                'username.required'     => __('messages.t_validator_required'),
                'username.min'          => __('messages.t_validator_min', ['min' => 3]),
                'username.max'          => __('messages.t_validator_max', ['max' => 60]),
                'username.unique'       => __('messages.t_validator_unique'),
                'email.required'        => __('messages.t_validator_required'),
                'email.max'             => __('messages.t_validator_max', ['max' => 60]),
                'email.unique'          => __('messages.t_validator_unique'),
                'fullname.required'     => __('messages.t_validator_required'),
                'fullname.max'          => __('messages.t_validator_max', ['max' => 60]),
                'fullname.min'          => __('messages.t_validator_min', ['min' => 3]),
                'country.required'      => __('messages.t_validator_required'),
                'country.exists'        => __('messages.t_validator_exists'),
                'city.max'              => __('messages.t_validator_max', ['max' => 60]),
                'timezone.max'          => __('messages.t_validator_max', ['max' => 60]),
                'timezone.required'     => __('messages.t_validator_required'),
                'description.required' => __('messages.t_validator_required'),
                'description.max'      => __('messages.t_validator_max', ['max' => 1500]),
                'phone.required'       => __('messages.t_validator_required'),
            ];

            // Set data to validate
            $data     = [
                'username'     => $request->username,
                'email'        => $request->email,
                'country'      => $request->country,
                'fullname'     => $request->fullname,
                'description'  => $request->description,
                'phone'        => $request->phone,
                'city'         => $request->city,
                'timezone'     => $request->timezone,
                
            ];

            // Validate data
            $Validator = Validator::make($data, $rules, $messages);

            return $Validator ;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

<?php

namespace App\Http\Validators\Admin\Permissions;

use Illuminate\Support\Facades\Validator;

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
                'name'  => ['required','unique:permissions,name']
            ];

            // Set data to validate
            $data     = [
                'name' => $request->name
            ];

            // Validate data
            Validator::make($data, $rules)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

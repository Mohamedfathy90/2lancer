<?php

namespace App\Http\Validators\API;

use Illuminate\Support\Facades\Validator;

class GigValidator
{
    
    /**
     * Validate all form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {
            
            // Get publish settings
            $settings          = settings('publish');

            // Get maximum image size
            $max_image_size    = $settings->max_image_size * 1024;

            // Set rules
            $rules    = [
                'title'                    => 'required|max:100',
                'category'                 => 'required|exists:categories,id',
                'subcategory'              => 'required|exists:subcategories,id',
                'description'              => 'required',
                'tags'                     => 'required|array|min:1|max:' . settings('publish')->max_tags,
                'tags.*'                   => 'required|max:20',
                'price'                    => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'delivery_time'            => 'required|in:0,1,2,3,4,5,6,7,14,21,30',
                'upgrades'                 => 'nullable|array',
                'upgrades.*.price'         => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'upgrades.*.title'         => 'required|max:100',
                'upgrades.*.extra_days'    => 'required|in:0,1,2,3,4,5,6,7,14,21,30',
                'thumbnail'                => "required|image|mimes:jpg,jpeg,png,PNG,JPEG|max:$max_image_size",
                'gig_images.*'             => "image|mimes:jpeg,jpg,png,PNG,JPEG|max:$max_image_size",
                'requirements'             => 'required|array|min:1',
                'requirements.*.question'  => 'required|max:500',
                'requirements.*.type'      => 'required|in:text,choice,file',
                'requirements.*.options'   => 'required_if:add_requirement.type,choice|array',
                'requirements.options.*'   => 'required_if:add_requirement.type,choice|max:100',
            ];

            // Set inputs
            $inputs   = [
                'title'           => $request->title,
                'category'        => $request->category_id,
                'subcategory'     => $request->subcategory_id,
                'description'     => $request->description,
                'tags'            => $request->tags,
                'price'           => $request->price,
                'delivery_time'   => $request->delivery_time,
                'upgrades'        => $request->upgrades,
                'thumbnail'       => $request->thumbnail,
                'gig_images'      => $request->gig_images,
                'requirements'    => $request->requirements,
                
            ];

            // Set messages
            $messages = [
                'thumbnail.required'             => __('messages.t_validator_required'),
                'thumbnail.image'                => __('messages.t_validator_image'),
                'thumbnail.mimes'                => __('messages.t_validator_mimes'),
                'gig_images.required'            => __('messages.t_validator_required'),
                'gig_images.array'               => __('messages.t_validator_array'),
                'gig_images.max'                 => __('messages.t_validator_max_array', ['max' => $max_images]),
                'title.required'                 => __('messages.t_validator_required'),
                'title.max'                      => __('messages.t_validator_max', ['max' => 100]),
                'category.required'              => __('messages.t_validator_required'),
                'category.exists'                => __('messages.t_validator_exists'),
                'subcategory.required'           => __('messages.t_validator_required'),
                'subcategory.exists'             => __('messages.t_validator_exists'),
                'description.required'           => __('messages.t_validator_required'),
                'tags.required'                  => __('messages.t_validator_required'),
                'tags.array'                     => __('messages.t_validator_array'),
                'tags.min'                       => __('messages.t_validator_min_array', ['min' => 1]),
                'tags.max'                       => __('messages.t_validator_max_array', ['max' => settings('publish')->max_tags]),
                'tags.*.required'                => __('messages.t_validator_required'),
                'tags.*.max'                     => __('messages.t_validator_max', ['max' => 20]),
                'price.required'                 => __('messages.t_validator_required'),
                'price.regex'                    => __('messages.t_validator_regex'),
                'price.max'                      => __('messages.t_validator_max', ['max' => 10]),
                'delivery_time.required'         => __('messages.t_validator_required'),
                'delivery_time.in'               => __('messages.t_validator_in'),
                'upgrades.array'                 => __('messages.t_validator_array'),
                'upgrades.*.price.required'      => __('messages.t_validator_required'),
                'upgrades.*.price.regex'         => __('messages.t_validator_regex'),
                'upgrades.*.price.max'           => __('messages.t_validator_max', ['max' => 10]),
                'upgrades.*.title.required'      => __('messages.t_validator_required'),
                'upgrades.*.title.max'           => __('messages.t_validator_max', ['max' => 100]),
                'upgrades.*.extra_days.required' => __('messages.t_validator_required'),
                'upgrades.*.extra_days.in'       => __('messages.t_validator_in'),
                'requirements.required'          => __('messages.t_validator_required'),
                'requirements.array'             => __('messages.t_validator_array'),
                'requirements.min'               => __('messages.t_validator_min_array', ['min' => 1])
            ];

            // Validate data
            $validator = Validator::make($inputs, $rules, $messages);

            // Reset validation
            return $validator ;

        } catch (\Throwable $th) {
            throw $th;
        }
    }


}

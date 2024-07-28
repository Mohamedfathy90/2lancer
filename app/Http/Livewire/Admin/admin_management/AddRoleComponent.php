<?php

namespace App\Http\Livewire\Admin\admin_management;
use Livewire\Component;
use WireUi\Traits\Actions;

use Spatie\Permission\Models\Role;
use App\Http\Validators\Admin\Roles\CreateValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AddRoleComponent extends Component
{
    
    use SEOToolsTrait, Actions;
    
    public $name ;
    
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_role'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        
        return view('livewire.admin.admin_management.add-role-component', [
        ])->extends('livewire.admin.layout.app')->section('content');;
    }


     /**
     * Create new role
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);
        
            // Save role
            $role                  = new Role();
            $role->name            = $this->name;
            $role->save();

            // Reset form
            $this->reset();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
}

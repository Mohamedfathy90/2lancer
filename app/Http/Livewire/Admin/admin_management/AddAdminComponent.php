<?php

namespace App\Http\Livewire\Admin\admin_management;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Registered_admins\CreateValidator;

class AddAdminComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $options = [];
    public $role ;
    public $password ;
    public $username ;
    public $email ;
    
    
    public function mount(){
        $roles = Role::all();
        foreach($roles as $key=>$role){
         $this->options[$key]=['text'=>$role->name , 'value'=>$role->name];
        }
    }
    
    
    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_add_admin'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.admin_management.add-admin-component', [
        
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new user
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // create new admin
            $admin                    = new Admin();
            $admin->uid               = uid();
            $admin->username          = $this->username;
            $admin->email             = $this->email;
            $admin->password          = Hash::make($this->password);        
            $admin->save();

            // Assign Role
            $admin->assignRole($this->role);

            // Reset form
            $this->reset();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_account_has_been_created'),
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











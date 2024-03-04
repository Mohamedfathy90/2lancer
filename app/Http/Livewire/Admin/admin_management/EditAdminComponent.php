<?php

namespace App\Http\Livewire\Admin\admin_management;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Spatie\Permission\Models\Role;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Registered_admins\EditValidator;

class EditAdminComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $admin ;
    public $username ;
    public $email ;
    public $role ;
    public $options = [];
    
    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get Admin
        $admin = Admin::where('id', $id)->firstOrFail();
        
        $roles = Role::all();
            foreach($roles as $key=>$role){
             $this->options[$key]=['text'=>$role->name , 'value'=>$role->name];
            }
        
        // Fill form
        $this->fill([
            'username'=> $admin->username ,
            'email'   => $admin->email ,
            'role'    => $admin->getRoleNames()[0] ,
        ]);

        // Set admin
        $this->admin = $admin;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_admin'), true) );
         $this->seo()->setDescription( settings('seo')->description );
 
         return view('livewire.admin.admin_management.edit-admin-component', [
         ])->extends('livewire.admin.layout.app')->section('content');
        
    }


    /**
     * Edit admin
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this,$this->admin);

            // Update admin
            $this->admin->update([
                'username'          => $this->username,
                'email'             => $this->email,
            ]);

            // Assign Role
            $this->admin->syncRoles($this->role);
            
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









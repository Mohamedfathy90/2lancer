<?php

namespace App\Http\Livewire\Admin\admin_management;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Roles\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditRoleComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $role ;
    public $name ;
    
    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get role
        $role = Role::where('id', $id)->firstOrFail();
        
        // Fill form
        $this->fill([
            'name'=> $role->name ,
        ]);

        // Set user
        $this->role = $role;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_role'), true) );
         $this->seo()->setDescription( settings('seo')->description );
 
         return view('livewire.admin.admin_management.edit-role-component', [
         ])->extends('livewire.admin.layout.app')->section('content');
        
    }


    /**
     * Edit role
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Update role
            $this->role->update([
                'name'              => $this->name,
            ]);

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

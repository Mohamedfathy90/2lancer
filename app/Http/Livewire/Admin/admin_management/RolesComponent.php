<?php

namespace App\Http\Livewire\Admin\admin_management;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class RolesComponent extends Component
{
    
    use SEOToolsTrait, Actions;
    
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_roles_permissions'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.admin_management.roles-component', [
            'roles' => Role::with('permissions')->get()
        ])->extends('livewire.admin.layout.app')->section('content');
        
    }


 /**
     * Confirm delete
     *
     * @param string $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
            
            // Get role
            $role = Role::where('id', $id)->firstOrFail();

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_role') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'   => __('messages.t_delete'),
                    'method'  => 'delete',
                    'params'  => $role->id,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {

            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }    
    }

      /**
     * Delete role
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        
        // Disable foreign key check
        Schema::disableForeignKeyConstraints();

        // Delete category
        
        DB::table("roles")->where('id', $id)->delete();
        
        // Disable foreign key check
        Schema::enableForeignKeyConstraints();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}

<?php

namespace App\Http\Livewire\Admin\admin_management;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class RegisteredAdminsComponent extends Component
{
    
    use SEOToolsTrait, Actions;
    
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_registered_admins'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.admin_management.registered-admins-component', [
            'admins' => Admin::all()
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
            
            // Get admin
            $admin = Admin::where('id', $id)->firstOrFail();

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_admin') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'   => __('messages.t_delete'),
                    'method'  => 'delete',
                    'params'  => $admin->id,
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
        
        DB::table("admins")->where('id', $id)->delete();
        
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














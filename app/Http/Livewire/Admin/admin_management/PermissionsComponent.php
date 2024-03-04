<?php

namespace App\Http\Livewire\Admin\admin_management;

use Livewire\Component;
use WireUi\Traits\Actions;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class PermissionsComponent extends Component
{
    use SEOToolsTrait , Actions;
    
    public $role;
    public $ids=[];
    
    
    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        
        $role_permissions = [];
        // Get role
        $role = Role::where('id', $id)->firstOrFail();

        // Get active role permissions
        $permissions = $role->permissions()->get();
        foreach($permissions as $permission){
        $role_permissions[]=$permission->id;
        }
    
        // Set checkboxes 
        foreach($role_permissions as $role_permission){
            $this->ids[$role_permission] = true ;
        }
    
        // Set role
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_role_permissions'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        return view('livewire.admin.admin_management.permissions-component', [
            'permissions' => Permission::all()
        ])->extends('livewire.admin.layout.app')->section('content');
    }


     /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
      
            $permissions_ids=[];
            foreach($this->ids as $key=>$id){
                if($this->ids[$key]=='true' ){
                    $permissions_ids[]=$key;
                }
            }
            
            //get selected permissions
             $selected_permissions = Permission::whereIn('id',$permissions_ids)->get();
            
            // Update role permissions
            $this->role->syncPermissions($selected_permissions);

          
            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);
    }

     public function select_all(){
        $this->ids=[];
        $all_permissions = Permission::all();
        foreach($all_permissions as $permission){
            $this->ids[$permission->id] = true;
        } 
    }

    public function unselect_all(){
        $this->ids=[];
        $all_permissions = Permission::all();
        foreach($all_permissions as $permission){
            $this->ids[$permission->id] = false;
        } 
       
    }
}

<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use App\Models\BannedIp;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Notifications\User\Everyone\AccountActivated;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class UsersComponent extends Component
{
    public $q = '';

    use WithPagination, SEOToolsTrait, Actions;

   
    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_users'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.users', [
            'users' => $this->users
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of users
     *
     * @return object
     */
    public function getUsersProperty()
    {
        if ($this->q == '')  {
            return User::latest()->paginate(42);
        }
        else{
            return User::where('username', 'LIKE', "%{$this->q}%") 
                        ->orWhere('email', 'LIKE', "%{$this->q}%") 
                        ->latest()
                        ->paginate(42);
        }
        
    }


    /**
     * Ban selected user
     *
     * @param integer $id
     * @return void
     */
    public function ban($id)
    {
        // Update user
        User::where('id', $id)->where('status', '!=', 'banned')->update([
            'status' => 'banned'
        ]);

        // add user ip to banned IPs 
        $ip_address = User::where('id',$id)->first()->ip_address ;
        BannedIp::updateOrCreate(['ip_address' =>  $ip_address]);

        
        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_user_has_been_banned_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Delete user
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete user
        User::where('id', $id)->delete();
    }


    /**
     * Activate account
     *
     * @param integer $id
     * @return void
     */
    public function activate($id)
    {
        // Get user
        $user = User::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Send notification to user
        $user->notify( (new AccountActivated)->locale(config('app.locale')) );

        // Activate account
        $user->status = "active";
        $user->save();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_user_has_been_activated_success'),
            'icon'        => 'success'
        ]);
    }


    
}

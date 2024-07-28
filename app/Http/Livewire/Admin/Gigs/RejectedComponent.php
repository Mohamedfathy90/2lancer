<?php

namespace App\Http\Livewire\Admin\Gigs;

use App\Models\Gig;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class RejectedComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;
    
    protected $gigs ;
    
    
    public function render()
    {
         // Seo
         $this->seo()->setTitle( setSeoTitle(__('messages.t_rejected_gigs'), true) );
         $this->seo()->setDescription( settings('seo')->description );
        
         $this->gigs = Gig::where('status','rejected')->paginate(42);
        
        return view('livewire.admin.gigs.rejected-component',['gigs'=>$this->gigs])->extends('livewire.admin.layout.app')->section('content');
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
            
            // Get gig
            $gig = Gig::where('uid', $id)->firstOrFail();

            // Check of gig has pending orders
            if ($gig->total_orders_in_queue()) {
                
                // You can't delete this
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cant_delete_this_gig_pending_orders'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_gig') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => $gig->id,
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
     * Delete gig
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get gig
        $gig = Gig::where('id', $id)->firstOrFail();

        // Check of gig has pending orders
        if ($gig->total_orders_in_queue()) {
            
            // You can't delete this
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_u_cant_delete_this_gig_pending_orders'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Delete it
        $gig->delete();

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_gig_deleted_successfull'),
            'icon'        => 'success'
        ]);
    }


}




<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\OrderInvoice;
use Livewire\WithPagination;
use App\Models\AffiliateTransaction;
use App\Models\AffiliateRegisteration;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class InvoicesComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_invoices'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.invoices.invoices', [
            'invoices' => $this->invoices
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of invoices
     *
     * @return object
     */
    public function getInvoicesProperty()
    {
        return OrderInvoice::latest()->paginate(42);
    }


    /**
     * Invoice paid
     *
     * @param integer $id
     * @return void
     */
    public function paid($id)
    {
        // Get invoice
        $invoice = OrderInvoice::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Get Buyer
        $buyer = User::where('email', $invoice->email)->firstOrFail();
        
        
        // Update buyer balance used for purchases
        $invoice->order->buyer()->update([
            'balance_purchases' => $invoice->order->total_value
        ]);

        
        // Get Order 
        $order = $invoice->order;
        
        
        // Get order items
        $items = $invoice->order->items;

        // Loop throug items in order
        foreach ($items as $item) {
            
            // Get gig
            $gig = $item->gig;

            // Update seller pending balance
            $gig->owner()->update([
                'balance_pending' => $gig->owner->balance_pending + $item->profit_value
            ]);

            // Increment orders in queue
            $gig->increment('orders_in_queue');

            // Order item placed successfully
            // Let's notify the seller about new order
            $gig->owner->notify( (new PendingOrder($item))->locale(config('app.locale')) );
            
            // Send notification
            notification([
                'text'    => 't_u_received_new_order_seller',
                'action'  => url('seller/orders/details', $item->uid),
                'user_id' => $item->owner_id
            ]);

        }

        // Mark invoice as paid
        $invoice->status = 'paid';
        $invoice->save();

         // Let's notify the buyer about new order
         $buyer->notify( (new OrderPlaced($order))->locale(config('app.locale')) );
         
            
         if(settings('affiliate')->is_enabled)
         {
            //check for affiliate registeration and check if expired 
            $affiliate_register =AffiliateRegisteration::where('user_id', $buyer->id)
                                                    ->where('expires_at', '>' , now())
                                                    ->first() ;
            
            if($affiliate_register){

            // get referral user
            $referral_user = User::where('id', $affiliate_register->referral_id)->first();

            // calculate referral earning
            $referral_earning =  (convertToNumber(settings('affiliate')->profit_percentage)/100)*convertToNumber($invoice->order->total_value) ;

            // add credit to referral wallet
            $referral_balance = convertToNumber($referral_user->balance_available) + $referral_earning;
            $referral_user->update(['balance_available'=>$referral_balance]);

            // create new affiliate transaction
            $affiliate_transaction = new AffiliateTransaction();
            $affiliate_transaction->user_id = $buyer->id ;
            $affiliate_transaction->referral_id = $referral_user->id ;
            $affiliate_transaction->order_id = $invoice->order->id ;
            $affiliate_transaction->referral_earning = $referral_earning ;
            $affiliate_transaction->save();
            }
        }
        
         // Send notification to buyer
        notification([
            'text'    => 't_ur_payment_has_been_received_offline',
            'action'  => url('account/orders'),
            'user_id' => $invoice->order->buyer_id
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}

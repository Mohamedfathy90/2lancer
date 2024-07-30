<?php

namespace App\Http\Controllers\Api;

use App\Models\Gig;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use Illuminate\Support\Str;
use App\Models\OrderInvoice;
use Illuminate\Http\Request;
use App\Models\DepositWebhook;
use App\Models\CheckoutWebhook;
use App\Models\OrderItemUpgrade;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;
use App\Models\AffiliateTransaction;
use App\Models\AffiliateRegisteration;
use App\Models\AutomaticPaymentGateway;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Buyer\DepositOrder;
use App\Notifications\User\Seller\PendingOrder;

class CmiController extends Controller
{
    public $gateway = "cmi";
    public $status  = "paid";
    public $settings;


    public function redirect(){
        return view('api.cmi_redirect');
    }
    
    public function failed(Request $request)
    {
        
         // Get order id
         $order_id       = $request->get('ReturnOid'); 
        
         // Check if deposit callback
         if (Str::startsWith($order_id, "DD")) {
                        
           
            // Get saved webhook data in our database
            DepositWebhook::where('payment_id', $order_id)
                            ->where('payment_method', $this->gateway)
                            ->where('status', 'pending')
                            ->delete();
        }
        
        if (Str::startsWith($order_id, "GG")) {
            
            // Get saved webhook data in our database
            CheckoutWebhook::where('payment_id', $external_reference)
            ->where('payment_method', $this->gateway)
            ->where('status', 'pending')
            ->delete();
        }

        // Redirecting
        return redirect()->route('api.payment.failed');

        
        
    }

    public function callback(Request $request){
        if($request->get('ProcReturnCode') === '00'){
            return response()->json(['ACTION' => 'POSTAUTH']);
        } 
    }
    
 
    /**
     * Payment gateway callback
     *
     * @param Request $request
     * @return mixed
     */
    public function success(Request $request)
    {
                    
            // Get payment gateway settings
            $settings       = AutomaticPaymentGateway::where('slug', $this->gateway)
                                                     ->where('is_active', true)
                                                     ->firstOrFail();

            // Set settings
            $this->settings = $settings;

            // Get transaction id
            $transaction_id = $request->get('TransId');

            // Get order id
            $order_id       = $request->get('ReturnOid');

           
            // Check webhook event
            if ($request->get('ProcReturnCode') === '00') {
                
                if (Str::startsWith($order_id, "DD")) {  
                // Get saved webhook data in our database
                $data = DepositWebhook::where('payment_id', $order_id)
                ->where('payment_method', $this->gateway)
                ->where('status', 'pending')
                ->firstOrFail();
                
                // Handle deposit callback
                $this->deposit($data->user_id, $data->amount, $order_id);

                // Delete saved webhook data in our database
                $data->delete();

                // Redirecting
                return redirect()->route('api.payment.success');
                
                }

                // Check if checkout callback
                if (Str::startsWith($order_id, "GG")) {
                    $data = CheckoutWebhook::where('payment_id', $order_id)
                    ->where('payment_method', $this->gateway)
                    ->where('status', 'pending')
                    ->firstOrFail();

                    // Get cart
                    $cart = $data->data['cart'];

                    // Get user
                    $user = User::where('id', $data->data['buyer_id'])->firstOrFail();

                    // Handle deposit callback
                    $this->checkout($cart, $user, $order_id);

                    // Delete saved webhook data in our database
                    $data->delete();

                    // Redirecting
                    return redirect()->route('api.payment.success');

                }    
                
            }

            // In case failed payment
             return redirect()->route('api.payment.failed');

    }

    /**
     * Deposit funds into user's account
     *
     * @param int $user_id
     * @param mixed $amount
     * @param string $payment_id
     * @return void
     */
    private function deposit($user_id, $amount, $payment_id)
    {
        try {
            
            // Set amount
            $amount                  = convertToNumber($amount);
            
            // Calculate fee from this amount
            $fee                     = convertToNumber($this->fee('deposit', $amount)); 

            // Make transaction
            $deposit                 = new DepositTransaction();
            $deposit->user_id        = $user_id;
            $deposit->transaction_id = $payment_id;
            $deposit->payment_method = $this->gateway;
            $deposit->amount_total   = $amount;
            $deposit->amount_fee     = $fee;
            $deposit->amount_net     = $amount - $fee;
            $deposit->currency       = $this->settings->currency;
            $deposit->exchange_rate  = $this->settings->exchange_rate;
            $deposit->status         = $this->status;
            $deposit->ip_address     = request()->ip();
            $deposit->save();

            // Get user
            $user                    = User::where('id', $user_id)->firstOrFail();

            // Add funds
            $user->balance_available = convertToNumber($user->balance_available) + convertToNumber($deposit->amount_net);
            $user->save();

              // Send notification
              notification([
                'text'    => 't_u_deposited_your_wallet',
                'action'  => url('account/deposit/history'),
                'user_id' => $user->id ,
                'params'  => ['amount' => $deposit->amount_net]
            ]);

             // Order placed successfully
            // Let's notify the user about new deposit
            $user->notify( (new DepositOrder())->locale(config('app.locale')) );
 

        } catch (\Throwable $th) {

            // Error
            throw $th;

        }
    }


    /**
     * Checkout
     *
     * @param array $cart
     * @param object $user
     * @param string $payment_id
     * @return void
     */
    private function checkout($cart, $user, $payment_id)
    {
        try {

                // Check if item has upgrades
                $upgrades  = isset($cart['upgrades_uids']) && is_array($cart['upgrades_uids']) && count($cart['upgrades_uids']) ? $cart['upgrades_uids'] : [];

                // Get commission settings
                $commission_settings   = settings('commission');
                
                // Get user billing address
                $billing_info          = $user->billing;

                // Set unique id for this order
                $uid                   = uid();

                // Get buyer id
                $buyer_id              = $user->id;

                // Save order
                $order                 = new Order();
                $order->uid            = $uid;
                $order->buyer_id       = $buyer_id;
                $order->total_value    = $cart['total'];
                $order->subtotal_value = $cart['subtotal'];
                $order->taxes_value    = $cart['tax'];
                $order->save();
             
                    // Get gig
                    $gig = Gig::where('uid', $cart['gig_uid'])->with('owner')->active()->first();

                    // Check if gig exists
                    if ($gig) {
                        
                        // Calculate commission first
                        if ($commission_settings->commission_from === 'orders') {
                            
                            // Check commission type
                            if ($commission_settings->commission_type === 'percentage') {
                                
                                // Calculate commission
                                $commission = convertToNumber($commission_settings->commission_value) * $item_total / 100;
        
                            } else {
        
                                // Fixed amount
                                $commission = convertToNumber($commission_settings->commission_value);
        
                            }

                        } else {
                            
                            // No commission
                            $commission = 0;

                        }

                        // Save order item
                        $order_item                         = new OrderItem();
                        $order_item->uid                    = uid();
                        $order_item->order_id               = $order->id;
                        $order_item->gig_id                 = $gig->id;
                        $order_item->owner_id               = $gig->user_id;
                        $order_item->quantity               = 1;
                        $order_item->has_upgrades           = count($upgrades) ? true : false;
                        $order_item->total_value            = $cart['total'];
                        $order_item->profit_value           = $cart['total'] - $commission;
                        $order_item->commission_value       = $commission;
                        $order_item->save();

                        // Loop through upgrades again
                        foreach ($upgrades as $uid) {
                           
                                // Get upgrade
                                $upgrade = GigUpgrade::where('uid', $uid)->where('gig_id', $gig->id)->first();
        
                                // Check if upgrade exists
                                if ($upgrade) {
                                    
                                    // Save item upgrade
                                    $order_item_upgrade             = new OrderItemUpgrade();
                                    $order_item_upgrade->item_id    = $order_item->id;
                                    $order_item_upgrade->title      = $upgrade->title;
                                    $order_item_upgrade->price      = $upgrade->price;
                                    $order_item_upgrade->extra_days = $upgrade->extra_days;
                                    $order_item_upgrade->save();
        
                                }

                            }
                            
                        

                        // Update seller pending balance
                        $gig->owner()->update([
                            'balance_pending' => convertToNumber($gig->owner->balance_pending) + convertToNumber($order_item->profit_value)
                        ]);

                        // Increment orders in queue
                        $gig->increment('orders_in_queue');

                        // Order item placed successfully
                        // Let's notify the seller about new order
                        $gig->owner->notify( (new PendingOrder($order_item))->locale(config('app.locale')) );

                        // Check user's level
                        check_user_level($buyer_id);

                        // Send notification
                        notification([
                            'text'    => 't_u_received_new_order_seller',
                            'action'  => url('seller/orders/details', $order_item->uid),
                            'user_id' => $order_item->owner_id
                        ]);
                    }
                

                // Save invoice
                $invoice                 = new OrderInvoice();
                $invoice->order_id       = $order->id;
                $invoice->payment_method = 'cmi';
                $invoice->payment_id     = $payment_id;
                $invoice->firstname      = $billing_info->firstname ?? $user->username;
                $invoice->lastname       = $billing_info->lastname ?? $user->username;
                $invoice->email          = $user->email;
                $invoice->company        = !empty($billing_info->company) ? clean($billing_info->company) : null;
                $invoice->address        = !empty($billing_info->address) ? clean($billing_info->address) : "NA";
                $invoice->status         = 'paid';
                $invoice->save();

                // Update balance
                $user->update([
                    'balance_purchases' => convertToNumber($user->balance_purchases) + convertToNumber($cart['total'])
                ]);

                // Now let's notify the buyer that his order has been placed
                $user->notify( (new OrderPlaced($order))->locale(config('app.locale')) );

                if(settings('affiliate')->is_enabled)
                {
                    //check for affiliate registeration and check if expired 
                    $affiliate_register = AffiliateRegisteration::where('user_id', $buyer_id)
                                                                ->where('expires_at','>',now())
                                                                ->first() ;
                    if($affiliate_register){
                    
                    // get referral user
                    $referral_user = User::where('id', $affiliate_register->referral_id)->first();
                    
                    // calculate referral earning
                    $referral_earning = (convertToNumber(settings('affiliate')->profit_percentage)/100)*$cart['total'] ;
                    
                    // add credit to referral wallet
                    $referral_balance = convertToNumber($referral_user->balance_available) + $referral_earning;
                    $referral_user->update(['balance_available'=>$referral_balance]);
        
                    // create new affiliate transaction
                    $affiliate_transaction = new AffiliateTransaction();
                    $affiliate_transaction->user_id = $buyer_id ;
                    $affiliate_transaction->referral_id = $referral_user->id ;
                    $affiliate_transaction->order_id = $order->id ;
                    $affiliate_transaction->referral_earning = $referral_earning ;
                    $affiliate_transaction->save();
                }
                }
                
                 // cashback
                 if(settings('cashback')->is_enabled){
                
                    // calculate cashback earning
                    $cashback_earning = (convertToNumber(settings('cashback')->cashback_percentage)/100)*$cart['total'];
    
                    // Get user available credit
                    $available_balance = convertToNumber($user->balance_available);

                    // Get user cashbacks
                    $cashbacks_balance = convertToNumber($user->balance_cashbacks);
    
                    //add cashback earning to user wallet
                    $user->update([
                    'balance_cashbacks' => $cashbacks_balance + $cashback_earning ,
                    'balance_available' => $available_balance + $cashback_earning
                    ]);

                    // Send notification
                    notification([
                        'text'    => 't_new_cashback_balance',
                        'action'  => url('/'),
                        'user_id' => $buyer_id ,
                        'params'  => ['amount' => $cashback_earning ]
                    ]);
                }
                
                //send whatsapp message
                if($gig && $gig->owner->phone){
                    $account_sid = getenv("TWILIO_ACCOUNT_SID");
                    $auth_token = getenv("TWILIO_AUTH_TOKEN");
                    $twilio_service_sid = getenv("TWILIO_SERVICE_SID");
                    $twilioWhatsAppNumber = getenv("TWILIO_WHATSAPP_NUMBER");
                    $template_sid = "HX83e78d38c3da3dccfe0e633b7f6a7a60";
                    $recipientNumber = "whatsapp:+".$gig->owner->phone;
                    $client = new \Twilio\Rest\Client($account_sid, $auth_token);
                    $client->messages->create($recipientNumber, 
                                    [
                                        "contentSid" => $template_sid,
                                        "from" => $twilio_service_sid
                                    ]
                    );
                    }
            

                }catch (\Twilio\Exceptions\TwilioException $th){
                    
                 
            } catch (\Throwable $th) {
                
                // Error
                throw $th;

            }
        }


    /**
     * Calculate fee value
     *
     * @param string $type
     * @param mixed $amount
     * @return mixed
     */
    private function fee($type, $amount = null)
    {
        try {
            
            // Set amount for deposit
            $amount = convertToNumber($amount) * $this->settings?->exchange_rate / settings('currency')->exchange_rate;

            // Remove long decimal
            $amount = convertToNumber( number_format($amount, 2, '.', '') );

            // Check fee type
            switch ($type) {
    
                // Deposit
                case 'deposit':
    
                    // Get deposit fixed fee
                    if (isset($this->settings->fixed_fee['deposit'])) {
                        
                        // Set fixed fee
                        $fee_fixed = convertToNumber($this->settings->fixed_fee['deposit']);
    
                    } else {
    
                        // No fixed fee
                        $fee_fixed = 0;
    
                    }
    
                    // Get deposit percentage fee
                    if (isset($this->settings->percentage_fee['deposit'])) {
                        
                        // Set percentage fee
                        $fee_percentage = convertToNumber($this->settings->percentage_fee['deposit']);
    
                    } else {
    
                        // No percentage fee
                        $fee_percentage = 0;
    
                    }
    
                    // Calculate percentage of this amount 
                    $fee_percentage_amount = $this->exchange( $fee_percentage * $amount / 100, $this->settings->exchange_rate );

                    // Calculate exchange rate of this fixed fee
                    $fee_fixed_exchange    = $this->exchange( $fee_fixed,  $this->settings->exchange_rate);
                    
                    // Calculate fee value and visible text
                    if ($fee_fixed > 0 && $fee_percentage > 0) {
                        
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_percentage_amount) + convertToNumber($fee_fixed_exchange);
    
                    } else if (!$fee_fixed && $fee_percentage > 0) {
                        
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_percentage_amount);
    
                    } else if ($fee_fixed > 0 && !$fee_percentage) {
    
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_fixed_exchange);
                        
                    } else if (!$fee_percentage && !$fee_fixed) {
                        
                        // Calculate fee value
                        $fee_value = 0;
    
                    }
                    
                    // Return fee value
                    return number_format($fee_value, 2, '.', '');
    
                break;

                // Gigs
                case 'gigs':

                    // Get gigs fixed fee
                    if (isset($this->settings->fixed_fee['gigs'])) {
                        
                        // Set fixed fee
                        $fee_fixed = convertToNumber($this->settings->fixed_fee['gigs']);
    
                    } else {
    
                        // No fixed fee
                        $fee_fixed = 0;
    
                    }
    
                    // Get gigs percentage fee
                    if (isset($this->settings->percentage_fee['gigs'])) {
                        
                        // Set percentage fee
                        $fee_percentage = convertToNumber($this->settings->percentage_fee['gigs']);
    
                    } else {
    
                        // No percentage fee
                        $fee_percentage = 0;
    
                    }
    
                    // Calculate percentage of this amount 
                    $fee_percentage_amount = $this->exchange( $fee_percentage * $amount / 100, $this->settings->exchange_rate );

                    // Calculate exchange rate of this fixed fee
                    $fee_fixed_exchange    = $this->exchange( $fee_fixed,  $this->settings->exchange_rate);
    
                    // Calculate fee value and visible text
                    if ($fee_fixed > 0 && $fee_percentage > 0) {
                        
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_percentage_amount) + convertToNumber($fee_fixed_exchange);
    
                    } else if (!$fee_fixed && $fee_percentage > 0) {
                        
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_percentage_amount);
    
                    } else if ($fee_fixed > 0 && !$fee_percentage) {
    
                        // Calculate fee value
                        $fee_value = convertToNumber($fee_fixed_exchange);
                        
                    } else if (!$fee_percentage && !$fee_fixed) {
                        
                        // Calculate fee value
                        $fee_value = 0;
    
                    }
    
                    // Return fee value
                    return $fee_value;

                break;
    
            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return 0;

        }
    }


    /**
     * Calculate exchange rate
     *
     * @param mixed $amount
     * @param mixed $exchange_rate
     * @param boolean $formatted
     * @param string $currency
     * @return mixed
     */
    private function exchange($amount, $exchange_rate, $formatted = false, $currency = null)
    {
        try {

            // Convert amount to number
            $amount                = convertToNumber($amount);

            // Get currency settings
            $currency_settings     = settings('currency');

            // Get default currency exchange rate
            $default_exchange_rate = convertToNumber($currency_settings->exchange_rate);

            // Get exchanged amount
            $exchanged_amount      = convertToNumber( $amount *  $default_exchange_rate / $exchange_rate );

            // Check if we have to return a formatted value
            if ($formatted) {
                
                return money( $exchanged_amount, $currency, true )->format();

            }

            // Return max deposit
            return convertToNumber(number_format( $exchanged_amount, 2, '.', '' ));

        } catch (\Throwable $th) {

            // Something went wrong
            return $amount;

        }
    }

     /**
     * Send a notification to user
     *
     * @param string $type
     * @param object $user
     * @return void
     */
    private function notification($type, $user)
    {
        try {
            
            // Check notification type
            switch ($type) {

                // Deposit funds
                case 'deposit':
                    


                break;

                // Gig checkout
                case 'gig':
                    
                    

                break;

                // Project payment
                case 'project':
                    
                    

                break;

                // Bid payment
                case 'bid':
                    
                    

                break;

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return;

        }
    }


    public function paymentSuccess(){
        return view('api.cmi_success');
    }


    public function paymentFailed(){
        return view('api.cmi_failed');
    }
    
}

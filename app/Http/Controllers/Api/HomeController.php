<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use CMI\CmiClient;
use App\Models\Gig;
use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Order;
use App\Models\Refund;
use App\Models\Review;
use App\Models\Country;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\GigImage;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use App\Models\CustomOffer;
use App\Models\FileManager;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\OrderInvoice;
use Illuminate\Http\Request;
use App\Models\OrderItemWork;
use App\Models\DepositWebhook;
use App\Models\GigRequirement;
use App\Models\CheckoutWebhook;
use App\Models\OrderItemUpgrade;
use App\Models\UserAvailability;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;
use App\Models\AffiliateTransaction;
use App\Models\GigRequirementOption;
use App\Models\OrderItemRequirement;
use Illuminate\Support\Facades\Auth;
use App\Utils\Uploader\ImageUploader;
use App\Models\AffiliateRegisteration;
use App\Models\AutomaticPaymentGateway;
use App\Notifications\Admin\PendingGig;
use App\Http\Validators\API\GigValidator;
use App\Notifications\Admin\RefundDispute;
use App\Http\Validators\API\DeliverValidator;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use App\Notifications\User\Seller\RefundClosed;
use App\Notifications\User\Buyer\OrderDelivered;
use App\Notifications\User\Buyer\RefundAccepted;
use App\Notifications\User\Buyer\RefundDeclined;
use App\Notifications\User\Seller\RefundRequest;
use App\Notifications\User\Buyer\OrderItemInProgress;

class HomeController extends Controller
{
    
    // retrieve user data
    public function user_data(Request $request){
        $user = User::find(auth()->id());
        $response = $user ;
        return response ($user , 200 );
    }
    
    
    // retrieve all categories 
    public function categories(Request $request){
        $categories = Category::where('is_visible' , 1)->get();
        foreach($categories as $category){
            $image_file = $category->image;
            $icon_file = $category->icon;
            $image_path = ('/public/storage/'.$image_file->file_folder.'/'.$image_file->uid.'.'.$image_file->file_extension);
            $icon_path = ('/public/storage/'.$icon_file->file_folder.'/'.$icon_file->uid.'.'.$icon_file->file_extension);
            $category['image_path'] =$image_path ;
            $category['icon_path'] =$icon_path ;
        }
        $response = ['categories'=>$categories , 'message'=>'success'];
        return response ($response , 200);
    }

     // retrieve selecetd gigs (four random ones)
    public function selected_gigs (Request $request){
        $gigs = Gig::active()->inRandomOrder()->take(4)->get();
        foreach($gigs as $gig){
            // Check if gig already in favorite
        
            if(auth('sanctum')->id());
            $in_favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $gig->id)->first();
            if($in_favorite){
                $gig['in_favorite'] = true ;
            }else{
                $gig['in_favorite'] = false ;
            }
            
            $thumb_file = FileManager::where('id',$gig->image_thumb_id)->first();
            $image_medium_file = FileManager::where('id',$gig->image_medium_id)->first();
            $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
            $thumb_path = ('/public/storage/'.$thumb_file->file_folder.'/'.$thumb_file->uid.'.'.$thumb_file->file_extension);
            $image_medium_path = ('/public/storage/'.$image_medium_file->file_folder.'/'.$image_medium_file->uid.'.'.$image_medium_file->file_extension);
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $gig['thumb_path'] =$thumb_path ;
            $gig['image_medium_path'] =$image_medium_path ;
            $gig['image_large_path'] =$image_large_path ;
            $gig['user'] = User::find($gig->user_id);
            if($gig['user']->avatar_id){
                $user_avatar_file = FileManager::where('id',$gig['user']->avatar_id)->first();
                $gig['user']['user_avatar'] = ('/public/storage/'.$user_avatar_file->file_folder.'/'.$user_avatar_file->uid.'.'.$user_avatar_file->file_extension);
            }
            else{
                $gig['user']['user_avatar'] = null;
            }
            
          
                    
            $gig['reviews'] = $gig->reviews;
             }
            $response = ['gigs'=>$gigs , 'message'=>'success'];
            return response ($response , 200);
        
    }

    
    //retrieve favourite gigs 
    public function favourite_gigs(Request $request){
        $favourite_gigs =[];
        $user_favourites = Favorite::where('user_id' , auth()->id())->get();
        foreach($user_favourites as $favourite){
            $favourite_gigs[] = $favourite->gig ;
        }
            foreach($favourite_gigs as $gig){
                $thumb_file = FileManager::where('id',$gig->image_thumb_id)->first();
                $image_medium_file = FileManager::where('id',$gig->image_medium_id)->first();
                $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
                $thumb_path = ('/public/storage/'.$thumb_file->file_folder.'/'.$thumb_file->uid.'.'.$thumb_file->file_extension);
                $image_medium_path = ('/public/storage/'.$image_medium_file->file_folder.'/'.$image_medium_file->uid.'.'.$image_medium_file->file_extension);
                $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
                $gig['thumb_path'] =$thumb_path ;
                $gig['image_medium_path'] =$image_medium_path ;
                $gig['image_large_path'] =$image_large_path ;
                $gig['user'] = User::find($gig->user_id);
                if($gig['user']->avatar_id){
                    $user_avatar_file = FileManager::where('id',$gig['user']->avatar_id)->first();
                    $gig['user']['user_avatar'] = ('/public/storage/'.$user_avatar_file->file_folder.'/'.$user_avatar_file->uid.'.'.$user_avatar_file->file_extension);
                }
                else{
                    $gig['user']['user_avatar'] = null;
                }
                     
                $gig['reviews'] = $gig->reviews;
            }
        
        $response = ['favourite_gigs'=>$favourite_gigs , 'message'=>'success'];
        return response ($response , 200);
    }
    
 
    public function addToFavorite(Request $request)
    {
            // Check if gig already in favorite
            $in_favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $request->gig_id)->first();

            // Check if already exists
            if ($in_favorite) {
                $response = ['message'=>'Gig is already in Favorite List'];
                return response ($response , 200);
            }

            // Add to list
            Favorite::create([
                'gig_id'  => $request->gig_id,
                'user_id' => auth()->id()
            ]);

            $response = ['message'=>'Gig has been added to Favorite List'];

            return response ($response , 200);

    }
    
    
    public function removeFromFavorite(Request $request)
    {
            // Check if gig already in favorite
            $favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $request->gig_id)->first();

            // Check if already exists
            if ($favorite) {
                
                // Delete
                $favorite->delete();
                $response = ['message'=>'Gig has been removed from Favorite List'];
                return response ($response , 200);
            }
    }
    

    //retrieve top sellers 
    public function top_sellers(Request $request){
         // Get top sellers randomly
         $top_sellers =  User::where('account_type', 'seller')
         ->whereHas('sales')
         ->withCount('sales')
         ->orderBy('sales_count', 'desc')
         ->take(12)
         ->get();

         foreach($top_sellers as $top_seller){
            $top_seller['level'] = Level::where('id' , $top_seller->level_id)->first()->title;
            $avatar_file = FileManager::where('id' , $top_seller->avatar_id)->first();
            if($avatar_file){
            $image_path = ('/public/storage/'.$avatar_file->file_folder.'/'.$avatar_file->uid.'.'.$avatar_file->file_extension);
            $top_seller['avatar_link'] = $image_path ;
            }
            else{
            $top_seller['avatar_link'] = null ;  
            }
            $top_seller['rating']=$top_seller->rating();
            $top_seller['reviews']=$top_seller->reviews()->count();
         }

        $response = ['top_sellers'=>$top_sellers , 'message'=>'success'];
        return response ($response , 200);
    }

    // become a seller 
    public function become_seller(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $user->update(['account_type' => 'seller']);
        $avatar_file = FileManager::where('id' , $user->avatar_id)->first();
        if($avatar_file){
         $avatar_path = ('/public/storage/'.$avatar_file->file_folder.'/'.$avatar_file->uid.'.'.$avatar_file->file_extension);
        }
        else{
            $avatar_path = null ;
        }
        
        if($user->country_id)
            $country = Country::where('id',$user->country_id)->first()->name;               
            else
            $country ='N/A';
        
        $user_data = ($user->toArray());
        $user_data['user_avatar'] = $avatar_path ;
        $user_data['user_country'] = $country ;
                
        
        $response = ['user'=>$user_data , 'message'=>'success'];
        return response ($response , 200);
    }

    // retrieve user notifications 
    public function user_notifications(Request $request){
        $notifications = Notification::where('is_seen', false)->where('user_id',$request->user_id)->latest()->get();
        foreach($notifications as $notification){
            if ($notification->params){
                $notification['text_en'] =  __('messages.' . $notification->text, $notification->params) ;
            }
            else{
                $notification['text_en'] = __('messages.' . $notification->text) ;
            }
        }
        $response = ['notifications'=>$notifications , 'message'=>'success'];
        return response ($response , 200);
    }

    // retrieve all categories and subcategories
    public function all_categories(){
        $categories = Category::all();
        foreach($categories as $category){
            if($category->icon_id){
                $icon_file = FileManager::where('id' , $category->icon_id)->first();
                $category['icon_path'] = ('/public/storage/'.$icon_file->file_folder.'/'.$icon_file->uid.'.'.$icon_file->file_extension);
            }
            if($category->image_id){
                $image_file = FileManager::where('id' , $category->image_id)->first();
                $category['image_path'] = ('/public/storage/'.$image_file->file_folder.'/'.$image_file->uid.'.'.$image_file->file_extension);
            }
            $category['subcategories'] = Subcategory::where('parent_id',$category->id)->get();
        }
        $response = ['categories'=>$categories , 'message'=>'success'];
        return response ($response , 200);
    }

    // retrieve gigs by search 
    public function search_gigs(Request $request){
        if($request->has('category_id')){
            $gigs = Gig::where('category_id' , $request->category_id)->latest()->get();
        }
        elseif($request->has('subcategory_id')){
            $gigs = Gig::where('subcategory_id' , $request->subcategory_id)->latest()->get();
        }
        elseif($request->has('search_text')){
            $gigs = Gig::where('title','like','%'.$request->search_text.'%')
                    ->whereIn('status' , ['active','featured','boosted','trending'])
                    ->latest()->get();
        }
        
        foreach($gigs as $gig){
            $thumb_file = FileManager::where('id',$gig->image_thumb_id)->first();
            $image_medium_file = FileManager::where('id',$gig->image_medium_id)->first();
            $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
            $thumb_path = ('/public/storage/'.$thumb_file->file_folder.'/'.$thumb_file->uid.'.'.$thumb_file->file_extension);
            $image_medium_path = ('/public/storage/'.$image_medium_file->file_folder.'/'.$image_medium_file->uid.'.'.$image_medium_file->file_extension);
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $gig['thumb_path'] =$thumb_path ;
            $gig['image_medium_path'] =$image_medium_path ;
            $gig['image_large_path'] =$image_large_path ;
            $gig['user'] = User::find($gig->user_id);
            if($gig['user']->avatar_id){
                $user_avatar_file = FileManager::where('id',$gig['user']->avatar_id)->first();
                $gig['user']['user_avatar'] = ('/public/storage/'.$user_avatar_file->file_folder.'/'.$user_avatar_file->uid.'.'.$user_avatar_file->file_extension);
            }
            else{
                $gig['user']['user_avatar'] = null;
            }
                 
            $gig['reviews'] = $gig->reviews;
        }
           
        $response = ['gigs'=>$gigs , 'message'=>'success'];
        return response ($response , 200);
    }

    public function dashboard_details(){
        try {
            
            // Get user id
            $user_id = auth()->id();

            // Calculate total earnings
            $earnings_from_gigs = OrderItem::where('owner_id', $user_id)
                                                                ->where('is_finished', true)
                                                                ->where('status', 'delivered')
                                                                ->sum('profit_value');

            // Set total earnings
            $earnings = convertToNumber($earnings_from_gigs) ;
            
            // pending balance 
            $pending_balance = convertToNumber(auth()->user()->balance_pending);
            
            // Calculate total gigs
            $total_gigs = Gig::where('user_id', $user_id)->count();

            // Calculate completed orders
            $completed_orders  = OrderItem::where('owner_id', $user_id)
                                    ->where('status', 'delivered')
                                    ->where('is_finished', true)
                                    ->count();

            // Calculate pending orders
            $pending_orders     = OrderItem::where('owner_id', $user_id)
                                    ->where('status', 'pending')
                                    ->count();

            // Calculate order under progress
            $orders_under_progress  = OrderItem::where('owner_id', $user_id)
                                        ->where('status', 'proceeded')
                                        ->count();

            // Canceled orders
            $canceled_orders  = OrderItem::where('owner_id', $user_id)
                                        ->where('status', 'canceled')
                                        ->count();

            
            // Get latest orders
            $latest_orders = OrderItem::where('owner_id', $user_id)
                                            ->whereHas('gig', function($query) {
                                                return $query->whereHas('category');
                                            })
                                            ->whereHas('order.invoice')
                                            ->latest()
                                            ->take(8)
                                            ->get();

            foreach($latest_orders as $order){
                $image_large_file = FileManager::where('id',$order->gig->image_large_id)->first();
                $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
                $order['gig_image'] = $image_large_path;
            }

            $response = ['earnings'=>$earnings , 'pending_balance'=>$pending_balance , 'total_gigs'=>$total_gigs , 
                            'completed_orders'=>$completed_orders , 'pending_orders'=>$pending_orders , 
                            'pending_orders'=>$pending_orders , 'orders_under_progress'=>$orders_under_progress , 
                            'canceled_orders'=>$canceled_orders , 'latest_orders'=>$latest_orders , 'message'=>'success'
                        ];

            return response ($response , 200);

        

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function gig_details(Request $request){
        $gig = Gig::find($request->gig_id);
        $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
        $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
        $gig['image'] = $image_large_path;
        $gig_images = $gig->images;

        foreach($gig_images as $gig_image){
            $image_large_file = FileManager::where('id',$gig_image->img_large_id)->first();
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $gig_image['image_path'] = $image_large_path; 
        }
        
        if($gig->has_upgrades){
            $gig_upgrades = $gig->upgrades;
        }
        $gig_category = $gig->category;
        $gig_subcategory = $gig->subcategory;
        $gig_tags = $gig->tags ;
        $gig_rating = $gig->rating ;
        $gig['user'] = User::find($gig->user_id);
        if($gig['user']->avatar_id){
            $user_avatar_file = FileManager::where('id',$gig['user']->avatar_id)->first();
            $gig['user']['user_avatar'] = ('/public/storage/'.$user_avatar_file->file_folder.'/'.$user_avatar_file->uid.'.'.$user_avatar_file->file_extension);
        }
        else{
            $gig['user']['user_avatar'] = null;
        }

        $reviews =  Review::where('gig_id' , $gig->id)->get();
            foreach($reviews as $review){
                $review['user'] = User::find($review->user_id);
                if($review['user']->avatar_id){
                    $user_avatar_file = FileManager::where('id',$review['user']->avatar_id)->first();
                    $review['user']['user_avatar'] = ('/public/storage/'.$user_avatar_file->file_folder.'/'.$user_avatar_file->uid.'.'.$user_avatar_file->file_extension);
                }
            }
        $gig['gig_reviews'] = $reviews ;    
        
        $response = ['gig'=>$gig ];

        return response ($response , 200);
    
    }

    public function seller_orders(Request $request){
        // Get orders by this seller
        $orders_items = OrderItem::where('owner_id', auth()->id())
        ->whereHas('gig')
        ->whereHas('order.invoice')
        ->latest()->get();

        foreach($orders_items as $item){
            $main_order = Order::find($item->order_id);
            $gig = Gig::find($item->gig_id);
            if($gig){
            $item['title'] = $gig->title ;
            $item['category'] = Category::find($gig->category_id)->name ;
            $item['subcategory'] = Subcategory::find($gig->subcategory_id)->name ;
            $item['gig'] = $gig;
            $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $item['gig']['image'] = $image_large_path;
            $item['upgrades'] = OrderItemUpgrade::where('item_id',$item->id)->get();
            $item['requirements'] = GigRequirement::where('gig_id',$gig->id)->get();
            $refund = Refund::where('item_id' , $item->id)->first();
            $invoice = OrderInvoice::where('order_id' , $main_order->id)->first();
        
            if ($refund && $refund->status === 'pending')
                $item['status'] = 'Dispute Opened' ;
            elseif ($invoice && $invoice->status === 'pending')
                $item['status'] = 'Pending Payment' ;
            elseif ($item->status === 'delivered' && $item->is_finished)
                $item['status'] = 'Completed' ;
            
            else{
                switch($item->status){
                        //Pending 
                        case('pending'):
                        $item['status'] = 'Pending' ;
                        break;
                        
                        //Delivered 
                        case('delivered'):
                        $item['status'] = 'Delivered' ;
                        break;
                        
                        //Refunded 
                        case('refunded'):
                        $item['status'] = 'Refunded' ;
                        break;
                        
                        //Proceeded 
                        case('proceeded'):
                        $item['status'] = 'Proceeded' ;
                        break;
                        
                        //Cancelled 
                        case('cancelled'):
                        $item['status'] = 'Cancelled' ;
                        break;
                        }               
                }
                
            }
                $item['buyer']  = User::find($main_order->buyer_id)->username ;

                if ($item->expected_delivery_date){
                    $item['delivery_date'] = format_date($item->expected_delivery_date, config('carbon-formats.F_j,_Y_h_:_i_A')) ;
                }
                elseif (in_array($item->status, ['pending', 'proceeded']) && !$item->is_requirements_sent){
                    $item['delivery_date'] = 'waiting for requirements' ;
                }   
                
                else {
                    $item['delivery_date'] = '-' ;
                }
        }

        $response = ['orders'=>$orders_items];

        return response ($response , 200);
    
    }

    public function buyer_orders(Request $request){
        
        $orders = Order::where('buyer_id', auth()->id())->latest()->pluck('id');
        
        $order_items = OrderItem::whereIn('order_id' , $orders)->orderBy('placed_at', 'desc')->get();
            
            foreach($order_items as $item){
                
                $item['gig'] = Gig::where('id',$item->gig_id)->first(); 
                $image_large_file = FileManager::where('id',$item['gig']->image_large_id)->first();
                $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
                $item['gig']['image'] = $image_large_path;
                
                if ($item->refund && $item->refund->status === 'pending')
                $item['status'] = 'Dispute Opened' ;
                elseif ($item->order?->invoice && $item->order->invoice->status === 'pending')
                $item['status'] = 'Pending Payment' ;
                elseif ($item->status === 'delivered' && $item->is_finished)
                $item['status'] = 'Completed' ;
                else{
                    switch($item->status){
                            //Pending 
                            case('pending'):
                            $item['status'] = 'Pending' ;
                            break;
                            
                            //Delivered 
                            case('delivered'):
                            $item['status'] = 'Delivered' ;
                            break;
                            
                            //Refunded 
                            case('refunded'):
                            $item['status'] = 'Refunded' ;
                            break;
                            
                            //Proceeded 
                            case('proceeded'):
                            $item['status'] = 'Proceeded' ;
                            break;
                            
                            //Cancelled 
                            case('cancelled'):
                            $item['status'] = 'Cancelled' ;
                            break;
                            }               
                    }
            }    
            
        return response ($order_items , 200);
    }

    public function seller_gigs(Request $request){
         
        // Get gigs by this seller
         $gigs = Gig::where('user_id', auth()->id())->latest()->get();

         foreach($gigs as $gig) {
            $image_large_file = FileManager::where('id',$gig->image_large_id)->first();
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $gig['image'] = $image_large_path;
         }

         $response = ['gigs'=>$gigs ];

         return response ($gigs , 200);
    }


    public function create_gig(Request $request){
         
         // Validate Avatar 
         $validator = GigValidator::validate($request);
        
         if($validator->fails()){
            $error = $validator->errors()->first();
            $response = ['error'=>$error];
            return response($response , 401);
            }
        
    
        // Generate unique id for this gig
        $uid                  = uid();

        // Get title
        $title                = htmlspecialchars_decode(clean($request->title));

        // Generate unique slug for this gig
        $slug                 = substr( Str::slug($title), 0, 138 ) . '-' . $uid;

        // Get description
        $description          = clean($request->description);

        // Get price
        $price                = clean($request->price);

        // Get delivery time
        $delivery_time        = $request->delivery_time;

        // Get parent category
        $category_id          = $request->category_id;

        // Get subcategory
        $subcategory_id       = $request->subcategory_id;

        // Get gig status
        $status               = settings('publish')->auto_approve_gigs ? 'active' : 'pending';

        // Check if gig has upgrades
        $has_upgrades         = $request->upgrades  ? true : false;

        // Get gig preview image
        $preview              = $request->thumbnail;

        // Upload thumbnail image
        $image_thumb_id       = ImageUploader::make($preview)->resize(400)->folder('gigs/previews/small')->handle();

        // Upload medium image
        $image_medium_id      = ImageUploader::make($preview)->resize(800)->folder('gigs/previews/medium')->handle();

        // Upload large image
        $image_large_id       = ImageUploader::make($preview)->resize(1200)->folder('gigs/previews/large')->handle();
        
        // Save gig
        $gig                  = new Gig();
        $gig->uid             = $uid;
        $gig->user_id         = auth()->id();
        $gig->title           = $title;
        $gig->slug            = $slug;
        $gig->description     = $description;
        $gig->price           = $price;
        $gig->delivery_time   = $delivery_time;
        $gig->category_id     = $category_id;
        $gig->subcategory_id  = $subcategory_id;
        $gig->image_thumb_id  = $image_thumb_id;
        $gig->image_medium_id = $image_medium_id;
        $gig->image_large_id  = $image_large_id;
        $gig->status          = $status;
        $gig->has_upgrades    = $has_upgrades;
        $gig->save();
        
        // Save tags
        foreach ($request->tags as $tag) {
        $gig->tag($tag);
        }

        // Check if gig has upgrades
        if ($gig->has_upgrades) {
                
        // Loop through upgrades
        foreach ($request->upgrades as $upgrade) {
            
            // Save uprade
            GigUpgrade::create([
                'uid'        => uid(),
                'gig_id'     => $gig->id,
                'title'      => $upgrade['title'],
                'price'      => $upgrade['price'],
                'extra_days' => isset($upgrade['extra_days']) ? $upgrade['extra_days'] : 0,
            ]);
        }
    }

    // Check if gig has requirements
    if ($request->requirements) {
                
        // Loop through requirements
        foreach ($request->requirements as $req) {
            
            // Save requirement
            $requirement = GigRequirement::create([
                'gig_id'      => $gig->id,
                'question'    => clean($req['question']),
                'type'        => $req['type'],
                'is_required' => isset($req['is_required']) ? $req['is_required'] : false,
            ]);

            // Check if requirement multiple choices
            if ($req['type'] === 'choice') {
                
                // Loop through options
                foreach ($req['options'] as $option) {
                    
                    // Save option
                    GigRequirementOption::create([
                        'requirement_id' => $requirement->id,
                        'option'         => $option
                    ]);

                }

            }

        }

    }

            // Save gig images
            foreach ($request->gig_images as $image) {
                        
                // Upload small image
                $img_thumb_id  = ImageUploader::make($image)->resize(400)->folder('gigs/gallery/small')->handle();

                // Upload medium image
                $img_medium_id = ImageUploader::make($image)->resize(800)->folder('gigs/gallery/medium')->handle();

                // Upload large image
                $img_large_id  = ImageUploader::make($image)->resize(1200)->folder('gigs/gallery/large')->handle();

                // Save images
                GigImage::create([
                    'gig_id'        => $gig->id,
                    'img_thumb_id'  => $img_thumb_id,
                    'img_medium_id' => $img_medium_id,
                    'img_large_id'  => $img_large_id
                ]);

            }
            // Send notification to admin
            if ($gig->status === 'pending') {
                
                $gig->is_approved = false;

                Admin::first()->notify( (new PendingGig($gig))->locale(config('app.locale')) );

            } else {

                $gig->is_approved = true;

            }

            $response = ['message'=> 'gig has been created successfully !' ];

            return response ($response , 200);

    
    }

    public function delete_gig(Request $request)
    {
        // Get gig
        $gig = Gig::where('id', $request->gig_id)->firstOrFail();

        // Check of gig has pending orders
        if ($gig->total_orders_in_queue()) {
            
            $response = ['message'=> 'gig cannot be deleted , because it has pending orders' ];

            return response ($response , 200);

        }

        // Delete it
        $gig->delete();

        $response = ['message'=> 'gig has been deleted successfully'];

        return response ($response , 200);
    }

    
    public function deposit(Request $request){
        
        // Get amount
        $amount = $request->amount;

        // Check is amount is valid number
        // if (!is_int($amount) && !is_float($amount)) {
            
        //     // Error
        //    $response = ['message'=>'Invalid amount number'];

        //    return response ($response , 200);

        // }

        // Set maximum deposit amount
        $gateway = AutomaticPaymentGateway::where('slug','cmi')->first();
        
        $max_deposit_amount = $gateway->deposit_max_amount ;

        // Set minmum deposit amount
        $min_deposit_amount = $gateway->deposit_min_amount;
        
        // Check deposit amount (max/min)
        if ($amount < $min_deposit_amount || $amount > $max_deposit_amount) {
            
            // Error
            $response = ['message'=>"The minimum deposit amount is".$min_deposit_amount. "and maximum is :".$max_deposit_amount];

            return response ($response , 400);
        }

         // Generate payment id
         $payment_id      = "DD" . uid(17);

         //get user id 
         $user_id = auth()->id();
                       
         // Save webhook details to later response
          $this->deposit_webhook(['payment_id' => $payment_id, 'payment_method' => 'cmi' , 'amount' => $amount]);
        
          $response = ['redirect_url'=>'https://test2.mohamedfathy90.com/api/cmi/redirect?user_id='.$user_id.'&payment_id='.$payment_id.'&amount='.$amount];
          
          return response ($response , 200);
        
    }


    public function placeOrder (Request $request){
          
        $gig = Gig::find($request->gig_id);

        $show_wallet = false ;
        
        // Get seller availability
        $availability = UserAvailability::where('user_id', $gig->user_id)->first();

        // Check if seller available to receive orders
        if ($availability) {
        $response = __('messages.t_seller_wont_be_able_to_receive_orders_date_no_html', ['date' => format_date($availability->expected_available_date, config('carbon-formats.F_j,_Y'))]);
        return response ($response , 200);
        }

        // You can't add your own gigs
        if (auth()->check() && auth()->id() === $gig->user_id) {
        // Not in range
        $response = __('messages.t_u_cant_add_ur_own_gigs_to_shopping_cart') ;
        return response ($response , 200);
        }

        $taxes = $this->taxes($request->subtotal);
        
        $total = $request->subtotal + $taxes ;
        
        // Get user available credit
        $available_balance = convertToNumber(auth()->user()->balance_available);
       
        if($available_balance >= $total){
            $show_wallet = true ;
        }

        $response = [
            'tax'           => $taxes ,
            'show_wallet'   => $show_wallet
        ];
        
        return response ($response , 200);

    }

    
    public function buy_gig_wallet(Request $request){

        // Get commission settings
        $commission_settings   = settings('commission');
        
        // Get user billing address
        $billing_info          = auth()->user()->billing;

        // Set unique id for this order
        $uid                   = uid();

        // Get buyer id
        $buyer_id              = auth()->id();

        // Get Buyer
        $buyer = User::where('id', $buyer_id)->firstOrFail();

        // Get user available credit
        $available_balance = convertToNumber(auth()->user()->balance_available);

        // Save order
        $order                 = new Order();
        $order->uid            = $uid;
        $order->buyer_id       = $buyer_id;
        $order->total_value    = $request->total;
        $order->subtotal_value = $request->subtotal;
        $order->taxes_value    = $request->tax;
        $order->save();
            
            // Get gig
            $gig = Gig::where('uid', $request->gig_uid)->with('owner')->active()->first();
            
            // Check if gig exists
            if ($gig) {
                
                // Set gig upgrades
                $upgrades        = isset($request->upgrades_uids) && is_array($request->upgrades_uids) && count($request->upgrades_uids) ? $request->upgrades_uids : [];
                
                // Calculate commission first
                if ($commission_settings->commission_from === 'orders') {
            
                // Check commission type
                if ($commission_settings->commission_type === 'percentage') {
                    
                    // Calculate commission
                    $commission = convertToNumber($commission_settings->commission_value) * $request->subtotal / 100;

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
                $order_item->total_value            = $request->subtotal;
                $order_item->profit_value           = $request->subtotal - $commission;
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
                $invoice->payment_method = "wallet";
                $invoice->payment_id     = uid();
                $invoice->firstname      = $billing_info->firstname ?? auth()->user()->username;
                $invoice->lastname       = $billing_info->lastname ?? auth()->user()->username;
                $invoice->email          = auth()->user()->email;
                $invoice->company        = !empty($billing_info->company) ? clean($billing_info->company) : null;
                $invoice->address        = !empty($billing_info->address) ? clean($billing_info->address) : "NA";
                $invoice->status         = 'paid';
                $invoice->save();

                // Let's take money from buyer's wallet
                auth()->user()->update([
                    'balance_purchases' => convertToNumber(auth()->user()->balance_purchases) + convertToNumber($request->total),
                    'balance_available' => $available_balance - $request->total
                ]);

                // Check user level
                check_user_level();

                // Let's notify the buyer about new order
                $buyer->notify( (new OrderPlaced($order))->locale(config('app.locale')) );
        
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
                    $referral_earning = (convertToNumber(settings('affiliate')->profit_percentage)/100)*$request->total ;
                    
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
                    $cashback_earning = (convertToNumber(settings('cashback')->cashback_percentage)/100)*$request->total;
    
                    // Get user available credit
                    $available_balance = convertToNumber(auth()->user()->balance_available);

                    // Get user cashbacks
                    $cashbacks_balance = convertToNumber(auth()->user()->balance_cashbacks);
    
                    //add cashback earning to user wallet
                    auth()->user()->update([
                    'balance_cashbacks' => $cashbacks_balance + $cashback_earning ,
                    'balance_available' => $available_balance + $cashback_earning
                    ]);

                    // Send notification
                    notification([
                        'text'    => 't_new_cashback_balance',
                        'action'  => url('/'),
                        'user_id' => auth()->id() ,
                        'params'  => ['amount' => $cashback_earning ]
                    ]);
                }
                
                //send whatsapp message
                try{               
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
                    
                    return response ( __('messages.t_submit_ur_info_now_seller_start_order') , 200);

                }
                
                    return response ( __('messages.t_submit_ur_info_now_seller_start_order') , 200);

    }
    
        
    public function buy_gig_card(Request $request){
    
    // Generate payment id
    $payment_id      = "GG" . uid(17);
                            
    $cart = ($request->all());

    $amount = $request->total;
   
    // Save webhook details to later response
    $this->gig_webhook(['cart'=>$cart , 'payment_id' => $payment_id, 'payment_method' => 'cmi']);

    //get user id 
    $user_id = auth()->id();
    
    $response = ['redirect_url'=>'https://test2.mohamedfathy90.com/api/cmi/redirect?user_id='.$user_id.'&payment_id='.$payment_id.'&amount='.$amount];

    return response ($response , 200);

    }
    

    private function deposit_webhook($data)
    {
        try {
            
            // Set user id
            $user_id                 = auth()->id();
            
            // Set amount
            $amount                  = $data['amount'];

            // Set payment id
            $payment_id              = $data['payment_id'];

            // Set payment method 
            $payment_method          = $data['payment_method'];

            // Save
            $webhook                 = new DepositWebhook();
            $webhook->payment_id     = $payment_id;
            $webhook->payment_method = $payment_method;
            $webhook->amount         = $amount;
            $webhook->user_id        = $user_id;
            $webhook->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Save checkout for webhook callback
     *
     * @param array $data
     * @return void
     */
    protected function gig_webhook($data)
    {
        try {
            
            // Set buyer id
            $buyer_id                = auth()->id();
            
            // Set cart
            $cart                    = $data['cart'];

            // Set payment id
            $payment_id              = $data['payment_id'];

            // Set payment method 
            $payment_method          = $data['payment_method'];

            // Save
            $webhook                 = new CheckoutWebhook();
            $webhook->data           = ['buyer_id' => $buyer_id, 'cart' => $cart];
            $webhook->payment_id     = $payment_id;
            $webhook->payment_method = $payment_method;
            $webhook->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

     /**
     * Calculate taxes
     *
     * @return integer
     */
    public function taxes($subtotal)
    {
        // Get commission settings
        $settings = settings('commission');

        // Check if taxes enabled
        if ($settings->enable_taxes) {
            
            // Check if type of taxes percentage
            if ($settings->tax_type === 'percentage') {
                
                // Get tax amount
                $tax       = bcmul($subtotal, $settings->tax_value) / 100;

                // Return tax amount
                return $tax;

            } else {
                
                // Fixed price
                $tax       = $settings->tax_value;

                // Set tax
                $tax = convertToNumber($tax);

                // Return tax
                return $tax;

            }

        } else {

            // Taxes not enabled
            $tax = 0;

            return $tax;

        }
    }

  
    public function deposit_history(){
        $history = DepositTransaction::where('user_id', auth()->id())->latest()->get();
        return response ($history , 200) ;
    }
    
    public function gig_requirements(Request $request){
        $item = OrderItem::where('id',$request->item_id)->firstOrFail();
        $gig_id = Gig::where('id',$item->gig_id)->firstOrFail()->id ;
        $requirements = GigRequirement::where('gig_id' , $gig_id)->get();
        foreach($requirements as $i=>$requirement){
            $response[$i]['requirement_id'] = $requirement->id ;
            $response[$i]['question'] = $requirement->question ;
            $response[$i]['type'] = $requirement->type ;
            $response[$i]['is_required'] = $requirement->is_required == 1 ? true : false  ;
            if($requirement->type === 'choice'){
                $choices =  GigRequirementOption::where('requirement_id' , $requirement->id)->get();
                foreach($choices as $j=>$choice){
                    $response[$i]['Choices'][$j] = $choice->option;
                }
            }
        }
        
        return response ($response , 200);
    }


       public function submit_requirements(Request $request){
        
        // Get item
        $item    = OrderItem::where('id', $request->item_id)->where('order_id', $request->order_id)->firstOrFail();
     
        // User can send requirements only when item status is pending or in progress
         if (!in_array($item->status , ['pending','proceeded']) ) {

            $response = __('messages.t_u_cant_submit_requirements_for_item') ;

            return response ($response , 200);

        }

         // Check if user already submitted the required information
         if ($item->is_requirements_sent && $item->requirements()->count()) {
                
            $response = __('messages.t_user_already_submitted_requirements') ;
            
            return response ($response , 200);

        }

        // retrieve submitted answers
        $submitted_requirements = $request->answers;
        
        foreach($submitted_requirements as $submitted_requirement){
             
            $gig_requirement = GigRequirement::find($submitted_requirement['requirement_id']);
            
            // Check type of this requirement
               if ($gig_requirement->type === 'text' || $gig_requirement->type === 'choice') {
                        
                // Save requirement
                OrderItemRequirement::create([
                    'item_id'    => $item->id,
                    'question'   => $gig_requirement->question,
                    'form_type'  => $gig_requirement->type,
                    'form_value' => $submitted_requirement['value']
                ]);

                } elseif ($gig_requirement->type === 'file') {
                
                // Generate file id
                $id        = uid(45);

                
                $value = $submitted_requirement['value'];
                
                // Get file extension
                $extension = $value->extension();

                // Get file mime type
                $mime      = $value->getMimeType();

                // Get file size
                $size      = $value->getSize();

                // Move this file to local storage
                $value->storeAs('orders/requirements', "$id.$extension", $disk = 'custom');

                // Set file data
                $file = [
                    'id'        => $id,
                    'extension' => $extension,
                    'mime'      => $mime,
                    'size'      => $size
                ];

                // Save requirement in database
                OrderItemRequirement::create([
                    'item_id'    => $item->id,
                    'question'   => $gig_requirement->question,
                    'form_type'  => $gig_requirement->type,
                    'form_value' => $file
                ]);            
            }
        }

        // Set empty days variable
        $days  = 0;

        // Culculate extra days for upgrades
        $days += $item->upgrades()->exists() ? $item->upgrades->sum('extra_days') : 0;

        // Add gig delivery time
        $days += $item->gig->delivery_time;

        // Let' update item information
        $item->is_requirements_sent   = true;
        $item->expected_delivery_date = now()->addDays($days);
        $item->save();
       
        $response = __('messages.t_required_info_submitted_success');

        return response ($response , 200) ;

}

  public function view_requirements(Request $request){
         
        // Get user id
         $user_id    = auth()->id();

         // Get order item
         $item       = OrderItem::where('owner_id', $user_id)->where('id', $request->item_id)->firstOrFail();

         $requirements = $item->requirements ;

         return response ($requirements , 200);
    }
    
    public function buyer_cancel_order (Request $request){
        
        // Get item
        $item = OrderItem::where('id', $request->item_id)
                        ->whereHas('order', function($query) {
                            return $query->where('buyer_id', auth()->id());
                        })
                        ->where('status', 'pending')
                        ->firstOrFail();
    
        // Remove item price from seller balance
        $item->owner()->update([
            'balance_pending' => convertToNumber($item->owner->balance_pending) - convertToNumber($item->profit_value)
        ]);

        // Add item price to buyer balance
        $item->order->buyer()->update([
            'balance_available' => convertToNumber($item->order->buyer->balance_available) + convertToNumber($item->total_value)
        ]);
    
        // Update item
        $item->status      = 'canceled';
        $item->canceled_by = 'buyer';
        $item->canceled_at = now();
        $item->is_finished = true;
        $item->save();

        // Decrement orders in queue
        if ($item->gig->total_orders_in_queue() > 0) {
        $item->gig()->decrement('orders_in_queue');
        }

         // Check if item has any opened refund
        if ($item->refund && $item->refund?->status === 'pending') {
        
            // Let's close this refund
            $item->refund->status = 'closed';
            $item->refund->save();

        }
      
        // Send notification to seller
        $item->owner->notify( (new App\Notifications\User\Seller\OrderItemCanceled($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_buyer_has_canceled_order',
            'action'  => url('seller/orders/details', $item->uid),
            'user_id' => $item->owner_id,
            'params'  => ['buyer' => auth()->user()->username]
        ]);

        $response = __('messages.t_order_has_been_successfully_canceled') ;

        return response ($response , 200);
    
    }


    public function seller_cancel_order (Request $request){

        // Get item
        $item = OrderItem::where('id', $request->item_id)->where('owner_id', auth()->id())->where('status', 'pending')->firstOrFail();

        // Remove item price from seller balance
        $item->owner()->update([
        'balance_pending' => convertToNumber($item->owner->balance_pending) - convertToNumber($item->profit_value)
        ]);

        // Add item price to buyer balance
        $item->order->buyer()->update([
            'balance_available' => convertToNumber($item->order->buyer->balance_available) + convertToNumber($item->total_value)
        ]);

        // Update item
        $item->status      = 'canceled';
        $item->canceled_by = 'seller';
        $item->canceled_at = now();
        $item->is_finished = true;
        $item->save();

        // Decrement orders in queue
        if ($item->gig->total_orders_in_queue() > 0) {
        $item->gig()->decrement('orders_in_queue');
        }

        // Send notification to buyer
        $item->order->buyer->notify( (new App\Notifications\User\Buyer\OrderItemCanceled($item))->locale(config('app.locale')) );
    
        // Send notification
        notification([
            'text'    => 't_seller_has_canceled_ur_order',
            'action'  => url('account/orders'),
            'user_id' => $item->order->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        $response = __('messages.t_order_has_been_successfully_canceled') ;

        return response ($response , 200);
    
    }
    
    public function start_order (Request $request){
        
        // Get item
        $item               = OrderItem::where('id', $request->item_id)
                                        ->where('owner_id', auth()->id())
                                        ->where('status', 'pending')
                                        ->firstOrFail();

        // Update item
        if (!$item->expected_delivery_date) {
            
            // Set empty days variable
            $days  = 0;

            // Culculate extra days for upgrades
            $days += $item->upgrades()->exists() ? $item->upgrades->sum('extra_days') : 0;

            // Add gig delivery time
            $days += $item->gig->delivery_time;

            $item->expected_delivery_date = now()->addDays($days);
        }
        
            $item->status       = 'proceeded';
            $item->proceeded_at = now();
            $item->save();

            // Send notification to buyer
            $item->order->buyer->notify( (new OrderItemInProgress($item))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_seller_has_started_ur_order',
                'action'  => url('account/orders'),
                'user_id' => $item->order->buyer_id,
                'params'  => ['seller' => auth()->user()->username]
            ]);

            $response = "t_order_has_been_successfully_marked_progress" ;

            return response ($response , 200);
    }

    public function view_submitted_requirements(Request $request){
          
        // Get submitted requirements 
        $submitted_requirements = OrderItemRequirement::where('item_id', $request->item_id )->get();

        $response = [] ;
        
        foreach($submitted_requirements as $req){
            
                        if($req->form_type === 'text' || $req->form_type === 'choice'){
                            $response[] = $req->form_value ;            
                        }
                        else{
                            $path = url('public/storage/orders/requirements/' .  $req->form_value['id'] . '.' . $req->form_value['extension']);
                            $response[] = $path ;
                        
                        }
                }
        
        return response ($response , 200) ;
    }

    
    public function buyer_refunds(Request $request){
        $refunds = Refund::where('buyer_id', auth()->id())->latest()->get();
        return response ($refunds , 200);
    }
    
    public function seller_refunds(Request $request){
        $refunds = Refund::where('seller_id', auth()->id())->latest()->get();
        return response ($refunds , 200);
    }
    
    public function request_refund(Request $request){
           // Get item
           $item = OrderItem::where('id', $request->item_id)
           ->where('owner_id', '!=', auth()->id())
           ->where('is_finished', false)
           ->whereNotNull('expected_delivery_date')
           ->whereHas('order', function($query) {
              return $query->where('buyer_id', auth()->id());
           })
           ->firstOrFail();

            // Check item status
            if (!in_array($item->status, ['pending', 'proceeded', 'delivered'])) {
                
                // Error
                return response ( __('messages.t_u_cant_request_refund_for_this_item_now') , 200);

            }

            // Parse expected delivery date
            $parsed_date = Carbon::parse($item->expected_delivery_date);

            // Check if expected delivery date in in future and item not delivered
            if (!$parsed_date->isPast() && $item->status !== 'delivered') {
                
                // Error
                return response( __('messages.t_u_can_request_refund_when_expected_date_finish') , 200);

            }

            // Create new refund
            $refund            = new Refund();
            $refund->uid       = uid();
            $refund->item_id   = $item->id;
            $refund->seller_id = $item->owner_id;
            $refund->buyer_id  = auth()->id();
            $refund->reason    = clean($request->reason);
            $refund->save();

            // Send notification to seller
            $item->owner->notify( (new RefundRequest($refund))->locale(config('app.locale')) );

            // Send notification
              notification([
                  'text'    => 't_buyer_opened_new_refund_dispute',
                  'action'  => url('seller/refunds/details', $refund->uid),
                  'user_id' => $refund->seller_id,
                  'params'  => ['buyer' => auth()->user()->username]
            ]);
    }

    // close refund by buyer
    public function close_refund (Request $request){
        
        // Get refund
        $refund       = Refund::where('id', $request->refund_id)->where('buyer_id', auth()->id())->firstOrFail();

        // Check if refund still in pending
        if ($refund->status !== 'pending') {
            return response('cannot close this refund request' , 200);
        }

        // Close this refund
        $refund->status = 'closed';
        $refund->save();

        // Send notification to seller
        $refund->item->owner->notify( (new RefundClosed($refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_a_refund_has_closed',
            'action'  => url('seller/refunds/details', $refund->uid),
            'user_id' => $refund->seller_id,
            'params'  => ['buyer' => auth()->user()->username]
        ]);
    }

    public function raise_refund(Request $request){
        
        // Get refund
        $refund       = Refund::where('id', $request->refund_id)->where('buyer_id', auth()->id())->firstOrFail();
        
        // Refund must be declined by seller to raise a dispute
        if ($refund->status !== 'rejected_by_seller' && !$refund->request_admin_intervention) {
            return response('cannot raise refund request to admin' , 200);
        }

        // Update refund
        $refund->request_admin_intervention = true;
        $refund->save();

        // Send notification to admin
        Admin::first()->notify( (new RefundDispute($refund))->locale(config('app.locale')) );
    }

    public function accept_refund(Request $request){
        
        $refund      = Refund::where('id', $request->refund_id)->where('seller_id', auth()->id())->firstOrFail();

         // Check if refund still in pending
         if ($refund->status !== 'pending') {
            return response('cannot accept this refund request' , 200);
        }

        // Get refund item
        $item = $refund->item;
        
        // Update item status
        OrderItem::where('id', $item->id)->update([
            'status'      => 'refunded',
            'is_finished' => true,
            'refunded_at' => now()
        ]);

        // Update refund
        $refund->update([
            'status' => 'accepted_by_seller'
        ]);

        // Update this gig
        if ($item->gig->total_orders_in_queue() > 0) {
            $item->gig()->decrement('orders_in_queue');
        }

        // Give buyer his money
        User::where('id', $refund->buyer_id)->update([
            'balance_available' => convertToNumber($refund->buyer->balance_available) + convertToNumber($item->total_value)
        ]);

        // Update seller balance
        User::where('id', $refund->seller_id)->update([
            'balance_pending' => convertToNumber($refund->seller->balance_pending) - convertToNumber($item->profit_value)
        ]);

        // Send notification to buyer
        $refund->buyer->notify( (new RefundAccepted($this->refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_accepted_ur_refund',
            'action'  => url('account/refunds/details', $refund->uid),
            'user_id' => $refund->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

    }

    public function decline_refund(Request $request){
       
        $refund      = Refund::where('id', $request->refund_id)->where('seller_id', auth()->id())->firstOrFail();
        
        // Check if refund still in pending
          if ($refund->status !== 'pending') {
            return response('cannot decline this refund request' , 200);
        }

        // Update refund
        $refund->update([
            'status' => 'rejected_by_seller'
        ]);

        // Send notification to buyer
        $refund->buyer->notify( (new RefundDeclined($refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_declined_ur_refund',
            'action'  => url('account/refunds/details', $refund->uid),
            'user_id' => $refund->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);
    }

    public function submit_work(Request $request){
         
        $user_id = auth()->id();
        
        // Get order item
        $order       = OrderItem::where('owner_id', $user_id)->where('id', $request->item_id)->firstOrFail();

        // Order item must be in ['delivered', 'proceeded'] status and not finished yet
         if (!in_array($order->status, ['proceeded', 'delivered'])) {

             return response( __('messages.t_u_cant_send_delivered_work_anymore_status_wrong') , 200);
         
         }

          // Check if seller already uploaded work before
          if ($order->delivered_work) {
                
            return response( __('messages.t_looks_like_u_already_uploaded_completed_work'), 200);
            
         }

         // Set max work size
         $max_size = settings('media')->delivered_work_max_size * 1024;
         
         $validator = DeliverValidator::validate($request);
         
         if($validator->fails()){
            $error = $validator->errors()->first();
            $response = ['error'=>$error];
            return response($response , 401);
        }

         // Check if request has files
         if ($request->work) {
                
            // Generate a unique name for this file
            $id        = uid(45);

            // Get file extension
            $extension = $request->work->extension();

            // Get file mime type
            $mime      = $request->work->getMimeType();

            // Get file size
            $size      = $request->work->getSize();

            // Move this file to local storage
            $request->work->storeAs('orders/delivered_work', "$id.$extension", $disk = 'custom');

            // Set file data
            $file = [
                'id'        => $id,
                'extension' => $extension,
                'mime'      => $mime,
                'size'      => $size
            ];

            } else {

                // No files selected
                $file = null;
            }

            // Save work
            $work                      = new OrderItemWork();
            $work->uid                 = uid();
            $work->order_item_id       = $order->id;
            $work->attached_work       = $file;
            $work->quick_response      = $request->quick_response ? clean($request->quick_response) : null;
            $work->save();

            // Update order item
            $order->status       = 'delivered';
            $order->delivered_at = now();
            $order->save();

             // Send notification to buyer
             $order->order->buyer->notify( (new OrderDelivered($order))->locale(config('app.locale')) );

             // Send notification
             notification([
                 'text'    => 't_seller_has_delivered_ur_order',
                 'action'  => url('account/orders/files?orderId=' . $order->order->uid . '&itemId=' . $order->uid),
                 'user_id' => $order->order->buyer_id,
                 'params'  => ['seller' => auth()->user()->username]
             ]);

             $response = "Delivered Work has been uploaded successfully !!" ;

             return response ($response , 200) ;
    }

}

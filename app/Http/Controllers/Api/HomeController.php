<?php

namespace App\Http\Controllers\Api;

use App\Models\Gig;
use App\Models\User;
use App\Models\Level;
use App\Models\Review;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\FileManager;
use App\Models\Subcategory;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
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
        $user_favourites = Favorite::where('user_id' , $request->user_id)->get();
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
            $image_path = ('/public/storage/'.$avatar_file->file_folder.'/'.$avatar_file->uid.'.'.$avatar_file->file_extension);
            $top_seller['avatar_link'] = $image_path ;
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
            $gigs = Gig::where('title','like','%'.$request->search_text.'%')->latest()->get();
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
}

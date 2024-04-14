<?php

namespace App\Http\Controllers\Api;

use App\Models\Gig;
use App\Models\User;
use App\Models\Category;
use App\Models\FileManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // retrieve all categories 
    public function categories(Request $request){
        $categories = Category::where('is_visible' , 1)->get();
        foreach($categories as $category){
            $image_file = FileManager::where('id' , $category->image_id)->first();
            $icon_file = FileManager::where('id' , $category->icon_id)->first();
            $image_path = ('/public/storage/'.$image_file->file_folder.'/'.$image_file->uid.'.'.$image_file->file_extension);
            $icon_path = ('/public/storage/'.$icon_file->file_folder.'/'.$icon_file->uid.'.'.$icon_file->file_extension);
            $category['image_path'] =$image_path ;
            $category['icon_path'] =$icon_path ;
        }
        $response = ['categories'=>$categories , 'message'=>'success'];
        return response ($response , 200);
    }

     // retrieve image url
    public function image (Request $request){
        $file_manager = FileManager::where('id' , $request->image_id)->first();
        $image_path = ('/'.'storage/'.$file_manager->file_folder.'/'.$file_manager->uid.'.'.$file_manager->file_extension);
        $response  = ['image_url'=>$image_path , 'message'=>'success'];
        return response ($response , 200 );
    }

     // retrieve selecetd gigs (four random ones)
    public function selected_gigs (Request $request){
        $gigs = Gig::active()->inRandomOrder()->take(4)->get();
        foreach($gigs as $gig){
            $thumb_file = FileManager::where('id' , $gig->image_thumb_id)->first();
            $image_medium_file = FileManager::where('id' , $gig->image_medium_id)->first();
            $image_large_file = FileManager::where('id' , $gig->image_large_id)->first();
            $thumb_path = ('/public/storage/'.$thumb_file->file_folder.'/'.$thumb_file->uid.'.'.$thumb_file->file_extension);
            $image_medium_path = ('/public/storage/'.$image_medium_file->file_folder.'/'.$image_medium_file->uid.'.'.$image_medium_file->file_extension);
            $image_large_path = ('/public/storage/'.$image_large_file->file_folder.'/'.$image_large_file->uid.'.'.$image_large_file->file_extension);
            $gig['thumb_path'] =$thumb_path ;
            $gig['image_medium_path'] =$image_medium_path ;
            $gig['image_large_path'] =$image_large_path ;
            $gig['user'] = User::find($gig->user_id);
        }
        $response = ['gigs'=>$gigs , 'message'=>'success'];
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

        $response = ['top_sellers'=>$top_sellers , 'message'=>'success'];
        return response ($response , 200);
    }
}

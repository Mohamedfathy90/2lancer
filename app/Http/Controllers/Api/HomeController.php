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
            $file_manager = FileManager::where('id' , $category->image_id)->first();
            $image_path = ('/public/storage/'.$file_manager->file_folder.'/'.$file_manager->uid.'.'.$file_manager->file_extension);
            $category['image_path'] =$image_path ;
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

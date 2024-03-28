<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin;
use App\Models\Country;
use App\Rules\UsernameRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Utils\Uploader\ImageUploader;
use App\Notifications\APi\VerifyEmail;
use App\Models\MobileEmailVerification;
use App\Notifications\Admin\PendingUser;
use App\Http\Validators\API\LoginValidator;
use App\Http\Validators\API\SetupValidator;
use App\Notifications\User\Everyone\Welcome;
use App\Http\Validators\API\RegisterValidator;
use App\Http\Validators\Main\Account\Profile\AvatarValidator;

class AuthController extends Controller
{
    
    public function register(Request $request){
        
            $validator = RegisterValidator::validate($request);
            
            if($validator->fails()){
            $errors = $validator->errors()->toArray();
            $errors_keys = array_keys($errors);
            foreach($errors as $error){
                $errors_messages[]=$error[0] ;
            }
            $error_response = array_combine($errors_keys , $errors_messages);
            $response = ['message'=>'validation_error' , 'errors'=>$error_response];
            return response($response , 401);
            }
        
            // Get auth settings
            $settings       = settings('auth');
         
            // Create new user
            $user           = new User();
            $user->uid      = uid();
            $user->fullname = clean($request->fullname);
            $user->email    = clean($request->email);
            $user->username = clean($request->username);
            $user->phone    = ($request->countryCode).(clean($request->phone));
            $user->password = Hash::make($request->password);
            $user->status   = $settings->verification_required ? 'pending' : 'active';
            $user->level_id = 1;
            $user->account_type = $request->account_type ? $request->account_type : 'buyer';
            $user->ip_address = request()->ip();
            $user->save();
      
             // Check if verification using email
             if ($settings->verification_type === 'email') {
                
                // Generate verification
                $verification             = new MobileEmailVerification();
                $verification->code       = mt_rand(1111,9999);
                $verification->email      = $user->email;
                $verification->expires_at = now()->addMinutes(60);
                $verification->save();
                
                try{
                 // Send verification Code to user via email
                 $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );
                 
                } catch (\Throwable $th) {
                    // Something went wrong
                    $response = ['message'=> __('messages.t_pls_check_ur_email_and_try_again')]; 
                    return response($response , 400);
                }
                
               
            
            } else if ($settings->verification_type === 'admin') {
            
                // Send notification to admin
                Admin::first()->notify( (new PendingUser($user))->locale(config('app.locale')) );
            }
            
                // return response 
            $response = ['message'=> __('messages.t_account_has_been_created'), 
                         'verfication_type' => $settings->verification_type] ;
            return response($response , 201);
        
    }

    public function verify(Request $request){
        
        $verification = MobileEmailVerification::where('email',$request->email)->first();
        
        // Check if verification exists
        if (!$verification) {
            $response =['message'=> __('messages.t_email_not_exists')] ;
            return response($response , 404);
        }
        
        //check for code 
        if($verification->code != $request->code){
            $response =['message'=> __('messages.t_verification_code_not_correct')] ;
            return response($response , 403);
        }
               
        // Check if verification code expired
        if($verification->expires_at < now()){
            $response =['message'=> __('messages.t_verification_code_expired')] ; 
            return response($response , 403);
        }

          // Verification is correct, activate account
          $user                    = User::where('email', $verification->email)->firstOrFail();

          // Update user status
          $user->status            = 'active';
          $user->email_verified_at = now();
          $user->save();
        
          // Send welcome to user
          $user->notify( (new Welcome)->locale(config('app.locale')) );
          
          // Delete verification
          $verification->delete();
        
         $response = ['message'=>__('messages.t_ur_account_has_been_successfully_verified_email')];
         return response($response , 200);
        }
    
    
    public function resend(Request $request){
     $verification = MobileEmailVerification::where('email',$request->email)->first();
     
     // Check if verification exists
      if (!$verification) {
        $response =['message'=> __('messages.t_email_not_exists')] ;
        return resposne($response , 404);
        }
     
     // Delete verification
     $verification->delete();

     $user                    = User::where('email', $verification->email)->firstOrFail(); 
     
     // Generate new verification
      $verification             = new MobileEmailVerification();
      $verification->code       = mt_rand(1111,9999);
      $verification->email      = $user->email;
      $verification->expires_at = now()->addMinutes(60);
      $verification->save();

    // Send verification Code to user via email
     $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );

    // return response 
     $response = ['message'=> __('messages.t_new_verification_code_sent')] ;
     return response($response , 201);

    
    }

    
    public function login (Request $request) {
         
        
       LoginValidator::validate($request) ; 
       
            // Set login credentials
            $credentials = ['email' => $request->email, 'password' => $request->password];

            // Attempt login
            if (Auth::attempt($credentials, $request->remember_me)) {
                $user = User::where('email' , $request->email)->first(); 
                $token = $user->createToken('myapptoken')->plainTextToken;
                $response = ['token'=>$token];
                return response($response , 200);
            }
            else{
                $response = ['message' => __('messages.t_invalid_login_credentials_pls_try_again')];
                return response ($response , 403);
            }

    }

    public function setup(Request $request){
        
        $user = User::find($request->user_id) ; 
        
        if(!$user){
            $response =['message'=> __('messages.t_user_not_exists')] ;
            return response($response , 404); 
        }
        
        if($request->has('avatar')){
            
            // Validate form
            AvatarValidator::validate($request);
             
            // Upload avatar
             $avatar_id = ImageUploader::make($request->avatar)
             ->deleteById($user->avatar_id)
             ->resize(100)
             ->folder('avatars')
             ->handle();

            // Update user avatar
            $user->update([
                'avatar_id' => $avatar_id
            ]);
        }

         // Validate request data
         SetupValidator::validate($request);

         // Update user data
         $user->update([
            'username'   => clean($request->username),
            'email'      => clean($request->email),
            'fullname'   => $request->fullname ? clean($request->fullname) : null,
            'country_id' => $request->country ? $request->country : null,
            'city'       => $request->city ? clean($request->city) : null,
            'phone'      => $request->phone,
        ]);

        // Refresh user
        $user->refresh();

        $response = ['message' => __('messages.t_account_set_up_successfully')];
        return response ($response , 200);

    }

    
    public function countries(){
        $countries = Country::all();
        $response = ['countries'=>$countries , 'message'=>'success'];
        return response ($response , 200);
    }
}

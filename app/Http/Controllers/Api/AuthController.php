<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Rules\UsernameRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\APi\VerifyEmail;
use App\Models\MobileEmailVerification;
use Illuminate\Support\Facades\Validator;
use App\Http\Validators\Main\Auth\RegisterValidator;
use App\Notifications\User\Everyone\Welcome;

class AuthController extends Controller
{
    
    public function register(Request $request){
        
         // Set rules
            $rules    = [
            'username' => ['required', 'max:60', 'min:3', 'unique:users', new UsernameRule()],
            'email'    => ['required','max:60', 'unique:users','email:rfc,dns,filter,spoof'],
            'password' => 'required|max:60',
            'fullname' => 'required|max:60|min:3',
            'phone'    => 'required|numeric'
        ];

        // Set errors messages
            $messages = [
            'username.required' => __('messages.t_validator_required'),
            'username.max'      => __('messages.t_validator_max', ['max' => 60]),
            'username.min'      => __('messages.t_validator_min', ['min' => 3]),
            'username.unique'   => __('messages.t_validator_unique'),
            'email.required'    => __('messages.t_validator_required'),
            'email.max'         => __('messages.t_validator_max', ['max' => 60]),
            'email.email'       => __('messages.t_validator_email'),
            'email.unique'      => __('messages.t_validator_unique'),
            'password.required' => __('messages.t_validator_required'),
            'password.max'      => __('messages.t_validator_max', ['max' => 60]),
            'fullname.required' => __('messages.t_validator_required'),
            'fullname.max'      => __('messages.t_validator_max', ['max' => 60]),
            'fullname.min'      => __('messages.t_validator_min', ['min' => 3]),
            'fullname.regex'    => __('messages.t_validator_regex'),
            'phone.required'    => __('messages.t_validator_required'),
        ];

        // Set data to validate
            $data     = [
            'email'    => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
        ];
        
        // Get auth settings
        $settings       = settings('auth');
        
        $request->validate($rules, $messages) ;
         
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
                
                // Send verification Code to user via email
                $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );
            
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
         
        // Set rules
         $rules    = [
            'email'    => 'required|max:60|email',
            'password' => 'required|max:60'
        ];

        // Set errors messages
        $messages = [
            'email.required'    => __('messages.t_validator_required'),
            'email.email'       => __('messages.t_validator_email'),
            'email.max'         => __('messages.t_validator_max', ['max' => 60]),
            'password.required' => __('messages.t_validator_required'),
            'password.max'      => __('messages.t_validator_max', ['max' => 60]),
        ];

        // Set data to validate
        $data     = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

       $request->validate($rules, $messages) ; 
       
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
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Rules\UsernameRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Validators\Main\Auth\RegisterValidator;

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
        
        // Validate request data
       // $validator = Validator::make($data, $rules, $messages);
        
       $request->validate($rules, $messages) ;
       
    //    if($validator->fails()){    
    //         $response=json_encode(['errors'=>$validator->errors()]);
    //         return response($response , 403);
    //     }
        
    //     else{    
            
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
            
            // return response 
            $response = __('messages.t_account_has_been_created') ;
            return response($response , 201);
       // }
        
    }

    /**
 * @OA\Post(
 *     path="/login",
 *     summary="Login Request",
 *     tags={"Authentication"},
 * @OA\Parameter(
        * name="email",
        * in="query",
        * description="User’s Email",
        * required=true,
        * @OA\Schema(type="string")
        * ),
* @OA\Parameter(
        * name="password",
        * in="query",
        * description="User’s Password",
        * required=true,
        * @OA\Schema(type="string")
        * ),
 *     @OA\Response(response=200, description="Successful login" ),
 *     @OA\Response(response=403, description="Invalid credentials"),
 *     @OA\Response(response=422, description="Validation Error")
 * )
 */
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

        // Validate request data
       // $validator = Validator::make($data, $rules, $messages);

       $request->validate($rules, $messages) ; 
       
    //    if($validator->fails()){    
    //         $response=json_encode(['errors'=>$validator->errors()]);
    //         return response($response , 403);
    //     }

      //  else{
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
      //  }


    }
}

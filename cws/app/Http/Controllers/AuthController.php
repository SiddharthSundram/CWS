<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\PasswordResetToken;
use Tymon\JWTAuth\Facades\JWTAuth;
use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


// use Validator;

class AuthController extends Controller
{

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $credentials = $request->only('email', 'password');
        
        if ($token = auth('api')->attempt($credentials)) {
            $user = auth('api')->user();
            $isAdmin = $user->is_admin;
        
            return response()->json(compact('token', 'isAdmin'));
        }
        
        return response()->json(['error' => 'Unauthorized'], 401);
    }

   
     public function logout(Request $request)
     {
         JWTAuth::invalidate(JWTAuth::getToken()); 
         return response()->json(['message' => 'User logged out successfully']);
     }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token);

        return response()->json(['token'=>$newToken]);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
    public function sendVerifyMail($email){
        if(auth()->user()){
            $user = User::where('email', $email)->first();
            if($user){
    
                $random = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/verify-mail/'.$random;
    
                $data['url'] = $url;
                $data['email'] = $email;
                $data['title'] = "Email Verification";
                $data['body'] = "Please click here to verify your mail.";
    
                Mail::send('home.verifyMail', ['data' => $data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });
    
                $user->remember_token = $random;
                $user->save();
    
                return response()->json(['success' => true, 'msg' => 'Mail Send Successfully, Please Check it.']);
            }
        } else {
            return response()->json(['success' => false, 'msg' => 'User is Not Authenticated']);
        }
    }

    public function verificationMail($token)
    {
        $user = User::where('remember_token',$token)->get();
        if(count($user)> 0){
            $datetime = Carbon::now()->format('d-m-Y H:i:s');
            $user = User::find($user[0]['id']);
            $user->remember_token = '';
            $user->email_verified_at = $datetime;
            $user->save();

            // return response()->json(['success'=>true,'message' => 'Verified Successfully']);
            return "<h1> Email Verified Successfully</h1>";
        }
        else{
            // return response()->json(['success'=>false,'message' => 'Page Not Found',404]);
            return "<h1> Page Expired</h1>";

        }
    }  
    
    // forget password

    public function forgetPassword(Request $request){

            $user = User::where('email', $request->email)->first();
            
            if ($user !== null) {
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;
                
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = "Please click on the link below to reset your password.";
                
                Mail::send('home.forget-Password', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });
                
                $datetime = Carbon::now()->format('Y-m-d H:i:s');
                
                PasswordResetToken::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime,
                    ]
                );
                
                return response()->json(['message' => 'Please check your email to reset the password']);
            } else {
                return response()->json(['message' => 'User not found!']);                
            }
    }

    public function resetPasswordLoad(Request $request){
        $resetData = PasswordResetToken::where('token', $request->token)->get();
        if(isset($request->token) && count($resetData)> 0){

            $user = User::where('email',$resetData[0]['email'])->get();
            return view('home.resetPassword', compact('user'));


        }

        // if(isset($request->token) && $resetData){
    
        //     $user = User::where('email', $resetData->email)->first(); 
        //     // dd($user->email);
        //     if($user){
        //         return view('home.resetPassword', compact('user'));
        //     } else {
        //         return "<h1> User Not Found</h1>";
        //     }
       
        // }

        else{
            return "<h1> Page Not Found</h1>";
        }
    }    

public function resetPassword(Request $request)
{
    $request->validate([
        'id' => 'required', // Assuming id is required for user identification
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::find($request->id);

    if (!$user) {
        return "<h1>User not found.</h1>"; // Handle the case where user is not found
    }

    // dd($user->email);

    $user->password = Hash::make($request->password);
    
    if (!$user->save()) {
        return "<h1>Failed to reset password.</h1>"; // Handle save operation failure
    }
    // dd($user->email);

    $deleted = PasswordResetToken::where('email', $user->email)->delete();

    // dd($deleted);

    if (!$deleted) {
        return "<h1>Failed to delete password reset record.</h1>"; // Handle deletion failure
    }

    return "<h1>Password has been reset successfully.</h1>";
}


    

}
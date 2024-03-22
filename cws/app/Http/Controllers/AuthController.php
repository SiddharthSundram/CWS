<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Password_reset;
use Tymon\JWTAuth\Facades\JWTAuth;
use Mail;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
}

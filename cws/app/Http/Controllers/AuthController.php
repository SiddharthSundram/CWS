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

  public function forgetPassword(Request $request){
    try {
        $user = User::where('email', $request->email)->get();
        
        if (count($user) > 0) {
            $token = Str::random(40);
            $domain = URL::to('/');
            $url = $domain . '/reset-password?token=' . $token;
            
            $data['url'] = $url;
            $data['email'] = $request->email;
            $data['title'] = 'Password Reset';
            $data['body'] = "Please click on the link below to reset your password.";
            
            Mail::send('forgetPasswordMail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
            
            $datetime = Carbon::now()->format('y-m-d H:i:s');
            
            Password_reset::updateOrCreate(
                ['email' => $request->email],
                [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => $datetime
                ]
            );
            
            return response()->json(['message' => 'Please check your email to reset the password']);
        } else {
            return response()->json(['message' => 'User not found!']);                
        }
    } catch (\Exception $e) {
       
        \Log::error($e);
        
        return response()->json(['error' => 'An error occurred while processing your request.'], 500);
    }
}

    
    
}

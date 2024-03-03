<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\course;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function adminLogin(Request $request){

        if($request->isMethod('post')){
            $user = User::where("is_admin" == 1);
            if($user){
                $data = $request->validate([
                    "email" =>"required",
                    "password"=>"required",
                ]);
                if(Auth::guard('admin')->attempt($data)){
                    return redirect()->route('admin.dashboard');
                }
    
                else{
                    return back();
                }
            }
            
        }
        return view("admin.adminLogin");
    }

    public function adminLogout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminLogin")->with("error","Logout Successfully");
    }

    

}

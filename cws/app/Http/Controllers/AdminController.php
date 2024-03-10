<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\hallFrame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AdminController extends Controller
{
    public function dashboard(){
        $totalStudents = User::count();
        $totalHallOfFrame = hallFrame::count();
        $totalCourses = Course::count();
        $totalPayments = 0;
        return view("admin.dashboard", compact('totalStudents','totalCourses','totalPayments','totalHallOfFrame'));
    }

    // public function adminLogin(Request $request){

    //     if($request->isMethod('post')){
    //         $user = User::where("is_admin" === 1);
    //         if($user){
    //             $data = $request->validate([
    //                 "email" =>"required",
    //                 "password"=>"required",
    //             ]);
    //             if(Auth::guard('admin')->attempt($data)){
    //                 return redirect()->route('admin.dashboard');
    //             }
    
    //             else{
    //                 return back();
    //             }
    //         }
            
    //     }
    //     return view("admin.adminLogin");
    // }

    public function adminLogin(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                "email" => "required|email",
                "password" => "required",
            ]);
    
            // Retrieve the user with the given email and who is an admin
            $user = User::where("email", $data['email'])->where("is_admin", 1)->first();
    // dd($user);
            if ($user && Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                // Authentication successful, redirect to admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Authentication failed, redirect back with error
                return redirect()->back()->with('error', 'Invalid credentials.');
            }
        }
    
        return view("admin.adminLogin");
    }
    



    public function adminLogout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminLogin")->with("error","Logout Successfully");
    }


    public function manageQuery(){
        return view('admin.manageQuery');
    }
}

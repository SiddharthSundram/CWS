<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Models\Course;
use App\Models\hallFrame;
use App\Models\Payment;
use App\Models\RecentProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AdminController extends Controller
{
    public function dashboard(){
       
        return view("admin.dashboard");
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

    public function countData(){

        $count["payment"] = Payment::where("status","0")->count();
        $count["admission"] = User::where("status","0")->where("is_admin",0)->count();
        $count["students"] = User::where("status","1")->where("is_admin",0)->count();
        $count["halloffames"] = hallFrame::count();
        $count["courses"] = Course::count();
        $count["payments"] = Payment::count();
        $count["projects"] = RecentProject::count();
        $count["category"] = Category::count();
        $count["contact"] = Contact::count();

        $count["paymentDueAmount"] = Payment::where("status","0")->get();
        $count["paymentPaidAmount"] = Payment::where("status","1")->get();

        $count["countGirls"] = User::where("gender","Female")->count();
        $count["countBoys"] = User::where("status","Male")->count();
        
       
        return response()->json($count);

    }

    public function viewQuery(){
        return view('admin.viewQuery');
    }
}

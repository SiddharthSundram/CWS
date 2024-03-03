<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\course;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function insertCategory(){
        return view("admin.insertCategory");
    }
    public function insertCourse(){
        return view("admin.insertCourse");
    }
    public function manageCourse(){
        return view("admin.manageCourse");
    }
    public function manageCategory(Request $request)
    {
        $courses = course::paginate(10); // Adjust the number of categories per page as needed
        return view("admin.manageCategory", compact('courses'));
    }
    public function recent_project(){
        return view("admin.recent_project");
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
    public function hallFrame(){
        return view("admin.hallFrame");
    }

}

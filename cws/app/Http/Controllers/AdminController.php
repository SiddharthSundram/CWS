<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

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
    public function manageCategory(){
        return view("admin.manageCategory");
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

    public function insertStudent(Request $request)
    {
        return view('admin.insertStudent');

    }

    public function manageStudent(){
        return view('admin.manageStudent');
    }

    public function addStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'mobile_no' => 'required|string|max:12|',
            'email' => 'required|string|email|max:100|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated()
        ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function index()
    {
          return response()->json(["data" => User::all()]);
    }

}

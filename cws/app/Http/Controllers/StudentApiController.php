<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function addStudent(Request $request)
    {
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

    public function index(Request $request)
    {
        // return response()->json(["data" => User::where("is_admin","!=",1)->get()]);

        $perPage = $request->input('per_page', 4); // Default to 10 items per page if not specified
        $users = User::where('is_admin', '!=', 1)->paginate($perPage);    
        return response()->json($users);
    } 
}
    
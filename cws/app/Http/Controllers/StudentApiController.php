<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function addStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'mobile_no' => 'required|string|max:12|',
            'email' => 'required|string|email|max:100|unique:users',
            // 'f_name' => 'required|string|between:2,100|',
            // 'address' => 'required|string|between:2,100|',
            // 'gender' => 'required|in:m,f,o',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => $request->input("password","password"), "state" => 1],
            ['f_name' => $request->input("f_name",null), "state" => 1],
            ['address' => $request->input("address",null), "state" => 1],
            ['gender' => $request->input("gender",null), "state" => 1]
        ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function index(Request $request){
        $query = $request->get('query');
        $perPage = $request->input('per_page', 10); // Default to 4 items per page if not specified
        
        if ($query) {
            $users = User::where('name', 'LIKE', "%$query%")->where([['is_admin', '!=', 1],['status', 1]])->paginate($perPage);
        } else {
            $users = User::where([['is_admin', '!=', 1],['status', 1]])->paginate($perPage);
        }
        
        return response()->json($users);
        
    } 
    public function count(Request $request){
        $query = $request->get('status');
        $users = User::where([['is_admin', '!=', 1],['status', $query]])->get();
        return response()->json($users);
        
    } 
    public function manageAdmission(Request $request){
        $query = $request->get('query');
        $perPage = $request->input('per_page', 5); // Default to 4 items per page if not specified
        
        if ($query) {
            $users = User::where('name', 'LIKE', "%$query%")->where([['is_admin', '!=', 1],['status', 0]])->paginate($perPage);
        } else {
            $users = User::where([['is_admin', '!=', 1],['status', 0]])->paginate($perPage);
        }
        
        return response()->json($users);
        
    } 

    public function show($id){
        $user = User::where("id", $id)
    ->with(["courses", "courses.payments" => function ($query) use ($id) {
        $query->where("user_id", $id);
    }])
    ->first();

    return response()->json($user);
    }


    


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->id = $request->id; // Adjusting to match the input name
        $user->name = $request->name; // Adjusting to match the input name
        $user->email = $request->email; 
        $user->mobile_no = $request->mobile_no; 
        $user->status = $request->status; 
        $user->f_name = $request->f_name; 
        $user->address = $request->address; 
        $user->gender = $request->gender; 
        $user->save();

        return response()->json([
            'user' => $user,
            'success' => true,
            'msg' => 'Student updated successfully'
        ]);
    }


        public function destroy($id)
    {
        try {
            // Find the student by ID
            $student = User::findOrFail($id);

            // Delete the student
            $student->delete();

            return response()->json(['msg' => 'Student deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['msg' => 'Failed to delete student', 'error' => $e->getMessage()], 500);
        }
}
    public function callingStudents(){
        $students = User::all();
        return response()->json(['students' => $students]);
    }



        public function edit($id)
    {
        $student = User::findOrFail($id);
        return response()->json([
            'user' => $student,
            'success' => true,
            'msg' => 'Student fetched successfully'
        ]);
    }


    // for manage student

    public function upgrade(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'f_name' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'gender' => 'required|in:m,f,o',
            'mobile_no' => 'required|string|max:12|',
            'email' => 'required|string|email|max:100|unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user->update($validator->validated());

        return response()->json([
            'user' => $user,
            'success' => true,
            'msg' => 'Student updated successfully'
        ]);
}

    
}
    
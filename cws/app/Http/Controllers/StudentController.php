<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function insertStudent(Request $request)
    {
        return view('admin.insertStudent');
    }

    public function manageStudent()
    {
        return view('admin.manageStudent');
    }
    
    public function viewStudent(Request $request, $id){
        return view('admin.viewStudents');
    }
}

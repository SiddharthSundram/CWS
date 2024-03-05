<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studentCourse = new StudentCourse();
        $studentCourse->course_id = $request->course_id;
        $studentCourse->user_id = $request->user_id;
        $studentCourse->save();
        return response()->json(['data' => $studentCourse, "success" => true, "msg" => "Student Course Added Succcessfully"]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentCourse $studentCourse)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data"=>Course::with("category")->get()],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = time().".".$request->featured_image->extension();        //upload on public/course_image/filename
        $request->featured_image->move(public_path("image"), $filename);

        $course = new Course();
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->instructor = $request->instructor;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;
        $course->lang = $request->lang;
        $course->category_id = $request->category_id;
        $course->description = $request->description;
        $course->featured_image =$filename;
        $course->save();

        return response()->json(["data"=> $course,"msg"=> "course Inserted Successfully","success"=> true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return response()->json(["data"=>$course,"success"=>true]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return response()->json(["data"=>$course,"success"=>true, "msg"=>"courses"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["data"=>$course,"success"=>true,"msg"=>"course deleted successfully"]);
    }
}


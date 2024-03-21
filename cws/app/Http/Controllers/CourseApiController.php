<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => Course::with("category")->get()], 200);
    }


    public function store(Request $request)
    {
        $filename = time() . "." . $request->featured_image->extension();        //upload on public/course_image/filename
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
        $course->featured_image = $filename;
        $course->save();

        return response()->json(["data" => $course, "msg" => "course Inserted Successfully", "success" => true]);
    }


    public function show(Course $course)
    {
        $course = Course::with('category')->find($course->id);
        return response()->json(["data" => $course, "success" => true]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    public function toggleStatus($id)
    {
        $course = Course::findOrFail($id);
        $course->status = !$course->status;
        $course->save();

        return response()->json(['message' => 'Course status toggled successfully'], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Update the course attributes
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->instructor = $request->instructor;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;
        $course->lang = $request->lang;
        $course->category_id = $request->category_id;
        $course->description = $request->description;

        // Handle featured image upload if provided
        if ($request->hasFile('featured_image')) {
            $filename = time() . '.' . $request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move(public_path('image'), $filename);
            $course->featured_image = $filename;
        }

        // Save the updated course
        $course->save();

        // Return a success response
        return response()->json(['message' => 'Course updated successfully', 'course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["data" => $course, "success" => true, "msg" => "course deleted successfully"]);
    }

    public function searchCourse(Request $request)
    {
        $query = $request->get('query');

        if ($query) {
            $courses = Course::where('name', 'LIKE', "%$query%")->get();
        } else {
            $courses = Course::all(); 
        }

        return response()->json($courses);
    }
}

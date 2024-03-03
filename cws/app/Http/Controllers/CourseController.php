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
        return response()->json(["data" => Course::with("category")->get()], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return response()->json(["data" => $course, "success" => true]);
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
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'fees' => 'required|numeric',
            'discount_fees' => 'required|numeric',
            'lang' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Assuming you have a "categories" table
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Courses;

class CoursessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => Courses::with("category")->get()], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = time() . "." . $request->featured_image->extension();        //upload on public/Courses_image/filename
        $request->featured_image->move(public_path("image"), $filename);

        $Courses = new Courses();
        $Courses->name = $request->name;
        $Courses->duration = $request->duration;
        $Courses->instructor = $request->instructor;
        $Courses->fees = $request->fees;
        $Courses->discount_fees = $request->discount_fees;
        $Courses->lang = $request->lang;
        $Courses->category_id = $request->category_id;
        $Courses->description = $request->description;
        $Courses->featured_image = $filename;
        $Courses->save();

        return response()->json(["data" => $Courses, "msg" => "Courses Inserted Successfully", "success" => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $Courses)
    {
        return response()->json(["data" => $Courses, "success" => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $Courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $Courses)
    {
        $Courses->update($request->all());
        return response()->json(["data" => $Courses, "success" => true, "msg" => "Coursess"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $Courses)
    {
        $Courses->delete();
        return response()->json(["data" => $Courses, "success" => true, "msg" => "Courses deleted successfully"]);
    }
}

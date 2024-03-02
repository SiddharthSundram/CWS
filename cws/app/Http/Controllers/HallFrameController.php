<?php

namespace App\Http\Controllers;

use App\Models\hallFrame;
use Illuminate\Http\Request;

class hallFrameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => hallFrame::all()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = time().".".$request->featured_image->extension();        //upload on public/course_image/filename
        $request->featured_image->move(public_path("image"), $filename);

        $hallFrame = new hallFrame();
        $hallFrame->name = $request->name;
        $hallFrame->position = $request->position;
        $hallFrame->industry = $request->industry;
        $hallFrame->description = $request->description;

        $hallFrame->featured_image =$filename;
        $hallFrame->save();

        return response()->json(["data"=> $hallFrame,"msg"=> "HallFrame Inserted Successfully","success"=> true]);
    }
    /**
     * Display the specified resource.
     */
    public function show(hallFrame $hallFrame)
    {
        return response()->json(["data" => $hallFrame, "success" => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hallFrame $hallFrame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hallFrame $hallFrame)
    {
        $hallFrame->update($request->all());
        return response()->json(["data" => $hallFrame, "success" => true, "msg" => "hallFrames"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hallFrame $hallFrame)
    {
        $hallFrame->delete();
        return response()->json(["data" => $hallFrame, "success" => true, "msg" => "hallFrame deleted successfully"]);
    }
}

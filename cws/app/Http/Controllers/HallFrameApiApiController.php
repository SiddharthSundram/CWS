<?php

namespace App\Http\Controllers;

use App\Models\hallFrame;
use Illuminate\Http\Request;

class HallFrameApiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => hallFrame::all()]);
    }


    public function store(Request $request)
    {
        $filename = time() . "." . $request->featured_image->extension();        //upload on public/course_image/filename
        $request->featured_image->move(public_path("image"), $filename);

        $hallFrame = new hallFrame();
        $hallFrame->name = $request->name;
        $hallFrame->position = $request->position;
        $hallFrame->industry = $request->industry;
        $hallFrame->description = $request->description;
        $hallFrame->featured_image = $filename;
        $hallFrame->save();

        return response()->json(["data" => $hallFrame, "msg" => "HallFrame Inserted Successfully", "success" => true]);
    }
    /**
     * Display the specified resource.
     */
    public function show(hallFrame $hallFrame)
    {
        return response()->json(["data" => $hallFrame, "success" => true]);
    }


    public function manageHallframe(Request $request){
        $query = $request->get('query');
        $perPage = $request->input('per_page', 2); // Default to 4 items per page if not specified
        
        if ($query) {
            $hallFrame = hallFrame::where('name', 'LIKE', "%$query%")->paginate($perPage);
        } else {
            $hallFrame = hallFrame::paginate($perPage);
        }
        
        return response()->json($hallFrame);
        
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
    public function update(Request $request, $id)
    {
        // Find the hall frame by ID
        $hallFrame = HallFrame::findOrFail($id);

        // Update hall frame attributes
        $hallFrame->name = $request->input('name');
        $hallFrame->position = $request->input('position');
        $hallFrame->industry = $request->input('industry');
        $hallFrame->description = $request->input('description');

        // Handle featured image upload if provided
        if ($request->hasFile('featured_image')) {
            $filename = time() . '.' . $request->featured_image->extension();
            $request->featured_image->move(public_path('image'), $filename);
            $hallFrame->featured_image = $filename;
        }

        // Save the updated hall frame
        $hallFrame->save();

        // Return a success response
        return response()->json(['message' => 'Hall Frame updated successfully', 'hallFrame' => $hallFrame]);
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

<?php

namespace App\Http\Controllers;

use App\Models\RecentProject;
use Illuminate\Http\Request;

class RecentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
 * Display a listing of the resource.
 */
    public function index()
    {
        $recent_projects = RecentProject::all();
        return response()->json(["data" => $recent_projects]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recent = new RecentProject();
        $recent->name = $request->name;
        $recent->description = $request->description;
        $recent->save();
        return response()->json(['data' => $recent, "success" => true, "msg" => "RecentProject Inserted Succcessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RecentProject $recentProject)
    {
        return response()->json(["data" => $recentProject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecentProject $recentProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecentProject $recentProject)
    {
        $recentProject->name = $request->name;
        $recentProject->description = $request->description;
        $recentProject->save();
        return response()->json(['data' => $recentProject, "success" => true, "msg" => "RecentProject Updated Succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecentProject $recentProject)
    {
        $recentProject->delete();
        return response()->json(['data' => $recentProject, "success" => true, "msg" => "categories delete Succcessfully"]);
    }
}

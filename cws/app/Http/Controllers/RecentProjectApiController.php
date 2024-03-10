<?php

namespace App\Http\Controllers;

use App\Models\RecentProject;
use Illuminate\Http\Request;

class RecentProjectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recentProjects = RecentProject::with('user')->get();
        return response()->json(['data' => $recentProjects]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recent = new RecentProject();
        $recent->name = $request->name;
        $recent->description = $request->description;
        $recent->user_id = $request->user_id;
        $recent->url = $request->url;
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

        public function manageProject(Request $request)
        {
            $query = $request->get('query');
            $perPage = $request->input('per_page', 1); // Default to 1 item per page if not specified

            if ($query) {
                $recent_project = RecentProject::where('name', 'LIKE', "%$query%")->paginate($perPage);
            } else {
                $recent_project = RecentProject::paginate($perPage);
            }

            return response()->json($recent_project);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecentProject $recentProject)
    {
        $recentProject->name = $request->name;
        $recentProject->description = $request->description;
        $recentProject->user_id = $request->user_id;
        $recentProject->url = $request->url;
        $recentProject->save();
        return response()->json(['data' => $recentProject, "success" => true, "msg" => "RecentProject Updated Succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecentProject $recentProject)
    {
        $recentProject->delete();
        return response()->json(['data' => $recentProject, "success" => true, "msg" => "RecentProject delete Succcessfully"]);
    }
}

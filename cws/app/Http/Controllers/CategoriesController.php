<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cat = new Categories();
        $cat->cat_title = $request->cat_title;
        $cat->cat_description = $request->cat_description;
        $cat->save();
        return response()->json(['data' => $cat, "success" => true, "msg" => "categories Inserted Succcessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        return response()->json(["data" => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        $categories->cat_title = $request->cat_title;
        $categories->cat_description = $request->cat_description;
        $categories->save();
        return response()->json(['data' => $categories, "success" => true, "msg" => "categories Updated Succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        return response()->json($categories);
        $categories->delete();
        return response()->json(['data' => $categories, "success" => true, "msg" => "categories delete Succcessfully"]);
    }
}

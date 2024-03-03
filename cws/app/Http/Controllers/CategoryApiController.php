<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cat = new Category();
        $cat->cat_title = $request->cat_title;
        $cat->cat_description = $request->cat_description;
        $cat->save();
        return response()->json(['data' => $cat, "success" => true, "msg" => "Category Inserted Succcessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        return response()->json(["data" => $Category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category)
    {
        $Category->cat_title = $request->cat_title;
        $Category->cat_description = $request->cat_description;
        $Category->save();
        return response()->json(['data' => $Category, "success" => true, "msg" => "Category Updated Succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return response()->json(['data' => $Category, "success" => true, "msg" => "Category delete Succcessfully"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return response()->json(['data' => $cat, "success" => true, "msg" => "categories Inserted Succcessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(["data" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->cat_title = $request->cat_title;
        $category->cat_description = $request->cat_description;
        $category->save();
        return response()->json(['data' => $category, "success" => true, "msg" => "categories Updated Succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['data' => $category, "success" => true, "msg" => "categories delete Succcessfully"]);
    }
}

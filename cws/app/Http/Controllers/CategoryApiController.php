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
    public function update(Request $request, Category $category)
    {
        $category->cat_title = $request->title; // Adjusting to match the input name
        $category->cat_description = $request->description; // Adjusting to match the input name
        $category->save();

        return response()->json([
            'data' => $category,
            'success' => true,
            'msg' => 'Category updated successfully'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return response()->json(['data' => $Category, "success" => true, "msg" => "Category delete Succcessfully"]);
    }

    public function viewCategory($id)
    {       
        $category = Category::findOrFail($id); 
        $courses = $category->courses()->get();

        return response()->json(["data" => $courses]);
    }
}

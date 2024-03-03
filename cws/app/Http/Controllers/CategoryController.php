<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function insertCategory()
    {
        return view('admin.insertCategory');
    }

    public function manageCategory()
    {
        return view('admin.manageCategory');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function insertCategory()
    {
        return view("admin.insertCategory");
    }
    public function manageCategory()
    {
        return view("admin.manageCategory");
    }
}

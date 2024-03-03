<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function insertCourse()
    {
        return view("admin.insertCourse");
    }

    public function manageCourse()
    {
        return view("admin.manageCourse");
    }
}

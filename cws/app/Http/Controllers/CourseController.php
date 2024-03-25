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

    public function exploreCourse(Request $request, $cat_slug, $slug){
        $course = Course::where("course_slug",$slug)->first();
        
        return view('home.exploreCourse',compact('course'));
    }

    public function allCourses(){
        return view('home.allCourses');
    }
}

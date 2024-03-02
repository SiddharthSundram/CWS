<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function insertCategory(){
        return view("admin.insertCategory");
    }
    public function insertCourse(){
        return view("admin.insertCourse");
    }
    public function manageCourse(){
        return view("admin.manageCourse");
    }
    public function manageCategory(){
        return view("admin.manageCategory");
    }
    public function recent_project(){
        return view("admin.recent_project");
    }
    public function hallFrame(){
        return view("admin.hallFrame");
    }
}

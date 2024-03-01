<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home.index");
    }
    public function signin(){
        return view("home.login");
    }
    public function signout(){
        return view("home.logout");
    }

    public function signup(){
        return view("home.register");
    }

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
}

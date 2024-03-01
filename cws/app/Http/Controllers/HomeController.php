<?php

namespace App\Http\Controllers;
use App\Models\RecentProject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $recent_projects = RecentProject::all();
        return view('home.index', compact('recent_projects'));
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
}

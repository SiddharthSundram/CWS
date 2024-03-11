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

    public function signup(){
        return view("home.register");
    }

    public function profile(){
        return view("home.profile");
    }

    public function myCourse(){
        return view("home.myCourse");
    }

    public function about(){
        return view("home.about");
    }

    public function tandc(){
        return view("home.tAndC");
    }

    public function privacy(){
        return view("home.privacy");
    }


    public function help(){
        return view("home.help");
    }

    public function achievements(){
        return view("home.achievements");
    }


    
}

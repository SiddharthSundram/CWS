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

    public function signup(){
        return view("home.register");
    }

    public function dashboard(){
        return view("admin.dashboard");
    }
}

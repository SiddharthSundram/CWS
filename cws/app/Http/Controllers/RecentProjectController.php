<?php

namespace App\Http\Controllers;

use App\Models\RecentProject;
use Illuminate\Http\Request;

class RecentProjectController extends Controller
{
    
    public function recent_project(){
        return view("admin.recent_project");
    }

    public function viewProject(){
        return view("home.viewProject");
    }
}

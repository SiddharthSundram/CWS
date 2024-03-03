<?php

namespace App\Http\Controllers;

use App\Models\hallFrame;
use Illuminate\Http\Request;

class hallFrameController extends Controller
{

    public function manageHallframe()
    {
        return view("admin.manageHallframe");
    }

    public function hallFrame()
    {
        return view("admin.hallFrame");
    }
}

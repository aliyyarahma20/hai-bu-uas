<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningController extends Controller
{
    //
    public function index(){
        return view('users.dashboard_user');
    }
}

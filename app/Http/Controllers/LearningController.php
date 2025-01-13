<?php

namespace App\Http\Controllers;

use App\Models\ModuleBahasa;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    //
    public function index(){
        // $modules = ModuleBahasa::all();
        return view('users.modul.learning');
    }
}

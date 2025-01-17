<?php

namespace App\Http\Controllers;

use App\Models\ModuleBahasa;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index(Request $request, $moduleId = null)
{
    $modules = $moduleId 
        ? ModuleBahasa::where('id', $moduleId)->get() 
        : ModuleBahasa::all();

    // Ambil module_student_id dari request atau parameter
    $moduleStudentId = $request->get('module_student_id');

    return view('users.modul.language-module', [
        'modules' => $modules,
        'moduleStudentId' => $moduleStudentId,
    ]);
}

    
}

?>
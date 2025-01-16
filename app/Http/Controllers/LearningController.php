<?php

namespace App\Http\Controllers;

use App\Models\ModuleBahasa;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index($moduleId = null)
    {
        if ($moduleId) {
            // Jika ada ID, wrap single object dalam collection
            $modules = collect([ModuleBahasa::findOrFail($moduleId)]);
        } else {
            // Jika tidak ada ID, ambil semua
            $modules = ModuleBahasa::all();
        }

        return view('users.modul.learning', compact('modules'));
    }
}

?>
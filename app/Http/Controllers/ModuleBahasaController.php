<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ModuleBahasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ModuleBahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modules = ModuleBahasa::orderBy('id', 'DESC')->get();
        return view('admin.modul.index', [
            'modules'=> $modules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.modul.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request ->validate([
            'nama' => 'required|string|max:225',
            'description' => 'required|string',
            'categories_id' => 'required|integer',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('produc_covers', 'public');
                $validated['cover'] = $coverPath;
            }
            $validated['slug']= Str::slug($validated['nama']);
            $newModule = ModuleBahasa::create($validated);
            DB::commit();
            return redirect()->route('dashboard.module-bahasa.index');
        }
        catch (\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ModuleBahasa $moduleBahasa)
    {
        //
        $students = $moduleBahasa->students()->orderBy('id', 'DESC')->get();
        $questions = $moduleBahasa->question()->orderBy('id', 'DESC')->get();


        return view('admin.modul.manage', [
            'modules' => $moduleBahasa,
            'students' => $students,
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModuleBahasa $moduleBahasa)
    {
        //
        $categories = Category::all();
        return view('admin.modul.edit', [
            'modules'=> $moduleBahasa,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuleBahasa $moduleBahasa)
    {
        //
        $validated = $request ->validate([
            'nama' => 'required|string|max:225',
            'description' => 'required|string',
            'categories_id' => 'required|integer',
            'cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('produc_covers', 'public');
                $validated['cover'] = $coverPath;
            }
            $validated['slug']= Str::slug($validated['nama']);
            $moduleBahasa->update($validated);

            DB::commit();
            return redirect()->route('dashboard.module-bahasa.index');
        }
        catch (\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuleBahasa $moduleBahasa)
    {
        //
        try{
            $moduleBahasa->delete();
            return redirect()->route('dashboard.module-bahasa.index')->with('success', 'Modul berhasil dihapus.');
        }
        catch (\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }  
    }
}

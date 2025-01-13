<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ModuleBahasa;
use App\Models\ModuleStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class ModuleStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Ambil daftar modul yang berisi kategori tertentu
        $moduls = ModuleBahasa::with('category')->get();

        return view('pilih-bahasa', [
            'moduls' => $moduls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ModuleBahasa $moduleBahasa)
    {
        //
        $categories = Category::all();
        return view('pilih-bahasa', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi input category_id
    $request->validate([
        'categories_id' => 'required|exists:categories,id', // Pastikan category_id ada
    ]);

    // Ambil kategori yang dipilih
    $category = Category::findOrFail($request->categories_id);

    // Ambil semua ModuleBahasa yang terkait dengan category_id yang dipilih
    $moduleBahasas = $category->moduleBahasas;

    // Jika tidak ada ModuleBahasa untuk kategori ini, tampilkan pesan error
    if ($moduleBahasas->isEmpty()) {
        return back()->withErrors(['module_bahasa' => 'Tidak ada Module Bahasa untuk kategori ini.']);
    }

    // Mulai transaksi DB
    DB::beginTransaction();
    try {
        // Simpan data ModuleStudents untuk setiap ModuleBahasa yang relevan
        foreach ($moduleBahasas as $moduleBahasa) {
            ModuleStudents::create([
                'user_id' => auth()->id(),
                'module_bahasa_id' => $moduleBahasa->id,
            ]);
        }

        // Commit transaksi jika berhasil
        DB::commit();

        // Redirect ke halaman learning setelah berhasil
        return redirect()->route('dashboard.learning.index')->with('success', 'Module Bahasa berhasil dipilih!');
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi error
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
    public function show(ModuleStudents $moduleStudents)
    {
        //
        $modules = ModuleBahasa::All();
        return view('users.dashboard_user',[
            'modules' => $modules,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModuleStudents $moduleStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuleStudents $moduleStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuleStudents $moduleStudents)
    {
        //
    }
}

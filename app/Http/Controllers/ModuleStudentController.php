<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ModuleBahasa;
use App\Models\ModuleStudents;
use App\Models\Kamus;
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
        // Ambil daftar modul yang berisi kategori tertentu
        $categories = Category::all();

        return view('users.pilih-bahasa.index', [
            'categories' => $categories,    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ModuleBahasa $moduleBahasa)
    {
        
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

        // Mulai transaksi DB
        DB::beginTransaction();
        try {
            $moduleStudents = ModuleStudents::create([
                    'user_id' => auth()->id(),
                    'categories_id' => $category->id,
                ]);
            
            // Commit transaksi jika berhasil
            DB::commit();
    
            // Redirect ke halaman learning setelah berhasil
            return redirect()->route('user.dashboard', ['id' => $moduleStudents->id])->with('success', 'Module Bahasa berhasil dipilih!');
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
    public function show(ModuleStudents $moduleStudents, $id, Request $request)
    {
        // Cari data ModuleStudents berdasarkan ID
        $moduleStudents = ModuleStudents::where('id', $id)->first();
        $kamus = Kamus::orderBy('id', 'DESC')->get();

        // Jika data tidak ditemukan, lemparkan 404
        if (!$moduleStudents) {
            abort(404, 'Data tidak ditemukan.');
        }

        // Pastikan hanya user dengan user_id yang sama yang dapat mengakses
        if ($moduleStudents->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }

        // Mendapatkan kategori dari ModuleStudents
        $categoryId = $moduleStudents->categories_id;

        // Mengambil modul dengan kategori yang sama
        $modules = ModuleBahasa::where('categories_id', $categoryId)->get();

        return view('users.dashboard_user', [
            'modules' => $modules,
            'moduleStudentId' => $moduleStudents->id, // Kirim ID untuk digunakan di LearningController
            'user' => $request->user(),
            'kamus' => $kamus,
        ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModuleStudents $moduleStudents)
    {
        
        $categories = Category::all();
        return view('users.pilih-bahasa.edit', [
            'moduleStudents' => $moduleStudents,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuleStudents $moduleStudents)
    {
       
        // Validasi input
        $request->validate([
            'categories_id' => 'required|exists:categories,id', // Pastikan kategori valid
        ]);

        // Ambil kategori yang dipilih
        $category = Category::findOrFail($request->categories_id);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Cek apakah sudah ada data module_students dengan user_id DAN categories_id yang sama
            $existingModuleStudent = ModuleStudents::where('user_id', auth()->id())
                ->where('categories_id', $category->id)
                ->first();
    
            if ($existingModuleStudent) {
                // Jika data dengan user_id dan categories_id yang sama ditemukan, update data
                $existingModuleStudent->update([
                    'categories_id' => $category->id, // Update jika diperlukan
                ]);

                $moduleStudents = $existingModuleStudent;
                
            } else {
                // Jika data tidak ditemukan, buat data baru
                $moduleStudents=ModuleStudents::create([
                    'user_id' => auth()->id(),
                    'categories_id' => $category->id,
                ]);
            }

            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect ke halaman tertentu dengan pesan sukses
            return redirect()->route('user.dashboard', ['id' => $moduleStudents->id])->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();
             // Debug error: Menyimpan pesan error untuk membantu debugging
            \Log::error('Error saat menyimpan module_students: ' . $e->getMessage());
    
            return back()->withErrors([
                'system_error' => 'Terjadi kesalahan pada sistem. Silakan coba lagi. Error: ' . $e->getMessage(),
            ]);
        }
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuleStudents $moduleStudents)
    {
        //
    }
}

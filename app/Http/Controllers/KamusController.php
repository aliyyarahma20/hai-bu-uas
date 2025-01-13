<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kamus;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KamusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamus = Kamus::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.kamus.index', [
            'kamus' => $kamus,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::all();
        return view('admin.kamus.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'categories_id' => 'required|integer|exists:categories,id',
            'link' => 'required|string|url|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Menyimpan data ke tabel kamus
            $kamus = Kamus::create([
                'categories_id' => $validated['categories_id'],
                'link' => $validated['link'],
            ]);

            DB::commit();

            return redirect()->route('dashboard.kamus.index')->with('success', 'Data kamus berhasil ditambahkan');
        } catch (\Exception $e) {
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
    public function show(Kamus $kamus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamus $kamus, $id)
    {
        //
        $kamus = Kamus::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.kamus.edit', [
            'kamus'=> $kamus,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamus $kamus, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'categories_id' => 'required|integer|exists:categories,id',
            'link' => 'required|string|url|max:255',
        ]);

        DB::beginTransaction();
        $kamus = Kamus::where('id', $id)->first();
        try {
            // Mengupdate data pada instance model Kamus
            $kamus->update([
                'categories_id' => $validated['categories_id'],
                'link' => $validated['link'],
            ]);

            DB::commit();
            return redirect()->route('dashboard.kamus.index')->with('success', 'Data kamus berhasil diperbarui');
        } catch (\Exception $e) {
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
    public function destroy(Kamus $kamus, $id)
    {
        $kamus = Kamus::where('id', $id)->first();
        try{
            $kamus->delete();
            return redirect()->route('dashboard.kamus.index')->with('success', 'Kamus berhasil dihapus.');
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

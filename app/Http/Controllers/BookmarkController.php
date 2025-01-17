<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\ModuleBahasa;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        // Ambil kategori dari user yang sedang login
        $userCategory = auth()->user()->category_id;
        
        $bookmarks = auth()->user()->bookmarks()
            ->with('moduleBahasa')
            ->whereHas('moduleBahasa', function($query) use ($userCategory) {
                $query->where('categories_id', $userCategory);
            })

            ->latest()
            ->get();
            
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_bahasa_id' => 'required|exists:module_bahasas,id',
            'title' => 'required|string|max:255',
        ]);
        
        $userCategory = auth()->user()->category_id;

        $moduleBahasa = ModuleBahasa::find($request->module_bahasa_id);
        if ($moduleBahasa->category_id !== $userCategory) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke modul ini.');
        }

        try {
            auth()->user()->bookmarks()->create($validated);
            return redirect()->back()->with('success', 'Modul berhasil dibookmark!');
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'Modul ini sudah ada di bookmark Anda.');
            }
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function destroy(Bookmark $bookmark)
    {
        if ($bookmark->user_id !== auth()->id()) {
            abort(403);
        }

        $bookmark->delete();
        return redirect()->back()->with('success', 'Bookmark berhasil dihapus!');
    }
}

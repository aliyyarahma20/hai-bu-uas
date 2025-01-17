<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Str;

class UserProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index', [
            'user'=> $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProgress $userProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|email',
            'photos' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('photos')) {
                $coverPath = $request->file('photos')->store('produc_photos', 'public');
                $validated['photos'] = $coverPath;
            }

            // Jangan mengubah password
            $user->update($validated);

            DB::commit();
            
            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard.user.index')->with('success', 'User updated successfully.');
            } else {
                return back()->with('success', 'Berhasil edit profile.');
            }

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
    public function destroy(User $user)
    {
        //
        try{
            $user->delete();
            return redirect()->route('dashboard.user.index')->with('success', 'Pengguna berhasil dihapus.');
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

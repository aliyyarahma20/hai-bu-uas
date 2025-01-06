<?php

namespace App\Http\Controllers;

use App\Models\ModuleBahasa;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\RetryBatchCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ModuleBahasa $moduleBahasa)
    {
        //
        $students = $moduleBahasa->students()->orderBy('id', 'DESC')->get();

        return view('admin.kuis.create',[
            'moduleBahasa' => $moduleBahasa,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ModuleBahasa $moduleBahasa)
    {
        //
        $validated = $request ->validate([
            'soal' => 'required|string|max:225',
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|string',
            'correct_answer' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {

            $question = $moduleBahasa->question()->create([
                'soal' => $request->soal,
            ]);

            foreach($request->jawaban as $index => $jawabanTeks){
                $isCorrect = ($request->correct_answer == $index);
                $question->answer()->create([
                    'jawaban' => $jawabanTeks,
                    'is_correct' => $isCorrect,
                ]);
            }
            DB::commit();

            return redirect()->route('dashboard.module-bahasa.show', $moduleBahasa->id)->with('success', 'Soal berhasil ditambahkan');
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
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
        
        $moduleBahasa = $question->modulebahasa;
        $students = $moduleBahasa->students()->orderBy('id', 'DESC')->get();

        return view('admin.kuis.edit', [
           'question' => $question, 
           'moduleBahasa' => $moduleBahasa,
           'students' => $students,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
        $validated = $request ->validate([
            'soal' => 'required|string|max:225',
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|string',
            'correct_answer' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {

            $question->update([
                'soal' => $request->soal,
            ]);

            $question->answer()->delete();

            foreach($request->jawaban as $index => $jawabanTeks){
                $isCorrect = ($request->correct_answer == $index);
                $question->answer()->create([
                    'jawaban' => $jawabanTeks,
                    'is_correct' => $isCorrect,
                ]);
            }
            DB::commit();

            return redirect()->route('dashboard.module-bahasa.show', $question->module_bahasa_id)->with('success', 'Soal berhasil ditambahkan');
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
    public function destroy(Question $question)
    {
        //
        try{
            $question->delete();
            return redirect()->route('dashboard.module-bahasa.show', $question->module_bahasa_id)->with('success', 'Modul berhasil dihapus.');
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

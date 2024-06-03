<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('Surveys.index', compact('Surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('Surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required',
            'tanggal' => 'required|date',
            'admin_id' => 'required|exists:admin,id',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('surveys.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('surveys.edit', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'bidang' => 'required',
            'tanggal' => 'required|date',
            'admin_id' => 'required|exists:admins,id',
        ]);

        $survey->update($request->all());
        return redirect()->route('surveys.index')
            ->with('success', 'Survey updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')
            ->with('success', 'Survey deleted successfully.');
    }
}

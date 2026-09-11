<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Employee;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::withCount('employees')->latest()->paginate(10);

        return view('trainings.index', [
            'trainings' => $trainings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();

        return view('trainings.create', [
            'employees' => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'employees'   => 'nullable|array',
            'employees.*' => 'exists:employees,id',
        ]);

        $training = Training::create($validated);

        if ($request->has('employees')) {
            $training->employees()->sync($request->employees);
        }

        return redirect()->route('trainings.index')
            ->with('success', 'Training program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        $training->load('employees');

        return view('trainings.show', [
            'training' => $training,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        $employees = Employee::all();
        $training->load('employees');

        return view('trainings.edit', [
            'training' => $training,
            'employees' => $employees,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'employees'   => 'nullable|array',
            'employees.*' => 'exists:employees,id',
        ]);

        $training->update($validated);
        $training->employees()->sync($request->input('employees', []));

        return redirect()->route('trainings.index')
            ->with('success', 'Training program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->employees()->detach();
        $training->delete();

        return redirect()->route('trainings.index')
            ->with('success', 'Training program deleted successfully.');
    }
}

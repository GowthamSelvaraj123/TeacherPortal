<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Teacher::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'students_name' => 'required|string|max:255',
            'students_subject' => 'required|string|max:255',
            'students_marks' => 'required|string'
        ]);
        $existingStudent = Teacher::where('students_name', $request->input('students_name'))
        ->where('students_subject', $request->input('students_subject'))
        ->first();
    if ($existingStudent) {
        $existingMarks = (int) $existingStudent->students_marks;
        $newMarks = (int) $request->input('students_marks');
        $updatedMarks = $newMarks;

        $existingStudent->update([
            'students_marks' => $updatedMarks
        ]);

        return redirect()->route('students.index')->with('success', 'Student marks updated successfully.');
    }
        Teacher::create([
            'students_name' => $request->input('students_name'),
            'students_subject' => $request->input('students_subject'),
            'students_marks' => $request->input('students_marks')
        ]);
    
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Teacher::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Teacher::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                //dd($request->all());
                $request->validate([
                    'students_name' => 'required|string|max:255',
                    'students_subject' => 'required|string|max:255',
                    'students_marks' => 'required|string'
                ]);
                
                $teacher = Teacher::findOrFail($id);

                // Manually update each field and save
                $teacher->update([
                    'students_name' => $request->input('students_name'),
                    'students_subject' => $request->input('students_subject'),
                    'students_marks' => $request->input('students_marks')
                ]);
            
                // Redirect with success message
                return redirect()->route('students.index')->with('success', 'Student data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        // Redirect with success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

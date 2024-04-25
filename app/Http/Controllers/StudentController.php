<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'course' => 'nullable|string',
            'year' => 'required|string',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->year = $request->year;
        $student->course = $request->course;

        $student->save();
        return response()->json(['message' => 'Data saved successfully']);
    
    }

    public function read()
    {
        $students = Student::all();

        return response()->json($students);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data if needed
    
        // Find the student by ID
        $student = Student::find($id);
    
        // Check if the student exists
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }
    
        // Update the student data
        $student->update($request->all());
    
        // Return the updated student
        return response()->json($student, 200);
    }

    public function getStudentID($id)
    {
    // Find the student by ID
    $student = Student::find($id);

    // Check if the student exists
    if (!$student) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    // Return the student details
    return response()->json($student);
    }

    public function destroy($id)
    {
    // Find the student by ID
    $student = Student::find($id);

    // Check if the student exists
    if (!$student) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    // Delete the student
    $student->delete();

    // Return a success message
    return response()->json(['message' => 'Student deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!can_admin()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::query()
            ->when($search, function ($q, $search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('firstname', 'like', "%{$search}%")
                  ->orWhere('lastname', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        $classrooms = \App\Models\Classroom::orderBy('room_name')->get();
        return view('students.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $request->has('active');

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'เพิ่มนักศึกษาเรียบร้อยแล้ว');
    }

    public function edit(Student $student)
    {
        $classrooms = \App\Models\Classroom::orderBy('room_name')->get();
        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id,' . $student->id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $request->has('active');

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'อัปเดตข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'ลบนักศึกษาเรียบร้อยแล้ว');
    }
}

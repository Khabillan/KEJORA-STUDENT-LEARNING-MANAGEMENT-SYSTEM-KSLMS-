<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    private function getStudents(Request $request): array
    {
        return $request->session()->get('students', []);
    }

    private function saveStudents(Request $request, array $students): void
    {
        $request->session()->put('students', $students);
    }

    // Linear search by Student ID
    private function findStudentIndexById(array $students, string $studentId): int
    {
        for ($i = 0; $i < count($students); $i++) {
            $s = $students[$i];

            if ($s->getStudentId() === $studentId) {
                return $i;
            }
        }

        return -1;
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'student_id' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'phone_number' => 'required|string|max:20',
        ]);

        $students = $this->getStudents($request);

        if ($this->findStudentIndexById($students, $validated['student_id']) !== -1) {
            return back()->withErrors(['student_id' => 'Student ID already exists.'])->withInput();
        }

        $students[] = new Student(
            $validated['name'],
            $validated['student_id'],
            $validated['email'],
            $validated['phone_number']
        );

        $this->saveStudents($request, $students);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function index(Request $request)
    {
        $students = $this->getStudents($request);
        return view('students.index', compact('students'));
    }

    public function searchForm()
    {
        return view('students.search');
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:30'
        ]);

        $students = $this->getStudents($request);
        $idx = $this->findStudentIndexById($students, $validated['student_id']);

        if ($idx === -1 || !isset($students[$idx])) {
            return back()->with('not_found', 'Student not found.');
        }

        $student = $students[$idx];
        return view('students.search_result', compact('student'));
    }

    public function edit(Request $request, string $studentId)
    {
        $students = $this->getStudents($request);
        $idx = $this->findStudentIndexById($students, $studentId);

        if ($idx === -1 || !isset($students[$idx])) {
            return redirect()->route('students.search.form')->with('not_found', 'Student not found.');
        }

        $student = $students[$idx];
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $studentId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone_number' => 'required|string|max:20',
        ]);

        $students = $this->getStudents($request);
        $idx = $this->findStudentIndexById($students, $studentId);

        if ($idx === -1 || !isset($students[$idx])) {
            return redirect()->route('students.search.form')->with('not_found', 'Student not found.');
        }

        $student = $students[$idx];
        $student->setName($validated['name']);
        $student->setEmail($validated['email']);
        $student->setPhoneNumber($validated['phone_number']);

        $students[$idx] = $student;
        $this->saveStudents($request, $students);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function confirmDelete(Request $request, string $studentId)
    {
        $students = $this->getStudents($request);
        $idx = $this->findStudentIndexById($students, $studentId);

        if ($idx === -1 || !isset($students[$idx])) {
            return redirect()->route('students.search.form')->with('not_found', 'Student not found.');
        }

        $student = $students[$idx];
        return view('students.delete_confirm', compact('student'));
    }

    public function destroy(Request $request, string $studentId)
    {
        $students = $this->getStudents($request);
        $idx = $this->findStudentIndexById($students, $studentId);

        if ($idx === -1 || !isset($students[$idx])) {
            return redirect()->route('students.search.form')->with('not_found', 'Student not found.');
        }

        array_splice($students, $idx, 1);
        $this->saveStudents($request, $students);

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
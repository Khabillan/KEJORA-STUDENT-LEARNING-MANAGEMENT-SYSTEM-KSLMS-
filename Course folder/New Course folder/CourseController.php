<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    private function getCourses(Request $request): array
    {
        return $request->session()->get('courses', []);
    }

    private function saveCourses(Request $request, array $courses): void
    {
        $request->session()->put('courses', $courses);
    }

    // Linear search by Course Code
    private function findCourseIndexByCode(array $courses, string $courseCode): int
    {
        for ($i = 0; $i < count($courses); $i++) {
            $course = $courses[$i];

            if ($course->getCourseCode() === $courseCode) {
                return $i;
            }
        }

        return -1;
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:30',
            'course_name' => 'required|string|max:150',
            'course_type' => 'required|string|in:core,elective,university',
        ]);

        $courses = $this->getCourses($request);

        if ($this->findCourseIndexByCode($courses, $validated['course_code']) !== -1) {
            return back()->withErrors(['course_code' => 'Course code already exists.'])->withInput();
        }

        $courses[] = new Course(
            $validated['course_code'],
            $validated['course_name'],
            $validated['course_type']
        );

        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    public function index(Request $request)
    {
        $courses = $this->getCourses($request);
        return view('courses.index', compact('courses'));
    }

    public function searchForm()
    {
        return view('courses.search');
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:30',
        ]);

        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $validated['course_code']);

        if ($idx === -1 || !isset($courses[$idx])) {
            return back()->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.search_result', compact('course'));
    }

    public function edit(Request $request, string $courseCode)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $courseCode);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, string $courseCode)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:150',
            'course_type' => 'required|string|in:core,elective,university',
        ]);

        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $courseCode);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        $course->setCourseName($validated['course_name']);
        $course->setCourseType($validated['course_type']);

        $courses[$idx] = $course;
        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function confirmDelete(Request $request, string $courseCode)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $courseCode);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.delete_confirm', compact('course'));
    }

    public function destroy(Request $request, string $courseCode)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $courseCode);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        array_splice($courses, $idx, 1);
        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
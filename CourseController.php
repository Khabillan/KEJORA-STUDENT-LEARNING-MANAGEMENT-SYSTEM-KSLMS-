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

    // Linear search by course code
    private function findCourseIndexByCode(array $courses, string $code): int
    {
        for ($i = 0; $i < count($courses); $i++) {
            /** @var Course $c */
            $c = $courses[$i];
            if ($c->getCode() === $code) {
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
            'name' => 'required|string|max:200',
            'code' => 'required|string|max:30',
            'credit_hour' => 'required|integer|min:0|max:30',
            'summary' => 'required|string|max:2000',
            'ms_teams_link' => 'required|url|max:500',
        ]);

        $courses = $this->getCourses($request);

        // Prevent duplicate course code (good practice)
        if ($this->findCourseIndexByCode($courses, $validated['code']) !== -1) {
            return back()->withErrors(['code' => 'Course code already exists.'])->withInput();
        }

        $courses[] = new Course(
            $validated['name'],
            $validated['code'],
            (int)$validated['credit_hour'],
            $validated['summary'],
            $validated['ms_teams_link']
        );

        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course added!');
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
            'code' => 'required|string|max:30'
        ]);

        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $validated['code']);

        if ($idx === -1) {
            return back()->with('not_found', 'Course not found.');
        }

        // Safe access (prevents out-of-bound)
        if (!isset($courses[$idx])) {
            return back()->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.search_result', compact('course'));
    }

    public function edit(Request $request, string $code)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $code);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, string $code)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'credit_hour' => 'required|integer|min:0|max:30',
            'summary' => 'required|string|max:2000',
            'ms_teams_link' => 'required|url|max:500',
        ]);

        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $code);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        /** @var Course $course */
        $course = $courses[$idx];
        $course->setName($validated['name']);
        $course->setCreditHour((int)$validated['credit_hour']);
        $course->setSummary($validated['summary']);
        $course->setMsTeamsLink($validated['ms_teams_link']);

        $courses[$idx] = $course; // save back
        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course updated!');
    }

    public function confirmDelete(Request $request, string $code)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $code);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        $course = $courses[$idx];
        return view('courses.delete_confirm', compact('course'));
    }

    public function destroy(Request $request, string $code)
    {
        $courses = $this->getCourses($request);
        $idx = $this->findCourseIndexByCode($courses, $code);

        if ($idx === -1 || !isset($courses[$idx])) {
            return redirect()->route('courses.search.form')->with('not_found', 'Course not found.');
        }

        array_splice($courses, $idx, 1); // delete safely
        $this->saveCourses($request, $courses);

        return redirect()->route('courses.index')->with('success', 'Course deleted!');
    }
}
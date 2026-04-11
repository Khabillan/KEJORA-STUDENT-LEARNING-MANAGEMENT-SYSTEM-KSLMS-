<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    private function getCourses(Request $request): array
    {
        return $request->session()->get('courses', []);
    }

    private function getStudents(Request $request): array
    {
        return $request->session()->get('students', []);
    }

    private function getEnrollments(Request $request): array
    {
        return $request->session()->get('enrollments', []);
    }

    private function saveEnrollments(Request $request, array $enrollments): void
    {
        $request->session()->put('enrollments', $enrollments);
    }

    private function findCourseByCode(array $courses, string $courseCode)
    {
        foreach ($courses as $course) {
            if ($course->getCourseCode() === $courseCode) {
                return $course;
            }
        }
        return null;
    }

    private function findStudentById(array $students, string $studentId)
    {
        foreach ($students as $student) {
            if ($student->getStudentId() === $studentId) {
                return $student;
            }
        }
        return null;
    }

    private function enrollmentExists(array $enrollments, string $studentId, string $courseCode): bool
    {
        foreach ($enrollments as $enrollment) {
            if (
                $enrollment['student_id'] === $studentId &&
                $enrollment['course_code'] === $courseCode
            ) {
                return true;
            }
        }
        return false;
    }

    public function create()
    {
        return view('enrollments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string',
            'course_code' => 'required|string',
        ]);

        $students = $this->getStudents($request);
        $courses = $this->getCourses($request);
        $enrollments = $this->getEnrollments($request);

        $student = $this->findStudentById($students, $validated['student_id']);
        $course = $this->findCourseByCode($courses, $validated['course_code']);

        if (!$student) {
            return back()->with('error', 'Student not found.');
        }

        if (!$course) {
            return back()->with('error', 'Course not found.');
        }

        if ($this->enrollmentExists($enrollments, $validated['student_id'], $validated['course_code'])) {
            return back()->with('error', 'This student is already assigned to this course.');
        }

        $enrollments[] = [
            'student_id' => $validated['student_id'],
            'course_code' => $validated['course_code'],
        ];

        $this->saveEnrollments($request, $enrollments);

        return back()->with('success', 'Course-student relationship added successfully.');
    }

    public function listCoursesByStudent(Request $request, string $studentId)
    {
        $students = $this->getStudents($request);
        $courses = $this->getCourses($request);
        $enrollments = $this->getEnrollments($request);

        $student = $this->findStudentById($students, $studentId);

        if (!$student) {
            return back()->with('error', 'Student not found.');
        }

        $studentCourses = [];

        foreach ($enrollments as $enrollment) {
            if ($enrollment['student_id'] === $studentId) {
                $course = $this->findCourseByCode($courses, $enrollment['course_code']);
                if ($course) {
                    $studentCourses[] = $course;
                }
            }
        }

        if (count($studentCourses) === 0) {
            return back()->with('error', 'Student has no assigned course.');
        }

        return view('enrollments.student_courses', compact('student', 'studentCourses'));
    }

    public function listStudentsByCourse(Request $request, string $courseCode)
    {
        $students = $this->getStudents($request);
        $courses = $this->getCourses($request);
        $enrollments = $this->getEnrollments($request);

        $course = $this->findCourseByCode($courses, $courseCode);

        if (!$course) {
            return back()->with('error', 'Course not found.');
        }

        $courseStudents = [];

        foreach ($enrollments as $enrollment) {
            if ($enrollment['course_code'] === $courseCode) {
                $student = $this->findStudentById($students, $enrollment['student_id']);
                if ($student) {
                    $courseStudents[] = $student;
                }
            }
        }

        if (count($courseStudents) === 0) {
            return back()->with('error', 'Course has no assigned student.');
        }

        return view('enrollments.course_students', compact('course', 'courseStudents'));
    }
}
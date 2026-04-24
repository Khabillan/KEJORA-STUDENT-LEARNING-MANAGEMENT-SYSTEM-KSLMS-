KEJORA-STUDENT-LEARNING-MANAGEMENT-SYSTEM (KSLMS)


---



A Student Learning Management System (SLMS) developed to manage students, courses, learning materials, and academic records within a centralized and user-friendly platform, aimed at improving the organization and accessibility of educational information for both students and administrators.






📌 Project Overview

KSLMS is a Laravel-based web application developed as part of the Software Construction and Methods (CSEB5223) coursework.

This system focuses on demonstrating:

Object-Oriented Programming (OOP)
Class design with encapsulation
Getter and Setter methods
Array manipulation
Linear search algorithm
CRUD operations (without database)
MVC architecture implementation
Responsive UI using Bootstrap 5

The system manages both Course Profiles and Student Profiles using session-based storage.







⚙️ System Features

📚 Course Management
Add new course profile
View all courses
Search course by course code (Linear Search)
Edit course (Course code is not editable)
Delete course with confirmation






👨‍🎓 Student Management
Add new student profile
View all students
Search student by student ID (Linear Search)
Edit student (Student ID is not editable)
Delete student with confirmation


---



🔗 Enrollment (Course–Student Relationship)

The system supports assigning students to courses.

Features:
Assign student to course
Prevent duplicate enrollment
Validate student and course existence
View courses by student
View students by course
Relationship:
One Student → Many Enrollments
One Course → Many Enrollments
Overall: Many-to-Many relationship via Enrollment







🌐 API Integration

Simple internal API endpoints are implemented:

/student-ids → Returns student IDs (JSON)
/course-codes → Returns course codes (JSON)

Purpose:
Used for auto-suggestion in enrollment form
Ensures only valid data is used
Improves user experience








⚡ Caching Mechanism

The system uses browser localStorage to cache API results.

Benefits:
Faster input suggestions
Reduced API calls
Improved performance
🛡 Validation & Error Handling
Duplicate course and student ID prevention
Duplicate enrollment prevention
Laravel form validation
Safe array handling using isset()
"Course not found" / "Student not found" handling
Invalid enrollment prevention



---




🧪 Testing

🔹 Unit Testing (Manual)

Tested individual components such as:

Getter methods
Linear search functions
Duplicate checking logic

Includes both:

Valid inputs (expected success)
Invalid inputs (error handling)


🔹 System Testing

Full system testing was conducted to verify integration.

Key Scenarios:
Add Student → Add Course → API → Enrollment
Many-to-many enrollment testing
Duplicate enrollment prevention
Invalid student/course input handling



---



🔄 System Integration

Modules integrated:

Course Module
Student Module
Enrollment Module
API Module

All modules work together seamlessly using session-based storage.






🧠 Technical Implementation

🔹 Programming Concepts
Custom Course class
Custom Student class
Encapsulation
Getter and Setter methods
Linear Search Algorithm
Array index checking
Session-based object storage

🔹 Framework & Tools
Laravel Framework
PHP
Bootstrap 5
Blade Template Engine
MVC Architecture
---

## 📂 Project Structure

app
├── Models
│   ├── Course.php
│   └── Student.php
├── Http
│   └── Controllers
│       ├── CourseController.php
│       ├── StudentController.php
│       └── EnrollmentController.php

routes
└── web.php

resources
└── views
    ├── Layouts
    │   ├── app.blade.php
    │   └── enrollments.blade.php
    ├── courses
    │   ├── create.blade.php
    │   ├── index.blade.php
    │   ├── search.blade.php
    │   ├── search_result.blade.php
    │   ├── edit.blade.php
    │   └── delete_confirm.blade.php
    ├── students
    │   ├── create.blade.php
    │   ├── index.blade.php
    │   ├── search.blade.php
    │   ├── search_result.blade.php
    │   ├── edit.blade.php
    │   └── delete_confirm.blade.php
    └── enrollments
        ├── create.blade.php
        ├── student_courses.blade.php
        └── course_students.blade.php

---

## 🔍 Algorithm Used

### Linear Search Implementation

The system uses linear search to locate both courses and students:

for (i = 0; i < count(array); i++)
if (ID matches)
return index


This ensures:
- Safe array access
- No out-of-bound errors
- Efficient search for small datasets

---



⚠️ Challenges Faced
Handling session-based data instead of database
Preventing duplicate records
Managing many-to-many relationships
Ensuring API returns correct data
Handling invalid user inputs
Integrating all modules smoothly





🚀 Current System Status

The system is able to:

Perform full CRUD operations
Manage students and courses
Assign and manage enrollments
Fetch data using API
Handle invalid and duplicate inputs
Provide a responsive UI





📌 Conclusion

KSLMS successfully demonstrates key software construction concepts including modular design, OOP principles, validation, and system integration. The system is reliable, scalable, and meets all assignment requirements.




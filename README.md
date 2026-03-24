# KEJORA-STUDENT-LEARNING-MANAGEMENT-SYSTEM (KSLMS)

A Student Learning Management System (SLMS) developed to manage students, courses, learning materials, and academic records within a centralized and user-friendly platform, aimed at improving the organization and accessibility of educational information for both students and administrators.

---

## 📌 Project Overview

KSLMS is a Laravel-based web application developed as part of the **Software Construction and Methods (CSEB5223)** coursework.  

This system focuses on demonstrating:

- Object-Oriented Programming (OOP)
- Class design with encapsulation
- Getter and Setter methods
- Array manipulation
- Linear search algorithm
- CRUD operations (without database)
- MVC architecture implementation
- Responsive UI using Bootstrap 5

The system manages both **Course Profiles and Student Profiles** using session-based storage.

---

## ⚙️ System Features

### 📚 Course Management
- Add new course profile
- View all courses
- Search course by course code (Linear Search)
- Edit course (Course code is not editable)
- Delete course with confirmation

### 👨‍🎓 Student Management
- Add new student profile
- View all students
- Search student by student ID (Linear Search)
- Edit student (Student ID is not editable)
- Delete student with confirmation

### 🔗 System Integration
- Course and Student modules are integrated into a single system
- Shared navigation bar for easy access between modules
- Consistent layout using Blade template inheritance

### 🛡 Validation & Error Handling
- Duplicate course and student ID prevention
- Laravel form validation
- Array out-of-bound prevention using `isset()`
- "Course not found" and "Student not found" handling

### 🎨 User Interface
- Responsive layout using Bootstrap 5
- Reusable layout using Blade `@extends`
- Navigation bar for quick access
- Alert system for success and error messages

---

## 🧠 Technical Implementation

### 🔹 Programming Concepts Used
- Custom `Course` class
- Custom `Student` class
- Encapsulation (Private attributes)
- Getter and Setter methods
- Linear Search Algorithm
- Array index checking
- Session-based object storage

### 🔹 Framework & Tools
- Laravel Framework
- PHP
- Bootstrap 5
- Blade Template Engine
- MVC Architecture

---

## 📂 Project Structure


app
├── Models
│ ├── Course.php
│ └── Student.php
├── Http
│ └── Controllers
│ ├── CourseController.php
│ └── StudentController.php

resources
└── views
├── Layouts
│ └── app.blade.php
├── courses
│ ├── create.blade.php
│ ├── index.blade.php
│ ├── search.blade.php
│ ├── search_result.blade.php
│ ├── edit.blade.php
│ └── delete_confirm.blade.php
└── students
├── create.blade.php
├── index.blade.php
├── search.blade.php
├── search_result.blade.php
├── edit.blade.php
└── delete_confirm.blade.php



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







## 📂 Project Structure

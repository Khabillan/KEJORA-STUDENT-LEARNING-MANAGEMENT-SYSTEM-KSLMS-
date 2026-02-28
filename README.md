# KEJORA-STUDENT-LEARNING-MANAGEMENT-SYSTEM-KSLMS-
A Student Learning Management System (SLMS) developed to manage students, courses, learning materials, and academic records within a centralized and user-friendly platform, aimed at improving the organization and accessibility of educational information for both students and administrators.



USE CASE and CLASS DIAGRAM FOR KSLMS 

[USE CASE DIAGRAM AND CLASS DIAGRAM FOR KSLMS.docx](https://github.com/user-attachments/files/25455846/USE.CASE.DIAGRAM.AND.CLASS.DIAGRAM.FOR.KSLMS.docx)

PRE CONSTRUCTION MODULE 
[Student Learning Management System .pdf](https://github.com/user-attachments/files/25458648/ASSIGNMENT.1.CSEB5223.-.Student.Learning.Management.System.pdf)

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

The system currently manages course profiles using session-based storage.

---

## ⚙️ System Features

### 1️⃣ Course Management
- Add new course profile
- View all courses
- Search course by course code (Linear Search)
- Edit course (Course code is not editable)
- Delete course with confirmation

### 2️⃣ Validation & Error Handling
- Duplicate course code prevention
- Form validation using Laravel validation rules
- Array out-of-bound prevention
- "Course not found" handling

### 3️⃣ User Interface
- Responsive layout using Bootstrap 5
- Reusable layout using Blade `@extends`
- Navigation bar for quick access
- Alert system for success and error messages

---

## 🧠 Technical Implementation

### 🔹 Programming Concepts Used
- Custom `Course` class
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
│ └── Course.php
├── Http
│ └── Controllers
│ └── CourseController.php

resources
└── views
├── Layouts
│ └── app.blade.php
└── courses
├── create.blade.php
├── index.blade.php
├── search.blade.php
├── search_result.blade.php
├── edit.blade.php
└── delete_confirm.blade.php



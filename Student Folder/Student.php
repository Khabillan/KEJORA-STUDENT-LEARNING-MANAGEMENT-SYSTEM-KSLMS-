<?php

namespace App\Models;

class Student
{
    private string $name;
    private string $studentId;
    private string $email;
    private string $phoneNumber;

    public function __construct(string $name, string $studentId, string $email, string $phoneNumber)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    // Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getStudentId(): string
    {
        return $this->studentId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    // No setStudentId() because Student ID should not be editable
}
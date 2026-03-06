<?php

namespace App\Models;

class Course
{
    private string $name;
    private string $code;
    private int $creditHour;
    private string $summary;
    private string $msTeamsLink;

    public function __construct(string $name, string $code, int $creditHour, string $summary, string $msTeamsLink)
    {
        $this->name = $name;
        $this->code = $code;
        $this->creditHour = $creditHour;
        $this->summary = $summary;
        $this->msTeamsLink = $msTeamsLink;
    }

    // Getters
    public function getName(): string { return $this->name; }
    public function getCode(): string { return $this->code; }
    public function getCreditHour(): int { return $this->creditHour; }
    public function getSummary(): string { return $this->summary; }
    public function getMsTeamsLink(): string { return $this->msTeamsLink; }

    // Setters
    public function setName(string $name): void { $this->name = $name; }
    public function setCreditHour(int $creditHour): void { $this->creditHour = $creditHour; }
    public function setSummary(string $summary): void { $this->summary = $summary; }
    public function setMsTeamsLink(string $msTeamsLink): void { $this->msTeamsLink = $msTeamsLink; }

    // course code NOT editable in Edit requirement
    // so no setCode()
}

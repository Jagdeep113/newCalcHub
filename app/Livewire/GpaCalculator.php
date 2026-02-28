<?php

namespace App\Livewire;

use Livewire\Component;

class GpaCalculator extends Component
{
    public array $courses = [];
    public string $scale = '4.0';
    public string $semesterName = '';
    
    public float $gpa = 0;
    public float $totalCredits = 0;
    public float $totalPoints = 0;
    public string $letterGrade = 'F';
    public array $gradeDistribution = [];

    public function mount(): void
    {
        $this->addCourse();
        $this->addCourse();
        $this->addCourse();
        $this->calculate();
    }

    public function addCourse(): void
    {
        $this->courses[] = [
            'name' => '',
            'credits' => 3,
            'grade' => '4.0',
            'letter' => 'A'
        ];
    }

    public function removeCourse(int $index): void
    {
        if (count($this->courses) > 1) {
            unset($this->courses[$index]);
            $this->courses = array_values($this->courses);
            $this->calculate();
        }
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function calculate(): void
    {
        $this->totalCredits = 0;
        $this->totalPoints = 0;
        $this->gradeDistribution = [
            'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'F' => 0
        ];

        foreach ($this->courses as $course) {
            $credits = floatval($course['credits'] ?? 0);
            $grade = floatval($course['grade'] ?? 0);
            
            if ($credits > 0) {
                $this->totalCredits += $credits;
                $this->totalPoints += $grade * $credits;
                
                // Track grade distribution
                if ($grade >= 3.7) $this->gradeDistribution['A'] += $credits;
                elseif ($grade >= 2.7) $this->gradeDistribution['B'] += $credits;
                elseif ($grade >= 1.7) $this->gradeDistribution['C'] += $credits;
                elseif ($grade >= 1.0) $this->gradeDistribution['D'] += $credits;
                else $this->gradeDistribution['F'] += $credits;
            }
        }

        $this->gpa = $this->totalCredits > 0 ? $this->totalPoints / $this->totalCredits : 0;
        $this->determineLetterGrade();
    }

    private function determineLetterGrade(): void
    {
        if ($this->gpa >= 3.7) $this->letterGrade = 'A';
        elseif ($this->gpa >= 3.3) $this->letterGrade = 'A-';
        elseif ($this->gpa >= 3.0) $this->letterGrade = 'B+';
        elseif ($this->gpa >= 2.7) $this->letterGrade = 'B';
        elseif ($this->gpa >= 2.3) $this->letterGrade = 'B-';
        elseif ($this->gpa >= 2.0) $this->letterGrade = 'C+';
        elseif ($this->gpa >= 1.7) $this->letterGrade = 'C';
        elseif ($this->gpa >= 1.3) $this->letterGrade = 'C-';
        elseif ($this->gpa >= 1.0) $this->letterGrade = 'D';
        else $this->letterGrade = 'F';
    }

    public function getGradeOptionsProperty(): array
    {
        return [
            '4.0' => 'A (4.0)',
            '3.7' => 'A- (3.7)',
            '3.3' => 'B+ (3.3)',
            '3.0' => 'B (3.0)',
            '2.7' => 'B- (2.7)',
            '2.3' => 'C+ (2.3)',
            '2.0' => 'C (2.0)',
            '1.7' => 'C- (1.7)',
            '1.3' => 'D+ (1.3)',
            '1.0' => 'D (1.0)',
            '0.0' => 'F (0.0)',
        ];
    }

    public function render()
    {
        return view('livewire.gpa-calculator');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class BmrCalculator extends Component
{
    public string $gender = 'male';
    public int $age = 30;
    public string $unit = 'metric';
    
    // Metric
    public float $heightCm = 175;
    public float $weightKg = 75;
    
    // Imperial
    public int $heightFt = 5;
    public int $heightIn = 9;
    public float $weightLbs = 165;

    public float $bmr = 0;
    public float $dailyCalories = 0;
    public array $tdeeLevels = [];

    public function mount(): void
    {
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function calculate(): void
    {
        $height = $this->getHeightInCm();
        $weight = $this->getWeightInKg();

        // Mifflin-St Jeor Equation
        if ($this->gender === 'male') {
            $this->bmr = (10 * $weight) + (6.25 * $height) - (5 * $this->age) + 5;
        } else {
            $this->bmr = (10 * $weight) + (6.25 * $height) - (5 * $this->age) - 161;
        }

        // Calculate TDEE at different activity levels
        $this->tdeeLevels = [
            'sedentary' => $this->bmr * 1.2,
            'light' => $this->bmr * 1.375,
            'moderate' => $this->bmr * 1.55,
            'active' => $this->bmr * 1.725,
            'very_active' => $this->bmr * 1.9,
        ];
    }

    private function getHeightInCm(): float
    {
        if ($this->unit === 'metric') {
            return $this->heightCm;
        }
        
        return ($this->heightFt * 30.48) + ($this->heightIn * 2.54);
    }

    private function getWeightInKg(): float
    {
        if ($this->unit === 'metric') {
            return $this->weightKg;
        }
        
        return $this->weightLbs * 0.453592;
    }

    public function render()
    {
        return view('livewire.bmr-calculator');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class BmiCalculator extends Component
{
    public string $unit = 'metric';
    public float $height = 170;
    public float $weight = 70;
    public int $heightFt = 5;
    public int $heightIn = 7;
    public float $weightLbs = 154;
    public ?float $bmi = null;
    public string $category = '';
    public string $healthTip = '';

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
        if ($this->unit === 'metric') {
            $heightInMeters = $this->height / 100;
            $this->bmi = $this->weight / ($heightInMeters * $heightInMeters);
        } else {
            $totalInches = ($this->heightFt * 12) + $this->heightIn;
            $heightInMeters = $totalInches * 0.0254;
            $weightInKg = $this->weightLbs * 0.453592;
            $this->bmi = $weightInKg / ($heightInMeters * $heightInMeters);
        }

        $this->determineCategory();
    }

    private function determineCategory(): void
    {
        if ($this->bmi < 18.5) {
            $this->category = 'Underweight';
            $this->healthTip = 'Consider consulting with a healthcare provider about healthy weight gain strategies.';
        } elseif ($this->bmi < 25) {
            $this->category = 'Normal weight';
            $this->healthTip = 'Maintain your current weight with a balanced diet and regular physical activity.';
        } elseif ($this->bmi < 30) {
            $this->category = 'Overweight';
            $this->healthTip = 'Consider modest weight loss through improved nutrition and increased physical activity.';
        } else {
            $this->category = 'Obese';
            $this->healthTip = 'Consult with a healthcare provider about weight management strategies for better health.';
        }
    }

    public function render()
    {
        return view('livewire.bmi-calculator');
    }
}
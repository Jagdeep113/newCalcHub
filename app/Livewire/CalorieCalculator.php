<?php

namespace App\Livewire;

use Livewire\Component;

class CalorieCalculator extends Component
{
    public string $gender = 'male';
    public int $age = 30;
    public float $height = 175; // cm
    public float $weight = 75; // kg
    public string $activityLevel = 'moderate';
    public string $goal = 'maintain';

    public float $bmr = 0;
    public float $tdee = 0;
    public float $dailyCalories = 0;
    public array $macros = [];

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
        // Calculate BMR using Mifflin-St Jeor Equation
        if ($this->gender === 'male') {
            $this->bmr = (10 * $this->weight) + (6.25 * $this->height) - (5 * $this->age) + 5;
        } else {
            $this->bmr = (10 * $this->weight) + (6.25 * $this->height) - (5 * $this->age) - 161;
        }

        // Activity multipliers
        $activityMultipliers = [
            'sedentary' => 1.2,
            'light' => 1.375,
            'moderate' => 1.55,
            'active' => 1.725,
            'very_active' => 1.9,
        ];

        $this->tdee = $this->bmr * ($activityMultipliers[$this->activityLevel] ?? 1.55);

        // Adjust for goal
        $goalAdjustments = [
            'maintain' => 0,
            'lose' => -500,
            'gain' => 500,
        ];

        $this->dailyCalories = max(1200, $this->tdee + ($goalAdjustments[$this->goal] ?? 0));

        // Calculate macros
        $this->calculateMacros();
    }

    private function calculateMacros(): void
    {
        // Standard macro distribution: 40% carbs, 30% protein, 30% fat
        $carbsCalories = $this->dailyCalories * 0.4;
        $proteinCalories = $this->dailyCalories * 0.3;
        $fatCalories = $this->dailyCalories * 0.3;

        $this->macros = [
            'carbs' => [
                'calories' => $carbsCalories,
                'grams' => $carbsCalories / 4, // 4 calories per gram
                'percentage' => 40,
            ],
            'protein' => [
                'calories' => $proteinCalories,
                'grams' => $proteinCalories / 4,
                'percentage' => 30,
            ],
            'fat' => [
                'calories' => $fatCalories,
                'grams' => $fatCalories / 9, // 9 calories per gram
                'percentage' => 30,
            ],
        ];
    }

    public function getActivityLevelsProperty(): array
    {
        return [
            'sedentary' => 'Sedentary (little or no exercise)',
            'light' => 'Lightly active (1-3 days/week)',
            'moderate' => 'Moderately active (3-5 days/week)',
            'active' => 'Very active (6-7 days/week)',
            'very_active' => 'Extremely active (athlete/physical job)',
        ];
    }

    public function getRecommendationProperty(): string
    {
        return match($this->goal) {
            'lose' => 'For healthy weight loss, aim to lose 0.5-1 kg per week. Combine your calorie deficit with regular exercise.',
            'gain' => 'For healthy weight gain, focus on nutrient-dense foods and strength training to build muscle.',
            default => 'Maintain your current weight with a balanced diet and regular physical activity.',
        };
    }

    public function render()
    {
        return view('livewire.calorie-calculator');
    }
}
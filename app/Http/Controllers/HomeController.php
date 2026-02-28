<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display the home page with all calculator categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = [
            'financial' => [
                'name' => 'Financial Calculators',
                'icon' => 'fa-solid fa-coins',
                'description' => 'Plan your finances with precision',
                'calculators' => [
                    ['name' => 'Mortgage Calculator', 'slug' => 'mortgage', 'icon' => 'fa-solid fa-home'],
                    ['name' => 'Loan Calculator', 'slug' => 'loan', 'icon' => 'fa-solid fa-hand-holding-usd'],
                    ['name' => 'Investment Calculator', 'slug' => 'investment', 'icon' => 'fa-solid fa-chart-line'],
                    ['name' => 'Retirement Calculator', 'slug' => 'retirement', 'icon' => 'fa-solid fa-umbrella-beach'],
                    ['name' => 'Compound Interest', 'slug' => 'compound-interest', 'icon' => 'fa-solid fa-percent'],
                    ['name' => 'Currency Converter', 'slug' => 'currency', 'icon' => 'fa-solid fa-exchange-alt'],
                ]
            ],
            'fitness' => [
                'name' => 'Fitness & Health',
                'icon' => 'fa-solid fa-heart-pulse',
                'description' => 'Track your health goals',
                'calculators' => [
                    ['name' => 'BMI Calculator', 'slug' => 'bmi', 'icon' => 'fa-solid fa-weight-scale'],
                    ['name' => 'Calorie Calculator', 'slug' => 'calorie', 'icon' => 'fa-solid fa-fire'],
                    ['name' => 'BMR Calculator', 'slug' => 'bmr', 'icon' => 'fa-solid fa-heart'],
                    ['name' => 'Body Fat Calculator', 'slug' => 'body-fat', 'icon' => 'fa-solid fa-person'],
                    ['name' => 'Pace Calculator', 'slug' => 'pace', 'icon' => 'fa-solid fa-person-running'],
                ]
            ],
            'math' => [
                'name' => 'Math Calculators',
                'icon' => 'fa-solid fa-calculator',
                'description' => 'Solve complex equations',
                'calculators' => [
                    ['name' => 'Scientific Calculator', 'slug' => 'scientific', 'icon' => 'fa-solid fa-flask'],
                    ['name' => 'Percentage Calculator', 'slug' => 'percentage', 'icon' => 'fa-solid fa-percent'],
                    ['name' => 'Fraction Calculator', 'slug' => 'fraction', 'icon' => 'fa-solid fa-divide'],
                    ['name' => 'GPA Calculator', 'slug' => 'gpa', 'icon' => 'fa-solid fa-graduation-cap'],
                    ['name' => 'Age Calculator', 'slug' => 'age', 'icon' => 'fa-solid fa-cake-candles'],
                    ['name' => 'Date Calculator', 'slug' => 'date', 'icon' => 'fa-solid fa-calendar'],
                ]
            ],
            'converter' => [
                'name' => 'Unit Converters',
                'icon' => 'fa-solid fa-arrows-spin',
                'description' => 'Convert between units',
                'calculators' => [
                    ['name' => 'Length Converter', 'slug' => 'length', 'icon' => 'fa-solid fa-ruler'],
                    ['name' => 'Weight Converter', 'slug' => 'weight', 'icon' => 'fa-solid fa-weight-hanging'],
                    ['name' => 'Temperature Converter', 'slug' => 'temperature', 'icon' => 'fa-solid fa-temperature-high'],
                    ['name' => 'Area Converter', 'slug' => 'area', 'icon' => 'fa-solid fa-draw-polygon'],
                    ['name' => 'Volume Converter', 'slug' => 'volume', 'icon' => 'fa-solid fa-flask'],
                    ['name' => 'Speed Converter', 'slug' => 'speed', 'icon' => 'fa-solid fa-gauge-high'],
                ]
            ]
        ];

        return view('home', compact('categories'));
    }
}
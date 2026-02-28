<?php

namespace App\Http\Controllers;

class CalculatorController extends Controller
{
    /**
     * Available calculators configuration.
     */
    private array $calculators = [
        // Financial Calculators
        'mortgage' => [
            'name' => 'Mortgage Calculator', 
            'category' => 'financial', 
            'description' => 'Calculate your monthly mortgage payments and understand the total cost of homeownership', 
            'icon' => 'fa-solid fa-home'
        ],
        'loan' => [
            'name' => 'Loan Calculator', 
            'category' => 'financial', 
            'description' => 'Plan your loan repayments and see amortization schedules', 
            'icon' => 'fa-solid fa-hand-holding-usd'
        ],
        'investment' => [
            'name' => 'Investment Calculator', 
            'category' => 'financial', 
            'description' => 'Plan your investment growth with compound interest', 
            'icon' => 'fa-solid fa-chart-line'
        ],
        'retirement' => [
            'name' => 'Retirement Calculator', 
            'category' => 'financial', 
            'description' => 'Plan for your retirement and calculate how much you need to save', 
            'icon' => 'fa-solid fa-umbrella-beach'
        ],
        'compound-interest' => [
            'name' => 'Compound Interest Calculator', 
            'category' => 'financial', 
            'description' => 'Calculate compound interest and see how your money grows over time', 
            'icon' => 'fa-solid fa-percent'
        ],
        'currency' => [
            'name' => 'Currency Converter', 
            'category' => 'financial', 
            'description' => 'Convert between world currencies with live exchange rates', 
            'icon' => 'fa-solid fa-exchange-alt'
        ],
        
        // Fitness Calculators
        'bmi' => [
            'name' => 'BMI Calculator', 
            'category' => 'fitness', 
            'description' => 'Calculate your Body Mass Index and understand what it means for your health', 
            'icon' => 'fa-solid fa-weight-scale'
        ],
        'calorie' => [
            'name' => 'Calorie Calculator', 
            'category' => 'fitness', 
            'description' => 'Track your daily calorie needs based on your activity level', 
            'icon' => 'fa-solid fa-fire'
        ],
        'bmr' => [
            'name' => 'BMR Calculator', 
            'category' => 'fitness', 
            'description' => 'Calculate your basal metabolic rate - calories burned at rest', 
            'icon' => 'fa-solid fa-heart'
        ],
        'body-fat' => [
            'name' => 'Body Fat Calculator', 
            'category' => 'fitness', 
            'description' => 'Estimate your body fat percentage using various methods', 
            'icon' => 'fa-solid fa-person'
        ],
        'pace' => [
            'name' => 'Pace Calculator', 
            'category' => 'fitness', 
            'description' => 'Calculate your running pace, speed, and race times', 
            'icon' => 'fa-solid fa-person-running'
        ],
        
        // Math Calculators
        'scientific' => [
            'name' => 'Scientific Calculator', 
            'category' => 'math', 
            'description' => 'Advanced mathematical functions including trig, log, and exponential', 
            'icon' => 'fa-solid fa-flask'
        ],
        'percentage' => [
            'name' => 'Percentage Calculator', 
            'category' => 'math', 
            'description' => 'Calculate percentages, increases, decreases, and more', 
            'icon' => 'fa-solid fa-percent'
        ],
        'fraction' => [
            'name' => 'Fraction Calculator', 
            'category' => 'math', 
            'description' => 'Work with fractions, simplify, add, subtract, multiply, and divide', 
            'icon' => 'fa-solid fa-divide'
        ],
        'gpa' => [
            'name' => 'GPA Calculator', 
            'category' => 'math', 
            'description' => 'Calculate your Grade Point Average and track academic progress', 
            'icon' => 'fa-solid fa-graduation-cap'
        ],
        'age' => [
            'name' => 'Age Calculator', 
            'category' => 'math', 
            'description' => 'Calculate exact age in years, months, and days', 
            'icon' => 'fa-solid fa-cake-candles'
        ],
        'date' => [
            'name' => 'Date Calculator', 
            'category' => 'math', 
            'description' => 'Calculate date differences, add/subtract days, find day of week', 
            'icon' => 'fa-solid fa-calendar'
        ],
        
        // Unit Converters
        'length' => [
            'name' => 'Length Converter', 
            'category' => 'converter', 
            'description' => 'Convert between length units: meters, feet, inches, miles, and more', 
            'icon' => 'fa-solid fa-ruler'
        ],
        'weight' => [
            'name' => 'Weight Converter', 
            'category' => 'converter', 
            'description' => 'Convert between weight units: kg, lbs, ounces, grams, and more', 
            'icon' => 'fa-solid fa-weight-hanging'
        ],
        'temperature' => [
            'name' => 'Temperature Converter', 
            'category' => 'converter', 
            'description' => 'Convert between Celsius, Fahrenheit, and Kelvin', 
            'icon' => 'fa-solid fa-temperature-high'
        ],
        'area' => [
            'name' => 'Area Converter', 
            'category' => 'converter', 
            'description' => 'Convert between area units: sq meters, acres, sq feet, and more', 
            'icon' => 'fa-solid fa-draw-polygon'
        ],
        'volume' => [
            'name' => 'Volume Converter', 
            'category' => 'converter', 
            'description' => 'Convert between volume units: liters, gallons, cups, and more', 
            'icon' => 'fa-solid fa-flask'
        ],
        'speed' => [
            'name' => 'Speed Converter', 
            'category' => 'converter', 
            'description' => 'Convert between speed units: mph, kmh, knots, and more', 
            'icon' => 'fa-solid fa-gauge-high'
        ],
    ];

    /**
     * Display calculators by category.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function category(string $category)
    {
        $categoryNames = [
            'financial' => 'Financial Calculators',
            'fitness' => 'Fitness & Health Calculators',
            'math' => 'Math Calculators',
            'converter' => 'Unit Converters'
        ];

        // Filter calculators by category
        $calculators = array_filter($this->calculators, fn($calc) => $calc['category'] === $category);

        return view('calculators.category', [
            'category' => $category,
            'categoryName' => $categoryNames[$category],
            'calculators' => $calculators
        ]);
    }

    /**
     * Display specific calculator.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show(string $slug)
    {
        if (!isset($this->calculators[$slug])) {
            abort(404);
        }

        $calculator = $this->calculators[$slug];
        
        // Check if the view exists
        if (!view()->exists('calculators.' . $slug)) {
            // If view doesn't exist, show a coming soon page
            return view('calculators.coming-soon', [
                'calculator' => $calculator
            ]);
        }

        return view('calculators.' . $slug, [
            'calculator' => $calculator
        ]);
    }
}
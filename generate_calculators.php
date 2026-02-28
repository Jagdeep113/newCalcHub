<?php

$calculators = [
    'investment' => 'Investment Calculator',
    'retirement' => 'Retirement Calculator',
    'compound-interest' => 'Compound Interest Calculator',
    'currency' => 'Currency Converter',
    'calorie' => 'Calorie Calculator',
    'bmr' => 'BMR Calculator',
    'body-fat' => 'Body Fat Calculator',
    'pace' => 'Pace Calculator',
    'scientific' => 'Scientific Calculator',
    'fraction' => 'Fraction Calculator',
    'gpa' => 'GPA Calculator',
    'age' => 'Age Calculator',
    'date' => 'Date Calculator',
    'length' => 'Length Converter',
    'weight' => 'Weight Converter',
    'temperature' => 'Temperature Converter',
    'area' => 'Area Converter',
    'volume' => 'Volume Converter',
    'speed' => 'Speed Converter',
];

foreach ($calculators as $slug => $name) {
    $content = <<<BLADE
@extends('layouts.app')

@section('title', '{$name} - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>{$name}</h1>
        <p class="text-muted">Coming soon - We're working on this calculator</p>
    </div>
    
    <div class="calculator-container text-center py-5">
        <i class="fas fa-tools fa-4x mb-3" style="color: var(--accent);"></i>
        <h2 class="h3 mb-3">Under Construction</h2>
        <p class="mb-4">This calculator is currently being developed and will be available soon.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Browse Other Calculators</a>
    </div>
</div>
@endsection
BLADE;

    file_put_contents(__DIR__ . '/resources/views/calculators/' . $slug . '.blade.php', $content);
    echo "Created: resources/views/calculators/{$slug}.blade.php\n";
}

echo "\nAll calculator views created successfully!\n";
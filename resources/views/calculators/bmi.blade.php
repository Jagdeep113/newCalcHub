@extends('layouts.app')

@section('title', 'BMI Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>BMI Calculator</h1>
        <p class="text-muted">Calculate your Body Mass Index and understand what it means for your health</p>
    </div>
    
    <div class="calculator-container calculator-container-compact">
        @livewire('bmi-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding BMI</h2>
        <p>Body Mass Index (BMI) is a simple index of weight-for-height that is commonly used to classify underweight, overweight, and obesity in adults. It is defined as a person's weight in kilograms divided by the square of their height in meters (kg/m²).</p>
        
        <div class="alert alert-warning mt-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Important:</strong> While BMI is a useful screening tool, it does not directly measure body fat and may not accurately reflect health status for all individuals, particularly athletes with high muscle mass.
        </div>
        
        <h3 class="mt-4">Health Implications</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Risks of High BMI</h5>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Cardiovascular disease</li>
                            <li>Type 2 diabetes</li>
                            <li>High blood pressure</li>
                            <li>Sleep apnea</li>
                            <li>Joint problems</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Risks of Low BMI</h5>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Nutritional deficiencies</li>
                            <li>Osteoporosis</li>
                            <li>Weakened immune system</li>
                            <li>Fertility issues</li>
                            <li>Anemia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
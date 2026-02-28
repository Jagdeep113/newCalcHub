@extends('layouts.app')

@section('title', 'BMI Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>BMI Calculator</h1>
        <p class="text-muted">Calculate your Body Mass Index and understand what it means for your health</p>
    </div>
    
    <div class="calculator-container">
        @livewire('bmi-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding BMI</h2>
        <p>Body Mass Index (BMI) is a simple index of weight-for-height that is commonly used to classify underweight, overweight, and obesity in adults.</p>
        
        <div class="alert alert-warning mt-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Important:</strong> BMI is a screening tool, not a diagnostic tool. It doesn't measure body fat directly and may not be accurate for athletes, elderly, or pregnant women.
        </div>
        
        <h3 class="mt-4">BMI Categories</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-3">
                <div class="card border-info">
                    <div class="card-body text-center">
                        <h5 class="card-title text-info">Underweight</h5>
                        <p class="display-6">&lt; 18.5</p>
                        <p class="small">May indicate malnutrition or other health issues</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Normal</h5>
                        <p class="display-6">18.5 - 24.9</p>
                        <p class="small">Healthy weight range</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">Overweight</h5>
                        <p class="display-6">25 - 29.9</p>
                        <p class="small">May indicate excess weight</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Obese</h5>
                        <p class="display-6">≥ 30</p>
                        <p class="small">Increased health risks</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Health Implications</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-danger bg-opacity-10 p-4 rounded-3">
                    <h5 class="text-danger">Risks of High BMI</h5>
                    <ul class="mb-0">
                        <li>Cardiovascular disease</li>
                        <li>Type 2 diabetes</li>
                        <li>High blood pressure</li>
                        <li>Sleep apnea</li>
                        <li>Joint problems</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-info bg-opacity-10 p-4 rounded-3">
                    <h5 class="text-info">Risks of Low BMI</h5>
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
        
        <h3 class="mt-5">BMI Formula</h3>
        <div class="bg-light p-4 rounded-3 text-center">
            <p class="h4"><code>BMI = weight(kg) / height²(m²)</code></p>
            <p class="mt-3">or</p>
            <p class="h4"><code>BMI = (weight(lbs) × 703) / height²(in²)</code></p>
        </div>
        
        <h3 class="mt-5">Tips for Healthy Weight Management</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-apple-alt text-success me-2"></i> Eat a balanced diet rich in fruits, vegetables, and whole grains</li>
            <li class="mb-3"><i class="fas fa-running text-success me-2"></i> Get at least 150 minutes of moderate exercise per week</li>
            <li class="mb-3"><i class="fas fa-bed text-success me-2"></i> Aim for 7-9 hours of quality sleep each night</li>
            <li class="mb-3"><i class="fas fa-tint text-success me-2"></i> Stay hydrated with water instead of sugary drinks</li>
        </ul>
    </div>
</div>
@endsection
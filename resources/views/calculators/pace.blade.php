@extends('layouts.app')

@section('title', 'Pace Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Pace Calculator</h1>
        <p class="text-muted">Calculate running pace, speed, and race times for runners</p>
    </div>
    
    <div class="calculator-container text-center py-5">
        <i class="fas fa-tools fa-4x mb-3" style="color: var(--accent);"></i>
        <h2 class="h3 mb-3">Coming Soon!</h2>
        <p class="mb-4">Our running pace calculator is under development and will be available soon.</p>
        
        <div class="progress mb-4 mx-auto" style="max-width: 300px; height: 10px;">
            <div class="progress-bar bg-primary" style="width: 75%;"></div>
        </div>
        
        <p class="text-muted">Check out our <a href="{{ route('calculator.show', 'bmi') }}">BMI Calculator</a> or <a href="{{ route('calculator.show', 'calorie') }}">Calorie Calculator</a> in the meantime.</p>
    </div>
    
    <div class="content-section mt-5">
        <h2>Running Pace Explained</h2>
        <p>Pace is the time it takes to cover a unit of distance, usually expressed as minutes per kilometer or mile.</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="bg-light p-4 rounded-3">
                    <h5>Common Race Distances</h5>
                    <ul class="list-unstyled">
                        <li>5K = 5 kilometers (3.1 miles)</li>
                        <li>10K = 10 kilometers (6.2 miles)</li>
                        <li>Half marathon = 21.1 km (13.1 miles)</li>
                        <li>Marathon = 42.2 km (26.2 miles)</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-4 rounded-3">
                    <h5>Sample Race Times</h5>
                    <ul class="list-unstyled">
                        <li>5K: 20-25 minutes (beginner)</li>
                        <li>10K: 45-55 minutes (intermediate)</li>
                        <li>Half marathon: 1:45-2:15 hours</li>
                        <li>Marathon: 3:30-5 hours</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Pace Formula</h3>
        <div class="bg-primary text-white p-3 rounded-3 text-center">
            <p class="h4 mb-0">Pace = Time ÷ Distance</p>
        </div>
        
        <h3 class="mt-4">Training Tips</h3>
        <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Start slower than your goal pace</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Use interval training to improve speed</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Long runs build endurance</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Track your progress with a running app</li>
        </ul>
    </div>
</div>
@endsection
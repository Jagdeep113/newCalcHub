@extends('layouts.app')

@section('title', 'Body Fat Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Body Fat Calculator</h1>
        <p class="text-muted">Estimate your body fat percentage using various measurement methods</p>
    </div>
    
    <div class="calculator-container text-center py-5">
        <i class="fas fa-tools fa-4x mb-3" style="color: var(--accent);"></i>
        <h2 class="h3 mb-3">Coming Soon!</h2>
        <p class="mb-4">We're working on bringing you an accurate body fat calculator. It will be available shortly.</p>
        
        <div class="progress mb-4 mx-auto" style="max-width: 300px; height: 10px;">
            <div class="progress-bar bg-primary" style="width: 60%;"></div>
        </div>
        
        <p class="text-muted">In the meantime, try our <a href="{{ route('calculator.show', 'bmi') }}">BMI Calculator</a> or <a href="{{ route('calculator.show', 'calorie') }}">Calorie Calculator</a>.</p>
    </div>
    
    <div class="content-section mt-5">
        <h2>About Body Fat Percentage</h2>
        <p>Body fat percentage is the proportion of fat tissue in your body. Unlike BMI, it distinguishes between fat and muscle mass.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Healthy body fat ranges:</strong> Essential fat: 10-13% (women), 2-5% (men); Athletes: 14-20% (women), 6-13% (men); Fitness: 21-24% (women), 14-17% (men)
        </div>
        
        <h3 class="mt-4">Measurement Methods</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Skinfold Calipers</h5>
                        <p class="card-text">Measures skinfold thickness at specific body sites. Most common and affordable method.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bioelectrical Impedance</h5>
                        <p class="card-text">Sends a weak electrical current through the body. Found in many smart scales.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DEXA Scan</h5>
                        <p class="card-text">X-ray based method considered the gold standard. Most accurate but expensive.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
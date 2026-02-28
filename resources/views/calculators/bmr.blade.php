@extends('layouts.app')

@section('title', 'BMR Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>BMR Calculator</h1>
        <p class="text-muted">Calculate your Basal Metabolic Rate - the calories your body needs at complete rest</p>
    </div>
    
    <div class="calculator-container">
        @livewire('bmr-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>What is BMR?</h2>
        <p>Basal Metabolic Rate (BMR) is the number of calories your body needs to perform basic life-sustaining functions like breathing, circulation, and cell production.</p>
        
        <div class="alert alert-primary mt-4">
            <i class="fas fa-heartbeat me-2"></i>
            <strong>Your BMR accounts for 60-75% of your total daily calorie burn!</strong>
        </div>
        
        <h3 class="mt-4">BMR vs. TDEE</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">BMR (Basal Metabolic Rate)</h5>
                        <p class="card-text">Calories burned at complete rest. What you'd burn if you stayed in bed all day.</p>
                        <div class="bg-light p-3 rounded-3">
                            <small>Example: If your BMR is 1,500, that's what you burn just existing.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">TDEE (Total Daily Energy Expenditure)</h5>
                        <p class="card-text">BMR + physical activity + digestion. This is what you actually need daily.</p>
                        <div class="bg-light p-3 rounded-3">
                            <small>Example: With moderate activity, TDEE might be 2,300 calories.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Factors Affecting BMR</h3>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="fas fa-male fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Gender</h6>
                        <small>Men typically have higher BMR</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="bg-success text-white rounded-circle p-3 me-3">
                        <i class="fas fa-weight fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Body Composition</h6>
                        <small>More muscle = higher BMR</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="bg-info text-white rounded-circle p-3 me-3">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Age</h6>
                        <small>BMR decreases with age</small>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">BMR Formulas</h3>
        <div class="bg-light p-4 rounded-3">
            <h6>Mifflin-St Jeor Equation (most accurate)</h6>
            <p class="mb-2"><strong>Men:</strong> BMR = 10W + 6.25H - 5A + 5</p>
            <p><strong>Women:</strong> BMR = 10W + 6.25H - 5A - 161</p>
            <small class="text-muted">Where W = weight in kg, H = height in cm, A = age in years</small>
        </div>
        
        <h3 class="mt-5">How to Increase Your BMR</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-dumbbell text-success me-2"></i> <strong>Build muscle:</strong> Muscle burns more calories than fat, even at rest</li>
            <li class="mb-3"><i class="fas fa-utensils text-success me-2"></i> <strong>Eat enough protein:</strong> Protein has a higher thermic effect than carbs or fat</li>
            <li class="mb-3"><i class="fas fa-coffee text-success me-2"></i> <strong>Stay hydrated:</strong> Even mild dehydration can slow metabolism</li>
            <li class="mb-3"><i class="fas fa-bed text-success me-2"></i> <strong>Get enough sleep:</strong> Poor sleep can lower BMR</li>
        </ul>
    </div>
</div>
@endsection
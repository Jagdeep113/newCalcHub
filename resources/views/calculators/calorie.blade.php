@extends('layouts.app')

@section('title', 'Calorie Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Calorie Calculator</h1>
        <p class="text-muted">Calculate your daily calorie needs based on your activity level and goals</p>
    </div>
    
    <div class="calculator-container">
        @livewire('calorie-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Calories</h2>
        <p>Calories are units of energy that your body uses for everything from breathing to running marathons.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-fire me-2"></i>
            <strong>Did you know?</strong> The average adult needs between 1,600-3,000 calories per day, depending on age, gender, and activity level.
        </div>
        
        <h3 class="mt-4">How Calories Are Used</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="display-4">🧠</div>
                        <h5>BMR (60-75%)</h5>
                        <p>Calories for basic functions like breathing, heartbeat, and brain function</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="display-4">🏃</div>
                        <h5>Physical Activity (15-30%)</h5>
                        <p>Calories burned through movement and exercise</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="display-4">🍽️</div>
                        <h5>TEF (10%)</h5>
                        <p>Thermic Effect of Food - calories burned digesting food</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Macronutrients Explained</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3 mb-3">
                    <h5 class="text-primary">Protein</h5>
                    <p class="small">4 calories per gram</p>
                    <p class="small mb-0">Essential for muscle repair, immune function, and hormone production</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-success bg-opacity-10 p-3 rounded-3 mb-3">
                    <h5 class="text-success">Carbohydrates</h5>
                    <p class="small">4 calories per gram</p>
                    <p class="small mb-0">Body's main energy source, especially for brain and muscles</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-warning bg-opacity-10 p-3 rounded-3 mb-3">
                    <h5 class="text-warning">Fats</h5>
                    <p class="small">9 calories per gram</p>
                    <p class="small mb-0">Necessary for hormone production and nutrient absorption</p>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Weight Management Guidelines</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Goal</th>
                        <th>Calorie Adjustment</th>
                        <th>Weekly Change</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maintain weight</td>
                        <td>Eat TDEE calories</td>
                        <td>No change</td>
                    </tr>
                    <tr>
                        <td>Lose weight</td>
                        <td>TDEE - 500 calories</td>
                        <td>Lose ~0.5 kg (1 lb)</td>
                    </tr>
                    <tr>
                        <td>Gain weight</td>
                        <td>TDEE + 500 calories</td>
                        <td>Gain ~0.5 kg (1 lb)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-light p-4 rounded-3 mt-4">
            <h5>Healthy Weight Loss Tips</h5>
            <ul class="mb-0">
                <li>Aim to lose 0.5-1 kg (1-2 lbs) per week</li>
                <li>Combine calorie deficit with exercise for best results</li>
                <li>Don't go below 1,200 calories (women) or 1,500 (men) without medical supervision</li>
                <li>Focus on nutrient-dense foods, not just calorie counting</li>
            </ul>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Speed Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Speed Converter</h1>
        <p class="text-muted">Convert between different units of speed and velocity</p>
    </div>
    
    <div class="calculator-container">
        @livewire('speed-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Speed Measurements</h2>
        <p>Speed conversion is essential for travel, sports, physics, and engineering.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-gauge-high me-2"></i>
            <strong>Quick Reference:</strong> 60 mph = 96.56 km/h = 26.82 m/s = 52.3 knots
        </div>
        
        <h3 class="mt-4">Common Speed Units</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Metric</h5>
                        <ul class="list-unstyled">
                            <li>km/h (kilometers per hour)</li>
                            <li>m/s (meters per second)</li>
                            <li>km/s (kilometers per second)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Imperial/US</h5>
                        <ul class="list-unstyled">
                            <li>mph (miles per hour)</li>
                            <li>ft/s (feet per second)</li>
                            <li>yd/s (yards per second)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Special</h5>
                        <ul class="list-unstyled">
                            <li>Knots (nautical miles per hour)</li>
                            <li>Mach (speed of sound)</li>
                            <li>c (speed of light)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Speed Conversions</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>km/h</td><td>mph</td><td>÷ 1.609</td></tr>
                    <tr><td>mph</td><td>km/h</td><td>× 1.609</td></tr>
                    <tr><td>km/h</td><td>m/s</td><td>÷ 3.6</td></tr>
                    <tr><td>m/s</td><td>km/h</td><td>× 3.6</td></tr>
                    <tr><td>mph</td><td>ft/s</td><td>× 1.467</td></tr>
                    <tr><td>knots</td><td>km/h</td><td>× 1.852</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Real-World Speeds</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Human Speeds</h6>
                    <ul class="small">
                        <li>Walking: 5 km/h (3 mph)</li>
                        <li>Jogging: 8 km/h (5 mph)</li>
                        <li>Running: 10-15 km/h (6-9 mph)</li>
                        <li>Sprint: 25-30 km/h (15-18 mph)</li>
                        <li>Usain Bolt: 44.7 km/h (27.8 mph)</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Vehicle Speeds</h6>
                    <ul class="small">
                        <li>City driving: 40-50 km/h (25-30 mph)</li>
                        <li>Highway: 100-120 km/h (60-75 mph)</li>
                        <li>Train: 200-300 km/h (125-185 mph)</li>
                        <li>Commercial plane: 900 km/h (560 mph)</li>
                        <li>Concorde: 2,180 km/h (1,354 mph)</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Speed of Sound (Mach)</h3>
        <div class="card">
            <div class="card-body">
                <p>The speed of sound varies with temperature and altitude:</p>
                <ul>
                    <li>Sea level (20°C): 1,235 km/h (767 mph)</li>
                    <li>At 11,000 m (cruising altitude): 1,062 km/h (660 mph)</li>
                </ul>
                <p class="mb-0"><strong>Mach numbers:</strong></p>
                <ul class="mb-0">
                    <li>Mach 1 = speed of sound</li>
                    <li>Mach 2 = twice speed of sound</li>
                    <li>Mach 3.2 = SR-71 Blackbird max speed</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Speed of Light</h3>
        <p>The speed of light in vacuum is 299,792,458 m/s (about 1.08 billion km/h). At this speed, you could circle Earth 7.5 times in one second!</p>
    </div>
</div>
@endsection
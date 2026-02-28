@extends('layouts.app')

@section('title', 'Scientific Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Scientific Calculator</h1>
        <p class="text-muted">Advanced calculations with trigonometric, logarithmic, and exponential functions</p>
    </div>
    
    <div class="calculator-container" style="max-width: 500px; margin: 0 auto;">
        @livewire('scientific-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Scientific Calculator Functions</h2>
        <p>This calculator includes advanced mathematical functions for students, engineers, and professionals.</p>
        
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Trigonometric</h5>
                        <ul class="list-unstyled">
                            <li>sin, cos, tan</li>
                            <li>sin⁻¹, cos⁻¹, tan⁻¹</li>
                            <li>Supports degrees/radians</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Logarithmic</h5>
                        <ul class="list-unstyled">
                            <li>log (base 10)</li>
                            <li>ln (natural log)</li>
                            <li>e (Euler's number)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Exponential</h5>
                        <ul class="list-unstyled">
                            <li>x², x³, x^y</li>
                            <li>√ (square root)</li>
                            <li>π (pi)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Keyboard Shortcuts</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Key</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>0-9</td><td>Numbers</td></tr>
                    <tr><td>.</td><td>Decimal point</td></tr>
                    <tr><td>+ - * /</td><td>Basic operations</td></tr>
                    <tr><td>Enter or =</td><td>Calculate</td></tr>
                    <tr><td>Escape</td><td>Clear all</td></tr>
                    <tr><td>Backspace</td><td>Delete last digit</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-5">Common Mathematical Constants</h3>
        <div class="row">
            <div class="col-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>π (Pi)</h6>
                    <p class="mb-0">3.14159265359</p>
                    <small>Ratio of circumference to diameter</small>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>e (Euler's Number)</h6>
                    <p class="mb-0">2.71828182846</p>
                    <small>Base of natural logarithms</small>
                </div>
            </div>
        </div>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-history me-2"></i>
            <strong>Did you know?</strong> The first scientific calculator was the HP-9100A, introduced in 1968. It cost $4,900!
        </div>
    </div>
</div>
@endsection
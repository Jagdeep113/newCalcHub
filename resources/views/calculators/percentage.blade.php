@extends('layouts.app')

@section('title', 'Percentage Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Percentage Calculator</h1>
        <p class="text-muted">Calculate percentages, increases, decreases, and more</p>
    </div>
    
    <div class="calculator-container">
        @livewire('percentage-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Percentages</h2>
        <p>A percentage is a way of expressing a number as a fraction of 100. The word "percent" comes from the Latin "per centum," meaning "by the hundred."</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-lightbulb me-2"></i>
            <strong>Quick Tip:</strong> To find 10% of any number, simply move the decimal point one place to the left.
        </div>
        
        <h3 class="mt-4">Common Percentage Calculations</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Finding a Percentage</h5>
                        <p class="card-text">What is 20% of 200?</p>
                        <p class="h5">= (20 × 200) ÷ 100 = 40</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Finding the Percentage</h5>
                        <p class="card-text">40 is what percent of 200?</p>
                        <p class="h5">= (40 ÷ 200) × 100 = 20%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Percentage Change</h5>
                        <p class="card-text">From 200 to 240</p>
                        <p class="h5">= (40 ÷ 200) × 100 = 20% increase</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Real-World Applications</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fas fa-tag text-primary me-2"></i> <strong>Discounts:</strong> Calculate sale prices</li>
                    <li class="mb-3"><i class="fas fa-chart-line text-primary me-2"></i> <strong>Stock market:</strong> Track gains and losses</li>
                    <li class="mb-3"><i class="fas fa-percent text-primary me-2"></i> <strong>Interest rates:</strong> Understand loan costs</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fas fa-utensils text-primary me-2"></i> <strong>Restaurant tips:</strong> Calculate gratuity</li>
                    <li class="mb-3"><i class="fas fa-chart-pie text-primary me-2"></i> <strong>Statistics:</strong> Interpret data</li>
                    <li class="mb-3"><i class="fas fa-graduation-cap text-primary me-2"></i> <strong>Grades:</strong> Calculate scores</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Mental Math Tricks</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Percentage</th>
                        <th>Trick</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>10%</td><td>Move decimal left one place</td></tr>
                    <tr><td>5%</td><td>Find 10%, then halve it</td></tr>
                    <tr><td>15%</td><td>Find 10%, add half of that</td></tr>
                    <tr><td>20%</td><td>Find 10%, double it</td></tr>
                    <tr><td>25%</td><td>Divide by 4</td></tr>
                    <tr><td>50%</td><td>Divide by 2</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
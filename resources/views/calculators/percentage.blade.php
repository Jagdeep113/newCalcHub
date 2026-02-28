@extends('layouts.app')

@section('title', 'Percentage Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Percentage Calculator</h1>
        <p class="text-muted">Calculate percentages, increases, decreases, and more</p>
    </div>
    
    <div class="calculator-container calculator-container-compact">
        @livewire('percentage-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Percentages</h2>
        <p>A percentage is a way of expressing a number as a fraction of 100. The term "percent" comes from the Latin "per centum," meaning "by the hundred." Percentages are used in countless real-world situations, from calculating discounts to understanding statistics.</p>
        
        <div class="info-box bg-light p-4 rounded-3 mt-4">
            <p class="mb-0"><strong>Quick Tip:</strong> To find 10% of any number, simply move the decimal point one place to the left. For 20%, find 10% and double it.</p>
        </div>
        
        <h3 class="mt-4">Common Percentage Calculations</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Finding a Percentage</h5>
                        <p class="card-text">What is 20% of 200? <br> = (20 × 200) ÷ 100 = 40</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Finding What Percent</h5>
                        <p class="card-text">40 is what percent of 200? <br> = (40 ÷ 200) × 100 = 20%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Percentage Change</h5>
                        <p class="card-text">From 200 to 240 is what percent? <br> = (40 ÷ 200) × 100 = 20% increase</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Practical Applications</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Discounts:</strong> Calculate sale prices and savings during shopping</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Tips:</strong> Determine appropriate gratuity at restaurants</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Interest Rates:</strong> Understand loan and investment returns</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Statistics:</strong> Interpret data and survey results</li>
        </ul>
    </div>
</div>
@endsection
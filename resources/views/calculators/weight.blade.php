@extends('layouts.app')

@section('title', 'Weight Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Weight Converter</h1>
        <p class="text-muted">Convert between different units of weight and mass</p>
    </div>
    
    <div class="calculator-container">
        @livewire('weight-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Weight Conversions</h2>
        <p>Weight conversion is essential for cooking, shipping, fitness, and international travel.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-weight-scale me-2"></i>
            <strong>Quick Reference:</strong> 1 kilogram = 2.20462 pounds = 35.274 ounces
        </div>
        
        <h3 class="mt-4">Metric System</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Unit</th>
                        <th>Symbol</th>
                        <th>Grams</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Metric ton</td><td>t</td><td>1,000,000 g</td></tr>
                    <tr><td>Kilogram</td><td>kg</td><td>1,000 g</td></tr>
                    <tr><td>Gram</td><td>g</td><td>1 g</td></tr>
                    <tr><td>Milligram</td><td>mg</td><td>0.001 g</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Imperial/US System</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Unit</th>
                        <th>Symbol</th>
                        <th>Pounds</th>
                        <th>Grams</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Ton (short)</td><td>tn</td><td>2,000 lb</td><td>907,185 g</td></tr>
                    <tr><td>Stone</td><td>st</td><td>14 lb</td><td>6,350 g</td></tr>
                    <tr><td>Pound</td><td>lb</td><td>1 lb</td><td>453.592 g</td></tr>
                    <tr><td>Ounce</td><td>oz</td><td>1/16 lb</td><td>28.3495 g</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Common Conversions</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-2">• 1 kg = 2.20462 lbs</li>
                    <li class="mb-2">• 1 lb = 0.453592 kg</li>
                    <li class="mb-2">• 1 oz = 28.35 g</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-2">• 1 stone = 14 lbs = 6.35 kg</li>
                    <li class="mb-2">• 1 ton = 1000 kg = 2,204.62 lbs</li>
                    <li class="mb-2">• 1 carat = 200 mg (gemstones)</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Real-World Examples</h3>
        <div class="card">
            <div class="card-body">
                <ul class="mb-0">
                    <li>Average adult human: 70 kg (154 lbs)</li>
                    <li>Gallon of water: 8.34 lbs (3.78 kg)</li>
                    <li>Paperclip: about 1 gram</li>
                    <li>Newborn baby: 3-4 kg (7-9 lbs)</li>
                    <li>Small car: 1,000-1,500 kg (1-1.5 tons)</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">BMI and Weight</h3>
        <p>Body Mass Index uses weight and height to assess health. Try our <a href="{{ route('calculator.show', 'bmi') }}">BMI Calculator</a> to check your weight category.</p>
    </div>
</div>
@endsection
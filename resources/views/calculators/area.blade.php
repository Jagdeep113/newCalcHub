@extends('layouts.app')

@section('title', 'Area Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Area Converter</h1>
        <p class="text-muted">Convert between different units of area measurement</p>
    </div>
    
    <div class="calculator-container">
        @livewire('area-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Area Measurements</h2>
        <p>Area measurements are essential for real estate, construction, agriculture, and land management.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-draw-polygon me-2"></i>
            <strong>Quick Reference:</strong> 1 acre = 43,560 sq ft = 4,047 sq m
        </div>
        
        <h3 class="mt-4">Common Area Units</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Metric</h5>
                        <ul class="list-unstyled">
                            <li>Square kilometer (km²) - 1,000,000 m²</li>
                            <li>Hectare (ha) - 10,000 m²</li>
                            <li>Are (a) - 100 m²</li>
                            <li>Square meter (m²) - base unit</li>
                            <li>Square centimeter (cm²) - 0.0001 m²</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Imperial/US</h5>
                        <ul class="list-unstyled">
                            <li>Square mile (mi²) - 640 acres</li>
                            <li>Acre (ac) - 43,560 ft²</li>
                            <li>Square yard (yd²) - 9 ft²</li>
                            <li>Square foot (ft²) - 144 in²</li>
                            <li>Square inch (in²) - 6.45 cm²</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Area Conversions</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>Multiply by</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Square meters</td><td>Square feet</td><td>10.764</td></tr>
                    <tr><td>Square feet</td><td>Square meters</td><td>0.0929</td></tr>
                    <tr><td>Acres</td><td>Hectares</td><td>0.4047</td></tr>
                    <tr><td>Hectares</td><td>Acres</td><td>2.471</td></tr>
                    <tr><td>Square miles</td><td>Square km</td><td>2.59</td></tr>
                    <tr><td>Square km</td><td>Square miles</td><td>0.386</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Real-World Examples</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Sports Fields</h6>
                    <ul class="small">
                        <li>Football field: 5,350 m² (57,600 ft²)</li>
                        <li>Basketball court: 420 m² (4,520 ft²)</li>
                        <li>Tennis court: 260 m² (2,800 ft²)</li>
                        <li>Soccer field: 4,050-8,100 m²</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Everyday Spaces</h6>
                    <ul class="small">
                        <li>Average house lot: 0.1-0.25 acres</li>
                        <li>One-car garage: 12-15 m² (130-160 ft²)</li>
                        <li>King size bed: 4.2 m² (45 ft²)</li>
                        <li>Letter paper: 0.06 m² (94 in²)</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Land Measurement</h3>
        <div class="card">
            <div class="card-body">
                <p>In real estate, area is crucial for property valuation. One acre is roughly:</p>
                <ul>
                    <li>90% of a football field</li>
                    <li>A rectangle 66 ft × 660 ft</li>
                    <li>About 4,047 square meters</li>
                    <li>0.00156 square miles</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Area Calculation Formulas</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Shape</th>
                        <th>Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Square/Rectangle</td><td>length × width</td></tr>
                    <tr><td>Triangle</td><td>½ × base × height</td></tr>
                    <tr><td>Circle</td><td>π × radius²</td></tr>
                    <tr><td>Trapezoid</td><td>½ × (a + b) × height</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
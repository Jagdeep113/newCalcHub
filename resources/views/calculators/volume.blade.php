@extends('layouts.app')

@section('title', 'Volume Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Volume Converter</h1>
        <p class="text-muted">Convert between different units of volume and capacity</p>
    </div>
    
    <div class="calculator-container">
        @livewire('volume-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Volume Measurements</h2>
        <p>Volume measurements are essential for cooking, science, medicine, and industry.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-flask me-2"></i>
            <strong>Quick Reference:</strong> 1 liter = 1000 ml = 33.8 fl oz = 4.23 cups = 2.11 pints
        </div>
        
        <h3 class="mt-4">Common Volume Units</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Metric</h5>
                        <ul class="list-unstyled">
                            <li>Cubic meter (m³) - 1000 L</li>
                            <li>Liter (L) - base unit</li>
                            <li>Milliliter (mL) - 0.001 L</li>
                            <li>Cubic centimeter (cc/cm³) - 1 mL</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Imperial/US</h5>
                        <ul class="list-unstyled">
                            <li>Gallon (gal) - 128 fl oz</li>
                            <li>Quart (qt) - 32 fl oz</li>
                            <li>Pint (pt) - 16 fl oz</li>
                            <li>Cup (c) - 8 fl oz</li>
                            <li>Fluid ounce (fl oz) - 29.57 mL</li>
                            <li>Tablespoon (tbsp) - 14.79 mL</li>
                            <li>Teaspoon (tsp) - 4.93 mL</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Volume Conversions</h3>
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
                    <tr><td>Liters</td><td>US Gallons</td><td>0.2642</td></tr>
                    <tr><td>US Gallons</td><td>Liters</td><td>3.785</td></tr>
                    <tr><td>Liters</td><td>UK Gallons</td><td>0.22</td></tr>
                    <tr><td>UK Gallons</td><td>Liters</td><td>4.546</td></tr>
                    <tr><td>Cups</td><td>Milliliters</td><td>236.6</td></tr>
                    <tr><td>Fluid Ounces</td><td>Milliliters</td><td>29.57</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Cooking Measurements</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>US Cooking</h6>
                    <ul class="small">
                        <li>3 tsp = 1 tbsp</li>
                        <li>2 tbsp = 1 fl oz</li>
                        <li>8 fl oz = 1 cup</li>
                        <li>2 cups = 1 pint</li>
                        <li>2 pints = 1 quart</li>
                        <li>4 quarts = 1 gallon</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Metric Cooking</h6>
                    <ul class="small">
                        <li>1 tsp = 5 mL</li>
                        <li>1 tbsp = 15 mL</li>
                        <li>1 cup = 250 mL</li>
                        <li>1 liter = 4.2 cups</li>
                        <li>1 liter = 1000 mL</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-4">Real-World Examples</h3>
        <div class="card">
            <div class="card-body">
                <ul class="mb-0">
                    <li>Soda can: 355 mL (12 fl oz)</li>
                    <li>Water bottle: 500 mL (16.9 fl oz)</li>
                    <li>Milk jug: 1 gallon (3.78 L)</li>
                    <li>Bathtub: 150-200 L (40-50 gal)</li>
                    <li>Swimming pool: 50,000-100,000 L</li>
                    <li>Gas tank (car): 50-70 L (13-18 gal)</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Volume Calculation Formulas</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Shape</th>
                        <th>Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Cube/Box</td><td>length × width × height</td></tr>
                    <tr><td>Sphere</td><td>4/3 × π × radius³</td></tr>
                    <tr><td>Cylinder</td><td>π × radius² × height</td></tr>
                    <tr><td>Cone</td><td>1/3 × π × radius² × height</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
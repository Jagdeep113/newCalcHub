@extends('layouts.app')

@section('title', 'Length Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Length Converter</h1>
        <p class="text-muted">Convert between different units of length and distance</p>
    </div>
    
    <div class="calculator-container">
        @livewire('length-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Length Conversions</h2>
        <p>Length conversion is essential for many everyday situations, from DIY projects to travel planning.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-ruler me-2"></i>
            <strong>Quick Reference:</strong> 1 meter = 100 cm = 1000 mm = 3.28 feet = 39.37 inches
        </div>
        
        <h3 class="mt-4">Metric System</h3>
        <p>The metric system is based on powers of 10, making conversions easy.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Unit</th>
                        <th>Symbol</th>
                        <th>Meters</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Kilometer</td><td>km</td><td>1,000 m</td></tr>
                    <tr><td>Meter</td><td>m</td><td>1 m</td></tr>
                    <tr><td>Centimeter</td><td>cm</td><td>0.01 m</td></tr>
                    <tr><td>Millimeter</td><td>mm</td><td>0.001 m</td></tr>
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
                        <th>Feet</th>
                        <th>Meters</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Mile</td><td>mi</td><td>5,280 ft</td><td>1,609.34 m</td></tr>
                    <tr><td>Yard</td><td>yd</td><td>3 ft</td><td>0.9144 m</td></tr>
                    <tr><td>Foot</td><td>ft</td><td>1 ft</td><td>0.3048 m</td></tr>
                    <tr><td>Inch</td><td>in</td><td>1/12 ft</td><td>0.0254 m</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Common Conversions</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-2">• 1 inch = 2.54 cm</li>
                    <li class="mb-2">• 1 foot = 30.48 cm</li>
                    <li class="mb-2">• 1 yard = 0.9144 m</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-2">• 1 mile = 1.609 km</li>
                    <li class="mb-2">• 1 km = 0.621 miles</li>
                    <li class="mb-2">• 1 nautical mile = 1.852 km</li>
                </ul>
            </div>
        </div>
        
        <h3 class="mt-4">Real-World Examples</h3>
        <div class="card">
            <div class="card-body">
                <ul class="mb-0">
                    <li>Football field: 100 yards (91.44 meters)</li>
                    <li>Marathon: 26.2 miles (42.195 km)</li>
                    <li>Basketball hoop height: 10 feet (3.05 m)</li>
                    <li>Standard doorway: 6.5 feet (1.98 m)</li>
                    <li>Olympic swimming pool: 50 meters</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
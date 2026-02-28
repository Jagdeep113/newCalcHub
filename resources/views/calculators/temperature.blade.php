@extends('layouts.app')

@section('title', 'Temperature Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Temperature Converter</h1>
        <p class="text-muted">Convert between Celsius, Fahrenheit, and Kelvin</p>
    </div>
    
    <div class="calculator-container">
        @livewire('temperature-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Temperature Scales</h2>
        <p>Different temperature scales are used around the world for weather, cooking, and science.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-thermometer-half me-2"></i>
            <strong>Did you know?</strong> The only temperature where Celsius and Fahrenheit are equal is -40°!
        </div>
        
        <h3 class="mt-4">Temperature Scales</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Celsius (°C)</h5>
                        <p class="card-text">Used in most countries worldwide. Water freezes at 0°C, boils at 100°C.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Fahrenheit (°F)</h5>
                        <p class="card-text">Used primarily in the US. Water freezes at 32°F, boils at 212°F.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Kelvin (K)</h5>
                        <p class="card-text">Used in science. 0K is absolute zero, the coldest possible temperature.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Conversion Formulas</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Convert</th>
                        <th>Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Celsius to Fahrenheit</td><td>°F = (°C × 9/5) + 32</td></tr>
                    <tr><td>Fahrenheit to Celsius</td><td>°C = (°F - 32) × 5/9</td></tr>
                    <tr><td>Celsius to Kelvin</td><td>K = °C + 273.15</td></tr>
                    <tr><td>Kelvin to Celsius</td><td>°C = K - 273.15</td></tr>
                    <tr><td>Fahrenheit to Kelvin</td><td>K = (°F - 32) × 5/9 + 273.15</td></tr>
                    <tr><td>Kelvin to Fahrenheit</td><td>°F = (K - 273.15) × 9/5 + 32</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Common Temperature Points</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Description</th>
                        <th>°C</th>
                        <th>°F</th>
                        <th>K</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Absolute zero</td><td>-273.15</td><td>-459.67</td><td>0</td></tr>
                    <tr><td>Water freezes</td><td>0</td><td>32</td><td>273.15</td></tr>
                    <tr><td>Room temperature</td><td>20-22</td><td>68-72</td><td>293-295</td></tr>
                    <tr><td>Body temperature</td><td>37</td><td>98.6</td><td>310.15</td></tr>
                    <tr><td>Water boils</td><td>100</td><td>212</td><td>373.15</td></tr>
                    <tr><td>Oven temperature</td><td>180</td><td>350</td><td>453</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Cooking Temperatures</h3>
        <div class="card">
            <div class="card-body">
                <ul class="mb-0">
                    <li>Rare steak: 52°C (125°F)</li>
                    <li>Medium steak: 60°C (140°F)</li>
                    <li>Well-done steak: 71°C (160°F)</li>
                    <li>Bread baking: 190-220°C (375-425°F)</li>
                    <li>Chicken (safe): 74°C (165°F)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
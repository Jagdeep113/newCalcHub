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
            <i class="fas fa-info-circle me-2"></i>
            <strong>Quick Reference:</strong> 1 meter = 100 cm = 1000 mm = 3.28 feet = 39.37 inches
        </div>
        
        <h3 class="mt-4">Common Length Units</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Metric System</h5>
                        <ul class="list-unstyled">
                            <li>Kilometer (km)</li>
                            <li>Meter (m)</li>
                            <li>Centimeter (cm)</li>
                            <li>Millimeter (mm)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Imperial/US</h5>
                        <ul class="list-unstyled">
                            <li>Mile (mi)</li>
                            <li>Yard (yd)</li>
                            <li>Foot (ft)</li>
                            <li>Inch (in)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nautical</h5>
                        <ul class="list-unstyled">
                            <li>Nautical Mile (nmi)</li>
                            <li>Cable</li>
                            <li>Fathom</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
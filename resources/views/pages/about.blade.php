@extends('layouts.app')

@section('title', 'About Us - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>About Calculator Hub</h1>
        <p class="text-muted">Your trusted partner for all types of calculations</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="calculator-container">
                <h2>Our Mission</h2>
                <p class="lead">To provide accurate, easy-to-use calculators that help people make informed decisions in their daily lives.</p>
                
                <p>Founded in 2023, Calculator Hub has grown into a comprehensive platform offering over 50 specialized calculators across finance, health, mathematics, and unit conversions. Our team of experts works tirelessly to ensure every calculator is accurate, intuitive, and secure.</p>
                
                <h3 class="mt-4">Why Choose Us?</h3>
                
                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle fa-2x" style="color: var(--primary);"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Accuracy First</h5>
                                <p>All our calculations are verified and tested for precision.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-lock fa-2x" style="color: var(--primary);"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Privacy Focused</h5>
                                <p>We never store your personal calculation data.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-bolt fa-2x" style="color: var(--primary);"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Lightning Fast</h5>
                                <p>Get instant results with our optimized engines.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-mobile-alt fa-2x" style="color: var(--primary);"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Mobile Friendly</h5>
                                <p>Use all calculators on any device, anywhere.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
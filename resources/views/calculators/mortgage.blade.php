@extends('layouts.app')

@section('title', 'Mortgage Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Mortgage Calculator</h1>
        <p class="text-muted">Calculate your monthly mortgage payments and understand the total cost of homeownership</p>
    </div>
    
    <div class="calculator-container">
        @livewire('mortgage-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Mortgage Calculations</h2>
        <p>A mortgage is likely the largest loan you'll take out in your lifetime. Your monthly payment typically includes four components: principal, interest, taxes, and insurance (often referred to as PITI).</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Did you know?</strong> Making just one extra mortgage payment each year can reduce a 30-year mortgage term by several years and save you thousands in interest.
        </div>
        
        <h3 class="mt-4">Key Components of a Mortgage Payment</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Principal</h5>
                        <p class="card-text">The amount you borrowed to buy your home. Each payment reduces this balance.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Interest</h5>
                        <p class="card-text">The cost of borrowing money from your lender. This is how lenders make profit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Property Taxes</h5>
                        <p class="card-text">Annual taxes paid to local government, often escrowed monthly.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Home Insurance</h5>
                        <p class="card-text">Protects your home against damage and liability, also often escrowed.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Tips for Getting the Best Mortgage</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Improve your credit score:</strong> A higher score can qualify you for lower interest rates</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Save for a larger down payment:</strong> 20% or more avoids PMI (Private Mortgage Insurance)</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Shop around:</strong> Compare rates from multiple lenders to find the best deal</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Consider points:</strong> Paying points upfront can lower your interest rate</li>
        </ul>
        
        <div class="bg-light p-4 rounded-3 mt-4">
            <h4>Mortgage Formula</h4>
            <p class="mb-0"><code>M = P [ i(1 + i)^n ] / [ (1 + i)^n – 1 ]</code></p>
            <small class="text-muted">Where M = monthly payment, P = principal, i = monthly interest rate, n = number of payments</small>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Compound Interest Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Compound Interest Calculator</h1>
        <p class="text-muted">See how your money can grow exponentially with the power of compound interest</p>
    </div>
    
    <div class="calculator-container">
        @livewire('compound-interest-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>The Magic of Compounding</h2>
        <p>Compound interest is interest earned on interest. It's what makes your money grow faster over time.</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="bg-primary text-white p-4 rounded-3">
                    <h4 class="text-white">Simple Interest</h4>
                    <p class="mb-0">Interest earned only on the principal</p>
                    <hr class="bg-white">
                    <p class="h3 mb-0">Linear Growth</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-success text-white p-4 rounded-3">
                    <h4 class="text-white">Compound Interest</h4>
                    <p class="mb-0">Interest earned on principal + accumulated interest</p>
                    <hr class="bg-white">
                    <p class="h3 mb-0">Exponential Growth</p>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Factors Affecting Compound Interest</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Principal</h5>
                        <p class="display-4">💰</p>
                        <p>The amount you start with</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Rate</h5>
                        <p class="display-4">📈</p>
                        <p>Annual interest rate</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Time</h5>
                        <p class="display-4">⏰</p>
                        <p>Years of compounding</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Frequency</h5>
                        <p class="display-4">🔄</p>
                        <p>How often interest compounds</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Compound Interest Formula</h3>
        <div class="bg-light p-4 rounded-3">
            <p class="h4 text-center"><code>A = P(1 + r/n)^(nt)</code></p>
            <div class="row mt-3">
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><strong>A</strong> = Final amount</li>
                        <li><strong>P</strong> = Principal</li>
                        <li><strong>r</strong> = Annual interest rate</li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><strong>n</strong> = Compounding frequency</li>
                        <li><strong>t</strong> = Time in years</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Real-World Example</h3>
        <div class="card">
            <div class="card-body">
                <p>If you invest $10,000 at age 25 with 7% annual return:</p>
                <ul>
                    <li>At age 35: $19,672</li>
                    <li>At age 45: $38,697</li>
                    <li>At age 55: $76,123</li>
                    <li>At age 65: $149,745</li>
                </ul>
                <p class="text-success mb-0"><i class="fas fa-check-circle me-2"></i> That's $139,745 in growth from just $10,000!</p>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Investment Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Investment Calculator</h1>
        <p class="text-muted">Plan your investment growth with compound interest and regular contributions</p>
    </div>
    
    <div class="calculator-container">
        @livewire('investment-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>The Power of Compound Interest</h2>
        <p>Compound interest is often called the "eighth wonder of the world" because it allows your money to grow exponentially over time.</p>
        
        <div class="alert alert-success mt-4">
            <i class="fas fa-quote-left me-2"></i>
            <strong>Albert Einstein:</strong> "Compound interest is the eighth wonder of the world. He who understands it, earns it; he who doesn't, pays it."
        </div>
        
        <h3 class="mt-4">Key Investment Concepts</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Compound Interest</h5>
                        <p class="card-text">Earning interest on your interest, which accelerates growth over time.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Time Horizon</h5>
                        <p class="card-text">The length of time you plan to keep your money invested. Longer horizons allow more compounding.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Dollar-Cost Averaging</h5>
                        <p class="card-text">Investing a fixed amount regularly, regardless of market conditions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Risk vs. Return</h5>
                        <p class="card-text">Higher potential returns typically come with higher risk.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">The Rule of 72</h3>
        <div class="bg-light p-4 rounded-3">
            <p>The Rule of 72 is a quick way to estimate how long it will take for your investment to double:</p>
            <p class="h4 text-center my-3"><code>Years to Double = 72 ÷ Annual Return Rate</code></p>
            <div class="row text-center mt-4">
                <div class="col-4">
                    <div class="fw-bold">4% return</div>
                    <div>18 years</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold">6% return</div>
                    <div>12 years</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold">8% return</div>
                    <div>9 years</div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Investment Tips</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> <strong>Start Early:</strong> The earlier you start, the more time your money has to grow</li>
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> <strong>Be Consistent:</strong> Regular contributions, even small ones, add up over time</li>
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> <strong>Diversify:</strong> Don't put all your eggs in one basket</li>
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> <strong>Stay Invested:</strong> Time in the market beats timing the market</li>
        </ul>
    </div>
</div>
@endsection
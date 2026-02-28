@extends('layouts.app')

@section('title', 'Currency Converter - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Currency Converter</h1>
        <p class="text-muted">Convert between world currencies with live exchange rates</p>
    </div>
    
    <div class="calculator-container">
        @livewire('currency-converter')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Currency Exchange</h2>
        <p>Currency exchange rates fluctuate constantly based on economic factors, market demand, and geopolitical events.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-globe me-2"></i>
            <strong>Did you know?</strong> The foreign exchange market (Forex) is the largest financial market in the world, with over $6 trillion traded daily.
        </div>
        
        <h3 class="mt-4">Major World Currencies</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">🇺🇸 USD</h5>
                        <p>US Dollar</p>
                        <small class="text-muted">World's primary reserve currency</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">🇪🇺 EUR</h5>
                        <p>Euro</p>
                        <small class="text-muted">Official currency of the Eurozone</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">🇬🇧 GBP</h5>
                        <p>British Pound</p>
                        <small class="text-muted">One of the oldest currencies</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">🇯🇵 JPY</h5>
                        <p>Japanese Yen</p>
                        <small class="text-muted">Major Asian currency</small>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Tips for Currency Exchange</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Avoid airport exchanges:</strong> They typically offer the worst rates</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Compare rates:</strong> Check multiple sources before exchanging</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Watch for fees:</strong> Some services advertise "0% commission" but have poor rates</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Use credit cards wisely:</strong> Many offer competitive exchange rates</li>
        </ul>
        
        <h3 class="mt-5">Factors Affecting Exchange Rates</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Interest Rates</h6>
                    <p class="small mb-0">Higher rates attract foreign investment, strengthening currency</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Economic Performance</h6>
                    <p class="small mb-0">Strong economies tend to have strong currencies</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Political Stability</h6>
                    <p class="small mb-0">Stable countries attract more investment</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <h6>Market Speculation</h6>
                    <p class="small mb-0">Trader expectations can influence currency values</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
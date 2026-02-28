@extends('layouts.app')

@section('title', $calculator['name'] . ' - Coming Soon - Calculator Hub')

@section('content')
<div class="container">
    <div class="text-center py-5">
        <div class="mb-4">
            <i class="{{ $calculator['icon'] }} fa-5x" style="color: var(--primary);"></i>
        </div>
        
        <h1 class="display-4 mb-3">{{ $calculator['name'] }}</h1>
        <p class="lead text-muted mb-4">{{ $calculator['description'] }}</p>
        
        <div class="calculator-container mx-auto" style="max-width: 500px;">
            <div class="text-center py-4">
                <i class="fas fa-tools fa-4x mb-3" style="color: var(--accent);"></i>
                <h2 class="h3 mb-3">Coming Soon!</h2>
                <p class="mb-4">We're working hard to bring you this calculator. It will be available shortly.</p>
                
                <div class="progress mb-4" style="height: 10px;">
                    <div class="progress-bar bg-primary" style="width: 75%;"></div>
                </div>
                
                <p class="text-muted">Want to be notified when it's ready?</p>
                
                <form wire:submit.prevent="notifyMe" class="row g-2 justify-content-center">
                    <div class="col-md-8">
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Notify Me</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-5">
            <h3 class="h4 mb-4">While you wait, try these calculators:</h3>
            <div class="row g-3 justify-content-center">
                <div class="col-md-3">
                    <a href="{{ route('calculator.show', 'percentage') }}" class="calculator-card text-decoration-none">
                        <div class="calculator-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="calculator-info">
                            <h3>Percentage Calculator</h3>
                            <p>Calculate percentages easily</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('calculator.show', 'bmi') }}" class="calculator-card text-decoration-none">
                        <div class="calculator-icon">
                            <i class="fas fa-weight-scale"></i>
                        </div>
                        <div class="calculator-info">
                            <h3>BMI Calculator</h3>
                            <p>Check your Body Mass Index</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('calculator.show', 'mortgage') }}" class="calculator-card text-decoration-none">
                        <div class="calculator-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="calculator-info">
                            <h3>Mortgage Calculator</h3>
                            <p>Plan your home loan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
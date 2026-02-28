@extends('layouts.app')

@section('title', '{{ $calculator['name'] }} - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>{{ $calculator['name'] }}</h1>
        <p class="text-muted">{{ $calculator['description'] }}</p>
    </div>
    
    <div class="calculator-container">
        @livewire('{{ $slug }}-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding {{ $calculator['name'] }}</h2>
        <p>Detailed explanation about this calculator and its practical applications.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Did you know?</strong> Interesting fact about this calculation.
        </div>
        
        <h3 class="mt-4">How It Works</h3>
        <p>Explanation of the calculation methodology and formulas used.</p>
        
        <h3 class="mt-4">Practical Applications</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Application 1:</strong> Description</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Application 2:</strong> Description</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Application 3:</strong> Description</li>
        </ul>
        
        <h3 class="mt-4">Tips & Best Practices</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> Tip 1</li>
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> Tip 2</li>
            <li class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> Tip 3</li>
        </ul>
    </div>
</div>
@endsection
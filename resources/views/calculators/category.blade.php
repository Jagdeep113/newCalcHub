@extends('layouts.app')

@section('title', $categoryName . ' - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>{{ $categoryName }}</h1>
        <p class="text-muted">Choose from our collection of specialized calculators</p>
    </div>
    
    <div class="category-tabs">
        <a href="{{ route('calculators.category', 'financial') }}" class="category-tab {{ $category == 'financial' ? 'active' : '' }}">Financial</a>
        <a href="{{ route('calculators.category', 'fitness') }}" class="category-tab {{ $category == 'fitness' ? 'active' : '' }}">Fitness</a>
        <a href="{{ route('calculators.category', 'math') }}" class="category-tab {{ $category == 'math' ? 'active' : '' }}">Math</a>
        <a href="{{ route('calculators.category', 'converter') }}" class="category-tab {{ $category == 'converter' ? 'active' : '' }}">Converters</a>
    </div>
    
    <div class="calculator-grid">
        @foreach($calculators as $slug => $calculator)
        <a href="{{ route('calculator.show', $slug) }}" class="calculator-card">
            <div class="calculator-icon">
                <i class="{{ $calculator['icon'] }}"></i>
            </div>
            <div class="calculator-info">
                <h3>{{ $calculator['name'] }}</h3>
                <p>{{ $calculator['description'] }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
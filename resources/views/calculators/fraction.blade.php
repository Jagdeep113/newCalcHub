@extends('layouts.app')

@section('title', 'Fraction Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Fraction Calculator</h1>
        <p class="text-muted">Add, subtract, multiply, and divide fractions with step-by-step results</p>
    </div>
    
    <div class="calculator-container">
        @livewire('fraction-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Fractions</h2>
        <p>A fraction represents a part of a whole. It consists of a numerator (top number) and a denominator (bottom number).</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="bg-light p-4 rounded-3 text-center">
                    <h3 class="mb-0 display-4">¾</h3>
                    <p class="mb-0"><strong>Numerator:</strong> 3 (parts we have)</p>
                    <p><strong>Denominator:</strong> 4 (total parts)</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-primary text-white p-4 rounded-3">
                    <h4 class="text-white">Reading Fractions</h4>
                    <ul class="mb-0 text-white">
                        <li>¼ = one-fourth</li>
                        <li>½ = one-half</li>
                        <li>¾ = three-fourths</li>
                        <li>⅓ = one-third</li>
                        <li>⅔ = two-thirds</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Fraction Operations</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adding Fractions</h5>
                        <p class="card-text">½ + ⅓ = 3⁄6 + 2⁄6 = 5⁄6</p>
                        <p class="small text-muted">Find common denominator, then add numerators</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Subtracting Fractions</h5>
                        <p class="card-text">¾ - ¼ = 3⁄4 - 1⁄4 = 2⁄4 = ½</p>
                        <p class="small text-muted">Subtract numerators when denominators are the same</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Multiplying Fractions</h5>
                        <p class="card-text">½ × ⅓ = 1×1⁄2×3 = 1⁄6</p>
                        <p class="small text-muted">Multiply numerators and denominators straight across</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dividing Fractions</h5>
                        <p class="card-text">½ ÷ ⅓ = ½ × 3⁄1 = 3⁄2 = 1½</p>
                        <p class="small text-muted">Multiply by the reciprocal of the second fraction</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Simplifying Fractions</h3>
        <p>To simplify a fraction, divide both numerator and denominator by their greatest common divisor (GCD).</p>
        <div class="bg-light p-4 rounded-3">
            <p class="h5 text-center">8⁄12 = 8÷4⁄12÷4 = 2⁄3</p>
            <p class="text-center small">The GCD of 8 and 12 is 4</p>
        </div>
        
        <h3 class="mt-5">Common Fraction-Decimal Equivalents</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Fraction</th>
                        <th>Decimal</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>½</td><td>0.5</td><td>50%</td></tr>
                    <tr><td>¼</td><td>0.25</td><td>25%</td></tr>
                    <tr><td>¾</td><td>0.75</td><td>75%</td></tr>
                    <tr><td>⅓</td><td>0.333...</td><td>33.33%</td></tr>
                    <tr><td>⅔</td><td>0.666...</td><td>66.67%</td></tr>
                    <tr><td>⅕</td><td>0.2</td><td>20%</td></tr>
                    <tr><td>⅛</td><td>0.125</td><td>12.5%</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Retirement Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Retirement Calculator</h1>
        <p class="text-muted">Plan your financial future and estimate how much you need to save for a comfortable retirement</p>
    </div>
    
    <div class="calculator-container">
        @livewire('retirement-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Retirement Planning</h2>
        <p>Retirement planning is the process of determining retirement income goals and the actions necessary to achieve those goals.</p>
        
        <div class="alert alert-warning mt-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Important:</strong> According to studies, nearly 40% of Americans have less than $10,000 saved for retirement. Starting early is key!
        </div>
        
        <h3 class="mt-4">Retirement Income Sources</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Social Security</h5>
                        <p class="card-text">Government benefits based on your work history. Typically replaces about 40% of pre-retirement income.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Employer Pensions</h5>
                        <p class="card-text">Defined benefit plans offered by some employers. Becoming less common.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">401(k) / IRA</h5>
                        <p class="card-text">Tax-advantaged retirement accounts you contribute to yourself.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Personal Savings</h5>
                        <p class="card-text">Investments, savings accounts, and other assets you've accumulated.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">The 4% Rule</h3>
        <div class="bg-light p-4 rounded-3">
            <p>The 4% rule is a common guideline for retirement withdrawals:</p>
            <p class="h4 text-center my-3">Withdraw 4% of your retirement savings in the first year, then adjust for inflation each year.</p>
            <p class="text-muted text-center">This strategy is designed to make your savings last 30 years.</p>
        </div>
        
        <h3 class="mt-5">Retirement Savings Guidelines by Age</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Age</th>
                        <th>Recommended Savings (multiple of salary)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>30</td><td>1x your annual salary</td></tr>
                    <tr><td>40</td><td>3x your annual salary</td></tr>
                    <tr><td>50</td><td>6x your annual salary</td></tr>
                    <tr><td>60</td><td>8x your annual salary</td></tr>
                    <tr><td>67</td><td>10x your annual salary</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
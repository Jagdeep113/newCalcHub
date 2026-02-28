@extends('layouts.app')

@section('title', 'Loan Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Loan Calculator</h1>
        <p class="text-muted">Calculate your loan payments, total interest, and create an amortization schedule</p>
    </div>
    
    <div class="calculator-container">
        @livewire('loan-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Loans</h2>
        <p>A loan allows you to borrow money that you repay over time with interest. Understanding how loans work helps you make informed financial decisions.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Pro Tip:</strong> Even a small difference in interest rates can save you thousands over the life of a loan.
        </div>
        
        <h3 class="mt-4">Types of Loans</h3>
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Personal Loans</h5>
                        <p class="card-text">Unsecured loans for various purposes like debt consolidation or major purchases.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Auto Loans</h5>
                        <p class="card-text">Secured loans for vehicle purchases, typically with lower interest rates.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Student Loans</h5>
                        <p class="card-text">Educational loans with special repayment options and protections.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Business Loans</h5>
                        <p class="card-text">Funding for business startups, expansion, or operations.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Factors That Affect Your Loan</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Credit Score:</strong> Higher scores get better rates</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Loan Term:</strong> Shorter terms mean higher payments but less interest</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Income:</strong> Lenders assess your ability to repay</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Debt-to-Income Ratio:</strong> Your existing debt affects approval</li>
        </ul>
        
        <div class="bg-light p-4 rounded-3 mt-4">
            <h4>Amortization Explained</h4>
            <p>Amortization is the process of paying off a debt through regular payments. In the early years, most of your payment goes toward interest. As the loan matures, more goes toward principal.</p>
        </div>
    </div>
</div>
@endsection
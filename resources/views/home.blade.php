@extends('layouts.app')

@section('title', 'Calculator Hub - Smart Calculations for Complex Decisions')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="security-badge">
            <i class="fas fa-shield-check"></i>
            <span>Secure & Private Calculations</span>
        </div>
        <h1>Smart Calculations for Complex Decisions</h1>
        <p>Access 50+ specialized calculators for finance, health, math, and everyday life. All your calculations are secure and private.</p>
        
        <div class="search-box">
            <input type="text" id="searchCalculators" placeholder="Search for a calculator...">
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</section>

<!-- Category Sections -->
@foreach($categories as $key => $category)
<section class="categories" id="{{ $key }}">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>{{ $category['name'] }}</h2>
            <p class="text-muted">{{ $category['description'] }}</p>
        </div>
        
        <div class="calculator-grid">
            @foreach($category['calculators'] as $calculator)
            <a href="{{ route('calculator.show', $calculator['slug']) }}" class="calculator-card">
                <div class="calculator-icon">
                    <i class="{{ $calculator['icon'] }}"></i>
                </div>
                <div class="calculator-info">
                    <h3>{{ $calculator['name'] }}</h3>
                    <p>{{ $calculator['description'] ?? 'Calculate with precision' }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endforeach

<!-- Features Section -->
<section class="features py-5 bg-white">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Why Choose Calculator Hub?</h2>
            <p class="text-muted">We provide more than just calculations - we offer insights and clarity</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-bolt fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h3>Lightning Fast</h3>
                    <p class="text-muted">Get instant results with our optimized calculation engines</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-chart-pie fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h3>Visual Reports</h3>
                    <p class="text-muted">Understand your results with clear charts and graphs</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-mobile-alt fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h3>Mobile Friendly</h3>
                    <p class="text-muted">Access all calculators on any device, anywhere</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Security Features -->
<section class="security-features py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Your Privacy & Security Matters</h2>
            <p class="text-muted">We implement industry-leading security measures to protect your data</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="security-item text-center p-4 bg-white rounded-3 shadow-sm">
                    <div class="security-icon mb-3">
                        <i class="fas fa-lock fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h4>End-to-End Encryption</h4>
                    <p class="text-muted">All calculations are encrypted in transit</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="security-item text-center p-4 bg-white rounded-3 shadow-sm">
                    <div class="security-icon mb-3">
                        <i class="fas fa-database fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h4>No Data Storage</h4>
                    <p class="text-muted">We don't store your personal calculation data</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="security-item text-center p-4 bg-white rounded-3 shadow-sm">
                    <div class="security-icon mb-3">
                        <i class="fas fa-shield-alt fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h4>Privacy First</h4>
                    <p class="text-muted">We never share your data with third parties</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="security-item text-center p-4 bg-white rounded-3 shadow-sm">
                    <div class="security-icon mb-3">
                        <i class="fas fa-user-secret fa-3x" style="color: var(--primary);"></i>
                    </div>
                    <h4>Anonymous Usage</h4>
                    <p class="text-muted">Use most calculators without signing up</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('searchCalculators').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.calculator-card');
    
    cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('p').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>
@endsection
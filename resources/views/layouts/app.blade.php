<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Calculator Hub')) - Smart Calculations for Complex Decisions</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Vite Assets -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <div class="logo-icon">C</div>
                    <span class="logo-text">Calculator<span>Hub</span></span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('calculators.category', 'financial') ? 'active' : '' }}" 
                               href="{{ route('calculators.category', 'financial') }}">Financial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('calculators.category', 'fitness') ? 'active' : '' }}" 
                               href="{{ route('calculators.category', 'fitness') }}">Fitness</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('calculators.category', 'math') ? 'active' : '' }}" 
                               href="{{ route('calculators.category', 'math') }}">Math</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('calculators.category', 'converter') ? 'active' : '' }}" 
                               href="{{ route('calculators.category', 'converter') }}">Converters</a>
                        </li>
                    </ul>
                    
                    <div class="auth-buttons">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline">Sign Out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline">Sign In</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Calculator Hub</h3>
                    <p>Your one-stop resource for all types of calculators. Accurate, easy-to-use, and completely secure!</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ route('calculators.category', 'financial') }}"><i class="fas fa-coins"></i> Financial Calculators</a></li>
                        <li><a href="{{ route('calculators.category', 'fitness') }}"><i class="fas fa-heartbeat"></i> Fitness Calculators</a></li>
                        <li><a href="{{ route('calculators.category', 'math') }}"><i class="fas fa-calculator"></i> Math Calculators</a></li>
                        <li><a href="{{ route('calculators.category', 'converter') }}"><i class="fas fa-exchange-alt"></i> Unit Converters</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Company</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About Us</a></li>
                        <li><a href="{{ route('privacy') }}"><i class="fas fa-lock"></i> Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}"><i class="fas fa-file-contract"></i> Terms of Use</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Calculator Hub. All rights reserved. Secure calculations for everyone.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
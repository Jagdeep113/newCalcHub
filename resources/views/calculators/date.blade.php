@extends('layouts.app')

@section('title', 'Date Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Date Calculator</h1>
        <p class="text-muted">Calculate the difference between dates, add or subtract days, and find day of week</p>
    </div>
    
    <div class="calculator-container">
        @livewire('date-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Date Calculations</h2>
        <p>Date calculations are essential for planning, scheduling, and historical analysis.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-calendar-alt me-2"></i>
            <strong>Did you know?</strong> The Gregorian calendar, used by most of the world today, was introduced in 1582 by Pope Gregory XIII.
        </div>
        
        <h3 class="mt-4">Calendar Systems</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Gregorian Calendar</h5>
                        <p class="card-text">Internationally accepted civil calendar, introduced in 1582</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Julian Calendar</h5>
                        <p class="card-text">Predecessor to Gregorian, used in historical contexts</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Lunar Calendar</h5>
                        <p class="card-text">Based on moon cycles (Islamic Hijri calendar)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Lunisolar Calendar</h5>
                        <p class="card-text">Combines solar and lunar elements (Hebrew, Chinese)</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Leap Year Rules</h3>
        <div class="bg-light p-4 rounded-3">
            <ol class="mb-0">
                <li class="mb-2">If the year is divisible by 4, it's a leap year</li>
                <li class="mb-2">Unless the year is also divisible by 100, then it's not a leap year</li>
                <li class="mb-2">Unless the year is also divisible by 400, then it is a leap year</li>
            </ol>
        </div>
        
        <h3 class="mt-5">Month Lengths</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>31 days:</strong> January, March, May, July, August, October, December</li>
                    <li class="mb-2"><strong>30 days:</strong> April, June, September, November</li>
                    <li class="mb-2"><strong>28/29 days:</strong> February</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="bg-primary text-white p-3 rounded-3">
                    <h6 class="text-white">Knuckle Method</h6>
                    <p class="small mb-0 text-white">Use your knuckles to remember month lengths. Knuckles = 31 days, valleys = 30 days (except February).</p>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Practical Applications</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-briefcase text-success me-2"></i> <strong>Project management:</strong> Calculate deadlines and milestones</li>
            <li class="mb-3"><i class="fas fa-calendar-check text-success me-2"></i> <strong>Event planning:</strong> Determine dates for future events</li>
            <li class="mb-3"><i class="fas fa-gavel text-success me-2"></i> <strong>Legal:</strong> Statute of limitations, contract dates</li>
            <li class="mb-3"><i class="fas fa-plane text-success me-2"></i> <strong>Travel:</strong> Trip planning and duration</li>
        </ul>
        
        <h3 class="mt-4">Fun Date Facts</h3>
        <div class="card">
            <div class="card-body">
                <ul class="mb-0">
                    <li>February is the only month that can have no full moon (last occurred in 2018)</li>
                    <li>The year 1752 in Britain had only 355 days due to calendar change</li>
                    <li>There is no year 0 in the Gregorian calendar</li>
                    <li>July and August both have 31 days because Roman emperors wanted their months to be long</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
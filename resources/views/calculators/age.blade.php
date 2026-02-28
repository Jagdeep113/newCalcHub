@extends('layouts.app')

@section('title', 'Age Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>Age Calculator</h1>
        <p class="text-muted">Calculate your exact age in years, months, and days</p>
    </div>
    
    <div class="calculator-container">
        @livewire('age-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding Age Calculation</h2>
        <p>Age calculation might seem simple, but accurately calculating age requires accounting for leap years and varying month lengths.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-globe me-2"></i>
            <strong>Cultural Note:</strong> In some East Asian countries, people are considered 1 year old at birth and add a year on Lunar New Year.
        </div>
        
        <h3 class="mt-4">Age Milestones</h3>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">13</h5>
                        <p class="small">Teenager</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">16</h5>
                        <p class="small">Driving age</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">18</h5>
                        <p class="small">Adult</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">21</h5>
                        <p class="small">Legal drinking</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">30</h5>
                        <p class="small">Peak career</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">50</h5>
                        <p class="small">Wisdom years</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">65</h5>
                        <p class="small">Retirement</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">100</h5>
                        <p class="small">Century</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Zodiac Signs</h3>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Sign</th>
                        <th>Dates</th>
                        <th>Symbol</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Aries</td><td>Mar 21 - Apr 19</td><td>♈ Ram</td></tr>
                    <tr><td>Taurus</td><td>Apr 20 - May 20</td><td>♉ Bull</td></tr>
                    <tr><td>Gemini</td><td>May 21 - Jun 20</td><td>♊ Twins</td></tr>
                    <tr><td>Cancer</td><td>Jun 21 - Jul 22</td><td>♋ Crab</td></tr>
                    <tr><td>Leo</td><td>Jul 23 - Aug 22</td><td>♌ Lion</td></tr>
                    <tr><td>Virgo</td><td>Aug 23 - Sep 22</td><td>♍ Virgin</td></tr>
                    <tr><td>Libra</td><td>Sep 23 - Oct 22</td><td>♎ Scales</td></tr>
                    <tr><td>Scorpio</td><td>Oct 23 - Nov 21</td><td>♏ Scorpion</td></tr>
                    <tr><td>Sagittarius</td><td>Nov 22 - Dec 21</td><td>♐ Archer</td></tr>
                    <tr><td>Capricorn</td><td>Dec 22 - Jan 19</td><td>♑ Goat</td></tr>
                    <tr><td>Aquarius</td><td>Jan 20 - Feb 18</td><td>♒ Water bearer</td></tr>
                    <tr><td>Pisces</td><td>Feb 19 - Mar 20</td><td>♓ Fish</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-4">Leap Years</h3>
        <p>A leap year occurs every 4 years, adding an extra day (Feb 29) to keep our calendar synchronized with the Earth's orbit.</p>
        <div class="bg-light p-3 rounded-3">
            <p class="mb-0"><strong>Leap year rule:</strong> Year divisible by 4, except century years unless divisible by 400.</p>
            <p class="small mb-0 mt-2">Example: 2000 was a leap year, 1900 was not.</p>
        </div>
    </div>
</div>
@endsection
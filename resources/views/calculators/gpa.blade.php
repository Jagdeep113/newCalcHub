@extends('layouts.app')

@section('title', 'GPA Calculator - Calculator Hub')

@section('content')
<div class="container">
    <div class="page-header text-center mb-5">
        <h1>GPA Calculator</h1>
        <p class="text-muted">Calculate your Grade Point Average and track your academic progress</p>
    </div>
    
    <div class="calculator-container">
        @livewire('gpa-calculator')
    </div>
    
    <div class="content-section mt-5">
        <h2>Understanding GPA</h2>
        <p>Grade Point Average (GPA) is a standardized way of measuring academic achievement in the United States and other countries.</p>
        
        <div class="alert alert-info mt-4">
            <i class="fas fa-history me-2"></i>
            <strong>Did you know?</strong> The GPA system was first introduced in the early 20th century and has become the standard for academic evaluation.
        </div>
        
        <h3 class="mt-4">GPA Scales</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">4.0 Scale (Unweighted)</h5>
                        <p class="card-text">Standard scale where A=4.0, B=3.0, C=2.0, D=1.0, F=0.0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">4.3 Scale</h5>
                        <p class="card-text">Includes A+ (4.3) for exceptional performance</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">5.0 Scale (Weighted)</h5>
                        <p class="card-text">For honors/AP classes, where A=5.0 to reflect course difficulty</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="mt-5">Letter Grade to GPA Conversion</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Letter Grade</th>
                        <th>Percentage</th>
                        <th>4.0 Scale</th>
                        <th>4.3 Scale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>A+</td><td>97-100%</td><td>4.0</td><td>4.3</td></tr>
                    <tr><td>A</td><td>93-96%</td><td>4.0</td><td>4.0</td></tr>
                    <tr><td>A-</td><td>90-92%</td><td>3.7</td><td>3.7</td></tr>
                    <tr><td>B+</td><td>87-89%</td><td>3.3</td><td>3.3</td></tr>
                    <tr><td>B</td><td>83-86%</td><td>3.0</td><td>3.0</td></tr>
                    <tr><td>B-</td><td>80-82%</td><td>2.7</td><td>2.7</td></tr>
                    <tr><td>C+</td><td>77-79%</td><td>2.3</td><td>2.3</td></tr>
                    <tr><td>C</td><td>73-76%</td><td>2.0</td><td>2.0</td></tr>
                    <tr><td>C-</td><td>70-72%</td><td>1.7</td><td>1.7</td></tr>
                    <tr><td>D+</td><td>67-69%</td><td>1.3</td><td>1.3</td></tr>
                    <tr><td>D</td><td>63-66%</td><td>1.0</td><td>1.0</td></tr>
                    <tr><td>F</td><td>Below 60%</td><td>0.0</td><td>0.0</td></tr>
                </tbody>
            </table>
        </div>
        
        <h3 class="mt-5">How to Improve Your GPA</h3>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Attend all classes:</strong> Regular attendance improves understanding</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Develop study habits:</strong> Find what works for you - flashcards, groups, or practice tests</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Seek help early:</strong> Use office hours and tutoring services</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Focus on high-credit courses:</strong> They impact your GPA the most</li>
            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>Manage your time:</strong> Create a study schedule and stick to it</li>
        </ul>
        
        <h3 class="mt-4">GPA Formula</h3>
        <div class="bg-light p-4 rounded-3 text-center">
            <p class="h4"><code>GPA = Σ(Grade Points × Credit Hours) ÷ Σ(Credit Hours)</code></p>
            <p class="small text-muted mt-2">Sum of (grade points × credits) divided by total credits</p>
        </div>
    </div>
</div>
@endsection
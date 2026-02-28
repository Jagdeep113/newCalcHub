@extends('layouts.app')

@section('title', 'Terms of Service')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Terms of Service</h1>
        
        <div class="prose">
            <p>Last updated: {{ date('F j, Y') }}</p>
            
            <h2 class="text-xl font-semibold mt-6 mb-3">1. Acceptance of Terms</h2>
            <p class="mb-4">By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>
            
            <h2 class="text-xl font-semibold mt-6 mb-3">2. Use License</h2>
            <p class="mb-4">Permission is granted to temporarily use this website for personal, non-commercial use only.</p>
            
            <h2 class="text-xl font-semibold mt-6 mb-3">3. Disclaimer</h2>
            <p class="mb-4">The calculators provided on this website are for informational purposes only. We make no warranties about the accuracy or reliability of the results.</p>
            
            <h2 class="text-xl font-semibold mt-6 mb-3">4. Limitations</h2>
            <p class="mb-4">In no event shall we be liable for any damages arising out of the use or inability to use the materials on this website.</p>
            
            <h2 class="text-xl font-semibold mt-6 mb-3">5. Contact</h2>
            <p>If you have any questions about these Terms of Service, please contact us.</p>
        </div>
    </div>
</div>
@endsection

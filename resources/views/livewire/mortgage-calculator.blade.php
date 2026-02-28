<div>
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-4">Loan Details</h3>
            
            <div class="form-group">
                <label>Home Price ($)</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="homePrice" 
                       min="0" 
                       step="1000">
            </div>
            
            <div class="form-group">
                <label>Down Payment ($)</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="downPayment" 
                       min="0" 
                       step="1000">
                <small class="text-muted">
                    Down payment: {{ number_format(($downPayment / $homePrice) * 100, 1) }}%
                </small>
            </div>
            
            <div class="form-group">
                <label>Interest Rate (%)</label>
                <input type="range" 
                       class="form-range" 
                       wire:model.live="interestRate" 
                       min="1" 
                       max="20" 
                       step="0.1">
                <div class="text-end">{{ $interestRate }}%</div>
            </div>
            
            <div class="form-group">
                <label>Loan Term (years)</label>
                <select class="form-select" wire:model.live="loanTerm">
                    <option value="15">15 years</option>
                    <option value="20">20 years</option>
                    <option value="30">30 years</option>
                </select>
            </div>
            
            <h4 class="mt-4 mb-3">Additional Costs</h4>
            
            <div class="form-group">
                <label>Property Tax ($/year)</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="propertyTax" 
                       min="0" 
                       step="100">
            </div>
            
            <div class="form-group">
                <label>Home Insurance ($/year)</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="homeInsurance" 
                       min="0" 
                       step="100">
            </div>
            
            <div class="form-group">
                <label>HOA Fees ($/month)</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="hoa" 
                       min="0" 
                       step="10">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="results-container">
                <h4 class="mb-4">Monthly Payment</h4>
                <div class="results-value">${{ number_format($monthlyPayment, 2) }}</div>
                
                <div class="mt-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Principal & Interest:</span>
                        <strong>${{ number_format($monthlyPrincipalInterest, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Property Tax:</span>
                        <strong>${{ number_format($monthlyTax, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Home Insurance:</span>
                        <strong>${{ number_format($monthlyInsurance, 2) }}</strong>
                    </div>
                    @if($monthlyPMI > 0)
                    <div class="d-flex justify-content-between mb-2">
                        <span>PMI:</span>
                        <strong>${{ number_format($monthlyPMI, 2) }}</strong>
                    </div>
                    @endif
                    @if($monthlyHOA > 0)
                    <div class="d-flex justify-content-between mb-2">
                        <span>HOA Fees:</span>
                        <strong>${{ number_format($monthlyHOA, 2) }}</strong>
                    </div>
                    @endif
                    <hr>
                    <div class="d-flex justify-content-between mb-2 fw-bold">
                        <span>Total Monthly Payment:</span>
                        <span class="text-primary">${{ number_format($monthlyPayment, 2) }}</span>
                    </div>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Loan Amount:</span>
                        <strong>${{ number_format($loanAmount, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Interest Paid:</span>
                        <strong>${{ number_format($totalInterest, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total of {{ $loanTerm * 12 }} Payments:</span>
                        <strong>${{ number_format($totalPayment, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Payoff Date:</span>
                        <strong>{{ $payoffDate }}</strong>
                    </div>
                </div>
            </div>
            
            <!-- Payment Breakdown Chart -->
            <div class="mt-4">
                <h5>Payment Breakdown</h5>
                @php
                    $principalPercent = ($monthlyPrincipalInterest / $monthlyPayment) * 100;
                    $taxPercent = ($monthlyTax / $monthlyPayment) * 100;
                    $insurancePercent = ($monthlyInsurance / $monthlyPayment) * 100;
                    $otherPercent = (($monthlyPMI + $monthlyHOA) / $monthlyPayment) * 100;
                @endphp
                <div class="progress" style="height: 30px;">
                    <div class="progress-bar bg-primary" style="width: {{ $principalPercent }}%" 
                         title="Principal & Interest">P&I</div>
                    <div class="progress-bar bg-warning" style="width: {{ $taxPercent }}%" 
                         title="Property Tax">Tax</div>
                    <div class="progress-bar bg-info" style="width: {{ $insurancePercent }}%" 
                         title="Insurance">Ins</div>
                    @if($otherPercent > 0)
                    <div class="progress-bar bg-secondary" style="width: {{ $otherPercent }}%" 
                         title="Other">Other</div>
                    @endif
                </div>
                <div class="d-flex justify-content-between mt-2 small">
                    <span><span class="badge bg-primary">&nbsp;</span> P&I</span>
                    <span><span class="badge bg-warning">&nbsp;</span> Tax</span>
                    <span><span class="badge bg-info">&nbsp;</span> Insurance</span>
                    @if($otherPercent > 0)
                    <span><span class="badge bg-secondary">&nbsp;</span> Other</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
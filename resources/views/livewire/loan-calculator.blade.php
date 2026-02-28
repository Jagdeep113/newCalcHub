<div>
    <div class="mb-4">
        <div class="btn-group w-100" role="group">
            <button type="button" 
                    class="btn {{ $calculationType === 'payment' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('calculationType', 'payment')">
                Payment Calculator
            </button>
            <button type="button" 
                    class="btn {{ $calculationType === 'affordability' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('calculationType', 'affordability')">
                Affordability Calculator
            </button>
        </div>
    </div>

    @if($calculationType === 'payment')
        <div class="form-group">
            <label>Loan Amount ($)</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="loanAmount" 
                   min="100" 
                   step="100">
        </div>
        
        <div class="form-group">
            <label>Interest Rate (%)</label>
            <input type="range" 
                   class="form-range" 
                   wire:model.live="interestRate" 
                   min="0.5" 
                   max="20" 
                   step="0.1">
            <div class="text-end">{{ $interestRate }}%</div>
        </div>
        
        <div class="form-group">
            <label>Loan Term (months)</label>
            <input type="range" 
                   class="form-range" 
                   wire:model.live="loanTerm" 
                   min="6" 
                   max="84" 
                   step="6">
            <div class="text-end">{{ $loanTerm }} months ({{ $loanTerm / 12 }} years)</div>
        </div>
    @else
        <div class="form-group">
            <label>Monthly Payment You Can Afford ($)</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="monthlyPayment" 
                   min="10" 
                   step="10">
        </div>
        
        <div class="form-group">
            <label>Interest Rate (%)</label>
            <input type="range" 
                   class="form-range" 
                   wire:model.live="interestRate" 
                   min="0.5" 
                   max="20" 
                   step="0.1">
            <div class="text-end">{{ $interestRate }}%</div>
        </div>
        
        <div class="form-group">
            <label>Loan Term (months)</label>
            <input type="range" 
                   class="form-range" 
                   wire:model.live="loanTerm" 
                   min="6" 
                   max="84" 
                   step="6">
            <div class="text-end">{{ $loanTerm }} months ({{ $loanTerm / 12 }} years)</div>
        </div>
    @endif

    <div class="results-container">
        @if($calculationType === 'payment')
            <div class="results-label">Monthly Payment</div>
            <div class="results-value">${{ number_format($monthlyPaymentResult, 2) }}</div>
        @else
            <div class="results-label">You Can Borrow</div>
            <div class="results-value">${{ number_format($loanAmount, 2) }}</div>
        @endif
        
        <div class="mt-4 p-3 bg-light rounded-3">
            <div class="d-flex justify-content-between mb-2">
                <span>Loan Amount:</span>
                <strong>${{ number_format($loanAmount, 2) }}</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Total Interest:</span>
                <strong>${{ number_format($totalInterest, 2) }}</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Total Payment:</span>
                <strong>${{ number_format($totalPayment, 2) }}</strong>
            </div>
            <div class="d-flex justify-content-between">
                <span>Payoff Date:</span>
                <strong>{{ $payoffDate }}</strong>
            </div>
        </div>
    </div>

    @if($calculationType === 'payment' && count($amortizationSchedule) > 0)
    <div class="mt-4">
        <h5 class="mb-3">First 12 Months Amortization</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Payment</th>
                        <th>Payment</th>
                        <th>Principal</th>
                        <th>Interest</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($amortizationSchedule as $payment)
                    <tr>
                        <td>{{ $payment['payment'] }}</td>
                        <td>${{ number_format($payment['amount'], 2) }}</td>
                        <td>${{ number_format($payment['principal'], 2) }}</td>
                        <td>${{ number_format($payment['interest'], 2) }}</td>
                        <td>${{ number_format($payment['balance'], 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
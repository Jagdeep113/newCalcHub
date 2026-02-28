<div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class="mb-3">Investment Details</h4>
            
            <div class="form-group">
                <label>Initial Investment ($)</label>
                <input type="number" class="form-control" wire:model.live="initialInvestment" step="1000">
            </div>
            
            <div class="form-group">
                <label>Monthly Contribution ($)</label>
                <input type="number" class="form-control" wire:model.live="monthlyContribution" step="100">
            </div>
            
            <div class="form-group">
                <label>Annual Return (%)</label>
                <input type="range" class="form-range" wire:model.live="annualReturn" min="1" max="20" step="0.1">
                <div class="text-end">{{ $annualReturn }}%</div>
            </div>
            
            <div class="form-group">
                <label>Investment Period (years)</label>
                <input type="range" class="form-range" wire:model.live="years" min="1" max="40" step="1">
                <div class="text-end">{{ $years }} years</div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="results-container">
                <h4 class="mb-4">Investment Growth</h4>
                
                <div class="results-value">${{ number_format($futureValue, 2) }}</div>
                
                <div class="mt-4">
                    <div class="progress mb-3" style="height: 30px;">
                        @php
                            $investedPercent = ($totalInvested / $futureValue) * 100;
                            $earningsPercent = ($totalEarnings / $futureValue) * 100;
                        @endphp
                        <div class="progress-bar bg-primary" style="width: {{ $investedPercent }}%" 
                             title="Amount Invested">{{ number_format($investedPercent, 1) }}%</div>
                        <div class="progress-bar bg-success" style="width: {{ $earningsPercent }}%" 
                             title="Investment Growth">{{ number_format($earningsPercent, 1) }}%</div>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span><span class="badge bg-primary">&nbsp;</span> Amount Invested:</span>
                        <strong>${{ number_format($totalInvested, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><span class="badge bg-success">&nbsp;</span> Investment Growth:</span>
                        <strong>${{ number_format($totalEarnings, 2) }}</strong>
                    </div>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Initial Investment:</span>
                        <strong>${{ number_format($initialInvestment, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Contributions:</span>
                        <strong>${{ number_format($monthlyContribution * $years * 12, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Annual Return Rate:</span>
                        <strong>{{ $annualReturn }}%</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
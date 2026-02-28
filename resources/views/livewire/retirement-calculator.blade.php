<div>
    <div class="row">
        <div class="col-lg-6">
            <h5 class="mb-3">Your Information</h5>
            
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <label>Current Age</label>
                    <input type="number" class="form-control" wire:model.live="currentAge" min="18" max="100">
                </div>
                <div class="col-6">
                    <label>Retirement Age</label>
                    <input type="number" class="form-control" wire:model.live="retirementAge" min="50" max="100">
                </div>
            </div>

            <div class="form-group">
                <label>Current Retirement Savings ($)</label>
                <input type="number" class="form-control" wire:model.live="currentSavings" step="1000" min="0">
            </div>

            <div class="form-group">
                <label>Annual Contribution ($)</label>
                <input type="number" class="form-control" wire:model.live="annualContribution" step="1000" min="0">
            </div>

            <div class="form-group">
                <label>Current Annual Income ($)</label>
                <input type="number" class="form-control" wire:model.live="currentIncome" step="1000" min="0">
            </div>

            <h5 class="mb-3 mt-4">Assumptions</h5>

            <div class="form-group">
                <label>Expected Return: {{ $expectedReturn }}%</label>
                <input type="range" class="form-range" wire:model.live="expectedReturn" min="1" max="12" step="0.1">
            </div>

            <div class="form-group">
                <label>Inflation Rate: {{ $inflationRate }}%</label>
                <input type="range" class="form-range" wire:model.live="inflationRate" min="1" max="5" step="0.1">
            </div>

            <div class="form-group">
                <label>Retirement Income Target: {{ $retirementIncomePercent }}%</label>
                <input type="range" class="form-range" wire:model.live="retirementIncomePercent" min="50" max="120" step="5">
            </div>

            <div class="form-group">
                <label>Life Expectancy</label>
                <input type="number" class="form-control" wire:model.live="lifeExpectancy" min="70" max="110">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Retirement Savings</div>
                <div class="results-value">${{ number_format($futureValue, 0) }}</div>
                <div class="text-muted mb-4">at age {{ $retirementAge }}</div>

                <!-- Progress Bar -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Progress to Goal</span>
                        <span>{{ number_format($progress, 1) }}%</span>
                    </div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar {{ $progress >= 100 ? 'bg-success' : 'bg-primary' }}" 
                             style="width: {{ min(100, $progress) }}%"></div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Contributions:</span>
                        <strong>${{ number_format($totalContributions, 0) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Investment Growth:</span>
                        <strong class="text-success">${{ number_format($totalGrowth, 0) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Monthly Income (4% rule):</span>
                        <strong>${{ number_format($monthlyRetirementIncome, 0) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Retirement Goal:</span>
                        <strong>${{ number_format($retirementGoal, 0) }}</strong>
                    </div>
                </div>

                <div class="mt-4 p-3 {{ $progress >= 100 ? 'bg-success' : 'bg-warning' }} bg-opacity-10 rounded-3">
                    <h6 class="mb-2">Status: {{ $status }}</h6>
                    
                    @if($this->shortfall > 0)
                        <p class="small mb-0">
                            You are <strong>${{ number_format($this->shortfall, 0) }}</strong> short of your goal.
                            @if($this->getYearsToRetirementProperty > 0)
                                Consider increasing your annual contribution by 
                                <strong>${{ number_format($this->recommendedContribution, 0) }}</strong>.
                            @endif
                        </p>
                    @else
                        <p class="small mb-0 text-success">
                            <i class="fas fa-check-circle me-1"></i>
                            Congratulations! You're on track to meet your retirement goal.
                        </p>
                    @endif
                </div>

                <!-- Key Metrics -->
                <div class="row g-3 mt-3">
                    <div class="col-6">
                        <div class="bg-light p-3 rounded-3 text-center">
                            <div class="small text-muted">Years to Retirement</div>
                            <div class="h4 mb-0">{{ $this->getYearsToRetirementProperty }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-light p-3 rounded-3 text-center">
                            <div class="small text-muted">Retirement Duration</div>
                            <div class="h4 mb-0">{{ $this->retirementDuration }} years</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
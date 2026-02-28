<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <div class="btn-group w-100" role="group">
                    <button type="button" 
                            class="btn {{ $calculationType === 'one-time' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('calculationType', 'one-time')">
                        One-Time Investment
                    </button>
                    <button type="button" 
                            class="btn {{ $calculationType === 'monthly' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('calculationType', 'monthly')">
                        Monthly Contributions
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label>Principal Amount ($)</label>
                <input type="number" class="form-control" wire:model.live="principal" step="1000" min="0">
            </div>

            @if($calculationType === 'monthly')
            <div class="form-group">
                <label>Monthly Contribution ($)</label>
                <input type="number" class="form-control" wire:model.live="monthlyContribution" step="100" min="0">
            </div>
            @endif

            <div class="form-group">
                <label>Annual Interest Rate: {{ $rate }}%</label>
                <input type="range" class="form-range" wire:model.live="rate" min="1" max="20" step="0.1">
            </div>

            <div class="form-group">
                <label>Time Period: {{ $years }} years</label>
                <input type="range" class="form-range" wire:model.live="years" min="1" max="40" step="1">
            </div>

            <div class="form-group">
                <label>Compound Frequency</label>
                <select class="form-select" wire:model.live="compoundFrequency">
                    @foreach($this->compoundFrequencyOptions as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Future Value</div>
                <div class="results-value">${{ number_format($futureValue, 2) }}</div>

                <!-- Visualization -->
                <div class="progress mt-4 mb-3" style="height: 30px;">
                    @php
                        $principalPercent = ($totalContributions / $futureValue) * 100;
                        $interestPercent = ($totalInterest / $futureValue) * 100;
                    @endphp
                    <div class="progress-bar bg-primary" style="width: {{ $principalPercent }}%">
                        Principal
                    </div>
                    <div class="progress-bar bg-success" style="width: {{ $interestPercent }}%">
                        Interest
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Contributions:</span>
                        <strong>${{ number_format($totalContributions, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Interest Earned:</span>
                        <strong class="text-success">${{ number_format($totalInterest, 2) }}</strong>
                    </div>
                </div>

                <!-- Rule of 72 -->
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">The Rule of 72</h6>
                    @php
                        $doublingTime = 72 / $rate;
                    @endphp
                    <p class="small mb-0">
                        At {{ $rate }}% interest, your money will double approximately every 
                        <strong>{{ number_format($doublingTime, 1) }} years</strong>.
                    </p>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            @if(count($yearlyBreakdown) > 0)
            <div class="mt-4">
                <h6 class="mb-3">Growth Over Time</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Year</th>
                                <th>Balance</th>
                                <th>Contributions</th>
                                <th>Interest</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($yearlyBreakdown as $data)
                            <tr>
                                <td>{{ $data['year'] }}</td>
                                <td>${{ number_format($data['value'], 0) }}</td>
                                <td>${{ number_format($data['contributions'], 0) }}</td>
                                <td>${{ number_format($data['interest'], 0) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
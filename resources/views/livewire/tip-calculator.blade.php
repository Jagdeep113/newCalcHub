<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <label class="mb-2">Service Type</label>
                <div class="btn-group w-100" role="group">
                    <button type="button" 
                            class="btn {{ $serviceType === 'restaurant' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('serviceType', 'restaurant')">
                        Restaurant
                    </button>
                    <button type="button" 
                            class="btn {{ $serviceType === 'delivery' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('serviceType', 'delivery')">
                        Delivery
                    </button>
                    <button type="button" 
                            class="btn {{ $serviceType === 'bar' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('serviceType', 'bar')">
                        Bar
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label>Bill Amount ($)</label>
                <input type="number" class="form-control" wire:model.live="billAmount" step="0.01" min="0">
            </div>

            <div class="form-group">
                <label>Tip Percentage: {{ $tipPercent }}%</label>
                <input type="range" class="form-range" wire:model.live="tipPercent" min="0" max="30" step="0.5">
                
                <div class="d-flex justify-content-between mt-2">
                    <button class="btn btn-sm btn-outline-primary" wire:click="setTipPercent(10)">10%</button>
                    <button class="btn btn-sm btn-outline-primary" wire:click="setTipPercent(15)">15%</button>
                    <button class="btn btn-sm btn-outline-primary" wire:click="setTipPercent(18)">18%</button>
                    <button class="btn btn-sm btn-outline-primary" wire:click="setTipPercent(20)">20%</button>
                    <button class="btn btn-sm btn-outline-primary" wire:click="setTipPercent(25)">25%</button>
                </div>
            </div>

            <div class="form-group">
                <label>Number of People</label>
                <input type="number" class="form-control" wire:model.live="people" min="1" max="20">
            </div>

            <div class="form-group">
                <label>Split Type</label>
                <select class="form-select" wire:model.live="splitType">
                    <option value="even">Split Evenly</option>
                    <option value="itemized">Itemized Split</option>
                    <option value="custom">Custom Split</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Total Amount</div>
                <div class="results-value">${{ number_format($totalAmount, 2) }}</div>
                <div class="text-muted mb-4">for {{ $people }} {{ Str::plural('person', $people) }}</div>

                <!-- Visualization -->
                <div class="progress mb-4" style="height: 30px;">
                    @php
                        $tipPercentOfTotal = ($tipAmount / $totalAmount) * 100;
                    @endphp
                    <div class="progress-bar bg-primary" style="width: {{ 100 - $tipPercentOfTotal }}%">
                        Bill
                    </div>
                    <div class="progress-bar bg-success" style="width: {{ $tipPercentOfTotal }}%">
                        Tip
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Bill Amount:</span>
                        <strong>${{ number_format($billAmount, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tip Amount ({{ $tipPercent }}%):</span>
                        <strong class="text-success">${{ number_format($tipAmount, 2) }}</strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total:</span>
                        <strong>${{ number_format($totalAmount, 2) }}</strong>
                    </div>
                </div>

                @if($people > 1)
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-3">Per Person</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Amount per person:</span>
                        <strong>${{ number_format($perPersonAmount, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tip per person:</span>
                        <strong>${{ number_format($tipPerPerson, 2) }}</strong>
                    </div>
                </div>
                @endif

                <div class="mt-4 p-3 bg-info bg-opacity-10 rounded-3">
                    <i class="fas fa-lightbulb me-2 text-info"></i>
                    <span class="small">{{ $this->serviceMessage }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
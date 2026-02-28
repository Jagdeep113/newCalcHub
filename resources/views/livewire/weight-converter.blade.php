<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Value</label>
                <input type="number" class="form-control" wire:model.live="value" step="any" min="0">
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-5">
                    <label>From</label>
                    <select class="form-select" wire:model.live="fromUnit">
                        @foreach($this->units as $code => $unit)
                            <option value="{{ $code }}">{{ $unit['name'] }} ({{ $unit['symbol'] }})</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-2 text-center">
                    <button class="btn btn-outline-primary rounded-circle mt-4" wire:click="swapUnits">
                        <i class="fas fa-exchange-alt"></i>
                    </button>
                </div>
                
                <div class="col-5">
                    <label>To</label>
                    <select class="form-select" wire:model.live="toUnit">
                        @foreach($this->units as $code => $unit)
                            <option value="{{ $code }}">{{ $unit['name'] }} ({{ $unit['symbol'] }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Converted Weight</div>
                <div class="results-value">
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ number_format($value, 4) }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Quick Reference -->
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">Quick Reference</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-1">• 1 kilogram = 2.20462 pounds</li>
                        <li class="mb-1">• 1 pound = 16 ounces = 0.4536 kg</li>
                        <li class="mb-1">• 1 stone = 14 pounds = 6.35 kg</li>
                        <li class="mb-1">• 1 ton = 1000 kg = 2204.62 lbs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
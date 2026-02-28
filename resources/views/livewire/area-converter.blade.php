<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Area</label>
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
                <div class="results-label">Converted Area</div>
                <div class="results-value">
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ number_format($value, 4) }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Common Area References -->
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">Reference Points</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-1">• Football field: ~5,350 m² (57,600 ft²)</li>
                        <li class="mb-1">• Basketball court: ~420 m² (4,520 ft²)</li>
                        <li class="mb-1">• One acre: 4,047 m² (43,560 ft²)</li>
                        <li class="mb-1">• One hectare: 10,000 m² (2.47 acres)</li>
                        <li class="mb-1">• Tennis court: ~260 m² (2,800 ft²)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
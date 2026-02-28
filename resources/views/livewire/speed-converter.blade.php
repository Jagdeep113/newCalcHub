<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Speed</label>
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
                <div class="results-label">Converted Speed</div>
                <div class="results-value">
                    {{ number_format($result, 2) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ number_format($value, 2) }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ number_format($result, 2) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Speed Comparisons -->
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">Speed Comparisons</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-1">• Walking speed: ~5 km/h (3 mph)</li>
                        <li class="mb-1">• Running speed: ~10-15 km/h (6-9 mph)</li>
                        <li class="mb-1">• Car on highway: ~100 km/h (62 mph)</li>
                        <li class="mb-1">• Commercial airplane: ~900 km/h (560 mph)</li>
                        <li class="mb-1">• Speed of sound: ~1235 km/h (767 mph)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
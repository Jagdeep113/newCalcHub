<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Length</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="value" 
                       step="any" 
                       min="0"
                       placeholder="Enter length">
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
                    <button class="btn btn-outline-primary rounded-circle mt-4" wire:click="swapUnits" type="button">
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

            <!-- Quick input buttons -->
            <div class="mt-3">
                <label class="mb-2">Common Values</label>
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '0')" type="button">0</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '1')" type="button">1</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '10')" type="button">10</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '100')" type="button">100</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '1000')" type="button">1000</button>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Converted Length</div>
                <div class="results-value">
                    {{ $result }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ $value }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ $result }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Common Conversions -->
                <div class="mt-4">
                    <h6 class="mb-3">Quick Reference</h6>
                    <div class="bg-light p-3 rounded-3">
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1">• 1 inch = 2.54 cm</li>
                            <li class="mb-1">• 1 foot = 30.48 cm</li>
                            <li class="mb-1">• 1 yard = 0.9144 m</li>
                            <li class="mb-1">• 1 mile = 1.609 km</li>
                            <li class="mb-1">• 1 km = 0.621 miles</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
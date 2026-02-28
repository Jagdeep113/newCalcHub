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
                <div class="results-label">Converted Value</div>
                <div class="results-value">
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ number_format($value, 4) }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ number_format($result, 4) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Common Conversions -->
                <div class="mt-4">
                    <h6 class="mb-3">Common Conversions</h6>
                    @php
                        $commonConversions = [
                            '1 m = 3.28084 ft',
                            '1 ft = 30.48 cm',
                            '1 km = 0.621371 mi',
                            '1 mi = 1.60934 km',
                            '1 in = 2.54 cm',
                        ];
                    @endphp
                    @foreach($commonConversions as $conversion)
                        <div class="bg-light p-2 mb-2 rounded-3 small">
                            {{ $conversion }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
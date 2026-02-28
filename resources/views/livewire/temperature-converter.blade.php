<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Temperature</label>
                <input type="number" class="form-control" wire:model.live="value" step="any">
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
                <div class="results-label">Converted Temperature</div>
                <div class="results-value">
                    {{ number_format($result, 2) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ number_format($value, 2) }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ number_format($result, 2) }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Common Temperature Points -->
                <div class="mt-4">
                    <h6 class="mb-3">Common Temperature Points</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>°C</th>
                                <th>°F</th>
                                <th>K</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($this->commonPoints as $point)
                            <tr>
                                <td>{{ $point['name'] }}</td>
                                <td>{{ $point['c'] }}°C</td>
                                <td>{{ $point['f'] }}°F</td>
                                <td>{{ $point['k'] }}K</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
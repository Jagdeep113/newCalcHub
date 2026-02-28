<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Temperature</label>
                <input type="number" 
                       class="form-control" 
                       wire:model.live="value" 
                       step="any"
                       placeholder="Enter temperature">
                @error('value') <span class="text-danger small">{{ $message }}</span> @enderror
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
                <label class="mb-2">Quick Select</label>
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '0')" type="button">0°</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '20')" type="button">20°</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '37')" type="button">37°</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '100')" type="button">100°</button>
                    <button class="btn btn-outline-secondary btn-sm" wire:click="$set('value', '-40')" type="button">-40°</button>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Converted Temperature</div>
                <div class="results-value">
                    {{ $result }} {{ $this->units[$toUnit]['symbol'] }}
                </div>
                
                <div class="text-muted mb-4">
                    {{ $value }} {{ $this->units[$fromUnit]['symbol'] }} = 
                    {{ $result }} {{ $this->units[$toUnit]['symbol'] }}
                </div>

                <!-- Common Temperature Points -->
                <div class="mt-4">
                    <h6 class="mb-3">Common Temperature Points</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light">
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
</div>
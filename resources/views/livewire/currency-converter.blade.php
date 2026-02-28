<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Amount</label>
                <input type="number" class="form-control" wire:model.live="amount" step="0.01" min="0">
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-5">
                    <label>From</label>
                    <select class="form-select" wire:model.live="fromCurrency">
                        @foreach($this->currencies as $code => $currency)
                            <option value="{{ $code }}">
                                {{ $currency['flag'] }} {{ $code }} - {{ $currency['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-2 text-center">
                    <button class="btn btn-outline-primary rounded-circle" wire:click="swapCurrencies">
                        <i class="fas fa-exchange-alt"></i>
                    </button>
                </div>
                
                <div class="col-5">
                    <label>To</label>
                    <select class="form-select" wire:model.live="toCurrency">
                        @foreach($this->currencies as $code => $currency)
                            <option value="{{ $code }}">
                                {{ $currency['flag'] }} {{ $code }} - {{ $currency['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Popular Currency Chips -->
            <div class="mt-4">
                <label class="mb-2">Popular Currencies</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(['EUR', 'GBP', 'JPY', 'CAD', 'AUD', 'CHF'] as $code)
                        <button class="btn btn-outline-secondary btn-sm" 
                                wire:click="$set('toCurrency', '{{ $code }}')">
                            {{ $this->currencies[$code]['flag'] }} {{ $code }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Converted Amount</div>
                <div class="results-value">
                    {{ $this->currencies[$toCurrency]['symbol'] }}{{ number_format($result, 2) }}
                </div>
                
                <div class="exchange-rate-box bg-light p-3 rounded-3 mt-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Exchange Rate:</span>
                        <strong>1 {{ $fromCurrency }} = {{ number_format($this->exchangeRate, 4) }} {{ $toCurrency }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Inverse Rate:</span>
                        <strong>1 {{ $toCurrency }} = {{ number_format($this->inverseRate, 4) }} {{ $fromCurrency }}</strong>
                    </div>
                    <div class="text-muted small mt-2">
                        Last updated: {{ $lastUpdated }}
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>From:</span>
                        <strong>{{ $this->currencies[$fromCurrency]['flag'] }} {{ $fromCurrency }} - {{ $this->currencies[$fromCurrency]['name'] }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>To:</span>
                        <strong>{{ $this->currencies[$toCurrency]['flag'] }} {{ $toCurrency }} - {{ $this->currencies[$toCurrency]['name'] }}</strong>
                    </div>
                </div>

                <div class="mt-4 p-3 bg-info bg-opacity-10 rounded-3">
                    <i class="fas fa-info-circle me-2 text-info"></i>
                    <span class="small">
                        For best exchange rates, consider using specialized currency exchange services rather than banks or airport kiosks.
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Historical Chart (Placeholder) -->
    @if(false)
    <div class="mt-4">
        <h5>30-Day Trend</h5>
        <div class="bg-light p-4 rounded-3 text-center">
            <i class="fas fa-chart-line fa-3x mb-3 text-muted"></i>
            <p class="text-muted">Historical chart will be displayed here</p>
        </div>
    </div>
    @endif
</div>
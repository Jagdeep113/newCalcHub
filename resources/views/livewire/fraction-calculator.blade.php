<div>
    <div class="row">
        <div class="col-lg-6">
            <h5 class="mb-3">First Fraction</h5>
            <div class="row g-2 mb-4">
                <div class="col-6">
                    <label>Numerator</label>
                    <input type="number" class="form-control" wire:model.live="numerator1">
                </div>
                <div class="col-6">
                    <label>Denominator</label>
                    <input type="number" class="form-control" wire:model.live="denominator1" min="1">
                </div>
            </div>

            <h5 class="mb-3">Second Fraction</h5>
            <div class="row g-2 mb-4">
                <div class="col-6">
                    <label>Numerator</label>
                    <input type="number" class="form-control" wire:model.live="numerator2">
                </div>
                <div class="col-6">
                    <label>Denominator</label>
                    <input type="number" class="form-control" wire:model.live="denominator2" min="1">
                </div>
            </div>

            <div class="form-group">
                <label>Operation</label>
                <select class="form-select" wire:model.live="operation">
                    <option value="add">Add (+)</option>
                    <option value="subtract">Subtract (-)</option>
                    <option value="multiply">Multiply (×)</option>
                    <option value="divide">Divide (÷)</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Result</div>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    @if($resultDenominator == 0)
                        <div class="text-danger">Invalid denominator</div>
                    @else
                        <div class="fraction-display">
                            <div class="text-center">
                                <span class="display-6">{{ $resultNumerator }}</span>
                                <hr class="my-1" style="width: 50px; margin: 0 auto;">
                                <span class="display-6">{{ $resultDenominator }}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>As decimal:</span>
                        <strong>{{ $resultDecimal !== null ? number_format($resultDecimal, 4) : 'N/A' }}</strong>
                    </div>
                    @if($simplified && $simplified !== $resultNumerator . '/' . $resultDenominator)
                    <div class="d-flex justify-content-between mb-2">
                        <span>Simplified:</span>
                        <strong class="text-success">{{ $simplified }}</strong>
                    </div>
                    @endif
                </div>

                <!-- Visual Representation -->
                @if($resultDenominator > 0 && $resultNumerator != 0)
                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">Visual Representation</h6>
                    <div class="fraction-bars">
                        @php
                            $percentage = abs(($resultNumerator / $resultDenominator) * 100);
                            $color = $resultNumerator > 0 ? 'bg-primary' : 'bg-danger';
                        @endphp
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar {{ $color }}" 
                                 style="width: {{ min(100, $percentage) }}%">
                                {{ number_format($percentage, 1) }}%
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
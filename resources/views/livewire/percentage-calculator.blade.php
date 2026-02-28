<div>
    <div class="mb-4">
        <div class="btn-group w-100" role="group">
            <button type="button" 
                    class="btn {{ $calculationType === 'find-percentage' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('calculationType', 'find-percentage')">
                Find Percentage
            </button>
            <button type="button" 
                    class="btn {{ $calculationType === 'find-number' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('calculationType', 'find-number')">
                Find Number
            </button>
            <button type="button" 
                    class="btn {{ $calculationType === 'increase-decrease' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('calculationType', 'increase-decrease')">
                Increase/Decrease
            </button>
        </div>
    </div>

    @if($calculationType === 'find-percentage')
        <div class="form-group">
            <label>What is</label>
            <div class="row g-2">
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="percentage" 
                           step="any"
                           placeholder="Percentage">
                </div>
                <div class="col-auto align-self-center">
                    <span>% of</span>
                </div>
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="value" 
                           step="any"
                           placeholder="Value">
                </div>
            </div>
        </div>
    @elseif($calculationType === 'find-number')
        <div class="form-group">
            <label>Find percentage</label>
            <div class="row g-2">
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="part" 
                           step="any"
                           placeholder="Part">
                </div>
                <div class="col-auto align-self-center">
                    <span>is what % of</span>
                </div>
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="whole" 
                           step="any"
                           placeholder="Whole">
                </div>
            </div>
        </div>
    @elseif($calculationType === 'increase-decrease')
        <div class="form-group">
            <label>Original Value</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="originalValue" 
                   step="any"
                   placeholder="Original value">
        </div>
        
        <div class="form-group">
            <label>Percentage Change</label>
            <div class="row g-2">
                <div class="col">
                    <select class="form-select" wire:model.live="changeType">
                        <option value="increase">Increase</option>
                        <option value="decrease">Decrease</option>
                    </select>
                </div>
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="changePercent" 
                           step="any"
                           placeholder="Percentage">
                </div>
            </div>
        </div>
    @endif

    <div class="results-container">
        <div class="results-label">Result</div>
        <div class="results-value">{{ number_format($result, 2) }}</div>
        
        @if($calculationType === 'find-percentage')
            <div class="text-muted mt-2">
                {{ $percentage }}% of {{ $value }} = {{ number_format($result, 2) }}
            </div>
        @elseif($calculationType === 'find-number')
            <div class="text-muted mt-2">
                {{ $part }} is {{ number_format($percentage, 1) }}% of {{ $whole }}
            </div>
        @elseif($calculationType === 'increase-decrease')
            <div class="text-muted mt-2">
                {{ $originalValue }} {{ $changeType === 'increase' ? 'increased' : 'decreased' }} 
                by {{ $changePercent }}% = {{ number_format($result, 2) }}
            </div>
        @endif
    </div>

    <div class="calculation-formula text-center mt-4 p-3 bg-light rounded-3">
        <code class="fs-5">Percentage = (Part / Whole) × 100</code>
    </div>
</div>
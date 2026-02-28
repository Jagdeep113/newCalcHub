<div>
    <div class="mb-4">
        <div class="btn-group w-100" role="group">
            <button type="button" 
                    class="btn {{ $unit === 'metric' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('unit', 'metric')">
                Metric (cm/kg)
            </button>
            <button type="button" 
                    class="btn {{ $unit === 'imperial' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="$set('unit', 'imperial')">
                Imperial (ft/lbs)
            </button>
        </div>
    </div>

    @if($unit === 'metric')
        <div class="form-group">
            <label>Height (cm)</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="height" 
                   min="50" 
                   max="250"
                   step="0.1">
        </div>
        
        <div class="form-group">
            <label>Weight (kg)</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="weight" 
                   min="10" 
                   max="300"
                   step="0.1">
        </div>
    @else
        <div class="form-group">
            <label>Height</label>
            <div class="row g-2">
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="heightFt" 
                           min="2" 
                           max="8"
                           placeholder="Feet">
                </div>
                <div class="col">
                    <input type="number" 
                           class="form-control" 
                           wire:model.live="heightIn" 
                           min="0" 
                           max="11"
                           placeholder="Inches">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label>Weight (lbs)</label>
            <input type="number" 
                   class="form-control" 
                   wire:model.live="weightLbs" 
                   min="20" 
                   max="600"
                   step="0.1">
        </div>
    @endif

    @if($bmi)
        <div class="results-container">
            <div class="results-label">Your BMI</div>
            <div class="results-value">{{ number_format($bmi, 1) }}</div>
            <div class="fs-4 fw-bold mb-3">{{ $category }}</div>
            
            <div class="progress" style="height: 30px;">
                <div class="progress-bar bg-info" style="width: 18.5%" title="Underweight">18.5</div>
                <div class="progress-bar bg-success" style="width: 25%" title="Normal">25</div>
                <div class="progress-bar bg-warning" style="width: 25%" title="Overweight">30</div>
                <div class="progress-bar bg-danger" style="width: 31.5%" title="Obese">40+</div>
            </div>
            
            <div class="d-flex justify-content-between mt-2 text-muted small">
                <span>Underweight</span>
                <span>Normal</span>
                <span>Overweight</span>
                <span>Obese</span>
            </div>
            
            <div class="alert alert-info mt-4 mb-0">
                <i class="fas fa-info-circle me-2"></i>
                {{ $healthTip }}
            </div>
        </div>

        <div class="mt-4 p-3 bg-light rounded-3">
            <h5 class="mb-3">BMI Categories</h5>
            <div class="row">
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><span class="badge bg-info me-2">&nbsp;</span> Underweight: &lt; 18.5</li>
                        <li><span class="badge bg-success me-2">&nbsp;</span> Normal: 18.5 - 24.9</li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><span class="badge bg-warning me-2">&nbsp;</span> Overweight: 25 - 29.9</li>
                        <li><span class="badge bg-danger me-2">&nbsp;</span> Obese: ≥ 30</li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
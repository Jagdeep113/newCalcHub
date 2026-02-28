<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <div class="btn-group w-100" role="group">
                    <button type="button" 
                            class="btn {{ $gender === 'male' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('gender', 'male')">
                        <i class="fas fa-male me-2"></i>Male
                    </button>
                    <button type="button" 
                            class="btn {{ $gender === 'female' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="$set('gender', 'female')">
                        <i class="fas fa-female me-2"></i>Female
                    </button>
                </div>
            </div>

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

            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" wire:model.live="age" min="15" max="100">
            </div>

            @if($unit === 'metric')
                <div class="form-group">
                    <label>Height (cm)</label>
                    <input type="number" class="form-control" wire:model.live="heightCm" min="100" max="250" step="0.1">
                </div>

                <div class="form-group">
                    <label>Weight (kg)</label>
                    <input type="number" class="form-control" wire:model.live="weightKg" min="30" max="300" step="0.1">
                </div>
            @else
                <div class="form-group">
                    <label>Height</label>
                    <div class="row g-2">
                        <div class="col">
                            <input type="number" class="form-control" wire:model.live="heightFt" min="2" max="8" placeholder="Feet">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" wire:model.live="heightIn" min="0" max="11" placeholder="Inches">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Weight (lbs)</label>
                    <input type="number" class="form-control" wire:model.live="weightLbs" min="50" max="600" step="0.1">
                </div>
            @endif
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Basal Metabolic Rate</div>
                <div class="results-value">{{ number_format($bmr, 0) }}</div>
                <div class="text-muted mb-4">calories/day at complete rest</div>

                <h6 class="mb-3">Total Daily Energy Expenditure (TDEE)</h6>
                
                @foreach($tdeeLevels as $level => $value)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ ucfirst(str_replace('_', ' ', $level)) }}:</span>
                        <strong>{{ number_format($value, 0) }} cal</strong>
                    </div>
                @endforeach

                <div class="mt-4 p-3 bg-light rounded-3">
                    <p class="small mb-0">
                        <i class="fas fa-info-circle me-2 text-info"></i>
                        BMR is the number of calories your body needs at complete rest. 
                        Your TDEE includes activity and is what you should use for weight management.
                    </p>
                </div>

                <!-- Weight Management -->
                <div class="mt-4">
                    <h6 class="mb-2">Weight Management</h6>
                    @php
                        $maintain = $tdeeLevels['moderate'];
                        $lose = $maintain - 500;
                        $gain = $maintain + 500;
                    @endphp
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-success">To lose weight:</span>
                        <strong>{{ number_format($lose, 0) }} cal</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-primary">To maintain:</span>
                        <strong>{{ number_format($maintain, 0) }} cal</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-warning">To gain weight:</span>
                        <strong>{{ number_format($gain, 0) }} cal</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
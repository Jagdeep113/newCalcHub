<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <label class="mb-2">Gender</label>
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
                <label class="mb-2">Goal</label>
                <div class="btn-group w-100" role="group">
                    <button type="button" 
                            class="btn {{ $goal === 'lose' ? 'btn-warning' : 'btn-outline-warning' }}"
                            wire:click="$set('goal', 'lose')">
                        Lose Weight
                    </button>
                    <button type="button" 
                            class="btn {{ $goal === 'maintain' ? 'btn-success' : 'btn-outline-success' }}"
                            wire:click="$set('goal', 'maintain')">
                        Maintain
                    </button>
                    <button type="button" 
                            class="btn {{ $goal === 'gain' ? 'btn-info' : 'btn-outline-info' }}"
                            wire:click="$set('goal', 'gain')">
                        Gain Weight
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" wire:model.live="age" min="15" max="100">
            </div>

            <div class="form-group">
                <label>Height (cm)</label>
                <input type="number" class="form-control" wire:model.live="height" min="100" max="250" step="0.1">
            </div>

            <div class="form-group">
                <label>Weight (kg)</label>
                <input type="number" class="form-control" wire:model.live="weight" min="30" max="300" step="0.1">
            </div>

            <div class="form-group">
                <label>Activity Level</label>
                <select class="form-select" wire:model.live="activityLevel">
                    @foreach($this->activityLevels as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Daily Calorie Needs</div>
                <div class="results-value">{{ number_format($dailyCalories, 0) }}</div>
                <div class="text-muted mb-4">calories per day</div>

                <!-- Calorie Breakdown -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span>BMR (Basal Metabolic Rate)</span>
                        <span>{{ number_format($bmr, 0) }} cal</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span>TDEE (Total Daily Energy)</span>
                        <span>{{ number_format($tdee, 0) }} cal</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Activity Level</span>
                        <span>{{ ucfirst(str_replace('_', ' ', $activityLevel)) }}</span>
                    </div>
                </div>

                <!-- Macro Distribution -->
                @if(!empty($macros))
                <h6 class="mb-3">Macronutrient Breakdown</h6>
                
                <div class="progress mb-3" style="height: 30px;">
                    <div class="progress-bar bg-primary" style="width: {{ $macros['carbs']['percentage'] }}%">
                        Carbs
                    </div>
                    <div class="progress-bar bg-success" style="width: {{ $macros['protein']['percentage'] }}%">
                        Protein
                    </div>
                    <div class="progress-bar bg-warning" style="width: {{ $macros['fat']['percentage'] }}%">
                        Fat
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-4 text-center">
                        <div class="bg-light p-2 rounded-3">
                            <div class="small text-muted">Carbs</div>
                            <div class="fw-bold">{{ number_format($macros['carbs']['grams'], 0) }}g</div>
                            <div class="small">{{ number_format($macros['carbs']['calories'], 0) }} cal</div>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="bg-light p-2 rounded-3">
                            <div class="small text-muted">Protein</div>
                            <div class="fw-bold">{{ number_format($macros['protein']['grams'], 0) }}g</div>
                            <div class="small">{{ number_format($macros['protein']['calories'], 0) }} cal</div>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="bg-light p-2 rounded-3">
                            <div class="small text-muted">Fat</div>
                            <div class="fw-bold">{{ number_format($macros['fat']['grams'], 0) }}g</div>
                            <div class="small">{{ number_format($macros['fat']['calories'], 0) }} cal</div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mt-4 p-3 bg-info bg-opacity-10 rounded-3">
                    <i class="fas fa-lightbulb me-2 text-info"></i>
                    <span class="small">{{ $this->recommendation }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
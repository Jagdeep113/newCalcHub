<div>
    <div class="mb-4">
        <div class="btn-group w-100" role="group">
            <button type="button" 
                    class="btn {{ $activeTab === 'difference' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="switchTab('difference')">
                Date Difference
            </button>
            <button type="button" 
                    class="btn {{ $activeTab === 'add-subtract' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="switchTab('add-subtract')">
                Add/Subtract
            </button>
            <button type="button" 
                    class="btn {{ $activeTab === 'weekday' ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click="switchTab('weekday')">
                Day of Week
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            @if($activeTab === 'difference')
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" wire:model.live="startDate">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" wire:model.live="endDate">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" wire:model.live="includeTime">
                    <label class="form-check-label">Include time calculation</label>
                </div>

            @elseif($activeTab === 'add-subtract')
                <div class="form-group">
                    <label>Base Date</label>
                    <input type="date" class="form-control" wire:model.live="baseDate">
                </div>
                <div class="row g-2 mb-3">
                    <div class="col">
                        <input type="number" class="form-control" wire:model.live="daysToAdd" min="1">
                    </div>
                    <div class="col">
                        <select class="form-select" wire:model.live="operation">
                            <option value="add">Add</option>
                            <option value="subtract">Subtract</option>
                        </select>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" wire:model.live="includeWeekends">
                    <label class="form-check-label">Include weekends</label>
                </div>

            @elseif($activeTab === 'weekday')
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" wire:model.live="targetDate">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" wire:model.live="showCalendar">
                    <label class="form-check-label">Show calendar view</label>
                </div>
            @endif
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                @if($activeTab === 'difference' && isset($results['total_days']))
                    <div class="results-label">Date Difference</div>
                    <div class="results-value">{{ $results['total_days'] }} days</div>
                    <div class="text-muted mb-4">
                        Between {{ $results['start_formatted'] }} and {{ $results['end_formatted'] }}
                    </div>
                    
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Years:</span>
                            <strong>{{ $results['years'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Months:</span>
                            <strong>{{ $results['months'] }} months, {{ $results['days'] }} days</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Weeks:</span>
                            <strong>{{ $results['total_weeks'] }} weeks</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Weekdays:</span>
                            <strong>{{ $results['weekdays'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Weekends:</span>
                            <strong>{{ $results['weekends'] }}</strong>
                        </div>
                    </div>

                @elseif($activeTab === 'add-subtract' && isset($results['result_date']))
                    <div class="results-label">Result Date</div>
                    <div class="results-value">{{ $results['result_date'] }}</div>
                    <div class="text-muted mb-4">{{ $results['result_day'] }}</div>
                    
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Original Date:</span>
                            <strong>{{ $results['original_date'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Days {{ ucfirst($results['operation']) }}d:</span>
                            <strong>{{ $results['days_added'] }}</strong>
                        </div>
                        @if(!$includeWeekends)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Weekdays Only:</span>
                            <strong>{{ $results['weekdays'] }} days</strong>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <span>Is Weekend:</span>
                            <strong>{{ $results['is_weekend'] ? 'Yes' : 'No' }}</strong>
                        </div>
                    </div>

                @elseif($activeTab === 'weekday' && isset($results['day_of_week']))
                    <div class="results-label">Day of Week</div>
                    <div class="results-value">{{ $results['day_of_week'] }}</div>
                    <div class="text-muted mb-4">{{ $results['date'] }}</div>
                    
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Day of Year:</span>
                            <strong>{{ $results['day_of_year'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Week Number:</span>
                            <strong>{{ $results['week_number'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Quarter:</span>
                            <strong>Q{{ $results['quarter'] }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Leap Year:</span>
                            <strong>{{ $results['is_leap_year'] ? 'Yes' : 'No' }}</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Days in Month:</span>
                            <strong>{{ $results['days_in_month'] }}</strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
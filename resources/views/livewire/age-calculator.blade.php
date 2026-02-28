<div>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <div class="btn-group w-100" role="group">
                    <button type="button" 
                            class="btn {{ $activeTab === 'age' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="switchTab('age')">
                        Age Calculator
                    </button>
                    <button type="button" 
                            class="btn {{ $activeTab === 'date' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="switchTab('date')">
                        Date Difference
                    </button>
                    <button type="button" 
                            class="btn {{ $activeTab === 'birthday' ? 'btn-primary' : 'btn-outline-primary' }}"
                            wire:click="switchTab('birthday')">
                        Next Birthday
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label>Birth Date</label>
                <input type="date" class="form-control" wire:model.live="birthDate">
            </div>

            @if($activeTab !== 'birthday')
            <div class="form-group">
                <label>As of Date</label>
                <input type="date" class="form-control" wire:model.live="asOfDate">
            </div>
            @endif
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Your Age Is</div>
                <div class="results-value">{{ $years }} years</div>
                <div class="text-muted mb-4">{{ $months }} months, {{ $days }} days</div>

                <!-- Age Visualization Circle -->
                <div class="d-flex justify-content-center mb-4">
                    <div class="position-relative" style="width: 150px; height: 150px;">
                        <svg viewBox="0 0 36 36" class="w-100 h-100">
                            <path d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                  fill="none"
                                  stroke="#e2e8f0"
                                  stroke-width="3"
                                  stroke-dasharray="100, 100"/>
                            <path d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                  fill="none"
                                  stroke="#2563eb"
                                  stroke-width="3"
                                  stroke-dasharray="{{ min(100, ($years / 100) * 100) }}, 100"/>
                            <text x="18" y="20.35" class="text-center" font-size="6" text-anchor="middle">
                                {{ $years }}
                            </text>
                            <text x="18" y="26.35" class="text-center" font-size="3" text-anchor="middle">
                                Years
                            </text>
                        </svg>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Months:</span>
                        <strong>{{ number_format($totalMonths) }} months</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Weeks:</span>
                        <strong>{{ number_format($totalWeeks) }} weeks</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Days:</span>
                        <strong>{{ number_format($totalDays) }} days</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Next Birthday:</span>
                        <strong>{{ $nextBirthdayDays }} days</strong>
                    </div>
                </div>

                <div class="mt-4 p-3 bg-light rounded-3 d-flex align-items-center">
                    <i class="{{ $zodiacIcon }} fa-2x me-3" style="color: var(--accent);"></i>
                    <div>
                        <h5 class="mb-1">{{ $zodiacSign }}</h5>
                        <small class="text-muted">Your zodiac sign</small>
                    </div>
                </div>

                <div class="mt-3 p-3 bg-info bg-opacity-10 rounded-3">
                    <i class="fas fa-flag-checkered me-2 text-info"></i>
                    <span>{{ $milestone }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
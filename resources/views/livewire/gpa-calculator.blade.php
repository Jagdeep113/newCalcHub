<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label>Semester Name (Optional)</label>
                <input type="text" class="form-control" wire:model.live="semesterName" placeholder="e.g., Fall 2024">
            </div>

            <div class="mb-3">
                <label>GPA Scale</label>
                <select class="form-select" wire:model.live="scale">
                    <option value="4.0">4.0 Scale</option>
                    <option value="4.3">4.3 Scale (with A+)</option>
                    <option value="5.0">5.0 Scale (Weighted)</option>
                </select>
            </div>

            <div class="course-list">
                <div class="bg-light p-2 mb-2 rounded">
                    <div class="row fw-bold">
                        <div class="col-5">Course Name</div>
                        <div class="col-2">Credits</div>
                        <div class="col-3">Grade</div>
                        <div class="col-2"></div>
                    </div>
                </div>

                @foreach($courses as $index => $course)
                <div class="row g-2 mb-2 align-items-center" wire:key="course-{{ $index }}">
                    <div class="col-5">
                        <input type="text" class="form-control" 
                               wire:model.live="courses.{{ $index }}.name" 
                               placeholder="Course Name">
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" 
                               wire:model.live="courses.{{ $index }}.credits" 
                               min="0" step="0.5">
                    </div>
                    <div class="col-3">
                        <select class="form-select" wire:model.live="courses.{{ $index }}.grade">
                            @foreach($this->gradeOptions as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-danger w-100" 
                                wire:click="removeCourse({{ $index }})"
                                @if(count($courses) <= 1) disabled @endif>
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                @endforeach

                <button class="btn btn-outline-primary w-100 mt-3" wire:click="addCourse">
                    <i class="fas fa-plus me-2"></i>Add Course
                </button>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="results-container">
                <div class="results-label">Your GPA</div>
                <div class="results-value">{{ number_format($gpa, 2) }}</div>
                <div class="text-muted mb-4">on a {{ $scale }} scale</div>

                <!-- GPA Scale Visualization -->
                <div class="progress mb-2" style="height: 20px;">
                    @php
                        $percentage = ($gpa / floatval($scale)) * 100;
                        $color = $percentage >= 80 ? 'success' : ($percentage >= 60 ? 'info' : ($percentage >= 50 ? 'warning' : 'danger'));
                    @endphp
                    <div class="progress-bar bg-{{ $color }}" style="width: {{ $percentage }}%">
                        {{ number_format($percentage, 1) }}%
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <span class="small">0.0</span>
                    <span class="small">{{ $scale }}</span>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Credits:</span>
                        <strong>{{ number_format($totalCredits, 1) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Points:</span>
                        <strong>{{ number_format($totalPoints, 2) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Letter Grade:</span>
                        <strong class="text-primary">{{ $letterGrade }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Courses:</span>
                        <strong>{{ count($courses) }}</strong>
                    </div>
                </div>

                @if($totalCredits > 0)
                <div class="mt-4">
                    <h6>Grade Distribution</h6>
                    @foreach(['A', 'B', 'C', 'D', 'F'] as $grade)
                        @php
                            $percentage = ($this->gradeDistribution[$grade] / $totalCredits) * 100;
                        @endphp
                        @if($percentage > 0)
                        <div class="mb-2">
                            <div class="d-flex justify-content-between small mb-1">
                                <span>{{ $grade }}</span>
                                <span>{{ number_format($percentage, 1) }}%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-{{ $grade == 'A' ? 'success' : ($grade == 'B' ? 'info' : ($grade == 'C' ? 'warning' : 'danger')) }}" 
                                     style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif

                <div class="mt-4 p-3 bg-light rounded-3">
                    <h6 class="mb-2">Improvement Tip</h6>
                    @php
                        $targetGpa = min(4.0, $gpa + 0.5);
                        $neededPoints = ($targetGpa * ($totalCredits + 3)) - ($totalPoints + ($gpa * 3));
                    @endphp
                    <p class="small mb-0">
                        To reach a {{ number_format($targetGpa, 2) }} GPA, aim for an average of 
                        {{ number_format($neededPoints / 3, 2) }} in your next 3-credit course.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
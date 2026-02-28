<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class DateCalculator extends Component
{
    public string $activeTab = 'difference';
    
    // Difference tab
    public string $startDate;
    public string $endDate;
    public bool $includeTime = false;
    
    // Add/Subtract tab
    public string $baseDate;
    public int $daysToAdd = 30;
    public string $operation = 'add';
    public bool $includeWeekends = true;
    
    // Weekday tab
    public string $targetDate;
    public bool $showCalendar = true;
    
    // Results
    public array $results = [];

    public function mount(): void
    {
        $today = now()->format('Y-m-d');
        $this->startDate = '2024-01-01';
        $this->endDate = $today;
        $this->baseDate = $today;
        $this->targetDate = $today;
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function calculate(): void
    {
        switch ($this->activeTab) {
            case 'difference':
                $this->calculateDifference();
                break;
            case 'add-subtract':
                $this->calculateAddSubtract();
                break;
            case 'weekday':
                $this->calculateWeekday();
                break;
        }
    }

    private function calculateDifference(): void
    {
        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        
        if ($start->gt($end)) {
            [$start, $end] = [$end, $start];
        }

        $diff = $start->diff($end);
        
        // Calculate weekdays
        $weekdays = 0;
        $current = $start->copy();
        while ($current->lte($end)) {
            if (!$current->isWeekend()) {
                $weekdays++;
            }
            $current->addDay();
        }

        $this->results = [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
            'total_days' => $start->diffInDays($end),
            'total_weeks' => floor($start->diffInDays($end) / 7),
            'weekdays' => $weekdays,
            'weekends' => $start->diffInDays($end) - $weekdays,
            'start_formatted' => $start->format('M d, Y'),
            'end_formatted' => $end->format('M d, Y'),
        ];
    }

    private function calculateAddSubtract(): void
    {
        $date = Carbon::parse($this->baseDate);
        
        if ($this->operation === 'add') {
            $result = $date->copy()->addDays($this->daysToAdd);
        } else {
            $result = $date->copy()->subDays($this->daysToAdd);
        }

        // Calculate weekdays if needed
        $weekdays = 0;
        if (!$this->includeWeekends) {
            $current = $date->copy();
            $end = $result->copy();
            while ($current->lte($end)) {
                if (!$current->isWeekend()) {
                    $weekdays++;
                }
                $current->addDay();
            }
        }

        $this->results = [
            'original_date' => $date->format('M d, Y'),
            'result_date' => $result->format('M d, Y'),
            'result_day' => $result->format('l'),
            'days_added' => $this->daysToAdd,
            'operation' => $this->operation,
            'weekdays' => $weekdays,
            'is_weekend' => $result->isWeekend(),
        ];
    }

    private function calculateWeekday(): void
    {
        $date = Carbon::parse($this->targetDate);
        
        $this->results = [
            'date' => $date->format('M d, Y'),
            'day_of_week' => $date->format('l'),
            'day_of_year' => $date->dayOfYear,
            'week_number' => $date->weekOfYear,
            'quarter' => $date->quarter,
            'is_leap_year' => $date->isLeapYear(),
            'days_in_month' => $date->daysInMonth,
            'is_weekend' => $date->isWeekend(),
            'is_today' => $date->isToday(),
            'is_future' => $date->isFuture(),
            'is_past' => $date->isPast(),
        ];
    }

    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->calculate();
    }

    public function render()
    {
        return view('livewire.date-calculator');
    }
}
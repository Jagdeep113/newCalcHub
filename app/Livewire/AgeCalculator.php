<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class AgeCalculator extends Component
{
    public string $birthDate = '1990-01-01';
    public ?string $asOfDate = null;
    public string $activeTab = 'age';
    
    // Results
    public int $years = 0;
    public int $months = 0;
    public int $days = 0;
    public int $totalMonths = 0;
    public int $totalWeeks = 0;
    public int $totalDays = 0;
    public int $nextBirthdayDays = 0;
    public string $zodiacSign = '';
    public string $zodiacIcon = '';
    public string $milestone = '';

    public function mount(): void
    {
        $this->asOfDate = now()->format('Y-m-d');
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function calculate(): void
    {
        $birth = Carbon::parse($this->birthDate);
        $asOf = $this->asOfDate ? Carbon::parse($this->asOfDate) : now();

        if ($birth->gt($asOf)) {
            session()->flash('error', 'Birth date cannot be in the future');
            return;
        }

        // Calculate age
        $age = $birth->diff($asOf);
        $this->years = $age->y;
        $this->months = $age->m;
        $this->days = $age->d;

        // Calculate total values
        $this->totalDays = $birth->diffInDays($asOf);
        $this->totalMonths = $birth->diffInMonths($asOf);
        $this->totalWeeks = floor($this->totalDays / 7);

        // Calculate next birthday
        $nextBirthday = Carbon::create($asOf->year, $birth->month, $birth->day);
        if ($nextBirthday->lt($asOf)) {
            $nextBirthday->addYear();
        }
        $this->nextBirthdayDays = $asOf->diffInDays($nextBirthday);

        // Calculate zodiac
        $this->calculateZodiac($birth->month, $birth->day);
        
        // Calculate milestone
        $this->calculateMilestone($this->years);
    }

    private function calculateZodiac(int $month, int $day): void
    {
        $zodiacs = [
            ['sign' => 'Capricorn', 'icon' => 'fa-solid fa-goat', 'start' => '01-01', 'end' => '01-19'],
            ['sign' => 'Aquarius', 'icon' => 'fa-solid fa-water', 'start' => '01-20', 'end' => '02-18'],
            ['sign' => 'Pisces', 'icon' => 'fa-solid fa-fish', 'start' => '02-19', 'end' => '03-20'],
            ['sign' => 'Aries', 'icon' => 'fa-solid fa-ram', 'start' => '03-21', 'end' => '04-19'],
            ['sign' => 'Taurus', 'icon' => 'fa-solid fa-bull', 'start' => '04-20', 'end' => '05-20'],
            ['sign' => 'Gemini', 'icon' => 'fa-solid fa-gemini', 'start' => '05-21', 'end' => '06-20'],
            ['sign' => 'Cancer', 'icon' => 'fa-solid fa-crab', 'start' => '06-21', 'end' => '07-22'],
            ['sign' => 'Leo', 'icon' => 'fa-solid fa-lion', 'start' => '07-23', 'end' => '08-22'],
            ['sign' => 'Virgo', 'icon' => 'fa-solid fa-virgo', 'start' => '08-23', 'end' => '09-22'],
            ['sign' => 'Libra', 'icon' => 'fa-solid fa-balance-scale', 'start' => '09-23', 'end' => '10-22'],
            ['sign' => 'Scorpio', 'icon' => 'fa-solid fa-scorpion', 'start' => '10-23', 'end' => '11-21'],
            ['sign' => 'Sagittarius', 'icon' => 'fa-solid fa-archer', 'start' => '11-22', 'end' => '12-21'],
            ['sign' => 'Capricorn', 'icon' => 'fa-solid fa-goat', 'start' => '12-22', 'end' => '12-31'],
        ];

        $date = sprintf('%02d-%02d', $month, $day);
        
        foreach ($zodiacs as $zodiac) {
            if ($date >= $zodiac['start'] && $date <= $zodiac['end']) {
                $this->zodiacSign = $zodiac['sign'];
                $this->zodiacIcon = $zodiac['icon'];
                break;
            }
        }
    }

    private function calculateMilestone(int $age): void
    {
        $milestones = [
            [0, 'You are a newborn baby! Welcome to the world!'],
            [1, 'You are a toddler, learning and exploring everything!'],
            [5, 'You are in early childhood, full of wonder and imagination!'],
            [13, 'You are a teenager - exciting years ahead!'],
            [18, 'You are now an adult! The world is yours to explore.'],
            [21, 'Legal drinking age in many countries - with great power comes great responsibility!'],
            [30, 'Welcome to your thirties - a decade of growth and stability!'],
            [40, 'Life begins at 40! You have wisdom and experience on your side.'],
            [50, 'Half a century! You\'ve seen so much and have so much more to give.'],
            [60, 'The golden years are approaching - time to enjoy the fruits of your labor!'],
            [65, 'Traditional retirement age - time to relax and enjoy life!'],
            [75, 'You have 75 years of wisdom - a true treasure!'],
            [85, 'An incredible milestone! You have so much to share with the world.'],
            [100, 'A century! You are truly remarkable and inspiring!'],
        ];

        $this->milestone = 'You are ' . $age . ' years old. ';
        
        foreach ($milestones as $milestone) {
            if ($age >= $milestone[0]) {
                $this->milestone = $milestone[1];
            }
        }
    }

    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.age-calculator');
    }
}
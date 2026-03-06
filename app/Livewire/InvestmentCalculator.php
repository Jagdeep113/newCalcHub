<?php

namespace App\Livewire;

use Livewire\Component;

class InvestmentCalculator extends Component
{
    public float $initialInvestment = 10000;
    public float $monthlyContribution = 500;
    public float $annualReturn = 7;
    public int $years = 20;
    public string $compoundFrequency = 'monthly';
    
    public float $futureValue = 0;
    public float $totalInvested = 0;
    public float $totalEarnings = 0;

    public function mount(): void
    {
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function calculate(): void
    {
        $rate = $this->annualReturn / 100;
        $periods = $this->years;
        $this->initialInvestment=!empty($this->initialInvestment) ? $this->initialInvestment:0;
        // Future value of initial investment
        $fvInitial = $this->initialInvestment * pow(1 + $rate, $periods);
        
        // Future value of monthly contributions
        $monthlyRate = $rate / 12;
        $months = $periods * 12;
        $this->monthlyContribution = !empty($this->monthlyContribution) ? $this->monthlyContribution:1;
        if ($monthlyRate > 0) {
            $fvContributions = $this->monthlyContribution * 
                ((pow(1 + $monthlyRate, $months) - 1) / $monthlyRate) * 
                (1 + $monthlyRate);
        } else {
            $fvContributions = $this->monthlyContribution * $months;
        }
        
        $this->futureValue = $fvInitial + $fvContributions;
        $this->totalInvested = $this->initialInvestment + ($this->monthlyContribution * $months);
        $this->totalEarnings = $this->futureValue - $this->totalInvested;
    }

    public function render()
    {
        return view('livewire.investment-calculator');
    }
}
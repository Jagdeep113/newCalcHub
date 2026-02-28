<?php

namespace App\Livewire;

use Livewire\Component;

class CompoundInterestCalculator extends Component
{
    public float $principal = 10000;
    public float $rate = 7;
    public int $years = 20;
    public string $compoundFrequency = '12'; // Monthly
    public float $monthlyContribution = 500;
    public string $calculationType = 'one-time';

    public float $futureValue = 0;
    public float $totalContributions = 0;
    public float $totalInterest = 0;
    public array $yearlyBreakdown = [];

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
        $rateDecimal = $this->rate / 100;
        $periods = intval($this->compoundFrequency);
        $timeInYears = $this->years;

        if ($this->calculationType === 'one-time') {
            $this->calculateOneTime($rateDecimal, $periods, $timeInYears);
        } else {
            $this->calculateWithContributions($rateDecimal, $periods, $timeInYears);
        }

        $this->generateYearlyBreakdown($rateDecimal, $periods, $timeInYears);
    }

    private function calculateOneTime(float $rate, int $periods, int $years): void
    {
        // A = P(1 + r/n)^(nt)
        $this->futureValue = $this->principal * pow(1 + $rate / $periods, $periods * $years);
        $this->totalContributions = $this->principal;
        $this->totalInterest = $this->futureValue - $this->principal;
    }

    private function calculateWithContributions(float $rate, int $periods, int $years): void
    {
        $periodicRate = $rate / $periods;
        $totalPeriods = $years * $periods;
        
        // Future value of periodic payments
        // FV = P * ((1 + r)^n - 1) / r
        if ($periodicRate > 0) {
            $fvContributions = $this->monthlyContribution * 
                ((pow(1 + $periodicRate, $totalPeriods) - 1) / $periodicRate);
        } else {
            $fvContributions = $this->monthlyContribution * $totalPeriods;
        }
        
        // Future value of initial principal
        $fvPrincipal = $this->principal * pow(1 + $periodicRate, $totalPeriods);
        
        $this->futureValue = $fvPrincipal + $fvContributions;
        $this->totalContributions = $this->principal + ($this->monthlyContribution * $totalPeriods);
        $this->totalInterest = $this->futureValue - $this->totalContributions;
    }

    private function generateYearlyBreakdown(float $rate, int $periods, int $years): void
    {
        $this->yearlyBreakdown = [];
        $periodicRate = $rate / $periods;
        $totalPeriods = $years * $periods;
        
        for ($year = 1; $year <= min($years, 10); $year+= max(1, floor($years/10))) {
            $periodsElapsed = $year * $periods;
            
            if ($this->calculationType === 'one-time') {
                $value = $this->principal * pow(1 + $periodicRate, $periodsElapsed);
                $contributions = $this->principal;
            } else {
                $fvPrincipal = $this->principal * pow(1 + $periodicRate, $periodsElapsed);
                $fvContributions = $this->monthlyContribution * 
                    ((pow(1 + $periodicRate, $periodsElapsed) - 1) / $periodicRate);
                $value = $fvPrincipal + $fvContributions;
                $contributions = $this->principal + ($this->monthlyContribution * $periodsElapsed);
            }
            
            $this->yearlyBreakdown[] = [
                'year' => $year,
                'value' => $value,
                'contributions' => $contributions,
                'interest' => $value - $contributions
            ];
        }
        
        // Add final year
        $periodsElapsed = $totalPeriods;
        if ($this->calculationType === 'one-time') {
            $value = $this->principal * pow(1 + $periodicRate, $periodsElapsed);
            $contributions = $this->principal;
        } else {
            $fvPrincipal = $this->principal * pow(1 + $periodicRate, $periodsElapsed);
            $fvContributions = $this->monthlyContribution * 
                ((pow(1 + $periodicRate, $periodsElapsed) - 1) / $periodicRate);
            $value = $fvPrincipal + $fvContributions;
            $contributions = $this->principal + ($this->monthlyContribution * $periodsElapsed);
        }
        
        $this->yearlyBreakdown[] = [
            'year' => $years,
            'value' => $value,
            'contributions' => $contributions,
            'interest' => $value - $contributions
        ];
    }

    public function getCompoundFrequencyOptionsProperty(): array
    {
        return [
            '1' => 'Annually',
            '2' => 'Semi-annually',
            '4' => 'Quarterly',
            '12' => 'Monthly',
            '365' => 'Daily',
        ];
    }

    public function render()
    {
        return view('livewire.compound-interest-calculator');
    }
}
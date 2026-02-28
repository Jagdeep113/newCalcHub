<?php

namespace App\Livewire;

use Livewire\Component;

class RetirementCalculator extends Component
{
    public int $currentAge = 35;
    public int $retirementAge = 65;
    public float $currentSavings = 100000;
    public float $annualContribution = 10000;
    public float $currentIncome = 75000;
    public float $expectedReturn = 7;
    public float $inflationRate = 2.5;
    public float $retirementIncomePercent = 80;
    public int $lifeExpectancy = 90;

    public float $futureValue = 0;
    public float $totalContributions = 0;
    public float $totalGrowth = 0;
    public float $monthlyRetirementIncome = 0;
    public float $retirementGoal = 0;
    public float $progress = 0;
    public string $status = '';

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
        $yearsToRetirement = $this->retirementAge - $this->currentAge;
        $yearsInRetirement = $this->lifeExpectancy - $this->retirementAge;
        
        $rate = $this->expectedReturn / 100;
        $inflation = $this->inflationRate / 100;

        // Calculate future value of current savings
        $fvCurrent = $this->currentSavings * pow(1 + $rate, $yearsToRetirement);
        
        // Calculate future value of annual contributions
        if ($rate > 0) {
            $fvContributions = $this->annualContribution * 
                ((pow(1 + $rate, $yearsToRetirement) - 1) / $rate);
        } else {
            $fvContributions = $this->annualContribution * $yearsToRetirement;
        }

        $this->futureValue = $fvCurrent + $fvContributions;
        $this->totalContributions = $this->currentSavings + 
            ($this->annualContribution * $yearsToRetirement);
        $this->totalGrowth = $this->futureValue - $this->totalContributions;

        // Calculate desired retirement income (adjusted for inflation)
        $desiredIncome = $this->currentIncome * ($this->retirementIncomePercent / 100);
        $inflatedIncome = $desiredIncome * pow(1 + $inflation, $yearsToRetirement);
        
        // Calculate retirement goal (using 4% rule)
        $this->retirementGoal = $inflatedIncome * 25; // 4% withdrawal rate
        
        // Calculate monthly retirement income
        $this->monthlyRetirementIncome = ($this->futureValue * 0.04) / 12;
        
        // Calculate progress percentage
        $this->progress = min(100, ($this->futureValue / $this->retirementGoal) * 100);
        
        // Determine status
        if ($this->progress >= 100) {
            $this->status = 'On Track';
        } elseif ($this->progress >= 75) {
            $this->status = 'Close to Goal';
        } elseif ($this->progress >= 50) {
            $this->status = 'Making Progress';
        } else {
            $this->status = 'Need to Increase Savings';
        }
    }

    public function getRetirementDurationProperty(): int
    {
        return $this->lifeExpectancy - $this->retirementAge;
    }

    public function getYearsToRetirementProperty(): int
    {
        return max(0, $this->retirementAge - $this->currentAge);
    }

    public function getShortfallProperty(): float
    {
        return max(0, $this->retirementGoal - $this->futureValue);
    }

    public function getRecommendedContributionProperty(): float
    {
        if ($this->getYearsToRetirementProperty <= 0) return 0;
        
        $rate = $this->expectedReturn / 100;
        $years = $this->getYearsToRetirementProperty;
        
        if ($rate > 0) {
            $fvFactor = (pow(1 + $rate, $years) - 1) / $rate;
        } else {
            $fvFactor = $years;
        }
        
        $fvCurrent = $this->currentSavings * pow(1 + $rate, $years);
        $needed = max(0, $this->retirementGoal - $fvCurrent);
        
        return $needed / $fvFactor;
    }

    public function render()
    {
        return view('livewire.retirement-calculator');
    }
}
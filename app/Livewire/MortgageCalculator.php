<?php

namespace App\Livewire;

use Livewire\Component;

class MortgageCalculator extends Component
{
    public float $homePrice = 300000;
    public float $downPayment = 60000;
    public float $interestRate = 6.5;
    public int $loanTerm = 30;
    public float $propertyTax = 3600;
    public float $homeInsurance = 1200;
    public float $pmi = 0;
    public float $hoa = 0;
    
    public float $monthlyPayment = 0;
    public float $monthlyPrincipalInterest = 0;
    public float $monthlyTax = 0;
    public float $monthlyInsurance = 0;
    public float $monthlyPMI = 0;
    public float $monthlyHOA = 0;
    public float $totalPayment = 0;
    public float $totalInterest = 0;
    public float $loanAmount = 0;
    public string $payoffDate = '';

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
        $this->loanAmount = $this->homePrice - $this->downPayment;
        
        // Calculate PMI if down payment is less than 20%
        if ($this->downPayment / $this->homePrice < 0.2) {
            $this->pmi = $this->loanAmount * 0.005 / 12; // Approximate PMI rate
        } else {
            $this->pmi = 0;
        }
        
        // Monthly interest rate
        $monthlyRate = ($this->interestRate / 100) / 12;
        $numberOfPayments = $this->loanTerm * 12;
        
        // Calculate monthly principal & interest payment
        if ($monthlyRate > 0 && $numberOfPayments > 0) {
            $this->monthlyPrincipalInterest = $this->loanAmount * 
                ($monthlyRate * pow(1 + $monthlyRate, $numberOfPayments)) / 
                (pow(1 + $monthlyRate, $numberOfPayments) - 1);
        } else {
            $this->monthlyPrincipalInterest = $this->loanAmount / $numberOfPayments;
        }
        
        $this->monthlyTax = $this->propertyTax / 12;
        $this->monthlyInsurance = $this->homeInsurance / 12;
        $this->monthlyHOA = $this->hoa;
        $this->monthlyPMI = $this->pmi;
        
        $this->monthlyPayment = $this->monthlyPrincipalInterest + 
                                $this->monthlyTax + 
                                $this->monthlyInsurance + 
                                $this->monthlyPMI + 
                                $this->monthlyHOA;
        
        $this->totalPayment = $this->monthlyPrincipalInterest * $numberOfPayments;
        $this->totalInterest = $this->totalPayment - $this->loanAmount;
        
        // Calculate payoff date
        $date = now()->addMonths($numberOfPayments);
        $this->payoffDate = $date->format('F Y');
    }

    public function render()
    {
        return view('livewire.mortgage-calculator');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class LoanCalculator extends Component
{
    public float $loanAmount = 25000;
    public float $interestRate = 6.5;
    public int $loanTerm = 60; // months
    public string $calculationType = 'payment';
    
    // For affordability calculation
    public float $monthlyPayment = 500;
    
    public float $monthlyPaymentResult = 0;
    public float $totalInterest = 0;
    public float $totalPayment = 0;
    public string $payoffDate = '';
    public array $amortizationSchedule = [];

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
        if ($this->calculationType === 'payment') {
            $this->calculatePayment();
        } else {
            $this->calculateAffordability();
        }
    }

    private function calculatePayment(): void
    {
        $monthlyRate = ($this->interestRate / 100) / 12;
        
        if ($monthlyRate > 0) {
           $this->loanAmount= !empty($this->loanAmount)? $this->loanAmount:0;
            $this->monthlyPaymentResult = $this->loanAmount * 
                ($monthlyRate * pow(1 + $monthlyRate, $this->loanTerm)) / 
                (pow(1 + $monthlyRate, $this->loanTerm) - 1);
        } else {
            $this->monthlyPaymentResult = $this->loanAmount / $this->loanTerm;
        }
        
        $this->totalPayment = $this->monthlyPaymentResult * $this->loanTerm;
        $this->totalInterest = $this->totalPayment - $this->loanAmount;
        
        // Calculate payoff date
        $date = now()->addMonths($this->loanTerm);
        $this->payoffDate = $date->format('F Y');
        
        // Generate amortization schedule (first 12 months)
        $this->generateAmortizationSchedule();
    }

    private function calculateAffordability(): void
    {
        $monthlyRate = ($this->interestRate / 100) / 12;
        
        if ($monthlyRate > 0) {
            $this->loanAmount = $this->monthlyPayment * 
                (pow(1 + $monthlyRate, $this->loanTerm) - 1) / 
                ($monthlyRate * pow(1 + $monthlyRate, $this->loanTerm));
        } else {
            $this->loanAmount = $this->monthlyPayment * $this->loanTerm;
        }
        
        $this->totalPayment = $this->monthlyPayment * $this->loanTerm;
        $this->totalInterest = $this->totalPayment - $this->loanAmount;
        
        // Calculate payoff date
        $date = now()->addMonths($this->loanTerm);
        $this->payoffDate = $date->format('F Y');
    }

    private function generateAmortizationSchedule(): void
    {
        $this->amortizationSchedule = [];
        $balance = $this->loanAmount;
        $monthlyRate = ($this->interestRate / 100) / 12;
        
        for ($i = 1; $i <= min(12, $this->loanTerm); $i++) {
            $interest = $balance * $monthlyRate;
            $principal = $this->monthlyPaymentResult - $interest;
            $balance -= $principal;
            
            $this->amortizationSchedule[] = [
                'payment' => $i,
                'amount' => $this->monthlyPaymentResult,
                'principal' => $principal,
                'interest' => $interest,
                'balance' => max(0, $balance)
            ];
        }
    }

    public function render()
    {
        return view('livewire.loan-calculator');
    }
}
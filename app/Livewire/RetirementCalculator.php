<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;

class RetirementCalculator extends Component
{
    // Make properties nullable and remove type hints to handle empty inputs
    #[Rule('required|integer|min:18|max:80')]
    public $currentAge = 35;
    
    #[Rule('required|integer|min:30|max:100')]
    public $retirementAge = 65;
    
    #[Rule('required|numeric|min:0|max:100000000')]
    public $currentSavings = 100000;
    
    #[Rule('required|numeric|min:0|max:10000000')]
    public $annualContribution = 10000;
    
    #[Rule('required|numeric|min:0|max:10000000')]
    public $currentIncome = 75000;
    
    #[Rule('required|numeric|min:0|max:30')]
    public $expectedReturn = 7;
    
    #[Rule('required|numeric|min:0|max:20')]
    public $inflationRate = 2.5;
    
    #[Rule('required|numeric|min:0|max:100')]
    public $retirementIncomePercent = 80;
    
    #[Rule('required|integer|min:50|max:120')]
    public $lifeExpectancy = 90;

    // Calculated properties (keep type hints for these)
    public float $futureValue = 0;
    public float $totalContributions = 0;
    public float $totalGrowth = 0;
    public float $monthlyRetirementIncome = 0;
    public float $retirementGoal = 0;
    public float $progress = 0;
    public string $status = '';
    
    // Track validation errors
    public array $errors = [];

    protected function rules()
    {
        return [
            'currentAge' => 'required|integer|min:18|max:80',
            'retirementAge' => [
                'required',
                'integer',
                'min:30',
                'max:100',
                function ($attribute, $value, $fail) {
                    if ($value !== null && $this->currentAge !== null && $value <= $this->currentAge) {
                        $fail('Retirement age must be greater than current age.');
                    }
                },
            ],
            'currentSavings' => 'required|numeric|min:0|max:100000000',
            'annualContribution' => 'required|numeric|min:0|max:10000000',
            'currentIncome' => 'required|numeric|min:0|max:10000000',
            'expectedReturn' => 'required|numeric|min:0|max:30',
            'inflationRate' => 'required|numeric|min:0|max:20',
            'retirementIncomePercent' => 'required|numeric|min:0|max:100',
            'lifeExpectancy' => [
                'required',
                'integer',
                'min:50',
                'max:120',
                function ($attribute, $value, $fail) {
                    if ($value !== null && $this->retirementAge !== null && $value <= $this->retirementAge) {
                        $fail('Life expectancy must be greater than retirement age.');
                    }
                },
            ],
        ];
    }

    protected $messages = [
        'currentAge.required' => 'Current age is required.',
        'currentAge.integer' => 'Current age must be a whole number.',
        'currentAge.min' => 'Current age must be at least 18.',
        'currentAge.max' => 'Current age cannot exceed 80.',
        
        'retirementAge.required' => 'Retirement age is required.',
        'retirementAge.integer' => 'Retirement age must be a whole number.',
        'retirementAge.min' => 'Retirement age must be at least 30.',
        'retirementAge.max' => 'Retirement age cannot exceed 100.',
        
        'currentSavings.required' => 'Current savings is required.',
        'currentSavings.numeric' => 'Current savings must be a number.',
        'currentSavings.min' => 'Current savings cannot be negative.',
        'currentSavings.max' => 'Current savings exceeds maximum allowed.',
        
        'annualContribution.required' => 'Annual contribution is required.',
        'annualContribution.numeric' => 'Annual contribution must be a number.',
        'annualContribution.min' => 'Annual contribution cannot be negative.',
        
        'currentIncome.required' => 'Current income is required.',
        'currentIncome.numeric' => 'Current income must be a number.',
        'currentIncome.min' => 'Current income cannot be negative.',
        
        'expectedReturn.required' => 'Expected return is required.',
        'expectedReturn.numeric' => 'Expected return must be a number.',
        'expectedReturn.min' => 'Expected return cannot be negative.',
        'expectedReturn.max' => 'Expected return cannot exceed 30%.',
        
        'inflationRate.required' => 'Inflation rate is required.',
        'inflationRate.numeric' => 'Inflation rate must be a number.',
        'inflationRate.min' => 'Inflation rate cannot be negative.',
        'inflationRate.max' => 'Inflation rate cannot exceed 20%.',
        
        'retirementIncomePercent.required' => 'Retirement income percentage is required.',
        'retirementIncomePercent.numeric' => 'Retirement income percentage must be a number.',
        'retirementIncomePercent.min' => 'Retirement income percentage cannot be negative.',
        'retirementIncomePercent.max' => 'Retirement income percentage cannot exceed 100%.',
        
        'lifeExpectancy.required' => 'Life expectancy is required.',
        'lifeExpectancy.integer' => 'Life expectancy must be a whole number.',
        'lifeExpectancy.min' => 'Life expectancy must be at least 50.',
        'lifeExpectancy.max' => 'Life expectancy cannot exceed 120.',
    ];

    public function mount(): void
    {
        $this->calculate();
    }

    public function updated($propertyName): void
    {
        // Clear previous error for this field
        unset($this->errors[$propertyName]);
        
        // Handle empty input
        if ($this->$propertyName === '') {
            $this->$propertyName = null;
        }

        try {
            // Convert string numbers to appropriate types
            $this->formatInput($propertyName);
            
            // Validate only the updated field
            $this->validateOnly($propertyName);
            
            // If validation passes, recalculate
            $this->calculate();
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Store error message
            $this->errors[$propertyName] = $e->validator->errors()->first($propertyName);
            
            // Dispatch event for frontend
            $this->dispatch('validation-error', [
                'field' => $propertyName,
                'message' => $this->errors[$propertyName]
            ]);
        }
    }

    protected function formatInput($propertyName): void
    {
        // Convert empty strings to null
        if ($this->$propertyName === '') {
            $this->$propertyName = null;
            return;
        }

        // Format based on property type expectations
        switch ($propertyName) {
            case 'currentAge':
            case 'retirementAge':
            case 'lifeExpectancy':
                $this->$propertyName = (int) $this->$propertyName;
                break;
                
            case 'currentSavings':
            case 'annualContribution':
            case 'currentIncome':
            case 'expectedReturn':
            case 'inflationRate':
            case 'retirementIncomePercent':
                $this->$propertyName = (float) $this->$propertyName;
                break;
        }
    }

    public function calculate(): void
    {
        // Skip calculation if any required fields are null
        if ($this->hasNullRequiredFields()) {
            return;
        }

        // Validate all inputs before calculation
        try {
            $validatedData = $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->errors = $e->validator->errors()->toArray();
            return;
        }

        $yearsToRetirement = $this->retirementAge - $this->currentAge;
        
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
        $this->retirementGoal = $inflatedIncome * 25;
        
        // Calculate monthly retirement income
        $this->monthlyRetirementIncome = ($this->futureValue * 0.04) / 12;
        
        // Calculate progress percentage
        $this->progress = $this->retirementGoal > 0 
            ? min(100, ($this->futureValue / $this->retirementGoal) * 100) 
            : 0;
        
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
        
        // Clear errors if calculation succeeded
        $this->errors = [];
    }

    protected function hasNullRequiredFields(): bool
    {
        $requiredFields = [
            'currentAge',
            'retirementAge',
            'currentSavings',
            'annualContribution',
            'currentIncome',
            'expectedReturn',
            'inflationRate',
            'retirementIncomePercent',
            'lifeExpectancy'
        ];

        foreach ($requiredFields as $field) {
            if ($this->$field === null || $this->$field === '') {
                return true;
            }
        }

        return false;
    }

    public function getRetirementDurationProperty(): int
    {
        if (!$this->lifeExpectancy || !$this->retirementAge) {
            return 0;
        }
        return max(0, $this->lifeExpectancy - $this->retirementAge);
    }

    public function getYearsToRetirementProperty(): int
    {
        if (!$this->retirementAge || !$this->currentAge) {
            return 0;
        }
        return max(0, $this->retirementAge - $this->currentAge);
    }

    public function getShortfallProperty(): float
    {
        if (!$this->retirementGoal || !$this->futureValue) {
            return 0;
        }
        return max(0, $this->retirementGoal - $this->futureValue);
    }

    public function getRecommendedContributionProperty(): float
    {
        $yearsToRetirement = $this->getYearsToRetirementProperty();
        
        if ($yearsToRetirement <= 0 || !$this->retirementGoal || !$this->currentSavings) {
            return 0;
        }
        
        $rate = $this->expectedReturn / 100;
        
        if ($rate > 0) {
            $fvFactor = (pow(1 + $rate, $yearsToRetirement) - 1) / $rate;
        } else {
            $fvFactor = $yearsToRetirement;
        }
        
        $fvCurrent = $this->currentSavings * pow(1 + $rate, $yearsToRetirement);
        $needed = max(0, $this->retirementGoal - $fvCurrent);
        
        return $fvFactor > 0 ? $needed / $fvFactor : 0;
    }

    public function resetToDefaults(): void
    {
        $this->currentAge = 35;
        $this->retirementAge = 65;
        $this->currentSavings = 100000;
        $this->annualContribution = 10000;
        $this->currentIncome = 75000;
        $this->expectedReturn = 7;
        $this->inflationRate = 2.5;
        $this->retirementIncomePercent = 80;
        $this->lifeExpectancy = 90;
        $this->errors = [];
        
        $this->calculate();
        
        $this->dispatch('reset-complete', message: 'Values have been reset to defaults.');
    }

    public function render()
    {
        return view('livewire.retirement-calculator');
    }
}
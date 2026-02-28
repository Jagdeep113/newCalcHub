<?php

namespace App\Livewire;

use Livewire\Component;

class FractionCalculator extends Component
{
    public int $numerator1 = 1;
    public int $denominator1 = 2;
    public int $numerator2 = 1;
    public int $denominator2 = 4;
    public string $operation = 'add';
    
    public int $resultNumerator = 0;
    public int $resultDenominator = 0;
    public ?float $resultDecimal = null;
    public ?string $simplified = null;

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
        if ($this->denominator1 == 0 || $this->denominator2 == 0) {
            return;
        }

        $n1 = $this->numerator1;
        $d1 = $this->denominator1;
        $n2 = $this->numerator2;
        $d2 = $this->denominator2;

        switch ($this->operation) {
            case 'add':
                $this->resultNumerator = ($n1 * $d2) + ($n2 * $d1);
                $this->resultDenominator = $d1 * $d2;
                break;
                
            case 'subtract':
                $this->resultNumerator = ($n1 * $d2) - ($n2 * $d1);
                $this->resultDenominator = $d1 * $d2;
                break;
                
            case 'multiply':
                $this->resultNumerator = $n1 * $n2;
                $this->resultDenominator = $d1 * $d2;
                break;
                
            case 'divide':
                $this->resultNumerator = $n1 * $d2;
                $this->resultDenominator = $d1 * $n2;
                break;
        }

        // Calculate decimal value
        $this->resultDecimal = $this->resultDenominator != 0 ? 
            $this->resultNumerator / $this->resultDenominator : null;

        // Simplify fraction
        $this->simplifyResult();
    }

    private function simplifyResult(): void
    {
        if ($this->resultDenominator == 0) return;

        $gcd = $this->gcd(abs($this->resultNumerator), abs($this->resultDenominator));
        $simpleNum = $this->resultNumerator / $gcd;
        $simpleDen = $this->resultDenominator / $gcd;

        if ($simpleDen == 1) {
            $this->simplified = (string)$simpleNum;
        } else {
            $this->simplified = $simpleNum . '/' . $simpleDen;
        }
    }

    private function gcd(int $a, int $b): int
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function render()
    {
        return view('livewire.fraction-calculator');
    }
}
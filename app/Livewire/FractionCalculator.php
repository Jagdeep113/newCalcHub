<?php

namespace App\Livewire;

use Livewire\Component;

class FractionCalculator extends Component
{
    public string $numerator1 = '1';
    public string $denominator1 = '2';
    public string $numerator2 = '1';
    public string $denominator2 = '4';
    public string $operation = 'add';
    
    public string $resultNumerator = '0';
    public string $resultDenominator = '0';
    public string $resultDecimal = '0';
    public ?string $simplified = null;

    public function mount(): void
    {
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function updatedNumerator1(): void
    {
        $this->numerator1 = $this->removeLeadingZeros($this->numerator1);
    }

    public function updatedDenominator1(): void
    {
        $this->denominator1 = $this->removeLeadingZeros($this->denominator1);
    }

    public function updatedNumerator2(): void
    {
        $this->numerator2 = $this->removeLeadingZeros($this->numerator2);
    }

    public function updatedDenominator2(): void
    {
        $this->denominator2 = $this->removeLeadingZeros($this->denominator2);
    }

    private function removeLeadingZeros(string $value): string
    {
        // Handle empty or decimal values
        if ($value === '' || $value === null) {
            return '0';
        }
        
        // Remove any non-numeric characters except decimal point and minus sign
        $value = preg_replace('/[^0-9-]/', '', $value);
        
        // Handle negative numbers
        $isNegative = strpos($value, '-') === 0;
        $value = ltrim($value, '-');
        
        // Remove leading zeros
        $value = ltrim($value, '0') ?: '0';
        
        return $isNegative ? '-' . $value : $value;
    }

    public function calculate(): void
    {
        // Sanitize inputs
        $n1 = intval($this->sanitizeNumber($this->numerator1));
        $d1 = intval($this->sanitizeNumber($this->denominator1));
        $n2 = intval($this->sanitizeNumber($this->numerator2));
        $d2 = intval($this->sanitizeNumber($this->denominator2));

        // Validate denominators
        if ($d1 == 0 || $d2 == 0) {
            $this->resultNumerator = '0';
            $this->resultDenominator = '0';
            $this->resultDecimal = '0';
            $this->simplified = null;
            return;
        }

        $resultNum = 0;
        $resultDen = 1;

        switch ($this->operation) {
            case 'add':
                $resultNum = ($n1 * $d2) + ($n2 * $d1);
                $resultDen = $d1 * $d2;
                break;
                
            case 'subtract':
                $resultNum = ($n1 * $d2) - ($n2 * $d1);
                $resultDen = $d1 * $d2;
                break;
                
            case 'multiply':
                $resultNum = $n1 * $n2;
                $resultDen = $d1 * $d2;
                break;
                
            case 'divide':
                $resultNum = $n1 * $d2;
                $resultDen = $d1 * $n2;
                break;
        }

        // Handle negative denominator
        if ($resultDen < 0) {
            $resultNum *= -1;
            $resultDen *= -1;
        }

        $this->resultNumerator = (string)$resultNum;
        $this->resultDenominator = (string)$resultDen;

        // Calculate decimal value
        $decimal = $resultDen != 0 ? $resultNum / $resultDen : 0;
        $this->resultDecimal = $this->formatDecimal($decimal);

        // Simplify fraction
        $this->simplifyResult($resultNum, $resultDen);
    }

    private function sanitizeNumber(string $value): string
    {
        if ($value === '' || $value === null) {
            return '0';
        }
        
        // Remove any non-numeric characters except decimal point and minus sign
        $value = preg_replace('/[^0-9-]/', '', $value);
        
        // Ensure it's a valid number
        if (!is_numeric($value)) {
            return '0';
        }
        
        return $value;
    }

    private function formatDecimal(float $value): string
    {
        // Handle integers
        if (floor($value) == $value) {
            return (string)floor($value);
        }
        
        // Format to 4 decimal places
        return rtrim(rtrim(number_format($value, 4, '.', ''), '0'), '.');
    }

    private function simplifyResult(int $num, int $den): void
    {
        if ($den == 0) {
            $this->simplified = null;
            return;
        }

        $gcd = $this->gcd(abs($num), abs($den));
        $simpleNum = $num / $gcd;
        $simpleDen = $den / $gcd;

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
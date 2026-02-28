<?php

namespace App\Livewire;

use Livewire\Component;

class PercentageCalculator extends Component
{
    public string $calculationType = 'find-percentage';
    
    // Find percentage fields
    public string $percentage = '20';
    public string $value = '200';
    
    // Find number fields
    public string $part = '40';
    public string $whole = '200';
    
    // Increase/Decrease fields
    public string $originalValue = '200';
    public string $changePercent = '20';
    public string $changeType = 'increase';
    
    public string $result = '0';

    public function mount(): void
    {
        $this->calculate();
    }

    public function updated($property): void
    {
        $this->calculate();
    }

    public function updatedPercentage(): void
    {
        // Remove leading zeros
        $this->percentage = $this->removeLeadingZeros($this->percentage);
    }

    public function updatedValue(): void
    {
        $this->value = $this->removeLeadingZeros($this->value);
    }

    public function updatedPart(): void
    {
        $this->part = $this->removeLeadingZeros($this->part);
    }

    public function updatedWhole(): void
    {
        $this->whole = $this->removeLeadingZeros($this->whole);
    }

    public function updatedOriginalValue(): void
    {
        $this->originalValue = $this->removeLeadingZeros($this->originalValue);
    }

    public function updatedChangePercent(): void
    {
        $this->changePercent = $this->removeLeadingZeros($this->changePercent);
    }

    private function removeLeadingZeros(string $value): string
    {
        // Handle empty or decimal values
        if ($value === '' || $value === null) {
            return '0';
        }
        
        // Remove any non-numeric characters except decimal point
        $value = preg_replace('/[^0-9.]/', '', $value);
        
        // Handle decimal numbers
        if (strpos($value, '.') !== false) {
            $parts = explode('.', $value);
            $parts[0] = ltrim($parts[0], '0') ?: '0';
            return $parts[0] . '.' . $parts[1];
        }
        
        // Handle integers
        return ltrim($value, '0') ?: '0';
    }

    public function calculate(): void
    {
        // Ensure all values are valid numbers
        $percentage = $this->sanitizeNumber($this->percentage);
        $value = $this->sanitizeNumber($this->value);
        $part = $this->sanitizeNumber($this->part);
        $whole = $this->sanitizeNumber($this->whole);
        $originalValue = $this->sanitizeNumber($this->originalValue);
        $changePercent = $this->sanitizeNumber($this->changePercent);

        switch ($this->calculationType) {
            case 'find-percentage':
                $result = ($percentage / 100) * $value;
                break;
                
            case 'find-number':
                if ($whole != 0) {
                    $percentage = ($part / $whole) * 100;
                    $this->percentage = (string)$percentage;
                    $result = $percentage;
                } else {
                    $result = 0;
                }
                break;
                
            case 'increase-decrease':
                if ($this->changeType === 'increase') {
                    $result = $originalValue * (1 + $changePercent / 100);
                } else {
                    $result = $originalValue * (1 - $changePercent / 100);
                }
                break;
                
            default:
                $result = 0;
        }

        $this->result = $this->formatResult($result);
    }

    private function sanitizeNumber(string $value): float
    {
        if ($value === '' || $value === null) {
            return 0;
        }
        
        // Remove any non-numeric characters except decimal point
        $value = preg_replace('/[^0-9.]/', '', $value);
        
        // Ensure it's a valid number
        if (!is_numeric($value)) {
            return 0;
        }
        
        return floatval($value);
    }

    private function formatResult(float $value): string
    {
        // Handle very small numbers
        if (abs($value) < 0.000001 && $value != 0) {
            return number_format($value, 10, '.', '');
        }
        
        // Handle integers
        if (floor($value) == $value) {
            return (string)floor($value);
        }
        
        // Format to 4 decimal places
        return rtrim(rtrim(number_format($value, 4, '.', ''), '0'), '.');
    }

    public function render()
    {
        return view('livewire.percentage-calculator');
    }
}
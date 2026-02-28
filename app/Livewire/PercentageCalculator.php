<?php

namespace App\Livewire;

use Livewire\Component;

class PercentageCalculator extends Component
{
    public string $calculationType = 'find-percentage';
    
    // Find percentage fields
    public float $percentage = 20;
    public float $value = 200;
    
    // Find number fields
    public float $part = 40;
    public float $whole = 200;
    
    // Increase/Decrease fields
    public float $originalValue = 200;
    public float $changePercent = 20;
    public string $changeType = 'increase';
    
    public float $result = 0;

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
        switch ($this->calculationType) {
            case 'find-percentage':
                $this->result = ($this->percentage / 100) * $this->value;
                break;
                
            case 'find-number':
                if ($this->whole != 0) {
                    $this->percentage = ($this->part / $this->whole) * 100;
                    $this->result = $this->percentage;
                }
                break;
                
            case 'increase-decrease':
                if ($this->changeType === 'increase') {
                    $this->result = $this->originalValue * (1 + $this->changePercent / 100);
                } else {
                    $this->result = $this->originalValue * (1 - $this->changePercent / 100);
                }
                break;
        }
    }

    public function render()
    {
        return view('livewire.percentage-calculator');
    }
}
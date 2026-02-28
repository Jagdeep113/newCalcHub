<?php

namespace App\Livewire;

use Livewire\Component;

class TipCalculator extends Component
{
    public float $billAmount = 100;
    public float $tipPercent = 15;
    public int $people = 1;
    public string $serviceType = 'restaurant';
    public string $splitType = 'even';
    
    public float $tipAmount = 0;
    public float $totalAmount = 0;
    public float $perPersonAmount = 0;
    public float $tipPerPerson = 0;

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
        $this->tipAmount = $this->billAmount * ($this->tipPercent / 100);
        $this->totalAmount = $this->billAmount + $this->tipAmount;
        $this->perPersonAmount = $this->totalAmount / $this->people;
        $this->tipPerPerson = $this->tipAmount / $this->people;
    }

    public function setTipPercent(float $percent): void
    {
        $this->tipPercent = $percent;
    }

    public function getServiceMessageProperty(): string
    {
        return match($this->serviceType) {
            'restaurant' => 'For standard restaurant service, 15-20% is customary.',
            'delivery' => 'For food delivery, 10-15% is standard. Consider tipping more for large orders.',
            'bar' => 'For bartenders, $1-2 per drink or 15-20% of the total.',
            'hotel' => 'For hotel housekeeping, $2-5 per night is appreciated.',
            default => 'Tipping customs vary. 15-20% is generally appropriate for good service.'
        };
    }

    public function render()
    {
        return view('livewire.tip-calculator');
    }
}
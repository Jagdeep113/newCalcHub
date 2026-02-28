<?php

namespace App\Livewire;

use Livewire\Component;

class WeightConverter extends Component
{
    public float $value = 1;
    public string $fromUnit = 'kg';
    public string $toUnit = 'lb';
    public float $result = 0;

    // Conversion factors to kilograms
    private array $conversionFactors = [
        'kg' => 1,
        'g' => 0.001,
        'mg' => 0.000001,
        't' => 1000,
        'lb' => 0.453592,
        'oz' => 0.0283495,
        'st' => 6.35029,
    ];

    public function mount(): void
    {
        $this->convert();
    }

    public function updated($property): void
    {
        $this->convert();
    }

    public function convert(): void
    {
        // Convert to base unit (kilograms)
        $kg = $this->value * $this->conversionFactors[$this->fromUnit];
        
        // Convert from kilograms to target unit
        $this->result = $kg / $this->conversionFactors[$this->toUnit];
    }

    public function swapUnits(): void
    {
        $temp = $this->fromUnit;
        $this->fromUnit = $this->toUnit;
        $this->toUnit = $temp;
        $this->convert();
    }

    public function getUnitsProperty(): array
    {
        return [
            'kg' => ['name' => 'Kilograms', 'symbol' => 'kg'],
            'g' => ['name' => 'Grams', 'symbol' => 'g'],
            'mg' => ['name' => 'Milligrams', 'symbol' => 'mg'],
            't' => ['name' => 'Metric Tons', 'symbol' => 't'],
            'lb' => ['name' => 'Pounds', 'symbol' => 'lb'],
            'oz' => ['name' => 'Ounces', 'symbol' => 'oz'],
            'st' => ['name' => 'Stones', 'symbol' => 'st'],
        ];
    }

    public function render()
    {
        return view('livewire.weight-converter');
    }
}
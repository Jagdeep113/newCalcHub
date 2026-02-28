<?php

namespace App\Livewire;

use Livewire\Component;

class LengthConverter extends Component
{
    public float $value = 1;
    public string $fromUnit = 'm';
    public string $toUnit = 'cm';
    public float $result = 0;

    // Conversion factors to meters
    private array $conversionFactors = [
        'm' => 1,
        'cm' => 0.01,
        'mm' => 0.001,
        'km' => 1000,
        'in' => 0.0254,
        'ft' => 0.3048,
        'yd' => 0.9144,
        'mi' => 1609.344,
        'nmi' => 1852,
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
        // Convert to base unit (meters)
        $meters = $this->value * $this->conversionFactors[$this->fromUnit];
        
        // Convert from meters to target unit
        $this->result = $meters / $this->conversionFactors[$this->toUnit];
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
            'm' => ['name' => 'Meters', 'symbol' => 'm'],
            'cm' => ['name' => 'Centimeters', 'symbol' => 'cm'],
            'mm' => ['name' => 'Millimeters', 'symbol' => 'mm'],
            'km' => ['name' => 'Kilometers', 'symbol' => 'km'],
            'in' => ['name' => 'Inches', 'symbol' => 'in'],
            'ft' => ['name' => 'Feet', 'symbol' => 'ft'],
            'yd' => ['name' => 'Yards', 'symbol' => 'yd'],
            'mi' => ['name' => 'Miles', 'symbol' => 'mi'],
            'nmi' => ['name' => 'Nautical Miles', 'symbol' => 'nmi'],
        ];
    }

    public function render()
    {
        return view('livewire.length-converter');
    }
}
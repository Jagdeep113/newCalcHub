<?php

namespace App\Livewire;

use Livewire\Component;

class AreaConverter extends Component
{
    public float $value = 1;
    public string $fromUnit = 'sqm';
    public string $toUnit = 'sqft';
    public float $result = 0;

    // Conversion factors to square meters
    private array $conversionFactors = [
        'sqm' => 1,
        'sqkm' => 1000000,
        'sqft' => 0.092903,
        'sqyd' => 0.836127,
        'acre' => 4046.86,
        'hectare' => 10000,
        'sqmi' => 2589988.11,
        'sqin' => 0.00064516,
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
        // Convert to square meters
        $sqm = $this->value * $this->conversionFactors[$this->fromUnit];
        
        // Convert from square meters to target unit
        $this->result = $sqm / $this->conversionFactors[$this->toUnit];
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
            'sqm' => ['name' => 'Square Meters', 'symbol' => 'm²'],
            'sqkm' => ['name' => 'Square Kilometers', 'symbol' => 'km²'],
            'sqft' => ['name' => 'Square Feet', 'symbol' => 'ft²'],
            'sqyd' => ['name' => 'Square Yards', 'symbol' => 'yd²'],
            'acre' => ['name' => 'Acres', 'symbol' => 'ac'],
            'hectare' => ['name' => 'Hectares', 'symbol' => 'ha'],
            'sqmi' => ['name' => 'Square Miles', 'symbol' => 'mi²'],
            'sqin' => ['name' => 'Square Inches', 'symbol' => 'in²'],
        ];
    }

    public function render()
    {
        return view('livewire.area-converter');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class SpeedConverter extends Component
{
    public float $value = 1;
    public string $fromUnit = 'kmh';
    public string $toUnit = 'mph';
    public float $result = 0;

    // Conversion factors to km/h
    private array $conversionFactors = [
        'kmh' => 1,
        'mph' => 1.60934,
        'ms' => 3.6,
        'knot' => 1.852,
        'fts' => 1.09728,
        'mach' => 1234.8, // Approximate at sea level
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
        // Convert to base unit (km/h)
        $kmh = $this->value * $this->conversionFactors[$this->fromUnit];
        
        // Convert from km/h to target unit
        $this->result = $kmh / $this->conversionFactors[$this->toUnit];
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
            'kmh' => ['name' => 'Kilometers per hour', 'symbol' => 'km/h'],
            'mph' => ['name' => 'Miles per hour', 'symbol' => 'mph'],
            'ms' => ['name' => 'Meters per second', 'symbol' => 'm/s'],
            'knot' => ['name' => 'Knots', 'symbol' => 'kn'],
            'fts' => ['name' => 'Feet per second', 'symbol' => 'ft/s'],
            'mach' => ['name' => 'Mach (approx)', 'symbol' => 'Mach'],
        ];
    }

    public function render()
    {
        return view('livewire.speed-converter');
    }
}
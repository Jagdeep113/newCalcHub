<?php

namespace App\Livewire;

use Livewire\Component;

class TemperatureConverter extends Component
{
    public string $value = '0';
    public string $fromUnit = 'c';
    public string $toUnit = 'f';
    public string $result = '0';

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
        // Handle empty or invalid input
        if ($this->value === '' || $this->value === null) {
            $this->value = '0';
        }

        // Remove any non-numeric characters except decimal point and minus sign
        $this->value = preg_replace('/[^0-9.-]/', '', $this->value);
        
        // Ensure it's a valid number
        if (!is_numeric($this->value)) {
            $this->value = '0';
        }

        $numericValue = floatval($this->value);
        
        // Convert to Celsius first
        $celsius = $this->convertToCelsius($numericValue, $this->fromUnit);
        
        // Convert from Celsius to target unit
        $converted = $this->convertFromCelsius($celsius, $this->toUnit);
        
        // Format the result
        $this->result = $this->formatResult($converted);
    }

    private function convertToCelsius(float $value, string $unit): float
    {
        return match($unit) {
            'c' => $value,
            'f' => ($value - 32) * 5/9,
            'k' => $value - 273.15,
            default => $value,
        };
    }

    private function convertFromCelsius(float $celsius, string $unit): float
    {
        return match($unit) {
            'c' => $celsius,
            'f' => ($celsius * 9/5) + 32,
            'k' => $celsius + 273.15,
            default => $celsius,
        };
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
        
        // Format to 4 decimal places, removing trailing zeros
        return rtrim(rtrim(number_format($value, 4, '.', ''), '0'), '.');
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
            'c' => ['name' => 'Celsius', 'symbol' => '°C'],
            'f' => ['name' => 'Fahrenheit', 'symbol' => '°F'],
            'k' => ['name' => 'Kelvin', 'symbol' => 'K'],
        ];
    }

    public function getCommonPointsProperty(): array
    {
        return [
            ['c' => 0, 'f' => 32, 'k' => 273.15, 'name' => 'Water freezes'],
            ['c' => 100, 'f' => 212, 'k' => 373.15, 'name' => 'Water boils'],
            ['c' => 37, 'f' => 98.6, 'k' => 310.15, 'name' => 'Body temperature'],
            ['c' => -40, 'f' => -40, 'k' => 233.15, 'name' => 'Celsius = Fahrenheit'],
            ['c' => -273.15, 'f' => -459.67, 'k' => 0, 'name' => 'Absolute zero'],
        ];
    }

    public function render()
    {
        return view('livewire.temperature-converter');
    }
}
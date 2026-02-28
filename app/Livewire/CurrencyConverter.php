<?php

namespace App\Livewire;

use Livewire\Component;

class CurrencyConverter extends Component
{
    public float $amount = 100;
    public string $fromCurrency = 'USD';
    public string $toCurrency = 'EUR';
    public array $rates = [];
    public float $result = 0;
    public string $lastUpdated = '';

    // Mock exchange rates (in production, fetch from API)
    private array $exchangeRates = [
        'USD' => 1.0,
        'EUR' => 0.92,
        'GBP' => 0.79,
        'JPY' => 150.25,
        'CAD' => 1.35,
        'AUD' => 1.52,
        'CHF' => 0.88,
        'CNY' => 7.19,
        'INR' => 83.12,
        'MXN' => 17.05,
        'BRL' => 4.97,
        'RUB' => 91.50,
    ];

    public function mount(): void
    {
        $this->rates = $this->exchangeRates;
        $this->lastUpdated = now()->format('F j, Y');
        $this->convert();
    }

    public function updated($property): void
    {
        $this->convert();
    }

    public function convert(): void
    {
        // Convert via USD as base
        $amountInUSD = $this->amount / $this->rates[$this->fromCurrency];
        $this->result = $amountInUSD * $this->rates[$this->toCurrency];
    }

    public function swapCurrencies(): void
    {
        $temp = $this->fromCurrency;
        $this->fromCurrency = $this->toCurrency;
        $this->toCurrency = $temp;
        $this->convert();
    }

    public function getCurrenciesProperty(): array
    {
        return [
            'USD' => ['name' => 'US Dollar', 'symbol' => '$', 'flag' => '🇺🇸'],
            'EUR' => ['name' => 'Euro', 'symbol' => '€', 'flag' => '🇪🇺'],
            'GBP' => ['name' => 'British Pound', 'symbol' => '£', 'flag' => '🇬🇧'],
            'JPY' => ['name' => 'Japanese Yen', 'symbol' => '¥', 'flag' => '🇯🇵'],
            'CAD' => ['name' => 'Canadian Dollar', 'symbol' => 'C$', 'flag' => '🇨🇦'],
            'AUD' => ['name' => 'Australian Dollar', 'symbol' => 'A$', 'flag' => '🇦🇺'],
            'CHF' => ['name' => 'Swiss Franc', 'symbol' => 'Fr', 'flag' => '🇨🇭'],
            'CNY' => ['name' => 'Chinese Yuan', 'symbol' => '¥', 'flag' => '🇨🇳'],
            'INR' => ['name' => 'Indian Rupee', 'symbol' => '₹', 'flag' => '🇮🇳'],
            'MXN' => ['name' => 'Mexican Peso', 'symbol' => '$', 'flag' => '🇲🇽'],
            'BRL' => ['name' => 'Brazilian Real', 'symbol' => 'R$', 'flag' => '🇧🇷'],
            'RUB' => ['name' => 'Russian Ruble', 'symbol' => '₽', 'flag' => '🇷🇺'],
        ];
    }

    public function getExchangeRateProperty(): float
    {
        return $this->rates[$this->toCurrency] / $this->rates[$this->fromCurrency];
    }

    public function getInverseRateProperty(): float
    {
        return $this->rates[$this->fromCurrency] / $this->rates[$this->toCurrency];
    }

    public function render()
    {
        return view('livewire.currency-converter');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class ScientificCalculator extends Component
{
    public string $display = '0';
    public string $memory = '0';
    public string $currentInput = '0';
    public ?string $operator = null;
    public ?float $firstOperand = null;
    public bool $waitingForSecond = false;
    public string $angleMode = 'deg';
    public string $history = '';

    public function appendNumber(string $number): void
    {
        if ($this->waitingForSecond) {
            $this->currentInput = $number;
            $this->waitingForSecond = false;
        } else {
            if ($this->currentInput === '0') {
                $this->currentInput = $number;
            } else {
                $this->currentInput .= $number;
            }
        }
        $this->display = $this->currentInput;
    }

    public function appendDecimal(): void
    {
        if (!str_contains($this->currentInput, '.')) {
            $this->currentInput .= '.';
            $this->display = $this->currentInput;
        }
    }

    public function setOperator(string $op): void
    {
        if ($this->firstOperand === null) {
            $this->firstOperand = (float)$this->currentInput;
        } elseif ($this->operator) {
            $this->calculate();
        }
        
        $this->operator = $op;
        $this->waitingForSecond = true;
        $this->history = $this->firstOperand . ' ' . $op;
    }

    public function calculate(): void
    {
        if ($this->firstOperand === null || $this->operator === null) {
            return;
        }

        $second = (float)$this->currentInput;
        $result = 0;

        switch ($this->operator) {
            case '+':
                $result = $this->firstOperand + $second;
                break;
            case '-':
                $result = $this->firstOperand - $second;
                break;
            case '*':
                $result = $this->firstOperand * $second;
                break;
            case '/':
                if ($second == 0) {
                    $this->display = 'Error';
                    $this->resetCalculator();
                    return;
                }
                $result = $this->firstOperand / $second;
                break;
            case '^':
                $result = pow($this->firstOperand, $second);
                break;
        }

        $this->display = $this->formatResult($result);
        $this->currentInput = (string)$result;
        $this->firstOperand = $result;
        $this->operator = null;
        $this->waitingForSecond = true;
        $this->history = '';
    }

    public function scientificFunction(string $func): void
    {
        $value = (float)$this->currentInput;
        $result = 0;

        switch ($func) {
            case 'sin':
                $result = $this->angleMode === 'deg' ? sin(deg2rad($value)) : sin($value);
                break;
            case 'cos':
                $result = $this->angleMode === 'deg' ? cos(deg2rad($value)) : cos($value);
                break;
            case 'tan':
                $result = $this->angleMode === 'deg' ? tan(deg2rad($value)) : tan($value);
                break;
            case 'asin':
                $result = $this->angleMode === 'deg' ? rad2deg(asin($value)) : asin($value);
                break;
            case 'acos':
                $result = $this->angleMode === 'deg' ? rad2deg(acos($value)) : acos($value);
                break;
            case 'atan':
                $result = $this->angleMode === 'deg' ? rad2deg(atan($value)) : atan($value);
                break;
            case 'log':
                $result = log10($value);
                break;
            case 'ln':
                $result = log($value);
                break;
            case 'sqrt':
                $result = sqrt($value);
                break;
            case 'square':
                $result = $value * $value;
                break;
            case 'cube':
                $result = $value * $value * $value;
                break;
            case 'factorial':
                $result = $this->factorial($value);
                break;
            case 'reciprocal':
                $result = 1 / $value;
                break;
            case 'pi':
                $result = M_PI;
                $this->currentInput = (string)$result;
                $this->display = $this->formatResult($result);
                return;
            case 'e':
                $result = M_E;
                $this->currentInput = (string)$result;
                $this->display = $this->formatResult($result);
                return;
        }

        $this->currentInput = (string)$result;
        $this->display = $this->formatResult($result);
    }

    private function factorial(float $n): float
    {
        if ($n < 0 || floor($n) != $n) return NAN;
        if ($n == 0) return 1;
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    public function clear(): void
    {
        $this->display = '0';
        $this->currentInput = '0';
        $this->firstOperand = null;
        $this->operator = null;
        $this->waitingForSecond = false;
        $this->history = '';
    }

    public function clearEntry(): void
    {
        $this->currentInput = '0';
        $this->display = '0';
    }

    public function backspace(): void
    {
        if (strlen($this->currentInput) > 1) {
            $this->currentInput = substr($this->currentInput, 0, -1);
        } else {
            $this->currentInput = '0';
        }
        $this->display = $this->currentInput;
    }

    public function toggleSign(): void
    {
        $value = (float)$this->currentInput;
        $this->currentInput = (string)($value * -1);
        $this->display = $this->currentInput;
    }

    public function percent(): void
    {
        $value = (float)$this->currentInput;
        $this->currentInput = (string)($value / 100);
        $this->display = $this->currentInput;
    }

    public function memoryClear(): void
    {
        $this->memory = '0';
    }

    public function memoryRecall(): void
    {
        $this->currentInput = $this->memory;
        $this->display = $this->currentInput;
    }

    public function memoryAdd(): void
    {
        $this->memory = (string)((float)$this->memory + (float)$this->currentInput);
    }

    public function memorySubtract(): void
    {
        $this->memory = (string)((float)$this->memory - (float)$this->currentInput);
    }

    public function memoryStore(): void
    {
        $this->memory = $this->currentInput;
    }

    public function toggleAngleMode(): void
    {
        $this->angleMode = $this->angleMode === 'deg' ? 'rad' : 'deg';
    }

    private function formatResult(float $value): string
    {
        if (is_nan($value) || is_infinite($value)) {
            return 'Error';
        }
        
        // Check if it's an integer
        if (floor($value) == $value) {
            return (string)floor($value);
        }
        
        // Limit decimal places
        return rtrim(rtrim(number_format($value, 10, '.', ''), '0'), '.');
    }

    private function resetCalculator(): void
    {
        $this->firstOperand = null;
        $this->operator = null;
        $this->waitingForSecond = false;
    }

    public function render()
    {
        return view('livewire.scientific-calculator');
    }
}
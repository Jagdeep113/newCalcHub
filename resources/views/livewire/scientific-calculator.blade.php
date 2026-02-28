<div>
    <div class="calculator-scientific">
        <!-- Display -->
        <div class="bg-dark text-white p-4 rounded-3 mb-3">
            <div class="text-muted small text-end mb-2">
                {{ $history }}
                @if($angleMode === 'deg') <span class="badge bg-info">DEG</span> @endif
                @if($angleMode === 'rad') <span class="badge bg-warning">RAD</span> @endif
            </div>
            <div class="text-end display-6">{{ $display }}</div>
        </div>

        <!-- Memory Buttons -->
        <div class="row g-2 mb-2">
            <div class="col">
                <button class="btn btn-outline-secondary w-100" wire:click="memoryClear">MC</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary w-100" wire:click="memoryRecall">MR</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary w-100" wire:click="memoryAdd">M+</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary w-100" wire:click="memorySubtract">M-</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary w-100" wire:click="memoryStore">MS</button>
            </div>
        </div>

        <!-- Scientific Functions Row 1 -->
        <div class="row g-2 mb-2">
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('sin')">sin</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('cos')">cos</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('tan')">tan</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('log')">log</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('ln')">ln</button>
            </div>
        </div>

        <!-- Scientific Functions Row 2 -->
        <div class="row g-2 mb-2">
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('asin')">sin⁻¹</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('acos')">cos⁻¹</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('atan')">tan⁻¹</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('sqrt')">√</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('factorial')">x!</button>
            </div>
        </div>

        <!-- Scientific Functions Row 3 -->
        <div class="row g-2 mb-2">
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('square')">x²</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('cube')">x³</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('pi')">π</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('e')">e</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100" wire:click="scientificFunction('reciprocal')">1/x</button>
            </div>
        </div>

        <!-- Main Keypad -->
        <div class="row g-2">
            <div class="col-3">
                <button class="btn btn-danger w-100" wire:click="clear">C</button>
            </div>
            <div class="col-3">
                <button class="btn btn-warning w-100" wire:click="clearEntry">CE</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="backspace">⌫</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="setOperator('/')">÷</button>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('7')">7</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('8')">8</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('9')">9</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="setOperator('*')">×</button>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('4')">4</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('5')">5</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('6')">6</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="setOperator('-')">−</button>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('1')">1</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('2')">2</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendNumber('3')">3</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="setOperator('+')">+</button>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-6">
                <button class="btn btn-light w-100" wire:click="appendNumber('0')">0</button>
            </div>
            <div class="col-3">
                <button class="btn btn-light w-100" wire:click="appendDecimal">.</button>
            </div>
            <div class="col-3">
                <button class="btn btn-primary w-100" wire:click="calculate">=</button>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-4">
                <button class="btn btn-outline-info w-100" wire:click="toggleSign">±</button>
            </div>
            <div class="col-4">
                <button class="btn btn-outline-info w-100" wire:click="percent">%</button>
            </div>
            <div class="col-4">
                <button class="btn btn-outline-info w-100" wire:click="toggleAngleMode">
                    {{ $angleMode === 'deg' ? 'RAD' : 'DEG' }}
                </button>
            </div>
        </div>
    </div>
</div>
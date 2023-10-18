@props([
    'minimum' => 0,
    'maximum' => false,
    'decimalPlaces' => 0,
])

<div
    x-data="{ value: @entangle($attributes->wire('model')), autonumeric: undefined }"
    x-init="
        autonumeric = new AutoNumeric($refs.number, value, {
            decimalPlaces: {{ $decimalPlaces }},
            decimalCharacter: ',',
            decimalCharacterAlternative: '.',
            digitGroupSeparator: '',
            maximumValue: '{{ $maximum ?: '1000000000000' }}',
            minimumValue: '{{ $minimum }}'
        });

        $watch('value', price => autonumeric.set(price));
    "
>
    <input
        wire:ignore
        x-ref="number"
        type="text"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    />
</div>

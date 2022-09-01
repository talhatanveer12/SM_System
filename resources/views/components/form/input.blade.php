@props(['name', 'type' => 'text', 'placeholder' => '', 'value' => '', 'error' => ''])
<div class="mb-4 mr-2 mt-2">
    <x-form.label name="{{ $name }}" />
    <input class="form-control" type="{{ $type }}"
        placeholder="Enter your {{ $placeholder }} {{ ucwords($name) }}" name="{{ $name }}"
        id='{{ $name }}' {{ $attributes(['value' => old($error != '' ? $error : $name)]) }}
        value='{{ $value }}' />
    <x-form.error name="{{ $error != '' ? $error : $name }}" />
</div>

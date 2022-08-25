@props(['name', 'type' => 'text', 'value'])
<x-particulars-form.form-body>
    <x-slot name="leftside">
        <x-particulars-form.form-input name="{{$name}}" type="{{$type}}" value="{{$value}}"/>
    </x-slot>
    <x-slot name="rightside">
        <x-particulars-form.form-input name="prefix_amount" type="number" value="{{$value}}"/>
    </x-slot>
</x-particulars-form.form-body>
{{-- //value="{{$value}}"  --}}

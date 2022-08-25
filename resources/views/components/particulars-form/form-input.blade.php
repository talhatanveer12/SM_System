@props(['name', 'type' => 'text', 'value','disable' => false])
<div>
    <input class="border border-gray-400 p-2 w-full" type="{{$type}}" value="{{$value}}" name="{{$name}}" id={{$name}}  {{$attributes(['value' => old($name)])}} @disabled($disable)/>
    <x-particulars-form.form-error name="{{$name}}"/>
</div>

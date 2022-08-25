@props(['name', 'type' => 'text', "placeholder" => '', "value" => ''])
<div class="mb-6 mr-2">
    <x-form.label name="{{$name}}"/>
    <input class="border border-gray-400 p-2 w-full" type="{{$type}}" placeholder="Enter your {{$placeholder}} {{ucwords($name)}}" name="{{$name}}" id='{{$name}}'  {{$attributes(['value' => old($name)])}} value='{{$value}}'/>
    <x-form.error name="{{$name}}"/>
</div>

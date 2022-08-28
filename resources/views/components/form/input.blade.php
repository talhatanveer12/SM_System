@props(['name', 'type' => 'text', "placeholder" => '', "value" => ''])
<div class="mb-4">
    <x-form.label name="{{$name}}" />
    <input class="form-control" type="{{$type}}" placeholder="Enter your {{$placeholder}} {{ucwords($name)}}"
        name="{{$name}}" id='{{$name}}' {{$attributes(['value' => old($name)])}} value='{{$value}}' />
    <x-form.error name="{{$name}}" />
</div>
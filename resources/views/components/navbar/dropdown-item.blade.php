@props(["active" => false])

@php
    $classes = 'block mb-2 focus:text-blue-500 hover:text-blue-500 leading-6 px-3 text-left';
    if($active) $classes .= 'text-blue-500';
@endphp
<a {{ $attributes(['class' => $classes])}}>
    {{ $slot}}</a>

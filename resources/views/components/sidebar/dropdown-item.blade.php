@props(["active" => false])

@php
    $classes = 'block text-left px-3 leading-6 py-1  hover:text-blue-500  focus:text-blue-500 text-xs';
    if($active) $classes .= 'text-blue-500';
@endphp
<a {{ $attributes(['class' => $classes])}}>
    {{ $slot}}</a>

@props(["active" => false])

@php
    $classes = 'block text-left px-3 leading-6 py-1 text-decoration-none text-black text-xs';
    if($active) $classes .= 'text-blue-500';
@endphp
<a {{ $attributes(['class' => $classes])}}>
    {{ $slot}}</a>

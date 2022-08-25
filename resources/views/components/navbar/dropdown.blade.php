@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">

    <div @click="show =! show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="absolute w-full bg-white py-3 mt-2 shadow-md rounded z-50 overflow-auto max-h-56" style="display: none">
        {{ $slot }}
    </div>
</div>

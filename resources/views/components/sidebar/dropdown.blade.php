@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative " >

    <div @click="show =! show" >
        {{ $trigger }}
    </div>

    <div x-show="show" class="overflow-auto pl-2 w-full z-50" style="display: none">
        <div>
        {{ $slot }}
        </div>
    </div>
</div>

@props(['name'])
@error($name)
    <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
@enderror

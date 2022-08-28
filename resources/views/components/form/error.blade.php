@props(['name'])
@error($name)
<p class="mt-1 text-danger text-xs">{{ $message }}</p>
@enderror
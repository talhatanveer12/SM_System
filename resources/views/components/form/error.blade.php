@props(['name'])
@error($name)
    <p class="mt-1 text-danger">{{ $message }}</p>
@enderror

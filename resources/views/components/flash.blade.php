@if (session()->has('success'))
    <div class="bg-blue-500 px-1.5 fixed rounded bottom-1 right-1 m-0 py-2.5" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)" x-show="show">
        <p>{{ session('success') }}</p>
    </div>
@endif

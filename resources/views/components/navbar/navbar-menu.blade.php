<nav class="flex justify-between items-center">
    <div class="flex">
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
        {{-- <button class="ml-8"><i class="fa-solid fa-bars"></i></button> --}}

    </div>

    <div class="mt-0 flex items-center">

        <div class="flex items-center">
            <x-navbar.dropdown>
                <x-slot name="trigger">
                    <button class=" flex items-center font-bold m-2 text-base text-left w-full">
                        <img src="/images/profile.png" width="60" height="60" style="border-radius: 50%" />
                        <p class="">{{ auth()->user()->name }}</p>
                    </button>
                </x-slot>
                <x-navbar.dropdown-item href="#">
                    <i class="fa-solid fa-user"></i>
                    <span class="pl-2">Profile</span>
                </x-navbar.dropdown-item>
                <x-navbar.dropdown-item href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span class="pl-2">Account Settings</span>

                </x-navbar.dropdown-item>
                {{-- <x-navbar.dropdown-item href="/logout">
                    <i class="fa-solid fa-lock"></i>
                    <span class="pl-2">Logout</span>
                </x-navbar.dropdown-item> --}}
                <x-navbar.dropdown-item href="#" x-date="{}"
                    @click.pervent="document.querySelector('#form_id').submit()">
                    <i class="fa-solid fa-lock"></i>
                    <span class="pl-2">Logout</span>
                </x-navbar.dropdown-item>
                <form id="form_id" method="POST" action="/logout" class="display: none">
                    @csrf
                </form>
            </x-navbar.dropdown>
        </div>

    </div>
</nav>

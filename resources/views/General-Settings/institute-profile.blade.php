<x-layout.layout>
    <div class="border-l-2 col-span-6 lg:col-span-6 sm:col-span-3">
        <section class="px-6 py-8">
            <div class="bg-blue-200  grid gap-1 grid-cols-8 border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                <div class="col-span-5">
                    <h1>Update Institute Logo Here</h1>
                    <form method="POST" action="/updatelogo/{{ $Institute->id }}" enctype="multipart/form-data">
                        @csrf
                        <x-form.input name="logo" type="file" />
                        <x-form.button>Update</x-form.button>
                    </form>
                </div>
                <div class="col-span-3">
                    <img src={{ '/storage/' . $Institute->logo }} width="100%" height="100%" />
                </div>
            </div>
        </section>
        <section class="px-6 py-8">
            <div class="bg-blue-200  flex border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                <div class="w-full">
                    <h1>Update Institute Info Here</h1>
                    <form method="POST" action="/update/{{ $Institute->id }}">
                        @csrf
                        <x-form.input name="name" value='{{ $Institute->name }}' />
                        <x-form.input name="email" type="email" value='{{ $Institute->email }}' />
                        <x-form.input name="phone" type="number" value='{{ $Institute->phone }}' />
                        <x-form.input name="website" type="url" value='{{ $Institute->website }}' />
                        <x-form.input name="address" type="text" value='{{ $Institute->address }}' />
                        <x-form.button>Update</x-form.button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="col-span-4 lg:col-start-9 md:col-start-3">
        <section class="px-6 py-8">
            <div class="bg-blue-200  flex flex-col items-center border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                <img src={{ '/storage/' . $Institute->logo }} width="50%" height="50%" />
                <h1>{{ $Institute->name }}</h1>
                <span class="border border-b-0 mt-2 mb-2 w-full"></span>
                <div class="flex items-center">
                    <i class="fa-solid fa-envelope"></i>
                    <p class="pl-3">{{ $Institute->email }}</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-brands fa-internet-explorer"></i>
                    <p class="pl-3">{{ $Institute->website ?? 'www.institute.com' }}</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-phone"></i>
                    <p class="pl-3">{{ $Institute->phone ?? '0300-0000-000' }}</p>
                </div>
                <span class="border border-b-0 mt-2 mb-2 w-full"></span>
                <i class="fa-solid fa-location-dot"></i>
                <p>{{ $Institute->address ?? 'Johar Town lahore, pakistan' }}</p>
            </div>
        </section>
    </div>
</x-layout.layout>

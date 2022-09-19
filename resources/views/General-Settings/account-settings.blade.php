<x-layout.layout>
    <main class="col grid grid-cols-12 ps-md-2 pt-2">
        <div class=" col-span-12 col-span-4 lg:col-span-5 lg:col-start-5 md:col-span-6 md:col-start-4 sm:col-span-12 ">
            <div class="bg-gray-200 border hover:shadow-2xl rounded-2xl shadow-md">
                <section class="px-6 py-8 ">
                    <h1 class="text-2xl text-center">Update Login Details</h1>
                    @if (session()->has('error'))
                        <h1 class="text-xl text-center text-red-600">{{ session('error') }}</h1>
                    @endif
                    <div class="px-6 py-8">
                        <form action="/changepassword" method="POST">
                            @csrf

                            <x-form.input name="email" type="email" />
                            <x-form.input name="old Password" type="password" />
                            <x-form.input name="new Password" type="password" />
                            <x-form.button>Update</x-form.button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
</x-layout.layout>

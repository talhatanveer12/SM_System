<x-layout.layout>
    <div class="bg-blue-200 border col-span-4 col-start-5 hover:shadow-2xl rounded-2xl shadow-md">
        <section class="px-6 py-8 ">
            <h1 class="text-2xl text-center">Update Login Details</h1>
            @if (session()->has('error'))
                <h1 class="text-xl text-center text-red-600">{{ session('error') }}</h1>
            @endif
            <div class="px-6 py-8">
                <form action="/changepassword" method="POST">
                    @csrf

                    <x-form.input name="email" type="email" />
                    <x-form.input name="old_Password" type="password" placeholder="Old" />
                    <x-form.input name="new_Password" type="password" placeholder="New" />
                    <x-form.button>Update</x-form.button>
                </form>
            </div>
        </section>
    </div>
</x-layout.layout>

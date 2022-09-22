<x-layout.layout>
    <main class="col grid grid-cols-12 ps-md-2 pt-2">
        <div class=" col-span-12">
            <div class=" flex flex-wrap ">
                @if ($Classes)
                    @foreach ($Classes as $classes)
                        <div class="px-6 py-4 m-4 bg-gray-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                            <span>{{ $classes->class_name }}</span>
                            <div class="flex justify-between items-center text-4xl my-2">
                                <span>{{ count($classes->students) }}</span>
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span>Student</span>
                                <div>
                                    <a class="bg-red-400 p-1 text-decoration-none text-white"
                                        href="/delete/{{ $classes->id }}">Delete</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </main>
</x-layout.layout>

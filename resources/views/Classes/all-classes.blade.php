<x-layout.layout>
    <main class="col grid grid-cols-12 ps-md-2 pt-2">
        <div class=" col-span-12">
            <div class=" flex flex-wrap ">
                @if ($Classes)
                    @foreach ($Classes as $classes)
                        <a href="/course/assign-courses?class_id={{$classes->id}}">
                            <div class="px-6 py-4 m-4 bg-gray-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                                <span>{{ $classes->class_name }}</span>
                                <div class="flex justify-between items-center text-4xl my-2">
                                    <span>{{ count($classes->students) }}</span>
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span>Student</span>
                                    {{-- <span class="text-sm">Left 40</span> --}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                <button onclick="jQuery('#exampleModal').modal('show');">
                    <div
                        class="px-6 pt-10 pb-10 m-4 bg-gray-200 text-center w-64 rounded-2xl shadow-md hover:shadow-2xl ">

                        <i class="fa-plus fa-solid text-4xl"></i>
                        <p class="text-2xl">Add Class</p>

                    </div>
                </button>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Create New Class</h4>
                </div>

                <div class="modal-body">
                    <form action="/api/add-class" method="POST">
                        @csrf

                        <x-form.input name="class name" />
                        <x-form.button>Save</x-form.button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/api/add-class" method="POST">
                        @csrf

                        <x-form.input name="class_name" />
                        <x-form.button>Save</x-form.button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>

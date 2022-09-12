<x-layout.layout>
    <main class="col grid grid-cols-12 ps-md-2 pt-2">
        <div class=" col-span-12">
            <div class=" flex flex-wrap ">
                @foreach ($Classes as $classes)
                    <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                        <span>{{ $classes->class_name }}</span>
                        <div class="flex justify-between items-center text-4xl my-2">
                            <span>{{count($classes->students)}}</span>
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Student</span>
                            <div>
                                {{-- <a  class="bg-blue-600 p-1 text-decoration-none text-white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" >Edit</a> --}}
                                <a class="bg-red-600 p-1 text-decoration-none text-white"
                                    href="/delete/{{ $classes->id }}">Delete</a>
                            </div>
                            {{-- <span class="text-sm">Left 40</span> --}}
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/add-class" method="POST">
                                        @csrf

                                        <x-form.input name="class_name" value="{{ $classes->class_name }}" />
                                        <x-form.button>Save</x-form.button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="dialog" title="Update Class" style="display: none">
                    <form action="/update-class/{{ $classes->id }}" method="POST">
                        @csrf

                        <x-form.input name="class_name" />
                        <x-form.button>Save</x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/add-class" method="POST">
                        @csrf

                        <x-form.input name="class_name" />
                        <x-form.button>Save</x-form.button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div> --}}
    <script>
        $(function() {
            $("#button").on("click", function() {
                $("#dialog").dialog();
            });

        });
    </script>
</x-layout.layout>

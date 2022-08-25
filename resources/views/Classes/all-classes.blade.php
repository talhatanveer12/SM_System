<x-layout.bootstrap-layout>
    <div class=" col-span-10">
        <div class=" flex flex-wrap ">
            @foreach ($Classes as $classes)
                <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                    <span>{{ $classes->class_name }}</span>
                    <div class="flex justify-between items-center text-4xl my-2">
                        <span>0</span>
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span>Student</span>
                        {{-- <span class="text-sm">Left 40</span> --}}
                    </div>
                </div>
            @endforeach
            <div id="dialog" title="Create New Class" style="display: none">
                <form action="/add-class" method="POST">
                    @csrf

                    <x-form.input name="class_name" />
                    <x-form.button>Save</x-form.button>
                </form>
            </div>
            <div class="px-6 pt-10 pb-10 m-4 bg-blue-200 text-center w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                <button type="button" id="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-plus fa-solid text-4xl"></i>
                    <p class="text-2xl">Add Class</p>
                </button>
            </div>
        </div>
    </div>

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
</x-layout.bootstrap-layout>

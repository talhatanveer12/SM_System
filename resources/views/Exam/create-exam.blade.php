<x-layout.layout>
    <div class="col">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Add Exam</div>
                    <form action="/add-exam" method="POST">
                        @csrf

                        <x-form.input name="exam name" />
                        <x-form.label name="Starting Date" />
                        <input class="form-control mb-4" type="date" name="starting_date" />
                        <x-form.label name="Ending Date" />
                        <input class="form-control mb-4" type="date" name="ending_date" />
                        <x-form.button>Save</x-form.button>
                    </form>
                </div>
            </div>
            <div class="col-md-8 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Exam List</div>
                    @if ($Exams)

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Exam Name</th>
                                    <th scope="col">Starting Date</th>
                                    <th scope="col">Ending Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Exams as $Exam)
                                    <tr>
                                        <td>{{$Exam->exam_name}}</td>
                                        <td>{{$Exam->starting_date}}</td>
                                        <td>{{$Exam->ending_date}}</td>
                                        <td>
                                            <a href="#" class="mr-2 text-black text-decoration-none">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="#" class="mr-2 text-black text-decoration-none">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- <main class="col grid grid-cols-12 ps-md-2 pt-2">
        <div class=" col-span-12">
            <div class=" flex flex-wrap ">
                @if ($Exams)
                    @foreach ($Exams as $Exam)
                        <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                            <span>{{ $Exam->exam_name }}</span>
                            <div class="flex justify-between items-center text-4xl my-2">
                                <span>0</span>
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span>Student</span>
                                {{-- <span class="text-sm">Left 40</span> --}}
                            {{-- </div>
                        </div>
                    @endforeach
                @endif
                <div class="px-6 pt-10 pb-10 m-4 bg-blue-200 text-center w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-plus fa-solid text-4xl"></i>
                        <p class="text-2xl">Add Exam</p>
                    </button>
                </div>
            </div>
        </div>
    </main> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Exam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/add-exam" method="POST">
                        @csrf

                        <x-form.input name="exam name" />
                        <x-form.label name="Starting Date" />
                        <input class="form-control mb-4" type="date" name="starting_date" />
                        <x-form.label name="Ending Date" />
                        <input class="form-control mb-4" type="date" name="ending_date" />
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

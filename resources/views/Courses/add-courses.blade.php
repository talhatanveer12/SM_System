<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Add Course</div>
                    <form method="POST" action="/save-course">
                        @csrf
                        <x-form.input name="course name" value="" />
                        <div class="input-group mb-6 ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_type" id="inlineRadio1"
                                    value="Theory" checked>
                                <label class="form-check-label" for="inlineRadio1">Theory</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_type" id="inlineRadio2"
                                    value="Practical">
                                <label class="form-check-label" for="inlineRadio2">Practical</label>
                            </div>
                        </div>
                        <x-form.input name="course code" type="number" />

                        <button type="submit" class="btn btn-primary ">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Course List</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Course</th>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($Courses as $course)
                                    <tr>
                                        <th>{{ $course->course_name }}</th>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_type }}</td>
                                        <td>
                                            <a href="edit-course/{{$course->id}}" class="mr-2 text-black text-decoration-none">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="delete-course/{{$course->id}}" class="mr-2 text-black text-decoration-none">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.bootstrap-layout>

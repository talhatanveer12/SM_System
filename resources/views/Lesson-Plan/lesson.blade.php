<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Add Lesson</div>
                    <form method="POST" action="/save-lesson">
                        @csrf

                        <x-form.label name="Class" /><br>
                        <select class="form-select mb-4" aria-label="Default select example" name="class id"
                            id="class_id">
                            @foreach ($Classes as $Class)
                                <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                            @endforeach
                        </select>

                        <x-form.label name="Course" /><br>
                        <select class="form-select mb-4" aria-label="Default select example" name="course id"
                            id="course_id">
                            <option value="">Select Course</option>
                        </select>

                        <x-form.input name="lesson name" error="lesson_name" />


                        {{-- @foreach ($Courses as $course)
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="course id[]" id="course id"
                                    value="{{ $course->id }}">
                                <label class="form-check-label" for="course id">{{ $course->course_name }}</label>
                            </div>
                        @endforeach --}}
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Lesson List</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Class Name</th>
                                    <th scope="col">Courses Name</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($assignData as $AssignData => $value) --}}
                                <tr>
                                    <td>Class 1</td>
                                    <td>English</td>
                                    {{-- <th>{{ $AssignData }}</th> --}}
                                    <td>
                                        <table>
                                            <tbody>
                                                {{-- @foreach ($value as $key => $data) --}}
                                                <tr>
                                                    <td>Chapter 1</td>

                                                    {{-- <td>{{ $data }}</td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Chapter 2</td>

                                                    {{-- <td>{{ $data }}</td> --}}
                                                </tr>
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <a href="#" class="mr-2 text-black text-decoration-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 text-black text-decoration-none">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#class_id').change(function() {
                let id = $(this).val();
                $('select[name="course_id"]').empty();
                console.log(id);

                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var r =  this.responseText;
                    $('#course_id').html(r);
                    console.log(r);
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                }
                xmlhttp.open("GET", "/getcourse/"+id);
                xmlhttp.send();

            });
        });
    </script>


</x-layout.bootstrap-layout>
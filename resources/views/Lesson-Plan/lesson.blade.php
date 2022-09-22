<x-layout.layout>
    <div class="col">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Add Lesson</div>
                    <form method="POST" action="/save-lesson">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Course</label>
                            <div>
                                <select class="select2" data-allow-clear="true" data-placeholder="Select one Course..."
                                    name="course id" id="course_id">
                                    <option></option>
                                    <optgroup label="Course name">
                                        @foreach ($Courses as $Course)
                                            <option value="{{ $Course->id }}">{{ $Course->course_name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <x-form.error name="course_id" />
                        </div>

                        {{-- <div class="form-group">
                            <label class="control-label">Course</label>
                            <div>
                                <select class="select2" aria-label="Default select example" data-allow-clear="true"
                                    data-placeholder="Select one class..." name="course id" id="course_id">
                                    <option></option>
                                    <optgroup label="Course name">
                                        <option value="">Select Course</option>
                                    </optgroup>
                                </select>
                            </div>
                            <x-form.error name="course_id" />
                        </div> --}}
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
                    @if ($Lesson_detail)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Courses Name</th>
                                        <th scope="col">Lesson Name</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Lesson_detail as $key => $value)
                                        @if (count($value->lessons))
                                            <tr>
                                                <td>{{ $value->course_name }}</td>
                                                <td>
                                                    <table>
                                                        <tbody>
                                                            @foreach ($value->lessons as $lesson_key => $lesson_name)
                                                                <tr>
                                                                    <td>{{ $lesson_name->lesson_name }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                {{-- <td>
                                                    <a href="#" class="mr-2 text-black text-decoration-none">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" class="mr-2 text-black text-decoration-none">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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
                    var html_body = this.responseText;
                    $('#course_id').html(html_body);
                    console.log(html_body);
                }
                xmlhttp.open("GET", "/getcourse/" + id);
                xmlhttp.send();

            });
        });
    </script>


</x-layout.layout>

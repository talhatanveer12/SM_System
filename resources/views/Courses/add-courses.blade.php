<x-layout.layout>
    <div class="col">
        <div class="row">
            <form method="POST" action="/api/save-course">
                @csrf
                <input type="hidden" value='{{ request('course_id') }}' name='course_id'>
                <div class="col-md-12">
                    <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">
                        <div class="panel-heading backgroundColor">
                            <div class="panel-title">
                                Select Criteria
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i
                                        class="entypo-down-open backgroundColor"></i></a>
                            </div>
                        </div>
                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-md-3">
                                    <x-form.input name="course name"
                                        value="{{ $UpdateCourse ? $UpdateCourse->course_name : '' }}" />
                                </div>
                                <div class="col-md-3 mt-2 flex mt-12">

                                    <div class="form-check mr-16">
                                        <input class="form-check-input" type="radio" name="course_type"
                                            id="inlineRadio1" value="Theory"
                                            {{ $UpdateCourse ? ($UpdateCourse->course_type == 'Theory' ? 'checked' : '') : 'checked' }}>
                                        <label class="form-check-label" for="inlineRadio1">Theory</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="course_type"
                                            id="inlineRadio2" value="Practical"
                                            {{ $UpdateCourse ? ($UpdateCourse->course_type == 'Practical' ? 'checked' : '') : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Practical</label>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <x-form.input name="course code" type="number"
                                        value="{{ $UpdateCourse ? $UpdateCourse->course_code : '' }}" />
                                </div>
                                <div class="mt-12">
                                    <button type="submit"
                                        class="btn btn-primary ">{{ $UpdateCourse ? 'Update' : 'Add' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Add Course</div>
                    <form method="POST" action="/api/save-course">
                        @csrf
                        <input type="hidden" value='{{ request('course_id') }}' name='course_id'>
                        <x-form.input name="course name"
                            value="{{ $UpdateCourse ? $UpdateCourse->course_name : '' }}" />
                        <div class="input-group mb-6 ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_type" id="inlineRadio1"
                                    value="Theory"
                                    {{ $UpdateCourse ? ($UpdateCourse->course_type == 'Theory' ? 'checked' : '') : 'checked' }}>
                                <label class="form-check-label" for="inlineRadio1">Theory</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_type" id="inlineRadio2"
                                    value="Practical"
                                    {{ $UpdateCourse ? ($UpdateCourse->course_type == 'Practical' ? 'checked' : '') : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Practical</label>
                            </div>
                        </div>
                        <x-form.input name="course code" type="number"
                            value="{{ $UpdateCourse ? $UpdateCourse->course_code : '' }}" />

                        <button type="submit" class="btn btn-primary ">{{ $UpdateCourse ? 'Update' : 'Add' }}</button>
                    </form>
                </div>
            </div> --}}
            <script type="text/javascript">
                jQuery(window).load(function() {
                    var $table2 = jQuery("#table-2");

                    // Initialize DataTable
                    $table2.DataTable({
                        "sDom": "tip",
                        "bStateSave": false,
                        "iDisplayLength": 8,
                        "aoColumns": [
                            null,
                            null,
                            null,
                            null
                        ],
                        "bStateSave": true
                    });
                });
            </script>

            <div class="col-md-12 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Lesson List</div>
                    <table class="table table-bordered table-striped datatable" id="table-2">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Course Code</th>
                                <th>Course Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Courses as $key => $course)
                                <tr>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->course_code }}</td>
                                    <td>{{ $course->course_type }}</td>
                                    <td>
                                        <div class="flex">
                                            <form action="#" method="GET">
                                                <input type="hidden" name='course_id' value="{{ $course->id }}">
                                                <button class="mr-2 text-black text-decoration-none">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <a href="/delete-course/{{ $course->id }}"
                                                    class="mr-2 text-black text-decoration-none"
                                                    onclick="return confirm('Are you sure you want to delete this Course?');">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <link rel="stylesheet" href="/assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="/assets/js/datatables/datatables.js"></script>
    <script src="/assets/js/select2/select2.min.js"></script>
    <script src="/assets/js/neon-chat.js"></script>


</x-layout.layout>

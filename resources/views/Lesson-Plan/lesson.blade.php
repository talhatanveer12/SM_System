<x-layout.layout>
    <div class="col">
        <div class="row">
            <form method="POST" action="/save-lesson">
                @csrf
                <input type="hidden" value="{{ request('lesson_id') }}" name='lesson_id'>
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
                                    @if (!$Lesson)
                                        <div class="form-group">
                                            <label class="control-label">Course</label>
                                            <div>
                                                <select class="select2" data-allow-clear="true"
                                                    data-placeholder="Select one Course..." name="course id"
                                                    id="course_id">
                                                    <option></option>
                                                    <optgroup label="Course name">
                                                        @foreach ($Courses as $Course)
                                                            <option value="{{ $Course->id }}">
                                                                {{ $Course->course_name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <x-form.error name="course_id" />
                                        </div>
                                    @else
                                        <input type="hidden" value="{{ $Lesson->courses->id }}" name='course_id'>
                                        <x-form.label name="Course name" />
                                        <input class="form-control" type="text" name="course name" id='course_name'
                                            value='{{ $Lesson->courses->course_name }}' style="height: 42px;"
                                            disabled />
                                        <x-form.error name="course_name" />
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-4 mr-2">
                                        <x-form.label name="lesson name" />
                                        <input class="form-control" type="text" name="lesson name" id='lesson_name'
                                            value='{{ $Lesson ? $Lesson->lesson_name : request('lesson_name') }}'
                                            style="height: 42px;" />
                                        <x-form.error name="lesson_name" />
                                    </div>

                                </div>
                                <button type="submit"
                                    class="btn btn-primary mt-11">{{ $Lesson ? 'Update' : 'Add' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- <div class="col-md-4 p-2">
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
                        <x-form.input name="lesson name" error="lesson_name" />
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
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
                            null
                        ],
                        "bStateSave": true
                    });
                });
            </script>
            <div class="col-md-12 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Lesson List</div>
                    @if ($Lesson_detail)
                        <table class="table table-bordered table-striped datatable" id="table-2">
                            <thead>
                                <tr>
                                    <th scope="col">Courses Name</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Lesson_detail as $key => $value)
                                    @if (count($value->lessons))
                                        @foreach ($value->lessons as $lesson_key => $lesson_name)
                                            <tr>
                                                <td>{{ $value->course_name }}</td>
                                                <td>{{ $lesson_name->lesson_name }}</td>
                                                <td>
                                                    <form action="#" method="GET">
                                                        <input type="hidden" name='lesson_id'
                                                            value="{{ $lesson_name->id }}">
                                                        <button class="mr-2 text-black text-decoration-none">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <a href="/delete-lesson/{{ $lesson_name->id }}"
                                                            class="mr-2 text-black text-decoration-none"
                                                            onclick="return confirm('Are you sure you want to delete this Lesson?');">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
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



    <link rel="stylesheet" href="/assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="/assets/js/datatables/datatables.js"></script>
    <script src="/assets/js/select2/select2.min.js"></script>
    <script src="/assets/js/neon-chat.js"></script>


</x-layout.layout>

<x-layout.layout>
    <div class="col">
        <div class="row">
            <form method="POST" action="/save-topic">
                @csrf

                <input type="hidden" name="topic_id" value='{{request('topic_id')}}'>
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
                                    @if (!$updateTopic)
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
                                        <input type="hidden" name="course id" value='{{$updateTopic->Lessons->courses->id}}'>
                                        <div class="mt-2">
                                            <x-form.label name="Course name" />
                                            <input class="form-control" type="text" name="course id" id='course_id'
                                                value='{{ $updateTopic->Lessons->courses->course_name }}' disabled />
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if (!$updateTopic)
                                        <div class="form-group">
                                            <label class="control-label">Lesson</label>
                                            <div>
                                                <select class="select2" aria-label="Default select example"
                                                    data-allow-clear="true" data-placeholder="Select one lesson..."
                                                    name="lesson id" id="lesson_id">
                                                    <option></option>
                                                    <optgroup label="Lesson name">
                                                        <option value="">Select Lesson</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <x-form.error name="lesson_id" />
                                        </div>
                                    @else
                                        <div class="mt-2">
                                             <input type="hidden" name="lesson id" value='{{$updateTopic->Lessons->id}}'>
                                            <x-form.label name="Lesson name" />
                                            <input class="form-control" type="text" name="course id" id='course_id'
                                                value='{{ $updateTopic->Lessons->lesson_name }}' disabled />
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-3">
                                    <div class="mt-2">
                                            <x-form.label name="Topic name" />
                                            <input class="form-control" type="text" name="topic name" id='topic_name'
                                                value='{{$updateTopic ? $updateTopic->topic_name : ''}}' />
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-11">{{$updateTopic  ?'Update':'Add'}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Topic List</div>
                    @if ($topic_detail)
                        <div class="table-responsive">
                             <table class="table table-bordered table-striped datatable" id="table-2">
                                <thead>
                                    <tr>
                                        <th scope="col">Topic Name</th>
                                        <th scope="col">Lesson Name</th>
                                        <th scope="col">Courses Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topic_detail as $key => $value)
                                        <tr>
                                            <td>{{ $value->topic_name }}</td>
                                            <td>{{ $value->Lessons->lesson_name }}</td>
                                            <td>{{ $value->Lessons->courses->course_name }}</td>



                                            <td>
                                                <form action="#" method="GET">
                                                    <input type="hidden" name='topic_id' value="{{ $value->id }}">
                                                    <button class="mr-2 text-black text-decoration-none">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <a href="/delete-topic/{{ $value->id }}"
                                                        class="mr-2 text-black text-decoration-none"
                                                        onclick="return confirm('Are you sure you want to delete this Lesson?');">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- @endforeach --}}
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
        var class_id;
        $(document).ready(function() {
            $('#class_id').change(function() {
                let id = $(this).val();
                class_id = id;
                $('select[name="course_id"]').empty();
                $('select[name="lesson_id"]').empty();
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

            $('#course_id').change(function() {
                let id = $(this).val();
                //alert(id);
                $('select[name="lesson_id"]').empty();
                console.log(id);
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    console.log(this.responseText);
                    var html_body = this.responseText;
                    $('#lesson_id').html(html_body);

                }
                xmlhttp.open("GET", "/getlesson/" + id + '/' + class_id);
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

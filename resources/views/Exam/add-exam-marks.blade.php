<x-layout.layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">

                <div class="row">
                    <form action="#" method="GET">
                        <div class="col-md-12">
                            <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">
                                <div class="panel-heading backgroundColor">
                                    <div class="panel-title">
                                        Select Criteria
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i
                                                class="entypo-down-open backgroundColor"></i></a>
                                        <a href="#" data-rel="reload"><i
                                                class="entypo-arrows-ccw backgroundColor"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group w-full">
                                                <label class="control-label">Class</label>
                                                <div class>
                                                    <select class="selectboxit" data-first-option="false"
                                                        name="class id" id="class id">
                                                        <option>Select Class</option>
                                                        <optgroup label="Class name">
                                                            @foreach ($Classes as $Class)
                                                                <option value="{{ $Class->id }}"
                                                                    {{ request('class_id') == $Class->id ? 'selected' : '' }}>
                                                                    {{ $Class->class_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group w-full">
                                                <label class="control-label">Class</label>
                                                <div class>
                                                    <select class="selectboxit" data-first-option="false" name="exam id"
                                                        id="exam_id">
                                                        <option>Select Exam</option>
                                                        <optgroup label="Exam name">
                                                            @foreach ($Exams as $exam)
                                                                <option value="{{ $exam->id }}"
                                                                    {{ request('exam_id') == $exam->id ? 'selected' : '' }}>
                                                                    {{ $exam->exam_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-11">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                @if ($Students)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col">Admission No</td>
                                    <th class="col">Name</th>
                                    <th class="col">Roll No</th>
                                    <th class="col ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Students as $key => $value)
                                    <tr>
                                        <input type="hidden">
                                        <td>{{ $value->admission_no }}</td>
                                        <td>{{ $value->first_name . ' ' . $value->last_name }}</td>
                                        <td>{{ $value->roll_no }}</td>
                                        <td>
                                            <button onclick="showAjaxModal();" data-rollno={{ $value->id }}
                                                data-name='{{ $value->first_name . ' ' . $value->last_name }}'
                                                data-class_id={{ $value->class_id }}
                                                data-examid={{ request('exam_id') }} id='add_marks'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <a href="#" class="mr-2 text-black text-decoration-none">
                                                <i class="fa-solid fa-square-poll-vertical"></i>
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

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script type="text/javascript">
        function showAjaxModal() {
            $(document).on('click', '#add_marks', function() {
                console.log("Dsasda");
                var rowid = $(this).data('rollno');
                console.log(rowid);
                var name = $(this).data('name');
                console.log(name);
                var class_id = $(this).data('class_id');
                var exam_id = $(this).data('examid');
                $('#name').html(name);
                $('#roll_no').val(rowid);
                $('#exam_id1').val(exam_id);
                jQuery('#exampleModal').modal('show', {backdrop: 'static'});
               // jQuery('#exampleModal').modal('show', {backdrop: 'static'});
               // $('#exampleModal').modal('show');

                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var html_body = this.responseText;
                    console.log(html_body);
                    $('#getexam').html(html_body);
                }
                xmlhttp.open("GET", "/getexamresult/" + rowid + '/' + exam_id + '/' + class_id);
                xmlhttp.send();


            });
        }
    </script>

<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create New Class</h4>
            </div>

            <div class="modal-body">
                <div class="mb-4">
                    <span>Name : </span>
                    <b><span id='name'></span></b>
                </div>
                @if ($Courses)
                    <div class="grid gap-2 grid-cols-3 text-center">
                        <h6>Course Name</h6>
                        <h6>Total Marks</h6>
                        <h6>Ob. Marks</h6>
                        <form action="/save-exam-marks" class="col-span-3 gap-2 grid grid-cols-3" method="POST">
                            @csrf
                            <input type="hidden" id="roll_no" name="student_id">
                            <input type="hidden" id="exam_id1" name="exam_id">
                            <div id='getexam' class="col-span-3 gap-2 grid grid-cols-3"></div>
                            <button class="btn btn-primary mt-4" type="submit">Save</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="exampleffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add/Update Student Marks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <span>Name : </span>
                        <b><span id='name'></span></b>
                    </div>
                    @if ($Courses)
                        <div class="grid gap-2 grid-cols-3 text-center">
                            <h6>Course Name</h6>
                            <h6>Total Marks</h6>
                            <h6>Ob. Marks</h6>
                            <form action="/save-exam-marks" class="col-span-3 gap-2 grid grid-cols-3" method="POST">
                                @csrf
                                <input type="hidden" id="roll_no" name="student_id">
                                <input type="hidden" id="exam_id1" name="exam_id">
                                <div id='getexam' class="col-span-3 gap-2 grid grid-cols-3"></div>
                                <button class="btn btn-primary mt-4" type="submit">Save</button>
                            </form>
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>

<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="" method="GET">
                        <div class='flex'>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Class" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="class_id"
                                    id="Class">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($Classes as $Class)
                                        <option value="{{ $Class->id }}"
                                            {{ request('class_id') == $Class->id ? 'selected' : '' }}>
                                            {{ $Class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Exam" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="exam_id"
                                    id="exam_id">
                                    <option value="" selected>Select Exam</option>
                                    @foreach ($Exams as $exam)
                                        <option value="{{ $exam->id }}"
                                            {{ request('exam_id') == $exam->id ? 'selected' : '' }}>
                                            {{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
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
                                            <button data-rollno={{ $value->id }}
                                                data-name='{{ $value->first_name . ' ' . $value->last_name }}'
                                                data-class_id={{ $value->class_id }}
                                                data-examid={{ request('exam_id') }} id="add_marks"
                                                class="mr-2 text-black text-decoration-none">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#add_marks', function() {
                console.log("Dsasda");
                var rowid = $(this).data('rollno');
                var name = $(this).data('name');
                var class_id = $(this).data('class_id');
                var exam_id = $(this).data('examid');
                $('#name').html(name);
                $('#roll_no').val(rowid);
                $('#exam_id1').val(exam_id);
                $('#exampleModal').modal('show');

                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var html_body = this.responseText;
                    console.log(html_body);
                    $('#getexam').html(html_body);
                }
                xmlhttp.open("GET", "/getexamresult/" + rowid + '/' + exam_id + '/' + class_id);
                xmlhttp.send();


            });
        });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                {{-- @foreach ($Courses as $course)
                                    <input class="form-control" type="hidden" name="course_id[]"
                                        value={{ $course->id }} />
                                    <h6 class="mt-3">{{ $course->course_name }}</h6>
                                    <input class="form-control" type="number" name="total marks[]" />
                                    <input class="form-control" type="number" name="obtain marks[]" />
                                @endforeach --}}


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
</x-layout.bootstrap-layout>

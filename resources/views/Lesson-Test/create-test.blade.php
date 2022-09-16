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
                                        @can('admin')


                                            <div class="col-md-3 mt-2">
                                                <div class="form-group w-full">
                                                    <label class="control-label">Class</label>
                                                    <div class>
                                                        <select class="select2" aria-label="Default select example"
                                                            data-allow-clear="true" data-placeholder="Select one Class..."
                                                            name="class id" id="class_id">
                                                            <option></option>
                                                            <optgroup label="Class name">
                                                                @foreach ($Classes as $Class)
                                                                    <option value="{{ $Class->id }}">
                                                                        {{ $Class->class_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <div class="form-group">
                                                    <label class="control-label">Course</label>
                                                    <div>
                                                        <select class="select2" aria-label="Default select example"
                                                            data-allow-clear="true" data-placeholder="Select one Course..."
                                                            name="course id" id="course_id">
                                                            <option></option>
                                                            <optgroup label="Course name">
                                                                <option value="">Select Course</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <x-form.error name="course_id" />
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <div class="form-group w-full">
                                                    <label class="control-label">Lesson</label>
                                                    <div class>
                                                        <select class="select2" aria-label="Default select example"
                                                            data-allow-clear="true" data-placeholder="Select one Lesson..."
                                                            name="lesson id" id="lesson_id">
                                                            <option>Select Lesson</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-3 mt-2">
                                                <div class="form-group w-full">
                                                    <label class="control-label">Lesson</label>
                                                    <div class>
                                                        <select class="selectboxit" aria-label="Default select example"
                                                            data-allow-clear="true" data-placeholder="Select one Lesson..."
                                                            name="lesson id" id="lesson_id">
                                                            <option value=''>Select Lesson</option>
                                                            @if ($Lesson)
                                                                @foreach ($Lesson as $key => $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->lesson_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                        <button type="submit" class="btn btn-primary mt-11">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>



                {{-- <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Class" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="class_id"
                                    id="class_id">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($Classes as $Class)
                                        <option value="{{ $Class->id }}"
                                            {{ request('class_id') == $Class->id ? 'selected' : '' }}>
                                            {{ $Class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class=" mr-2 mt-2">
                                <x-form.label name="Course" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example"
                                    name="course_id" id="course_id">
                                    <option value="" selected>Select Course</option>
                                </select>
                            </div>

                            <div class=" mr-2 mt-2">
                                <x-form.label name="Lesson" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example"
                                    name="lesson_id" id="lesson_id">
                                    <option value="" selected>Select Lesson</option>
                                </select>
                            </div>

                            <div class=" mr-2 mt-3">
                                <button type="submit" id="button_id" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                @if (request('lesson_id'))
                    <div class="px-6 py-8">
                        <h3 class="text-center">Add Question</h3>
                        <form action="/add-test" method="POST">
                            @csrf

                            <div class="col-md-3">
                                <div class="form-group w-full">
                                    <label class="control-label">Question Type</label>
                                    <div class>
                                        <select class="selectboxit" data-first-option="false" name="question_type"
                                            id="question_id">
                                            <option>Select Question Type</option>
                                            <optgroup label="Class name">
                                                <option value="mcq"
                                                    {{ request('question_id') == 'mcq' ? 'selected' : '' }}>MCQ
                                                </option>
                                                <option value="blanks"
                                                    {{ request('question_id') == 'blanks' ? 'selected' : '' }}>
                                                    Fill in the blanks</option>
                                                <option value="mco"
                                                    {{ request('question_id') == 'mco' ? 'selected' : '' }}>
                                                    multiple correct option</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                {{-- <x-form.label name="Question Type" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example"
                                    name="question_type" id="question_id">
                                    <option value="" selected>Select Question Type</option>
                                    <option value="mcq" {{ request('question_id') == 'mcq' ? 'selected' : '' }}>MCQ
                                    </option>
                                    <option value="blanks" {{ request('question_id') == 'blanks' ? 'selected' : '' }}>
                                        Fill in the blanks</option>
                                    <option value="mco" {{ request('question_id') == 'mco' ? 'selected' : '' }}>
                                        multiple correct option</option>
                                </select> --}}
                            </div>
                            <input type="hidden" id="sdsd" value="{{ request('lesson_id') }}" name="lesson_id">
                            <div class="col-md-12" id="addQuestion">


                            </div>

                            {{-- <button type="button" class="btn btn-primary mt-4 float-end" id="add">Add
                            Question</button> --}}
                        </form>
                    </div>
                @endif
                <div class="px-6 py-8">
                    @if ($Questions)
                        <h3 class="text-center">View Question</h3>
                        @foreach ($Questions as $key => $value)
                            <div id="addQuestion">
                                @foreach ($value->questions as $key1 => $value1)
                                    <h3>Question</h3>
                                    <div class="col-lg-12 px-6">
                                        <input class="form-control" name="question" id="question" type="text"
                                            placeholder="Enter Question" value="{{ $value1->question }}" disabled>
                                        @if (count($value1->options))
                                            {{-- @foreach ($value1->options as $key2 => $value2) --}}

                                            <div class="flex">
                                                <label class=" col-form-label mt-4"><span
                                                        class="text-lg"><b>A</b></span></label>
                                                <input class="form-control m-1 " name="option_A" id="question"
                                                    type="text" placeholder="Enter Option"
                                                    value="{{ $value1->options[0]->option }}" disabled>
                                                <label class=" col-form-label mt-4"><span
                                                        class="text-lg"><b>B</b></span></label>
                                                <input class="form-control m-1" name="option_B" id="question"
                                                    type="text"
                                                    placeholder="Enter Option"value="{{ $value1->options[1]->option }}"
                                                    disabled>
                                            </div>
                                            <div class="flex">
                                                <label class=" col-form-label mt-4"><span
                                                        class="text-lg"><b>C</b></span></label>
                                                <input class="form-control m-1" name="option_C" id="question"
                                                    type="text" placeholder="Enter Option"
                                                    value="{{ $value1->options[2]->option }}" disabled>
                                                <label class=" col-form-label mt-4"><span
                                                        class="text-lg"><b>D</b></span></label>
                                                <input class="form-control m-1" name="option_D" id="question"
                                                    type="text" placeholder="Enter Option"
                                                    value="{{ $value1->options[3]->option }}" disabled>
                                            </div>
                                            {{-- @endforeach --}}
                                        @endif
                                        <div>
                                            <h6>Answer : <b>{{ $value1->correct_answer }}</b></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-center">No Question Found</h4>
                    @endif
                </div>



            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // $('#button_id').click( function() {

            //     }
            //     let id = $('#course_id').val();
            //     console.log(id);
            //     $('#course_id').val('selected');
            //     $('#course_id').attr('selected', true);
            //});

            var id = 2;
            $('#add').click(function() {
                $('#addQuestion').prepend(`<h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                        <div class="row flex px-6">
                            <input class="form-control" name="question[]" id="question" type="text"
                                placeholder="Enter Question">
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>A</b></span></label>
                                <input class="form-control m-1" name="option_A[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>B</b></span></label>
                                <input class="form-control m-1" name="option_B[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>C</b></span></label>
                                <input class="form-control m-1" name="option_C[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>D</b></span></label>
                                <input class="form-control m-1" name="option_D[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div>
                                <h6>Answer : </h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option` + id + `"
                                        id="inlineRadio" value="A" checked>
                                    <label class="form-check-label" for="inlineRadio1">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option` + id + `"
                                        id="inlineRadio" value="B">
                                    <label class="form-check-label" for="inlineRadio1">B</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option` + id + `"
                                        id="inlineRadio" value="C">
                                    <label class="form-check-label" for="inlineRadio1">C</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option` + id + `"
                                        id="inlineRadio" value="D">
                                    <label class="form-check-label" for="inlineRadio1">D</label>
                                </div>
                            </div>
                        </div>`);
                id = id + 1;

            });
            $('#question_id').change(function() {
                let id = $(this).val();
                console.log(id);

                if (id == 'mcq') {
                    $('#addQuestion').empty();
                    $('#addQuestion').prepend(`<h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                            <div class="col-lg-12 px-6">

                                <input class="form-control" name="question" id="question" type="text"
                                    placeholder="Enter Question">
                                <div class="flex">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>A</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>B</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                </div>
                                <div class="flex">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>C</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>D</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                </div>
                                <div>
                                    <h6>Answer : </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="correct_answer"
                                            id="inlineRadio1" value="A" checked>
                                        <label class="form-check-label" for="inlineRadio1">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="correct_answer"
                                            id="inlineRadio1" value="B">
                                        <label class="form-check-label" for="inlineRadio1">B</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="correct_answer"
                                            id="inlineRadio1" value="C">
                                        <label class="form-check-label" for="inlineRadio1">C</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="correct_answer"
                                            id="inlineRadio1" value="D">
                                        <label class="form-check-label" for="inlineRadio1">D</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Save</button>`);
                } else if (id == 'blanks') {
                    $('#addQuestion').empty();
                    $('#addQuestion').prepend(`<h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                                        <div class="col-lg-12 px-6">
                                    <input class="form-control mb-4" name="question" id="question" type="text"
                                        placeholder="Enter Question">
                                    <div class="col-lg-12">
                                        <label class=" col-form-label  mt-4"><span class="text-lg"><b>Answer</b></span></label>
                                        <input class="form-control" name="correct_answer" id="question" type="text"
                                            placeholder="Enter Answer">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Save</button>`);
                } else {
                    $('#addQuestion').empty();
                    $('#addQuestion').prepend(`<h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                            <div class="col-lg-12 px-6">
                                <input class="form-control" name="question" id="question" type="text"
                                    placeholder="Enter Question">
                                <div class="flex">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>A</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>B</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                </div>
                                <div class="flex">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>C</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                    <label class=" col-form-label mt-4"><span class="text-lg"><b>D</b></span></label>
                                    <input class="form-control m-1" name="option[]" id="question" type="text"
                                        placeholder="Enter Option">
                                </div>
                                <div>
                                    <h6>Answer : </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="correct_answer[]"
                                            id="inlineRadio1" value="A" checked>
                                        <label class="form-check-label" for="inlineRadio1">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="correct_answer[]"
                                            id="inlineRadio1" value="B">
                                        <label class="form-check-label" for="inlineRadio1">B</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="correct_answer[]"
                                            id="inlineRadio1" value="C">
                                        <label class="form-check-label" for="inlineRadio1">C</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="correct_answer[]"
                                            id="inlineRadio1" value="D">
                                        <label class="form-check-label" for="inlineRadio1">D</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Save</button>`);
                }
            });

            $('#class_id').change(function() {
                let id = $(this).val();
                class_id = id;
                //$('select[name="course_id"]').empty();
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
                //$('select[name="lesson_id"]').empty();
                //console.log(id);
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    //console.log(this.responseText);
                    var html_body = this.responseText;
                    $('#lesson_id').html(html_body);

                }
                xmlhttp.open("GET", "/getlesson/" + id + '/' + class_id);
                xmlhttp.send();
            });
        });
    </script>
</x-layout.layout>

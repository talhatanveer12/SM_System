<x-layout.layout>
    <div class="px-6 py-8">
        @if ($Questions && $Questions != 'submit')
            <div class="row mb-4">
                <div class="col-md-6">
                    <h3>Course Name: {{ $Questions[0]->lessons->courses->course_name }}</h3>
                </div>
                <div class="col-md-6">
                    <h3>Lesson Name: {{ $Questions[0]->lessons->lesson_name }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <blockquote class="blockquote-red">
                        <p>
                            <strong>Test Instructions</strong>
                        </p>
                        <p>
                            The test consists of questions carefully designed to help you self-assess your comprehension
                            of the information presented on the topics covered in the module.<br>Each question in the
                            test is of multiple-choice, "true or false", fill in the blank or Multiple correct options
                            format. Read each question carefully.
                        </p>
                    </blockquote>
                </div>
            </div>

            <h3></h3>
            <form action="/save-result" method="POST">
                @csrf
                <input class="form-control" type="hidden" name="lesson_test_id" value="{{ $test_id }}">
                @foreach ($Questions as $key => $value)
                    <div id="addQuestion">
                        @foreach ($value->questions as $key1 => $value1)
                            <div class="col-lg-12 px-6">
                                <div class="mb-8 mt-8">
                                    <h4><b>Question {{ $key1 + 1 }}: {{ $value1->question }}
                                            {{ $value1->question_type == 'mcq' ? '[MCQ]' : ($value1->question_type == 'blanks' ? '[Fill in th blanks]' : ($value1->question_type == 'T/F' ? '[True or False]' : '[Multiple correct options]')) }} {{'[Marks : '.$value1->marks.']'}}</b>
                                    </h4>
                                </div>
                                <input class="form-control" type="hidden" name="lesson_id"
                                    value="{{ $lesson_id }}">
                                <input class="form-control" type="hidden" name="question[]"
                                    value="{{ $value1->question }}">
                                <input class="form-control" type="hidden" name="question_id[]"
                                    value="{{ $value1->id }}">
                                @if (count($value1->options))
                                    {{-- @foreach ($value1->options as $key2 => $value2) --}}
                                    @if ($value1->question_type == 'mcq')
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="correct_answer_{{ $value1->id }}" id="inlineRadio1"
                                                value="A">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[0]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="correct_answer_{{ $value1->id }}" id="inlineRadio1"
                                                value="B">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[1]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="correct_answer_{{ $value1->id }}" id="inlineRadio1"
                                                value="C">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[2]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="correct_answer_{{ $value1->id }}" id="inlineRadio1"
                                                value="D">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[3]->option }}</label>
                                        </div>
                                    @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="correct_answer_{{ $value1->id }}[]" id="inlineRadio1"
                                                value="A">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[0]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="correct_answer_{{ $value1->id }}[]" id="inlineRadio1"
                                                value="B">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[1]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="correct_answer_{{ $value1->id }}[]" id="inlineRadio1"
                                                value="C">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[2]->option }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="correct_answer_{{ $value1->id }}[]" id="inlineRadio1"
                                                value="D">
                                            <label class="form-check-label"
                                                for="inlineRadio1">{{ $value1->options[3]->option }}</label>
                                        </div>
                                    @endif

                                    {{-- @endforeach --}}
                                @elseif ($value1->question_type == 'T/F')
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="correct_answer_{{ $value1->id }}" id="inlineRadio1" value="true">
                                        <label class="form-check-label" for="inlineRadio1">True</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="correct_answer_{{ $value1->id }}" id="inlineRadio1"
                                            value="false">
                                        <label class="form-check-label" for="inlineRadio1">False</label>
                                    </div>
                                @else
                                    <input class="form-control col-lg-6 my-4"
                                        name="correct_answer_{{ $value1->id }}" placeholder="Enter Answer">
                                @endif

                            </div>
                            {{-- <div class="col-lg-12 ">
                                <hr>
                            </div> --}}
                        @endforeach
                    </div>
                @endforeach
                {{ $Questions->links() }}
                <button type="submit" class="btn btn-primary mt-4" onclick="return confirm('Are you sure you want to Submit this Test?');">Submit</button>
            </form>
        @elseif ($Questions == 'submit')
            <h1 class="text-center">Test already Submit</h1>
        @else
            <h4 class="text-center">No Question Found</h4>
        @endif
    </div>

</x-layout.layout>

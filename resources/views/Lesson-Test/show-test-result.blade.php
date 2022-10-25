<x-layout.layout>
    <div class="px-6 py-8">
        @if ($Questions)
            <div class="row mb-4">
                <div class="col-md-6">
                    <h3>Course Name: {{$Questions[0]->lesson->courses->course_name}}</h3>
                </div>
                <div class="col-md-6">
                    <h3>Lesson Name: {{$Questions[0]->lesson->lesson_name}}</h3>
                </div>
            </div>
            {{-- <div class="row">
                {{ $Questions[0]->lessons->lesson_name }}
                $Questions[0]->lessons->courses->course_name
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
            </div> --}}

            <h3></h3>
            @foreach ($Questions as $key1 => $value1)
                <div id="addQuestion">
                    {{-- @foreach ($value->questions as $key1 => $value1) --}}
                        <div class="col-lg-12 px-6">
                            <div class="mb-8 mt-8">
                                <h4><b>Question {{ $key1 + 1 }}: {{ $value1->question }}
                                        {{ $value1->question_type == 'mcq' ? '[MCQ]' : ($value1->question_type == 'blanks' ? '[Fill in th blanks]' : ($value1->question_type == 'T/F' ? '[True or False]' : '[Multiple correct options]')) }}</b>
                                    <span
                                        class="ml-12 bold {{ $value1->correct === 'true' ? 'text-green-600' : 'text-red-600' }}">{{ $value1->correct === 'true' ? 'Correct' : 'Wrong' }}</span>
                                </h4>
                            </div>
                            @if (count($value1->questions->options))
                                {{-- @foreach ($value1->options as $key2 => $value2) --}}
                                @if ($value1->question_type == 'mcq')
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">A)
                                            {{ $value1->questions->options[0]->option }}{{ $value1->answer === 'A' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'A' ? '  [Correct Answer]' : '') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">B)
                                            {{ $value1->questions->options[1]->option }}
                                            {{ $value1->answer === 'B' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'B' ? '  [Correct Answer]' : '') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">C)
                                            {{ $value1->questions->options[2]->option }}
                                            {{ $value1->answer === 'C' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'C' ? '  [Correct Answer]' : '') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">D)
                                            {{ $value1->questions->options[3]->option }}
                                            {{ $value1->answer === 'D' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'D' ? '  [Correct Answer]' : '') }}</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">A)
                                            {{ $value1->questions->options[0]->option }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">B)
                                            {{ $value1->questions->options[1]->option }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">C)
                                            {{ $value1->questions->options[2]->option }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">D)
                                            {{ $value1->questions->options[3]->option }}</label>
                                    </div>
                                    @if ($value1->correct === 'false')
                                        <div class="form-check form-check-inline mt-4">
                                            <label class="form-check-label" for="inlineRadio1">Correct Answers :
                                                {{ $value1->questions->correct_answer }}</label>
                                        </div>
                                    @endif
                                    <div
                                        class="form-check form-check-inline {{ $value1->correct === 'true' ? 'mt-4' : '' }}">
                                        <label class="form-check-label" for="inlineRadio1">Your Answers :
                                            {{ $value1->answer === null ? 'empty' : $value1->answer  }}</label>
                                    </div>
                                @endif

                                {{-- @endforeach --}}
                            @elseif ($value1->questions->question_type == 'T/F')
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">True
                                        {{ $value1->answer === 'true' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'true' ? '[Correct Answer]' : '') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">False
                                        {{ $value1->answer === 'false' ? ' [Your Answer]' : ($value1->questions->correct_answer === 'false' ? '[Correct Answer]' : '') }}</label>
                                </div>
                            @else
                                @if ($value1->correct === 'false')
                                    <div class="form-check form-check-inline mt-4">
                                        <label class="form-check-label" for="inlineRadio1">Correct Answers :
                                            {{ $value1->questions->correct_answer }}</label>
                                    </div>
                                @endif
                                <div
                                    class="form-check form-check-inline {{ $value1->correct === 'true' ? 'mt-4' : '' }}">
                                    <label class="form-check-label" for="inlineRadio1">Your Answers :
                                        {{ $value1->answer === '-' ? 'empty' : $value1->answer  }}</label>
                                </div>
                            @endif

                        </div>
                        {{-- <div class="col-lg-12 ">
                                <hr>
                            </div> --}}
                    {{-- @endforeach --}}
                </div>
            @endforeach
            {{-- {{ $Questions->links() }} --}}
        @else
            <h4 class="text-center">Record Not Found</h4>
        @endif
    </div>

</x-layout.layout>

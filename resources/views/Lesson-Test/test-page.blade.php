<x-layout.layout>
    <div class="px-6 py-8">
        @if ($Questions)
            <h3 class="text-center">Test Question</h3>
            <form action="/save-result" method="POST">
                @csrf
                <input class="form-control" type="hidden" name="lesson_test_id" value="{{ $test_id }}">
                @foreach ($Questions as $key => $value)
                    <div id="addQuestion">
                        @foreach ($value->questions as $key1 => $value1)
                            <h3>Question</h3>
                            <div class="col-lg-12 px-6">
                                <h4>{{ $value1->question }}</h4>
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
                                @else
                                    <input class="form-control col-lg-6 my-4" name="correct_answer_{{ $value1->id }}"
                                        placeholder="Enter Answer">
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary mt-4">Save</button>;
            </form>
            {{ $Questions->links() }}
        @else
            <h4 class="text-center">No Question Found</h4>
        @endif
    </div>

</x-layout.layout>

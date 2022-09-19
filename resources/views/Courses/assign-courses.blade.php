<x-layout.layout>
    <div class="col">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Assign Course</div>
                    <form method="POST" action="/save-assign-course">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <div>
                                @if(!request('class_id'))
                                <select class="select2" data-allow-clear="true" data-placeholder="Select one class..."
                                    name="class id" id="class id">
                                    <option></option>
                                    <optgroup label="Class name">
                                        @foreach ($Classes as $Class)
                                            <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @else
                                    <input class="form-control" type="text" name='class_id' value="{{$UpdateCourse->class_name}}" disabled>
                                    <input class="form-control" type="hidden" name='class_id' value="{{$UpdateCourse->id}}">
                                @endif
                            </div>
                        </div>
                        <x-form.label name="Course" /><br>
                        @foreach ($Courses as $key =>$course)
                            <div class="form-check ">
                                {{-- <input class="form-control" name='class_id' value="{{$UpdateCourse->class_name}}" > --}}
                                {{-- $UpdateCourse->courses[$key] ?? '' ? ($UpdateCourse->courses[$key]->id == $course->id ? 'checked' : '') : '' --}}
                                <input class="form-check-input" type="checkbox" name="course id[]" id="course id"
                                    value="{{ $course->id }}" {{$UpdateCourse ?  $UpdateCourse->courses->find($course->id ) ? 'checked' : '' : ''}} >
                                <label class="form-check-label" for="course id">{{ $course->course_name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-4">{{request('class_id') ? 'Update' : 'Save'}}</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8 p-2">
                <div class="border p-2  rounded hover:shadow-2xl shadow-md">
                    <div class="border-t-2 border-black p-2 mb-4 mr-2">Classes with Courses</div>
                    @if ($assignData)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Class Name</th>
                                        <th scope="col">Courses Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignData as $AssignData => $value)
                                        @if (count($value->courses))
                                            <tr>
                                                <td>{{ $value->class_name }}</td>
                                                <td>
                                                    <table>
                                                        <tbody>
                                                            @foreach ($value->courses as $key => $data)
                                                                <tr>
                                                                    <td>{{ $data->course_name }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <form action='#' method="GET">
                                                        <input type="hidden" name="class_id" value={{$value->id}}>
                                                        <button class="mr-2 text-black text-decoration-none">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <a href="/delete-assign-courses/{{ $value->id }}"
                                                            class="mr-2 text-black text-decoration-none">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </form>

                                                </td>
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
</x-layout.layout>

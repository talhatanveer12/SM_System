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
                                <select class="select2" data-allow-clear="true"
                                    data-placeholder="Select one class..." name="class id" id="class id">
                                    <option></option>
                                    <optgroup label="Class name">
                                        @foreach ($Classes as $Class)
                                            <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        {{-- <select class="form-select mb-4" aria-label="Default select example" name="class id"
                            id="class id">
                            @foreach ($Classes as $Class)
                                <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                            @endforeach
                        </select> --}}
                        <x-form.label name="Course" /><br>
                        @foreach ($Courses as $course)
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="course id[]" id="course id"
                                    value="{{ $course->id }}">
                                <label class="form-check-label" for="course id">{{ $course->course_name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
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
                                        <tr>
                                            <td>{{ $AssignData }}</td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        @foreach ($value as $key => $data)
                                                            <tr>
                                                                <td>{{ $data }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <a href="#" class="mr-2 text-black text-decoration-none">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="#" class="mr-2 text-black text-decoration-none">
                                                    <i class="fa-solid fa-trash-can"></i>
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
    </div>
</x-layout.layout>

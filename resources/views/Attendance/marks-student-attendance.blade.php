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
                                                                <option value="{{ $Class->id }}">
                                                                    {{ $Class->class_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="control-label">Attendance Date</label>
                                            <input class="form-control" type='date' name='attendance date'
                                                id="attendance_date" value={{ request('attendance_date') }} />
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-9">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                @if ($Attendance)
                    <form action="/save-student-attendance" method="POST">
                        @csrf
                        <input class="form-control" type='hidden' name='attendance date' id="attendance_date"
                            value={{ request('attendance_date') }} />
                        <input class="form-control" type='hidden' name='class id' id="class_id"
                            value={{ request('class_id') }} />

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Admission No</th>
                                        <th>Student Name</th>
                                        <th>Student Roll no</th>
                                        <th>Attendance</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>



                                @foreach ($Attendance as $attendance)
                                    <tbody>


                                        <tr>
                                            <td>{{ $attendance->admission_no }}</td>
                                            <td>{{ $attendance->first_name . ' ' . $attendance->last_name }}</td>
                                            <td>{{ $attendance->roll_no }}</td>
                                            <td>
                                                <input class="form-control" type='hidden' name='student id[]'
                                                    id="student_id" value={{ $attendance->id }} />
                                                <div class="input-group w-64">
                                                    <select class="selectboxit" data-first-option="false"
                                                        name={{ $attendance->id }} id="class id">
                                                        <option>Select Attendance</option>
                                                        <optgroup label="Attendance">
                                                                <option value="persent"
                                                                    selected>
                                                                    persent</option>
                                                                    <option value="late"
                                                                    {{ $attendance->attendance == 'late'  ? 'selected' : '' }}>
                                                                    late</option>
                                                                    <option  value="absent"
                                                                    {{ $attendance->attendance == 'absent'  ? 'selected' : '' }}>
                                                                    absent</option>

                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <input class="form-control" type='text' name='note[]'
                                                    value='{{ $attendance->note }}' />
                                            </td>
                                        </tr>



                                    </tbody>
                                @endforeach


                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-4">Save</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

    <script>
        document.getElementById('attendance_date').valueAsDate = new Date();
    </script>
</x-layout.layout>

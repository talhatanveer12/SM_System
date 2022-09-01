<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <div class="mb-4 mr-2 mt-10">
                                <input class="form-control" type='date' name='attendance date' id="attendance_date"
                                    value />
                            </div>
                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($Attendance)
                <form action="/save-employee-attendance" method="POST">
                    @csrf
                    <input class="form-control" type='hidden' name='attendance date' id="attendance_date"
                        value={{ request('attendance_date') }} />

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Reg No</th>
                                    <th>Teacher Name</th>
                                    <th>Teacher no</th>
                                    <th>Attendance</th>
                                    <th>Note</th>
                                </tr>
                            </thead>



                                @foreach ($Attendance as $attendance)
                                    <tbody>


                                        <tr>
                                            <td>{{ $attendance->reg_no }}</td>
                                            <td>{{ $attendance->first_name . ' ' . $attendance->last_name }}</td>
                                            <td>{{ $attendance->employee_no }}</td>
                                            <td>
                                                <input class="form-control" type='hidden' name='employee id[]'
                                                    id="employee_id" value={{ $attendance->id }} />
                                                <div class="input-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name={{ $attendance->id }} id="inlineRadio1" value="persent"
                                                            {{$attendance->attendance == 'persent' || $attendance->attendance == '' ? 'checked' : ''}}>
                                                        <label class="form-check-label"
                                                            for="inlineRadio1">Persent</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name={{ $attendance->id }} id="inlineRadio2"
                                                            value="late" {{$attendance->attendance == 'late' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="inlineRadio2">Late</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name={{ $attendance->id }} id="inlineRadio3"
                                                            value="absent" {{$attendance->attendance == 'absent' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="inlineRadio3">Absent</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <input class="form-control" type='text' name='note[]' value='{{$attendance->note}}'/>
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
</x-layout.bootstrap-layout>

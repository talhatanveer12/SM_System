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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Reg No</th>
                                    <th>Teacher Name</th>
                                    <th>Teacher no</th>
                                    <th>Note</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Attendance as $attendance)
                                    <tr>
                                        <td>{{ $attendance->reg_no }}</td>
                                        <td>{{ $attendance->first_name . ' ' . $attendance->last_name }}</td>
                                        <td>{{ $attendance->employee_no }}</td>
                                        <td>{{ $attendance->note }}</td>
                                        <td class='w-0'>
                                            <div class='flex'>
                                                <span
                                                    class="{{ $attendance->attendance == 'persent' ? 'bg-green-500' : ($attendance->attendance == 'late' ? 'bg-gray-500 ' : 'bg-red-500') }}  flex-1 figure p-1 rounded text-center">{{ $attendance->attendance }}</span>
                                            </div>
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

    <script>
        document.getElementById('attendance_date').valueAsDate = new Date();
    </script>
</x-layout.layout>

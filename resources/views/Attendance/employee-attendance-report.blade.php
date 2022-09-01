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
                                                    class="{{$attendance->attendance == 'persent' ? 'bg-green-500' : ( $attendance->attendance == 'late' ? 'bg-gray-500 ' : 'bg-red-500' )}}  flex-1 figure p-1 rounded text-center">{{ $attendance->attendance }}</span>
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
</x-layout.bootstrap-layout>

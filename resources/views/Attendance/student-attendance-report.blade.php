<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Class" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="class_id"
                                    id="Class">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($Classes as $Class)
                                        <option value="{{ $Class->id }}"
                                            {{ request('Class') == $Class->id ? 'selected' : '' }}>
                                            {{ $Class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                    <th>Admission No</th>
                                    <th>Student Name</th>
                                    <th>Student Roll no</th>
                                    <th>Note</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Attendance as $attendance)
                                    <tr>
                                        <td>{{ $attendance->admission_no }}</td>
                                        <td>{{ $attendance->first_name . ' ' . $attendance->last_name }}</td>
                                        <td>{{ $attendance->roll_no }}</td>
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

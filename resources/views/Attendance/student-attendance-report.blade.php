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

                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        var $table4 = jQuery("#table-4");

                        $table4.DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'copyHtml5',
                                'excelHtml5',
                                'csvHtml5',
                                'pdfHtml5'
                            ]
                        });
                    });
                </script>

                @if ($Attendance)
                    {{-- <div class="my-2">
                        <a class="btn btn-primary btn-icon icon-left hidden-print">
                            Export Attendance
                            <i class="entypo-doc-text"></i>
                        </a>
                    </div> --}}

                    <table class="table table-bordered datatable" id="table-4">
                        <thead>
                            <tr>
                                <th scope="col">Admission No</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Roll no</th>
                                <th scope="col">Note</th>
                                <th scope="col">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Attendance as $attendance)
                                <tr>
                                    <td>{{ $attendance->admission_no }}</td>
                                    <td>{{ $attendance->first_name . ' ' . $attendance->last_name }}</td>
                                    <td>{{ $attendance->roll_no }}</td>
                                    <td>{{ $attendance->note }}</td>
                                    <td class="center"
                                        style="background-color: {{ $attendance->attendance == 'persent' ? 'green' : ($attendance->attendance == 'late' ? 'gray' : 'red') }}">
                                        <div class='flex'>
                                            <span
                                                class="flex-1 figure p-1 rounded text-center text-white">{{ $attendance->attendance }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('attendance_date').valueAsDate = new Date();
    </script>

    <link rel="stylesheet" href="/assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="/assets/js/datatables/datatables.js"></script>
    <script src="/assets/js/select2/select2.min.js"></script>
    <script src="/assets/js/neon-chat.js"></script>
</x-layout.layout>

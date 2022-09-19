<x-layout.layout>

    <div class="col-span-12 flex-col ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">
                    <div class="panel-heading backgroundColor">
                        <div class="panel-title">
                            Profile
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open backgroundColor"></i></a>
                            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw backgroundColor"></i></a>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class='row'>
                            <div class="col-xs-5">
                                <table class="table responsive ">
                                    <tbody>
                                        <tr>
                                            <td class="tablestyle"><span><b>Name </b></span></td>
                                            <td class="tablestyle">{{ $Student->first_name . ' ' . $Student->last_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Roll No </b></span></td>
                                            <td class="tablestyle">{{ $Student->roll_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Email </b></span></td>
                                            <td class="tablestyle">{{ $Student->email }}</td>
                                        </tr>

                                    <tbody>
                                </table>
                            </div>
                            <div class="col-xs-2"></div>
                            <div class="col-xs-5">
                                <table class="table responsive ">
                                    <tbody>
                                        <tr>
                                            <td class="tablestyle"><span><b>Admission No</b></span></td>
                                            <td class="tablestyle">{{ $Student->admission_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Gender </b></span></td>
                                            <td class="tablestyle">{{ $Student->Gender }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Class</b></span></td>
                                            <td class="tablestyle">{{ $Student->classes->class_name }}</td>
                                        </tr>
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">
                    <div class="panel-heading backgroundColor">
                        <div class="panel-title">
                            Guardian Detail
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open backgroundColor"></i></a>
                            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw backgroundColor"></i></a>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class='row'>
                            <div class="col-xs-5">
                                <table class="table responsive ">
                                    <tbody>
                                        <tr>
                                            <td class="tablestyle"><span><b>Guardian Name </b></span></td>
                                            <td class="tablestyle">{{ ucwords($Student->guardian_name) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Email </b></span></td>
                                            <td class="tablestyle">{{ $Student->guardian_email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Address </b></span></td>
                                            <td class="tablestyle">{{ $Student->guardian_address }}</td>
                                        </tr>

                                    <tbody>
                                </table>
                            </div>
                            <div class="col-xs-2"></div>
                            <div class="col-xs-5">
                                <table class="table responsive ">
                                    <tbody>
                                        <tr>
                                            <td class="tablestyle"><span><b>Phone No </b></span></td>
                                            <td class="tablestyle">{{ $Student->guardian_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tablestyle"><span><b>Relation </b></span></td>
                                            <td class="tablestyle">{{ $Student->guardian_relation }}</td>
                                        </tr>
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">


                <table class="table table-bordered table-striped datatable" id="table-2">
                    <thead>
                        <tr>
                            <th>Fee Month</th>
                            <th>Total Amount</th>
                            <th>Submit Amount</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Fee as $key => $value)
                        <tr>
                            <td>{{$value->fee_month}}</td>
                            <td>{{$value->Total_fee}}</td>
                            <td>{{$value->fee_submit_amount}}</td>

                        </tr>
                        @endforeach
                        {{-- @foreach ($Exam as $key => $value)
                        <tr>
                            <td>{{$value->exam_name}}</td>
                            <td>{{$value->starting_date}}</td>
                            <td>{{$value->ending_date}}</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 bg-gray-200">
                <div class="calendar-env">
                    <div class="calendar-body " style="width: 100%;">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
        <script src="assets/js/view-calendar.js"></script>
        <script type="text/javascript">
            jQuery(window).load(function() {
                var $table2 = jQuery("#table-2");

                // Initialize DataTable
                $table2.DataTable({
                    "sDom": "tip",
                    "bStateSave": false,
                    "iDisplayLength": 8,
                    "aoColumns": [
                        null,
                        null,
                        null
                    ],
                    "bStateSave": true
                });
            });
        </script>
</x-layout.layout>

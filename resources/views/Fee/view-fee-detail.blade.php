<x-layout.layout>

    <h2>Fee Detail</h2>

    <br />

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

    <table class="table table-bordered table-striped datatable" id="table-2">
        <thead>
            <tr>
                <th>Fee Month</th>
                <th>Submit Date</th>
                <th>Total Amount</th>
                <th>Submit Amount</th>
                <th>Remaining Amount</th>
                {{-- <th>Actions</th> --}}
            </tr>
        </thead>

        <tbody>
            @foreach ($Fee as $key => $value)
            <tr>
                <td>{{$value->fee_month}}</td>
                <td>{{$value->fee_submit_date}}</td>
                <td>{{$value->Total_fee}}</td>
                <td>{{$value->fee_submit_amount}}</td>
                <td>{{$value->remaining_fee}}</td>

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

    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>
</x-layout.layout>

<x-layout.layout>
    <div class="row">
        <h2>Test</h2>

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
                    <th>Course Name</th>
                    <th>Lesson Name</th>
                    <th>Result</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($Test as $key => $value)
                    <tr>
                        <td>{{ $value->lessons->courses->course_name }}</td>
                        <td>{{ $value->lessons->lesson_name }}</td>
                        @if (count($value->testresult))
                            <td>{{ $value->testresult[0]->obtain_no . ' / ' . $value->testresult[0]->total_no }}
                            </td>
                        @else
                            <td>-</td>
                        @endif
                        @can('student')
                            <td>
                                <a href="/test-page/{{ $value->id }}/{{ $value->lessons->id }}"
                                    {{ count($value->testresult) ? 'disabled' : '' }}
                                    onclick="return {{ count($value->testresult) ? 'false' : 'true' }}"
                                    class="btn btn-blue btn-sm">
                                    Show Test
                                </a>
                            </td>
                            @else
                            <td>
                                Test
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>

</x-layout.layout>

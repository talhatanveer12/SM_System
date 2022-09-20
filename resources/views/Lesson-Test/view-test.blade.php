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
                            <td>{{ $value->testresult[0]->obtain_no . ' out of ' . $value->testresult[0]->total_no }}
                            </td>
                        @else
                            <td>Not Submit</td>
                        @endif
                        @can('student')
                            <td>
                                <a href="/test-page/{{ $value->id }}/{{ $value->lessons->id }}"
                                    {{ count($value->testresult) ? 'disabled' : '' }}
                                    onclick="return {{ count($value->testresult) ? 'false' : 'true' }}"
                                    class="btn btn-default btn-sm btn-icon icon-left">
                                    <i class="entypo-pencil"></i>
                                    Test
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

    <script type="text/javascript">
        function showAjaxModal() {
            $(document).on('click', '#add_marks', function() {
                var lesson_test_id = $(this).data('lesson_test_id');
                var lesson_id = $(this).data('lesson_id');
                console.log(lesson_id);

                jQuery('#modal-4').modal('show', {
                    backdrop: 'static'
                });

                // const xmlhttp = new XMLHttpRequest();
                // xmlhttp.onload = function() {
                //     var html_body = this.responseText;
                //     console.log(html_body);
                //     //$('#getexam').html(html_body);
                // }
                // xmlhttp.open("GET", "/test-page/" + lesson_test_id + '/' + lesson_id);
                // xmlhttp.send();
            });
        }
    </script>



    {{-- <div class="modal fade" id="modal-4" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Test</h4>
                </div>

                <div class="modal-body">
                    <div class="mt-2">
                        <h3>Question no 1</h3>
                        <h4><b>How are you?</b></h4>
                        <div class="form-check form-check-inline col-6">
                            <input class="form-check-input" type="radio" name="correct_answer" id="inlineRadio1"
                                value="A">
                            <label class="form-check-label" for="inlineRadio1">A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="correct_answer" id="inlineRadio1"
                                value="A" >
                            <label class="form-check-label" for="inlineRadio1">A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="correct_answer" id="inlineRadio1"
                                value="A" >
                            <label class="form-check-label" for="inlineRadio1">A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="correct_answer" id="inlineRadio1"
                                value="A" >
                            <label class="form-check-label" for="inlineRadio1">A</label>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h3>Question no 1</h3>
                        <h4><b>How are you?</b></h4>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="correct_answer[]"
                                    id="inlineRadio1" value="A">
                                <label class="form-check-label" for="inlineRadio1">Good</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="correct_answer1[]"
                                    id="inlineRadio1" value="A">
                                <label class="form-check-label" for="inlineRadio1">Good</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="correct_answer1[]"
                                    id="inlineRadio1" value="A">
                                <label class="form-check-label" for="inlineRadio1">Good</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="correct_answer1[]"
                                    id="inlineRadio1" value="A">
                                <label class="form-check-label" for="inlineRadio1">Good</label>
                            </div>

                        </div>
                    </div>
                    <div class="mt-2">
                        <h3>Question no 1</h3>
                        <h4><b>How are you?</b></h4>
                        <input class="form-control" name="correct_answer[]" placeholder="Enter Answer">
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div> --}}


    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">



    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>

</x-layout.layout>

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
                                            <div class="form-group w-full">
                                                <label class="control-label">Class</label>
                                                <div class>
                                                    <select class="selectboxit" data-first-option="false"
                                                        name="class id" id="class id">
                                                        <option>Select Class</option>
                                                        <optgroup label="Class name">
                                                            @foreach ($Classes as $Class)
                                                                <option value="{{ $Class->id }}"
                                                                    {{ request('class_id') == $Class->id ? 'selected' : '' }}>
                                                                    {{ $Class->class_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group w-full">
                                                <label class="control-label">Course</label>
                                                <div class>
                                                    <select class="selectboxit" data-first-option="false"
                                                        name="course_id" id="Course">
                                                        <option>Select Course</option>
                                                        <optgroup label="Course name">
                                                            @foreach ($Courses as $Course)
                                                                <option value="{{ $Course->id }}"
                                                                    {{ request('course_id') == $Course->id ? 'selected' : '' }}>
                                                                    {{ $Course->course_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-9">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>





                @if ($lesson)
                    <h5 class='m-2'>Syllabus Status For: {{ $Course_name->course_name }}</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-2/4">Lesson - Topic</th>
                                    <th>Topic Completion Date </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesson as $key => $value)
                                    <tr>
                                        <td>
                                            <h6>{{ $key }}</h6>
                                            <ul>
                                                @if ($value)
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <li class="mb-2">{{ $value_1->topic_name }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            <h6 class="h-5"></h6>
                                            <ul>
                                                @if ($value)
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <li class="{{ $value_1->completion_date ? 'mb-2' : 'mb-10' }}">
                                                            {{ $value_1->completion_date }}</li>
                                                        {{-- <li class="mb-2">{{ $value_1->completion_date }}</li> --}}
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            <h6 class="h-5"></h6>
                                            <ul class="p-0">
                                                @if ($value)
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <li class="mb-2">
                                                            <span
                                                                class="{{ $value_1->completion_date ? 'bg-blue-600' : 'bg-gray-600' }} p-1 rounded text-white text-xs">{{ $value_1->completion_date ? 'complete' : 'incomplete' }}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            <h6 class="h-5"></h6>
                                            <ul class="p-0">
                                                @if ($value)
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <li>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-rowid={{ $value_1->id }} name="action"
                                                                    id="flexSwitchCheckChecked"
                                                                    {{ $value_1->completion_date ? 'checked' : '' }}>
                                                            </div>

                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h2 class="text-center">No Record Found</h2>
                @endif
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#flexSwitchCheckChecked', function() {
                var checked = $(this).is(':checked');
                var rowid = $(this).data('rowid');
                if (checked) {
                    var status = "1";
                    $('#exampleModal').modal('show');
                    $('#sdsd').val(rowid);
                } else {
                    if (!confirm('Change Status')) {
                        $(this).removeAttr('checked');

                    } else {
                        var status = "0";
                        changeTopicStatus(rowid, status);
                    }
                }
            });

        });

        function changeTopicStatus(rowid, status) {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                var html_body = this.responseText;
                console.log(html_body);
            }
            xmlhttp.open("GET", "/changeTopicStatus/" + rowid);
            xmlhttp.send();
        }


        // $(document).ready(function() {
        //     $('#flexSwitchCheckChecked').change(function() {
        //         let id = $(this).val();
        //         console.log($(this).val());
        //         if( id == 'on'){
        //             $('#flexSwitchCheckChecked').prop("checked", false);
        //         }
        //         // if(id == 'on'){
        //         // $('#flexSwitchCheckChecked').prop("checked", true);
        //         // }
        //         // else{
        //         //     $('#flexSwitchCheckChecked').prop("checked", false);
        //         // }
        //         // console.log(id);
        //         // $('input[name="action"]').empty();
        //     });
        // });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Completion date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/update-topics-details" method="POST">
                        @csrf
                        <input type="hidden" id="sdsd" name="topic_id">
                        <input class="form-control" type="date" name="completion_date" />
                        <button class="btn btn-primary mt-4" type="submit">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>

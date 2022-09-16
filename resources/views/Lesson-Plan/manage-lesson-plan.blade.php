<x-layout.layout>
    <div class="calendar-env">
        @can('admin')
            <div class="calendar-body">
                <div id="calendar"></div>
            </div>
        @else
            <div class="calendar-body" style="width: 100%;">
                <div id="calendar"></div>
            </div>
        @endcan
        @can('admin')


            <div class="calendar-sidebar">
                <div class="calendar-sidebar-row">
                    <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">
                        <div class="panel-heading backgroundColor">
                            <div class="panel-title">
                                Select Criteria
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open backgroundColor"></i></a>
                                <a href="#" data-rel="reload"><i class="entypo-arrows-ccw backgroundColor"></i></a>
                            </div>
                        </div>
                        <div class="panel-body ">
                            <form action="/save-timetable" method="POST">
                                @csrf
                                <div class="row">
                                    <div>
                                        <div class="form-group">
                                            <label class="control-label">Course</label>
                                            <div>
                                                <select class="select2" aria-label="Default select example"
                                                    data-allow-clear="true" data-placeholder="Select one Course..."
                                                    name="course id" id="course_id">
                                                    <option></option>
                                                    <optgroup label="Course name">
                                                        @foreach ($Course as $course)
                                                            <option value="{{ $course->id }}">
                                                                {{ $course->course_name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <x-form.error name="course_id" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group w-full">
                                            <label class="control-label">Lesson</label>
                                            <div class>
                                                <select class="select2" aria-label="Default select example"
                                                    data-allow-clear="true" data-placeholder="Select one Lesson..."
                                                    name="lesson id" id="lesson_id">
                                                    <option>Select Lesson</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <x-form.input name="start" type="datetime-local"
                                            value="{{ request('roll_no') }}" />
                                    </div>
                                    <div>
                                        <x-form.input name="end" type="datetime-local"
                                            value="{{ request('roll_no') }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-11">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
    <script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/neon-calendar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_id').change(function() {
                let id = $(this).val();
                //$('select[name="lesson_id"]').empty();
                //console.log(id);
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    console.log(this.responseText);
                    var html_body = this.responseText;
                    $('#lesson_id').html(html_body);

                }
                xmlhttp.open("GET", "/getlesson/" + id + '/' + '1');
                xmlhttp.send();
            });
        });
    </script>
</x-layout.layout>

<x-layout.layout>
    <div class="col">
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
                                        <x-form.input name="roll no" type="number" value="{{ request('roll_no') }}" />
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="form-group w-full">
                                            <label class="control-label">Class</label>
                                            <div class>
                                                <select class="selectboxit" data-first-option="false" name="class id"
                                                    id="class id">
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
                                    <button type="submit" class="btn btn-primary mt-11">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($Student as $student)
                <div class="member-entry">

                    @can('admin')
                        <a href="/student/add-student?student_id={{ $student->id }}" class="member-img">
                            <img src={{ $student->student_photo ? '/storage/' . $student->student_photo : '/images/illustration-1.png' }}
                                class="img-rounded" />
                            <i class="entypo-forward"></i>
                        </a>
                    @endcan
                    @can('teacher')
                        <a href="#" class="member-img">
                            <img src={{ $student->student_photo ? '/storage/' . $student->student_photo : '/images/illustration-1.png' }}
                                class="img-rounded" />
                            <i class="entypo-forward"></i>
                        </a>
                    @endcan
                    <div class="member-details">
                        <h4>
                            <a href="#">{{ $student->first_name . ' ' . $student->last_name }}</a>
                        </h4>
                        <div class="row info-list">

                            <div class="col-sm-4">
                                <i class="entypo-doc-text-inv"></i>
                                <b>Admission No: </b> {{ $student->admission_no }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-doc-text-inv"></i>
                                <b>Roll No: </b> {{ $student->roll_no }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-user"></i>
                                {{ $student->Gender }}
                            </div>

                            <div class="clear"></div>

                            <div class="col-sm-4">
                                <i class="entypo-location"></i>
                                {{ $student->guardian_address }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-mail"></i>
                                {{ $student->email }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-phone"></i>
                                {{ $student->guardian_phone }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{ $Student->links() }}
            </div>
        </div>
    </div>

</x-layout.layout>

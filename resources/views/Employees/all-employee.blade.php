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

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group w-full">
                                            <label class="control-label">Course</label>
                                            <div class>
                                                <select class="selectboxit" data-first-option="false" name="course id"
                                                    id="course id">
                                                    <option>Select Course</option>
                                                    <optgroup label="Course name">
                                                        @foreach ($Course as $Course)
                                                            <option value="{{ $Course->id }}"
                                                                {{ request('course_id') == $Course->id ? 'selected' : '' }}>
                                                                {{ $Course->course_name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <x-form.input name="cnic no" type="number" value="{{ request('cnic_no') }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-11">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @foreach ($Employee as $employee)
                <div class="member-entry">

                    <a href="/employee/add-employee?emp_id={{ $employee->id }}" class="member-img">
                        <img src={{ $employee->employee_photo ? '/storage/' . $employee->employee_photo : '/images/illustration-1.png' }}
                            class="img-rounded" />
                        <i class="entypo-forward"></i>
                    </a>

                    <div class="member-details">
                        <h4>
                            <a href="#">{{ $employee->first_name . ' ' . $employee->last_name }}</a>
                        </h4>

                        <!-- Details with Icons -->
                        <div class="row info-list">

                            <div class="col-sm-4">
                                <i class="entypo-doc-text-inv"></i>
                                <b>Reg No: </b> {{ $employee->reg_no }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-doc-text-inv"></i>
                                <b>CNIC No: </b>{{ $employee->cnic_no }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-user"></i>
                                {{ $employee->gender }}
                            </div>

                            <div class="clear"></div>

                            <div class="col-sm-4">
                                <i class="entypo-location"></i>
                                {{ $employee->employee_address }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-mail"></i>
                                {{ $employee->email }}
                            </div>

                            <div class="col-sm-4">
                                <i class="entypo-phone"></i>
                                {{ $employee->phone }}
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
            {{ $Employee->links() }}
        </div>
    </div>
    </x-layout.bootstrap-layout>

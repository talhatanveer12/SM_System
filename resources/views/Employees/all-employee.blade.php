<x-layout.layout>
    <div class="col">
        <div class="row">
            {{-- <main class="col grid grid-cols-12 ps-md-2 pt-2"> --}}
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

                                        <div class="col-md-3 mt-2">
                                            <div class="form-group w-full">
                                                <label class="control-label">Course</label>
                                                <div class>
                                                    <select class="selectboxit" data-first-option="false"
                                                        name="course id" id="course id">
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
                                            <x-form.input name="cnic no" type="number"
                                                value="{{ request('cnic_no') }}" />
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-11">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                {{-- <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>

                <div class="flex p-2 bg-blue-100 flex-wrap ">

                    <form action="#" method="GET">
                        <div class='flex'>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Class" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="Course"
                                    id="Class">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($Course as $Course)
                                        <option value="{{ $Course->id }}"
                                            {{ request('Course') == $Course->id ? 'selected' : '' }}>
                                            {{ $Course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-form.input name="CNIC No" type="number" value="{{ request('CNIC_No') }}" />
                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div> --}}

                @foreach ($Employee as $employee)

                <div class="member-entry">

                    <a href="#" class="member-img">
                        <img src={{ $employee->employee_photo ? '/storage/' . $employee->employee_photo : '/images/illustration-1.png' }} class="img-rounded" />
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


                {{-- @foreach ($Employee as $employee)
                    <div
                        class="bg-blue-200 border grid grid-cols-2 hover:shadow-2xl lg:grid-cols-12 md:grid-cols-9 px-6 py-8 rounded-2xl shadow-md sm:grid-cols-3">
                        <div class="col-span-2 lg:col-span-2 md:col-span-2 p-2 sm:col-span-1">
                            <img class="rounded"
                                src={{ $employee->employee_photo ? '/storage/' . $employee->employee_photo : '/images/illustration-1.png' }}
                                width="100%" height="100%" />
                        </div>
                        <div class="lg:col-span-3 lg:col-start-5 md:col-span-3 md:col-start-4">
                            <h4>{{ $employee->first_name . ' ' . $employee->last_name }}</h4>
                            <span><b>Reg No: </b> {{ $employee->reg_no }}</span><br>
                            <span><b>Course: </b> {{ $employee->course_id }}</span><br>
                            <span><b>Date of Birth: </b>{{ $employee->date_of_birth }}</span><br>
                            <span><b>Gender: </b>{{ $employee->gender }}</span><br>


                        </div>
                        <div class="lg:col-span-3 lg:col-start-10 md:col-span-3">
                            <span><b>CNIC No: </b>{{ $employee->cnic_no }}</span><br>
                            <span><b>Phone: </b> {{ $employee->phone }}</span><br>
                            <span><b>Email: </b>{{ $employee->email }}</span><br>
                            <span><b>Current Address: </b> {{ $employee->employee_address }}</span><br>


                        </div>
                    </div>
                @endforeach --}}



            </div>
            {{-- </main> --}}
        </div>
    </div>
    </x-layout.bootstrap-layout>

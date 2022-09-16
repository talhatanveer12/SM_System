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
                                        <div class="col-md-3">
                                            <x-form.input name="roll no" type="number"
                                                value="{{ request('roll_no') }}" />
                                        </div>
                                        <div class="col-md-3 mt-2">
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
                                        <button type="submit" class="btn btn-primary mt-11">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                @foreach ($Student as $student)

                <div class="member-entry">

                    <a href="#" class="member-img">
                        <img src={{ $student->student_photo ? '/storage/' . $student->student_photo : '/images/illustration-1.png' }} class="img-rounded" />
                        <i class="entypo-forward"></i>
                    </a>

                    <div class="member-details">
                        <h4>
                            <a href="#">{{ $student->first_name . ' ' . $student->last_name }}</a>
                        </h4>

                        <!-- Details with Icons -->
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




                {{-- </form> --}}
                {{-- @foreach ($Student as $student)
                    <div
                        class="bg-blue-200 border grid grid-cols-2 hover:shadow-2xl lg:grid-cols-12 md:grid-cols-9 px-6 py-8 rounded-2xl shadow-md sm:grid-cols-3">
                        <div class="col-span-2 lg:col-span-2 md:col-span-2 p-2 sm:col-span-1">
                            <article class="image-thumb">
                                <img class="rounded"
                                    src={{ $student->student_photo ? '/storage/' . $student->student_photo : '/images/illustration-1.png' }}
                                    width="100%" height="100%" />
                            </article>
                        </div>
                        <div class="lg:col-span-3 lg:col-start-5 md:col-span-3 md:col-start-4">
                            <h4>{{ $student->first_name . ' ' . $student->last_name }}</h4>
                            <span><b>Admission No: </b> {{ $student->admission_no }}</span><br>
                            <span><b>Class: </b> {{ $student->class_id }}</span><br>
                            <span><b>Date of Birth: </b>{{ $student->date_of_birth }}</span><br>
                            <span><b>Gender: </b>{{ $student->Gender }}</span><br>


                        </div>
                        <div class="lg:col-span-3 lg:col-start-10 md:col-span-3">
                            <span><b>Guardian Name: </b>{{ $student->guardian_name }}</span><br>
                            <span><b>Guardian Phone: </b> {{ $student->guardian_phone }}</span><br>
                            <span><b>Email: </b>{{ $student->guardian_email }}</span><br>
                            <span><b>Current Address: </b> {{ $student->guardian_address }}</span><br>


                        </div>
                    </div>
                @endforeach --}}



            </div>
            {{-- </main> --}}
        </div>
    </div>
    {{ $Student->links() }}
</x-layout.layout>

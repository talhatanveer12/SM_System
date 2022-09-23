<x-layout.layout>
    <div class="col">
        <div class="row">
            <form action="/api/save-student-detail" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">

                    <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">

                        <div class="panel-heading backgroundColor">
                            <div class="panel-title">
                                Student Admission
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
                                <input type="hidden" name="id" value="{{request('student_id' ?? '')}}">
                                <div class="col-md-3">
                                    <x-form.input name="admission no" type="number" error="admission_no" value="{{$Student->admission_no ?? ''}}"/>
                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="roll no" type="number" error="roll_no" value="{{$Student->roll_no ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="class name" type="number" /><br>
                                    <select class="border rounded border-gray-400 p-2 w-full"
                                        aria-label="Default select example" name="class id" id="class id">
                                        @foreach ($Classes as $Class)
                                            <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Date of Birth" /><br>
                                    <input class="border rounded border-gray-400 p-1.5 w-full" type="date"
                                        name="date of birth" id="Date of Birth" value="{{$Student->date_of_birth ?? ''}}"/>
                                </div>

                                <div class="clear"></div>
                                <br />

                                <div class="col-md-3">
                                    <x-form.input name="first name" error="first_name" value="{{$Student->first_name ?? ''}}"/>
                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="last name" error="last_name" value="{{$Student->last_name ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="gender" type="number" /><br>
                                    <select class="border border-gray-400 p-2 rounded w-full" name="gender"
                                        id="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="category" type="number" /><br>
                                    <select class="border border-gray-400 p-2 rounded w-full" name="category"
                                        id="Category">
                                        <option value="general">General</option>
                                        <option value="special">Special</option>
                                        <option value="obc">OBC</option>
                                    </select>
                                </div>

                                <div class="clear"></div>
                                <br />

                                <div class="col-md-3">
                                    <x-form.input name="email" type="email" value="{{$Student->email ?? ''}}"/>
                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="religion" value="{{$Student->religion ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Student Photo" /><br>
                                    <input class="border rounded border-gray-400 p-2 w-full" type="file"
                                        name="student photo" id="Student Photo" />
                                    <x-form.error name="student_photo" />
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Admission date" /><br>
                                    <input class="border rounded border-gray-400 p-2 w-full" type="date"
                                        name="admission date" id="Admission date" value="{{$Student->admission_date ?? ''}}"/>
                                    <x-form.error name="admission_date" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="panel panel-primary mt-4 mb-4" data-collapsed="0">

                        <div class="panel-heading backgroundColor">
                            <div class="panel-title">
                                Parent Guardian Detail
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
                                    <x-form.input name="father name" value="{{$Student->father_name ?? ''}}"/>

                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="father phone" type="number" value="{{$Student->father_phone ?? ''}}"/>

                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.input name="father occupation" value="{{$Student->father_occupation ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Father Photo" /><br>
                                    <input class="border rounded border-gray-400 p-2 w-full" type="file"
                                        name="father photo" id="Father Photo" />
                                </div>

                                <div class="clear"></div>
                                <br />

                                <div class="col-md-3">
                                    <x-form.input name="mother name" value="{{$Student->mother_name ?? ''}}"/>


                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="mother phone" type="number" value="{{$Student->mother_phone ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.input name="mother occupation" value="{{$Student->mother_occupation ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Mother Photo" /><br>
                                    <input class="border rounded border-gray-400 p-2 w-full" type="file"
                                        name="mother photo" id="Mother Photo" />
                                </div>

                                <div class="clear"></div>
                                <br />

                                <div class="col-md-3">
                                    <x-form.input name="guardian name" error="guardian_name" value="{{$Student->guardian_name ?? ''}}"/>


                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="guardian relation" error="guardian_relation" value="{{$Student->guardian_relation ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.input name="guardian email" error="guardian_email" value="{{$Student->guardian_email ?? ''}}"/>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <x-form.label name="Guardian Photo" /><br>
                                    <input class="border rounded border-gray-400 p-2 w-full" type="file"
                                        name="guardian photo" id="Guardian Photo" />
                                </div>
                                <div class="col-md-4">
                                    <x-form.input name="guardian phone" type="number" error="guardian_phone" value="{{$Student->guardian_phone ?? ''}}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-form.input name="guardian occupation" value="{{$Student->guardian_occupation ?? ''}}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-form.input name="guardian address" error="guardian_address" value="{{$Student->guardian_address ?? ''}}" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="input-group ml-7">
                    <button type="submit" class="btn btn-primary p-2 rounded w-64">{{request('student_id') ? 'Update' :'Save'}}</button>
                </div>
            </form>
            {{-- <main class="col grid grid-cols-12 ps-md-2 pt-2"> --}}

            {{-- </main> --}}
        </div>
    </div>
</x-layout.layout>

{{-- <div class="input-group mb-6 ml-6 mr-2">
    <x-form.label name="If Guardian Is " />
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="guardian_options"
            id="inlineRadio1" value="Father" checked>
        <label class="form-check-label" for="inlineRadio1">Father</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="guardian_options"
            id="inlineRadio2" value="Mother">
        <label class="form-check-label" for="inlineRadio2">Mother</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="guardian_options"
            id="inlineRadio3" value="Other">
        <label class="form-check-label" for="inlineRadio3">Other</label>
    </div>
</div> --}}

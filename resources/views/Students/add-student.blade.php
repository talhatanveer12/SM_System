<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            {{-- <main class="col grid grid-cols-12 ps-md-2 pt-2"> --}}
            <div class="flex-col ">
                <form action="/save-student-detail" method="POST">
                    @csrf
                    <div class="bg-blue-200 border-b-2 border-black p-2">Student Admission</div>
                    <div class="flex p-2 bg-blue-100 justify-center flex-wrap">

                        <x-form.input name="admission no" type="number" error="admission_no" />
                        <x-form.input name="roll no" type="number" error="roll_no"/>
                        <div class="mb-6 mt-2 mr-2">
                            <x-form.label name="class name" type="number" /><br>
                            <select class="border rounded border-gray-400 p-2 w-64" aria-label="Default select example" name="class id"
                                id="class id">
                                @foreach ($Classes as $Class)
                                    <option value="{{ $Class->id }}">{{ $Class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6 mt-2 mr-2">
                            <x-form.label name="Date of Birth" /><br>
                            <input class="border rounded border-gray-400 p-1.5 w-64" type="date" name="date of birth"
                                id="Date of Birth" />
                        </div>
                        <x-form.input name="first name" error="first_name" />
                        <x-form.input name="last name" error="last_name" />
                        <div class="mb-6 mr-2">
                            <x-form.label name="gender" type="number" /><br>
                            <select class="border border-gray-400 p-2 rounded w-64" name="gender" id="Gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-6 mr-2">
                            <x-form.label name="category" type="number" /><br>
                            <select class="border border-gray-400 p-2 rounded w-64" name="category" id="Category">
                                <option value="general">General</option>
                                <option value="special">Special</option>
                                <option value="obc">OBC</option>
                            </select>
                        </div>
                        <x-form.input name="email" type="email" />
                        <x-form.input name="religion" />

                        <div class="mb-6 mr-2">
                            <x-form.label name="Student Photo" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="file" name="student photo"
                                id="Student Photo" />
                                <x-form.error name="student_photo" />
                        </div>
                        <div class="mb-6 mr-2">
                            <x-form.label name="Admission date" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="date" name="admission date"
                                id="Admission date" />
                                <x-form.error name="admission_date" />
                        </div>
                    </div>

                    <div class="bg-blue-200 border-b-2 border-black p-2 mt-2">Parent Guardian Detail</div>
                    <div class="flex p-2 bg-blue-100 justify-center flex-wrap">
                        <x-form.input name="father name" />
                        <x-form.input name="father phone" type="number" />
                        <x-form.input name="father occupation" />
                        <div class="mb-6 mr-2">
                            <x-form.label name="Father Photo" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="file" name="father photo"
                                id="Father Photo" />
                        </div>
                        <x-form.input name="mother name" />
                        <x-form.input name="mother phone" type="number" />
                        <x-form.input name="mother occupation" />
                        <div class="mb-6 mr-2">
                            <x-form.label name="Mother Photo" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="file" name="mother photo"
                                id="Mother Photo" />
                        </div>
                        <div class="input-group mb-6 ml-6 mr-2">
                            <x-form.label name="If Guardian Is " />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="guardian_options" id="inlineRadio1"
                                    value="Father" checked>
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
                        </div>
                        <x-form.input name="guardian name" error="guardian_name"/>
                        <x-form.input name="guardian relation" error="guardian_relation"/>
                        <x-form.input name="guardian email" error="guardian_email" />
                        <div class="mb-6 mr-2">
                            <x-form.label name="Guardian Photo" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="file"
                                name="guardian photo" id="Guardian Photo" />
                        </div>
                        <x-form.input name="guardian phone" type="number" error="guardian_phone"/>
                        <x-form.input name="guardian occupation" />
                        <x-form.input name="guardian address" error="guardian_address"/>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary p-2 rounded w-64">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- </main> --}}
        </div>
    </div>
</x-layout.bootstrap-layout>

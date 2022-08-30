<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="flex-col ">
                <form action="/save-employee-detail" method="POST">
                    @csrf
                    <div class="bg-blue-200 border-b-2 border-black p-2">Student Admission</div>
                    <div class="flex p-2 bg-blue-100 justify-center flex-wrap">

                        <x-form.input name="reg no" type="number" error="reg_no" />
                        <x-form.input name="employee no" type="number" error="employee_no"/>
                        <div class="mb-6 mt-2 mr-2">
                            <x-form.label name="Assign course" type="number" /><br>
                            <select class="border rounded border-gray-400 p-2 w-64" aria-label="Default select example" name="course id"
                                id="course id">
                                @foreach ($Classes as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
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
                            <x-form.label name="Employee Photo" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="file" name="employee photo"
                                id="Employee Photo" />
                                <x-form.error name="employee_photo" />
                        </div>
                        <div class="mb-6 mr-2">
                            <x-form.label name="Joining date" /><br>
                            <input class="border rounded border-gray-400 p-2 w-64" type="date" name="joining date"
                                id="joining date" />
                                <x-form.error name="joining_date" />
                        </div>
                    </div>

                    <div class="bg-blue-200 border-b-2 border-black p-2 mt-2">Other Detail</div>
                    <div class="flex p-2 bg-blue-100 justify-center flex-wrap">
                        <x-form.input name="cnic no" type="number"/>
                        <x-form.input name="phone" type="number" />
                        <div class="mb-6 mr-2 mt-2">
                            <x-form.label name="Eduction" type="number" /><br>
                            <select class="border border-gray-400 p-2 rounded w-64" name="eduction" id="Gender">
                                <option value="bs">BS</option>
                                <option value="ms">MS</option>
                                <option value="phd">PHD</option>
                            </select>
                        </div>
                        <x-form.input name="specialization" />

                        <x-form.input name="employee address" error="employee_address"/>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary p-2 rounded w-64">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.bootstrap-layout>

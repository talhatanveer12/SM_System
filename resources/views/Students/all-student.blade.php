<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            {{-- <main class="col grid grid-cols-12 ps-md-2 pt-2"> --}}
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                {{-- <form action="#" method="POST"> --}}
                <div class="flex p-2 bg-blue-100 flex-wrap ">



                    <form action="#" method="GET">
                        <div class='flex'>
                            <div class=" mr-2 mt-2">
                                <x-form.label name="Class" type="number" />
                                <select class="form-select mb-4 p-6" aria-label="Default select example" name="Class"
                                    id="Class">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($Classes as $Class)
                                        <option value="{{ $Class->id }}" {{request('Class') == $Class->id ? 'selected' : ''}}>{{ $Class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-form.input name="Roll No" type="number" value="{{ request('Roll_No') }}" />
                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>


                </div>
                {{-- </form> --}}
                @foreach ($Student as $student)
                    <div
                        class="bg-blue-200 border grid grid-cols-2 hover:shadow-2xl lg:grid-cols-12 md:grid-cols-9 px-6 py-8 rounded-2xl shadow-md sm:grid-cols-3">
                        <div class="col-span-2 lg:col-span-2 md:col-span-2 p-2 sm:col-span-1">
                            <img class="rounded" src={{ $student->student_photo ? '/storage/' . $student->student_photo : '/images/illustration-1.png'}} width="100%" height="100%" />
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
                            <x-form.button>Show All Details</x-form.button>

                        </div>
                    </div>
                @endforeach



            </div>
            {{-- </main> --}}
        </div>
    </div>
</x-layout.bootstrap-layout>

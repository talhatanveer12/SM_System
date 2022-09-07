<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <x-form.input name="roll no" type="number" value="{{ request('roll_no') }}" />
                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if ($student)
            @if (count($Exam_result))
            <div class="col-span-12">
                <button id="print" onclick="printfunction()" class="btn btn-primary float-end my-2">print Result card</button>
            </div>
                <div id="print_body" class="col-span-12 grid gap-2 grid-cols-12">

                    <div class="col-span-12 text-center">
                        <h2>{{ $Institute->name }}</h2>
                        <h6>{{ $Institute->address }}</h6>
                        <h6>phone : {{ $Institute->phone }} </h6>
                        <h6> Website : {{ $Institute->website }}</h6>
                        <h1>Result Cards</h1>
                        <h5> {{ $student->classes->class_name }}</h5>
                    </div>
                    <div class="col-span-6 grid gap-2 grid-cols-6">
                        <div class="col-span-2">
                            <span><b> Student Name : </b></span><br>
                            <span><b>Admission No: </b> </span><br>
                            <span><b>Roll No: </b> </span><br>
                            <span><b>Date of Birth: </b></span><br>
                            <span><b>Gender: </b></span><br>
                            <span><b>Guardian Name : </b></span><br>
                            <span><b>Guardian phone: </b> </span><br>
                            <span><b>Address :  </b> </span><br>
                        </div>
                        <div class="col-span-4">
                            <span>{{ $student->first_name . ' ' . $student->last_name }}</span><br>
                            <span>{{ $student->admission_no }}</span><br>
                            <span>{{ $student->roll_no }}</span><br>
                            <span>{{ $student->date_of_birth }}</span><br>
                            <span>{{ $student->Gender }}</span><br>
                            <span>{{ $student->guardian_name }}</span><br>
                            <span>{{ $student->guardian_phone }}</span><br>
                            <span>{{ $student->guardian_address }}</span><br>

                        </div>
                    </div>

                    <div class="col-span-12 mt-2">
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark">
                            <thead class="text-center">
                                <tr>
                                    <th>Course Name</th>
                                    <th>Obtain Marks</th>
                                    <th>Total Marks</th>
                                    <th>Percentage</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($Exam_result as $key => $value)
                                    <tr>
                                        <td>{{$value->courses->course_name}}</td>
                                        <td>{{$value->obtain_marks}}</td>
                                        <td>{{$value->total_marks}}</td>
                                        <td>{{$value->obtain_marks/$value->total_marks*100}}</td>
                                        <td>{{$value->grade}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    @if($grand_total)
                                    <th>Grand Total</th>
                                    <th>{{$grand_total['obtain_marks']}}</th>
                                    <th>{{$grand_total['total_marks']}}</th>
                                    <th>{{round($grand_total['percent'], 2)}}</th>
                                    <th>{{$grand_total['grade']}}</th>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            @endif
            @endif
        </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script type="text/javascript">
        function printfunction() {
            var body = document.getElementById('body').innerHTML;
            var data = document.getElementById('print_body').innerHTML;
            console.log("sdsd");
            //console.log(t);
            document.getElementById('body').innerHTML = data;
            window.print();
            document.getElementById('body').innerHTML = body;
        }
    </script>
</x-layout.bootstrap-layout>

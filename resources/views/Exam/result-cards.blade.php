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
                                            <x-form.input name="roll no" type="number"
                                                value="{{ request('roll_no') }}" />
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-11">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            @if ($student)
            <div class="col-span-12">
                <button id="print" onclick="printfunction()" class="btn btn-primary float-end my-2">print Result card</button>
            </div>
                <div id="print_body" class="col-span-12 grid gap-2 grid-cols-12">


                    @can('admin')
                    <div class="col-span-12 text-center">
                        <h2>{{ $Institute->name }}</h2>
                        <h6>{{ $Institute->address }}</h6>
                        <h6>phone : {{ $Institute->phone }} </h6>
                        <h6> Website : {{ $Institute->website }}</h6>
                        <h1>Result Cards</h1>
                        <h5> {{ $student->classes->class_name }}</h5>
                    </div>
                    @endcan
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
                    @foreach ($Exam as $key => $value)
                        @if (count($Exam_Result))
                            <div>
                                <div class="pl-4 py-2 backgroundColor">
                                    <span><b>{{ $value->exam_name }}</b></span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        @php
                                            $check = 0;
                                        @endphp
                                        @foreach ($Exam_Result as $key1 => $value1)
                                            @if ($value1->exam_id == $value->id)
                                                @if ($check == 0)
                                                    <thead class="text-center">
                                                        <tr>
                                                            <td class="text-center"><b>Subject</b></td>
                                                            <td class="text-center"><b>Total Marks</b></td>
                                                            <td class="text-center"><b>Marks Obtained</b></td>
                                                            <td class="text-center"><b>Grade</b></td>
                                                            <td class="text-center"><b>Result</b></td>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $check = 1;
                                                    @endphp
                                                @endif
                                                <tbody class="text-center">
                                                    <td>{{ $value1->courses->course_name }}</td>
                                                    <td>{{ $value1->total_marks }}</td>
                                                    <td>{{ $value1->obtain_marks }}</td>
                                                    <td>{{ $value1->grade }}</td>
                                                    <td>{{ $value1->obtain_marks > 33 ? 'pass' : 'fail' }}</td>
                                                </tbody>
                                            @endif
                                        @endforeach
                                        @if($check != 1)
                                                <h3 class="text-center">Result not Found</h3>
                                        @endif
                                        @php
                                            $check = 0;
                                        @endphp
                                        @if ($grand_total[$key])
                                            <thead>
                                                <th>Percentage : {{ round($grand_total[$key]['percent']) }}</th>
                                                <th>Result : Pass</th>
                                                <th>Grand Total : {{ $grand_total[$key]['total_marks'] }}</th>
                                                <th>Total Obtain Marks : {{ $grand_total[$key]['obtain_marks'] }}</th>
                                                <th>Grade : {{ $grand_total[$key]['grade'] }}</th>
                                            </thead>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            @endif
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
</x-layout.layout>

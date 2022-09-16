<x-layout.layout>
    <div class="col">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-gray-100 border-black border-t-2">
                    <h3 class="pl-4">Exam Result</h3>
                    @foreach ($Exam as $key => $value)
                        @if (count($Exam_Result))
                            <div>
                                <div class="pl-4 py-2 backgroundColor">
                                    <span><b>{{ $value->exam_name }}</b></span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Total Marks</th>
                                                <th class="text-center">Marks Obtained</th>
                                                <th class="text-center">Grade</th>
                                                <th class="text-center">Result</th>
                                            </tr>
                                        </thead>
                                        @foreach ($Exam_Result as $key1 => $value1)
                                            @if ($value1->exam_id == $value->id)
                                                <tbody class="text-center">
                                                    <td>{{ $value1->courses->course_name }}</td>
                                                    <td>{{ $value1->total_marks }}</td>
                                                    <td>{{ $value1->obtain_marks }}</td>
                                                    <td>{{ $value1->grade }}</td>
                                                    <td>{{ $value1->obtain_marks > 33 ? 'pass' : 'fail' }}</td>
                                                </tbody>
                                            @endif
                                        @endforeach
                                        @if ($grand_total)
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
        </div>
    </div>
</x-layout.layout>

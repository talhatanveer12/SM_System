
<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <x-form.input name="roll_no" type="number" value="{{ request('roll_no') }}" />
                            <x-form.input name="fee_month" type="month" value="{{ request('fee_month') }}" />
                            <div class=" mr-2 mt-3">
                                <button  type="submit"
                                    class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex justify-content-end p-3">
                <button onclick="printfunction()" class="btn btn-primary " id="printButton">print fee slip</button>
            </div>

            @if ($Fee)
                <div class="row mt-4">

                    <div class="col-lg-2 text-center"></div>
                    <div class="col-lg-8 text-center bg-blue-200 P-4">
                        <h3 class="mt-3">Fee Slip</h3>
                        <hr>
                        <div id="form_body" class="row text-left">
                            <div class="row p-4">

                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Admission No:</b></span>
                                    <span>{{ $Fee->students->admission_no }}</span><br>
                                    <span><b>Roll No</b></span>
                                    <span>{{ $Fee->students->roll_no }}</span><br>
                                    <span><b>Name</b></span>
                                    <span>{{ $Fee->students->first_name . ' ' . $Fee->students->last_name }}</span>

                                </div>
                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Fee Months:</b></span>
                                    <span>{{ $Fee->fee_month }}</span><br>
                                    <span><b>Submit Date</b></span>
                                    <span>{{ $Fee->fee_submit_date }}</span><br>
                                    {{-- <span><b>Name</b></span>
                                    <span>{{ $Fee->students->first_name . ' ' . $Fee->students->last_name }}</span> --}}

                                </div>
                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Total Amount:</b></span>
                                    <span>{{ $Fee->Total_fee }}</span><br>
                                    <span><b>Deposit Amount </b></span>
                                    <span>{{ $Fee->fee_submit_amount }}</span><br>
                                    <span><b>Remaining Balance </b></span>
                                    <span>{{ $Fee->remaining_fee }}</span>

                                </div>

                            </div>
                            <table class="table-bordered table-striped table-centered">
                                <tbody class="text-center">
                                    <tr>
                                        <td><b> Sr. No. </b></td>
                                        <td><b> Particulars </b></td>
                                        <td><b> Amount </b></td>
                                    </tr>
                                    <tr>
                                        <td> 1 </td>
                                        <td class="float-start pl-2"> MONTHLY FEE </td>
                                        <td>{{ $Fee->monthly_fee }}</td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td class="float-start pl-2"> ADMISSION FEE </td>
                                        <td>{{ $Fee->admission_fee }}</td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td class="float-start pl-2"> REGISTRATION FEE </td>
                                        <td>{{ $Fee->registration_fee }}</td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td class="float-start pl-2"> BOOKS </td>
                                        <td>{{ $Fee->books }}</td>
                                    </tr>
                                    <tr>
                                        <td> 5 </td>
                                        <td class="float-start pl-2"> UNIFORM </td>
                                        <td>{{ $Fee->uniform }}</td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td class="float-start pl-2"> PREVIOUS BALANCE </td>
                                        <td>{{ $Fee->remaining_fee }}</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td class="border-0 float-end pr-2"> TOTAL </td>
                                        <td><b>{{ $Fee->Total_fee }}</b></td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td class="border-0 float-end pr-2"> DEPOSIT </td>
                                        <td><b>{{ $Fee->fee_submit_amount }}</b></td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td class="border-0 float-end pr-2"> REMAINING AMOUNT </td>
                                        <td><b>{{ $Fee->Total_fee - $Fee->fee_submit_amount }}</b></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center"></div>

                <div id="print" class="col-lg-12 col-md-12 d-none">
                    <div class="col-lg-12 col-md-12" style="background:#fff;font-size:10px;padding:10px;">
                        {{-- <div class="flex justify-around">
                            <img src={{ '/storage/' . $Institute->logo }} class="rounded" width="140px"
                                height="140px" />
                        </div> --}}
                        <div class="module-head" style="text-align:center;">
                            <font style="font-size:20px;font-weight:bold;color:black;">{{ $Institute->name }} </font>
                            <br>
                            <i class="fa-solid fa-phone"></i> {{ $Institute->phone }} |
                            <i class="fa-solid fa-envelope"></i> {{ $Institute->email }} <br>
                            <i class="fa-sharp fa-solid fa-location-dot"></i> {{ $Institute->address }}<br>
                            <font style="font-size:20px;font-weight:bold;" class="text-blue-600">Fee Submission Slip
                            </font>
                            <hr>
                        </div>
                        <div class="module-body">
                            <div class="row p-20">

                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Admission No:</b></span>
                                    <span>{{ $Fee->students->admission_no }}</span><br>
                                    <span><b>Roll No</b></span>
                                    <span>{{ $Fee->students->roll_no }}</span><br>
                                    <span><b>Name</b></span>
                                    <span>{{ $Fee->students->first_name . ' ' . $Fee->students->last_name }}</span>

                                </div>
                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Fee Months:</b></span>
                                    <span>{{ $Fee->fee_month }}</span><br>
                                    <span><b>Submit Date</b></span>
                                    <span>{{ $Fee->fee_submit_date }}</span><br>
                                    {{-- <span><b>Name</b></span>
                                    <span>{{ $Fee->students->first_name . ' ' . $Fee->students->last_name }}</span> --}}

                                </div>
                                <div class="col-lg-4 text-center text-sm">
                                    <span><b>Total Amount:</b></span>
                                    <span>{{ $Fee->Total_fee }}</span><br>
                                    <span><b>Deposit Amount </b></span>
                                    <span>{{ $Fee->fee_submit_amount }}</span><br>
                                    <span><b>Remaining Balance </b></span>
                                    <span>{{ $Fee->remaining_fee }}</span>

                                </div>
                            </div>
                            <div class="row">
                                <table style="width:60%;margin:0 auto;"
                                    class="table-bordered table-striped table-centered">
                                    <tbody class="text-center">
                                        <tr>
                                            <td><b> Sr. No. </b></td>
                                            <td><b> Particulars </b></td>
                                            <td><b> Amount </b></td>
                                        </tr>
                                        <tr>
                                            <td> 1 </td>
                                            <td class="float-start pl-2"> MONTHLY FEE </td>
                                            <td>{{ $Fee->monthly_fee }}</td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td class="float-start pl-2"> ADMISSION FEE </td>
                                            <td>{{ $Fee->admission_fee }}</td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td class="float-start pl-2"> REGISTRATION FEE </td>
                                            <td>{{ $Fee->registration_fee }}</td>
                                        </tr>
                                        <tr>
                                            <td> 4 </td>
                                            <td class="float-start pl-2"> BOOKS </td>
                                            <td>{{ $Fee->books }}</td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td class="float-start pl-2"> UNIFORM </td>
                                            <td>{{ $Fee->uniform }}</td>
                                        </tr>
                                        <tr>
                                            <td> 6 </td>
                                            <td class="float-start pl-2"> PREVIOUS BALANCE </td>
                                            <td>{{ $Fee->remaining_fee }}</td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                            <td class="border-0 float-end pr-2"> TOTAL </td>
                                            <td><b>{{ $Fee->Total_fee }}</b></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                            <td class="border-0 float-end pr-2"> DEPOSIT </td>
                                            <td><b>{{ $Fee->fee_submit_amount }}</b></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                            <td class="border-0 float-end pr-2"> REMAINING AMOUNT </td>
                                            <td><b>{{ $Fee->Total_fee - $Fee->fee_submit_amount }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row p-20 m-t-30" style="background:white;">

                                <h6 class="text-center w-100">Fee Submission Record </h6>
                                <table width="100%" class="table-bordered"
                                    style="text-align:center;border:1px solid black;">
                                    <tbody>
                                        <tr style="">
                                            <td><b>Sr#</b></td>
                                            <td><b>Submission Date</b></td>
                                            <td><b>Fee Month</b></td>
                                            <td><b>Total Amount</b></td>
                                            <td><b>Deposit</b></td>
                                            <td><b>Remaining</b></td>
                                        </tr>
                                        @foreach ($FeePrint as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->fee_submit_date }}</td>
                                                <td>{{ $value->fee_month }}</td>
                                                <td>{{ $value->Total_fee }}</td>
                                                <td>{{ $value->fee_submit_amount }}</td>
                                                <td>{{ $value->remaining_fee }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row-fluid" style="background:white;">

                                <b>Note: </b><i>*{{ $Institute->name }}*</i>
                                <hr style="margin:5px;">
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            {{-- <div class="mt-4" >
            <h2 class="text-center">Fee Collection</h2>
            <form action="#" method="GET">
                <div class="flex">
                <div class="w-60">
                    <x-form.label name="Month" type="number" />
                    <input type="month" class="form-control" >
                </div>
                <input class="form-control" type="date" name="fee_month">
                <div class=" ml-4 mt-2">
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                </div>
                </div>
            </form>
            </div> --}}
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        var body = document.getElementById('form_body').innerHTML;

        function printfunction() {
            var body = document.getElementById('body').innerHTML;
            var data = document.getElementById('print').innerHTML;
            console.log("sdsd");
            //console.log(t);
            document.getElementById('body').innerHTML = data;
            window.print();
            document.getElementById('body').innerHTML = body;
        }


        $(document).ready(function() {

            $('#admission_fee').change(function() {
                //$(this).val(200000);
                let admission_fee = $(this).val();
                let reg_fee = $('#reg_fee').val();
                let books = $('#books').val();
                let uniform = $('#uniform').val();
                let m_fee = $('#monthly_fee').val();
                let r_fee = $('#remaining_fee').val();
                let sum = parseInt(admission_fee) + parseInt(reg_fee) + parseInt(books) + parseInt(
                    uniform) + parseInt(m_fee) + parseInt(r_fee);
                $('#total_fee').val(sum);
                $('t_fee').val(sum);
            });
            $('#fee_months').change(function() {
                let month = $(this).val();
                let id = $('#s_id').val();

                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let result = this.responseText;
                    if (result) {

                        //console.log(body);
                        $('#form_body').empty();
                        $('#form_body').prepend(
                            `<h3 class="text-blue-700 text-center">This Month Fee Already Submit</h3>`
                        );
                    } else {
                        $('#form_body').empty();
                        $('#form_body').prepend(body);
                    }

                }
                xmlhttp.open("GET", "/checkFeeSubmit/" + id + "/" + month);
                xmlhttp.send();
            });
        });
    </script>

</x-layout.bootstrap-layout>


{{-- 07-09-2022
check-in 10:23 AM
I will be working on following tasks
Complete Test part (design page + save data in database)
Fee part (design page)
fee particular (design page[update] + save data in database)
Result card (user print result card + design page[update])
check-out 7:50 --}}

<x-layout.layout>


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
                                        <x-form.input name="roll no" type="number" value="{{ request('roll_no') }}" />
                                    </div>
                                    <div class="col-md-3">
                                        <x-form.input name="fee month" type="month"
                                            value="{{ request('fee_month') }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-11">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            @if ($Fee)
                <div class="invoice" id='print'>

                    <div class="row">

                        <div class="col-sm-6 invoice-left">

                            <a href="#">
                                <img src="images/black-logo.svg" width="185" alt="" />
                            </a>

                        </div>

                        <div class="col-sm-6 invoice-right">

                            <h3>Fee Submit Date</h3>
                            <span>{{ $Fee->fee_submit_date }}</span>
                        </div>

                    </div>

                    <hr class="margin" />


                    <div class="row">

                        <div class="col-sm-3 invoice-left">

                            <h4>Student Detail</h4>
                            <strong>Name : </strong>{{ $Fee->students->first_name . ' ' . $Fee->students->last_name }}
                            <br />
                            <strong>Admission No : </strong>{{ $Fee->students->admission_no }}
                            <br />
                            <strong>Roll No : </strong>{{ $Fee->students->roll_no }}

                        </div>

                        <div class="col-sm-3 invoice-left"></div>

                        {{-- <div class="col-sm-3 invoice-left">

                        <h4>&nbsp;</h4>
                        1982 OOP
                        <br />
                        Madrid, Spain
                        <br />
                        +1 (151) 225-4183
                    </div> --}}

                        <div class="col-md-6 invoice-right">

                            <h4>Payment Details</h4>
                            <strong>Fee Months : </strong> {{ $Fee->fee_month }}
                            <br />
                            <strong>Total Fee : </strong> {{ $Fee->Total_fee }}
                            <br />
                            <strong>Deposit Amount : </strong> {{ $Fee->fee_submit_amount }}

                        </div>

                    </div>

                    <div class="margin"></div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th width="60%">Particulars</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> 1 </td>
                                <td> MONTHLY FEE </td>
                                <td class="text-left">{{ $Fee->monthly_fee }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> 2 </td>
                                <td> ADMISSION FEE </td>
                                <td class="text-left">{{ $Fee->admission_fee }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> 3 </td>
                                <td> REGISTRATION FEE </td>
                                <td class="text-left">{{ $Fee->registration_fee }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> 4 </td>
                                <td> BOOKS </td>
                                <td class="text-left">{{ $Fee->books }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> 5 </td>
                                <td> UNIFORM </td>
                                <td class="text-left">{{ $Fee->uniform }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> 6 </td>
                                <td> PREVIOUS BALANCE </td>
                                <td class="text-left">{{ $Fee->remaining_fee }}</td>
                            </tr>
                            {{-- <tr>
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
                        </tr> --}}
                        </tbody>
                    </table>

                    <div class="margin"></div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="invoice-left">

                                {{ $Institute->name }}
                                <br />
                                {{ $Institute->address }}
                                <br />
                                {{ $Institute->phone }}
                                <br />
                                {{ $Institute->email }}
                            </div>

                        </div>

                        <div class="col-sm-6 mt-6">


                            <div class="invoice-right">

                                <ul class="list-unstyled">
                                    <li>
                                        Total Fee:
                                        <strong>{{ $Fee->Total_fee }}</strong>
                                    </li>
                                    <li>
                                        DEPOSIT:
                                        <strong>{{ $Fee->fee_submit_amount }}</strong>
                                    </li>
                                    <li>
                                        Discount:
                                        -----
                                    </li>
                                    <li>
                                        Remaining amoount :
                                        <strong>{{ $Fee->Total_fee - $Fee->fee_submit_amount }}</strong>
                                    </li>
                                </ul>

                                <br />

                                <button onclick="printfunction()"
                                    class="btn btn-primary btn-icon icon-left hidden-print">
                                    Print Fee Slip
                                    <i class="entypo-doc-text"></i>
                                </button>

                                &nbsp;

                            </div>

                        </div>

                    </div>

                    <div class="row" id='record'>
                        <h6 class="text-center w-100">Fee Submission Record </h6>
                        <table width="100%" class="table-bordered" style="text-align:center;border:1px solid black;">
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

                </div>
            @endif


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        var body = document.getElementById('form_body').innerHTML;

        function printfunction() {
            console.log("ewwewe");
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

</x-layout.layout>


{{-- 07-09-2022
check-in 10:23 AM
I will be working on following tasks
Complete Test part (design page + save data in database)
Fee part (design page)
fee particular (design page[update] + save data in database)
Result card (user print result card + design page[update])
check-out 7:50 --}}

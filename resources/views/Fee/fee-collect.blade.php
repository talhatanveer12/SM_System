<x-layout.layout>
    <div class="col">
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
                                <button type="submit" class="btn btn-primary mt-11">Search</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @if ($Students)
        <div class="row mt-4">
            <div class="col-lg-2 text-center"></div>
            <div class="col-lg-8 text-center bg-blue-200">
                <h3 class="mt-3">Fee Collection</h3>
                <hr>
                <div class="row text-left mt-4">
                    <div class="col-lg-4 text-center">
                        <span><b>Admission No</b></span><br>
                        <span>{{ $Students->admission_no }}</span>
                    </div>
                    <div class="col-lg-4 text-center">
                        <span><b>Roll No</b></span><br>
                        <span>{{ $Students->roll_no }}</span>
                    </div>
                    <div class="col-lg-4 text-center">
                        <span><b>Name</b></span><br>
                        <span>{{ $Students->first_name . ' ' . $Students->last_name }}</span>
                    </div>
                </div>
                <form action="/save-fee-collect" method="POST">
                    @csrf
                    <div class="row text-left mb-4">
                        <div class="col-lg-4">
                            <x-form.label name="Fee Month" type="number" />
                            <input type="month"  name="fee month" id='fee_months' class="form-control"
                                value="{{ old('fee_month') }}">
                            <x-form.error name="fee_month" />
                        </div>
                        <div class="col-lg-4">
                            <x-form.label name="Date" type="number" />
                            <input type="date" name="fee_submit_date" class="form-control">
                            <x-form.error name="fee_submit_date" />
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group w-full">
                                <label class="control-label">Payment Method</label>
                                <div class>
                                    <select class="selectboxit" data-first-option="false"
                                        name="payment method" id="payment method">
                                        <option>Payment Method</option>
                                        <optgroup label="Class name">
                                            <option value="cash">Cash</option>
                                            <option value="online">Online</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name='student_id' id="s_id" value={{ $Students->id }}>
                    <input type="hidden" name='admission_fee_status' value={{ $Fee['admission_fee_status'] }}>
                    <div id="form_body" class="row text-left">

                        <div class="table">
                            <table class="table">
                                <tbody>
                                    <tr class="text-center">
                                        <td>Sr#</td>
                                        <td>Particulars</td>
                                        <td>Amount</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">Admission Fee</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" name="admission_fee" id="admission_fee"
                                                    class="form-control text-center"
                                                    value={{ $Fee['admission_fee_status'] == 'No' ? $FeeParticular->admission_fee : 0 }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">Registration Fee</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" name="registration_fee" id="reg_fee"
                                                    class="form-control text-center"
                                                    value={{ $Fee['admission_fee_status'] == 'No' ? $FeeParticular->registration_fee : 0 }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">3</td>
                                        <td class="align-middle">Book</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" name="books" id="books"
                                                    class="form-control text-center"
                                                    value={{ $Fee['admission_fee_status'] == 'No' ? $FeeParticular->books : 0 }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">4</td>
                                        <td class="align-middle">Uniform</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" name="uniform" id="uniform"
                                                    class="form-control text-center"
                                                    value={{ $Fee['admission_fee_status'] == 'No' ? $FeeParticular->uniform : 0 }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">Monthly Fee</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" name="monthly_fee" id="monthly_fee"
                                                    class="form-control text-center" value={{ $Fee['monthly_fee'] }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">6</td>
                                        <td class="align-middle">Remaining Amount</td>
                                        <td class="align-middle w-0">
                                            <div class="text-center w-48">
                                                <input type="number" id="remaining_fee"
                                                    class="form-control text-center" value={{ $Fee['remaining_fee'] }}
                                                    disabled>

                                                <input type="hidden" name="remaining_fee"
                                                    value={{ $Fee['remaining_fee'] }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle"></td>
                                        <td class="align-middle text-end">Total</td>
                                        <td class="align-middle">
                                            <input type="number" name="total_fee" id="total_fee"
                                                class="form-control text-center" value={{ $Fee['total_fee'] }}
                                                disabled>

                                            <input type="hidden" name="total_fee" id='t_fee'
                                                value={{ $Fee['total_fee'] }}>
                                            {{-- <div class="text-center w-48">
                                            <input type="number" class="form-control text-center" value={{$FeeParticular->uniform}}>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle"></td>
                                        <td class="align-middle text-end">Deposit</td>
                                        <td class="align-middle">
                                            <div>
                                                <input type="number" name="fee_submit_amount" id="total_fee1"
                                                    class="form-control text-center" value=0>
                                                <x-form.error name="fee_submit_amount" />
                                            </div>
                                            {{-- <div class="text-center w-48">
                                            <input type="number" class="form-control text-center" value={{$FeeParticular->uniform}}>
                                            </div> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Submit </button>

                            </div>
                        </div>

                </form>
            </div>
        </div>
        <div class="col-lg-2 text-center"></div>
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
    {{-- <div id="print" class="col-lg-12 col-md-12">
        <div class="col-lg-12 col-md-12" style="background:#fff;font-size:10px;padding:10px;">

            <div class="module-head" style="text-align:center;">
                <font style="font-size:20px;font-weight:bold;color:black;">{{ $Institute->name }} </font>
                <br>
                <i class="fa-solid fa-phone"></i> {{ $Institute->phone }} |
                <i class="fa-solid fa-envelope"></i> {{ $Institute->email }} <br>
                <i class="fa-sharp fa-solid fa-location-dot"></i> {{ $Institute->address }}<br>
                <font style="font-size:20px;color:brown;font-weight:bold;">Fee Submission Slip</font>
                <hr>
            </div>
            <div class="module-body">
                <div class="row p-20">

                    <div class="col-lg-4 text-center text-sm">
                        <span><b>Admission No:</b></span>
                        <span>{{ $Students->admission_no }}</span><br>
                        <span><b>Roll No</b></span>
                        <span>{{ $Students->roll_no }}</span><br>
                        <span><b>Name</b></span>
                        <span>{{ $Students->first_name . ' ' . $Students->last_name }}</span>

                    </div>
                    <div class="col-lg-4 text-center text-sm">
                        <span><b>Admission No:</b></span>
                        <span>{{ $Students->admission_no }}</span><br>
                        <span><b>Roll No</b></span>
                        <span>{{ $Students->roll_no }}</span><br>
                        <span><b>Name</b></span>
                        <span>{{ $Students->first_name . ' ' . $Students->last_name }}</span>

                    </div>
                    <div class="col-lg-4 text-center text-sm">
                        <span><b>Admission No:</b></span>
                        <span>{{ $Students->admission_no }}</span><br>
                        <span><b>Roll No</b></span>
                        <span>{{ $Students->roll_no }}</span><br>
                        <span><b>Name</b></span>
                        <span>{{ $Students->first_name . ' ' . $Students->last_name }}</span>

                    </div>
                </div>
                <div class="row" style="background:white;text-align:center;">
                    <table style="width:60%;margin:0 auto;" class="table-bordered table-striped table-centered">
                        <tbody class="text-center">
                            <tr>
                                <td><b> Sr. No. </b></td>
                                <td><b> Particulars </b></td>
                                <td><b> Amount </b></td>
                            </tr>
                            <tr>
                                <td> 1 </td>
                                <td class="float-start pl-2"> MONTHLY FEE </td>
                                <td>21000</td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td class="float-start pl-2"> ADMISSION FEE </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td class="float-start pl-2"> REGISTRATION FEE </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td class="float-start pl-2"> BOOKS </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td class="float-start pl-2"> UNIFORM </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td> 6 </td>
                                <td class="float-start pl-2"> PREVIOUS BALANCE </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="border-0 float-end pr-2"> TOTAL </td>
                                <td><b>20790</b></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="border-0 float-end pr-2"> DEPOSIT </td>
                                <td><b>20790</b></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="border-0 float-end pr-2"> REMAINING AMOUNT </td>
                                <td><b>20790</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row p-20 m-t-30" style="background:white;">

                    <h6 class="text-center w-100 m-orange">Fee Submission Record Of <i>"talha"</i> S/D/O <i>""</i></h6>
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
                            <tr>
                                <td>1</td>
                                <td>2022-08-23</td>
                                <td>2022-08</td>
                                <td>20790</td>
                                <td>20790</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row-fluid" style="background:white;">

                    <b>Note: </b><i>*{{$Institute->name}}*</i>
                    <hr style="margin:5px;">
                </div>

            </div>
        </div>
    </div> --}}
</x-layout.layout>


{{-- 07-09-2022
check-in 10:23 AM
I will be working on following tasks
Complete Test part (design page + save data in database)
Fee part (design page)
fee particular (design page[update] + save data in database)
Result card (user print result card + design page[update])
check-out 7:50 --}}

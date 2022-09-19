<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\FeeParticularAmount;
use Illuminate\Support\Facades\Config;

class FeeController extends Controller
{
    public function index(){
        $Students;
        $Fee;
        $FeeParticular;
        if(request('roll_no')){
            $FeeParticular = FeeParticularAmount::all()->first();
            $Students = Student::where('roll_no','=',request('roll_no'))->first();
            $check = Fee::where('student_id','=',request('roll_no'))->latest()->first();
            if($Students){
                if(!$check){
                    $Fee['student_id'] = $Students->id;
                    $Number_of_courses = count(Classes::find($Students->class_id)->courses);
                    $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
                    $Fee['remaining_fee'] = 0;
                    $Fee['admission_fee_status'] = 'No';
                    $Fee['total_fee'] = $FeeParticular->admission_fee+$FeeParticular->registration_fee+$FeeParticular->books+$FeeParticular->uniform;
                    $Fee['total_fee'] += $Fee['monthly_fee'] + $Fee['remaining_fee'];
                }
                else{
                    $Fee['admission_fee_status'] = $check->admission_fee_status;
                    $Fee['student_id'] = $Students->id;
                    $Number_of_courses = count(Classes::find($Students->class_id)->courses);
                    $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
                    $Fee['remaining_fee'] = $check->remaining_fee;
                    //$Fee['total_fee'] = $FeeParticular->admission_fee+$FeeParticular->registration_fee+$FeeParticular->books+$FeeParticular->uniform;
                    $Fee['total_fee'] = $Fee['monthly_fee'] + $Fee['remaining_fee'];
                }
            }
            // $Number_of_courses = count(Classes::find($Students->class_id)->courses);
            // $check_fee = Fee::where('');
            // $Fee['student_id'] = $Students->id;
            // $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
            // $Fee['admission_fee_status'] = '';
            // $Fee['remaining_fee'] = 0;

            //dd();
            //dd($Fee);
            //dd(request()->all());
            //$Students = Student::where('roll_no','=',request('roll_no'))->first();
            //$Students = Fee::where('roll_no')

        }
        return view('Fee.fee-collect',['Students' => $Students ?? '','Fee' => $Fee ?? '','FeeParticular' => $FeeParticular ?? '','Institute' => Institute::all()->first()]);
    }

    public function store(){

        //dd(request()->all());



        $min = (int)request('total_fee')/100*50;



        $messages = [
            'fee_submit_amount.min' => 'Minimum 50% Amount Submit',
          ];
        $values = request()->validate([
            'fee_month' => 'required',
            'fee_submit_date' => 'required',
            'fee_submit_amount' => 'required|integer|min:'.$min,
            'student_id' => 'required',
            'admission_fee_status' => 'required',
            'monthly_fee' => 'required',
            'remaining_fee' => 'required',
            'total_fee' => 'required',
            'admission_fee' => 'required',
            'registration_fee' => 'required',
            'books' => 'required',
            'uniform' => 'required',
        ], $messages);

        if(request('payment_method') == 'online'){
            session(['student_id' => request('student_id')]);
            session(['fee_month' => request('fee_month')]);
            session(['total_fee' => request('total_fee')]);
            session(['fee_submit_amount' => request('fee_submit_amount')]);
            session(['fee_submit_date' => request('fee_submit_date')]);
            return redirect('/online-payment');
        }
        else{

        $values['admission_fee_status'] = 'Yes';
        $values['remaining_fee'] = (int)$values['total_fee'] - (int)$values['fee_submit_amount'];

        Fee::create($values);

        return back()->with('success',"successfuly Fee Submit");
        }

        //dd(request()->all());
    }

    public function feeSlip(){
        $Fee;
        $Fee_print;
        if(request('roll_no') && request('fee_month')){
            $Students = Student::select('id')->where('roll_no','=',request('roll_no'))->first();
            if($Students){
                $Fee = Fee::where('student_id','=',$Students->id)->where('fee_month','=',request('fee_month'))->with('students')->first();
                $Fee_print = Fee::where('student_id','=',$Students->id)->get();
            }
        }

        //dd(Fee::where('student_id','=',1)->with('students')->get());
        return view('Fee.fee-slip',['Fee' => $Fee ?? '','Institute' => Institute::InstituteData(),'FeePrint' => $Fee_print ?? '']);
    }

    public function viewFee(){
        $Students = Student::where('email','=',auth()->user()->email)->first(['id']);
        $Fee = Fee::where('student_id','=',$Students->id)->get();

        return view('Fee.view-fee-detail',['Fee' => $Fee]);
    }

    public function onlinePayment(){
        return view('Fee.online-payment-form');
    }

    public function sendOnlinePayment(){
        //dd(request()->all());

        // $temp_amount 	= $product[0]->price*100;
		// $amount_array 	= explode('.', $temp_amount);
		// $pp_Amount 		= $amount_array[0];


        $DateTime 		= new \DateTime();
		$pp_TxnDateTime = $DateTime->format('YmdHis');

        $ExpiryDateTime = $DateTime;
		$ExpiryDateTime->modify('+' . 1 . ' hours');
		$pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');

        $pp_TxnRefNo = 'T'.$pp_TxnDateTime;

        //dd(Config::get('constants.jazzcash.MERCHANT_ID'));
        // "pp_Version"=> "1.1",
        // "pp_TxnType"=> "MWALLET",
        $post_data =  array(
            "pp_Language" => Config::get('constants.jazzcash.LANGUAGE'),
            "pp_MerchantID" => 'MC47378',
            "pp_SubMerchantID" => "",
            "pp_Password" => 'axe33yb013',
            "pp_TxnRefNo"=> $pp_TxnRefNo,
            "pp_MobileNumber"=>"03411728699",
            "pp_CNIC"=> "345678",
            "pp_Amount"=> "100",
            "pp_DiscountedAmount"=>"",
            "pp_TxnCurrency"=> Config::get('constants.jazzcash.CURRENCY_CODE'),
            "pp_TxnDateTime"=> $pp_TxnDateTime ,
            "pp_BillReference"=> "billRef",
            "pp_Description"=> "Description",
            "pp_TxnExpiryDateTime"=> $pp_TxnExpiryDateTime,
            "pp_SecureHash"=> "",
            "ppmpf_1" => "03455558158",
            "ppmpf_2" => 2,
            "ppmpf_3" => 3,
            "ppmpf_4" => 4,
            "ppmpf_5" => 5
        );

        $pp_SecureHash = $this->get_SecureHash($post_data);

		$post_data['pp_SecureHash'] = $pp_SecureHash;

        $make_call = $this->callAPI(json_encode($post_data));



        $make_call = json_decode($make_call, true);

        dd($make_call);



        //dd($post_data);
    }

    private function get_SecureHash($data_array)
	{
		//ksort($data_array);

		$str = '';
		foreach($data_array as $key => $value){
			if(!empty($value)){
				$str = $str . '&' . $value;
			}
		}

        //dd(Config::get('constants.jazzcash.INTEGERITY_SALT'));
        $INTEGERITY_SALT = '2vvzvu0dwt';
		$str = $INTEGERITY_SALT.$str;

		$pp_SecureHash = hash_hmac('sha256', $str, $INTEGERITY_SALT);

		return $pp_SecureHash;
	}

    private function callAPI($data)
	{
		$curl = curl_init();
		//OPTIONS:
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_URL, 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/2.0/Purchase/DoMWalletTransaction');
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		//EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);

		return $result;
	}
}

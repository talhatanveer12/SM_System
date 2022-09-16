<?php

return [
    'jazzcash' => [
        'MERCHANT_ID' 	 => 'MC47378',
        'PASSWORD' 		 => 'axe33yb013',
		'INTEGERITY_SALT'=> '2vvzvu0dwt',
		'CURRENCY_CODE'  => 'PKR',
		'VERSION'		 => '1.1',
		'LANGUAGE'  	 => 'EN',


		'RETURN_URL'  => 'http://127.0.0.1:8000/paymentStatus',
		'TRANSACTION_POST_URL'  => 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/2.0/Purchase/DoMWalletTransaction'

    ]
];

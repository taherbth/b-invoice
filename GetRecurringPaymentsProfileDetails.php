<?php

/** GetTransactionDetails NVP example; last modified 08MAY23.
 *
 *  Get detailed information about a single transaction. 
*/

$environment = 'sandbox';	// or 'beta-sandbox' or 'live'

/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_) {
	global $environment;

	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('tuhins_1351114574_biz_api1.gmail.com');
	$API_Password = urlencode('1351114606');
	$API_Signature = urlencode('AdfcyT4sNBLU3ISgRRnYiJXaGd4hAjDiSEgVQesi8ykS-6Sp5pC4c5bM');
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	$version = urlencode('51.0');

	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	// Set the API operation, version, and API signature in the request.
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);

	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);

	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}

	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}

	return $httpParsedResponseAr;
}

// Set request-specific fields.
$PROFILEID = urlencode('I-VBFVA5NB8XJD');

// Add request-specific fields to the request string.
$nvpStr = "&PROFILEID=$PROFILEID";

// Execute the API operation; see the PPHttpPost function above.
$recurringPaymentProfileDetails = PPHttpPost('GetRecurringPaymentsProfileDetails', $nvpStr);

echo "Current date: ". date("H:i:s");

if("SUCCESS" == strtoupper($recurringPaymentProfileDetails["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($recurringPaymentProfileDetails["ACK"])) {
	$data_org_billing_success['next_scheduled_billing_date'] = str_replace ('%2d', '-', $recurringPaymentProfileDetails['NEXTBILLINGDATE']);
    $data_org_billing_success['next_scheduled_billing_date'] = str_replace ('%3a', ':', $data_org_billing_success['next_scheduled_billing_date']);
    $data_org_billing_success['no_of_billing_cycle_completed'] = "no_of_billing_cycle_completed+1";
    $data_org_billing_success['no_of_billing_cycle_remaining'] = "total_billing_cycle-no_of_billing_cycle_completed";
    $data_org_billing_success['current_outstanding_balance'] = str_replace ('%2e', '.',$recurringPaymentProfileDetails['OUTSTANDINGBALANCE']);
    $data_org_billing_success['amount_of_last_successful_payment'] = str_replace ('%2e', '.',$recurringPaymentProfileDetails['LASTPAYMENTAMT']);
    $data_org_billing_success['total_paid_amount'] = "total_paid_amount+".$data_org_billing_success['amount_of_last_successful_payment'];
    $data_org_billing_success['date_of_last_successful_payment'] = str_replace ('%2d', '-', $recurringPaymentProfileDetails['LASTPAYMENTDATE']);
    $data_org_billing_success['date_of_last_successful_payment'] = str_replace ('%3a', ':',  $data_org_billing_success['date_of_last_successful_payment']);
    
    print_r($data_org_billing_success);exit;
                                                
    exit('GetTransactionDetails Completed Successfully: '.print_r($recurringPaymentProfileDetails, true));
} else  {
	exit('GetTransactionDetails failed: ' . print_r($recurringPaymentProfileDetails, true));
}

?>
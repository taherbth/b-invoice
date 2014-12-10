<?php

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

	$API_UserName = urlencode('tuhins_1351114574_biz_api1.gmail.com');
	$API_Password = urlencode('1351114606');
	$API_Signature = urlencode('AdfcyT4sNBLU3ISgRRnYiJXaGd4hAjDiSEgVQesi8ykS-6Sp5pC4c5bM');
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	$version = urlencode('58.0');

	// setting the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	// NVPRequest for submitting to server
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
	

	// setting the nvpreq as POST FIELD to curl
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// getting response from server
	$httpResponse = curl_exec($ch);

	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the RefundTransaction response details
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


$token = urlencode("token_from_setExpressCheckout");
$paymentAmount = urlencode("10.00");
$currencyID = urlencode("USD");						// or other currency code ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
$startDate = urlencode("2012-10-25T23:52:0");
$billingPeriod = urlencode("Day");				// or "Day", "Week", "SemiMonth", "Year"
$billingFreq = urlencode("1");						// combination of this and billingPeriod must be at most a year

$DESC = urlencode("Some Text");
$creditCardType = urlencode("Visa");
$creditCardAccount = urlencode("4647878288359292");
//$creditCardAccount = urlencode("4779297617944965");
$cardExpireDate = urlencode("102017");
$cardCvv2 = urlencode("111");
$PAYERSTATUS = urlencode("verified");
$STREET = urlencode("Stockholm");
$CITY = urlencode("Stockholm");
$STATE = urlencode("CA");
$COUNTRYCODE = urlencode("US");
$ZIP = urlencode("95131");
$FIRSTNAME = urlencode("Test");
$LASTNAME = urlencode("TAHER");
$EMAIL= urlencode("taher@technobd.com");
$INITAMT = urlencode("20.00");
$FAILEDINITAMTACTION = urlencode("ContinueOnFailure");
$MAXFAILEDPAYMENTS = urlencode("10");
$ITEMCATEGORY0 = urlencode("Digital");
$ITEMNAME0 = urlencode("Item Name");
$ITEMAMT0 = urlencode("10");
$ITEMQTY0 = urlencode("1");


$nvpStr="&AMT=$paymentAmount&CURRENCYCODE=$currencyID&PROFILESTARTDATE=$startDate";
$nvpStr .= "&BILLINGPERIOD=$billingPeriod&BILLINGFREQUENCY=$billingFreq&DESC=$DESC&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardAccount&EXPDATE=$cardExpireDate&CVV2=$cardCvv2&PAYERSTATUS=$PAYERSTATUS&STREET=$STREET
&CITY=$CITY&COUNTRYCODE=$COUNTRYCODE&ZIP=$ZIP&FIRSTNAME=$FIRSTNAME&LASTNAME=$LASTNAME
&INITAMT=$INITAMT&FAILEDINITAMTACTION=$FAILEDINITAMTACTION&MAXFAILEDPAYMENTS=$MAXFAILEDPAYMENTS
&L_PAYMENTREQUEST_0_ITEMCATEGORY0=$ITEMCATEGORY0&L_PAYMENTREQUEST_0_NAME0=$ITEMNAME0
&L_PAYMENTREQUEST_0_AMT0=$ITEMAMT0&L_PAYMENTREQUEST_0_QTY0=$ITEMQTY0";

$httpParsedResponseAr = PPHttpPost('CreateRecurringPaymentsProfile', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
    echo $httpParsedResponseAr['TRANSACTIONID'];
	exit('CreateRecurringPaymentsProfile Completed Successfully: '.print_r($httpParsedResponseAr, true));
} else  {
	exit('CreateRecurringPaymentsProfile failed: ' . print_r($httpParsedResponseAr, true));
}

?>

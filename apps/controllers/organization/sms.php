<?php


function member_communication_member_sms($receiver_contact_no,$sms_data){
    $konto = "ip1-1868";  //username
    $pass = "y5lhyp0q";
    $from_phone = $sms_data['sender_contact_no'];
    $phone_numbers = implode(",", $receiver_contact_no);
    $priority = 2;
    $content = $sms_data['sms_content'];
    $results = multiple_receipient($konto, $pass, $from_phone, $phone_numbers, $content, $priority);
    return $results;
}

function org_member_sms($receiver_contact_no,$sms_data){
    $konto = "ip1-1868";  //username
    $pass = "y5lhyp0q";
    $from_phone = "Adminscentral";
    $phone_numbers = $receiver_contact_no;
    $priority = 2;
    $content = $sms_data['sms_content'];
    $results = multiple_receipient($konto, $pass, $from_phone, $phone_numbers, $content, $priority);
    return $results;
}


function send_invoice_sms($data_faktura,$fak_id){
    $konto = "ip1-1868";  //username
    $pass = "y5lhyp0q";
    $from_phone = "Adminscentral";
    $phone_number = $data_faktura['bill_phone'];
    $priority = 2;
    $content = "Invoice no: ".$fak_id." , Total Price: ".$data_faktura['fak_total_price']." ".$data_faktura['fak_currency']." , Payable to: ".$data_faktura['pay_invoice_to']." , Vat: ".$data_faktura['fak_vat_rate']."%";
    $results = multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
    return $results;
}
function send_custom_invoice_sms($sms_data,$custom_faktura_id, $data){
    $konto = "ip1-1868";  //username
    $pass = "y5lhyp0q";
    $from_phone = $data['org_phone'];
    $phone_number = $sms_data['receiver_contact_nos'];
    $priority = 2;
    $content = $sms_data['sms_content'];
    $results = multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
    return $results;
}
    function multiple_receipient($konto, $pass, $from, $phone_number, $content, $priority) {
        $proxyhost = "";
        $proxyport = "";
        $proxyusername = "";
        $proxypassword = "";
        require_once(APPPATH . 'libraries/nusoap/nusoap' . EXT);
        $params = array('konto' => $konto, 'passwd' => $pass, 'till' => trim($phone_number), 'from' => $from, 'meddelande' => $content, 'prio' => $priority);
        // echo "<pre>";print_r($params);die();
        $wsdlurl = "http://web.smscom.se/sendSms/sendSms.asmx?WSDL";
        //$client = new nusoap_client($wsdlurl, 'wsdl');
        $client = new nusoap_client($wsdlurl, 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $client->authtype = 'certificate';
        $client->decode_utf8 = 0;
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call("sms", $params);
        return $result['smsResult'];
    }

//following function returns balance information
//echo balance($konto, $pass);
    function balance($konto, $pass) {
        require_once(APPPATH . 'libraries/nusoap/nusoap' . EXT);
        $params = array('Konto' => $konto, 'Passwd' => $pass);
        $wsdlurl = "http://web.smscom.se/sendSms/sendSms.asmx?WSDL";
        // $client = new nusoap_client($wsdlurl, 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $client = new nusoap_client($wsdlurl, 'wsdl');

        $client->authtype = 'certificate';
        $client->decode_utf8 = 0;
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call("balans", $params);
        return $result['balansResult'];
    }


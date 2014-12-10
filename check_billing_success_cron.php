<?php
   /* mysql_connect("localhost", "root", "");
    mysql_select_db("adminscentral");*/
    

    
    mysql_connect("adcentral-113786.phpmyadmin.mysql.binero.se", "113786_mw85527", "GmC_k822C#");
//mysql_select_db("mastulbd_mastul");
mysql_select_db("113786-adcentral");
    
    include_once 'payment_method/GetRecurringPaymentsProfileDetails.php';
    
    echo $sql = "SELECT * FROM organization_info org_info, org_billing_info bill_info 
    WHERE (org_info.payment_status=0 AND org_info.approval_status=0) AND 
    (bill_info.payment_method='creditcard' AND bill_info.bill_profileid!='NULL') AND org_info.id=bill_info.org_id";
    $result = mysql_query($sql) or die(mysql_error());  
    $num_rows = mysql_num_rows($result);
    if(mysql_num_rows($result)>0){
        while ($num_rows>0) {
            $num_rows-=$num_rows;
            $row = mysql_fetch_array($result) or die(mysql_error());
            $profile_id = $row['bill_profileid'];
            $org_id = $row['org_id'];
            $nvpStr="&PROFILEID=".$profile_id;
            $recurringPaymentProfileDetails = getRecurringPaymentProfileDetails('GetRecurringPaymentsProfileDetails', $nvpStr);
            
            //////////////////////////////print_r($recurringPaymentProfileDetails);
            
            
            if("SUCCESS" == strtoupper($recurringPaymentProfileDetails["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($recurringPaymentProfileDetails["ACK"])) {
                                                                       
                                       if($recurringPaymentProfileDetails['NUMCYCLESCOMPLETED']>0){
                                                                                        
                                                $next_scheduled_billing_date = str_replace ('%2d', '-', $recurringPaymentProfileDetails['NEXTBILLINGDATE']);
                                                $next_scheduled_billing_date = str_replace ('%3a', ':', $next_scheduled_billing_date);
                                                $next_scheduled_billing_date = str_replace ('Z', '', $next_scheduled_billing_date);
                                                $no_of_billing_cycle_completed = 1;
                                                $no_of_billing_cycle_remaining = 3-1;
                                               // $no_of_billing_cycle_remaining = $TOTALBILLINGCYCLES-1;
                                                $current_outstanding_balance = str_replace ('%2e', '.',$recurringPaymentProfileDetails['OUTSTANDINGBALANCE']);
                                                $amount_of_last_successful_payment = str_replace ('%2e', '.',$recurringPaymentProfileDetails['LASTPAYMENTAMT']);
                                                //$total_paid_amount= "total_paid_amount+".$amount_of_last_successful_payment;
                                                $total_paid_amount= $amount_of_last_successful_payment;
                                                $date_of_last_successful_payment = str_replace ('%2d', '-', $recurringPaymentProfileDetails['LASTPAYMENTDATE']);
                                                $date_of_last_successful_payment = str_replace ('%3a', ':',  $date_of_last_successful_payment);
                                                $date_of_last_successful_payment = str_replace ('Z', '',  $date_of_last_successful_payment);
                                                //$success = $this->info_model->update_org_billing_success($data_org_billing_success,$org_billing_success_insert_id);
                                                
                                                
                                                echo $sql_org_billing_success_update ="UPDATE org_billing_success 
                                                                                                        SET  next_scheduled_billing_date='$next_scheduled_billing_date',
                                                                                                                no_of_billing_cycle_completed= $no_of_billing_cycle_completed,
                                                                                                                no_of_billing_cycle_remaining = $no_of_billing_cycle_remaining,
                                                                                                                current_outstanding_balance=$current_outstanding_balance,
                                                                                                                amount_of_last_successful_payment = $amount_of_last_successful_payment,
                                                                                                                total_paid_amount = $total_paid_amount,
                                                                                                                date_of_last_successful_payment = '$date_of_last_successful_payment'
                                                                                                                WHERE profileid='$profile_id'";
                                                $result = mysql_query($sql_org_billing_success_update);
                                                
                                                $total_days = $duration*30;                                
                                                $expire_date= time() + ($total_days * 24 * 60 * 60);
                                                //$data_update = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>time(),'expire_date'=>$expire_date);     
                                                
                                                //$success = $this->info_model->update_org_approve($data_update, $last_insert_ids['org_id']);   
                                                
                                                $activation_date = time();
                                                $sql_update_org_approve = "UPDATE organization_info 
                                                                                                SET approval_status=1,
                                                                                                payment_status=1,
                                                                                                activation_date=$activation_date,
                                                                                                expire_date=$expire_date WHERE org_id=$org_id";
                                                $result = mysql_query($sql_update_org_approve);
                                                
                                                if(mysql_affected_rows()>0){
                                                    $data['first_name']=$data_admin_user['admin_user_data']['first_name'];
                                                    $data['username']=$data_admin_user['admin_user_data']['username'];
                                                    $data['email']=$data_admin_user['admin_user_data']['email'];                                    
                                                    $data['org_number']=$data_organization['organization_data']['org_number'];
                                                    $data['org_name']=$data_organization['organization_data']['org_name'];                                    
                                                    $data['org_phone']=$data_organization['organization_data']['org_phone'];;                
                                                    $data['password']= $password;    
                                    
                                                    /*if($data_admin_user['admin_user_data']['password_receive_by_email']){                                             
                                                        $this->send_password_by_email($data);
                                                    }
                                                    if($data_admin_user['admin_user_data']['password_receive_by_sms']){
                                                        $this->send_password_by_sms($data);
                                                    } */
                                                }
                                             
                                                ///////
                                        }else{ //$data_org_billing_success['no_of_billing_cycle_remaining'] = $TOTALBILLINGCYCLES;
                                                    //$success = $this->info_model->update_org_billing_success($data_org_billing_success,$org_billing_success_insert_id);
                                                }
                                        //exit('GetTransactionDetails Completed Successfully: '.print_r($recurringPaymentProfileDetails, true));
                                    } else  {
                                                       //exit('GetTransactionDetails failed: ' . print_r($recurringPaymentProfileDetails, true));
                                    }
            
            ////////////////////////////////
            
        }
    }
    
?>
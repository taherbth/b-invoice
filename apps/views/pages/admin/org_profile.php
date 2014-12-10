<h3 class="content_edit"><?php echo $this->lang->line('org_details_msg');?></h3>
<?php 


 echo $this->session->flashdata('message'); ?>


<?php
//$query = $this->db->query("select * from user_info where id='".$org_id."'");
//foreach ($query->result() as $p_info):

$bill_first_name = "";
$bill_last_name = "";
$bill_primary_address = "";
$bill_optional_address = "";
$bill_zip = "";
$bill_city = "";
$bill_country = "";
$bill_email = "";
$bill_phone_no = "";
$name_on_credit_card= "";
$credit_card_type= "";
$expire_date= "";
$payment_method = "";

foreach ($query1 as $p_info):

$org_country="";
$country = "";
$bill_country = "";

if($p_info->org_country=="DEU"){$org_country = "GERMAN";}
if($p_info->org_country=="NOR"){$org_country= "NORWAY";}
if($p_info->org_country=="DNK"){$org_country = "DENMARK";}
if($p_info->org_country=="FIN"){$org_country= "FINLAND";}
if($p_info->org_country=="GBR"){$org_country = "UK";}
if($p_info->org_country=="SWE"){$org_country = "SWEDEN";}


if($p_info->country=="DEU"){$country = "GERMAN";}
if($p_info->country=="NOR"){$country= "NORWAY";}
if($p_info->country=="DNK"){$country = "DENMARK";}
if($p_info->country=="FIN"){$country= "FINLAND";}
if($p_info->country=="GBR"){$country = "UK";}
if($p_info->country=="SWE"){$country = "SWEDEN";}



$org_billing_info = $this->info_model->get_customer_billing_info($p_info->org_id);        
if($org_billing_info){
        foreach ($org_billing_info as $billing_info) {  
            $bill_first_name = $billing_info->bill_first_name;
            $bill_last_name = $billing_info->bill_last_name;
            $bill_primary_address = $billing_info->bill_primary_address;
            $bill_optional_address = $billing_info->bill_optional_address;
            $bill_zip = $billing_info->bill_zip;
            $bill_city = $billing_info->bill_city;
            $bill_country = $billing_info->bill_country;
            $bill_email = $billing_info->bill_email;
            $bill_phone_no = $billing_info->bill_phone_no;
            $name_on_credit_card= $billing_info->name_on_credit_card;
            $credit_card_type= $billing_info->credit_card_type;
            $expire_date= $billing_info->credit_card_expire_month."/".$billing_info->credit_card_expire_year;
            $payment_method = $billing_info->payment_method;
        }
}


if($bill_country=="DEU"){$bill_country = "GERMAN";}
if($bill_country=="NOR"){$bill_country= "NORWAY";}
if($bill_country=="DNK"){$bill_country = "DENMARK";}
if($bill_country=="FIN"){$bill_country= "FINLAND";}
if($bill_country=="GBR"){$bill_country = "UK";}
if($bill_country=="SWE"){$bill_country = "SWEDEN";}

                
endforeach;

?>
<style>
table{ font-style:italic}
</style>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<div style="width:900px">
<span>
<span style="float:right;">

<a href="<?php echo base_url().'admin/info/modify_org/'.$p_info->org_id;?>"> 

    <button class="c">Edit</button></a></span>
</span>
</div>
    <div style="width:900px"><span style=" padding-left:300px; font-weight:bold; color:green"><span>
                </div>
                <div style="width:900px; ">
                    <div style="width:220px; float:left; position:relative;">
                        <div id="org-logo">
                            <?php echo '<img style="" src=' . base_url() . 'uploads/' . $p_info->member_photo . ' width="160" height="160" />'; ?>                        
                        </div>
                    </div>
                    <div style="background-color:#E8E8E8; border:1px solid #CCCCCC; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:670px; float: left">
                        <div style="width:400px; float:left; position:relative;  margin-top:20px;  ">
                            <span style=" padding-left:20px;"><b><font color="green"><?php echo $this->lang->line('label_profile_info');?></font></b><span>
                                    <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                        <tbody>
                                            <tr> 
                                                <td width="38%" style="text-align:center; padding-left:40px"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_number; ?> </td>

                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:50px"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center"><font class="inside"><?php echo $this->lang->line('label_address_line_one');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_primary_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center"><font class="inside"><?php echo $this->lang->line('label_address_line_two');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_optional_address; ?> </td>
                                            </tr>
                                            
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_zip');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_zip; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_city');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_city; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_country');?>:</font></td>
                                                <td width="33%"><?php echo $org_country; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_phone');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->org_phone; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="padding-left:20px;"><font class="inside"><b><font color="green"><?php echo $this->lang->line('label_org_admin_info');?>:</font></b></font></td>
                                                <td width="33%"> </td>

                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_first_name');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->first_name; ?> </td>

                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center; padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_last_name');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->last_name; ?> </td>
                                            </tr>
                                             <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_username');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->username; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_person_no');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->person_number; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:80px"><font class="inside"><?php echo $this->lang->line('label_email');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->email; ?> </td>
                                           </tr>
                                           <tr>
                                                <td width="18%" style="text-align:center;padding-left:80px"><font class="inside"><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->phone_no; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:75px"><font class="inside"><?php echo $this->lang->line('label_address_line_one');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->primary_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:75px"><font class="inside"><?php echo $this->lang->line('label_address_line_two');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->optional_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_zip');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->zip; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_city');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->city; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_country');?>:</font></td>
                                                <td width="33%"><?php echo $country; ?> </td>
                                            </tr>
                                        </tbody></table>
                                    </div>  
                                    <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                            <tbody>
                                               
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green"><?php echo $this->lang->line('label_credit_card_info');?>:</font></b></font>
                                                    <?php if($name_on_credit_card==""){echo "N/A";}?>
                                                    </td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <?php if($name_on_credit_card){?>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_credit_card_name_on_card');?> :</font></td>
                                                    <td width="33%"><?php echo $name_on_credit_card; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_credit_card_type');?>:</font></td>
                                                    <td width="33%"><?php echo $credit_card_type; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_expire_date');?>:</font></td>
                                                    <td width="33%"> <?php echo $expire_date; ?><?php echo " (".$this->lang->line('label_month')."/".$this->lang->line('label_year').")";?> </td>
                                                </tr>
                                               <?php } ?>
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green"><?php echo $this->lang->line('label_package_info');?>:</font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_name');?> :</font></td>
                                                    <?php
                                                    $query = $this->db->query("select * from package where id='" . $p_info->package_name . "'");
                                                    foreach ($query->result() as $info) {
                                                        $p_name = $info->package_name;
                                                        $currency_data = $this->info_model->get_currency($info->currency_id);
                                                    }
                                                    if (!empty($p_name)):$p_name = $p_name;
                                                    else:$p_name = "";
                                                    endif;
                                                    ?>

                                                    <td width="33%"><?php echo $p_name; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_no_of_member');?>:</font></td>
                                                    <td width="33%"><?php echo $info->no_of_member; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_duration');?>:</font></td>
                                                    <td width="33%"><?php echo $info->duration; ?>  <?php echo $this->lang->line('label_month')."(s)";?></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_subscription_fee')."/".$this->lang->line('label_month');?>:</font></td>
                                                    <td width="33%"><?php echo $info->amount; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?>:</font></td>
                                                    <td width="33%"><?php echo $info->sms_cost; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?>:</font></td>
                                                    <td width="33%"><?php echo $info->letter_cost; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
                                                </tr>
                                               
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?>:</font></td>
                                                    <td width="33%"><?php if($p_info->org_allowed_sms_per_month){echo $p_info->org_allowed_sms_per_month; } else {echo "N/A";}?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td width="18%"><font class="inside"><?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>:</font></td>
                                                    <td width="33%"><?php if($p_info->org_allowed_letter_per_month){echo $p_info->org_allowed_letter_per_month; } else {echo "N/A";}?></td>
                                                </tr>
                                               
                                                 <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green"><?php echo $this->lang->line('label_billing_info');?>:</font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                
                                            <tr>
                                                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_first_name');?>:</font></td>
                                                <td width="33%"><?php echo $bill_first_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_last_name');?>:</font></td>
                                                <td width="33%"><?php echo $bill_last_name; ?> </td>
                                            </tr>
                                             
                                            <tr>
                                                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_email');?>:</font></td>
                                                <td width="33%"><?php echo $bill_email; ?> </td>
                                           </tr>
                                           <tr>
                                                <td width="18%" ><font class="inside"><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</font></td>
                                                <td width="33%"><?php echo $bill_phone_no; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" ><font class="inside"><?php echo $this->lang->line('label_address_line_one');?>:</font></td>
                                                <td width="33%"><?php echo $bill_primary_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" ><font class="inside"><?php echo $this->lang->line('label_address_line_two');?>:</font></td>
                                                <td width="33%"><?php echo $bill_optional_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" ><font class="inside"><?php echo $this->lang->line('label_zip');?>:</font></td>
                                                <td width="33%"><?php echo $bill_zip; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" ><font class="inside"><?php echo $this->lang->line('label_city');?>:</font></td>
                                                <td width="33%"><?php echo $bill_city; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" ><font class="inside"><?php echo $this->lang->line('label_country');?>:</font></td>
                                                <td width="33%"><?php echo $bill_country; ?> </td>
                                            </tr>
                                            
                                            
                                            
                                            </tbody></table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
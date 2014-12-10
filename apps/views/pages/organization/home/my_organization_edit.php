
<h3 class="content_edit"><?php echo $this->lang->line('my_org_update_msg'); ?></h2>

<?php
if($configuration_change_org){
        if(count($query1)){
            foreach ($query1 as $p_info):
                $org_billing_info = $this->info_model->get_customer_billing_info($p_info->org_id);   
                foreach ($org_billing_info as $bill_info):
                    $bill_country = $bill_info->bill_country;
                endforeach;
            endforeach;
        }
       
      $org_category_id = $p_info->org_category;
       $org_number= array(
              'name'      => 'org_number',
              'id'        => 'org_number',
              'value'     => $p_info->org_number,          
			  'size'       =>"30",
               'readonly' => "readonly"
            );
		 $org_name = array(
              'name'      => 'org_name',
              'id'        => 'org_name',
              'value'     => $p_info->org_name,          
			  'size'       =>"30",
               'readonly' => "readonly"
             );             
            $org_email = array(
              'name'      => 'org_email',
              'id'        => 'org_email',
              'value'     => $p_info->org_email,          
			  'size'       =>"30"
             );
             $org_web = array(
              'name'      => 'org_web',
              'id'        => 'org_web',
              'value'     => $p_info->org_web,          
			  'size'       =>"30"
             );
         
		 $org_description = array(
              'name'      => 'org_description',
              'id'        => 'org_description',
              'value'     => $p_info->org_description,          
              'style'       => 'width:340px;height:120px'
            );
                        
        $org_street_address = array(
              'name'      => 'org_street_address',
              'id'        => 'org_street_address',
              'value'     => $p_info->org_street_address,          
			  'style'       => 'width:340px;height:40px'           
            );       
                 
        $org_mobile_phone = array(
              'name'      => 'org_mobile_phone',
              'id'        => 'org_mobile_phone',
              'value'     => $p_info->org_mobile_phone,          
			  'size'       =>"30",
             );
            
        $org_zip = array(
              'name'      => 'org_zip',
              'id'        => 'org_zip',
              'value'     => $p_info->org_zip,          
			  'size'       =>"30",
            );
		   
         $org_city = array(
              'name'      => 'org_city',
              'id'        => 'org_city',
              'value'     => $p_info->org_city,          
			  'size'       =>"30",
             );
            
                
         $org_country_option = array(
			  ''  => 'Select Country:',
              'SWE'        => 'Sweden',
              'DEU'      => 'German',
              'NOR'      => 'Norway',
              'DNK'      => 'Denmark',
              'FIN'      => 'Finland',
              'GBR'      => 'UK',
            );
        $credit_card_type_option = array(
			  'Visa'        => 'Visa',
              'MasterCard'      => 'MasterCard',
              'Discover'      => 'Discover',
              'Amex'      => 'Amex',
        );
            
        $org_bank_acc_no_one = array(
              'name'      => 'org_bank_acc_no_one',
              'id'        => 'org_bank_acc_no_one',
              'value'     => $p_info->org_bank_acc_no_one,          
			  'size'       =>"30",
               );
        $org_bank_acc_no_two = array(
              'name'      => 'org_bank_acc_no_two',
              'id'        => 'org_bank_acc_no_two',
              'value'     => $p_info->org_bank_acc_no_two,          
			  'size'       =>"30",
               );
        $org_bank_acc_no_three = array(
              'name'      => 'org_bank_acc_no_three',
              'id'        => 'org_bank_acc_no_three',
              'value'     => $p_info->org_bank_acc_no_three,          
			  'size'       =>"30",
               );
        $org_bank_acc_type_option = array(
			  ''  => 'Select Type:',
              'Bankgiro'        => 'Bankgiro',
              'PlusGiro'      => 'PlusGiro',
              'Bankaccount'      => 'Bankaccount',
              'SWIFT'      => 'SWIFT',
              'IBAN'      => 'IBAN'
            );

       
        $first_name= array(
              'name'      => 'first_name',
              'id'        => 'first_name',
              'value'     => $p_info->first_name,          
			  'size'       =>"30",
            );
		 $last_name = array(
              'name'      => 'last_name',
              'id'        => 'last_name',
              'value'     => $p_info->last_name,          
			  'size'       =>"30",
            );
         
		 $mobile_phone = array(
              'name'      => 'mobile_phone',
              'id'        => 'mobile_phone',
              'value'     => $p_info->mobile_phone,          
              'size'       =>"30",
             );
            
        $email = array(
              'name'      => 'email',
              'id'        => 'email',
              'value'     => $p_info->email,          
			  'size'       =>"30",
                  
            );
            
        $username= array(
              'name'      => 'username',
              'id'        => 'username',
              'value'     => $p_info->username,  
              'size'       =>"30"
			  );
        
        $person_number= array(
              'name'      => 'ssn_or_person_no',
              'id'        => 'ssn_or_person_no',
              'value'     => $p_info->ssn_or_person_no,          
			  'size'       =>"30",
             );
                        
        $street_address = array(
              'name'      => 'street_address',
              'id'        => 'street_address',
              'value'     => $p_info->street_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
                  
        $zip = array(
              'name'      => 'zip',
              'id'        => 'zip',
              'value'     => $p_info->zip,          
			  'size'       =>"30",
            );
		   
         $city = array(
              'name'      => 'city',
              'id'        => 'city',
              'value'     => $p_info->city,          
			  'size'       =>"30",
              );
              
    
            
         $country_option = array(
			''  => 'Select Country:',
              'SWE'        => 'Sweden',
              'DEU'      => 'German',
              'NOR'      => 'Norway',
              'DNK'      => 'Denmark',
              'FIN'      => 'Finland',
              'GBR'      => 'UK',
            );          
            
        $use_account_info_billing_check= array(
              'name'      => 'use_account_info_billing',
              'id'        => 'use_account_info_billing',
              'value'     => "",          
			  'onClick'  =>'return setFormData(this.value);',
              'checked' => FALSE,
            );
            
        $card_expire_date_month_option= array(
              '01'      => '01',
              '02'      => '02',
              '03'      => '03',    
              '04'      => '04',
              '05'      => '05',
              '06'      => '06',    
              '07'      => '07',
              '08'      => '08',
              '09'      => '09',    
              '10'      => '10',    
              '11'      => '11',    
              '12'      => '12'   
            );
       
        $years = "";
        $thisyear = date("Y");
          
        $card_expire_date_year_option= array();
         for($i=$thisyear;$i<=$thisyear+23;$i++)
        {
            $card_expire_date_year_option[$i] = $i;
        }
    
        $credit_card_no= array(
              'name'      => 'credit_card_no',
              'id'        => 'credit_card_no',
              'value'     => $bill_info->credit_card_no,          
			  'size'       =>"30",
            );
            
        $name_on_credit_card= array(
              'name'      => 'name_on_credit_card',
              'id'        => 'name_on_credit_card',
              'value'     => $bill_info->name_on_credit_card,          
			  'size'       =>"30",
            );
        
         $credit_card_verification_code= array(
              'name'      => 'credit_card_verification_code',
              'id'        => 'credit_card_verification_code',
              'value'     => $bill_info->credit_card_verification_code,          
			  'size'       =>"30",
            );
                  
        $bill_first_name= array(
              'name'      => 'bill_first_name',
              'id'        => 'bill_first_name',
              'value'     => $bill_info->bill_first_name,          
			  'size'       =>"30",
            );
		 $bill_last_name = array(
              'name'      => 'bill_last_name',
              'id'        => 'bill_last_name',
              'value'     => $bill_info->bill_last_name,          
			  'size'       =>"30",
            );
         
		 $bill_mobile_phone = array(
              'name'      => 'bill_mobile_phone',
              'id'        => 'bill_mobile_phone',
              'value'     => $bill_info->bill_mobile_phone,          
              'size'       =>"30",
             );
            
        $bill_email = array(
              'name'      => 'bill_email',
              'id'        => 'bill_email',
              'value'     => $bill_info->bill_email,          
			  'size'       =>"30",
                  
            );
                         
        $bill_street_address = array(
              'name'      => 'bill_street_address',
              'id'        => 'bill_street_address',
              'value'     => $bill_info->bill_street_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
            
        $bill_zip = array(
              'name'      => 'bill_zip',
              'id'        => 'bill_zip',
              'value'     => $bill_info->bill_zip,          
			  'size'       =>"30",
            );
		   
         $bill_city = array(
              'name'      => 'bill_city',
              'id'        => 'bill_city',
              'value'     => $bill_info->bill_city,          
			  'size'       =>"30",
              );
            
                
         $bill_country_option = array(
			''  => 'Select Country:',
              'SWE'        => 'Sweden',
              'DEU'      => 'German',
              'NOR'      => 'Norway',
              'DNK'      => 'Denmark',
              'FIN'      => 'Finland',
              'GBR'      => 'UK',
            );
                        
            $radio_invoice = array (
            'name' => 'payment_method',
            'value' => 'invoice',
            'onChange'=>"return showhide('hide');" ,
            'checked' => TRUE,
            );
            
            $radio_paypal = array (
            'name' => 'payment_method',
            'value' => 'paypal',
            'onChange'=>"return showhide('show');" ,
            'checked' => FALSE,
            );            
            
        $billing_terms_condition= array(
              'name'      => 'billing_terms_condition',
              'id'        => 'billing_terms_condition',
              'value'     => "Yes",          
        );
        
         $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('update_btn_msg'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
        
?>


<script language="javascript">
    function setFormData(val){
        
       if(document.getElementById('use_account_info_billing').checked){
           //alert(document.getElementById('first_name').value);
           document.getElementById('bill_first_name').value=document.getElementById('first_name').value;
           document.getElementById('bill_last_name').value=document.getElementById('last_name').value;
           document.getElementById('bill_mobile_phone').value=document.getElementById('mobile_phone').value;
           document.getElementById('bill_email').value=document.getElementById('email').value;
           document.getElementById('bill_street_address').value=document.getElementById('street_address').value;
           document.getElementById('bill_zip').value=document.getElementById('zip').value;
           document.getElementById('bill_city').value=document.getElementById('city').value;
           //document.getElementById('bill_country').value=document.getElementById('country').value;
           

            for ( var i = 0; i <bill_country.options.length; i++ ) {
                if ( bill_country.options[i].value == document.getElementById('country').value) {
                    bill_country.options[i].selected = true;
                    return;
                }
            }
           
    }
    else{            
           document.getElementById('bill_first_name').value="<?php echo $bill_info->bill_first_name;?>";
           document.getElementById('bill_last_name').value="<?php echo $bill_info->bill_last_name;?>";
           document.getElementById('bill_mobile_phone').value="<?php echo  $bill_info->bill_mobile_phone;?>";
           document.getElementById('bill_email').value="<?php echo $bill_info->bill_email;?>";
           document.getElementById('bill_street_address').value="<?php echo $bill_info->bill_street_address;?>";
           document.getElementById('bill_zip').value="<?php echo $bill_info->bill_zip;?>";
           document.getElementById('bill_city').value="<?php echo $bill_info->bill_city;?>";           
           document.getElementById('bill_country').value="<?php echo $bill_info->bill_country;?>";           
        }
    }

    function showhide(val){ 
        if (document.getElementById){ 
            obj = document.getElementById("credit_card_info"); 
            if (val== "show"){ 
                obj.style.display = ""; 
            } else { 
                obj.style.display = "none"; 
            } 
        } 
    } 

</script>

<style>
    input {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script>

function check_value()
    {
        var myvar = document.getElementById("org_category").value;
        if(myvar=='other')
        {
            $("#a").show();
        }
        else
        {
            $("#a").hide();
        }
}

    function getSubCat1(val)
    {
        url="<?php echo base_url(); ?>get_username.php?cid="+val;
        try
        {// Firefox, Opera 8.0+, Safari, IE7
            xm=new XMLHttpRequest();
        }
        catch(e)
        {// Old IE
            try
            {
                xm=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e)
            {
                alert ("Your browser does not support XMLHTTP!");
                return;
            }
        }		
        xm.open("GET",url,false);
        xm.send(null);
        msg=xm.responseText;
		
        document.getElementById("availability_status").innerHTML=msg;				
    }

</script>

<?php echo form_open("organization/info/modify_org_process"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

<table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_org_info'); ?>: </b><br/><br/></font></td>
                <td width="33%"></td>
        </tr>
        
                
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_no'); ?>:</font></td>
                <td width="33%">
                <?=form_input($org_number);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_number')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_name'); ?>:</font></td>
                <td width="33%"><?=form_input($org_name);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_email'); ?>:</font></td>
                <td width="33%"><?=form_input($org_email);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_web'); ?>:</font></td>
                <td width="33%"><?=form_input($org_web);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_web')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_description'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($org_description);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_description')); ?></span> 
                </td>
            </tr>
            
            <tr>
            <td width="18%"><font class="inside"><?php echo $this->lang->line('label_org_category'); ?>:</font></td>
            <td width="33%">
                <?php $query1 = $this->db->query("select * from org_category"); ?>
                <select name="org_category" id="org_category" style="width:300px" tabindex="18" onchange="check_value(this.value)">
                <option value=""><?php echo $this->lang->line('label_select'); ?></option>
                <?php foreach ($query1->result() as $info1): ?>
                    <option value="<?php echo $info1->id;?>" <?php if($info1->id==$org_category_id){?>selected='selected'<?php } ?>><?php echo $info1->category_name; ?></option>         
                <?php endforeach; ?>
                <option value="other"><?php echo $this->lang->line('label_other'); ?></option>
                </select>
                <span class="markcolor"><?php echo ucwords(form_error('org_category')); ?></span>  
            </td>
        </tr>
        <tr id="a" style="display:none">
            <td width="18%"><font class="inside"><?php echo $this->lang->line('label_org_category'); ?>:</font></td>
            <td width="33%">
            <input type="text"  size="30" maxlength="30" name="category_name" > 
            <span class="markcolor"><?php echo ucwords(form_error('category_name')); ?></span>
            </td>
        </tr>
           
            
            
            <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_address'); ?>:</b></font></td>
                <td width="33%"></td>
            </tr>

            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_street_address'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($org_street_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_street_address')); ?></span> 
                </td>
            </tr>          
                         
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_mobile_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($org_mobile_phone);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_mobile_phone')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_zip'); ?>:</font></td>
                <td width="33%"><?=form_input($org_zip);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_zip')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_city'); ?>:</font></td>
                <td width="33%"><?=form_input($org_city);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_city')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_country'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('org_country',$org_country_option,$p_info->org_country,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_country')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_bank_payment_info'); ?>:</b></font></td>
                <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_bank_payment')."&nbsp; 1"; ?>:</font></td>
                <td width="18%"><?=form_input($org_bank_acc_no_one);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_no_one')); ?></span>
                </td>
                <td width="18%"><?=form_dropdown('org_bank_acc_type_one',$org_bank_acc_type_option,$p_info->org_bank_acc_type_one,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_type_one')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="38%"></td>
                <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_bank_payment')."&nbsp; 2"; ?>:</font></td>
                <td width="18%"><?=form_input($org_bank_acc_no_two);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_no_two')); ?></span>
                </td>
                <td width="18%"><?=form_dropdown('org_bank_acc_type_two',$org_bank_acc_type_option,$p_info->org_bank_acc_type_two,'class="form_input_select"');?>
                    <span class="markcolor"></span>
                </td>
            </tr>
            
            <tr>
                <td width="38%"></td>
                <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_bank_payment')."&nbsp; 3"; ?>:</font></td>
                <td width="18%"><?=form_input($org_bank_acc_no_three);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_no_three')); ?></span>
                </td>
                <td width="18%"><?=form_dropdown('org_bank_acc_type_three',$org_bank_acc_type_option,$p_info->org_bank_acc_type_three,'class="form_input_select"');?>
                    <span class="markcolor"></span>
                </td>
            </tr>
        </tbody></table>
        

        
        <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo "".$this->lang->line('label_select_payment_method'); ?>: </b><br/></font></td>
                <td width="33%"></td>
        </tr>
        
        <tr>
                <td width="10%"><font class="inside"><?php echo $this->lang->line('label_invoice'); ?>: <?=form_radio($radio_invoice);?><span class="markcolor"><?php echo ucwords(form_error('radio_invoice')); ?></span> </font></td>
                
                <td width="10%"><font class="inside"><?php echo $this->lang->line('label_paypal'); ?>:</font><?=form_radio($radio_paypal);?><span class="markcolor"><?php echo ucwords(form_error('radio_paypal')); ?></span></td>
                </td>
        </tr>
        
        
        <tr>
                <td width="38%"><font class="inside"></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="38%"></td>
                <td width="33%"></td>
            </tr>
            
           </tbody></table>
    
            <!-- Credit Card Info--!>
                <div id="credit_card_info" style="display: none;"><font class="inside">
                    <div><b><?php echo $this->lang->line('label_credit_card_info'); ?>:</b></font></div><br/>
                    <div style="float:left;">
                        <font class="inside"><?php echo $this->lang->line('label_credit_card_no'); ?>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                        <?=form_input($credit_card_no);?><span class="markcolor"><?php echo ucwords(form_error('credit_card_no')); ?></span> 
                    </div>
                    <div style="margin-left:20px;float:left;">
                        <font class="inside"><?php echo $this->lang->line('label_name_on_card'); ?>:</font>
                        <?=form_input($name_on_credit_card);?><span class="markcolor"><?php echo ucwords(form_error('name_on_credit_card')); ?></span> 
                    </div>               
                    
                    <div style="margin-top:15px;clear:both;float:left;">
                        <font class="inside"><?php echo $this->lang->line('label_credit_card_type'); ?>: &nbsp;&nbsp;</font>
                        <?=form_dropdown('credit_card_type',$credit_card_type_option,$bill_info->credit_card_type,'id="credit_card_type"','class="form_input_select"');?>
                        <span class="markcolor"><?php echo ucwords(form_error('credit_card_type')); ?></span> 
                    </div>
                    
                    <div style="margin:15px 0px 0px 132px;float:left;">
                        <font class="inside"><?php echo $this->lang->line('label_credit_card_cvv2'); ?>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                        <?=form_input($credit_card_verification_code);?><span class="markcolor"><?php echo ucwords(form_error('credit_card_verification_code')); ?></span> 
                    </div>
                    
                     <div style="margin-top:15px;clear:both;float:left;">
                        <font class="inside"><?php echo $this->lang->line('label_expire_date'); ?>:</font>
                        <?=form_dropdown('card_expire_date_month',$card_expire_date_month_option,$bill_info->credit_card_expire_month,'id="card_expire_date_month"','class="form_input_select"');?>
                        <span class="markcolor"><?php echo ucwords(form_error('card_expire_date_month')); ?></span> 
                    </div>
                    <div style="margin-top:15px;float:left;">
                        <font class="inside"></font>
                        <?=form_dropdown('card_expire_date_year',$card_expire_date_year_option,$bill_info->credit_card_expire_year,'id="card_expire_date_year"','class="form_input_select"');?>
                        <span class="markcolor"><?php echo ucwords(form_error('card_expire_date_year')); ?></span> 
                    </div>
                    
                </div>
                
                <br/><br/><br/>
                    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">

       <tr>
                <td width="38%"><font class="inside"><br/><br/><b><?php echo "".$this->lang->line('label_enter_billing_address'); ?>: </b><br/><br/></font></td>
                <td width="72%"><br/><br/><?php //echo form_checkbox($use_account_info_billing_check);  echo $this->lang->line('label_enter_billing_account_info');?></td>

        </tr>
        
        <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_first_name'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_first_name);?><span class="markcolor"><?php echo ucwords(form_error('bill_first_name')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_last_name'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_last_name);?><span class="markcolor"><?php echo ucwords(form_error('bill_last_name')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
                       
            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_street_address'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($bill_street_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_street_address')); ?></span> 
                </td>
            </tr>          
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_zip'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_zip);?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_zip')); ?></span>
                </td>
            </tr>            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_city'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_city);?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_city')); ?></span>
                </td>
            </tr>            
            <tr>
                <td width="18%"><font class="inside">
                <?php echo $this->lang->line('label_country'); ?>:
                </font></td>
                <td width="33%"><?=form_dropdown('bill_country',$bill_country_option,$bill_country,'id="bill_country"','class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_country')); ?></span>
                </td>
            </tr>
            
                       
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_email'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_email);?><span class="markcolor"><?php echo ucwords(form_error('bill_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_mobile_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_mobile_phone);?><span class="markcolor"><?php echo ucwords(form_error('bill_mobile_phone')); ?></span> 
                </td>
            </tr>
            <br/><br/>
                       
        </tbody>
        </table>
        <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">
                </td>
            </tr>
            <tr>
                <td width="18%"><?=form_hidden('org_id', $org_id);?></td>
                        
            </tr>
            <tr>
                <td width="38%"><td width="33%">
                <?=form_submit($submit);?>   
                 </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


    <?php } else { ?> <span style="color:red;"><?php echo $this->lang->line('my_org_no_access_msg');?></span> <?php }  ?>


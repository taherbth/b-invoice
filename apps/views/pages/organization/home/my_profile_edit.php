
<h3 class="content_edit"><?php echo $this->lang->line('mem_profile_update_msg');?></h3>

<?php

        if(count($query1)){
            foreach ($query1 as $p_info):
                $org_billing_info = $this->info_model->get_customer_billing_info($p_info->org_id);   
                foreach ($org_billing_info as $bill_info):
                    $bill_country = $bill_info->bill_country;
                endforeach;
            endforeach;
        }
                
           $profile_message = array(
              'name'      => 'profile_message',
              'id'        => 'profile_message',
              'value'     => $p_info->profile_message,          
            );
            
        $first_name= array(
              'name'      => 'first_name',
              'id'        => 'first_name',
              'value'     => $p_info->first_name,          
            );
		 $last_name = array(
              'name'      => 'last_name',
              'id'        => 'last_name',
              'value'     => $p_info->last_name,          
            );
         
        $sex_option = array(
			  'Male'        => 'Male',
              'Female'      => 'Female',
                   
            );    
            
		 $mobile_phone = array(
              'name'      => 'mobile_phone',
              'id'        => 'mobile_phone',
              'value'     => $p_info->mobile_phone,          
             );
            
        $email = array(
              'name'      => 'email',
              'id'        => 'email',
              'value'     => $p_info->email,          
                  
            );
            
        $username= array(
              'name'      => 'username',
              'id'        => 'username',
              'value'     => $p_info->username,  
			  );
        
        $ssn_or_person_no= array(
              'name'      => 'ssn_or_person_no',
              'id'        => 'ssn_or_person_no',
              'value'     => $p_info->ssn_or_person_no,          
             );
        
      
        $street_address = array(
              'name'      => 'street_address',
              'id'        => 'street_address',
              'value'     => $p_info->street_address,          
            );
        
                  
        $zip = array(
              'name'      => 'zip',
              'id'        => 'zip',
              'value'     => $p_info->zip,          
            );
		   
         $city = array(
              'name'      => 'city',
              'id'        => 'city',
              'value'     => $p_info->city,          
              );
      
            
         $country_option = array(
			''  => 'Select Country:',
              'SWE'		=> 'Sweden',
              'DEU'		=> 'German',
              'NOR'		=> 'Norway',
              'DNK'		=> 'Denmark',
              'FIN'		=> 'Finland',
              'GBR'		=> 'UK',
            );          
            
         $bank_acc_no_one = array(
              'name'      => 'bank_acc_no_one',
              'id'        => 'bank_acc_no_one',
              'value'     => $p_info->bank_acc_no_one,          
               );
               
        $bank_acc_type_option = array(
			  ''  => 'Select Type:',
              'Bankgiro'        => 'Bankgiro',
              'PlusGiro'      => 'PlusGiro',
              'Bankaccount'      => 'Bankaccount'
            );
        
        $use_account_info_billing_check= array(
              'name'      => 'use_account_info_billing',
              'id'        => 'use_account_info_billing',
              'value'     => "",          
			  'onClick'  =>'return setFormData(this.value);',
              'checked' => FALSE,
            );
            
          $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('update_btn_msg'),
				'type'    => 'submit',
				'class'   => 'btn'
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

<?php echo form_open("organization/info/modify_my_profile_process"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="units-row">
	<div class="unit-50">
	
	<label><?php echo $this->lang->line('label_about_me'); ?>:
	<?php echo form_textarea($profile_message);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 

	<h4><?php echo $this->lang->line('label_personal_info'); ?>:</h4>
	
	<label><?php echo $this->lang->line('label_first_name'); ?>:
		<?php echo form_input($first_name);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
	
	<label><?php echo $this->lang->line('label_last_name'); ?>:
		<?php echo form_input($last_name);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 

	<label><?php echo $this->lang->line('label_sex'); ?>:
		<?php echo form_dropdown('member_sex',$sex_option,$p_info->member_sex,'id="member_sex"','class="form_input_select"');?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('member_sex')); ?></span>
		
	<label><?php echo $this->lang->line('label_ssn_person_no'); ?>:
		<?php echo form_input($ssn_or_person_no);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('ssn_or_person_no')); ?></span> 
    
	<label><?php echo $this->lang->line('label_username'); ?>:
		<?php echo form_input($username);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
    
	<label><?php echo $this->lang->line('label_email'); ?>:
		<?php echo form_input($email);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 

	<label><?php echo $this->lang->line('label_mobile_phone'); ?>:
		<?php echo form_input($mobile_phone);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('mobile_phone')); ?></span>
	</div><!-- end .unit-50" -->
 	<div class="unit-50">
	
	<label><?php echo $this->lang->line('label_street_address'); ?>:
		<?php echo form_input($street_address);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('street_address')); ?></span> 

	<label><?php echo $this->lang->line('label_zip'); ?>:
		<?php echo form_input($zip);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('zip')); ?></span>
	
	<label><?php echo $this->lang->line('label_city'); ?>:
		<?php echo form_input($city);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('city')); ?></span>
    
	<label><?php echo $this->lang->line('label_country'); ?>:
		<?php echo form_dropdown('country',$country_option,$p_info->country,'id="country"','class="form_input_select"');?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('country')); ?></span>
    
	<label><?php echo $this->lang->line('label_bank_payment'); ?>:
		<?php echo form_input($bank_acc_no_one);?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('bank_acc_no_one')); ?></span>
	
	<label><?php echo $this->lang->line('label_bank_acc_type'); ?>:
		<?php echo form_dropdown('bank_acc_type_one',$bank_acc_type_option,$p_info->bank_acc_type_one,'class="form_input_select"');?>
	</label>
	<span class="markcolor"><?php echo ucwords(form_error('mem_bank_acc_type_one')); ?></span>

	<?php echo form_hidden('mem_id', $mem_id);?>
	<?php echo form_submit($submit);?>   

    <?php echo form_close(); ?>
	</div><!-- end .unit-50 -->
</div><!-- end .units-row -->




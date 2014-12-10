
<h3 class="content_edit"><?php echo $this->lang->line('mem_profile_update_admin_msg');?></h3>

<?php
 if($create_new_member){ 
        if(count($query1)){
            foreach ($query1 as $p_info):
                $mem_type_id = $p_info->mem_type_id;
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
			  'style'       => 'width:540px;height:60px'           
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
         
        $sex_option = array(
			  'Male'        => 'Male',
              'Female'      => 'Female',
                   
            );    
            
		 $mobile_phone = array(
              'name'      => 'mobile_phone',
              'id'        => 'mobile_phone',
              'value'     => $p_info->mobile_phone,          
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
            
         $bank_acc_no_one = array(
              'name'      => 'bank_acc_no_one',
              'id'        => 'bank_acc_no_one',
              'value'     => $p_info->bank_acc_no_one,          
			  'size'       =>"30",
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
             if($mem_type_id=="Admin"){ 
                $previlized_mem_type['Admin'] = $mem_type_id;
             }    
              if($mem_type_id=="Superadmin"){ 
                $previlized_mem_type['Superadmin'] = $mem_type_id;
             }  
            $mem_type_option = $previlized_mem_type;
            
            $expire_date= array(
                'name'      => 'expire_date',
                'id'        => 'expire_date',         
                'value'        => date("Y-m-d" , $p_info->expire_date),         
                'size'       =>"30"        
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

<?php echo form_open("organization/info/modify_member_profile_by_admin_process"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

        
    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_member_profile_message'); ?>: </b><br/><br/></font></td>
                <td width="33%"></td>
        </tr>
        
          <tr>
                <td width="38%"><font class="inside"></font></td>
                <td width="33%"><?=form_textarea($profile_message);?><span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                </td>
        </tr>
        
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_personal_info'); ?>: </b><br/><br/></font></td>
                <td width="33%"></td>
        </tr>
        
        <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_first_name'); ?>:</font></td>
                <td width="33%"><?=form_input($first_name);?><span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
                </td>
        </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_last_name'); ?>:</font></td>
                <td width="33%"><?=form_input($last_name);?><span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 
                </td>

            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_sex'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('member_sex',$sex_option,$p_info->member_sex,'id="member_sex"','class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('member_sex')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
                        
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_mobile_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($mobile_phone);?><sspan class="markcolor"><?php echo ucwords(form_error('mobile_phone')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_street_address'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_input($street_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('street_address')); ?></span> 
                </td>
            </tr>          
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_zip'); ?>:</font></td>
                <td width="33%"><?=form_input($zip);?>
                    <span class="markcolor"><?php echo ucwords(form_error('zip')); ?></span>
                </td>
            </tr>            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_city'); ?>:</font></td>
                <td width="33%"><?=form_input($city);?>
                    <span class="markcolor"><?php echo ucwords(form_error('city')); ?></span>
                </td>
            </tr>            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_country'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('country',$country_option,$p_info->country,'id="country"','class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('country')); ?></span>
                </td>
            </tr>
         
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_bank_payment_info'); ?>:</font></td>
                <td width="33%"><?=form_input($bank_acc_no_one);?>
                    <span class="markcolor"><?php echo ucwords(form_error('bank_acc_no_one')); ?></span>
                </td>
                <td width="33%"><?=form_dropdown('bank_acc_type_one',$bank_acc_type_option,$p_info->bank_acc_type_one,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('bank_acc_type_one')); ?></span>
                </td>
            </tr>
            
           
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_member_type'); ?>:</font></td>
                <td width="33%">
                    <?php    echo form_dropdown('mem_type_id',$mem_type_option,$mem_type_id,'class="form_input_select"');?>
                    <span class="style1"></span>
                    <span class="markcolor"><?php echo ucwords(form_error('mem_type_id')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_membership_expiredate'); ?>:</font></td>
                <td width="33%">
                    <?=form_input($expire_date);?><span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> <br/>
                    <span class="markcolor"><?php echo ucwords($expire_date_error); ?></span> 
                </td>
            </tr>
            
            
        </tbody></table>
    
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">
                </td>
            </tr>
            
        </tbody></table>  
        
         <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">
                </td>
            </tr>
            <tr>
                <td width="18%"><?=form_hidden('mem_id', $mem_id);?></td>
                        
            </tr>
            <tr>
                <td width="38%"><td width="33%">
                <?=form_submit($submit);?>   
                 </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div><?php } else { ?>  

 <span style="color:red;"><?php echo $this->lang->line('members_registration_no_access_msg');?></span>
<?php }  ?>





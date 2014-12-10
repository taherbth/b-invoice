
<script language="javascript">
 
  function setFormData(){        
       if(document.getElementById('use_account_info_billing').checked){
           document.getElementById('street_address').value="<?php echo $street_address;?>";
           document.getElementById('zip').value="<?php echo $zip;?>";
           document.getElementById('city').value="<?php echo $city;?>";           
           document.getElementById('country').value="<?php echo $country;?>";
    }
    else{            
           document.getElementById('street_address').value="";
           document.getElementById('zip').value="";
           document.getElementById('city').value="";    
           document.getElementById('country').value="";
             for ( var i = 0; i <country.options.length; i++ ) {
                if ( country.options[i].value == "") {
                        country.options[i].selected = true;
                        return;
                }
            }
           
        }
        
        
}
</script>

<h3><?php echo $this->lang->line('org_admin_member_registration_msg');?></h3>

<?php 
     if($create_new_member){ 
       if($customer_type == $org_type){
              $dept_or_company_or_org_name = $org_name;
              $dept_or_org_no = $org_number;
        }
   
        $use_account_info_billing_check= array(
              'name'      => 'use_account_info_billing',
              'id'        => 'use_account_info_billing',
              'value'     => "",          
			  'onClick'  =>'return setFormData(this.value);',
              'checked' => TRUE,
            );
            
        $checked_send_password_now = "";
        $checked_create_password_now ="";
        if($send_password=='send_password_now') {$checked_send_password_now="checked";}
        if($send_password=='create_password_now') {$checked_create_password_now="checked";}
        
        $customer_type_option = array(
			 "Government" => $this->lang->line('label_customer_government'),
			  "Company" => $this->lang->line('label_customer_company'),           
			  "Organization" => $this->lang->line('label_customer_organization'),           
			  "Private person" => $this->lang->line('label_customer_private_person'),           
        );    
        $first_name= array(
              'name'      => 'first_name',
              'id'        => 'first_name',
              'value'     => $first_name,          
			  'size'       =>"30",
            );
		 $last_name = array(
              'name'      => 'last_name',
              'id'        => 'last_name',
              'value'     => $last_name,          
			  'size'       =>"30",
            ); 
        /*$dept_or_company_or_org_name = array(
            'name'      => 'dept_or_company_or_org_name',
            'id'        => 'dept_or_company_or_org_name',
            'value'     => $dept_or_company_or_org_name,          
            'size'       =>"30",
        );            
         
         $dept_or_org_no = array(
            'name'      => 'dept_or_org_no',
            'id'        => 'dept_or_org_no',
            'value'     => $dept_or_org_no,          
            'size'       =>"30",
        );        */    
         
		 $mobile_phone = array(
              'name'      => 'mobile_phone',
              'id'        => 'mobile_phone',
              'value'     => $mobile_phone,          
              'size'       =>"30",
             );
            
        $email = array(
              'name'      => 'email',
              'id'        => 'email',
              'value'     => $email,          
			  'size'       =>"30",
               'onblur'        => "checkemail_availability(this.value)"                  
            );
            
        $username= array(
              'name'      => 'username',
              'id'        => 'username',
              'value'     => $username,  
              'size'       =>"30",
              'onblur'        => "check_username_availability(this.value)"        
			  );
            
              $password = array(
              'name'      => 'password',
              'id'        => 'password',
              'value'     => '',  
              'size'       =>"30"
			  );
              
             $retype_password = array(
              'name'      => 'retype_password',
              'id'        => 'retype_password',
              'value'     => '',  
              'size'       =>"30"
			  );
            $send_password_radio= array(
                'name'      => 'send_password',
                'id'        => 'send_password',         
                'value'        => 'send_password_now',         
                'onclick' => 'password_generate_or_create(this.value);'
            );
            $create_password_radio= array(
                'name'      => 'send_password',
                'id'        => 'send_password',         
                'value'        => 'create_password_now',         
                'onclick' => 'password_generate_or_create(this.value);'     
            );
         $member_position= array(
              'name'      => 'member_position',
              'id'        => 'member_position',
              'value'     => $member_position,          
			  'size'       =>"30",
             );
        $ssn_or_person_no= array(
            'name'      => 'ssn_or_person_no',
            'id'        => 'ssn_or_person_no',
            'value'     => $ssn_or_person_no,          
            'size'       =>"30",
        );
             
             
        $street_address = array(
              'name'      => 'street_address',
              'id'        => 'street_address',
              'value'     => $street_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
                    
        $zip = array(
              'name'      => 'zip',
              'id'        => 'zip',
              'value'     => $zip,          
			  'size'       =>"30",
            );
		   
         $city = array(
              'name'      => 'city',
              'id'        => 'city',
              'value'     => $city,          
			  'size'       =>"30",
              );
              
        $land_line_phone = array(
              'name'      => 'land_line_phone',
              'id'        => 'land_line_phone',
              'value'     => $land_line_phone,          
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
            
    $expire_date = array(
        'name'      => 'expire_date',
        'id'        => 'expire_date',
        'class'		=> 'datepicker',     
        'value'        => $expire_date,         
        'size'       =>"30",
        'placeholder'=> 'YYYY-MM-DD'        
    );
    $mem_type_option = $previlized_mem_type;
        $confirm_btn = array(
				'name'    => 'confirm',
				'id'      => 'confirm',
				'value'   => $this->lang->line('confirm_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            $confirm_and_create_new_btn = array(
				'name'    => 'confirm_and_create',
				'id'      => 'confirm_and_create',
				'value'   => $this->lang->line('confirm_and_create_new_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            $cancel_btn = array(
				'name'    => 'cancel',
				'id'      => 'cancel',
				'value'   => $this->lang->line('cancel_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            $buy_package_btn = array(
				'name'    => 'buy_package',
				'id'      => 'buy_package',
				'value'   => $this->lang->line('buy_package_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            
?>
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
 var base_url = '<?php echo base_url();  ?>';
 var controller = 'info';
function checkemail_availability(email_val){         
                $.ajax({
                    'url' : base_url + '/organization/' + controller + '/email_availability/'+email_val,
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : 'nnn'},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#availability_status'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
                $.ajax({
                    'url' : base_url + '/organization/' + controller + '/username_availability/'+email_val,
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : 'nnn'},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#availability_status_username'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
}
function check_username_availability(username){                        
                $.ajax({
                    'url' : base_url + '/organization/' + controller + '/username_availability/'+username,
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : 'nnn'},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#availability_status_username'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
}


//////////////////////////////////////////////// Duplicate Entry From E-mail to Username ///////////////////////////////////////////////
$(function() {                                      
    $("#email").keyup(function() {                  
        $('#username').val(this.value);                
    });
});


function change_customer_type(){
    var selected_val =  document.getElementById("customer_type").value;
    var org_type =  document.getElementById('org_type_hid').value;
    var org_name =  document.getElementById('org_name_hid').value;
    var org_number =  document.getElementById('org_no_hid').value;

    if(org_type==selected_val){ 
        document.getElementById("dept_or_company_or_org_name").value = org_name;
        document.getElementById("dept_or_org_no").value = org_number;
    }
    else{
        document.getElementById("dept_or_company_or_org_name").value = "";
        document.getElementById("dept_or_org_no").value = "";
    }

    var government = "<?php echo 'Government'; ?>"
    var company = "<?php echo 'Company'; ?>"
    var organization = "<?php echo 'Organization'; ?>"
    var private_person = "<?php echo 'Private person'; ?>"
    
    if(selected_val==government){
        document.getElementById('ssn_or_person_no').style.display="none";
        document.getElementById('ssn_or_person_no_field').style.display="none";
        document.getElementById('department_details_div').style.display="";
        document.getElementById('company_details_div').style.display="none";
        document.getElementById('organization_details_div').style.display="none";  
        document.getElementById('department_name').style.display="";
        document.getElementById('organization_name_filed').style.display="";
        document.getElementById('company_name').style.display="none";
        document.getElementById('organization_name').style.display="none";
        document.getElementById('department_no').style.display="";
        document.getElementById('organization_no').style.display="none";
        document.getElementById('department_no_field').style.display="";
        document.getElementById('member_position').style.display="";
        document.getElementById('member_position_field').style.display="";
        document.getElementById('department_details').style.display="";          
        document.getElementById('department_no_field').style.display="";
    }  
    if(selected_val==company){
        document.getElementById('ssn_or_person_no').style.display="none";
        document.getElementById('ssn_or_person_no_field').style.display="none";
        document.getElementById('department_details_div').style.display="none";
        document.getElementById('company_details_div').style.display="";
        document.getElementById('organization_details_div').style.display="none";   
        document.getElementById('organization_name').style.display="none";        

        document.getElementById('company_name').style.display="";
        document.getElementById('organization_no').style.display="";
        document.getElementById('member_position').style.display="";       
        document.getElementById('member_position_field').style.display="";    
        document.getElementById('department_no_field').style.display="";
        document.getElementById('organization_name_filed').style.display="";
        document.getElementById('department_name').style.display="none";
        document.getElementById('department_no').style.display="none";
        document.getElementById('department_no_field').style.display="";
        document.getElementById('department_details').style.display="";
    }
    if(selected_val==organization){
        document.getElementById('ssn_or_person_no').style.display="none";
        document.getElementById('ssn_or_person_no_field').style.display="none";
        document.getElementById('department_details_div').style.display="none";
        document.getElementById('company_details_div').style.display="none";
        document.getElementById('organization_details_div').style.display="";    
        document.getElementById('organization_name').style.display="";
        document.getElementById('organization_no').style.display="";
        document.getElementById('member_position').style.display="";    
        document.getElementById('member_position_field').style.display="";    
        document.getElementById('department_no_field').style.display="";
        document.getElementById('organization_name_filed').style.display="";
        document.getElementById('company_name').style.display="none";
        document.getElementById('department_name').style.display="none";
        document.getElementById('department_no').style.display="none";
        document.getElementById('department_no_field').style.display="";
        document.getElementById('department_details').style.display="";          
    }
    if(selected_val==private_person){
        document.getElementById('ssn_or_person_no').style.display="";
        document.getElementById('ssn_or_person_no_field').style.display="";
        document.getElementById('department_details_div').style.display="none";
        document.getElementById('company_details_div').style.display="none";
        document.getElementById('organization_details_div').style.display="none";              
        document.getElementById('organization_name').style.display="none";
        document.getElementById('organization_no').style.display="none";  
        document.getElementById('organization_name_filed').style.display="none";
        document.getElementById('company_name').style.display="none";
        document.getElementById('department_name').style.display="none";
        document.getElementById('department_no').style.display="none";
        document.getElementById('department_no_field').style.display="none";
        document.getElementById('member_position').style.display="none";    
        document.getElementById('member_position_field').style.display="none";  
        document.getElementById('department_details').style.display="none";
        document.getElementById('department_no_field').style.display="none";
    }
}

function password_generate_or_create(selected_val){
    if(selected_val=='create_password_now'){
        document.getElementById('create_password').style.display="";
        document.getElementById('retype_password').style.display="";
    }    
    if(selected_val=='send_password_now'){
        document.getElementById('create_password').style.display="none";
        document.getElementById('retype_password').style.display="none";
    }    
}
   
</script>

<?php echo form_open("organization/info/create_new_member_process"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_member_info'); ?>: </b><br/><br/></font></td>
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
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_email'); ?>:</font></td>
                <td width="33%"><?=form_input($email);?><span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
             <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_username'); ?>:</font></td>
                <td width="33%"><?=form_input($username);?><sspan class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status_username"></span> 
                </td>

            </tr>
            <tr>
                <td width="18%"><font class="inside"></font></td>
                <td width="18%"> 
                    <?php           
                        echo form_radio($send_password_radio,"",$checked_send_password_now). $this->lang->line('label_send_password');
                        echo form_radio($create_password_radio,"",$checked_create_password_now). $this->lang->line('label_create_password');
                    ?>
                <div id="create_password" <?php if($checked_create_password_now) { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_password');?>:
                        <?=form_input($password);?>
                </div>
                <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>
                <div id="retype_password" <?php if($checked_create_password_now) { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_retype_password');?>:
                        <?=form_input($retype_password);?>
                </div>
                <span class="markcolor"><?php echo ucwords(form_error('retype_password')); ?></span>
                <span class="markcolor"><?php echo $label_password_does_not_matched_error; ?></span>
                </td>                
            </tr>    
          <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_password_send_by'); ?>:</font></td>
                <td width="18%"> <?php 
                                                            $email_selected=FALSE;
                                                            $sms_selected=FALSE;
                                                            if(!empty($password_receive_by_email)){
                                                                $email_selected=TRUE;
                                                            }
                                                            if(!empty($password_receive_by_sms)){
                                                                    $sms_selected=TRUE;
                                                            }
                                                            echo form_checkbox('password_receive_by_email', '1', $email_selected); 
                                                            echo $this->lang->line('label_email'); 
                                                            echo form_checkbox('password_receive_by_sms', '1', $sms_selected);
                                                            echo $this->lang->line('label_sms'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('password_receive_by_sms')); ?></span>
                    
                </td>                
            </tr>
            <tr>
                <td>
                    <label> <?php echo $this->lang->line('label_member_type');?>:<em class="req">*</em></label>
                </td>
                <td>
                    <?php echo form_dropdown('mem_type_id',$mem_type_option,$mem_type_id,'class=""'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('mem_type_id')); ?></span>
                </td>
            <tr>
            <tr>
                    <td width="33%"><font class="inside"><?php echo $this->lang->line('label_membership_ends'); ?>:</font></td>
                    <td width="33%"><?=form_input($expire_date);?>
                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    <span class="markcolor"><?php echo ucwords($expire_date_error); ?></span> 
                </td>
            </tr>   
            <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_enter_more_details'); ?>: </b></font></td>
                <td width="33%"><?php //echo form_checkbox($use_account_info_billing_check);  echo $this->lang->line('label_use_org_address_info');?></td>
            </tr>   
             <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_address_details'); ?>: </b></font></td>
            </tr>       
        
        <div id="member_address" style="display:none;">
          
            <tr>
                    <td width="33%"><font class="inside"><?php echo $this->lang->line('label_street_address'); ?>:</font></td>
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
                <td width="33%"><?=form_dropdown('country',$country_option,$country,'id="country"', 'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('country')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_mobile_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($mobile_phone);?><sspan class="markcolor"><?php echo ucwords(form_error('mobile_phone')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_land_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($land_line_phone);?><sspan class="markcolor"><?php echo ucwords(form_error('land_line_phone')); ?></span> 
                </td>
            </tr>
            
          </div>  
        <tr>
            <td width="38%">
                <div id="member_details_div"> <b> <?php echo $this->lang->line('label_member_details');?> : </b> </div>
            </td>               
        </tr>
        <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_customer_type'); ?>:</font></td>
                <td width="33%"> <?php  echo form_dropdown('customer_type',$customer_type_option, $customer_type ,'id="customer_type" onChange="change_customer_type()"');?>
                <span class="markcolor"><?php echo ucwords(form_error('customer_type')); ?></span>  </td>
        </tr>
        <tr>
                   <td width="38%" ><font class="inside"><div id="ssn_or_person_no" <?php if($customer_type=="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_ssn_person_no'); ?>:</font></div></td>
                   <td width="33%"><div id="ssn_or_person_no_field"  <?php if($customer_type=="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?=form_input($ssn_or_person_no);?>
                     </div><span class="markcolor"><?php echo ucwords(form_error('ssn_or_person_no')); ?></span></td>
            </tr>
            <tr>
                    <td width="38%">
                        <div id="department_details_div"  <?php if($customer_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <b> <?php echo $this->lang->line('label_department_details');?> : </b> </div>
                        <div id="company_details_div" <?php if($customer_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>> <b>  <?php echo $this->lang->line('label_company_details');?>: </b></div>
                        <div id="organization_details_div"  <?php if($customer_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <b> <?php echo $this->lang->line('label_organization_details');?>: </b></div>
                    </td>                    
            </tr>
                <div id="dept_org_no"> 
                <tr>
                 <td>
                    <div id="department_no" <?php if($customer_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_department_no');?>:</div>
                    <div id="organization_no" <?php if($customer_type=="Organization" || $customer_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_no');?>:</div>
                </td>
                    <td width="33%"><div id="department_no_field" <?php if($customer_type!="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>>
                    <input type="text" name="dept_or_org_no" id="dept_or_org_no" value=<?php echo $dept_or_org_no;?> >
                    <span class="markcolor"><?php echo ucwords(form_error('dept_or_org_no')); ?></span> </div>   </td>
                </tr>
            </div>     
            <div id="dept_org_company_name" >
                <tr>
                    <td>
                        <div id="department_name"  <?php if($customer_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_name');?>:</div>
                        <div id="company_name" <?php if($customer_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_name');?>:</div>
                        <div id="organization_name"  <?php if($customer_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_name');?>:</div>
                    </td>
                    <td width="33%"><div id="organization_name_filed" <?php if($customer_type!="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> >
                    <input type="text" name="dept_or_company_or_org_name" id="dept_or_company_or_org_name" value=<?php echo $dept_or_company_or_org_name;?> >
                       <span class="markcolor"><?php echo ucwords(form_error('dept_or_company_or_org_name')); ?></span></div></td>
                </tr>
            </div>         
                <tr>
                    <td width="38%"><div id="member_position" <?php if($customer_type!="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><font class="inside"><?php echo $this->lang->line('label_member_possition'); ?>:</font></div>  </td>
                    <td width="33%"><div id="member_position_field" <?php if($customer_type!="Private person") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?=form_input($member_position);?><span class="markcolor"><?php echo ucwords(form_error('member_position')); ?></span> </div>   </td>
                </tr>
        </tbody></table>
    
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>  
                    <td><input id="org_type_hid" type="hidden" value=<?php echo $org_type;?> name="org_type_hidden"></td>
                    <td><input id="org_name_hid" type="hidden" value=<?php echo $org_name;?> name="org_name_hidden"></td>
                    <td><input id="org_no_hid" type="hidden" value=<?php echo $org_number;?> name="org_no_hidden"></td>
                </td>
            </tr>
            <tr>
                 <td width="38%">   <?=form_submit($confirm_btn);?>  </td>
                 <td width="38%">  <?=form_submit($cancel_btn);?>    </td>
                 <td width="38%">  <?=form_submit($confirm_and_create_new_btn);?> </td>
                 <td width="38%">  <?=form_submit($buy_package_btn);?> </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>
 <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('members_registration_no_access_msg');?></span>
<?php }  ?>


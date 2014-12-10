<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h3>
<h2 style="text-align:center;">Step1---------<span style="color:red;">Step2</span>--------Step3</h2>

<?php
       //print_r($organization_data);
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
         
		 $phone_no = array(
              'name'      => 'phone_no',
              'id'        => 'phone_no',
              'value'     => $phone_no,          
              'size'       =>"30",
             );
            
        $email = array(
              'name'      => 'email',
              'id'        => 'email',
              'value'     => $email,          
			  'size'       =>"30",
                  
            );
            
        $username= array(
              'name'      => 'username',
              'id'        => 'username',
              'value'     => $username,  
              'size'       =>"30"
			  );
        
        $person_number= array(
              'name'      => 'person_number',
              'id'        => 'person_number',
              'value'     => $person_number,          
			  'size'       =>"30",
             );
                        
        $primary_address = array(
              'name'      => 'primary_address',
              'id'        => 'primary_address',
              'value'     => $primary_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
        $optional_address = array(
              'name'      => 'optional_address',
              'id'        => 'optional_address',
              'value'     =>$optional_address,          
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
              
        $state = array(
              'name'      => 'state',
              'id'        => 'state',
              'value'     => $state,          
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
            
        $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('next_btn_msg'),
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

<?php echo form_open("main/added_customer_step3"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_admin_user'); ?>: </b><br/><br/></font></td>
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
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($phone_no);?><sspan class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_email'); ?>:</font></td>
                <td width="33%"><?=form_input($email);?><sspan class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_username'); ?>:</font></td>
                <td width="33%"><?=form_input($username);?><sspan class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_person_no'); ?>:</font></td>
                <td width="33%"><?=form_input($person_number);?><sspan class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_one'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($primary_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('primary_address')); ?></span> 
                </td>
            </tr>          
             <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_two'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($optional_address);?>
                    <span class="markcolor"></span> 
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
                <td width="33%"><?=form_dropdown('country',$country_option,$country,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('country')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_state'); ?>:</font></td>
                <td width="33%"><?=form_input($state);?>
                    <span class="markcolor"><?php echo ucwords(form_error('state')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_password_receive_by'); ?>:</font></td>
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
                    <td><?=form_hidden('organization_data', $organization_data);?></td>
                    <td><?=form_hidden('data_category', $category_name);?></td>
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
                <td width="38%"><td width="33%">
                <?=form_submit($submit);?>   
                 </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


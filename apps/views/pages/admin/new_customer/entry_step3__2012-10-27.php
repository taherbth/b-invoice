<script language="javascript">
    function setFormData(){
        
       if(document.getElementById('use_account_info_billing').checked){
           document.getElementById('bill_first_name').value="<?php echo $bill_first_name;?>";
           document.getElementById('bill_last_name').value="<?php echo $bill_last_name;?>";
           document.getElementById('bill_phone_no').value="<?php echo  $bill_phone_no;?>";
           document.getElementById('bill_email').value="<?php echo $bill_email;?>";
           document.getElementById('bill_primary_address').value="<?php echo $bill_primary_address;?>";
           document.getElementById('bill_optional_address').value="<?php echo $bill_optional_address;?>";
           document.getElementById('bill_zip').value="<?php echo $bill_zip;?>";
           document.getElementById('bill_city').value="<?php echo $bill_city;?>";           
           document.getElementById('bill_country').value="<?php echo $bill_country;?>";
    }
    else{            
           document.getElementById('bill_first_name').value="";
           document.getElementById('bill_last_name').value="";
           document.getElementById('bill_phone_no').value="";
           document.getElementById('bill_email').value="";
           document.getElementById('bill_primary_address').value="";
           document.getElementById('bill_optional_address').value="";
           document.getElementById('bill_zip').value="";
           document.getElementById('bill_city').value="";    
           document.getElementById('bill_country').value="";
           
        }
        
        
    }
								
</script>

<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h3>
<h2 style="text-align:center;">Step1---------Step2<span style="color:red;">--------Step3</span></h2>

<?php
       //print_r($admin_user_data);
       //echo $bill_first_name;
       $use_account_info_billing_check= array(
              'name'      => 'use_account_info_billing',
              'id'        => 'use_account_info_billing',
              'value'     => "",          
			  'onClick'  =>'return setFormData(this.value);',
              'checked' => TRUE,
            );
        $bill_first_name= array(
              'name'      => 'bill_first_name',
              'id'        => 'bill_first_name',
              'value'     => $bill_first_name,          
			  'size'       =>"30",
            );
		 $bill_last_name = array(
              'name'      => 'bill_last_name',
              'id'        => 'bill_last_name',
              'value'     => $bill_last_name,          
			  'size'       =>"30",
            );
         
		 $bill_phone_no = array(
              'name'      => 'bill_phone_no',
              'id'        => 'bill_phone_no',
              'value'     => $bill_phone_no,          
              'size'       =>"30",
             );
            
        $bill_email = array(
              'name'      => 'bill_email',
              'id'        => 'bill_email',
              'value'     => $bill_email,          
			  'size'       =>"30",
                  
            );
                         
        $bill_primary_address = array(
              'name'      => 'bill_primary_address',
              'id'        => 'bill_primary_address',
              'value'     => $bill_primary_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
        $bill_optional_address = array(
              'name'      => 'bill_optional_address',
              'id'        => 'bill_optional_address',
              'value'     =>$bill_optional_address,          
			  'style'       => 'width:340px;height:40px'                 
            );
            
        $bill_zip = array(
              'name'      => 'bill_zip',
              'id'        => 'bill_zip',
              'value'     => $bill_zip,          
			  'size'       =>"30",
            );
		   
         $bill_city = array(
              'name'      => 'bill_city',
              'id'        => 'bill_city',
              'value'     => $bill_city,          
			  'size'       =>"30",
              );
            
         $bill_country_option = array(
			  ''  => 'Select Country:',
              'Sweden'        => 'Sweden',
              'German'      => 'German',
              'Norway'      => 'Norway',
              'Denmark'      => 'Denmark',
              'Finland'      => 'Finland',
              'UK'      => 'UK',
            );
                        
            $radio_invoice = array (
            'name' => 'payment_method',
            'value' => 'invoice',
            'checked' => TRUE,
            );
            
            $radio_paypal = array (
            'name' => 'payment_method',
            'value' => 'paypal',
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
				'value'   => $this->lang->line('confirm_btn_msg'),
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

<?php echo form_open("admin/info/added_customer_step4"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo "1. ".$this->lang->line('label_select_payment_method'); ?>: </b><br/></font></td>
                <td width="33%"></td>
        </tr>
        
        <tr>
                <td width="10%"><font class="inside"><?php echo $this->lang->line('label_invoice'); ?>: <?=form_radio($radio_invoice);?><span class="markcolor"><?php echo ucwords(form_error('radio_invoice')); ?></span> </font></td>
                
                <td width="10%"><font class="inside"><?php echo $this->lang->line('label_paypal'); ?>:</font><?=form_radio($radio_paypal);?><span class="markcolor"><?php echo ucwords(form_error('radio_paypal')); ?></span></td>
                </td>
        </tr>
                
       <tr>
                <td width="38%"><font class="inside"><br/><br/><b><?php echo "2. ".$this->lang->line('label_enter_billing_address'); ?>: </b><br/><br/></font></td>
                <td width="72%"><br/><br/><?php echo form_checkbox($use_account_info_billing_check);  echo $this->lang->line('label_enter_billing_account_info');?></td>

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
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_one'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($bill_primary_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_primary_address')); ?></span> 
                </td>
            </tr>          
             <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_two'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($bill_optional_address);?>
                    <span class="markcolor"></span> 
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
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_country'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('bill_country',$bill_country_option,$bill_country,'id="bil_country"','class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('bill_country')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_email'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_email);?><span class="markcolor"><?php echo ucwords(form_error('bill_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($bill_phone_no);?><span class="markcolor"><?php echo ucwords(form_error('bill_phone_no')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><br/><br/><b><?php echo "3. ".$this->lang->line('label_billing_terms_condition'); ?>: </b><br/><br/></font></td>
                <td width="72%"><br/><br/><?php echo form_checkbox($billing_terms_condition);  echo $this->lang->line('label_billing_terms_condition_msg');?>
                <br/><a href="#<?php echo base_url(); ?>"><?php echo $this->lang->line('label_billing_terms_condition_link');?> 
                <span class="markcolor"><?php echo ucwords(form_error('billing_terms_condition')); ?></span></td>

        </tr>
            <tr>
                <td width="18%"><?=form_hidden('organization_data', $organization_data);?></td>
                <td width="18%"><?=form_hidden('admin_user_data', $admin_user_data);?></td>         
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


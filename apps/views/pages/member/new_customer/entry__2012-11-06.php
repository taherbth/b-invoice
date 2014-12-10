<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h3>
<h2 style="text-align:center;"><span style="color:red;">Step1</span>---------Step2--------Step3</h2>

<?php

        $package_info_option = $package_info;
        $org_number= array(
              'name'      => 'org_number',
              'id'        => 'org_number',
              'value'     => $org_number,          
			  'size'       =>"30",
              'onblur'        => "getSubCat1(this.value)"
            );
		 $org_name = array(
              'name'      => 'org_name',
              'id'        => 'org_name',
              'value'     => $org_name,          
			  'size'       =>"30",
             );
         
		 $org_description = array(
              'name'      => 'org_description',
              'id'        => 'org_description',
              'value'     => $org_description,          
              'style'       => 'width:340px;height:120px'
            );
                        
        $org_primary_address = array(
              'name'      => 'org_primary_address',
              'id'        => 'org_primary_address',
              'value'     => $org_primary_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        
        $org_optional_address = array(
              'name'      => 'org_optional_address',
              'id'        => 'org_optional_address',
              'value'     =>$org_optional_address,          
			  'style'       => 'width:340px;height:40px'                 
            );
            
        $org_phone = array(
              'name'      => 'org_phone',
              'id'        => 'org_phone',
              'value'     => $org_phone,          
			  'size'       =>"30",
             );
            
        $org_zip = array(
              'name'      => 'org_zip',
              'id'        => 'org_zip',
              'value'     => $org_zip,          
			  'size'       =>"30",
            );
		   
         $org_city = array(
              'name'      => 'org_city',
              'id'        => 'org_city',
              'value'     => $org_city,          
			  'size'       =>"30",
             );
            
         $org_country_option = array(
			  ''  => 'Select Country:',
              'Sweden'        => 'Sweden',
              'German'      => 'German',
              'Norway'      => 'Norway',
              'Denmark'      => 'Denmark',
              'Finland'      => 'Finland',
              'UK'      => 'UK',
            );
            
        $org_bank_acc_no = array(
              'name'      => 'org_bank_acc_no',
              'id'        => 'org_bank_acc_no',
              'value'     => $org_bank_acc_no,          
			  'size'       =>"30",
               );
        
        $org_bank_acc_type_option = array(
			  ''  => 'Select Type:',
              'Bankgiro'        => 'Bankgiro',
              'PlusGiro'      => 'PlusGiro'
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

<?php echo form_open("main/added_customer_step2"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_org_info'); ?>: </b><br/><br/></font></td>
                <td width="33%"></td>
        </tr>
        
        <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_choose_package'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('package_name',$package_info_option,'','class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span> 
                </td>
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
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_address'); ?>:</b></font></td>
                <td width="33%"></td>
            </tr>

            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_one'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($org_primary_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span> 
                </td>
            </tr>          
             <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_address_line_two'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($org_optional_address);?>
                    <span class="markcolor"></span> 
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_phone'); ?>:</font></td>
                <td width="33%"><?=form_input($org_phone);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span>
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
                <td width="33%"><?=form_dropdown('org_country',$org_country_option,$org_country,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_country')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_bank_info'); ?>:</b></font></td>
                <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_bank_acc_no'); ?>:</font></td>
                <td width="18%"><?=form_input($org_bank_acc_no);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_no')); ?></span>
                </td>
                <td width="18%"><?=form_dropdown('org_bank_acc_type',$org_bank_acc_type_option,$org_bank_acc_type,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_bank_acc_type')); ?></span>
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


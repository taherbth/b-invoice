<h3 class="content_edit"><?php echo $this->lang->line('fak_edit_customer_msg');?></h2>
<?php
    if($mem_type=="Admin" || $access_faktura){     
        if (count($faktura_customer_details)):
            foreach ($faktura_customer_details as $faktura_customer_details_info):
            endforeach;
            
        endif;
        $fak_customer_type = array(
			  "Company" => $this->lang->line('label_fak_company'),
			  "Individual" => $this->lang->line('label_fak_individual')            
            );     
        $fak_customer_or_company_name= array(
            'name'      => 'fak_customer_or_company_name',
            'id'        => 'fak_customer_or_company_name',
            'value'     => $faktura_customer_details_info->fak_customer_or_company_name,       
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_customer_care_of= array(
            'name'      => 'fak_customer_care_of',
            'id'        => 'fak_customer_care_of',
            'value'     => $faktura_customer_details_info->fak_customer_care_of,   
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_customer_billing_address = array(
            'name'      => 'fak_customer_billing_address',
            'id'        => 'fak_customer_billing_address',
            'value'     => $faktura_customer_details_info->fak_customer_billing_address,    
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_customer_zip= array(
            'name'      => 'fak_customer_zip',
            'id'        => 'fak_customer_zip',
            'value'     => $faktura_customer_details_info->fak_customer_zip,   
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",

        );
        $fak_customer_city= array(
            'name'      => 'fak_customer_city',
            'id'        => 'fak_customer_city',
            'value'     => $faktura_customer_details_info->fak_customer_city,  
            'style'  => 'width:180px;height:21px',
            'size'       =>"30"
        );
         $fak_customer_state= array(
            'name'      => 'fak_customer_state',
            'id'        => 'fak_customer_state',
            'value'     => $faktura_customer_details_info->fak_customer_state,  
            'style'  => 'width:180px;height:21px',
            'size'       =>"30"
        );
        
          $fak_customer_country_option = array(
			  ''  => 'Select Country:',
              'SWE'        => 'Sweden',
              'DEU'      => 'German',
              'NOR'      => 'Norway',
              'DNK'      => 'Denmark',
              'FIN'      => 'Finland',
              'GBR'      => 'UK',
            );

        $fak_customer_email = array(
            'name'      => 'fak_customer_email',
            'id'        => 'fak_customer_email',
            'value'     => $faktura_customer_details_info->fak_customer_email,    
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );

        $fak_customer_no = array(
            'name'      => 'fak_customer_no',
            'id'        => 'fak_customer_no',
            'value'     => $faktura_customer_details_info->fak_customer_no,  
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_customer_reg_no= array(
            'name'      => 'fak_customer_reg_no',
            'id'        => 'fak_customer_reg_no',
            'value'     => $faktura_customer_details_info->fak_customer_reg_no,     
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_customer_to = array(
            'name'      => 'fak_customer_to',
            'id'        => 'fak_customer_to',
            'value'     => $faktura_customer_details_info->fak_customer_to,     
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        $fak_customer_contact_no= array(
            'name'      => 'fak_customer_contact_no',
            'id'        => 'fak_customer_contact_no',
            'value'     => $faktura_customer_details_info->fak_customer_contact_no,     
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );

     $admin_notes = array(
            'name'      => 'admin_notes',
            'id'        => 'admin_notes',
            'value'     => $faktura_customer_details_info->admin_notes,     
            'style'  => 'width:250px;height:100px'          
        );
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('submit_btn'),
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
    .style1 {color: #FF3333}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
}
function change_customer_type(){
      var selected_val = document.getElementById("fak_customer_type").value;
      var company = "<?php echo 'Company'; ?>"
      var individual = "<?php echo 'Individual'; ?>"
      if(selected_val==company){
          document.getElementById('company_name').style.display="";
          document.getElementById('company_address').style.display="";
          document.getElementById('company_reg_no').style.display="";
          document.getElementById('customer_name').style.display="none";
          document.getElementById('customer_address').style.display="none";
          document.getElementById('customer_reg_no').style.display="none";
      }
      if(selected_val==individual){
          document.getElementById('company_name').style.display="none";
          document.getElementById('company_address').style.display="none";
          document.getElementById('company_reg_no').style.display="none";
          document.getElementById('customer_name').style.display="";
          document.getElementById('customer_address').style.display="";
          document.getElementById('customer_reg_no').style.display="";
      }
}

</script>
<?php echo form_open("organization/info/edit_faktura_customer_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
           
           <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_customer_type');?>:</font></td>
                <td width="33%">
                    <?php    echo form_dropdown('fak_customer_type',$fak_customer_type, $faktura_customer_details_info->fak_customer_type,'id="fak_customer_type" onChange="change_customer_type()"');?>
                    <?php    //echo form_dropdown('fak_customer_type',$fak_customer_type, $faktura_customer_details_info->fak_customer_type,'class="form_input_select"');?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_type')); ?></span> 
                </td>

            </tr>
              <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
           <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">
                    <div id="company_name" <?php if($faktura_customer_details_info->fak_customer_type=="Company"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_company_name');?>:</div>
                    <div id="customer_name" <?php if($faktura_customer_details_info->fak_customer_type=="Individual"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_customer_name');?>:</div>
                    </font></td>
                <td width="33%">
                    <?=form_input($fak_customer_or_company_name);?> <span class="style1">*</span>
                    <span class="style1"></span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_or_company_name')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            
           <tr style="top:20px">
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_care_of');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_care_of);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_care_of')); ?></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr style="top:20px">
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">
                    <div id="company_address" <?php if($faktura_customer_details_info->fak_customer_type=="Company"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_billing_address');?>:</div>
                    <div id="customer_address" <?php if($faktura_customer_details_info->fak_customer_type=="Individual"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_address');?>:</div>
                </font></td>
                <td width="33%">
                    <?=form_input($fak_customer_billing_address);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_billing_address')); ?></span> 
                </td>

            </tr>
            
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            
            <tr>
                <td width="38%"style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_zip');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_zip);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_zip')); ?></span> 
                </td>

            </tr>
              <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            <tr>
                <td width="38%"style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_city');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_city);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_city')); ?></span> 
                </td>

            </tr>
                      
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
      
            <tr>
                <td width="38%"style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_country');?>:</font></td>
                <td width="33%"><?=form_dropdown('fak_customer_country',$fak_customer_country_option,$faktura_customer_details_info->fak_customer_country,'class="form_input_select"');?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_country')); ?></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_email');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_email);?>
                    <span class="style1">*</span><br/>
                    <span><?php echo $this->lang->line('label_fak_email_tips');?></span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_email')); ?></span> 
                </td>
            </tr>
            
            
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_customer_no');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_no);?><br/>
                    <span><?php echo $this->lang->line('label_fak_customer_no_tips');?></span>                </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">
                <div id="company_reg_no" <?php if($faktura_customer_details_info->fak_customer_type=="Company"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_org_no');?>:</div>
                <div id="customer_reg_no" <?php if($faktura_customer_details_info->fak_customer_type=="Individual"){ ?> style="display:'';" <?php } else{ ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_fak_person_no');?>:</div>
                </font></td>
                <td width="33%">
                    <?=form_input($fak_customer_reg_no);?>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_reg_no')); ?></span></td>
            </tr>            
           <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_to');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_to);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_to')); ?></span> 
                </td>
            </tr>
              <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_contact_no');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_customer_contact_no);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_contact_no')); ?></span> 
                </td>

            </tr>
              <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_fak_admin_notes');?>:</font></td>
                <td width="33%">
                    <?=form_textarea($admin_notes);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('admin_notes')); ?></span> 
                </td>

            </tr>
            
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
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
                <td width="38%"><?=form_hidden('faktura_customer_id', $faktura_customer_details_info->faktura_customer_id);?><td width="33%">
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Update" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>

</div><?php }  ?>

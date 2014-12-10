<h3 class="content_edit"><?php echo $this->lang->line('fak_create_new_customer_msg');?></h2>
<?php
    if($mem_type=="Admin" || $access_faktura){     
    
        $fak_customer_type_id = array('id' => 'fak_customer_type');
        $fak_customer_type = array(
			  //"" => $this->lang->line('label_select_type'),
			 "Company" => $this->lang->line('label_fak_company'),
			  "Individual" => $this->lang->line('label_fak_individual')            
            );     
        $fak_customer_or_company_name= array(
            'name'      => 'fak_customer_or_company_name',
            'id'        => 'fak_customer_or_company_name',
            'value'     => $fak_customer_or_company_name,       
            'size'       =>"30",
        );
        
        $fak_customer_care_of= array(
            'name'      => 'fak_customer_care_of',
            'id'        => 'fak_customer_care_of',
            'value'     => $fak_customer_care_of,   
            'size'       =>"30",
        );
        
        $fak_customer_billing_address = array(
            'name'      => 'fak_customer_billing_address',
            'id'        => 'fak_customer_billing_address',
            'value'     => $fak_customer_billing_address,    
            'size'       =>"30",
        );
        
        $fak_customer_zip= array(
            'name'      => 'fak_customer_zip',
            'id'        => 'fak_customer_zip',
            'value'     => $fak_customer_zip,   
            'size'       =>"30",

        );

        $fak_customer_city= array(
            'name'      => 'fak_customer_city',
            'id'        => 'fak_customer_city',
            'value'     => $fak_customer_city,  
            'size'       =>"30"
        );
        
        $fak_customer_state= array(
            'name'      => 'fak_customer_state',
            'id'        => 'fak_customer_state',
            'value'     => $fak_customer_state,  
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
            'value'     => $fak_customer_email,    
            'size'       =>"30",
        );

        $fak_customer_no = array(
            'name'      => 'fak_customer_no',
            'id'        => 'fak_customer_no',
            'value'     => $fak_customer_no,  
            'size'       =>"30",
        );
        
        $fak_customer_reg_no= array(
            'name'      => 'fak_customer_reg_no',
            'id'        => 'fak_customer_reg_no',
            'value'     => $fak_customer_reg_no,     
            'size'       =>"30",
        );
        
        $fak_customer_to = array(
            'name'      => 'fak_customer_to',
            'id'        => 'fak_customer_to',
            'value'     => $fak_customer_to,     
            'size'       =>"30",
        );
        $fak_customer_contact_no= array(
            'name'      => 'fak_customer_contact_no',
            'id'        => 'fak_customer_contact_no',
            'value'     => $fak_customer_contact_no,     
            'size'       =>"30",
        );

     $admin_notes = array(
            'name'      => 'admin_notes',
            'id'        => 'admin_notes',
            'value'     => $admin_notes,     
        );
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('submit_btn'),
            'type'    => 'submit',
            'class'   => 'submit-btn'
        );
?>

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
<?php echo form_open("organization/info/create_faktura_new_customer_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="form">
<label><?php echo $this->lang->line('label_fak_customer_type');?>: <span class="req">*</span>
                    <?php    echo form_dropdown('fak_customer_type',$fak_customer_type,'class="form_input_select"' ,'id="fak_customer_type" onChange="change_customer_type()"');?></label>
                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_type')); ?></span> 
               
                    <label><div id="company_name"><?php echo $this->lang->line('label_fak_company_name');?>: <span class="req">*</span></div>
                    <div id="customer_name" style="display:none;"><?php echo $this->lang->line('label_fak_customer_name');?>: <span class="req">*</span></div>
                    <?=form_input($fak_customer_or_company_name);?> </label>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_or_company_name')); ?></span> 
                       
           <label><?php echo $this->lang->line('label_fak_care_of');?>: <span class="req">*</span>
           <?=form_input($fak_customer_care_of);?>
           </label>
          
          <label>
                    <div id="company_address"><?php echo $this->lang->line('label_fak_billing_address');?>: <span class="req">*</span></div>
                    <div id="customer_address" style="display:none;"><?php echo $this->lang->line('label_fak_address');?>: <span class="req">*</span></div>
                    <?=form_input($fak_customer_billing_address);?>
          </label>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_billing_address')); ?></span> 
           
           <label>
           <?php echo $this->lang->line('label_fak_zip');?>: <span class="req">*</span>
                    <?=form_input($fak_customer_zip);?>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_zip')); ?></span> 
           </label>
           
           <label>
           <?php echo $this->lang->line('label_fak_city');?>: <span class="req">*</span>
                    <?=form_input($fak_customer_city);?>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_city')); ?></span> 
           </label>
           
           <label>
           <?php echo $this->lang->line('label_country');?>: <span class="req">*</span>
           <?=form_dropdown('fak_customer_country',$fak_customer_country_option,$fak_customer_country,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_country')); ?></span> 
           </label>
           
           <label>            
           <?php echo $this->lang->line('label_fak_email');?>: <span class="req">*</span>
           <?=form_input($fak_customer_email);?>
                    <span><?php echo $this->lang->line('label_fak_email_tips');?></span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_email')); ?></span> 
           </label>
           
           <label>
           <?php echo $this->lang->line('label_fak_customer_no');?>: <span class="req">*</span>
		   <?=form_input($fak_customer_no);?>
                    <span><?php echo $this->lang->line('label_fak_customer_no_tips');?></span>        
			</label>
			
            <label>
                    <div id="company_reg_no"><?php echo $this->lang->line('label_fak_org_no');?>:</div>
                    <div id="customer_reg_no" style="display:none;"><?php echo $this->lang->line('label_fak_person_no');?>:</div>
                    <?=form_input($fak_customer_reg_no);?>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_reg_no')); ?></span>
           </label>
            
           <label><?php echo $this->lang->line('label_fak_to');?>:
                    <?=form_input($fak_customer_to);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_to')); ?></span> 
           </label>
           
           <label>
           <?php echo $this->lang->line('label_fak_contact_no');?>:
                    <?=form_input($fak_customer_contact_no);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_contact_no')); ?></span> 
           </label>
           
           <label>
           <?php echo $this->lang->line('label_fak_admin_notes');?>:
                    <?=form_textarea($admin_notes);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('admin_notes')); ?></span> 
           </label>
           
           <input name="submit" value="Submit" type="submit" />

    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>
<?php }  ?>

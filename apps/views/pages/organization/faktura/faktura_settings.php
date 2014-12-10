<h3 class="content_edit"><?php echo $this->lang->line('fak_settings_msg');?></h3>
<?php
    if($mem_type=="Admin" || $access_faktura){     
        
        if($data_fak_settings_details){
            $fak_settings_id = $data_fak_settings_details[0]->fak_settings_id;
            $fak_no_of_records_per_page = $data_fak_settings_details[0]->fak_no_of_records_per_page;
            $fak_payment_days = $data_fak_settings_details[0]->fak_payment_days;
            $fak_tax_rate = $data_fak_settings_details[0]->fak_tax_rate;
            $fak_invoice_no = $data_fak_settings_details[0]->fak_invoice_no;
            $fak_org_bank_payment_type = $data_fak_settings_details[0]->fak_org_bank_payment_type;
            $fak_logo_include = $data_fak_settings_details[0]->fak_logo_include;
            $fak_email_cc = $data_fak_settings_details[0]->fak_email_cc;
            $fak_payment_details = $data_fak_settings_details[0]->fak_payment_details;
        }
    
        $data_org_bank_payment_type_info_option = $data_org_bank_payment_type_info;
        $fak_no_of_records_per_page_select_option = array(
            '10' => '10',
            '25' => '25',
            '50' => '50',
            '100' => '100'			         
        );     
        $fak_payment_days_select_option = array(
            '10' => '10 days',
            '15' => '15 days',
            '20' => '20 days',
            '30' => '30 days',			         
            '60' => '60 days',			         
            '90' => '90 days'	         
        );     
        $fak_tax_rate_select_option = array(
            '0' => '0%',
            '6' => '6%',
            '12' => '12%',
            '25' => '25%'			         
        );  
        $fak_invoice_no_select_option = array(
            'Yes' => 'Yes',
            'No' => 'No'		         
        );  
        $fak_logo_select_option = array(
            'Yes' => 'Yes',
            'No' => 'No'		         
        );  
        $fak_email_cc_select_option = array(
            'Yes' => 'Yes',
            'No' => 'No'		         
        );  
        $fak_payment_details = array(
            'name'      => 'fak_payment_details',
            'id'        => 'fak_payment_details',
            'value'     => $fak_payment_details,     
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
</script>

<?php echo $this->session->flashdata('message'); ?>
<h5 class="breadcrumb">
	<span class="active"><a href="<?php echo base_url().'organization/info/faktura_settings';?>"><?php echo $this->lang->line('fak_settings');?></a></span>
	<span><a href="<?php echo base_url().'organization/info/faktura_products';?>"><?php echo $this->lang->line('fak_products');?></a></span>
</h5>

<?php echo form_open("organization/info/faktura_settings_update_process"); ?>
    <div class="form">
    
		<label><?php echo $this->lang->line('label_fak_no_of_records_per_page');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_no_of_records_per_page_hints');?></small>
		<?php echo form_dropdown('fak_no_of_records_per_page',$fak_no_of_records_per_page_select_option,$fak_no_of_records_per_page,'class="form_input_select"');?></label>
		
		<span class="markcolor"><?php echo ucwords(form_error('fak_no_of_records_per_page')); ?></span> 
		
		<label><?php echo $this->lang->line('label_fak_payment_days');?>:<span class="req">*</span> <small><?php echo $this->lang->line('label_fak_payment_days_hints');?></small>
		<?php echo form_dropdown('fak_payment_days',$fak_payment_days_select_option,$fak_payment_days,'class="form_input_select"');?></label>
		
		<span class="markcolor"><?php echo ucwords(form_error('fak_payment_days')); ?></span> 
         
		<label><?php echo $this->lang->line('label_fak_tax_rate');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_tax_rate_hints');?></small>
		<?php echo form_dropdown('fak_tax_rate',$fak_tax_rate_select_option,$fak_tax_rate,'class="form_input_select"');?></label>
		<span class="markcolor"><?php echo ucwords(form_error('fak_tax_rate')); ?></span> 
        
		<label><?php echo $this->lang->line('label_fak_invoice_no');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_invoice_no_hints');?></small>
		<?php echo form_dropdown('fak_invoice_no',$fak_invoice_no_select_option,$fak_invoice_no,'class="form_input_select"');?></label>
		<span class="markcolor"><?php echo ucwords(form_error('fak_invoice_no')); ?></span> 
        
		<label><?php echo $this->lang->line('label_fak_payment_account');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_payment_account_hints');?></small>
		<?php    echo form_dropdown('fak_org_bank_payment_type',$data_org_bank_payment_type_info_option,$fak_org_bank_payment_type,'class="form_input_select"');?></label>
		<span class="markcolor"><?php echo ucwords(form_error('fak_org_bank_payment_type')); ?></span> 
        
		<label><?php echo $this->lang->line('label_fak_logo_include');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_logo_include_hints');?></small>
		<?php echo form_dropdown('fak_logo_include',$fak_logo_select_option,$fak_logo_include,'class="form_input_select"');?> </label>
		<span class="markcolor"><?php echo ucwords(form_error('fak_logo_include')); ?></span> 
        
		<label><?php echo $this->lang->line('label_fak_email_cc');?>: <span class="req">*</span> <small><?php echo $this->lang->line('label_fak_email_cc_hints');?></small>
		<?php echo form_dropdown('fak_email_cc',$fak_email_cc_select_option,$fak_email_cc,'class="form_input_select"');?></label>
		<span class="markcolor"><?php echo ucwords(form_error('fak_email_cc')); ?></span> 
        
		<label><?php echo $this->lang->line('label_fak_payment_details');?>:
		<?php echo form_textarea($fak_payment_details);?> </label>       
		<span class="markcolor"><?php echo ucwords(form_error('fak_payment_details')); ?></span> 
		
		<input  name="submit" value="Submit" type="submit">

        </div>
    <?php echo form_close(); ?>
   <?php } else { ?>  
<span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>
<?php }  ?>

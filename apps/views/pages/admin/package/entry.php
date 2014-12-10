<?php 

if($global_settings_data){
        foreach($global_settings_data as $rows)
        {				
            $per_sms_cost = $rows->per_sms_cost;
            $per_letter_cost = $rows->per_letter_cost;
            $per_invoice_cost = $rows->per_invoice_cost;
            $allowed_sms_per_month = $rows->allowed_sms_per_month;
            $allowed_letter_per_month = $rows->allowed_letter_per_month;                     
            $admin_cost = $rows->admin_cost;                     
        }
}

$package_name = array(
              'name'      => 'package_name',
              'id'        => 'package_name',
              'value'     => $package_name,          
			  'class'     => 'form_normal'              
            );
		  		
		 $no_of_member = array(
              'name'      => 'no_of_member',
              'id'        => 'no_of_member',
              'value'     => $no_of_member,          
			  'class'     => 'form_normal'              
            );
         
		 $duration = array(
              'name'      => 'duration',
              'id'        => 'duration',
              'value'     => $duration,          
			  'class'     => 'form_normal'              
            );
            
            $billing_module_cost= array(
              'name'      => 'billing_module_cost',
              'id'        => 'billing_module_cost',
              'value'     => $billing_module_cost,          
			  'class'     => 'form_normal'              
            );
            
            $letter_module_cost= array(
              'name'      => 'letter_module_cost',
              'id'        => 'letter_module_cost',
              'value'     => $letter_module_cost,          
			  'class'     => 'form_normal'              
            );
            
             $sms_module_cost= array(
              'name'      => 'sms_module_cost',
              'id'        => 'sms_module_cost',
              'value'     => $sms_module_cost,          
			  'class'     => 'form_normal'              
            );
            $member_fee_module_cost= array(
              'name'      => 'member_fee_module_cost',
              'id'        => 'member_fee_module_cost',
              'value'     => $member_fee_module_cost,          
			  'class'     => 'form_normal'              
            );
            /* $packaging_module_cost= array(
              'name'      => 'packaging_module_cost',
              'id'        => 'packaging_module_cost',
              'value'     => $packaging_module_cost,          
			  'class'     => 'form_normal'              
            );*/
		  $full_package_cost = array(
              'name'      => 'full_package_cost',
              'id'        => 'full_package_cost',
              'value'     => $full_package_cost,          
			  'class'     => 'form_normal'              
            );
        
        $per_sms_cost = array(
              'name'      => 'per_sms_cost',
              'id'        => 'per_sms_cost',
              'value'     => $per_sms_cost,          
			  'class'     => 'form_normal'              
            );
		  
           $per_letter_cost = array(
              'name'      => 'per_letter_cost',
              'id'        => 'per_letter_cost',
              'value'     => $per_letter_cost,          
			  'class'     => 'form_normal'              
            );
           $admin_cost = array(
              'name'      => 'admin_cost',
              'id'        => 'admin_cost',
              'value'     => $admin_cost,          
			  'class'     => 'form_normal'              
            );
            
            $per_invoice_cost = array(
              'name'      => 'per_invoice_cost',
              'id'        => 'per_invoice_cost',
              'value'     => $per_invoice_cost,          
			  'class'     => 'form_normal'              
            );
           $allowed_sms_per_month = array(
              'name'      => 'allowed_sms_per_month',
              'id'        => 'allowed_sms_per_month',
              'value'     => $allowed_sms_per_month,          
			  'class'     => 'form_normal'              
            );
            
             $allowed_letter_per_month= array(
              'name'      => 'allowed_letter_per_month',
              'id'        => 'allowed_letter_per_month',
              'value'     => $allowed_letter_per_month,          
			  'class'     => 'form_normal'              
            );            
           $currency_option = $currency_data;          
           
           $active_option = array(
            '1' => $this->lang->line('label_active'),
            '0' => $this->lang->line('label_inactive')
          );     
		   
		   $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => 'Save',
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);

?>


<style>
    .markcolor{ color:red}
    .style1 {color: #FF3333}
</style>
<h3 class="content_edit"><?php echo $this->lang->line('package_entry_msg');?></h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("admin/info/added_package"); ?>
    <?php echo $this->session->flashdata('message'); ?>


    <?php echo $this->lang->line('label_package_name');?><span class="style1">*</span><br>
    <?=form_input($package_name);?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span> 
    
    <?php echo $this->lang->line('label_no_of_member');?><span class="style1">*</span><br>
    <?=form_input($no_of_member);?><br><br>   
    <span class="markcolor"><?php echo ucwords(form_error('no_of_member')); ?></span>  
    
    <?php echo $this->lang->line('label_duration');?><span class="style1">*</span><br>
    <?=form_input($duration);?>   <?php echo $this->lang->line('label_month');?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('duration')); ?></span>
   
    <?php echo $this->lang->line('label_billing_module_cost');?><span class="style1"></span><br>
    <?=form_input($billing_module_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('billing_module_cost')); ?></span>
    
    <?php echo $this->lang->line('label_letter_module_cost');?><span class="style1"></span><br>
    <?=form_input($letter_module_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('letter_module_cost')); ?></span>
    
    <?php echo $this->lang->line('label_sms_module_cost');?><span class="style1"></span><br>
    <?=form_input($sms_module_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('sms_module_cost')); ?></span>
    
    <?php echo $this->lang->line('label_member_fee_module_cost');?><span class="style1"></span><br>
    <?=form_input($member_fee_module_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('member_fee_module_cost')); ?></span>
        
    <?php echo $this->lang->line('label_full_module_cost');?><span class="style1"></span><br>
    <?=form_input($full_package_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('full_package_cost')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?><span class="style1">*</span><br>
    <?=form_input($per_sms_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('per_sms_cost')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?><span class="style1">*</span><br>
    <?=form_input($per_letter_cost);?> <br><br>
    
    <?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?><br/>
    <?=form_input($allowed_sms_per_month);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('allowed_sms_per_month')); ?></span>
    <?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>
    <?=form_input($allowed_letter_per_month);?><br><br>
    <?php echo $this->lang->line('invoice_cost');?><br>
    <?=form_input($per_invoice_cost);?><br><br>
     <?php echo $this->lang->line('label_admin_cost');?><br>
    <?=form_input($admin_cost);?><br><br>
    <?php echo $this->lang->line('label_currency');?>
    <span class="style1">*</span><br>
    <?=form_dropdown('currency_id',$currency_option,'','class="form_input_select"');?>
    <br/>
    <?php echo $this->lang->line('label_status');?>
    <span class="style1">*</span><br>
    <?=form_dropdown('active',$active_option,'','class="form_input_select"');?>
    
    
    
    <span class="markcolor"><?php echo ucwords(form_error('currency_id')); ?></span>

    <br><br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

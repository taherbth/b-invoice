<style>
    .markcolor{ color:red}
</style>
<h3 class="content_edit"><?php echo $this->lang->line('admin_control_modify_packages');?></h2>

<?PHP

if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$package_name = array(
              'name'      => 'package_name',
              'id'        => 'package_name',
              'value'     => $org_info->package_name,          
			  'class'     => 'form_normal'              
            );
		  		
		 $no_of_member = array(
              'name'      => 'no_of_member',
              'id'        => 'no_of_member',
              'value'     => $org_info->no_of_member,          
			  'class'     => 'form_normal'              
            );
         
		 $duration = array(
              'name'      => 'duration',
              'id'        => 'duration',
              'value'     => $org_info->duration,          
			  'class'     => 'form_normal'              
            );
            
		  $amount = array(
              'name'      => 'amount',
              'id'        => 'amount',
              'value'     => $org_info->amount,          
			  'class'     => 'form_normal'              
            );
        
        $sms_cost = array(
              'name'      => 'sms_cost',
              'id'        => 'sms_cost',
              'value'     => $org_info->sms_cost,          
			  'class'     => 'form_normal'              
            );
		  
           $letter_cost = array(
              'name'      => 'letter_cost',
              'id'        => 'letter_cost',
              'value'     => $org_info->letter_cost,          
			  'class'     => 'form_normal'              
            );
          
          $currency_option = $currency_data;
		   
		   $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => 'Save',
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            
?>
<?php


/*$package_name = array(
    'name' => 'package_name',
    'id' => 'package_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'class' =>'form_normal',
    'value' => $org_info->package_name
);
$no_of_member = array(
    'name' => 'no_of_member',
    'id' => 'no_of_member',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'class' =>'form_normal',
    'value' => $org_info->no_of_member
);
$amount = array(
    'name' => 'amount',
    'id' => 'amount',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->amount
);
$duration = array(
    'name' => 'duration',
    'id' => 'duration',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->duration
);*/
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">

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
    
    <?php echo $this->lang->line('label_subscription_fee')."/".$this->lang->line('label_month');?><span class="style1">*</span><br>
    <?=form_input($amount);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('amount')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?><span class="style1">*</span><br>
    <?=form_input($sms_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('sms_cost')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?><span class="style1">*</span><br>
    <?=form_input($letter_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('letter_cost')); ?></span>
    <?php echo $this->lang->line('label_currency');?>
    <span class="style1">*</span><br>
    <?=form_dropdown('currency_id',$currency_option,$org_info->currency_id,'class="form_input_select"');?>
    <span class="markcolor"><?php echo ucwords(form_error('currency_id')); ?></span>
    <br><br>

    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

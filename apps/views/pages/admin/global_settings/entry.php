<?php 

if($global_settings_data){
        foreach($global_settings_data as $rows)
        {				
            $sms_cost = $rows->per_sms_cost;
            $letter_cost = $rows->per_letter_cost;
            $invoice_cost = $rows->per_invoice_cost;
            $sms_per_month = $rows->allowed_sms_per_month;
            $letter_per_month = $rows->allowed_letter_per_month;                     
            $admin_cost = $rows->admin_cost;                     
        }
}

    $per_sms_cost = array(
              'name'      => 'per_sms_cost',
              'id'        => 'per_sms_cost',
              'value'     => $sms_cost,          
			  'class'     => 'form_normal'              
            );
		  		
		 $per_letter_cost = array(
              'name'      => 'per_letter_cost',
              'id'        => 'per_letter_cost',
              'value'     => $letter_cost,          
			  'class'     => 'form_normal'              
            );
         
		 $per_invoice_cost = array(
              'name'      => 'per_invoice_cost',
              'id'        => 'per_invoice_cost',
              'value'     => $invoice_cost,          
			  'class'     => 'form_normal'              
            );
            
		  $allowed_sms_per_month = array(
              'name'      => 'allowed_sms_per_month',
              'id'        => 'allowed_sms_per_month',
              'value'     => $sms_per_month,          
			  'class'     => 'form_normal'              
            );
        
        $allowed_letter_per_month = array(
              'name'      => 'allowed_letter_per_month',
              'id'        => 'allowed_letter_per_month',
              'value'     => $letter_per_month,          
			  'class'     => 'form_normal'              
            );
		  
          $admin_cost = array(
              'name'      => 'admin_cost',
              'id'        => 'admin_cost',
              'value'     => $admin_cost,          
			  'class'     => 'form_normal'              
            );
		   
		   $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => 'Save',
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);

?>

<h3 class="content_edit"><?php echo $this->lang->line('global_settings_msg');?></h2>

<style>
    .markcolor{ color:red}
</style>
<script>
    function check_value()
    {
        var myvar = document.getElementById("global_cost").checked;
        if(myvar)
        {
            $("#p").hide();
        }
        else
        {
            $("#p").show();
        }
    }
</script>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart("admin/info/save_global_settings"); ?>
    <?php echo $this->session->flashdata('message'); ?>      
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?><br>
    <?=form_input($per_sms_cost);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('per_sms_cost')); ?></span> 
   <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?><br>
   <?=form_input($per_letter_cost);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('per_letter_cost')); ?></span>    
    <?php echo $this->lang->line('invoice_cost');?><br>
    <?=form_input($per_invoice_cost);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('per_invoice_cost')); ?></span>
    <?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?>
    <?=form_input($allowed_sms_per_month);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('allowed_sms_per_month')); ?></span>
    <?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>
    <?=form_input($allowed_letter_per_month);?><br><br>
    <?php echo $this->lang->line('label_admin_cost');?><br>
    <?=form_input($admin_cost);?><br><br>
        
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('save_changes_btn');?>" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

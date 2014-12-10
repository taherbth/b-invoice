<?php 

if($query1){
        foreach($query1 as $rows)
        {		
            $org_sms_per_month = $rows->org_allowed_sms_per_month?$rows->org_allowed_sms_per_month:0;
            $org_letter_per_month = $rows->org_allowed_letter_per_month?$rows->org_allowed_letter_per_month:0;                     
        }
}

		  $org_allowed_sms_per_month = array(
              'name'      => 'org_allowed_sms_per_month',
              'id'        => 'org_allowed_sms_per_month',
              'value'     => $org_sms_per_month,          
			  'class'     => 'form_normal'              
            );
        
        $org_allowed_letter_per_month = array(
              'name'      => 'org_allowed_letter_per_month',
              'id'        => 'org_allowed_letter_per_month',
              'value'     => $org_letter_per_month,          
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

<h3 class="content_edit"><?php echo $this->lang->line('restriction_on_sms_letter_msg');?></h2>

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
    <?php echo form_open_multipart("admin/info/restriction_on_sms_letter_saved"); ?>
  
    <?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?>
    <?=form_input($org_allowed_sms_per_month);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('org_allowed_sms_per_month')); ?></span>
    <?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>
    <?=form_input($org_allowed_letter_per_month);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('org_allowed_letter_per_month')); ?></span>
    
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('save_changes_btn');?>" class="submit" type="image">
    <?=form_hidden('org_id', $org_id);?>
    <?php echo form_close(); ?>
</div>

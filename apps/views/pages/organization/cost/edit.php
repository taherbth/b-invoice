<h3 class="content_edit">Org Admin Control Panel Modify Cost Seetings</h2>
<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;
$currency=array(
''=>'select',
'USD'=>'USD',
'EUR'=>'EUR',
'GBP'=>'GBP',
'CAD'=>'CAD',
'AUD'=>'AUD'
);
 
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
    Sms Cost<br>   

    <input name="sms_cost" value="<?php echo $org_info->sms_cost; ?>" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('sms_cost')); ?></span> 

    <br><br>
    Letter Cost<br>   

    <input name="letter_cost" value="<?php echo $org_info->letter_cost; ?>" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('letter_cost')); ?></span> 
    <br>
    Currency<br>   
    <?php echo form_dropdown('currency',$currency,$org_info->currency);?>
    <span class="markcolor"><?php echo ucwords(form_error('currency')); ?></span> 
    <br>
    
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

<style>
    .markcolor{ color:red}
</style>
<h3 class="content_edit"><?php echo $this->lang->line('admin_control_edit_currency');?> </h2>

<?php
if (count($record)):
    foreach ($record as $currency):
    endforeach;
endif;

$currency_name = array(
    'name' => 'currency_name',
    'id' => 'currency_name',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $currency->currency_name
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    
   <?php echo $this->lang->line('label_currency_name'); ?><br>

    <input name="id" value="<?php echo $currency->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($currency_name); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('currency_name')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

<h3 class="content_edit">Org Admin Control Panel Modify Usertype</h2>

<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$org_group = array(
    'name' => 'user_type',
    'id' => 'user_type',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $org_info->user_type
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
   User Type<br>

    <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($org_group); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('user_type')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>

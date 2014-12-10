<h3 class="content_edit"><?php echo $this->lang->line('edit_admin_user_type_msg');?></h2>

<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $type_info):
    endforeach;
endif;

$type_name = array(
    'name' => 'type_name',
    'id' => 'user_type',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $type_info->type_name
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
   <?php echo $this->lang->line('label_type_name');?><br>

    <input name="id" value="<?php echo $type_info->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($type_name); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('type_name')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('submit_btn');?>" class="submit" type="image">
    <?php echo form_close(); ?>
</div>

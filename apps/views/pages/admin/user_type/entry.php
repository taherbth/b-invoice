<h3 class="content_edit"><?php echo $this->lang->line('add_admin_user_type_msg');?></h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("admin/backend/added_admin_user_types"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo $this->lang->line('label_type_name');?><br>
    <input name="type_name" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('type_name')); ?></span> 

    <br><br>
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('submit_btn');?>" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
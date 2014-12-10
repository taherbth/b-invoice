<h3 class="content_edit">Org Admin Control Panel Create Group</h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/added_group"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    Group Name<br>
    <input name="group_name" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('group_name')); ?></span> 

    <br><br>
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
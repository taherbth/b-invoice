<h3 class="content_edit">Org Admin Control Panel Creat Usertype</h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/added_user_type"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    User Type name<br>
    <input name="user_type" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('user_type')); ?></span> 

    <br><br>
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
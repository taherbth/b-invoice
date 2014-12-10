<h3 class="content_edit"><?php echo $this->lang->line('create_external_contact_message');?></h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/create_external_contact_process"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo $this->lang->line('label_external_contact_name');?><br>
    <input name="ext_contact_name" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('ext_contact_name')); ?></span> 
    
    <?php echo $this->lang->line('label_external_contact_cell_no');?><br>
    <input name="ext_contact_cell" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('ext_contact_cell')); ?></span> 
    
    <?php echo $this->lang->line('label_external_contact_email');?><br>
    <input name="ext_contact_email" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('ext_contact_email')); ?></span> 
    
    <?php echo $this->lang->line('label_external_contact_address');?><br>
    <textarea class="form_normal" name="ext_contact_address" rows="5" cols="20"> </textarea>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('ext_contact_address')); ?></span> 
    
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
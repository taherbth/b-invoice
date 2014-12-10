<h3><?php echo $this->lang->line('create_org_member_groups_message');?></h3>
<div class="units-row">
    <div class="unit-50">
		<?php echo form_open_multipart("organization/info/add_member_groups_process"); ?>
		<?php echo $this->session->flashdata('message'); ?>
		<label><?php echo $this->lang->line('label_group_name');?>
		<input name="group_name" type="text"></label>
		<span class="markcolor"><?php echo ucwords(form_error('group_name')); ?></span> 
		<input name="submit" value="Submit" type="submit">
		<?php echo form_close(); ?>
	</div>
</div>
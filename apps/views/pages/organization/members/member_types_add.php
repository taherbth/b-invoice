<h3 class="content_edit"><?php echo $this->lang->line('add_org_member_type_msg');?></h3>

<?php 
    if($access_member_types){ 
?>
<table class="width-100">
		<?php echo form_open_multipart("organization/info/add_org_member_types_process"); ?>
		<?php echo $this->session->flashdata('message'); ?>
		<tr>
		<td><label><?php echo $this->lang->line('label_type_name');?></label></td>
		<td>
		<input name="type_name" type="text">
		<span class="error"><?php echo ucwords(form_error('type_name')); ?></span></td>
		</tr>
</table>
		<input name="submit" value="<?php echo $this->lang->line('submit_btn');?>" type="submit">
		<?php echo form_close(); ?>
<?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('members_type_no_access_msg');?></span>
<?php }  ?>
<h3 class="content_edit"><?php echo $this->lang->line('edit_admin_user_type_msg');?></h3>

<style>
    .markcolor{ color:red}
</style>

<?php

if($access_member_types){ 

if (count($record)):
    foreach ($record as $type_info):
    endforeach;
endif;

$type_name = array(
    'name' => 'type_name',
    'id' => 'user_type',
	'class'=>'form_normal',
    'value' => $type_info->type_name
);
?>
<div class="row">
	<div class="unit-50">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
	<label>
   	<?php echo $this->lang->line('label_type_name');?>
    <input name="id" value="<?php echo $type_info->mem_type_id; ?>" class="form_normal" type="hidden">
	<?php echo form_input($type_name); ?>
	</label>
    <span class="markcolor"><?php echo ucwords(form_error('type_name')); ?></span> 
    <input type="submit" name="submit" value="<?php echo $this->lang->line('submit_btn');?>" class="btn submit">
    <?php echo form_close(); ?>
	</div><!-- end .unit-50 -->
</div><!-- end .row -->

<?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('members_type_no_access_msg');?></span>
<?php }  ?>

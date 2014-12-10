
<h3 class="content_edit"><?php echo $this->lang->line('update_org_member_groups_message');?></h2>

<style>
    .markcolor{ color:red}
</style>
<?php

 if($members_c_group) {  
 
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$org_group = array(
    'name' => 'org_group',
    'id' => 'org_group',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->group_name
);
?>
<table class="width-100">
<tr>
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <td><label>
	<?php echo $this->lang->line('label_group_name');?></label>
    </td>
    <td width="50%">
    <input name="id" value="<?php echo $org_info->group_id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($org_group); ?>
    <span class="markcolor"><?php echo ucwords(form_error('org_group')); ?></span> 
    </td>
</tr>
</table>
    <input type="submit" name="submit" value="Submit">
    <?php echo form_close(); ?>
    <?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('members_groups_no_access_msg');?></span>

</div><?php }  ?>

<h3><?php echo $this->lang->line('view_org_member_types_message');?></h3>

<?php 
    if($access_member_types){ 
?>
      <?php $user_types_create_new_user_types = 1; if($user_types_create_new_user_types){  
		echo '<a class="button add" href="'.base_url().'organization/info/add_org_member_types">'.$this->lang->line('label_create_new').'</a>'; } ?>
<?php echo $this->session->flashdata('message'); ?>

<!--<legend><?php echo $this->lang->line('view_org_member_types');?></legend>-->
<table class="width-100 table-striped">
    <thead>
	<tr>
        <th><?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_type_name');?></th>              
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
	</thead>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($query1)) {
        $i = 1;
        foreach ($query1 as $type_info) {
            $type_assigned = $this->info_model->check_admin_user_type_assigned($type_info->mem_type_id);
            ?>
            <tr>
                <td width="3%" align="center"><?php echo $type_info->mem_type_id; ?></td>              
                <td align="center" width="8%"><?php echo $type_info->type_name; ?></td>               
                <td align="center" width="12%">
                
                <?php  $user_types_previlization_settings =1 ; if($user_types_previlization_settings){ 
				echo '<a class="button" href="'.base_url().'organization/info/viewed_org_member_type_previlize/'.$type_info->mem_type_id.'">'.$this->lang->line('previlization_settings_link').'</a>';
                }  $user_types_edit_user_types =1; if($user_types_edit_user_types){
                ?>
                <a class="button" href="<?php echo base_url(); ?>organization/info/edit_org_member_types/<?php echo $type_info->mem_type_id; ?> " title="Edit the Content">Edit</a>
                <?php }
                if(!$type_assigned){ ?>
                  <a onclick="return confirmSubmit()" class="button" href="<?php echo base_url() ?>organization/info/org_member_type_delete/<?php echo $type_info->mem_type_id; ?>" title="Delete the Content">Delete</a>
            <?php } 
               
               else{echo $this->lang->line('not_available_msg');}
                ?></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>

    <?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('members_type_no_access_msg');?></span>

</div><?php }  ?>
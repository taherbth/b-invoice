<h3 class="content_edit"><?php echo $this->lang->line('view_org_member_groups_message');?></h2>
<?php 
    if($members_c_group){ 
?>
  <!--<legend><?php echo $this->lang->line('view_org_member_group');?></legend>-->
        <?php $user_types_create_new_user_types = 1; if($user_types_create_new_user_types){  echo '<a class="button add" href="'.base_url().'organization/info/add_member_groups'.'">'.$this->lang->line('label_create_new').'</a>'; } ?>

<?php echo $this->session->flashdata('message'); ?>
<table class="width-100 table-striped">
    <thead>
	<tr>
        <th><?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_group_name');?></th>              
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
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr>
                <td><?php echo $package_info->group_id; ?></td>              
                <td><?php echo $package_info->group_name; ?></td>               

                <td>
                        <?php  
                            if($mem_type=="Admin" || $members_add_group){
                                echo '<a class="button" href="'.base_url().'organization/info/add_member_to_group/'.$package_info->group_id.'">'.$this->lang->line('add_member_to_group_link').'</a>';
                            }
                        ?>
                    <a class="button" href="<?php echo base_url(); ?>organization/info/org_group_edit/<?php echo $package_info->group_id; ?> " title="Edit the Content">Edit</a>
					<a class="button" onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/org_group_delete/<?php echo $package_info->group_id; ?>" title="Delete the Content">Delete</a>
				</td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
<?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('members_groups_no_access_msg');?></span>

</div><?php }  ?>
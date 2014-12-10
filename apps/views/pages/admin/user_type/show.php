<h3 class="content_edit"><?php echo $this->lang->line('view_admin_user_type_msg');?></h2>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

  <fieldset>
      <legend align="left"><?php echo $this->lang->line('view_types');?></legend>
      <?php if($user_types_create_new_user_types){  echo anchor(base_url()."admin/backend/add_admin_user_types", $this->lang->line('label_create_new')); } ?>
<?php echo $this->session->flashdata('message'); ?>
<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px; ">
    <tr>
        <th><?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_type_name');?></th>              
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
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
            $type_assigned = $this->users->check_admin_user_type_assigned($type_info->id);
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $type_info->id; ?></td>              
                <td align="center" width="8%"><?php echo $type_info->type_name; ?></td>               
                <td align="center" width="12%">
                
                <?php if($user_types_previlization_settings){ echo anchor(base_url()."admin/backend/viewed_admin_user_type_previlize/$type_info->id", $this->lang->line('previlization_settings_link'))."<br/>";
                } if($user_types_edit_user_types){
                ?>
                <a href="<?php echo base_url(); ?>admin/backend/admin_user_type_edit/<?php echo $type_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
                <?php }
                if(!$type_assigned){ if($user_types_delete_user_types){ ?>
                    &nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/backend/admin_user_type_delete/<?php echo $type_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a><br/>
            <?php } }
               
               else{echo $this->lang->line('not_available_msg');}
                ?></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>
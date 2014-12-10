<h3 class="content_edit"><?php echo $this->lang->line('admin_control_org_category');?>  </h2>
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
      <legend align="left"><?php echo $this->lang->line('label_org_category');?></legend>
      <?php echo anchor(base_url()."admin/info/add_org_category", $this->lang->line('label_create_new'));?>

<?php echo $this->session->flashdata('message'); ?>
<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th> <?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_org_category');?></th>
        <th><?php echo $this->lang->line('label_status');?></th>       
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
        foreach ($query1 as $org_category) {

            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            $category_assigned = $this->info_model->check_category_assigned($org_category->id);
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $org_category->id; ?></td>
                <td width="3%" align="center"><?php echo $org_category->category_name; ?></td>
                <td width="3%" align="center">
                    <?php if ($org_category->status == 1): ?>
                        <a href="<?php echo base_url(); ?>admin/info/approve_org_category/<?php echo $org_category->id; ?> ">Approve</a>
                        <a href="<?php echo base_url(); ?>admin/info/deny_org_category/<?php echo $org_category->id; ?> ">Deny</a>

                    <?php endif; ?>
                </td>                               
                <td align="center" width="12%">
                <?php if(!$category_assigned){?>
                    <a href="<?php echo base_url(); ?>admin/info/org_category_edit/<?php echo $org_category->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
                    &nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/delete_org_category/<?php echo $org_category->id; ?>" title="Delete the Content">
                    <img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a>
                <?php } 
                else{echo $this->lang->line('not_available_msg');}
                ?>    
                </td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>





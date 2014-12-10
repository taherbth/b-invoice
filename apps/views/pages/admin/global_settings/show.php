<h3 class="content_edit">Admin Control Panel View Cost Settings </h2>
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
      <legend align="left">View Cost Settings</legend>

<?php echo $this->session->flashdata('message'); ?>

<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th> ID</th>
        <th>Package Name</th>
        <th>Sms Cost</th>       
        <th>Letter Cost</th> 
        <th>Currency</th>       
      
        <th>Action</th>
    </tr>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("Are you sure to delete this record?");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($query1)) {
        $i = $loop_start + 1;
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            if ($package_info->package_name == 'Globalcost') {
                $p_name = $package_info->package_name;
            } else {
                $query = $this->db->query("select package_name from package where id='" . $package_info->package_name . "'");
                foreach ($query->result() as $info) {
                    $p_name = $info->package_name;
                }
                if (!empty($p_name)):$p_name = $p_name;
                else:$p_name = "";
                endif;
            }
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->id; ?></td>
                <td width="3%" align="center"><?php echo $p_name; ?></td>
                <td align="center" width="8%"><?php echo $package_info->sms_cost; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->letter_cost; ?></td>  
                <td align="center" width="8%"><?php echo $package_info->currency; ?></td>               
                <td align="center" width="12%">
                    <?php if($p_name=="Globalcost"){?>
                    <a href="<?php echo base_url(); ?>admin/info/cost_edit_global/<?php echo $package_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;
                    <a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/cost_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
                   <?php }else{?>
                    <a href="<?php echo base_url(); ?>admin/info/cost_edit/<?php echo $package_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;
                    <a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/cost_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
                    <?php }?> 
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
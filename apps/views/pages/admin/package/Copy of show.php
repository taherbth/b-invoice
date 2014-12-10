<?php echo $this->session->flashdata('message'); ?>
<table width="95%" border="1" align="center" style="border-collapse:collapse; margin-top:30px;">
    <tr>
        <th>Package ID</th>
        <th>Package Name</th>      
        <th>No of Member</th>
        <th>Price</th>
        <th>Currency</th>
        <th>Duration</th>
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
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->id; ?></td>
                <td align="center" width="8%"><?php echo $package_info->package_name; ?></td>
                <td align="center" width="8%"><?php echo $package_info->no_of_member; ?></td>
                <td align="center" width="8%"><?php echo $package_info->amount; ?></td>
                <td align="center" width="8%"><?php echo $package_info->currency; ?></td>
                <td align="center" width="8%"><?php echo $package_info->duration; ?></td>

                <td align="center" width="12%">
                    <a href="<?php echo base_url(); ?>admin/info/package_edit/<?php echo $package_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/package_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
<?php echo $this->session->flashdata('message'); ?>
<table width="95%" border="1" align="center" style="border-collapse:collapse; margin-top:30px;">
    <tr>
        <th>Title</th>
        <th>Text</th>       
        <th>Validity</th>
        <th>Creation Date</th>
        <th>created_by</th>
        <th>Importance</th>
        <th>Expire Date</th>
        <th>Status</th>
        <th>Send</th>
    </tr>
    <?php
    if (count($query1)) {
        $i = 1;
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->title; ?></td>
                <td width="3%" align="center"><?php echo $package_info->text; ?></td>
                <td width="3%" align="center"><?php echo $package_info->validity; ?></td>
                <td width="3%" align="center"><?php echo $package_info->date_of_creation; ?></td>
                <td width="3%" align="center"><?php echo $package_info->created_by; ?></td>
                <td width="3%" align="center"><?php echo $package_info->importance; ?></td>
                <td width="3%" align="center"><?php echo $package_info->expire_date; ?></td>
                <td width="3%" align="center"><?php
        if ($package_info->status == 1):echo "Pending";
        else:echo "Approved";
        endif;
        ?></td>
                <td width="3%" align="center"> <a href="<?php echo base_url(); ?>org_member/info/post_send/<?php echo $package_info->id; ?> ">Send To</a></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>





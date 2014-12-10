
<fieldset>
    <legend align="left">Profile Information</legend>
    <table width="95%" border="1" align="center" style="border-collapse:collapse; margin-top:30px;">
        <tr>
            <th>SN</th>
            <th>A/N</th>
            <th>Picture</th>
            <th>Name</th>           
            <th>Proffession</th>          
            <th>Phone</th>
            <th>Deposit amount</th>
            <th>Account Type</th>
            <th>Account Category</th>
            <th>Status</th>
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
            $i = 1;
            foreach ($query1 as $profile_info) {
                if ($i % 2 == 0): $color = "#FFFFFF";
                else : $color = "#DDDDDD";
                endif;
                ?>
                <?php
                $query9 = $this->db->query("select * from account where acc_no='" . $profile_info->acc_no . "'");
                foreach ($query9->result() as $account_info):
                    $type = $account_info->account_type;
                    $category = $account_info->account_category;
                endforeach;
                ?>
                <tr bgcolor="<?php echo $color; ?>">
                    <td width="3%" align="center"><?php echo $i; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->acc_no; ?></td>
                    <td align="left" width="5%"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $profile_info->photo1 . ' width="50" /> '; ?>
                    <td align="center" width="8%"><?php echo $profile_info->name; ?></td>
                    <?php
                    $pname = "";
                    if (!empty($profile_info->proffession)):
                        $query66 = $this->db->query("select name from proffession where id='" . $profile_info->proffession . "'");
                        foreach ($query66->result() as $p_info) {
                            $pname = $p_info->name;
                        }
                        ?>
                        <td align="center" width="8%"><?php echo $pname; ?></td>
                    <?php else: ?>
                        <td align="center" width="8%"><?php echo $pname; ?></td>
                    <?php endif; ?>
                    <td align="center" width="8%"><?php echo $profile_info->phone; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->monthly_deposit_amount; ?></td>
                    <td align="center" width="8%"><?php
            if ($type == 1):echo "Master";
            else:echo "<em style='color:green;'>Child</em>";
            endif;
                    ?>
                    </td>
                    <td align="center" width="8%"><?php
                if ($category == 1):echo "Owner";
                else:echo "<em style='color:green;'>Investor</em>";
                endif;
                    ?>
                    </td>
                    <td align="center" width="8%"><?php
                if ($profile_info->status == 0):echo "<em style='color:red;'>Bloked</em>";
                else:echo "Active";
                endif;
                    ?>
                    </td>

                    <td align="center" width="12%">
                        <a href="<?php echo base_url(); ?>admin/info/profile_edit/<?php echo $profile_info->acc_no; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/profile_delete/<?php echo $profile_info->acc_no; ?>/<?php echo $profile_info->zone; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
                </tr>
                <?php
                $i = $i + 1;
            }
        }
        ?>

    </table>
</fieldset>
<table width="95%" border="0" align="center" style="border-collapse:collapse; margin-top:10px;">

</table>

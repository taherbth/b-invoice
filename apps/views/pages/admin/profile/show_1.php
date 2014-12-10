<h2 class="t_heading">Admin Control Panel - Loan Account View</h2>
<fieldset>
    <legend align="left">Loan Account View</legend>
    <table width="95%" border="1" align="center" style="border-collapse:collapse; margin-top:30px;">
        <tr>
            <th>SN</th>
            <th>A/N</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Proffession</th>
            <th>Date of Birth</th>
            <th>Phone</th>
            <th>Loan Amount</th>
            <th>Duration</th>
            <th>Rate</th>
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
            foreach ($query1 as $profile_info) {
                if ($i % 2 == 0): $color = "#FFFFFF";
                else : $color = "#DDDDDD";
                endif;
                ?>
                <tr bgcolor="<?php echo $color; ?>">
                    <td width="3%" align="center"><?php echo $i; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->acc_no; ?></td>
                    <td align="left" width="5%"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $profile_info->photo3 . ' width="50" /> '; ?>
                    <td align="center" width="8%"><?php echo $profile_info->name; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->father_name; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->proffession; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->date_of_birth; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->phone; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->loan_amount; ?></td>
                    <td align="center" width="8%"><?php echo $profile_info->duration; ?> Year</td>
                    <td align="center" width="8%"><?php echo $profile_info->profit_rate; ?> %</td>
                    <td align="center" width="12%">
                        <a href="<?php echo base_url(); ?>admin/info/loan_profile_edit/<?php echo $profile_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/loan_profile_delete/<?php echo $profile_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
                </tr>
                <?php
                $i = $i + 1;
            }
        }
        ?>
        <tr><td colspan="9" align="center"> <?php echo $this->pagination->create_links(); ?></td></tr>

    </table>
</fieldset>

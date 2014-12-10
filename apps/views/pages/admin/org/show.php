<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
<?php echo form_open("admin/info/added_zone"); ?>
<fieldset>
    <legend align="left">Zone</legend>
    <table align="center" width="70%">

        <tr><td colspan="3"></td></tr>
        <tr>
            <td align="left" valign="top"><?php echo form_label('Zone '); ?><span class="markcolor">*</span></td>
            <td valign="top">:</td>
            <td>
                <?php echo form_input($zone); ?>
                <span class="markcolor"><?php echo ucwords(form_error('zone')); ?></span>
            </td>
        </tr>

        <tr><td colspan="3"></td></tr>


        <tr><td colspan="3"></td></tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <?php // echo form_submit('save', 'Save');  ?> 
                <input type="submit" name="submit" class="submit" value="" />


            </td>
        </tr>
    </table>

</fieldset>

<?php echo form_close(); ?>
<fieldset>
    <legend align="left">Zone Information</legend>
    <table width="95%" border="1" align="center" style="border-collapse:collapse; margin-top:30px;">
        <tr>
            <th>SN</th>
            <th>Zone</th>
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
            foreach ($query1 as $zone_info) {
                if ($i % 2 == 0): $color = "#FFFFFF";
                else : $color = "#DDDDDD";
                endif;
                ?>
                <tr bgcolor="<?php echo $color; ?>">
                    <td width="3%" align="center"><?php echo $i; ?></td>
                    <td align="center" width="8%"><?php echo $zone_info->zone; ?></td>

                    <td align="center" width="12%">
                        <a href="<?php echo base_url(); ?>admin/info/zone_edit/<?php echo $zone_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/zone_delete/<?php echo $zone_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
                </tr>
                <?php
                $i = $i + 1;
            }
        }
        ?>
        <tr><td colspan="9" align="center"> <?php echo $this->pagination->create_links(); ?></td></tr>

    </table>
</fieldset>

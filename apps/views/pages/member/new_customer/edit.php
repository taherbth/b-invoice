<?php echo form_open("admin/info/zone_edit"); ?>
<fieldset>
    <legend align="left">Zone Edit</legend>
    <table align="center" width="70%">
        <input type="hidden" name="id" value="<?php echo $eid['value'] ?>">
        <tr><td colspan="3"></td></tr>
        <tr>
            <td align="left" valign="top"><?php echo form_label('Zone '); ?><span class="markcolor">*</span></td>
            <td valign="top">:</td>
            <td>
                <input type="text" name="zone" value="<?php echo $ename['value']; ?>">
                <span class="markcolor"><?php echo ucwords(form_error('zone')); ?></span>
            </td>
        </tr>

        <tr><td colspan="3"></td></tr>


        <tr><td colspan="3"></td></tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <?php // echo form_submit('mysubmit', 'Update'); ?> 

                <input type="submit"  value="" class="update" name="mysubmit" />

            </td>
        </tr>
    </table>

</fieldset>

<?php echo form_close(); ?>
<fieldset>




<?php echo form_open("admin/info/profile_viewed"); ?>
<?php echo $this->session->flashdata('message'); ?>
<fieldset>
    <legend align="left">Report</legend>
    <table align="center" width="70%">
        <tr><td colspan="3"></td></tr>
        <tr>
            <td align="left" valign="top"><?php echo form_label('Zone '); ?><span class="markcolor">*</span></td>
            <td valign="top">:</td>
            <td>
                <?php
                $query = $this->db->query("select id,zone from zone");
                ?>
                <select name="zone" id="zone"  style="width:130px;">
                    <option value="">select</option>
                    <?php foreach ($query->result() as $info32): ?>

                        <option value="<?php echo $info32->id; ?>"><?php echo $info32->zone; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="markcolor"><?php echo ucwords(form_error('zone')); ?></span>
            </td>
        </tr>
        <tr><td colspan="3"></td></tr>



        <tr><td colspan="3"></td></tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <?php //echo form_submit('save', 'Submit'); ?> 
                <input type="submit" name="save" class="button1" value="Submit" />


            </td>
        </tr>
    </table>

</fieldset>

<?php echo form_close(); ?>
 


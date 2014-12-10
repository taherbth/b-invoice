<h3 class="content_edit">Org Admin Control Panel Set Group Permission</h2>

<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart("organization/info/added_group_permission"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $org_id = $this->session->userdata('user_id');
    $query = $this->db->query("select * from org_group where org_id='" . $org_id . "'");
    ?>
    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Group Name:</font></td>
                <td width="33%">
                    <select name="group_name" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <?php foreach ($query->result() as $temp): ?>
                            <option value="<?php echo $temp->id; ?>"><?php echo $temp->group_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('group_name')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Email:</font></td>
                <td width="33%">
                    <select name="sending_email" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>

                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Sms:</font></td>
                <td width="33%">
                    <select name="sending_sms" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>

                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_sms')); ?></span>                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Post:</font></td>
                <td width="33%">
                    <select name="sending_post" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>

                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_post')); ?></span>                 </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Profile:</font></td>
                <td width="33%">
                    <select name="profile" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <option value="1">Public</option>
                        <option value="2">Private</option>

                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('profile')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Message:</font></td>
                <td width="33%">
                    <select name="message" class="" style="">
                        <option value="">------------ Select -----------</option>
                        <option value="1">Public</option>
                        <option value="2">Private</option>

                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('message')); ?></span>                 </td>
            </tr>
        </tbody></table>



    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">


                </td>

            </tr>
            <tr>
                <td width="38%"><td width="33%">
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>
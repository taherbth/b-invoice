<h3 class="content_edit">Org Admin Control Panel Member Profile Setting</h2>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open("organization/info/profile_setting_update"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $org_id = $this->session->userdata('user_id');
    $query = $this->db->query("select * from member where id='" . $id . "'");
    foreach ($query->result() as $info):
        $name = $info->name;
    endforeach;
    $OptionsGroup = array(
        '' => 'Select',
        '1' => 'Public',
        '2' => 'Private',
		'3' => 'Member Can set'
    );
    $this->load->model('organization/info_model');
    $this->data['record'] = $this->info_model->view_member_profile_seeting($id);
    if (count($this->data['record'])):
        foreach ($this->data['record'] as $record_info):
        endforeach;
    endif;
	
    ?>
  <?php if (count($this->data['record'])): ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Title:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('member_title', $OptionsGroup, $record_info->member_title, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('name', $OptionsGroup, $record_info->name, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Membership Expire Date:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('expire_date', $OptionsGroup, $record_info->expire_date, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('address', $OptionsGroup, $record_info->address, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('phone', $OptionsGroup, $record_info->phone, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Email:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('email', $OptionsGroup, $record_info->email, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Profile Message:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('profile_message', $OptionsGroup, $record_info->profile_message, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">HouseHold Size:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('household_size', $OptionsGroup, $record_info->household_size, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Group:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('member_group', $OptionsGroup, $record_info->member_group, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Username:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('username', $OptionsGroup, $record_info->username, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>

            </tbody></table>
    <?php else: ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Name</font></td>
                    <td width="33%" style="text-align:center">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                    </td>

                </tr>

                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Title:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('member_title', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('name', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Membership Expire Date:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('expire_date', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('address', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('phone', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Email:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('email', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Profile Message:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('profile_message', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">HouseHold Size:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('household_size', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Group:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('member_group', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Username:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('username', $OptionsGroup, '3', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>

            </tbody></table>
    <?php endif; ?>

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
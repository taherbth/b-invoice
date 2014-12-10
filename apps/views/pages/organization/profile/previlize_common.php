<h3 class="content_edit">Org Admin Control Panel Profile Setting for all member</h2>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open("organization/info/update_setting"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $id = $this->session->userdata('user_id');
    $OptionsGroup = array(
        '' => 'Select',
        '1' => 'required',
        '2' => 'Not required',
    );
    $this->load->model('organization/info_model');
    $this->data['record'] = $this->info_model->view_setting($id);
    if (count($this->data['record'])):
        foreach ($this->data['record'] as $record_info):
        endforeach;
    endif;
	
    ?>
  <?php if (count($this->data['record'])): ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
               
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
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Bank Info:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('bank_info', $OptionsGroup, $record_info->bank_info, 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span> 
                    </td>
                </tr>
               

            </tbody></table>
    <?php else: ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Title:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('member_title', $OptionsGroup, 'member_title', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Member Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('name', $OptionsGroup, 'name', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                    </td>
                </tr>
                
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('address', $OptionsGroup, 'address', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('phone', $OptionsGroup, 'phone', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Email:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('email', $OptionsGroup, 'email', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Profile Message:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('profile_message', $OptionsGroup, 'profile_message', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">HouseHold Size:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('household_size', $OptionsGroup, 'household_size', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                    </td>
                </tr>
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Bank Info:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('bank_info', $OptionsGroup, 'bank_info', 'style="width:150px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span> 
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
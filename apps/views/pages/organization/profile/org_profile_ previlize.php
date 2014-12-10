<h3 class="content_edit">Org Admin Control Panel Organization Profile Setting</h2>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open("organization/info/org_profile_update"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $org_id = $this->session->userdata('user_id');
    $OptionsGroup = array(
        '' => 'Select',
        '1' => 'Public',
        '2' => 'Private'
    );
    $this->load->model('organization/info_model');
    $this->data['record'] = $this->info_model->view_org_profile_seeting($org_id);
    if (count($this->data['record'])):
        foreach ($this->data['record'] as $record_info):
        endforeach;
    endif;
    ?>
    <?php if (count($this->data['record'])): ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                   <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Profile Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Number:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_number', $OptionsGroup, $record_info->org_number, 'style="width:80px; background-color:#ECE9D8"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_number')); ?></span> 
                    </td>
                </tr>
               <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_name', $OptionsGroup, $record_info->org_name, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Primary Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_primary_address', $OptionsGroup, $record_info->org_primary_address, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Optional Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_optional_address', $OptionsGroup, $record_info->org_optional_address, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_optional_address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_phone', $OptionsGroup, $record_info->org_phone, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Area Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('area_name', $OptionsGroup,$record_info->area_name, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('area_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Organization Admin Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>

                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">First Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('first_name', $OptionsGroup, $record_info->first_name, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Last Name</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('last_name', $OptionsGroup,$record_info->last_name, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('phone_no', $OptionsGroup, $record_info->phone_no, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('address', $OptionsGroup,$record_info->address, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Email:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('email', $OptionsGroup,$record_info->email, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Username:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('username', $OptionsGroup,$record_info->username, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Description of org:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('description', $OptionsGroup,$record_info->description, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('description')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Credit Card Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Card No:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('card_no', $OptionsGroup,$record_info->card_no, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('card_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Expire Date:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('expire_date', $OptionsGroup,$record_info->expire_date, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">CVV2 No:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('cvv2_no', $OptionsGroup,$record_info->cvv2_no, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('cvv2_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Name on card:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('name_on_card', $OptionsGroup,$record_info->name_on_card, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name_on_card')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Package Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
               <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Package Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('package_name', $OptionsGroup, $record_info->package_name, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">No of Member:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('no_of_member', $OptionsGroup,$record_info->no_of_member, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('no_of_member')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Duration:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('duration', $OptionsGroup,$record_info->duration, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('duration')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Amount:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('amount', $OptionsGroup,$record_info->amount, 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('amount')); ?></span> 
                    </td>
                </tr>    
            </tbody></table>
    <?php else: ?>
        <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Profile Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Number:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_number', $OptionsGroup, set_value('org_number'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_number')); ?></span> 
                    </td>
                </tr>
               <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_name', $OptionsGroup, set_value('org_name'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Primary Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_primary_address', $OptionsGroup, set_value('org_primary_address'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Org Optional Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_optional_address', $OptionsGroup, set_value('org_optional_address'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_optional_address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('org_phone', $OptionsGroup, set_value('org_phone'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Area Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('area_name', $OptionsGroup, set_value('area_name'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('area_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Organization Admin Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>

                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">First Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('first_name', $OptionsGroup, set_value('first_name'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Last Name</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('last_name', $OptionsGroup, set_value('last_name'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Phone:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('phone_no', $OptionsGroup, set_value('phone_no'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Address:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('address', $OptionsGroup, set_value('address'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Email:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('email', $OptionsGroup, set_value('email'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Username:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('username', $OptionsGroup, set_value('username'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Description of org:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('description', $OptionsGroup, set_value('description'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('description')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Credit Card Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Card No:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('card_no', $OptionsGroup, set_value('card_no'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('card_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Expire Date:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('expire_date', $OptionsGroup, set_value('expire_date'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">CVV2 No:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('cvv2_no', $OptionsGroup, set_value('cvv2_no'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('cvv2_no')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Name on card:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('name_on_card', $OptionsGroup, set_value('name_on_card'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name_on_card')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr> <tr>
                    <td width="38%" style="text-align:left; padding-top:5px"></td>
                    <td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%" style="text-align:left; font-weight:bold; color:green; padding-left:230px"><font class="inside">Package Info:</font></td>
                    <td width="33%">
                    </td>
                </tr>
               <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Package Name:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('package_name', $OptionsGroup, set_value('package_name'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">No of Member:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('no_of_member', $OptionsGroup, set_value('no_of_member'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('no_of_member')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Duration:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('duration', $OptionsGroup, set_value('duration'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('duration')); ?></span> 
                    </td>
                </tr> 
                 <tr>
                    <td width="38%" style="text-align:left; padding-left:230px"><font class="inside">Amount:</font></td>
                    <td width="33%" style="text-align:center">
                        <?php echo form_dropdown('amount', $OptionsGroup, set_value('amount'), 'style="width:80px;"'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('amount')); ?></span> 
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
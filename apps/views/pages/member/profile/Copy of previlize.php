<h3 class="content_edit">Member Control Panel  Profile Setting</h2>
<?php
$this->load->model('organization/info_model');
$this->data['record'] = $this->info_model->view_member_profile_seeting($id);
$this->data['record1'] = $this->info_model->view_member_profile_seeting2($id);
?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open("org_member/info/profile_setting_update"); ?>
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
        '2' => 'Private'
    );
    $OptionsGroupPublic = array(
        '1' => 'Public',
        '2' => 'Private'
    );
    $OptionsGroupPrivate = array(
        '2' => 'Private'
    );
    ?>
    <?php
    if (count($this->data['record'])):
        foreach ($this->data['record'] as $record_info):
        endforeach;
        if (count($this->data['record1'])):
            foreach ($this->data['record1'] as $record_info1):
            endforeach;
            ?>
            <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                <tbody>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Member Name</font></td>
                        <td width="33%">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Member Title:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->member_title == '1') {
                                echo form_dropdown('member_title', $OptionsGroupPublic, $record_info1->member_title, 'style="width:150px;"');
                            } else if ($record_info->member_title == '2') {
                                echo form_dropdown('member_title', $OptionsGroupPrivate, $record_info1->member_title, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Name:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->name == '1') {
                                echo form_dropdown('name', $OptionsGroupPublic, $record_info1->name, 'style="width:150px;"');
                            } else if ($record_info->name == '2') {
                                echo form_dropdown('name', $OptionsGroupPrivate, $record_info1->name, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Membership Expire Date:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->expire_date == '1') {
                                echo form_dropdown('expire_date', $OptionsGroupPublic, $record_info1->expire_date, 'style="width:150px;"');
                            } else if ($record_info->expire_date == '2') {
                                echo form_dropdown('expire_date', $OptionsGroupPrivate, $record_info1->expire_date, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Address:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->address == '1') {
                                echo form_dropdown('address', $OptionsGroupPublic, $record_info1->address, 'style="width:150px;"');
                            } else if ($record_info->address == '2') {
                                echo form_dropdown('address', $OptionsGroupPrivate, $record_info1->address, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Phone:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->phone == '1') {
                                echo form_dropdown('phone', $OptionsGroupPublic, $record_info1->phone, 'style="width:150px;"');
                            } else if ($record_info->phone == '2') {
                                echo form_dropdown('phone', $OptionsGroupPrivate, $record_info1->phone, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>                
                            <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Email:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->email == '1') {
                                echo form_dropdown('email', $OptionsGroupPublic, $record_info1->email, 'style="width:150px;"');
                            } else if ($record_info->email == '2') {
                                echo form_dropdown('email', $OptionsGroupPrivate, $record_info1->email, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>       
                            <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Profile Message:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->profile_message == '1') {
                                echo form_dropdown('profile_message', $OptionsGroupPublic, $record_info1->profile_message, 'style="width:150px;"');
                            } else if ($record_info->profile_message == '2') {
                                echo form_dropdown('profile_message', $OptionsGroupPrivate, $record_info1->profile_message, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>        
                            <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Person Number</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->person_number == '1') {
                                echo form_dropdown('person_number', $OptionsGroupPublic, $record_info1->person_number, 'style="width:150px;"');
                            } else if ($record_info->profile_message == '2') {
                                echo form_dropdown('person_number', $OptionsGroupPrivate, $record_info1->person_number, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>      
                            <span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Bank Info:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->bank_info == '1') {
                                echo form_dropdown('bank_info', $OptionsGroupPublic, $record_info1->bank_info, 'style="width:150px;"');
                            } else if ($record_info->bank_info == '2') {
                                echo form_dropdown('bank_info', $OptionsGroupPrivate, $record_info1->bank_info, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>      
                            <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">HouseHold Size:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->household_size == '1') {
                                echo form_dropdown('household_size', $OptionsGroupPublic, $record_info1->household_size, 'style="width:150px;"');
                            } else if ($record_info->household_size == '2') {
                                echo form_dropdown('household_size', $OptionsGroupPrivate, $record_info1->household_size, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Group:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->member_group == '1') {
                                echo form_dropdown('member_group', $OptionsGroupPublic, $record_info1->member_group, 'style="width:150px;"');
                            } else if ($record_info->member_group == '2') {
                                echo form_dropdown('member_group', $OptionsGroupPrivate, $record_info1->member_group, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Username:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->username == '1') {
                                echo form_dropdown('username', $OptionsGroupPublic, $record_info1->username, 'style="width:150px;"');
                            } else if ($record_info->username == '2') {
                                echo form_dropdown('username', $OptionsGroupPrivate, $record_info1->username, 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                        </td>
                    </tr>

                </tbody></table>
        <?php else: ?>
            <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                <tbody>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Member Name</font></td>
                        <td width="33%">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                        </td>

                    </tr>

                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Member Title:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->member_title == '1') {
                                echo form_dropdown('member_title', $OptionsGroupPublic, 'member_title', 'style="width:150px;"');
                            } else if ($record_info->member_title == '2') {
                                echo form_dropdown('member_title', $OptionsGroupPrivate, 'member_title', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Name:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->name == '1') {
                                echo form_dropdown('name', $OptionsGroupPublic, 'name', 'style="width:150px;"');
                            } else if ($record_info->name == '2') {
                                echo form_dropdown('name', $OptionsGroupPrivate, 'name', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Membership Expire Date:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->expire_date == '1') {
                                echo form_dropdown('expire_date', $OptionsGroupPublic, 'expire_date', 'style="width:150px;"');
                            } else if ($record_info->expire_date == '2') {
                                echo form_dropdown('expire_date', $OptionsGroupPrivate, 'expire_date', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Address:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->address == '1') {
                                echo form_dropdown('address', $OptionsGroupPublic, 'address', 'style="width:150px;"');
                            } else if ($record_info->address == '2') {
                                echo form_dropdown('address', $OptionsGroupPrivate, 'address', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Phone:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->phone == '1') {
                                echo form_dropdown('phone', $OptionsGroupPublic, 'phone', 'style="width:150px;"');
                            } else if ($record_info->phone == '2') {
                                echo form_dropdown('phone', $OptionsGroupPrivate, 'phone', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>                
                            <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Email:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->email == '1') {
                                echo form_dropdown('email', $OptionsGroupPublic, 'email', 'style="width:150px;"');
                            } else if ($record_info->email == '2') {
                                echo form_dropdown('email', $OptionsGroupPrivate, 'email', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>       
                            <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Profile Message:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->profile_message == '1') {
                                echo form_dropdown('profile_message', $OptionsGroupPublic, 'profile_message', 'style="width:150px;"');
                            } else if ($record_info->profile_message == '2') {
                                echo form_dropdown('profile_message', $OptionsGroupPrivate, 'profile_message', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>        
                            <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Person Number</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->person_number == '1') {
                                echo form_dropdown('person_number', $OptionsGroupPublic, 'person_number', 'style="width:150px;"');
                            } else if ($record_info->profile_message == '2') {
                                echo form_dropdown('person_number', $OptionsGroupPrivate, 'person_number', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>      
                            <span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Bank Info:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->bank_info == '1') {
                                echo form_dropdown('bank_info', $OptionsGroupPublic, 'bank_info', 'style="width:150px;"');
                            } else if ($record_info->bank_info == '2') {
                                echo form_dropdown('bank_info', $OptionsGroupPrivate, 'bank_info', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>      
                            <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">HouseHold Size:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->household_size == '1') {
                                echo form_dropdown('household_size', $OptionsGroupPublic, 'household_size', 'style="width:150px;"');
                            } else if ($record_info->household_size == '2') {
                                echo form_dropdown('household_size', $OptionsGroupPrivate, 'household_size', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Group:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->member_group == '1') {
                                echo form_dropdown('member_group', $OptionsGroupPublic, 'member_group', 'style="width:150px;"');
                            } else if ($record_info->member_group == '2') {
                                echo form_dropdown('member_group', $OptionsGroupPrivate, 'member_group', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
                            <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                        </td>
                    </tr>
                    <tr>
                        <td width="38%" style="text-align:center"><font class="inside">Username:</font></td>
                        <td width="33%">
                            <?php
                            if ($record_info->username == '1') {
                                echo form_dropdown('username', $OptionsGroupPublic, 'username', 'style="width:150px;"');
                            } else if ($record_info->username == '2') {
                                echo form_dropdown('username', $OptionsGroupPrivate, 'username', 'style="width:150px;"');
                            } else {
                                
                            }
                            ?>
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
<?php
else:
    echo "<font color='red'>Sorry no setting found.Please contact with organization admin.</font>";
    ?>
<?php endif; ?>
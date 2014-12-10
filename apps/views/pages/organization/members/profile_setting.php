<h3 class="content_edit"><?php echo $this->lang->line('label_org_member_profile_settings');?></h3>
<div>
<?php echo form_open("organization/info/profile_setting_by_admin_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<?php

 if($access_profile_setting_by_admin){ 
    if($member_profile){
        foreach ($member_profile as $info){
            $name = $info->first_name."&nbsp;".$info->last_name;
            $mem_id = $info->mem_id;
        }
    }
    
    $OptionsGroup = array(
        '' => 'Select',
        '1' => 'Public',
        '2' => 'Private',
		'3' => 'Member Can set'
    );   
    
    $Options_name = array(        
        '1' => 'Public',
        
    );
    if($member_profile_settings):
        foreach ($member_profile_settings as $record_info):
        endforeach;
    endif;
	
    ?>
  <?php if ($member_profile_settings): ?>
        <table class="width-100">
            <tr>
				<td>Member Name:</td>
                    <td>
                        <input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" />
                        <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Member Title:</font></td>
                    <td>
                        <?php echo form_dropdown('member_title', $OptionsGroup, $record_info->member_title); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Name:</font></td>
                    <td>
                        <?php echo form_dropdown('name', $Options_name, $record_info->name); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Membership Expire Date:</td>
                    <td>
                        <?php echo form_dropdown('expire_date', $OptionsGroup, $record_info->expire_date); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <?php echo form_dropdown('address', $OptionsGroup, $record_info->address); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>
                        <?php echo form_dropdown('phone', $OptionsGroup, $record_info->phone); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Email:</font></td>
                    <td>
                        <?php echo form_dropdown('email', $OptionsGroup, $record_info->email); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Profile Message:</td>
                    <td>
                        <?php echo form_dropdown('profile_message', $OptionsGroup, $record_info->profile_message); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>HouseHold Size:</td>
                    <td>
                        <?php echo form_dropdown('household_size', $OptionsGroup, $record_info->household_size); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Group:</td>
                    <td>
                        <?php echo form_dropdown('member_group', $OptionsGroup, $record_info->member_group); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <?php echo form_dropdown('username', $OptionsGroup, $record_info->username); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>

            </tbody></table>
    <?php else: ?>
        <table class="width-100">
            <tbody>
                <tr>
                    <td>Member Name</td>
                    <td>
                        <input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" />
                        <input type="text" readonly="readonly" value="<?php echo $name; ?>" />
                    </td>

                </tr>

                <tr>
                    <td>Member Title:</td>
                    <td>
                        <?php echo form_dropdown('member_title', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>
                        <?php echo form_dropdown('name', $Options_name, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Membership Expire Date:</td>
                    <td>
                        <?php echo form_dropdown('expire_date', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <?php echo form_dropdown('address', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>
                        <?php echo form_dropdown('phone', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php echo form_dropdown('email', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Profile Message:</td>
                    <td>
                        <?php echo form_dropdown('profile_message', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>HouseHold Size:</td>
                    <td>
                        <?php echo form_dropdown('household_size', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Group:</td>
                    <td>
                        <?php echo form_dropdown('member_group', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <?php echo form_dropdown('username', $OptionsGroup, '3'); ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
                    </td>
                </tr>

            </tbody></table>
    <?php endif; ?>

    
                    <input name="submit" type="submit" value="Submit">

    <?php echo form_close(); ?>
</div><?php } else { ?>  

 <span style="color:red;"><?php echo $this->lang->line('profile_setting_by_admin_no_access_msg');?></span>
<?php }  ?>
<h3 class="content_edit">Org Admin Control Panel Member Profile Setting</h3>
    <div class="units-row"><?php echo form_open("organization/info/profile_setting_by_member_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<?php

    $disable_attributes = "";
    if($member_profile){
        foreach ($member_profile as $info){
            $name = $info->first_name."&nbsp;".$info->last_name;
            $mem_id = $info->mem_id;
        }
    }
        $org_id = "";
        $member_id = "";
        $member_title = "3";
        $expire_date = "3";
        $address    = "3";
        $phone    = "3";
        $email    = "3";
        $profile_message    = "3";
        $household_size   = "3";
        $member_group  = "3";
        $username  = "3";
            
    if($member_profile_settings_member){
        foreach ($member_profile_settings_member as $info){
            $org_id = $info->org_id;
            $member_id = $info->member_id;
            $member_title = $info->member_title;
            $expire_date = $info->expire_date;
            $address    = $info->address;
            $phone    = $info->phone;
            $email    = $info->email;
            $profile_message    = $info->profile_message;
            $household_size   = $info->household_size;
            $member_group  = $info->member_group;
            $username  = $info->username;
            
        }
    }
    $OptionsGroup = array(
        '1' => 'Public',
        '2' => 'Private',
		'3' => 'Member Can set'
    );   
    
    $Options_name = array(        
        '1' => 'Public'        
    );
    if($member_profile_settings_admin):
        foreach ($member_profile_settings_admin as $record_info):
        endforeach;
    endif;
	
    ?>
   
    
  <?php if ($member_profile_settings_admin):  ?>
		<label>Member Name:
			<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" />
			<input type="text" readonly="readonly" value="<?php echo $name; ?>" />	
		</label>
		<label>Member Title:
			<?php 
			$disable_attributes = "";
			if($record_info->member_title==1 || $record_info->member_title==2){$disable_attributes = "disabled"; }
			echo form_dropdown('member_title', $OptionsGroup, $member_title, $disable_attributes); 
			?>
			<span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
		</label>
        <label>Name:
			<?php 
				$disable_attributes = "disabled"; 
				echo form_dropdown('name', $Options_name, $name, $disable_attributes); ?>
				<span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
			</label>
		<label>Membership Expire Date:
			<?php 
			$disable_attributes = "";
			if($record_info->expire_date==1 || $record_info->expire_date==2){$disable_attributes = "disabled"; }
			echo form_dropdown('expire_date', $OptionsGroup, $expire_date, $disable_attributes, 'style="width:150px; "'); 
			?>
		</label>
        <label>Address:
			<?php 
			$disable_attributes = "";
			if($record_info->address==1 || $record_info->address==2){$disable_attributes = "disabled";  }
			echo form_dropdown('address', $OptionsGroup, $address, $disable_attributes); 
			?>
			<span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
		</label>
        <label>Phone:
			<?php 
				$disable_attributes = "";
				if($record_info->phone==1 || $record_info->phone==2){$disable_attributes = "disabled";  }
				echo form_dropdown('phone', $OptionsGroup, $phone , $disable_attributes ,  'style="width:150px;"' ); 
			?>
			<span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
		</label>
        <label>Email:
                        <?php 
                            $disable_attributes = "";
                            if($record_info->email==1 || $record_info->email==2){$disable_attributes = "disabled"; }
                            echo form_dropdown('email', $OptionsGroup, $email, $disable_attributes); 
                        ?>
                        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
		</label>
        <label>Profile Message:
                        <?php 
                            $disable_attributes = "";
                            if($record_info->profile_message==1 || $record_info->profile_message==2){$disable_attributes = "disabled"; }
                            echo form_dropdown('profile_message', $OptionsGroup, $profile_message, $disable_attributes); 
                        ?>
                        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
		</label>
		<label>HouseHold Size:
                        <?php 
                            $disable_attributes = "";
                            if($record_info->household_size==1 || $record_info->household_size==2){$disable_attributes = "disabled";  }
                            echo form_dropdown('household_size', $OptionsGroup, $household_size, $disable_attributes); 
                        ?>
                        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
</label>
<label>Group:
                        <?php 
                            $disable_attributes = "";
                            if($record_info->member_group==1 || $record_info->member_group==2){$disable_attributes = "disabled";  }
                            echo form_dropdown('member_group', $OptionsGroup, $member_group, $disable_attributes); 
                        ?>
                        <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
</label>
		<label>Username:
                        <?php 
                            $disable_attributes = "";
                            if($record_info->username==1 || $record_info->username==2){$disable_attributes = "disabled"; }
                            echo form_dropdown('username', $OptionsGroup, $username, $disable_attributes); 
                        ?>
                        <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
</label>

    <?php else: ?>
		<div class="unit-50">
<label>Member Name
<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" />
<input type="text" readonly="readonly" value="<?php echo $name; ?>" />
</label>
<label>Member Title:
<?php echo form_dropdown('member_title', $OptionsGroup, $member_title); ?>
<span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
</label>
<label>Name:
<?php echo form_dropdown('name', $Options_name, $name); ?>
<span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
</label>
<label>Membership Expire Date:
<?php echo form_dropdown('expire_date', $OptionsGroup, $expire_date); ?>
<span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
</label>
<label>Address:
<?php echo form_dropdown('address', $OptionsGroup, $address); ?>
<span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
</label>
<label>Phone:
<?php echo form_dropdown('phone', $OptionsGroup, $phone,  'disabled="disabled"' ); ?>
<span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
</label>
		</div><!-- end .unit-50 -->
<div class="unit-50">		
<label>Email:
<?php echo form_dropdown('email', $OptionsGroup, $email); ?>
<span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
</label>
<label>Profile Message:
<?php echo form_dropdown('profile_message', $OptionsGroup, $profile_message ); ?>
<span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
</label>
<label>HouseHold Size:
<?php echo form_dropdown('household_size', $OptionsGroup, $household_size); ?>
<span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span> 
</label>
<label>Group:
<?php echo form_dropdown('member_group', $OptionsGroup, $member_group); ?>
<span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> 
</label>
<label>Username:
<?php echo form_dropdown('username', $OptionsGroup, $username); ?>
<span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
</label>
</div><!-- end .unit-50 -->

    <?php endif; ?>
<input type="submit" name="submit" value="Submit">
    <?php echo form_close(); ?>
</div><!-- end .units-row -->
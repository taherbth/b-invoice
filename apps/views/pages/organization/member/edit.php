<h3 class="content_edit">Org Admin Control Panel Modify Member Profile</h2>

<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $member_info):
    endforeach;
endif;

$member_title = array(
    'name' => 'member_title',
    'id' => 'member_title',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->member_title
);
$name = array(
    'name' => 'name',
    'id' => 'name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->name
);
$address = array(
    'name' => 'address',
    'id' => 'address',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->address
);
$phone = array(
    'name' => 'phone',
    'id' => 'phone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->phone
);
$profile_message = array(
    'name' => 'profile_message',
    'id' => 'profile_message',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->profile_message
);
$expire_date = array(
    'name' => 'expire_date',
    'id' => 'expire_date',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
	'class'=>'form_normal',
    'value' => $member_info->expire_date
);
?>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"start_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
     Member Title<br>
    <input name="id" value="<?php echo $member_info->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($member_title); ?>
    <br><br>
    Name<br>
    <?php echo form_input($name); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    Address<br>
    <?php echo form_input($address); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
     Phone<br>
    <?php echo form_input($phone); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
    Profile Message<br>
    <?php echo form_input($profile_message); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span> 
     Membership Expire Date<br>
    <?php echo form_input($expire_date); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
    
    
    
     <?php
    $query = $this->db->query("select * from user_type where org_id='".$this->session->userdata("user_id")."'");
    ?>
User Type<br>
    <select name="user_type" id="user_type"  style="width:130px;">       
    <?php foreach ($query->result() as $info32): ?>
            <option <?php if ($member_info->user_type == $info32->id): ?> selected="selected" value="<?php echo $member_info->user_type; ?>" <?php else : ?>value="<?php echo $info32->id; ?><?php endif; ?>"><?php echo $info32->user_type; ?></option>
<?php endforeach; ?>
    </select>
     <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('user_type')); ?></span>
    
     <?php
    $query1 = $this->db->query("select * from org_group where org_id='".$this->session->userdata("user_id")."'");
    ?>
  Group<br>
    <select name="member_group" id="member_group"  style="width:130px;">       
    <?php foreach ($query1->result() as $info320): ?>
            <option <?php if ($member_info->member_group == $info320->id): ?> selected="selected" value="<?php echo $member_info->member_group; ?>" <?php else : ?>value="<?php echo $info320->id; ?><?php endif; ?>"><?php echo $info320->group_name; ?></option>
<?php endforeach; ?>
    </select>
     <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span>
    

    
    
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>

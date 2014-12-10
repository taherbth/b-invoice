<h3 class="content_edit">Member Control Panel  Modify Member Profile</h2>
<?php
$query = $this->db->query("select * from member where id='" . $this->session->userdata('id') . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
    td a:hover{ color:#990033}
</style>
<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
<style>

    .markcolor p{ font-size: 10px;}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php
$query = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($query->result() as $info):
endforeach;
?>
<?php if ($info->member_change_profile == '1'): ?>

    <?php echo form_open_multipart("org_member/info/update_profile"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        Member Title<br>
        <input value="<?php echo $p_info->member_title; ?>" name="member_title" class="form_normal" type="text">
        <br><br>
        <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
        Name<br>
        <input value="<?php echo $p_info->name; ?>" name="name" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span>           
        <br><br>
        Address<br>
        <input value="<?php echo $p_info->address; ?>" name="address" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span>           
        <br><br>
        Phone<br>
        <input value="<?php echo $p_info->phone; ?>" name="phone" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span>           
        <br><br>
        Profile Message<br>
        <input value="<?php echo $p_info->profile_message; ?>" name="profile_message" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('profile_message')); ?></span>           
        <br><br>
         Email<br>
        <input value="<?php echo $p_info->email; ?>" name="email" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>           
        <br><br>
        Household Size<br>
        <input value="<?php echo $p_info->household_size; ?>" name="household_size" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span>           
        <br><br>
        Bank Info<br>
        <input value="<?php echo $p_info->bank_info; ?>" name="bank_info" class="form_normal" type="text">
        <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span>           
        <br><br>
        <br>

        <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

        <?php echo form_close(); ?>
    </div>
<?php endif; ?>



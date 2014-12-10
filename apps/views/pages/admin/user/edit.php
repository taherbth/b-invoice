<h3 class="content_edit"><?php echo $this->lang->line('admin_control_update_user');?> </h2>

<?php $user_types_option = $user_types_data; ?>
<style>
.markcolor{ color:red}
legend { vertical-align:middle
    -moz-border-radius: 10px 10px 10px 10px;
    background-color: #499DC4;
    color: White;
    font: bold 12px Arial;
    padding: 5px 10px;
    text-align: center;
}
.success{ color:green;}
</style>
<p></p>
<div class="infobox" style="width: 450px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo form_open($this->uri->uri_string()); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
<?php echo $this->lang->line('label_name');?>:<br>
<input name="name" value="<?php echo $name;?>" class="form_normal" type="text">
<br><br>
 <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
<?php echo $this->lang->line('label_username');?>:<br>
<input name="username" value="<?php echo $username;?>" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('username')); ?></span>    
<br><br>
<?php echo $this->lang->line('label_email');?>:<br>
<input name="email" value="<?php echo $email;?>" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>
<br><br>

<?php echo $this->lang->line('label_person_no');?>:<br>
<input name="person_number" value="<?php echo $person_number;?>" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span>
<br><br>
<?php echo $this->lang->line('label_password');?><br>
<input name="password" class="form_normal" type="password">
<span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>
<br><br>

<?php echo $this->lang->line('label_retype_password');?>:<br>
<input name="confirm_password" class="form_normal" type="password">
<span class="markcolor"><?php echo ucwords(form_error('confirm_password')); ?></span>
<br><br>
<?php if($user_type_id) { echo $this->lang->line('label_user_type');?>:<br>
<?=form_dropdown('user_type_id',$user_types_option,$user_type_id,'class="form_input_select"');?>
 
<span class="markcolor"><?php echo ucwords(form_error('user_type_id')); }?></span>
<br><br>
<?=form_hidden('admin_user_id', $id);?>
<?//=form_hidden('user_type_id', $user_type_id);?>


<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('submit_btn');?>" class="submit" type="image">

<?php echo form_close(); ?>
</div>

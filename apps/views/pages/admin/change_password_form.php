<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'size' 	=> 50,
	'value' => set_value('old_password')
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'size'	=> 50
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'size' 	=> 50
);
?>

<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
   
<p></p>
<?php echo form_open($this->uri->uri_string()); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
Old Password<br>
<input name="old_password" class="form_normal" type="password">
<br><br>
 <span class="markcolor"><?php echo ucwords(form_error('old_password')); ?></span> 
New Password<br>
<input name="new_password" class="form_normal" type="password">
<span class="markcolor"><?php echo ucwords(form_error('new_password')); ?></span>           

<br><br>

Conform New Password<br>
<input name="confirm_new_password" class="form_normal" type="password"> 
<span class="markcolor"><?php echo ucwords(form_error('confirm_new_password')); ?></span>

<br>

<br>
<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="change" value="Submit" class="submit" type="image">

<?php echo form_close(); ?>
</div>



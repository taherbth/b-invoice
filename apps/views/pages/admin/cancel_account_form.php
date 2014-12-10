<?php

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size' 	=> 50
);
?>

<h2>Admin Panel - Cancel Admin Account</h2>
<div>
<fieldset style="background-color:#E6E6E6;">
<legend>Cancel Admin Account</legend>
<?php echo form_open($this->uri->uri_string()); ?>
<?php echo ucwords($this->dx_auth->get_auth_error()); ?>

<dl>
	<dt><?php echo form_label('Password', $password['id']); ?></dt>
	<dd>
		<?php echo form_password($password); ?>
		<?php echo ucwords(form_error($password['name'])); ?>
	</dd>
	<dt></dt>
	<dd><?php echo br(1).form_submit('cancel', 'Cancel Account'); ?></dd>
</dl>

<?php echo form_close(); ?>
</fieldset>
</div>
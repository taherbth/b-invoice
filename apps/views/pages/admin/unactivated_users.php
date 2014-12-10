<h2>Admin Panel - Unactivated Users At A Glance</h2>
<div>
<?php  				
// Show reset password message if exist
//if(isset($reset_message)){
	//echo $reset_message;
//}

// Show error
echo validation_errors();

echo form_open($this->uri->uri_string());	
echo form_submit('activate', 'Activate User');
echo "<hr/>";
?>
<table class="contAlign" border="0" width="100%" cellpadding="7" cellspacing="1">
<tr style="font-weight:bold; background-color:#999999;">
<td><input type="checkbox" name="select-all" id="select-all"/></td><td>Username</td><td>Email</td><td>Role Name</td><td>Register IP</td><td>Activation Key</td><td>Created</td>
</tr>
<?php
foreach($users as $user){
?>
<tr style="background-color:#CCCCCC;">
	<td><?php echo form_checkbox('checkbox_'.$user->id, $user->username).form_hidden('key_'.$user->id, $user->activation_key); ?></td>
	<td><?php echo $user->username; ?></td>
	<td><?php echo $user->email; ?></td>
	<td><?php echo $user->role_name; ?></td>
	<td><?php echo $user->last_ip; ?></td>
	<td><?php echo $user->activation_key; ?></td>
	<td><?php echo date('M d, Y', strtotime($user->created)); ?></td>
</tr>
<?php
}
echo "</table>";
if(!empty($pagination)){
	echo $pagination.br(3);
}
echo form_close();
?>
</div>
<script type="text/javascript">
$("#select-all").click(function(){
	toggleSelectAllCheckboxes(this);
});
</script>
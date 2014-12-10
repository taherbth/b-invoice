
<h2>Admin Panel - Manage Custom Permissions</h2>
<div>
<fieldset style="background-color:#E6E6E6;">
<legend>Customize Permissions</legend>
<?php
	echo '<b>Here is an example how to use custom permissions</b><br/><br/>';
	
	// Build drop down menu
	foreach ($roles as $role)
	{
		$options[$role->id] = $role->name;
	}

	// Change allowed uri to string to be inserted in text area
	if ( ! empty($allowed_uri))
	{
		$allowed_uri = implode("\n", $allowed_uri);
	}
	
	if (empty($edit))
	{
		$edit = FALSE;
	}
		
	if (empty($delete))
	{
		$delete = FALSE;
	}
	
	// Build form
	echo form_open($this->uri->uri_string());
	
	echo form_label('Role :'.nbs(1), 'role_name_label');
	echo form_dropdown('role', $options); 
	echo nbs(2);
	echo form_submit('show', 'Show Permissions'); 
	
	echo form_label('', 'uri_label');
			
	echo '<hr/>';
	
	echo form_checkbox('edit', '1', $edit);
	echo form_label('Allow Edit', 'edit_label');
	echo '<br/>';
	
	echo form_checkbox('delete', '1', $delete);
	echo form_label('Allow Delete', 'delete_label');
	echo '<br/>';
				
	echo '<br/>';
	echo form_submit('save', 'Save Permissions');
	echo '<hr/>';
	
	echo 'Open '.anchor('auth/backend/custom_permissions').' to see the result, try to login using user that you have changed.<br/>';
	echo 'If you change your own role, you need to relogin to see the result changes.';
	
	echo form_close();	
?>
</fieldset>
</div>
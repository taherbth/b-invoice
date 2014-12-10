<h2>Admin Control Panel - Show Custom Permissions</h2>
<div>
<?php  				
	
	echo "<h3>Your Allocated Permissions</h3>";			
	echo "<hr/>";
	echo "<h5>".$role_name."</h5>";
	echo "<h5>".$permission."</h5>";
	echo "<ul style='margin-left:100px;'>";
		echo "<li><h5>".$edit_perm."</h5></li>";
		echo "<li><h5>".$del_perm."</h5></li>";
	echo "</ul>";
	echo "<hr/>";
?>
</div><br>
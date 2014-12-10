<h3 class="content_edit"><?php echo $this->lang->line('view_users_msg');?></h2>
<?php 
//$this->load->model('admin/users');
echo $this->session->flashdata('message'); 

?>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;Create New Users 	
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

<fieldset>
<legend align="left"><?php echo $this->lang->line('users_list_msg');?></legend>

<?php if($users_create_new_users){echo anchor(base_url()."admin/backend/create_admin_users", $this->lang->line('label_create_new'));}?>

<table width="100%" border="1" align="center" style="border-collapse:collapse; ">
<script language="javascript">
        function confirmSubmit() {
           // var agree=confirm("Are you sure to delete this record?");
           var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
<tr>
    <th><?php echo $this->lang->line('label_id');?></th>
    <th><?php echo $this->lang->line('label_name');?></th>              
    <th><?php echo $this->lang->line('label_person_no');?></th>              
    <th><?php echo $this->lang->line('label_email');?></th>              
    <th><?php echo $this->lang->line('label_username');?></th>              
    <th><?php echo $this->lang->line('label_user_type');?></th>              
    <th><?php echo $this->lang->line('label_action');?></th>
</tr>
<?php
    if(count($userLists))
    {
      $i = 1;
    foreach($userLists as $userList)
    {
        $type_name = "";
        if($userList->user_type_id!=0){
            $admin_user_type_name = $this->users->get_all_admin_user_types($userList->user_type_id);
            if(count($admin_user_type_name)){
                foreach($admin_user_type_name as $user_type_name){
                    $type_name = $user_type_name->type_name;            
                }   
            }
        }
    if($i%2 == 0):	$color="#FFFFFF"; else : $color="#DDDDDD"; endif;
	
     ?>
		<tr bgcolor="<?php echo $color; ?>">
			<td width="3%" align="center"><?php  echo $userList->id; ?></td>
         	<td align="center" width="7%"><?php echo $userList->name; ?></td>
         	<td align="center" width="7%"><?php echo $userList->person_number; ?></td>
         	<td align="center" width="7%"><?php echo $userList->email; ?></td>
			<td align="center" width="7%"><?php echo $userList->username; ?></td>
            <td align="center" width="7%"><?php echo $type_name; ?></td>
			<td align="center" width="12%">
            <?php if($users_edit_users){?>
                <a href="<?php echo base_url(); ?>admin/backend/admin_user_edit/<?php echo $userList->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
            <?php } if($users_delete_users){ ?>        
            <a onclick="return confirmSubmit()" href="<?php echo base_url().'admin/backend/admin_user_delete/'.$userList->id; ?>" title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
            <?php }   
            if($users_block_unblock_user){             
                if($userList->blocked){
                    echo anchor(base_url()."admin/backend/admin_user_unblocked/$userList->id", $this->lang->line('user_unblocked_link'))."<br/>";
                }
                elseif(!$userList->blocked){
                    echo anchor(base_url()."admin/backend/admin_user_blocked/$userList->id", $this->lang->line('user_blocked_link'))."<br/>";
                }      
            }
            ?>
          </td>
		</tr>
<?php $i = $i + 1; 
	}
}?>
 </table>
</fieldset>



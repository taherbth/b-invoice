<h3 class="content_edit"><?php echo $this->lang->line('label_org_admin_view_all_registered_member');?> </h3>
<?php 
    if($access_org_members){ 
?>
<?php echo $this->session->flashdata('message'); ?>
  
 
        <?php   echo '<a class="button icon-add" href="'.base_url().'organization/info/create_new_member'.'">'.$this->lang->line('label_create_new').'</a>';  ?>


<?php

/*
$group_name ="";
  $group_info = $this->info_model->get_org_mem_group_info($this->session->userdata('member_group'));
    if($group_info){
         $group_name = $group_info[0]->group_name;
}
*/

foreach ($query1 as $info):  
    $mem_type = $info->mem_type_id;
    if($mem_type!="Admin" && !empty($mem_type)){
        $mem_type = $this->info_model->get_all_org_member_types($mem_type);
        if($mem_type){
            $mem_type = $mem_type[0]->type_name;
        }
    }elseif($mem_type==""){$mem_type = $this->lang->line('not_available'); }

$member_ship_expire = date("Y-m-d",$info->expire_date);                                               
                                                
 $group_info = $this->info_model->get_mem_group_info_by_mem_id($info->mem_id);
 
 $group_names ="";
    if($group_info){
        foreach($group_info as $rows){
            if($group_names){
                    $group_names .= ",".$rows->group_name;
            }else{$group_names = $rows->group_name;}
         }
}
 
    ?>
<div class="accordion-header units-row">
<div class="unit-33">
	<?php echo $info->username; ?>
</div>
<div class="unit-25">
	<?php if($mem_type=="Admin"){ echo '<span class="is-admin">✓</span>Admin'; } else{ echo '<span class="is-admin" style="background: #ccc;">✓</span>Not admin'; }?>
</div>
<div class="unit-push-right">
			<a class="button icon-settings" href="<?php echo base_url(); ?>organization/info/profile_setting_by_admin/<?php echo $info->mem_id;?> ">Profile setting</a>
			<a class="button icon-edit" href="<?php echo base_url(); ?>organization/info/modify_member_profile_by_admin/<?php echo $info->mem_id;?>">Edit</a>
			<?php   if($make_admin){
                if($mem_type=="Admin"){ echo'<a class="button icon-toggle" href="'.base_url()."organization/info/admin_previlize/".$info->mem_id, $this->lang->line('undo_admin').'">Toggle admin</a>';  }
				else{ echo '<a class="button icon-toggle" href="'.base_url()."organization/info/admin_previlize/".$info->mem_id, $this->lang->line('make_admin').'">Toggle admin</a>';  }
		        }
            ?>
	<span class="toggleslide">▼</span>
	</div>
</div>
	<div class="accordion-content units-row">

        <div class="unit-33">
            <label class="From"><b>ID:</b> </label><?php echo $info->mem_id; ?><br>
                    
                    <label class="From"><b> Name:</b></label> 
                    <span><?php echo $info->first_name. "&nbsp;".$info->last_name; ?></span> <br>
                    <label class="From"><b>Address:</b></label> 
                    <span><?php echo $info->street_address; ?></span> <br>
        </div>
        <div class="unit-33">

                    <label class="From"><b> Phone:</b></label> 
                    <span><?php echo $info->mobile_phone; ?></span> <br>
                    <label class="From"><b>Bank Account No:</b></label> 
                    <span><?php echo $info->bank_acc_no_one; ?></span> <br>
                    <label class="From"><b>Bank Account Type:</b></label> 
                    <span><?php echo $info->bank_acc_type_one; ?></span> <br>
                    
        </div>
        <div class="unit-33">
             <label class="From"><b>Person Number:</b></label> 
                    <span><?php echo $info->ssn_or_person_no; ?></span> <br>
                    <label class="From"><b>User Name:</b></label> 
                    <span><?php echo $info->username; ?></span> <br>
                    <label class="From"><b>E-mail:</b></label> 
                    <span><?php echo $info->email; ?></span> <br>
                    <label class="From"><b>User Type:</b></label> 
                    <span><?php echo $mem_type; ?></span> <br>
                    <label class="From"><b>Group Name:</b></label> 
                    <span><?php echo $group_names; ?></span> <br>                    
                    <label class="From"><b>Expire Date:</b></label> 
                    <span><?php if($member_ship_expire ){echo $member_ship_expire ;} else{echo "N/A";} ?></span> <br>
        </div>
	</div>
<?php endforeach; ?>

<p class="pagination"><?php echo $this->pagination->create_links(); ?></p>

<?php } else { ?>  
<div class="notification">
 <span style="color:red;"><?php echo $this->lang->line('members_no_access_msg');?></span>

</div><?php }  ?>

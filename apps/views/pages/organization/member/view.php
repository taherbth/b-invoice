<h3 class="content_edit">Org Admin Control Panel View all Registerd Member</h2>
<?php echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<style>
    .a a{color:green}
    .a a:hover{color:#C74444}
	.c{
        background-color: #E0EAF1;
       
        color: #3E6D8E;
        font-size: 12px;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        
        color: #3E6D8E;
        font-size: 12px;
        height:20px; 
        text-decoration: none;
        white-space: nowrap;
    }
</style>
  

<?php
foreach ($query1 as $info):
    $query12 = $this->db->query("select group_name from org_group where id='" . $info->member_group . "'");
    foreach ($query12->result() as $p1) {
        $g_name = $p1->group_name;
    }
    if (!empty($g_name)):$g_name = $g_name;
    endif;
	 $query123 = $this->db->query("select user_type from user_type where id='" . $info->user_type . "'");
    foreach ($query123->result() as $p13) {
        $user_type = $p13->user_type;
    }
    if (!empty($user_type)):$user_type = $user_type;else:$user_type="";
    endif;
	$q = $this->db->query("select * from org_member where member_id='" . $info->id . "'");
    
    ?>
    <div class="SearchListing" style="margin:10px 20px 10px 20px">

        <div class="ListingDetails">
            <ul> <li><label class="From"><b>ID:</b> </label> <span class="HighLight" style="color:#990033; font-size:13px; font-weight:bold"><?php echo $info->id; ?> </span><br>
                    <label class="From"><b> Member Title:</b></label> 
                    <span class="HighLight"><?php echo $info->member_title; ?></span> <br>
                    <label class="From"><b> Name:</b></label> 
                    <span class="HighLight"><?php echo $info->name; ?></span> <br>
                    <label class="From"><b>Address:</b></label> 
                    <span class="HighLight"><?php echo $info->address; ?></span> <br>
            </ul>
        </div>
        <div class="ListingDetails">
            <ul>
                <li>
                    <label class="From"><b> Phone:</b></label> 
                    <span class="HighLight"><?php echo $info->phone; ?></span> <br>
                    <label class="From"><b>Profile Message:</b></label> 
                    <span class="HighLight"><?php echo $info->profile_message; ?></span> <br>
                    <label class="From"><b>Bank Info:</b></label> 
                    <span class="HighLight"><?php echo $info->bank_info; ?></span> <br>
                    <label class="From"><b>Household Size:</b></label> 
                    <span class="HighLight"><?php echo $info->household_size; ?></span> <br>
                    


            </ul>
        </div>
        <div class="ListingDetails">
            <ul><li>
                    <label class="From"><b>Group Name:</b></label> 
                    <span class="HighLight"><?php echo $g_name; ?></span> <br>
                    <label class="From"><b>User Type:</b></label> 
                    <span class="HighLight"><?php echo $user_type; ?></span> <br>

                    <label class="From"><b>User Name:</b></label> 
                    <span class="HighLight"><?php echo $info->username; ?></span> <br>
                      <label class="From"><b>Person Number:</b></label> 
                    <span class="HighLight"><?php echo $info->person_number; ?></span> <br>
                    <label class="From"><b>Expire Date:</b></label> 
                    <span class="HighLight"><?php echo $info->expire_date; ?></span> <br>

            </ul>
        </div>
<a class="c" href="<?php echo base_url(); ?>organization/info/profile_setting/<?php echo $info->id;?> ">
        <button class="c">Profile setting</button>
 </a>
 &nbsp;
 <a class="c" href="<?php echo base_url(); ?>organization/info/edit_member_profile/<?php echo $info->id;?> ">
        <button class="c">Edit</button>
 </a>
 <a class="c" href="<?php echo base_url(); ?>organization/info/admin_previlize/<?php echo $info->id;?> ">
        <button class="c">Admin Previlize</button>
 </a>
 <?php if($q->num_rows()>0):?>
 <img src="<?php echo base_url(); ?>public/images/administrator.png" alt="" border="0" style="padding-left:55px; padding-top:20px"  >
 <?php endif;?>
</div>
<?php endforeach; ?>

 <p class="pagination" style="width:900px; clear:both; text-align:center"><?php echo $this->pagination->create_links(); ?></p>



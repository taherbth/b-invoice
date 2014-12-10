<?php
$query = $this->db->query("select * from member_previlige where user_type='".$this->session->userdata("user_type")."'");
foreach ($query->result() as $info):
endforeach;
?>
<div style="float: right; padding-top: 37px; padding-right: 5px; font-size: 12px; color: rgb(102, 102, 102);">
    <style>
        span .b{ color:#428F8C; font-weight: bold}
        span .b:hover{ color:#7FD265; font-weight: bold}
    </style>
    <span style=" float:right; margin-top:-20px">
       <a class="b" style="" href="<?php echo base_url(); ?>org_member/sms/add_sms" title="">
 <button name="archive" value="archive">Send Sms</button>
          <a class="b" style="" href="<?php echo base_url(); ?>org_member/sms/add_address" title="">
                <button name="archive" value="archive">Contact List</button>
            </a>
          <a class="b" style="" href="<?php echo base_url(); ?>org_member/letter/add_address" title="">
                <button name="archive" value="archive">Address List</button>
            </a>
            <a class="b" style="" href="<?php echo base_url(); ?>member/logout" title="">
                <button name="archive" value="archive">Logout</button>
            </a>
    </span>
    <!--	 <a href="<?php //echo base_url();  ?>admin/info/view_organisation_message"><img src="<?php //echo base_url();  ?>public/images/inbox.jpg" height="22" width="30" alt="" border="0"></a> 
    --></div>
<a href="#"><img src="<?php echo base_url(); ?>public/images/logga.png" alt="" border="0"></a><br><br>


<div id="menu">
    <div style="float: left;">
        <ul>
            <?php if ($info->mainboard_access_main == '1'): ?>
                <li><a href="<?php echo base_url(); ?>org_member/info/view_mainboard"><span>Mainboard</span></a></li>
            <?php endif; ?>
            <?php if ($info->forum_access == '1'): ?>
                <li><a href="<?php echo base_url(); ?>org_member/info/view_forum_post"><span>Forum</span></a></li> 
            <?php endif; ?>        
           <!-- <li><a href="<?php echo base_url(); ?>org_member/info/view_sending_post"><span>Home</span></a></li>-->
            <li><a href="<?php echo base_url(); ?>org_member/back"><span>Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>org_member/info/add_post"><span>Post Article</span></a></li>
            <li><a href="<?php echo base_url(); ?>org_member/info/view_post"><span>View Article</span></a></li>
            <?php if ($info->mainboard_sending_out == '1'): ?>
                <li><a href="<?php echo base_url(); ?>org_member/letter/add_letter"><span>Create letter</span></a></li>
            <?php endif; ?>  
            <li><a href="<?php echo base_url(); ?>org_member/info/view_all_member_post"><span>View request</span></a></li>
            <?php if ($info->history_access_articles == '1'): ?>
                <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_article"><span>Archive Article</span></a></li>
            <?php endif; ?> 
            <?php if ($info->history_access_comments == '1'): ?>
             <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_comments">Archive Comments</a></li>
            <?php endif; ?>
        <?php if ($info->history_old_letters == '1'): ?>
            <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_letter">Archive Letter</a></li>
            <?php endif; ?>
        </ul>	
    </div>
</div>
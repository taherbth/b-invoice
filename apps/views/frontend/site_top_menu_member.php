<?php
$query = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($query->result() as $info):
endforeach;
?>
<div class="grid_16" id="header">
    <!-- MENU START -->
    <div id="menu">
        <ul class="group" id="menu_group_main">
            <li class="item first" id="four"><a href="<?php echo base_url(); ?>org_member/back" <?php if ($mainTab == "home"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner home">Home</span></span></a></li>
            <?php if ($info->mainboard_access_main == '1'): ?>
                <li class="item middle" id="one"><a href="<?php echo base_url(); ?>org_member/info/view_mainboard" <?php if ($mainTab == "mainboard_member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner mainboard">Mainboard</span></span></a></li>
            <?php endif; ?>
            <?php if ($info->communication_send_letters == '1'): ?>
                <li class="item middle" id="seven"><a href="<?php echo base_url(); ?>org_member/letter/add_letter" <?php if ($mainTab == "letter_member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner newsletter">Letter</span></span></a></li>        
            <?php endif; ?> 
            <?php if ($info->communication_send_sms == '1'): ?>
                <li class="item middle" id="six"><a href="<?php echo base_url(); ?>org_member/sms/add_sms" <?php if ($mainTab == "sms_member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner sms">Sms</span></span></a></li>        
            <?php endif; ?> 
            <?php if ($info->forum_access == '1'): ?>
                <li class="item middle" id="two"><a href="<?php echo base_url(); ?>org_member/info/view_forum_post" <?php if ($mainTab == "forum_member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner content">Forum</span></span></a></li>
            <?php endif; ?>

            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>org_member/info/add_post" <?php if ($mainTab == "article"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner article">Article</span></span></a></li>
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>org_member/info/view_all_member_post" <?php if ($mainTab == "post_request"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner settings">Post Request</span></span></a></li>        
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>org_member/letter/view_archive_letter" <?php if ($mainTab == "history_member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">History</span></span></a></li>        
        </ul>
    </div>
    <!-- MENU END -->
</div>

<div class="grid_16">
    <!-- TABS START -->
    <div id="tabs">
        <div class="container">
            <ul>

                <?php if ($mainTab == "home"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/back" <?php if ($activeTab == "home"): ?> class="current"<?php endif; ?>><span>Home</span></a></li>
                    <?php if ($info->member_change_password == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/info/change_password" <?php if ($activeTab == "change_password"): ?> class="current"<?php endif; ?>><span>Change Password</span></a></li>
                    <?php endif; ?>
                    <?php if ($info->member_change_profile == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/info/modify_member_profile" <?php if ($activeTab == "modify_profile"): ?> class="current"<?php endif; ?>><span>Edit Profile</span></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo base_url(); ?>org_member/info/view_all_org_member" <?php if ($activeTab == "view_all_org_member"): ?> class="current"<?php endif; ?>><span>View All Member</span></a></li>

                <?php elseif ($mainTab == "mainboard_member"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/info/view_mainboard" <?php if ($activeTab == "mainboard"): ?> class="current"<?php endif; ?>><span>Mainboard</span></a></li>                   
                <?php elseif ($mainTab == "post_request"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/info/view_all_member_post" <?php if ($activeTab == "post_request"): ?> class="current"<?php endif; ?>><span>Post Request</span></a></li>                   

                <?php elseif ($mainTab == "forum_member"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/info/view_forum_post" <?php if ($activeTab == "forum"): ?> class="current"<?php endif; ?>><span>Forum</span></a></li>                   
                <?php elseif ($mainTab == "article"): ?>
                    <?php if ($info->mainboard_change_article == '1' || $info->mainboard_send_proposal == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/info/add_post" <?php if ($activeTab == "post_article"): ?> class="current"<?php endif; ?>><span>Post Article</span></a></li>                   
                    <?php endif; ?>
                    <li><a href="<?php echo base_url(); ?>org_member/info/view_post" <?php if ($activeTab == "view_article"): ?> class="current"<?php endif; ?>><span>View Article</span></a></li>                   

                <?php elseif ($mainTab == "sms_member"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/sms/add_sms" <?php if ($activeTab == "send_sms"): ?> class="current"<?php endif; ?>><span>Send Sms</span></a></li>                   
                    <?php if ($info->configuration_create_address == '1'): ?> 
                        <li><a href="<?php echo base_url(); ?>org_member/sms/add_address" <?php if ($activeTab == "contact_list"): ?> class="current"<?php endif; ?>><span>Create Contact List</span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>org_member/sms/view_address_list" <?php if ($activeTab == "contact_edit"): ?> class="current"<?php endif; ?>><span>View Contact List</span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>org_member/sms/add_external_sms" <?php if ($activeTab == "external_sms"): ?> class="current"<?php endif; ?>><span>External sms</span></a></li>                   
                    <?php endif; ?> 
                <?php elseif ($mainTab == "letter_member"): ?>
                    <li><a href="<?php echo base_url(); ?>org_member/letter/add_letter" <?php if ($activeTab == "create_letter"): ?> class="current"<?php endif; ?>><span>Create Letter</span></a></li>
                    <?php if ($info->configuration_create_address == '1'): ?>                   
                        <li><a href="<?php echo base_url(); ?>org_member/letter/add_address" <?php if ($activeTab == "add_address"): ?> class="current"<?php endif; ?>><span> Address List</span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>org_member/letter/view_address_list" <?php if ($activeTab == "view_list"): ?> class="current"<?php endif; ?>><span>View List</span></a></li>
                    <?php endif; ?>                 
                    <li><a href="<?php echo base_url(); ?>org_member/letter/add_header" <?php if ($activeTab == "create_header"): ?> class="current"<?php endif; ?>><span>Create Header</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>org_member/letter/view_header" <?php if ($activeTab == "view_header"): ?> class="current"<?php endif; ?>><span>View Header</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>org_member/letter/add_footer" <?php if ($activeTab == "create_footer"): ?> class="current"<?php endif; ?>><span>Create Footer</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>org_member/letter/view_footer" <?php if ($activeTab == "view_footer"): ?> class="current"<?php endif; ?>><span>View Footer</span></a></li>
                    <?php if ($info->configuration_create_address == '1'): ?>                 
                        <li><a href="<?php echo base_url(); ?>org_member/letter/add_external_letter" <?php if ($activeTab == "create_external_letter"): ?> class="current"<?php endif; ?>><span>Create External Letter</span></a></li>                   
                    <?php endif; ?> 
                <?php elseif ($mainTab == "history_member"): ?>
                    <?php if ($info->history_old_letters == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_letter" <?php if ($activeTab == "view_archive_letter"): ?> class="current"<?php endif; ?>><span>View Archive Letter</span></a></li>                   
                    <?php endif; ?>
                    <?php if ($info->history_access_articles == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_article" <?php if ($activeTab == "view_archive_article"): ?> class="current"<?php endif; ?>><span>Archive Article(Public)</span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>org_member/letter/private_archive_article" <?php if ($activeTab == "private_archive_article"): ?> class="current"<?php endif; ?>><span>Archive Article(Private)</span></a></li>                   
                    <?php endif; ?>
                    <?php if ($info->history_access_comments == '1'): ?>
                        <li><a href="<?php echo base_url(); ?>org_member/letter/view_archive_comments" <?php if ($activeTab == "view_archive_comments"): ?> class="current"<?php endif; ?>><span>View Archive Comments</span></a></li>                   
                    <?php endif; ?>
                <?php else: ?>
                <?php endif; ?>          
            </ul>
        </div>
    </div>
    <!-- TABS END -->    
</div>

<div class="menu">
<ul class="main-menu">
        <?php if($mem_type=="Admin") { ?>
            <li><a href="<?php echo base_url(); ?>organization/info/dashboard" <?php if ($mainTab == "dashboard"): ?> class="main current" <?php else: ?> class="dashboard" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_dashboard');?></a></li>
        <?php } ?>
            <li><a href="<?php echo base_url(); ?>organization/info/home" <?php if ($mainTab == "home"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_home');?></a></li>
            <li><a href="<?php echo base_url(); ?>organization/info/org_members" <?php if ($mainTab == "members"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_member');?></a></li>
            <li><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($mainTab == "mainboard"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_main_board');?></a></li>        
            <?php if($mem_type=="Admin" || $forum_access) { ?>
                <li><a href="<?php echo base_url(); ?>organization/info/view_forum" <?php if ($mainTab == "view_forum"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_forum');?></a></li>        
            <?php } ?>
            <li><a href="<?php echo base_url(); ?>organization/info/communication_member" <?php if($mainTab == "communication"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('communication_member_tab');?></a></li>              
            <!--<li><a href="<?php echo base_url(); ?>organization/info/view_letter" <?php if ($mainTab == "letter_org"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>>Letter</a></li>-->         
        </ul>
    <!-- MENU END -->
<?php $mainboard_send_proposal_access = 1; ?>
    <!-- TABS START -->

            <ul class="sub-menu">

                 <?php if ($mainTab == "dashboard"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/dashboard" <?php if ($activeTab == "dashboard"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_dashboard');?></span></a></li>

                <?php elseif ($mainTab == "home"):                           
                        if($mem_type=="Admin" || $configuration_change_org) { ?>
                            <li><a href="<?php echo base_url(); ?>organization/info/my_organization/<?php echo $this->session->userdata('member_org');?>" <?php if ($activeTab == "my_org"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_my_organization');?></span></a></li>
                        <?php } ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/my_profile/<?php echo $this->session->userdata('mem_id');?>" <?php if ($activeTab == "my_profile"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_my_profile');?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/contact_site_admin" <?php if ($activeTab == "contact_site_admin"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_contact_site_admion');?></span></a></li>

                <?php elseif ($mainTab == "mainboard"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($activeTab == "mainboard"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_main_board');?></span></a></li>                   
                    
                    <?php if($mem_type=="Admin" || $mainboard_change_article) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/post_article" <?php if ($activeTab == "post_article"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_post_article');?></span></a></li>                   
                    <?php $mainboard_send_proposal=0;  $mainboard_send_proposal_access=0;} 
                    if($mainboard_send_proposal_access && ($mem_type=="Admin" || $mainboard_send_proposal)) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/proposal_article" <?php if ($activeTab == "proposal_article"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_proposal_article');?></span></a></li>                   
                    <?php } 
                     if($mem_type=="Admin" || $mainboard_change_article) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/article_proposal" <?php if ($activeTab == "article_proposal"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_article_proposal');?></span></a></li>                   
                    <?php } 
                    if($mem_type=="Admin") { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/view_article_category" <?php if ($activeTab == "view_category"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_article_category');?></span></a></li>                   
                    <?php } ?>
                    
                <?php elseif ($mainTab == "view_forum"):                           
                        if($mem_type=="Admin" || $forum_access) { ?>
                            <li><a href="<?php echo base_url(); ?>organization/info/view_forum" <?php if ($activeTab == "view_forum"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_view_forum');?></span></a></li>
                <?php } ?>
                   

                <?php elseif ($mainTab == "communication"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member" <?php if($activeTab == "email"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('email_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member_sms" <?php if($activeTab == "sms"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('sms_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member_letter" <?php if($activeTab == "letter"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('letter_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_external_contact" <?php if($activeTab == "external_contact"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('external_contact_tab');?></span></a></li>                   
			   
                <?php elseif ($mainTab == "members"): 
                    if($mem_type=="Admin") { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/org_members" <?php if ($activeTab == "members"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_member');?></span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>organization/info/member_types" <?php if ($activeTab == "member_types"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_member_types');?></span></a></li>                   
                    <?php  } if($mem_type=="Admin" || $members_c_group) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/member_groups" <?php if ($activeTab == "member_groups"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_member_groups');?></span></a></li>                   
                    <?php } ?>
            <?php elseif ($mainTab == "previlization_org"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_previlige" <?php if ($activeTab == "view_previlige"): ?> class="current"<?php endif; ?>><span>Set Previlize</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_org_previlize" <?php if ($activeTab == "previlige_edit"): ?> class="current"<?php endif; ?>><span>View Previlize Setting</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_previlige_external" <?php if ($activeTab == "view_external_previlige"): ?> class="current"<?php endif; ?>><span>Set External Previlize </span></a></li>                   
    <!--    			<li><a href="<?php //echo base_url();  ?>organization/info/view_org_external_previlize" <?php //if($activeTab == "external_previlige_edit"):  ?> class="current"<?php //endif;  ?>><span>View External Previlize</span></a></li>                   
                    -->             
                <?php elseif ($mainTab == "sms"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_sms" <?php if ($activeTab == "send_sms"): ?> class="current"<?php endif; ?>><span>Send Sms</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_address" <?php if ($activeTab == "contact_list"): ?> class="current"<?php endif; ?>><span>Create Contact List</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/view_address_list" <?php if ($activeTab == "contact_edit"): ?> class="current"<?php endif; ?>><span>View Contact List</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_external_sms" <?php if ($activeTab == "external_sms"): ?> class="current"<?php endif; ?>><span>External sms</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_signature" <?php if ($activeTab == "signature"): ?> class="current"<?php endif; ?>><span>Create Signature</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/sms/view_signature" <?php if ($activeTab == "view_signature"): ?> class="current"<?php endif; ?>><span>View Signature</span></a></li>                      


                <?php elseif ($mainTab == "letter_org"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_letter" <?php if ($activeTab == "letter_request"): ?> class="current"<?php endif; ?>><span>Letter Request</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/add_letter" <?php if ($activeTab == "create_letter"): ?> class="current"<?php endif; ?>><span>Create Letter</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/add_address" <?php if ($activeTab == "add_address"): ?> class="current"<?php endif; ?>><span> Address List</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/view_address_list" <?php if ($activeTab == "view_list"): ?> class="current"<?php endif; ?>><span>View List</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/add_header" <?php if ($activeTab == "create_header"): ?> class="current"<?php endif; ?>><span>Create Header</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/view_header" <?php if ($activeTab == "view_header"): ?> class="current"<?php endif; ?>><span>View Header</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/add_footer" <?php if ($activeTab == "create_footer"): ?> class="current"<?php endif; ?>><span>Create Footer</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/view_footer" <?php if ($activeTab == "view_footer"): ?> class="current"<?php endif; ?>><span>View Footer</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/add_external_letter" <?php if ($activeTab == "create_external_letter"): ?> class="current"<?php endif; ?>><span>Create External Letter</span></a></li>                   
                <?php elseif ($mainTab == "history"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_letter" <?php if ($activeTab == "view_archive_letter"): ?> class="current"<?php endif; ?>><span>View Archive Letter</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_article" <?php if ($activeTab == "view_archive_article"): ?> class="current"<?php endif; ?>><span>Archive Article(Public)</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/article_archive" <?php if ($activeTab == "article_archive"): ?> class="current"<?php endif; ?>><span>Archive Article(Private)</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_comments" <?php if ($activeTab == "view_archive_comments"): ?> class="current"<?php endif; ?>><span>View Archive Comments</span></a></li>                   
                <?php else: ?>
                <?php endif; ?>          
            </ul>
</div>

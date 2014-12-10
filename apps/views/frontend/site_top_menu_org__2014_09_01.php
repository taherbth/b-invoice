<div class="menu">
<ul class="main-menu">
        <?php if($access_dashboard) { ?>
            <li><a href="<?php echo base_url(); ?>organization/info/dashboard" <?php if ($mainTab == "dashboard"): ?> class="main current" <?php else: ?> class="dashboard" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_dashboard');?></a></li>
        <?php } ?>
            <li><a href="<?php echo base_url(); ?>organization/info/home" <?php if ($mainTab == "home"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_home');?></a></li>
            <li><a href="<?php echo base_url(); ?>organization/info/org_members" <?php if ($mainTab == "members"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_member');?></a></li>
            <li><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($mainTab == "mainboard"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_main_board');?></a></li>        
            <?php if($forum_access) { ?>
                <li><a href="<?php echo base_url(); ?>organization/info/view_forum" <?php if ($mainTab == "view_forum"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><?php echo $this->lang->line('org_menu_tab_forum');?></a></li>        
            <?php } ?>
            <?php if($communication_send_email || $communication_send_sms || $communication_send_letters) { ?>
                <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>organization/info/communication_member" <?php if($mainTab == "communication"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner settings"><?php echo $this->lang->line('communication_member_tab');?></span></span></a></li>        
            <?php } ?>
            <?php if($access_faktura) { ?>
                <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>organization/info/faktura" <?php if ($mainTab == "faktura"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner faktura"><?php echo $this->lang->line('label_faktura');?></span></span></a></li>        
            <?php } ?>
        </ul>
    <!-- MENU END -->
<?php $mainboard_send_proposal_access = 1; ?>
    <!-- TABS START -->

            <ul class="sub-menu">

                 <?php if ($mainTab == "dashboard"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/dashboard" <?php if ($activeTab == "dashboard"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_dashboard');?></span></a></li>

                <?php elseif ($mainTab == "home"):                           
                        if($configuration_change_org) { ?>
                            <li><a href="<?php echo base_url(); ?>organization/info/my_organization/<?php echo $member_org;?>" <?php if ($activeTab == "my_org"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_my_organization');?></span></a></li>
                        <?php } ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/my_profile/<?php echo $this->session->userdata('mem_id');?>" <?php if ($activeTab == "my_profile"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_my_profile');?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/contact_site_admin" <?php if ($activeTab == "contact_site_admin"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_contact_site_admion');?></span></a></li>
                    <?php if($system_configuration) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/system_configuration" <?php if ($activeTab == "system_configuration"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_system_configuration');?></span></a></li>
                   <?php } ?>
                <?php elseif ($mainTab == "mainboard"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($activeTab == "mainboard"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_main_board');?></span></a></li>                   
                    
                    <?php if($mainboard_change_article) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/post_article" <?php if ($activeTab == "post_article"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_post_article');?></span></a></li>                   
                    <?php $mainboard_send_proposal=0;  $mainboard_send_proposal_access=0;} 
                    if($mainboard_send_proposal_access && ($mainboard_send_proposal)) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/proposal_article" <?php if ($activeTab == "proposal_article"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_proposal_article');?></span></a></li>                   
                    <?php } 
                     if( $mainboard_change_article) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/article_proposal" <?php if ($activeTab == "article_proposal"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_article_proposal');?></span></a></li>                   
                    <?php } 
                    if($mainboard_change_article) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/view_article_category" <?php if ($activeTab == "view_category"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_article_category');?></span></a></li>                   
                    <?php } ?>
                    
                <?php elseif ($mainTab == "view_forum"):                           
                        if($forum_access) { ?>
                            <li><a href="<?php echo base_url(); ?>organization/info/view_forum" <?php if ($activeTab == "view_forum"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_view_forum');?></span></a></li>
                <?php } ?>
                   

                <?php elseif ($mainTab == "communication"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member" <?php if($activeTab == "email"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('email_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member_sms" <?php if($activeTab == "sms"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('sms_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_member_letter" <?php if($activeTab == "letter"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('letter_tab');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/communication_external_contact" <?php if($activeTab == "external_contact"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('external_contact_tab');?></span></a></li>                   
			   
                <?php elseif ($mainTab == "members"): 
                    if($access_org_members) { ?>
                        <li><a href="<?php echo base_url(); ?>organization/info/org_members" <?php if ($activeTab == "members"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_member');?></span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>organization/info/non_ac_org_members" <?php if ($activeTab == "non_ac_members"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_non_ac_member');?></span></a></li>                   
                        <li><a href="<?php echo base_url(); ?>organization/info/member_types" <?php if ($activeTab == "member_types"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_menu_tab_member_types');?></span></a></li>                   
                    <?php  } if( $members_c_group) { ?>
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
                     <?php elseif ($mainTab == "faktura"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/faktura" <?php if ($activeTab == "faktura_overview"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('fak_overview');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/faktura_invoices" <?php if ($activeTab == "faktura_invoices"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('fak_invoices');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/faktura_customers" <?php if ($activeTab == "faktura_customers"): ?> class="current"<?php endif; ?>><span> <?php echo $this->lang->line('fak_ext_customers');?></span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/faktura_statistics" <?php if ($activeTab == "faktura_statistics"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('fak_statistics');?></span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/faktura_settings" <?php if ($activeTab == "faktura_settings"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('fak_settings');?></span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/faktura_faq" <?php if ($activeTab == "faktura_faq"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('fak_faq');?></span></a></li>                   
                

                    <?php else: ?>
                <?php endif; ?>          
            </ul>
</div>

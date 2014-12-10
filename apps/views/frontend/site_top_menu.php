<div class="menu">
<ul class="main-menu">
                                
            <li><a href="<?php echo base_url(); ?>admin/info/org_letter_order" <?php if($mainTab == "orders"): ?> class="current"<?php endif; ?>><?php echo $this->lang->line('order_tab');?></a></li>
            <?php if($configuration_access){?>   
                <li><a href="<?php echo base_url(); ?>admin/info/global_settings" <?php if($mainTab == "configuration"): ?> class="current"<?php endif; ?>><?php echo $this->lang->line('configuration_tab');?></a></li>
            <?php } ?> 
            <?php if($customer_view_registered_customer){?>
            <li><a href="<?php echo base_url(); ?>admin/info/view_registered_customer" <?php if($mainTab == "customer"): ?> class="current"<?php endif; ?>><?php echo $this->lang->line('customer_tab');?></a></li>
            <?php } ?>
            <?php if($users_view_users){?>
                <li class="item middle" id="six"><a href="<?php echo base_url(); ?>admin/backend/admin_users" <?php if($mainTab == "users"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner users"><?php echo $this->lang->line('users_tab');?></span></span></a></li>        
            <?php } ?>
           <?php if($billing_view_billing){?>
                <li class="item middle" id="six"><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($mainTab == "billing"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner event_manager"><?php echo $this->lang->line('billing_tab');?></span></span></a></li>        
            <?php } ?>            
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>admin/info/communication_org" <?php if($mainTab == "communication"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner settings"><?php echo $this->lang->line('communication_org_tab');?></span></span></a></li>        
            <li class="item last" id="three"><a href="<?php echo base_url(); ?>admin/info/view_archive_letter" <?php if($mainTab == "history"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">History</span></span></a></li>
        </ul>
    </div>
    <!-- MENU END -->

    <!-- TABS START -->
    <ul class="sub-menu">
      
                <?php if($mainTab == "orders" || $mainTab == "letter" || $activeTab == "message" || $mainTab == "invoice_letter") : ?>
                <?php if($order_view_letters){?>
                    <li><a href="<?php echo base_url(); ?>admin/info/org_letter_order" <?php if($activeTab == "org_letter_order"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('order_letters');?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/info/view_invoice_letter" <?php if($activeTab == "view_invoice_letter"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('order_invoice_letters');?></span></a></li>
                
                <?php }  if($order_view_new_customer){ ?>
                    <li><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($activeTab == "message"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('order_new_customer');?></span></a></li>                   
			    <?php } ?>
                <?php elseif($mainTab == "users"): ?>
                <?php if($users_view_users){?>
                    <li><a href="<?php echo base_url(); ?>admin/backend/admin_users" <?php if($activeTab == "view_user"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('view_users');?></span></a></li>
				<?php } if($user_types_view_user_types){?>
                <li><a href="<?php echo base_url(); ?>admin/backend/admin_user_types" <?php if($activeTab == "user_types"): ?> class="current" <?php endif; ?>><span><?php echo $this->lang->line('view_types');?></span></a></li>
			   <?php }?>
                
            
                <?php elseif($mainTab == "letterssss"):  ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($activeTab == "view_letter"): ?> class="current"<?php endif; ?>><span>Letters</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/datewise_search" <?php if($activeTab == "datewise_search"): ?> class="current"<?php endif; ?>><span>Search By Date</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/info/titlewise_search" <?php if($activeTab == "titlewise_search"): ?> class="current"<?php endif; ?>><span>Search By Title</span></a></li>
			  <?php //add_cost , view_zone,view_package,view_org_type?>
               <?php elseif($mainTab == "configuration"): if($configuration_access){?>               
                    <li><a href="<?php echo base_url(); ?>admin/info/global_settings" <?php if($activeTab == "global_settings"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('global_settings');?></span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>admin/info/currency" <?php if($activeTab == "currency"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('currency');?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/info/packages" <?php if($activeTab == "packages"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('packages');?></span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/info/org_category" <?php if($activeTab == "org_category"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_category');?></span></a></li>
                <?php } ?>
                <?php elseif($mainTab == "organization"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_register_org" <?php if($activeTab == "org"): ?> class="current"<?php endif; ?>><span>View Organization</span></a></li>                   
			   <?php elseif($mainTab == "previlization"): ?>
    			
                <!--li><a href="<?php echo base_url(); ?>admin/info/view_previlige" <?php if($activeTab == "view_previlige"): ?> class="current"<?php endif; ?>><span>Set Previlize</span></a></li-->                   
    			<!--li><a href="<?php echo base_url(); ?>admin/info/view_org_previlize" <?php if($activeTab == "previlige_edit"): ?> class="current"<?php endif; ?>><span>View Setting</span></a></li-->                   
			   
               <?php elseif($mainTab == "billing"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($activeTab == "bill"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('billing_msg');?></span></a></li>                   
			   <?php elseif($mainTab == "communication"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/communication_org" <?php if($activeTab == "email"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('email_tab');?></span></a></li>                   
    			<li><a href="<?php echo base_url(); ?>admin/info/communication_org_sms" <?php if($activeTab == "sms"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('sms_tab');?></span></a></li>                   
    			<li><a href="<?php echo base_url(); ?>admin/info/communication_org_letter" <?php if($activeTab == "letter"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('letter_tab');?></span></a></li>                   
			   <?php elseif($mainTab == "history"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_archive_letter" <?php if($activeTab == "view_archive_letter"): ?> class="current"<?php endif; ?>><span>View Archive letter</span></a></li>                   
               <?php else: ?>
             <?php endif; ?>          
            </ul>
    <!-- TABS END -->    

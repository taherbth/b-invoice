<div class="grid_16" id="header">
    <!-- MENU START -->
    <div id="menu">
        <ul class="group" id="menu_group_main">
            <li class="item first" id="four"><a href="<?php echo base_url(); ?>admin/backend/user" <?php if($mainTab == "users"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner users">Users</span></span></a></li>
            <li class="item middle" id="seven"><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($mainTab == "letter"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner newsletter">letter</span></span></a></li>        
            <li class="item middle" id="one"><a href="<?php echo base_url(); ?>admin/info/add_package" <?php if($mainTab == "configuration"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner dashboard">Configuration</span></span></a></li>
            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>admin/info/view_register_org" <?php if($mainTab == "organization"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner content">Organization</span></span></a></li>
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>admin/info/view_previlige" <?php if($mainTab == "previlization"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="outer"><span class="inner media_library">Previlization</span></span></a></li>        
            <li class="item middle" id="six"><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($mainTab == "billing"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner event_manager">Billing</span></span></a></li>        
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($mainTab == "inbox"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner settings">Inbox</span></span></a></li>        
            <li class="item last" id="three"><a href="#" class="main"><span class="outer"><span class="inner reports">Reports</span></span></a></li>
        </ul>
    </div>
    <!-- MENU END -->
</div>

<div class="grid_16">
    <!-- TABS START -->
    <div id="tabs">
        <div class="container">
            <ul>
      
                <?php if($mainTab == "users"): ?>
				<li><a href="<?php echo base_url(); ?>admin/backend/user" <?php if($activeTab == "create"): ?> class="current"<?php endif; ?>><span>Create</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/backend/change_password" <?php if($activeTab == "password"): ?> class="current"<?php endif; ?>><span>Password Change</span></a></li>
			   <?php elseif($mainTab == "letter"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($activeTab == "view_letter"): ?> class="current"<?php endif; ?>><span>View Letter</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/datewise_search" <?php if($activeTab == "datewise_search"): ?> class="current"<?php endif; ?>><span>Search By Date</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/info/titlewise_search" <?php if($activeTab == "titlewise_search"): ?> class="current"<?php endif; ?>><span>Search By Title</span></a></li>
               <?php elseif($mainTab == "configuration"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/add_package" <?php if($activeTab == "create_package"): ?> class="current"<?php endif; ?>><span>Create Package</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/view_package" <?php if($activeTab == "view_package"): ?> class="current"<?php endif; ?>><span>View Package</span></a></li>
    			<li><a href="<?php echo base_url(); ?>admin/info/add_zone" <?php if($activeTab == "create_area"): ?> class="current"<?php endif; ?>><span>Create Area</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/view_zone" <?php if($activeTab == "view_area"): ?> class="current"<?php endif; ?>><span>View Area</span></a></li>
    			<li><a href="<?php echo base_url(); ?>admin/info/add_org_type" <?php if($activeTab == "create_org_type"): ?> class="current"<?php endif; ?>><span>Create OrgType</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/view_org_type" <?php if($activeTab == "view_org_type"): ?> class="current"<?php endif; ?>><span>View OrgType</span></a></li>
               	<li><a href="<?php echo base_url(); ?>admin/info/add_cost" <?php if($activeTab == "cost"): ?> class="current"<?php endif; ?>><span>Cost Setting</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/view_cost" <?php if($activeTab == "view_cost"): ?> class="current"<?php endif; ?>><span>View Cost Setting</span></a></li>
			   <?php elseif($mainTab == "organization"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_register_org" <?php if($activeTab == "org"): ?> class="current"<?php endif; ?>><span>View Organization</span></a></li>                   
			   <?php elseif($mainTab == "previlization"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_previlige" <?php if($activeTab == "view_previlige"): ?> class="current"<?php endif; ?>><span>Set Previlize</span></a></li>                   
    			<li><a href="<?php echo base_url(); ?>admin/info/view_org_previlize" <?php if($activeTab == "previlige_edit"): ?> class="current"<?php endif; ?>><span>View Setting</span></a></li>                   
			   <?php elseif($mainTab == "billing"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($activeTab == "bill"): ?> class="current"<?php endif; ?>><span>Billing</span></a></li>                   
			   <?php elseif($mainTab == "inbox"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($activeTab == "message"): ?> class="current"<?php endif; ?>><span>Inbox</span></a></li>                   
               <?php else: ?>
             <?php endif; ?>          
            </ul>
        </div>
    </div>
    <!-- TABS END -->    
</div>

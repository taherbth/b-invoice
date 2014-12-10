<?php 
 $query=$this->db->query("select * from org_external_previlige where org_id ='".$this->session->userdata("orgid")."'");
 foreach($query->result() as $p_info):
  $external_mainboard =$p_info->external_mainboard;
  $external_presentation =$p_info->external_presentation;
  $external_contact =$p_info->external_contact;
  $external_archive_article =$p_info->external_archive_article;
 endforeach;

?>
<div class="grid_16" id="header">
    <!-- MENU START -->
    <div id="menu">
        <ul class="group" id="menu_group_main">
             <li class="item first" id="four"><a href="<?php echo base_url(); ?>member"><span class="outer"><span class="inner home">Home</span></span></a></li>
           <?php if($external_presentation=="1"):?>
             <li class="item middle" id="one"><a href="<?php echo base_url(); ?>organization/presentation/about_us"<?php if($mainTab == "aboutus"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?> ><span class="outer"><span class="inner article">About Us</span></span></a></li>
            <?php endif;?>
           <?php if($external_mainboard=="1"):?>
            <li class="item middle" id="one"><a href="<?php echo base_url(); ?>organization/presentation/view_mainboard" <?php if($mainTab == "mainboard"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner mainboard">Mainboard</span></span></a></li>
            <?php endif;?>
            
            <?php if($external_contact=="1"):?>
            <li class="item middle" id="seven"><a href="<?php echo base_url(); ?>organization/presentation/compose_message" <?php if($mainTab == "contact"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner newsletter">Contact</span></span></a></li>        
            <?php endif;?> 
             <?php if($external_archive_article=="1"):?>
            <li class="item last" id="eight"><a href="<?php echo base_url(); ?>organization/presentation/view_archive" <?php if($mainTab == "archive"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">Archive Article</span></span></a></li>        
            <?php else:?>
            <li class="item last" id="eight"><a href="#" <?php if($mainTab == "archive"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">Archive Article</span></span></a></li>        
            <?php endif;?> 
        </ul>

    </div>
    <!-- MENU END -->
</div>

<div class="grid_16">
    <!-- TABS START -->
    <div id="tabs">
        <div class="container">
            <ul>
      
               
            </ul>
        </div>
    </div>
    <!-- TABS END -->    
</div>

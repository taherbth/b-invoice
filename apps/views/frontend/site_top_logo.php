<div style="position:relative;">
    <div id="colorchanger">
        <a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
        <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
        <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
    </div>
</div>
<!--LOGO-->
<div class="grid_8" id="logo"><a href="<?php echo base_url(); ?>admin"><?php echo $this->lang->line('site_logo');?></a>
<!-- Start: languagebg-->
			<div class="languagebg">
					<form name="langselect" id="langselect" method="post">                        
						<select name="site_language" onChange="document.langselect.submit()" class="selang"> 
							<option value="sv" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="sv"){?> selected="selected" <?php }?>> <?php echo $this->lang->line('sv_lang');?></option> 
							<option value="engus" <?php if($this->session->userdata('lang_file')!=""      && $this->session->userdata('lang_file')=="engus"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_us_lang');?></option> 
							<option value="enguk" <?php if($this->session->userdata('lang_file')!=""  && $this->session->userdata('lang_file')=="enguk"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_uk_lang');?></option> 
							<option value="ger" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="ger"){?> selected="selected" <?php }?>><?php echo $this->lang->line('ger_lang');?></option> 
							<option value="nor" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="nor"){?> selected="selected" <?php }?>><?php echo $this->lang->line('nor_lang');?></option> 
							<option value="den" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="den"){?> selected="selected" <?php }?>><?php echo $this->lang->line('den_lang');?></option> 
							<option value="fin" <?php if($this->session->userdata('lang_file')!=""         && $this->session->userdata('lang_file')=="fin"){?> selected="selected" <?php }?>><?php echo $this->lang->line('fin_lang');?></option> 
						</select>
					</form>
            </div> <!-- End: languagebg-->
</div>
          
<div class="grid_8">
    <!-- USER TOOLS START -->      
    <?php
        $num_of_inbox_message = $this->info_model->get_no_of_site_admin_contact_message();
    ?>
<div id="user_tools"><span><a href="<?php echo base_url(); ?>admin/info/inbox_contact_site_admin" class="mail" style='color:red;'>(<?php echo $num_of_inbox_message;?>)</a>
Logged in as <a href="#"><?php echo $this->session->userdata('username') ?></a> | <?php echo date('l, F d, Y'); ?> | <a href="<?php echo base_url(); ?>admin/home/logout">Logout</a></div>  
  <div id="user_tools"> <h2 style="color:#fff;">Administration Panel</h2></div>

</div>
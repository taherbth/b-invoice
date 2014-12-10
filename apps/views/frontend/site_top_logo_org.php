<!--LOGO-->
<div id="logo"><a href="<?php echo base_url(); ?>organization/info/home"><?php echo $this->lang->line('site_logo');?></a></div>
<div class="units-row">
			<div class="lang-selector unit-50">
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
            </div> <!-- end .lang-selector -->
<?php $organization = $this->info_model->get_organization_info_by_id($member_org); 
            if(count($organization)){
                $org_name = $organization[0]->org_name;
                $org_no = $organization[0]->org_number;
            }

?>
	
<div class="unit-50">  
	<div id="user_tools">
		<?php echo $this->session->userdata('user_name') ?>
		<a href="<?php echo base_url(); ?>organization/info/logout">Logout</a>
	</div>
	<div id="user_tools"> <h2 style="color:#fff;"><?php echo $org_name."($org_no)"; ?></h2>
	</div>
</div>
	
</div>



          


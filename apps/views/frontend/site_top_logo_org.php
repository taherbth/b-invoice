<header>
              
			<div class="header-inner" style="padding-top: 40px;">
				<div class="units-row">
					<div class="unit-20" style="color: #ffffff; size: 50px;">
					<a href=""> 
						<strong> b-invoice</strong>
					<!-- img src="<?php echo base_url(); ?>public/img/default-logo.png" / -->
					</a>
					</div>
				<div class="unit-20 unit-push-60">
					<nav class="login-menu">
						<ul>
							<li class="login-button"><a><img width="24" src="<?php echo base_url(); ?>public/img/icons/avatar-blank.png" /> <?php echo $this->session->userdata('username'); ?></a>
								<ul>
									<li><a class="icon-user" href="<?php echo base_url(); ?>organization/info/my_profile/<?php echo $mem_id = $this->session->userdata('mem_id'); ?>">My Profile</a></li>
									<li><a class="icon-edit" href="<?php echo base_url(); ?>organization/info/profile_setting_by_member/<?php echo $mem_id = $this->session->userdata('mem_id'); ?>">Profile Settings</a></li>
									<li><a class="icon-settings" href="<?php echo base_url(); ?>organization/info/system_configuration">System configuration</a></li>
									<li><a class="icon-logout" href="<?php echo base_url(); ?>organization/info/logout ">Logout</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				</div>
			</div><!-- end .header-inner -->
			<div style="background: #181e25;">
				<div class="header-inner units-row">
						<div class="unit-80">
						<nav {SITE_TOP_MENU}</nav>
						</div>
						<div class="unit-push-right">
						<!--
<nav id="langmenu">
						<ul>
							<form name="langselect" class="langselect" method="post">
							<li><button type="submit" value="sv" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="sv"){?> selected="selected" <?php }?>> <?php echo $this->lang->line('sv_lang');?></button></li>
							<li><button type="submit" value="engus" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""      && $this->session->userdata('lang_file')=="engus"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_us_lang');?></button></li>
							<li><button type="submit" value="enguk" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""  && $this->session->userdata('lang_file')=="enguk"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_uk_lang');?></button></li>
							<li><button type="submit" value="ger" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="ger"){?> selected="selected" <?php }?>><?php echo $this->lang->line('ger_lang');?></button></li>
							<li><button type="submit" value="nor" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="nor"){?> selected="selected" <?php }?>><?php echo $this->lang->line('nor_lang');?></button></li>
							<li><button type="submit" value="den" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="den"){?> selected="selected" <?php }?>><?php echo $this->lang->line('den_lang');?></button></li>
							<li><button type="submit" value="fin" class="selang button" name="site_language" <?php if($this->session->userdata('lang_file')!=""         && $this->session->userdata('lang_file')=="fin"){?> selected="selected" <?php }?>><?php echo $this->lang->line('fin_lang');?></button></li>
							</form>
						</ul>
						</nav>
-->
						<form name="langselect" class="langselect" method="post">                    
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
						</div>
				</div>
				</div>
		</header>

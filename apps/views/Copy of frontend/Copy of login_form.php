<?php

$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'class'	=> 'login-inp',
	'size'	=> 40,
	'value' => set_value('username')
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class'	=> 'login-inp',
	'size'	=> 40
);
$remember = array(
	'name'		=> 'remember',
	'id'		=> 'remember',
	'value'		=> 1,
	'checked'	=> set_value('remember'),
	'style' 	=> 'margin:0; padding:0'
);
$confirmation_code = array(
	'name'		=> 'captcha',
	'id'		=> 'captcha',
	'class'	=> 'login-inp',
	'maxlength'	=> 8,
	'size'		=> 40
);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/screen.css" />

<style>
</style>
<div></div>
<?php echo form_open($this->uri->uri_string()); ?>
<div style="margin-left:20px; margin-top:10px; padding-left:320px; font-weight:bold; color:#FF0000;"><?php echo ucwords($this->dx_auth->get_auth_error()); ?></div>
<div class="n" style="width:508px; margin:0 auto;  height:212px; -moz-border-radius:10px;">
<p></p>
<p></p>
   <table align="center"   style=" border-collapse:collapse">

        <tr height="10"><td colspan="3"></td></tr>
        <tr>
        <td align="left" valign="top" style=""><?php echo form_label('User Name', 'username'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td>
	        <?php echo form_input($username); ?>
            <span class="markcolor"><?php echo ucwords(form_error($username['name'])); ?></span>
        </td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
        <td align="left" valign="top"><?php echo form_label('Password', 'password'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td>
	        <?php echo form_password($password); ?>
            <span class="markcolor"><?php echo ucwords(form_error($password['name'])); ?></span>
        </td>
        </tr>
<?php /*?>	 <?php if($show_captcha): ?>
        <tr><td colspan="3">Enter the code exactly as it appears. There is no zero</td></tr>
        <tr><td colspan="3"><?php echo $this->dx_auth->get_captcha_image(); ?></td></tr>
        <tr>
        <td align="left" valign="top"><?php echo form_label('Confirmation Code', 'confirmation_code'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td  valign="top">
		  <?php echo form_input($confirmation_code); ?>
          <span class="markcolor"><?php echo ucwords(form_error($confirmation_code['name'])); ?></span>
        </td>
        </tr>
     <?php endif; ?><?php */?>
        <tr><td colspan="3"></td></tr>
        <tr>
        <td colspan="2"></td>
        <td>
        <?php echo form_checkbox($remember); ?>
		<?php echo form_label(nbs(1).'Remember me', $remember['id']); ?> 
       </td></tr>
        <tr><td colspan="3"></td></tr>
        <tr>
        <td colspan="2"></td>
        <td>
        <?php echo form_submit('login', 'Sign in', 'class="button2"'); ?>
        </td>
        </tr>
   </table>
</div>
<?php echo form_close(); ?>

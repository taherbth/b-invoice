<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' =>  '',
    'style' => 'border:1px solid #CCC;'	
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' =>  '',
    'style' => 'border:1px solid #CCC;'	
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 50,
	'value' => '',
    'style' => 'border:1px solid #CCC;'	

);
?>


<?php echo form_open_multipart("admin/info/changed_password"); ?>
 <?php echo $this->session->flashdata('message'); ?>
 

<fieldset>
<legend align="left">Account Password Change</legend>
   <table align="center" width="80%"> 
         
          <tr><td colspan="3"></td></tr>
         <tr>
        <td align="left" valign="top"><?php echo form_label('Zone '); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td>
				<?php 
                $query=$this->db->query("select id,zone from zone");
                ?>
		   <select name="zone" id="zone1"  style="width:130px;">
             <option value="">select</option>
             <?php foreach($query->result() as $info32):?>
            
             <option value="<?php echo $info32->id;?>"><?php echo $info32->zone;?></option>
             <?php  endforeach;?>
           </select>
            <span class="markcolor"><?php echo ucwords(form_error('zone')); ?></span>
        </td>
        </tr>
         <tr><td colspan="3"></td></tr>
         
         <tr><td colspan="3"></td></tr>
         <tr>
        <td align="left" valign="top"><?php echo form_label('Account Number '); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td>
		  <div id="res"></div>
            <span class="markcolor"><?php echo ucwords(form_error('acc_no')); ?></span>
        </td>
        </tr>
         <tr><td colspan="3"></td></tr>
         
           
        <tr><td colspan="3"></td></tr>
        <tr>
        <td align="left" valign="top"><?php echo form_label('Old Password'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td  valign="top">
		    <?php echo form_password($old_password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('old_password')); ?></span>
           
        </td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr>
        <td align="left" valign="top"><?php echo form_label('New Password'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td  valign="top">
		    <?php echo form_password($password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>
           
        </td>
        </tr>
        <tr><td colspan="3"></td></tr>
        
        <tr>
        <td align="left" valign="top"><?php echo form_label('Confirm New Password'); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td  valign="top">
		    <?php echo form_password($confirm_password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('confirm_password')); ?></span>
           
        </td>
        </tr>
        
        <tr><td colspan="3"></td></tr>
       
      <tr><td colspan="3"></td></tr>
       
         <tr>
        <td colspan="2"></td>
        <td>
        <?php //echo form_submit('save', 'Save'); ?> 
		<input type="submit" name="save" value="" class="submit" />
		<input type="reset" value="" class="cancel" />
	
        </td>
        </tr>  
       
   </table>

 </fieldset>
<?php echo form_close(); ?>
<fieldset>
</fieldset>


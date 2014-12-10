<?php
foreach($userLists as $userList):
		 //$dept_id = $userList->dept_name;
		 $emp_id  = $userList->emp_name;
		// $this->data['deptValues'] = $this->Shows->getThisValue("add_department.id ='$dept_id'", 'add_department'); 
		// $this->data['empValues'] = $this->Shows->getThisValue("employeeinfo.id ='$emp_id'", 'employeeinfo'); 
endforeach;

$checkbox1 = array(
    'name'        => 'sale_prev',
    'id'          => 'sale_prev',
    'value'       => 1,
    'checked'     => (!empty($userList->sale_prev)) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );
$checkbox2 = array(
    'name'        => 'engineering_prev',
    'id'          => 'engineering_prev',
    'value'       => 1,
    'checked'     => (!empty($userList->engineering_prev)) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );
$checkbox3 = array(
    'name'        => 'commercial_prev',
    'id'          => 'commercial_prev',
    'value'       => 1,
    'checked'     => (!empty($userList->commercial_prev)) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );
$checkbox4 = array(
    'name'        => 'hr_prev',
    'id'          => 'hr_prev',
    'value'       => 1,
    'checked'     => (!empty($userList->hr_prev)) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );
	
$checkbox5 = array(
    'name'        => 'configuration_prev',
    'id'          => 'configuration_prev',
    'value'       => 1,
    'checked'     => (!empty($userList->configuration_prev)) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );

?>

<h2><?php echo $windowTitle; ?></h2>

<p></p>

<?php echo form_open($this->uri->uri_string()); ?>
<?php echo ucwords($this->dx_auth->get_auth_error()); ?>
<fieldset>
<legend align="left">User Info</legend>
   <table align="center" width="80%"> 
		
        
        <tr><td colspan="3"></td></tr>
        <tr>
        <td align="left" valign="top"><?php echo form_label('Employee Name'); ?><span class="markcolor"></span></td>
        <td valign="top">:</td>
        <td>
          <?php // if(count($this->data['empValues'])): foreach($this->data['empValues'] as $empValue): echo ucwords($empValue->name); endforeach; endif; ?> 
           <?php echo $emp_id;?>
                 </td>
        </tr>
        
        <tr><td colspan="3"><?php echo form_hidden('id', $userList->id); ?></td></tr>
        <tr>
        <td colspan="3"></td>
        </tr>
        <tr>
        <td align="left" valign="top" style="font-weight:bold; font-size:13px;"><?php echo form_label('User Privilege Options '); ?><span class="markcolor">*</span></td>
        <td valign="top">:</td>
        <td valign="top">
		<?php echo form_checkbox($checkbox5).' Configuration'.form_checkbox($checkbox1).' Sales '.form_checkbox($checkbox2).' Engineering'.form_checkbox($checkbox3).' Commercial'.form_checkbox($checkbox4).' Human Resource'; ?>
        </td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
        <td colspan="2"></td>
        <td>
        <?php //echo form_submit('save', 'Save'); ?> 
				<input type="submit" value="" class="submit" name="save"/>
		<input type="button" value="Cancel" class="button1"/>
	
        </td>
        </tr>
   </table>

 </fieldset>

<?php echo form_close(); ?>

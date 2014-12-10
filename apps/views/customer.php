<script language="javascript" src="<? echo base_url(); ?>public/js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#user_name').blur(function(){
	if($('#user_name').val())
		$.post('<? echo base_url(); ?>/index.php/reseller/check_user_name',{name: $('#user_name').val()},function(data){
			if(data=='unavailable')
			{
				$('#available').hide();
				$('#unavailable').show();
				$('#user_name').select();
			}
			if(data=='available')
			{
				$('#unavailable').hide();
				$('#available').show();
			}
		});
	});
});
</script>
<style>
#unavailable{
color:#FF0033;
display:none}
#available{
color:#0000CC;
display:none}
</style>

<?  
if((!isset($_SESSION['user'])) or (!isset($_SESSION['reseller_logged_in'])))
{
	session_start();
}
//session_start();

	if (!$_SESSION['reseller_logged_in'])
	    {
	        redirect('signin');
	    }
		
		$this->load->view("reseller/header");
?>


<!-- Content Starts Here -->
<div>
   <br />
          <br />

<?PHP
$number=rand(1,99999999999);
$id = substr($number,0,4);

$currency      = array('BDT'=>'BDT',
                    'USD'=>'USD',
					'EURO'=>'EURO');  
			 		
?>	

<br />
<fieldset>
<legend>Enter Customer Information</legend>
<?php

$d = date('Y-m-d');

echo form_open('reseller/create_customer');
?>
<td><input type="hidden" name="regi_date" value="<? echo date("Y/m/d"); ?>" class="text" />
<?
echo form_hidden('id', set_value('id', $id));
echo form_hidden('balance', set_value('balance', '0.0'));
echo '<table width="400">
<tr>
<th>User Name :</th>';
echo '<td>'.form_input('user','','id="user_name"').'<span style="color:red;">*</span><div id="unavailable">Unavailable</div><div id="available">Available</div></td></tr>';
echo '<tr><th>Password :</th><td>'.form_password('pass').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Confirm Password :</th><td>'.form_password('pass2').'<span style="color:red;">*</span></td></tr>';

	$query = $this->db->query('SELECT id FROM reseller where user = "'.$_SESSION['user'].'"');
//$row=$query->result_array();

	foreach ($query->result() as $row)
	{
	  echo "<input type = 'hidden' name = 'reseller_id' value='".$row->id."' >";
	}

//echo '<tr><td>Provider Company :</td><td>'.form_input('provider_company').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Name :</th><td>'.form_input('name').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Company Name :</th><td>'.form_input('company').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Address :</th><td>'.form_input('address').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Country :</th><td>'.form_input('country').'<span style="color:red;">*</span></td></tr>';
echo '<tr><th>Email :</th><td>'.form_input('email').'<span style="color:red;">*</span></td></tr>'; ?>




<? //echo '<tr><td>Registration Date :</td><td>'.form_input('regi_date').' yyyy/mm/dd</td></tr>';

echo '<tr><th>Discount :</th><td>'.form_input('discount', set_value('discount', '0')).'<span style="color:red;">*</span> % </td></tr>';
echo '<tr><th>Commission :</th><td>'.form_input('commission', set_value('commission', '0')).'<span style="color:red;">*</span> % </td></tr>';
echo '<tr><th>Currency :</th><td>'.form_dropdown('currency',$currency).'<span style="color:red;">*</span></td></tr>';
echo '<tr><th></th><td>'.form_submit('mysubmit','SAVE').'</td></tr>';
echo '</table>';
echo form_close(); 
?>
<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
<!-- Clear -->
<br>
<?
$this->load->view("reseller/footer");
?>
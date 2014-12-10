<h3 class="content_edit">Org Admin Control Panel Change Password</h2>
<style>
td a:hover{ color:#990033}
#message1{ color:red}
</style>

<style>
    input {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'size'	=> 50,
	'value' =>  '',
    
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 50,
	'value' =>  '',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 50,
	'value' => '',
);
?>

<?php echo form_open("organization/info/changed_password"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px;  font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
          
            <tr>
                <td width="38%" style=" text-align:left;padding-left:45px"><font class="inside">Old Password:</font></td>
                <td width="33%">
		    <?php echo form_password($old_password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('old_password')); ?></span>
                </td>
            </tr>
               <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left;padding-left:45px"><font class="inside">New Password:</font></td>
                <td width="33%">
		    <?php echo form_password($password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left;padding-left:45px"><font class="inside">Confirm New Password:</font></td>
                <td width="33%">
		    <?php echo form_password($confirm_password); ?>
            <span class="markcolor"><?php echo ucwords(form_error('confirm_password')); ?></span>
                </td>
            </tr>
        </tbody></table>
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">


                </td>

            </tr>
            <tr>
                <td width="38%"><td width="33%">
     <input type="submit" name="update" value="Update" />
                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


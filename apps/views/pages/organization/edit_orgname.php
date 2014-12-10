<?php
$query = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
td a:hover{ color:#990033}
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

<?php echo form_open("organization/info/edit_org_name"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
             <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside">Organization Name:</font></td>
                <td width="33%"><input style="background-color:#CCCC99" type="text" size="30" maxlength="20" value="<?php echo $p_info->org_name ;?>" name="org_name" tabindex="2">
                <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
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
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Update" class="submit" type="image">
                </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


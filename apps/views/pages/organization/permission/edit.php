<h3 class="content_edit">Org Admin Control Panel Modify Group Permission</h2>

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
$sending_email = array(
    '1' => 'Yes',
    '2' => 'No'
);
$sending_sms = array(
    '1' => 'Yes',
    '2' => 'No'
);
$sending_post = array(
    '1' => 'Yes',
    '2' => 'No'
);
$profile = array(
    '1' => 'Public',
    '2' => 'Private'
);
$message = array(
    '1' => 'Public',
    '2' => 'Private'
);
?>
<?php echo form_open("organization/info/update_group"); ?>
<?php echo $this->session->flashdata('message'); ?>
<?php foreach ($record as $info):
endforeach; ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Group Name:</font></td>
                <td width="33%">
                    <?php
                    $query = $this->db->query("select group_name from org_group where id='" . $info->group_id . "'");
                    foreach ($query->result() as $p) {
                        $g_name = $p->group_name;
                    }

                    if (!empty($g_name)):$g_name = $g_name;
                    else:$g_name = "";
                    endif;
                    ?>
                    <select name="group_name" style="width:150px">
                        <option value="<?php echo $info->group_id; ?>"><?php echo $g_name; ?></option>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('group_name')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Email:</font></td>
                <td width="33%"><?php echo form_dropdown('sending_email', $sending_email, $info->sending_email, 'style=width:150px'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Sms:</font></td>
                <td width="33%"><?php echo form_dropdown('sending_sms', $sending_sms, $info->sending_sms, 'style=width:150px'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Sending Post:</font></td>
                <td width="33%"><?php echo form_dropdown('sending_post', $sending_post, $info->sending_post, 'style=width:150px'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('sending_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Profile:</font></td>
                <td width="33%"><?php echo form_dropdown('profile', $profile, $info->profile, 'style=width:150px'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('profile')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Message:</font></td>
                <td width="33%"><?php echo form_dropdown('message', $message, $info->message, 'style=width:150px'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('message')); ?></span> 
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
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


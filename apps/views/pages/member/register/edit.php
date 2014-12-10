<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
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
<?php foreach ($record as $org_info):
endforeach; ?>
<?php echo form_open_multipart("organization/info/update_profile"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="28%"><font class="inside">Organization Primary Address:</font></td>
                <td width="33%"><input type="text" size="30"  value="<?php echo $org_info->org_primary_address; ?>" name="org_primary_address" >
                    <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="28%"><font class="inside">Organization optional Address:</font></td>
                <td width="33%"><input type="text" size="30"  value="<?php echo $org_info->org_optional_address; ?>" name="org_optional_address">
                    <span class="markcolor"><?php echo ucwords(form_error('org_optional_address')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="28%"><font class="inside">Organization Phone:</font></td>
                <td width="33%"><input type="text" size="30"  value="<?php echo $org_info->org_phone; ?>" name="org_phone">
                    <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="28%"><font class="inside">Organization Logo:</font></td>
                <td width="33%"><input type="file" size="30"  name="photo1">
                    <span class="markcolor"><?php echo ucwords(form_error('photo1')); ?></span> 
                </td>
            </tr>
            <?php $query = $this->db->query("select * from org_type"); ?>
            <tr>
                <td width="28%"><font class="inside">Organization Type:</font></td>
                <td width="33%">
                    <select name="org_type" style="width:150px">
                        <option value="">Select</option>
                        <?php foreach ($query->result() as $a): ?>
                            <option <?php if ($org_info->org_type == $a->org_type): ?> selected="selected" value="<?php echo $org_info->org_type; ?>" <?php else: ?> value="<?php echo $a->id; ?>"<?php endif; ?>><?php echo $a->org_type; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('org_type')); ?></span> 
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
                <td width="30%"><td width="33%">
                    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


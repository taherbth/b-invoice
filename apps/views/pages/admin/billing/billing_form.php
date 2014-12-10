<h3 class="content_edit">Admin Control Panel View Sms And letter Bill </h2>
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
    .style1 {color: #FF3333}
	input[type="text"] {
    display: inline !important;
}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"end_date",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"start_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php echo form_open("admin/info/viewed_org_bill"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%" height="35" style="text-align:left;padding-left:180px"><font class="inside">Start Date:</font></td>
  <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("start_date"); ?>" name="start_date"  id="start_date" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('start_date')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:center"></td>
                <td width="33%">
                </td>

            </tr>
            <tr style="padding-top:7px">
                <td width="38%" height="32" style="text-align:left;padding-left:180px"><font class="inside">End Date:</font></td>
          <td width="38%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("end_date"); ?>" name="end_date"  id="end_date" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('end_date')); ?></span> 
                </td>

            </tr>
            <?php
            $user_id = $this->session->userdata('user_id');
            $query1 = $this->db->query("select * from user_info  where approval_status=2 && login_status=2");
            ?>
                  <tr>
                <td width="38%" style="text-align:center"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left;padding-left:180px"><font class="inside">Organization Name:</font></td>
                <td width="33%">
                    <select name="org_name" style="width:190px">
                        <option value="">Select</option>
                        <?php foreach ($query1->result() as $info1): ?>
                            <option value="<?php echo $info1->id; ?>"><?php echo $info1->org_name; ?>(<?php echo $info1->org_number; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> </td>

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


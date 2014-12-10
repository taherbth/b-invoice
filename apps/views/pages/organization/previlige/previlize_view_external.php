<h3 class="content_edit">Org Admin Control Panel Modify external Users Settings</h2>

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
    .inside{}
	.previlize a{ color:#009966; font-weight:bold;}
	.previlize a:hover{ color: #990033; font-weight:bold;}
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
<script>
    function getSubCat1(val)
    {
        url="<?php echo base_url(); ?>get_username.php?cid="+val;
        try
        {// Firefox, Opera 8.0+, Safari, IE7
            xm=new XMLHttpRequest();
        }
        catch(e)
        {// Old IE
            try
            {
                xm=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e)
            {
                alert ("Your browser does not support XMLHTTP!");
                return;
            }
        }		
        xm.open("GET",url,false);
        xm.send(null);
        msg=xm.responseText;
		
        document.getElementById("availability_status").innerHTML=msg;				
    }
</script>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
</script>
<?php 
$query1 = $this->db->query("select * from org_external_previlige where org_id ='" . $this->session->userdata('user_id') . "'");
if ($query1->num_rows() == 0) {
    echo "<font style='color:red'>No previlization exists for this organization</font>";
} else {
    foreach ($query1->result() as $previlize_info):
    endforeach;?>
    <?php echo form_open("organization/info/update_external_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
              <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                <tbody>
                    <tr>
                        <td width="45%"><font class="inside" style="font-weight:bold; color:green">External Users
                            </font></td>
                        <td width="33%">
                        </td>
                    </tr>
                   <tr>
                        <td width="45%"><font class="inside">Access main-board (review the articles) </font></td>
                        <td width="33%">
                         <?php if ($previlize_info->external_mainboard == '1'): ?>
                            <input id="x" type="checkbox" name="external_mainboard" checked="checked" value="1" />
                           <?php else: ?>
                            <input id="x" type="checkbox" name="external_mainboard" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                     <tr>
                        <td width="45%"><font class="inside">View organization presentation site</font></td>
                        <td width="33%">
                           <?php if ($previlize_info->external_presentation == '1'): ?>
                            <input id="x" type="checkbox" name="external_presentation" checked="checked" value="1" />
                           <?php else: ?>
                            <input id="x" type="checkbox" name="external_presentation" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                </tbody></table>
        </div> 
        
        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Update" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div>
    <?php
    echo form_close();
}
?>
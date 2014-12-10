<h3 class="content_edit">Org Admin Control Panel View Internal Users Previlization Setting</h2>
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
    <?php echo form_open("organization/info/viewed_org_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
            <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                <tbody>
                    <tr>
                        <td width="10%"><font class="inside">User Type </font></td>
                        <td width="45%">
                            <?php
                            $query = $this->db->query("select * from user_type where  org_id='" . $this->session->userdata('user_id') . "'");
                            ?>
                            <select name="user_type" style="width:150px">
                                <option value="">Select</option>
                                <?php foreach ($query->result() as $info): ?>
                                    <option value="<?php echo $info->id; ?>"><?php echo $info->user_type; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="markcolor"><?php echo ucwords(form_error('user_type')); ?></span>
                        </td>

                    </tr>

                </tbody></table> 

        </div> 
        
        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Submit" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div>
    <?php
    echo form_close();

?>
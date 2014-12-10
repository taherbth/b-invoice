<h3 class="content_edit">Org Admin Control Panel Send sms to internal Users</h2>
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
    ul{ list-style:none}
    .style1 {color: #FF0000}
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
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
								
</script>
<script>
    function check($id)
    {
        var myvar = document.getElementById("member_check"+$id).checked;
        if(myvar)
        {
            $("#member"+$id).show();
            $("#group_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_id"+$id+":checked").each(function(){
                this.checked = false;
            });

            $("#group_check"+$id).removeAttr("disabled");
            $("#member"+$id).hide();							   
        }
    }
    function check1($id)
    {
        var myvar = document.getElementById("group_check"+$id).checked;
        if(myvar)
        {
            $("#member_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_check"+$id).removeAttr("disabled");
        }
    }
</script>
<?php echo form_open("organization/sms/added_sms"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 900px;">
        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">

            <tbody>

                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result1"></div>
                    </td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align:middle"><font class="inside">Sms Content<span class="style1">* </span></font></td>
                    <td width="45%">
                        <textarea rows="5" name="sms_content" cols="40" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>
                        <span class="markcolor"><?php echo ucwords(form_error('sms_content')); ?></span>
                    </td>

                </tr>

                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result2"></div>
                    </td>
                </tr> 
                <?php $q = $this->db->query("select * from org_group where org_id='" . $this->session->userdata('user_id') . "'"); ?>
                <tr>
                    <td valign="top" style="padding-top: 12px;">Send To:<span class="style1">* </span></td>
                    <td>
                        <?php
                        foreach ($q->result() as $info):
                            $m3 = $this->db->query("select * from member where member_group='" . $info->id . "'");
							if($m3->num_rows()>0):
						    ?>
                            <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                                    <?php echo $info->group_name; ?>:</p>
                            <p>
                                <input type="checkbox" id="member_check<?php echo $info->id; ?>"  onClick="return check(this.value);"  value="<?php echo $info->id; ?>" />Select Member
                                Or <input type="checkbox" id="group_check<?php echo $info->id; ?>" onClick="return check1(this.value)"  name="checkbox1[]" value="<?php echo $info->id; ?>"/>All 
                            </p>
                            <?php
                            $a = $info->id;
                            $m = $this->db->query("select * from member where member_group='" . $a . "'");
                            ?>
                            <div  id="member<?php echo $info->id; ?>" style="display:none;width:570px; background-color:#999999; color:white; font-weight:bold; padding-left:30px;">
                                <?php foreach ($m->result() as $info1): ?>
                                    <p><input type="checkbox" name="checkbox[]" id="member_id<?php echo $info->id; ?>"    value="<?php echo $info1->id; ?>" /><?php echo $info1->name; ?> </p>
                                <?php endforeach; ?> 
                            </div>
                        <?php endif;endforeach; ?>
                    </td>
                </tr>

            </tbody></table> 
        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Send" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div>
     </div>
    <?php echo form_close(); ?>

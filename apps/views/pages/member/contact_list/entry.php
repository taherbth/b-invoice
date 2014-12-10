<h3 class="content_edit">Member Control Panel  Create Contact List</h2>
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
<?php
$query = $this->db->query("select * from member_previlige where user_type='".$this->session->userdata("user_type")."'");
foreach ($query->result() as $info):
endforeach;
?>
 <?php if ($info->configuration_create_address == '1'): ?>
<?php echo form_open("org_member/sms/added_address"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 916px;">
        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="10%"><font class="inside">Name</font></td>
                    <td width="45%">
                     <input name="name" style="width:200px;height:30px" class="" type="text">
                       <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span>
                    </td>

                </tr>
                <tr>
                    <td width="10%"><font class="inside">Contact No</font></td>
                    <td width="45%">
                       <!-- <input name="letter_text" style="width:200px" class="" type="text">-->
                       <input name="contact_no" style="width:200px; height:30px" class="" type="text">
                        <span class="markcolor"><?php echo ucwords(form_error('contact_no')); ?></span>
                    </td>

                </tr>
              
            </tbody></table> 

 
        </table>

        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Save" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div> </div>
<?php echo form_close(); ?>
<?php endif;?>
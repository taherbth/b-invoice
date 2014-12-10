<h3 class="content_edit">Member Control Panel  Send Post to other member</h2>
<?php
$query1 = $this->db->query("select * from member_previlige where user_type='".$this->session->userdata("user_type")."'");
foreach ($query1->result() as $p_info):
endforeach;
?>
<?php $q = $this->db->query("select * from member where org_id='" . $this->session->userdata('member_org') . "'"); ?>
<?php foreach ($q->result() as $p):
endforeach; ?>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
								
</script>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>
     <fieldset>
      <legend align="left">Send Post</legend>
<table width="98%" border="1" cellpadding="0" cellspacing="0" align="center">
    <thead>
        <tr>
            <th style="text-align: center">SL No</th>   
            <th style="text-align: center">Member Name</th> 
            <th style="text-align: center">Member Email</th>        
            <td style="text-align: center"> All:<input type="checkbox" onClick="checkAll(this)"><br></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($q->result() as $p):
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            if ($p->id != $this->session->userdata('id')):
                ?>
                <tr bgcolor="<?php echo $color; ?>">
                    <td style="text-align: center"><?php echo $i; ?></td>
                    <td style="text-align: center"><?php echo $p->name; ?></td>
                    <td style="text-align: center"><?php echo $p->email; ?></td>
                    <td style="text-align: center">
                        <?php echo form_open('org_member/info/added_sending_post'); ?>
                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
                        <input id="a" type="checkbox"  name="checkbox[]"  value="<?php echo $p->id; ?>" />

                    </td>
                </tr>  
                <?php
                $i = $i + 1;
            endif;
        endforeach;
        ?>
    </tbody>
</table>
<table  border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:10px">
   <?php if($p_info->communication_send_email=='1'):?>
    <tr>
        <TD>Send By Email &nbsp;&nbsp;&nbsp;</TD>
        <TD><select name="send_by_email" style="background: none repeat scroll 0 0 #CCCCCC; width:150px">
                <option value="1">No</option>
                <option value="2">Yes</option>
            </select>
        </TD>
    </tr>
    <?php endif;?>
    <tr>
        <TD></TD>
        <TD></TD>

    </tr> 
    
</table>
<table  border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:30px">
    <tr>
        <TD><input type="submit" name="send" value="Send"></TD>
    </tr>
</table>
</fieldset>
<?php echo form_close(); ?>
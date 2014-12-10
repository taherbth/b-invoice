<?php $q = $this->db->query("select * from member where org_id='" . $this->session->userdata('member_org') . "'and member_group='" . $this->session->userdata('member_group') . "'"); ?>
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
<table width="95%" border="1" cellpadding="0" cellspacing="0" align="center">
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

    <tr>
        <TD>Send By Email &nbsp;&nbsp;&nbsp;</TD>
        <TD><select name="send_by_email" style="background: none repeat scroll 0 0 #CCCCCC; width:150px">
                <option value="1">No</option>
                <option value="2">Yes</option>
            </select>
        </TD>
    </tr>
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
<?php echo form_close(); ?>
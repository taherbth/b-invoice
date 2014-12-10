<h3 class="content_edit">Org Admin Control Panel  Previlization Setting For external Users</h2>
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
//$this->session->userdata('user_id');
$query1 = $this->db->query("select * from org_previlige where org_id ='" . $this->session->userdata('user_id') . "'");
if ($query1->num_rows() == 0) {
    echo "<font style='color:red'>No previlization exists</font>";
} else {
    foreach ($query1->result() as $previlize_info):
    endforeach;
	
	$q1=$this->db->query("select * from org_external_previlige where org_id='".$this->session->userdata('user_id')."'");
    ?>
    <?php echo form_open("organization/info/added_external_previlige"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
            

        </div> 
        <div class="infobox_right" style="width: 900px;">
            <div style="width:420px; float:left; position:relative; ">
             <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
              
              <?php if($q1->num_rows()==0):?>
                <tbody>
                    <tr>
                        <td width="45%"><font class="inside" style="font-weight:bold; color:green">External Users
                            </font></td>
                        <td width="33%">
                        </td>
                    </tr>
                   <?php if ($previlize_info->external_mainboard == '1'): ?> 
                   <tr>
                        <td width="45%"><font class="inside">Access main-board (review the articles) </font></td>
                        <td width="33%">
                            <input id="x" type="checkbox" name="external_mainboard" value="1" />
                        </td>
                    </tr> 
                    <?php endif; ?>
                   <?php if ($previlize_info->external_presentation == '1'): ?> 
                     <tr>
                        <td width="45%"><font class="inside">View organization presentation site</font></td>
                        <td width="33%">
                            <input type="checkbox" name="external_presentation" value="1" />
                        </td>
                    </tr> 
                    <?php endif; ?>
                     <tr>
                        <td width="45%"><font class="inside">Contact With OrgAdmin</font></td>
                        <td width="33%">
                            <input type="checkbox" name="external_contact" value="1" />
                        </td>
                    </tr> 
                     <tr>
                        <td width="45%"><font class="inside">View Archive Article</font></td>
                        <td width="33%">
                            <input type="checkbox" name="external_archive_article" value="1" />
                        </td>
                    </tr> 
                </tbody>
                <?php else:
				 foreach($q1->result() as $e_info):				 				 
				 endforeach;				
				?>
                <tbody>
                    <tr>
                        <td width="45%"><font class="inside" style="font-weight:bold; color:green">External Users
                            </font></td>
                        <td width="33%">
                        </td>
                    </tr>
                   <?php if ($previlize_info->external_mainboard == '1'): ?> 
                   <tr>
                        <td width="45%"><font class="inside">Access main-board (review the articles) </font></td>
                        <td width="33%">
                          <?php if ($e_info->external_mainboard == '1'): ?> 
                            <input id="x" type="checkbox" checked="checked" name="external_mainboard" value="1" />
                            <?php else:?>
                             <input id="x" type="checkbox" name="external_mainboard" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                    <?php endif; ?>
                   <?php if ($previlize_info->external_presentation == '1'): ?> 
                     <tr>
                        <td width="45%"><font class="inside">View organization presentation site</font></td>
                        <td width="33%">
                         <?php if ($e_info->external_presentation == '1'): ?> 
                            <input type="checkbox" checked="checked" name="external_presentation" value="1" />
                             <?php else:?>
                             <input id="x" type="checkbox" name="external_presentation" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                    <?php endif; ?>
                    <tr>
                        <td width="45%"><font class="inside">Contact With OrgAdmin</font></td>
                        <td width="33%">
                         <?php if ($e_info->external_contact == '1'): ?> 
                            <input type="checkbox" checked="checked" name="external_contact" value="1" />
                             <?php else:?>
                             <input id="x" type="checkbox" name="external_contact" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                    <tr>
                        <td width="45%"><font class="inside">View Archive Article</font></td>
                        <td width="33%">
                         <?php if ($e_info->external_archive_article  == '1'): ?> 
                            <input type="checkbox" checked="checked" name="external_archive_article" value="1" />
                             <?php else:?>
                            <input id="x" type="checkbox" name="external_archive_article" value="1" />
                            <?php endif;?>
                        </td>
                    </tr> 
                </tbody>
                <?php endif;?>
                </table>

            </div>
            <div style="width:420px; float:left; position:relative;">
               
            </div>
        </div>
        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="save" style="width:100px; color:black; font-size:13px" />

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
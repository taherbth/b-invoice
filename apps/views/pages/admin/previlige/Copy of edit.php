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
<p class="previlize" style="width:850px; text-align:right; margin:0; padding:20px; height:10px"><a href="<?php echo base_url(); ?>admin/info/view_org_previlize"><span>
            <button name="archive" value="archive">View Previlize</button>
        </span></a></p>
<?php
//$this->session->userdata('user_id');
$query1 = $this->db->query("select * from org_previlige where org_id ='" . $org_id . "'");
//echo "<pre>";print_r($query1->result());die();
if ($query1->num_rows() == 0) {
    echo "<font style='color:red'>No previlization exists for this organization</font>";
} else {
    foreach ($query1->result() as $info):
    endforeach;
    ?>
    <?php echo form_open("admin/info/update_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
            <?php
            $u = $this->db->query("select org_name from user_info where id ='" . $org_id . "'");
            foreach ($u->result() as $t):
                $org_name = $t->org_name;
            endforeach;
            ?>

            <input type="hidden" name="org_id" value="<?php echo $org_id; ?>" />
            <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                <tbody>
                    <tr>
                        <td width="10%"><font class="inside">Organization Name </font></td>
                        <td width="45%">
                            <input type="text" readonly="readonly" value="<?php echo $org_name; ?>" />                        </td>

                    </tr>

                </tbody></table> 

        </div> 
        <div class="infobox_right" style="width: 900px;">
            <div style="width:420px; float:left; position:relative; ">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>

                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Main Board</font>
                            </td>
                            <td width="33%">
                                <input  type="checkbox"  onClick="checkAll(this)"> All
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Access main-board (review the articles) </font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_access_main == '1'): ?>
                                    <?php $m = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_access_main=1");
                                    if ($m->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_access_main"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_access_main"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_access_main"  checked="checked" value="1" />
                                    <?php endif; ?>
                                <?php else: ?>
                                    <input id="x" type="checkbox" name="mainboard_access_main"  value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send proposal for article to be posted at main-board </font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_send_proposal == '1'): ?>
                                <?php $m1 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_send_proposal=1");
                                    if ($m1->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_send_proposal"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_send_proposal"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_send_proposal"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input id="x" type="checkbox" name="mainboard_send_proposal" value="1" />

                                <?php endif; ?>

                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Create/change articles and send notification</font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_change_article == '1'): ?>
                                <?php $m2 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_change_article=1");
                                    if ($m2->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_change_article"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_change_article"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_change_article"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input id="x" type="checkbox" name="mainboard_change_article" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send notification of new articles via Email/SMS (only notifications)</font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_send_notification == '1'): ?>
                                <?php $m3 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_send_notification=1");
                                    if ($m3->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_send_notification"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_send_notification"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_send_notification"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input id="x" type="checkbox" name="mainboard_send_notification" value="1" />

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Sending out the whole article through real letter</font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_sending_out == '1'): ?>
                                <?php $m4 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_sending_out=1");
                                    if ($m4->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_sending_out"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_sending_out"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_sending_out"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input id="x" type="checkbox" name="mainboard_sending_out" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Manually archive articles at main-board </font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_manually_archive == '1'): ?>
                                <?php $m5 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and mainboard_manually_archive=1");
                                    if ($m5->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_manually_archive"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="mainboard_manually_archive"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="mainboard_manually_archive"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input  type="checkbox" name="mainboard_manually_archive" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>

                    </tbody></table>

                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Forum</font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Access the forum </font></td>
                            <td width="33%">
                                <?php if ($info->forum_access == '1'): ?>
                                <?php $m6 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and forum_access=1");
                                    if ($m6->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="forum_access"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="forum_access"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_access"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="forum_access" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Make comments</font></td>
                            <td width="33%">
                                <?php if ($info->forum_comments == '1'): ?>
                                <?php $m7 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and forum_comments=1");
                                    if ($m7->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="forum_comments"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="forum_comments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_comments"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="forum_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                           <td width="45%"><font class="inside">Delete ones owns comments</font></td>
                            <td width="33%">
                                <?php if ($info->forum_delete_won_comments == '1'): ?>
                                <?php $m8 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and forum_delete_won_comments=1");
                                    if ($m8->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="forum_delete_won_comments"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="forum_delete_won_comments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_delete_won_comments"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="forum_delete_won_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Delete any comments</font></td>
                            <td width="33%">
                                <?php if ($info->forum_delete_any_coments == '1'): ?>
                                <?php $m9 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and forum_delete_any_coments=1");
                                    if ($m9->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="forum_delete_any_coments"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="forum_delete_any_coments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_delete_any_coments"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="forum_delete_any_coments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">manually archive comments</font></td>
                            <td width="33%">
                                <?php if ($info->forum_manual_comments == '1'): ?>
                                <?php $m10 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and forum_manual_comments=1");
                                    if ($m10->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="forum_manual_comments"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="forum_manual_comments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_manual_comments"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="forum_manual_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>

                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Members own account
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><font class="inside">Log in/Log out </font></td>
                            <td width="45%" style="padding-left:70px">
                                <?php if ($info->member_login_logout == '1'): ?>
                                <?php $m11 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and member_login_logout=1");
                                    if ($m11->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="member_login_logout"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="member_login_logout"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="member_login_logout"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="member_login_logout" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Add/change profile info</font></td>
                            <td width="33%" style="padding-left:70px">
                                <?php if ($info->member_change_profile == '1'): ?>
                                <?php $m12 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and member_change_profile=1");
                                    if ($m12->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="member_change_profile"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="member_change_profile"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="member_change_profile"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="member_change_profile" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Change password</font></td>
                            <td width="33%" style="padding-left:70px">
                                <?php if ($info->member_change_password == '1'): ?>
                                <?php $m12 = $this->db->query("select * from member_previlige where org_id='" . $org_id . "'and member_change_password=1");
                                    if ($m12->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="member_change_password"  checked="checked" value="1" />Used
                                        <input id="x" type="hidden"  name="member_change_password"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="member_change_password"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="member_change_password" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>

                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Configuration Organization
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">View organization presentation site</font></td>
                            <td width="33%">
                                <?php if ($info->configuration_view_org == '1'): ?>
                                    <input type="checkbox" name="configuration_view_org" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_view_org" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Add/change organization data</font></td>
                            <td width="33%">
                                <?php if ($info->configuration_change_org == '1'): ?>
                                    <input type="checkbox" name="configuration_change_org" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_change_org" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Manage visibility for system parts (pub/priv regarding articles )  </font></td>
                            <td width="33%">
                                <?php if ($info->configuration_visibility == '1'): ?>
                                    <input type="checkbox" name="configuration_visibility" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_visibility" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Switching on/off contact us option for the organization</font></td>
                            <td width="33%">
                                <?php if ($info->configuration_switching == '1'): ?>
                                    <input type="checkbox" name="configuration_switching" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_switching" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Create adress list, phone list of non members </font></td>
                            <td width="33%">
                                <?php if ($info->configuration_create_address == '1'): ?>
                                    <input type="checkbox" name="configuration_create_address" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_create_address" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>

                    </tbody></table>
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
                                <?php if ($info->external_mainboard == '1'): ?>
                                    <input type="checkbox" name="external_mainboard" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="external_mainboard" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside">View organization presentation site</font></td>
                            <td width="33%">
                                <?php if ($info->external_presentation == '1'): ?>
                                    <input type="checkbox" name="external_presentation" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="external_presentation" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr> 
                    </tbody></table>
            </div>
            <div style="width:420px; float:left; position:relative;">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Communication
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send Email to member/group of members or anyone else </font></td>
                            <td width="33%">
                                <?php if ($info->communication_send_email == '1'): ?>
                                    <input type="checkbox" name="communication_send_email" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_email" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send SMSto member/group of members or anyone else</font></td>
                            <td width="33%">
                                <?php if ($info->communication_send_sms == '1'): ?>
                                    <input type="checkbox" name="communication_send_sms" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send Letters to member/group of members or anyone else</font></td>
                            <td width="33%">
                                <?php if ($info->communication_send_letters == '1'): ?>
                                    <input type="checkbox" name="communication_send_letters" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>

                    </tbody></table>

                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Economics & Statistics
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Register member fee payment</font></td>
                            <td width="33%">
                                <?php if ($info->economics_register == '1'): ?>
                                    <input type="checkbox" name="economics_register" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_register" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Send payment notification for unpaid member fee</font></td>
                            <td width="33%">
                                <?php if ($info->economics_send_payment == '1'): ?>
                                    <input type="checkbox" name="economics_send_payment" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_send_payment" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Check complete member list / adress / household members</font></td>
                            <td width="33%">
                                <?php if ($info->economics_check_complete == '1'): ?>
                                    <input type="checkbox" name="economics_check_complete" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_check_complete" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Watch total income from member fees</font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_total_income == '1'): ?>
                                    <input type="checkbox" name="economics_watch_total_income" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_total_income" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Watch total cost for sent SMS and letters</font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_total_cost == '1'): ?>
                                    <input type="checkbox" name="economics_watch_total_cost" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_total_cost" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Watch statistics for sent SMS and letters</font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_statistics == '1'): ?>
                                    <input type="checkbox" name="economics_watch_statistics" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_statistics" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">History
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Access archived articles from main-board</font></td>
                            <td width="33%">
                                <?php if ($info->history_access_articles == '1'): ?>
                                    <input type="checkbox" name="history_access_articles" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_access_articles" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Access archived comments from forum</font></td>
                            <td width="33%">
                                <?php if ($info->history_access_comments == '1'): ?>
                                    <input type="checkbox" name="history_access_comments" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_access_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Access archived user actions </font></td>
                            <td width="33%">
                                <?php if ($info->history_user_actions == '1'): ?>
                                    <input type="checkbox" name="history_user_actions" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_user_actions" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">View old letters</font></td>
                            <td width="33%">
                                <?php if ($info->history_old_letters == '1'): ?>
                                    <input type="checkbox" name="history_old_letters" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">View old sms</font></td>
                            <td width="33%">
                                <?php if ($info->history_old_sms == '1'): ?>
                                    <input type="checkbox" name="history_old_sms" checked="checked"  value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">View old emails</font></td>
                            <td width="33%">
                                <?php if ($info->history_old_emails == '1'): ?>
                                    <input type="checkbox" name="history_old_emails" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_emails" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green">Members
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">-Decide data required for user registration/user profile</font></td>
                            <td width="33%">
                                <?php if ($info->members_decide == '1'): ?>
                                    <input type="checkbox" name="members_decide" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_decide" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">-Add/change/block users</font></td>
                            <td width="33%">
                                <?php if ($info->members_add_change == '1'): ?>
                                    <input type="checkbox" name="members_add_change" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_add_change" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Create groups </font></td>
                            <td width="33%">
                                <?php if ($info->members_c_group == '1'): ?>
                                    <input type="checkbox" name="members_c_group" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_c_group" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Add user to a group</font></td>
                            <td width="33%">
                                <?php if ($info->members_add_user == '1'): ?>
                                    <input type="checkbox" name="members_add_user" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_add_user" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Create user types (authorization)</font></td>
                            <td width="33%">
                                <?php if ($info->members_user_types == '1'): ?>
                                    <input type="checkbox" name="members_user_types" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_user_types" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside">Add user to a usertype</font></td>
                            <td width="33%">
                                <?php if ($info->members_add_usertype == '1'): ?>
                                    <input type="checkbox" name="members_add_usertype" checked="checked" value="1" />
                                <?php else: ?>
                                    <input type="checkbox" name="members_add_usertype" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
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
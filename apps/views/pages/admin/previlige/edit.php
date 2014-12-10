<h3 class="content_edit"><?php echo $this->lang->line('previlization_settings_msg');?></h2>

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
    <div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
            <?php
            $u = $this->db->query("select org_name from organization_info where id ='" . $org_id . "'");
            foreach ($u->result() as $t):
                $org_name = $t->org_name;
            endforeach;
            ?>

            <input type="hidden" name="org_id" value="<?php echo $org_id; ?>" />
            <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                <tbody>
                    <tr>
                        <td width="10%"><font class="inside"><?php echo $this->lang->line('label_org_name');?></font></td>
                        <td width="45%">
                         <input type="text" readonly="readonly" value="<?php echo $org_name; ?>" /> 
                        </td>
                    </tr>
           </tbody></table> 

        </div> 
        <div class="infobox_right" style="width: 900px;">
            <div style="width:420px; float:left; position:relative; ">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_main_board');?></font>
                            </td>
                            <td width="33%">
                                <input  type="checkbox"  onClick="checkAll(this)"> <?php echo $this->lang->line('label_all');?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_access_main_board');?></font></td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_article_proposal');?></font></td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_create_article');?></font></td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_article_notification');?></font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_send_notification == '1'): ?>
                                <?php $m3 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and mainboard_send_notification=1");
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
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_whole_article_by_letter');?></font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_sending_out == '1'): ?>
                                <?php $m4 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and mainboard_sending_out=1");
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
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_archieve_articles_at_main_board');?></font></td>
                            <td width="33%">
                                <?php if ($info->mainboard_manually_archive == '1'): ?>
                                <?php $m5 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and mainboard_manually_archive=1");
                                    if ($m5->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="mainboard_manually_archive"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
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

                <table width="367" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                        <tr>
                            <td width="60%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_forum');?></font></td>
                          <td width="40%">                            </td>
          </tr>
                        <tr>
                            <td width="60%"><font class="inside"><?php echo $this->lang->line('label_access_forum');?></font></td>
                      
          </tr>
                        <tr>
                            <td width="60%"><font class="inside"><?php echo $this->lang->line('label_make_comments');?></font></td>
                      
          </tr>
                        <tr>
                           <td width="60%"><font class="inside"><?php echo $this->lang->line('label_delete_own_comments');?></font></td>
                      
          </tr>
                        <tr>
                            <td width="60%"><font class="inside"><?php echo $this->lang->line('label_delete_any_comments');?></font></td>
                      <td width="40%">
                                <?php if ($info->forum_delete_any_coments == '1'): ?>
                                <?php $m9 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and forum_delete_any_coments=1");
                                    if ($m9->num_rows() > 0): ?>     
                        <input id="x" type="checkbox" disabled="disabled" name="forum_delete_any_coments"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
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
                            <td width="60%"><font class="inside"><?php echo $this->lang->line('label_archieve_comments');?></font></td>
                      <td width="40%">
                                <?php if ($info->forum_manually_archive_comments == '1'): ?>
                                <?php $m10 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and forum_manually_archive_comments=1");
                                    if ($m10->num_rows() > 0): ?>     
                        <input id="x" type="checkbox" disabled="disabled" name="forum_manually_archive_comments"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="forum_manually_archive_comments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="forum_manually_archive_comments"  checked="checked" value="1" />
                                    <?php endif; ?>                                 
                                <?php else: ?>
                                    <input type="checkbox" name="forum_manually_archive_comments" value="1" />
                                <?php endif; ?>
                            </td>
          </tr>
                    </tbody></table>

<table width="309" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                        <tr>
                            <td width="49%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_members_own_account');?>
                                </font></td>
                          <td width="51%">                            </td>
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_login_logout');?></font></td>
                      
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_add_change_profile');?></font></td>
                      
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_change_password');?></font></td>
                      
          </tr>

                    </tbody></table>
<table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_org_configuration');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_view_org_presentation');?></font></td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_add_change_org_data');?></font></td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_create_address_phone_list_non_member');?></font></td>
                            <td width="33%">
                                <?php if ($info->configuration_create_address == '1'): ?>
                    <?php $m15 = $this->db->query("select * from   org_member_previlige where org_id='" . $org_id . "'and configuration_create_address=1");
                                    if ($m15->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="configuration_create_address"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="configuration_create_address"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="configuration_create_address"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="configuration_create_address" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>

                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_external_users');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_access_main_board');?></font></td>
                            <td width="33%">
                                <?php if ($info->external_mainboard == '1'): ?>
                    <?php $m16 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and external_mainboard=1");
                                    if ($m16->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="external_mainboard"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="external_mainboard"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="external_mainboard"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                <?php else: ?>
                                    <input type="checkbox" name="external_mainboard" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_view_org_presentation');?></font></td>
                            
                        </tr> 
                    </tbody></table>
            </div>
            <div style="width:420px; float:left; position:relative;">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_communication');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_email_to_member_group');?> </font></td>
                            <td width="33%">
                                <?php if ($info->communication_send_email == '1'): ?>
                    <?php $m18 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and communication_send_email=1");
                                    if ($m18->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="communication_send_email"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="communication_send_email"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="communication_send_email"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_email" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_sms_to_member_group');?></font></td>
                            <td width="33%">
                                <?php if ($info->communication_send_sms == '1'): ?>
                    <?php $m19 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and communication_send_sms=1");
                                    if ($m19->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="communication_send_sms"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="communication_send_sms"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="communication_send_sms"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_letter_to_member_group');?></font></td>
                            <td width="33%">
                            <?php if ($info->communication_send_letters == '1'): ?>
                    <?php $m20 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and communication_send_letters=1");
                                    if ($m20->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="communication_send_letters"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="communication_send_letters"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="communication_send_letters"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="communication_send_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_economics');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_register_member_fee');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_register == '1'): ?>
                    <?php $m21 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_register=1");
                                    if ($m21->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_register"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="economics_register"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_register"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="economics_register" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_send_payment_notification');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_send_payment == '1'): ?>
                    <?php $m22 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_send_payment=1");
                                    if ($m22->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_send_payment"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="economics_send_payment"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_send_payment"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="economics_send_payment" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_check_complete_member_list');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_check_complete == '1'): ?>
                    <?php $m23 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_check_complete=1");
                                    if ($m23->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_check_complete"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>                                        <input id="x" type="hidden"  name="economics_check_complete"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_check_complete"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="economics_check_complete" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_watch_total_income_member');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_total_income == '1'): ?>
                    <?php $m24 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_watch_total_income=1");
                                    if ($m24->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_watch_total_income"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="economics_watch_total_income"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_watch_total_income"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_total_income" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_watch_total_cost_SMS_letters_sent');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_total_cost == '1'): ?>
                    <?php $m25 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_watch_total_cost=1");
                                    if ($m25->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_watch_total_cost"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="economics_watch_total_cost"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_watch_total_cost"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_total_cost" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_watch_statistics_for_sent_SMS_letters');?></font></td>
                            <td width="33%">
                                <?php if ($info->economics_watch_statistics == '1'): ?>
                    <?php $m26 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and economics_watch_statistics=1");
                                    if ($m26->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="economics_watch_statistics"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="economics_watch_statistics"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="economics_watch_statistics"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="economics_watch_statistics" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_history');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_access_archived_articles_from_main_board');?></font></td>
                            <td width="33%">
                                <?php if ($info->history_access_articles == '1'): ?>
                    <?php $m27 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_access_articles=1");
                                    if ($m27->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_access_articles"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_access_articles"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_access_articles"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_access_articles" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_access_archived_comments_from_forum');?></font></td>
                            <td width="33%">
                                <?php if ($info->history_access_comments == '1'): ?>
                    <?php $m28 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_access_comments=1");
                                    if ($m28->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_access_comments"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_access_comments"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_access_comments"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_access_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_access_archived_user_actions');?> </font></td>
                            <td width="33%">
                                <?php if ($info->history_user_actions == '1'): ?>
                    <?php $m29 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_user_actions=1");
                                    if ($m29->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_user_actions"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_user_actions"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_user_actions"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_user_actions" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_view_old_letters');?></font></td>
                            <td width="33%">
                                <?php if ($info->history_old_letters == '1'): ?>
                    <?php $m30 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_old_letters=1");
                                    if ($m30->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_old_letters"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_old_letters"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_old_letters"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_view_old_sms');?></font></td>
                            <td width="33%">
                                <?php if ($info->history_old_sms == '1'): ?>
                    <?php $m31 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_old_sms=1");
                                    if ($m31->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_old_sms"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_old_sms"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_old_sms"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_view_old_emails');?></font></td>
                            <td width="33%">
                                <?php if ($info->history_old_emails == '1'): ?>
                    <?php $m32 = $this->db->query("select * from  org_member_previlige where org_id='" . $org_id . "'and history_old_emails=1");
                                    if ($m32->num_rows() > 0): ?>     
                                        <input id="x" type="checkbox" disabled="disabled" name="history_old_emails"  checked="checked" value="1" /><?php echo $this->lang->line('label_used');?>
                                        <input id="x" type="hidden"  name="history_old_emails"  value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox"  name="history_old_emails"  checked="checked" value="1" />
                                    <?php endif; ?> 
                                
                                <?php else: ?>
                                    <input type="checkbox" name="history_old_emails" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody></table>
                <table width="344" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px; margin-top:10px">
<tbody>
                        <tr>
                            <td width="64%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_groups');?>
                                </font></td>
                          <td width="36%">                            </td>
          </tr>
                        
                      
                        <tr>
                            <td width="64%"><font class="inside"><?php echo $this->lang->line('label_create_groups');?> </font></td>
                      
          </tr>
          
                        <tr>
                            <td width="64%"><font class="inside"><?php echo $this->lang->line('label_add_user_to_group');?></font></td>
                      
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
<h3 class="content_edit"><?php echo $this->lang->line('previlization_settings_org_mem_msg');?></h3>


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
$query_organization_prevelize  = $this->db->query("select * from org_previlige where org_id='" . $org_id . "' ");
if ($query_organization_prevelize->num_rows() == 0) {
        echo "<font style='color:red'>".$this->lang->line('no_previlization_settings_exists_this_org')."</font>";

} else {
    foreach ($query_organization_prevelize->result() as $organization_prevelize):
    endforeach;


$query1 = $this->db->query("select * from org_member_previlige where mem_type_id='" . $mem_type_id . "'  AND org_id='" . $org_id . "' ");
//echo "<pre>";print_r($query1->result());die();
if ($query1->num_rows() == 0) {
        echo "<font style='color:red'>".$this->lang->line('no_previlization_settings_exists_this_mem_type')."</font>";
} else {
    foreach ($query1->result() as $info):
    endforeach;
    ?>
    <?php echo form_open("organization/info/update_org_member_type_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>

            <?php
            $member_type_name = $this->db->query("select type_name from  org_member_type where mem_type_id='" . $mem_type_id . "'");
            foreach ($member_type_name->result() as $mem_type_name):
                $type_name = $mem_type_name->type_name;
            endforeach;
            ?>

            <input type="hidden" name="org_id" value="<?php echo $org_id; ?>" />
            <input type="hidden" name="mem_type_id" value="<?php echo $mem_type_id; ?>" />
			<strong><?php echo $this->lang->line('label_type_name');?>:</strong>
                         <mark><?php echo $type_name; ?></mark>
                         <label><input class="checkall" type="checkbox"  onClick="checkAll(this)"> Check <?php echo $this->lang->line('label_all');?></label>


<div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_main_board');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>

                <table class="width-100 accordion-content">
                    <tbody>
                        
                        <?php if($organization_prevelize->mainboard_access_main) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_main_board');?></font></td>
                            <td>
                                    <?php if ($info->mainboard_access_main == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_access_main"  checked="checked" value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox" name="mainboard_access_main" value="1" />
                                    <?php endif; ?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->mainboard_send_proposal) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_article_proposal');?></font></td>
                            <td>
                                    <?php if ($info->mainboard_send_proposal == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_send_proposal"  checked="checked" value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox" name="mainboard_send_proposal" value="1" />
                                    <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->mainboard_change_article) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_create_article');?></font></td>
                            <td>
                                    <?php if ($info->mainboard_change_article == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_change_article"  checked="checked" value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox" name="mainboard_change_article" value="1" />
                                    <?php endif; ?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->mainboard_send_notification) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_article_notification');?></font></td>
                            <td>
                                    <?php if ($info->mainboard_send_notification == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_send_notification"  checked="checked" value="1" />
                                    <?php else: ?>
                                        <input id="x" type="checkbox" name="mainboard_send_notification" value="1" />
                                    <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        
                        <?php if($organization_prevelize->mainboard_sending_out) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_whole_article_by_letter');?></font></td>
                            <td>
                                <?php if ($info->mainboard_sending_out == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_sending_out"  checked="checked" value="1" />               
                                <?php else: ?>
                                        <input id="x" type="checkbox" name="mainboard_sending_out" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        
                        <?php if($organization_prevelize->mainboard_manually_archive) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_archieve_articles_at_main_board');?></font></td>
                            <td>
                                <?php if ($info->mainboard_manually_archive == '1'): ?>
                                        <input id="x" type="checkbox"  name="mainboard_manually_archive"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input  type="checkbox" name="mainboard_manually_archive" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_forum');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
          
                        <?php if($organization_prevelize->forum_access) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_forum');?></font></td>
                            <td>
                            <?php if ($info->forum_access == '1'): ?>
                                    <input id="x" type="checkbox"  name="forum_access"  checked="checked" value="1" />
                            <?php else: ?>
                                    <input type="checkbox" name="forum_access" value="1" />
                            <?php endif; ?>
                    </td>
                      
                    </tr>
                    <?php } ?>
                    
                    <?php if($organization_prevelize->forum_comments) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_make_comments');?></font></td>
                            <td>
                            <?php if ($info->forum_comments == '1'): ?>
                                    <input id="x" type="checkbox"  name="forum_comments"  checked="checked" value="1" />
                            <?php else: ?>
                                    <input type="checkbox" name="forum_comments" value="1" />
                            <?php endif; ?>
                    </td>
                      
                </tr>
                <?php } ?>
                
                 
                        <tr>
                           <td><font class="inside"><?php echo $this->lang->line('label_delete_own_comments');?></font></td>
                        <td></td>
          </tr>
                    
                    <?php if($organization_prevelize->forum_delete_any_coments) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_delete_any_comments');?></font></td>
                      <td>
                            <?php if ($info->forum_delete_any_coments == '1'): ?>
                                    <input id="x" type="checkbox"  name="forum_delete_any_coments"  checked="checked" value="1" />
                            <?php else: ?>
                                    <input type="checkbox" name="forum_delete_any_coments" value="1" />
                            <?php endif; ?>
                    </td>
                </tr>
                <?php } ?>
                
                   <?php if($organization_prevelize->forum_manually_archive_comments) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_archieve_comments');?></font></td>
                      <td>
                            <?php if ($info->forum_manually_archive_comments == '1'): ?>
                                    <input id="x" type="checkbox"  name="forum_manually_archive_comments"  checked="checked" value="1" />
                            <?php else: ?>
                                    <input type="checkbox" name="forum_manually_archive_comments" value="1" />
                            <?php endif; ?>
                    </td>
                </tr>
                <?php } ?>
          
                </table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_members_own_account');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">

                            <td><font class="inside"><?php echo $this->lang->line('label_login_logout');?></font></td>
                      
          </tr>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_add_change_profile');?></font></td>
                      
          </tr>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_change_password');?></font></td>
                      
          </tr>

</table>
<div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_org_configuration');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
<table class="width-100 accordion-content">
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_view_org_presentation');?></font></td>
                            <td></td>
                        </tr>
                        
                        <?php if($organization_prevelize->configuration_change_org) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_add_change_org_data');?></font></td>
                            <td>
                            <?php if ($info->configuration_change_org == '1'): ?>
                                    <input id="x" type="checkbox"  name="configuration_change_org"  checked="checked" value="1" />
                            <?php else: ?>
                                    <input type="checkbox" name="configuration_change_org" value="1" />
                            <?php endif; ?>
                    </td>                            
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->configuration_create_address) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_create_address_phone_list_non_member');?></font></td>
                            <td>
                                <?php if ($info->configuration_create_address == '1'): ?>
                                        <input id="x" type="checkbox"  name="configuration_create_address"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="configuration_create_address" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>

</table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_external_users');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
                        
                        <?php if($organization_prevelize->external_mainboard) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_main_board');?></font></td>
                            <td>
                                <?php if ($info->external_mainboard == '1'): ?>
                                        <input id="x" type="checkbox"  name="external_mainboard"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="external_mainboard" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr> 
                        <?php } ?>
                        
                        <?php if($organization_prevelize->external_presentation) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_view_org_presentation');?></font></td>
                            <td>
                                <?php if ($info->external_presentation == '1'): ?>
                                        <input id="x" type="checkbox"  name="external_presentation"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="external_presentation" value="1" />
                                <?php endif; ?>
                            </td>                            
                        </tr> 
                        <?php } ?>
                        
                        </table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_communication');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
                        

                        <?php if($organization_prevelize->communication_send_email) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_email_to_member_group');?> </font></td>
                            <td>
                                <?php if ($info->communication_send_email == '1'): ?>
                                        <input id="x" type="checkbox"  name="communication_send_email"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="communication_send_email" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->communication_send_sms) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_sms_to_member_group');?></font></td>
                            <td>
                                <?php if ($info->communication_send_sms == '1'): ?>
                                        <input id="x" type="checkbox"  name="communication_send_sms"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="communication_send_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                         <?php } ?>
                        
                        <?php if($organization_prevelize->communication_send_letters) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_letter_to_member_group');?></font></td>
                            <td>
                                <?php if ($info->communication_send_letters == '1'): ?>
                                        <input id="x" type="checkbox"  name="communication_send_letters"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="communication_send_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        

</table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_economics');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
                        
                        <?php if($organization_prevelize->economics_register) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_register_member_fee');?></font></td>
                            <td>
                                <?php if ($info->economics_register == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_register"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_register" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->economics_send_payment) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_send_payment_notification');?></font></td>
                            <td>
                                <?php if ($info->economics_send_payment == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_send_payment"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_send_payment" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php } ?>

                        <?php if($organization_prevelize->economics_check_complete) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_check_complete_member_list');?></font></td>
                            <td>
                                <?php if ($info->economics_check_complete == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_check_complete"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_check_complete" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->economics_watch_total_income) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_watch_total_income_member');?></font></td>
                            <td>
                                <?php if ($info->economics_watch_total_income == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_watch_total_income"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_watch_total_income" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->economics_watch_total_cost) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_watch_total_cost_SMS_letters_sent');?></font></td>
                            <td>
                                <?php if ($info->economics_watch_total_cost == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_watch_total_cost"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_watch_total_cost" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->economics_watch_statistics) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_watch_statistics_for_sent_SMS_letters');?></font></td>
                            <td>
                                <?php if ($info->economics_watch_statistics == '1'): ?>
                                        <input id="x" type="checkbox"  name="economics_watch_statistics"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="economics_watch_statistics" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
  </table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_history');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
                        
                        <?php if($organization_prevelize->history_access_articles) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_archived_articles_from_main_board');?></font></td>
                            <td>
                                <?php if ($info->history_access_articles == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_access_articles"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_access_articles" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->history_access_comments) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_archived_comments_from_forum');?></font></td>
                            <td>
                                <?php if ($info->history_access_comments == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_access_comments"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_access_comments" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->history_user_actions) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_access_archived_user_actions');?> </font></td>
                            <td>
                                <?php if ($info->history_user_actions == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_user_actions"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_user_actions" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->history_old_letters) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_view_old_letters');?></font></td>
                            <td>
                                <?php if ($info->history_old_letters == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_old_letters"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_old_letters" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->history_old_sms) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_view_old_sms');?></font></td>
                            <td>
                                <?php if ($info->history_old_sms == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_old_sms"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_old_sms" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if($organization_prevelize->history_old_emails) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_view_old_emails');?></font></td>
                            <td>
                                <?php if ($info->history_old_emails == '1'): ?>
                                        <input id="x" type="checkbox"  name="history_old_emails"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="history_old_emails" value="1" />
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        

  </table>
                
                <div class="accordion-header units-row"><div class="unit-75"><?php echo $this->lang->line('label_groups');?></div><div class="unit-push-right"><span class="toggleslide">▼</span></div></div>
                <table class="width-100 accordion-content">
                        
                      <?php if($organization_prevelize->members_c_group) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_create_groups');?> </font></td>
                            <td>
                                <?php if ($info->members_c_group == '1'): ?>
                                        <input id="x" type="checkbox"  name="members_c_group"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="members_c_group" value="1" />
                                <?php endif; ?>
                            </td>
                      
          </tr>
                 <?php } ?>
                 
                 
                  
                      
                 
                 <?php if($organization_prevelize->members_add_group) { ?>
                        <tr>
                            <td><font class="inside"><?php echo $this->lang->line('label_add_user_to_group');?></font></td>
                            <td>
                                <?php if ($info->members_add_group == '1'): ?>
                                        <input id="x" type="checkbox"  name="members_add_group"  checked="checked" value="1" />
                                <?php else: ?>
                                        <input type="checkbox" name="members_add_group" value="1" />
                                <?php endif; ?>
                            </td>
                      
          </tr>
                       <?php } ?>
                       
                    </tbody></table>
<br />
                        <input type="submit" value="Update" />


    <?php
    echo form_close();
} }
?>
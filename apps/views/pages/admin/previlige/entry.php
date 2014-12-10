<h3 class="content_edit"><?php echo $this->lang->line('previlization_settings_msg');?></h2>

<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
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
	 .previlize a{ color:#009966; font-weight:bold; font-size:13px}
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
<?php echo form_open("admin/info/added_org_previlige"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 900px;">
        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="10%"><font class="inside">Org Name </font></td>
                    <td width="45%">
                        <?php
                        $query = $this->db->query("select * from user_info where login_status=2 ");
                        ?>
                        <select name="org_id" style="width:150px">
                            <option value="">Select</option>

                            <?php foreach ($query->result() as $info): ?>
                                <option value="<?php echo $info->id; ?>"><?php echo $info->org_name; ?>(<?php echo $info->org_number; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                        <span class="markcolor"><?php echo ucwords(form_error('org_id')); ?></span>
                    </td>

                </tr>

            </tbody></table> 

    </div> 
    <div class="infobox_right" style="width: 900px;">
        <div style="width:420px; float:left; position:relative; ">
            <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                <tbody>
                    <tr>
                        <td width="65%"><font class="inside" style="font-weight:bold; color:green">Main Board</font>                        </td>
                  <td width="35%">
                    <input  type="checkbox"  onClick="checkAll(this)"> All
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Access main-board (review the articles) </font></td>
                  <td width="35%">
            <input id="x" type="checkbox" name="mainboard_access_main" value="1" />
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Send proposal for article to be posted at main-board </font></td>
                  <td width="35%">
            <input id="x" type="checkbox" name="mainboard_send_proposal" value="1" />
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Create/change articles and send notification</font></td>
                  <td width="35%">
            <input id="x" type="checkbox" name="mainboard_change_article" value="1" />
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Send notification of new articles via Email/SMS (only notifications)</font></td>
                  <td width="35%">
            <input id="x" type="checkbox" name="mainboard_send_notification" value="1" />
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Sending out the whole article through real letter</font></td>
                  <td width="35%">
            <input id="x" type="checkbox" name="mainboard_sending_out" value="1" />
                        </td>
                  </tr>
                    <tr>
                        <td width="65%"><font class="inside">Manually archive articles at main-board </font></td>
                  <td width="35%">
            <input  type="checkbox" name="mainboard_manually_archive" value="1" />
                        </td>
                  </tr>
                </tbody></table>

            <table width="307" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                    <tr>
                        <td width="81%"><font class="inside" style="font-weight:bold; color:green">Forum</font></td>
                      <td width="19%">                        </td>
          </tr>
                    <tr>
                        <td width="81%"><font class="inside">Access the forum </font></td>
                  <td width="19%">
<input type="checkbox" name="forum_access" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="81%"><font class="inside">Make comments</font></td>
                  <td width="19%">
<input type="checkbox" name="forum_comments" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="81%"><font class="inside">Delete ones owns comments</font></td>
                  <td width="19%">
<input type="checkbox" name="forum_delete_won_comments" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="81%"><font class="inside">Delete any comments</font></td>
                  <td width="19%">
<input type="checkbox" name="forum_delete_any_coments" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="81%"><font class="inside">manually archive comments</font></td>
                  <td width="19%">
<input type="checkbox" name="forum_manual_comments" value="1" />
                        </td>
          </tr>

                </tbody></table>

            <table width="276" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                    <tr>
                        <td width="65%"><font class="inside" style="font-weight:bold; color:green">Members own account
                            </font></td>
                      <td width="35%">                        </td>
          </tr>
                    <tr>
                        <td width="65%"><font class="inside">Log in/Log out </font></td>
                  <td width="35%" style="padding-left:70px">
                <input type="checkbox" name="member_login_logout" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="65%"><font class="inside">Add/change profile info</font></td>
                  <td width="35%" style="padding-left:70px">
                <input type="checkbox" name="member_change_profile" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="65%"><font class="inside">Change password</font></td>
                  <td width="35%" style="padding-left:70px">
                <input type="checkbox" name="member_change_password" value="1" />
                        </td>
          </tr>


                </tbody></table>
<table width="329" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px; margin-top:10px">
<tbody>
                    <tr>
                        <td width="76%"><font class="inside" style="font-weight:bold; color:green">Configuration Organization
                            </font></td>
                      <td width="24%">                        </td>
          </tr>
                    <tr>
                        <td width="76%"><font class="inside">View organization presentation site</font></td>
                  <td width="24%">
        <input type="checkbox" name="configuration_view_org" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="76%"><font class="inside">Add/change organization data</font></td>
                  <td width="24%">
        <input type="checkbox" name="configuration_change_org" value="1" />
                        </td>
          </tr>
                   
                    <tr>
                        <td width="76%"><font class="inside">Create adress list, phone list of non members </font></td>
                  <td width="24%">
        <input type="checkbox" name="configuration_create_address" value="1" />
                        </td>
          </tr>


                </tbody></table>
<table width="333" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px; margin-top:10px">
<tbody>
                    <tr>
                        <td width="75%"><font class="inside" style="font-weight:bold; color:green">External Users
                            </font></td>
                      <td width="25%">                        </td>
          </tr>
                   <tr>
                        <td width="75%"><font class="inside">Access main-board (review the articles) </font></td>
                <td width="25%">
<input id="x" type="checkbox" name="external_mainboard" value="1" />
                        </td>
          </tr> 
                     <tr>
                        <td width="75%"><font class="inside">View organization presentation site</font></td>
                    <td width="25%">
                <input type="checkbox" name="external_presentation" value="1" />
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
                            <input type="checkbox" name="communication_send_email" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Send SMSto member/group of members or anyone else</font></td>
                        <td width="33%">
                            <input type="checkbox" name="communication_send_sms" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Send Letters to member/group of members or anyone else</font></td>
                        <td width="33%">
                            <input type="checkbox" name="communication_send_letters" value="1" />
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
                            <input type="checkbox" name="economics_register" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Send payment notification for unpaid member fee</font></td>
                        <td width="33%">
                            <input type="checkbox" name="economics_send_payment" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Check complete member list / adress / household members</font></td>
                        <td width="33%">
                            <input type="checkbox" name="economics_check_complete" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Watch total income from member fees</font></td>
                        <td width="33%">
                            <input type="checkbox" name="economics_watch_total_income" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Watch total cost for sent SMS and letters</font></td>
                        <td width="33%">
                            <input type="checkbox" name="economics_watch_total_cost" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Watch statistics for sent SMS and letters</font></td>
                        <td width="33%">
                            <input type="checkbox" name="economics_watch_statistics" value="1" />
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
                            <input type="checkbox" name="history_access_articles" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Access archived comments from forum</font></td>
                        <td width="33%">
                            <input type="checkbox" name="history_access_comments" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">Access archived user actions </font></td>
                        <td width="33%">
                            <input type="checkbox" name="history_user_actions" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">View old letters</font></td>
                        <td width="33%">
                            <input type="checkbox" name="history_old_letters" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">View old sms</font></td>
                        <td width="33%">
                            <input type="checkbox" name="history_old_sms" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td width="45%"><font class="inside">View old emails</font></td>
                        <td width="33%">
                            <input type="checkbox" name="history_old_emails" value="1" />
                        </td>
                    </tr>

                </tbody></table>
            <table width="293" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px; margin-top:10px">
<tbody>
                    <tr>
                        <td width="76%"><font class="inside" style="font-weight:bold; color:green">Members
                            </font></td>
                      <td width="24%">                        </td>
          </tr>
                   
                    <tr>
                        <td width="76%"><font class="inside">Create groups </font></td>
                  <td width="24%">
<input type="checkbox" name="members_c_group" value="1" />
                        </td>
          </tr>
                    <tr>
                        <td width="76%"><font class="inside">Add user to a group</font></td>
                  <td width="24%">
<input type="checkbox" name="members_add_user" value="1" />
                        </td>
          </tr>
                  

                </tbody></table>
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
<?php echo form_close(); ?>
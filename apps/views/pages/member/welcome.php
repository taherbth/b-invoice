<?php  $this->session->userdata('id');?>
<?php
$query = $this->db->query("select * from member where id='" . $this->session->userdata('id') . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
table { font-style:italic}
</style>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div style="width:900px"><span style=" padding-left:300px; font-weight:bold; color:green">Welcome To Member panel<span>
                <span style="margin-left:200px"> 
                <a class="c" href="<?php echo base_url(); ?>org_member/info/profile_setting/<?php echo $p_info->id;?> ">
        <button class="c">Profile setting</button>
 </a>
                
                <a href="<?php echo base_url(); ?>org_member/info/edit_profile/<?php echo $this->session->userdata('id'); ?> "> <img src="<?php echo base_url(); ?>public/images/change_profil.jpg" height="22" alt="" border="0"></a></span>
                </div>
                <div style="width:920px; ">
                    <div style="width:220px; float:left; position:relative;">
                        <div id="org-logo">
                            <?php echo '<img style="" src=' . base_url() . 'uploads/' . $p_info->photo1 . ' width="160" height="160" />'; ?>                        
                        </div>
                    </div>
                    <div style="background-color:#E8E8E8; padding:5px; border:1px solid #CBD8D8; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:680px; float: left">
                        <div style="width:350px; float:left; position:relative;  margin-top:20px;  ">
                            <span style=" padding-left:10px;"><b><font color="green">Profile Info</font></b><span>
                                    <table width="250" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                        <tbody>
                                           <tr>
                                                <?php
                                               $query1 = $this->db->query("select group_name from org_group where id='" . $p_info->member_group . "'");
                                                foreach ($query1->result() as $info1) {
                                                    $g_name = $info1->group_name;
                                                }
                                                if (!empty($g_name)):$g_name = $g_name;
                                                else:$g_name = "";
                                                endif;
                                                ?>
                                                <td width="18%"><font class="inside"><b>Group Name :</b></font></td>
                                                <td width="33%"><b><?php echo $g_name; ?></b> </td>
                                            </tr>
                                              <tr> 
                                                <td width="38%" style="padding-left:50px"><font class="inside">Title:</font></td>
                                                <td width="33%"><?php echo $p_info->member_title; ?> </td>

                                            </tr>
                                            <tr> 
                                                <td width="38%" style="padding-left:40px"><font class="inside">Name:</font></td>
                                                <td width="33%"><?php echo $p_info->name; ?> </td>

                                            </tr>
                                           
                                            <tr>
                                                <td width="38%" style="padding-left:37px"><font class="inside">Phone:</font></td>
                                                <td width="33%"><?php echo $p_info->phone; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="padding-left:40px"><font class="inside">Email:</font></td>
                                                <td width="33%"><?php echo $p_info->email; ?> </td>
                                            </tr>
                                             <tr>
                                                <td width="38%" style="padding-left:27px"><font class="inside">Address:</font></td>
                                                <td width="33%"><?php echo $p_info->address; ?> </td>
                                            </tr>
                                        </tbody></table>
 
                                    </div>  
                                    <div style="width:275px; float:left; position:relative;margin-top:53px; ">
                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                            <tbody>
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green"></font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <?php 
												$u_type="";
												$w=$this->db->query("select user_type from user_type where id='".$p_info->user_type."'");
												foreach($w->result() as $u):
												$u_type=$u->user_type;
												endforeach;?>
                                                <tr>
                                                    <td width="38%"><font class="inside">User Type:</font></td>
                                                    <td width="33%"><?php echo $u_type; ?> </td>
                                                </tr>
                                               
                                                 <tr>
                                                    <td width="18%"><font class="inside">Person Number:</font></td>
                                                    <td width="33%"><?php echo $p_info->person_number; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Bank Info:</font></td>
                                                    <td width="33%"><?php echo $p_info->bank_info; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">HouseHold Size:</font></td>
                                                    <td width="33%"><?php echo $p_info->household_size; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Username :</font></td>
                                                    <td width="33%"><?php echo $p_info->username; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Membership Expire Date :</font></td>
                                                    <td width="33%"><?php echo $p_info->expire_date; ?> </td>
                                                </tr>
                                                 <tr>
                                                    <td width="38%"><font class="inside">Profile Message:</font></td>
                                                    <td width="33%"><?php echo $p_info->profile_message; ?> </td>
                                                </tr>
                                      </tbody></table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

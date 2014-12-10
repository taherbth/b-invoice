<?php
$query = $this->db->query("select * from member where id='" . $id . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
</style>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div style="width:900px"><span style=" padding-left:300px; font-weight:bold; color:green"><span>
                <span style="margin-left:200px"> <a href="<?php echo base_url(); ?>org_member/info/edit_profile/<?php echo $this->session->userdata('id'); ?> "> <img src="<?php echo base_url(); ?>public/images/change_profil.jpg" height="22" alt="" border="0"></a></span>
                </div>
                <div style="width:900px; ">
                    <div style="width:220px; float:left; position:relative;">
                       <!-- <div id="org-logo">
                            <?php // echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $p_info->photo1 . ' width="160" height="160" />'; ?>                        
                        </div>-->
                    </div>
                    <div style="background-color:#E8E8E8; border:1px solid #CCCCCC; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:670px; float: left">
                        <div style="width:400px; float:left; position:relative;  margin-top:20px;  ">
                            <span style=" padding-left:10px;"><b><font color="green">Profile Info</font></b><span>
                                    <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
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
                                                <td width="38%"><font class="inside">Name:</font></td>
                                                <td width="33%"><?php echo $p_info->name; ?> </td>

                                            </tr>
                                            <tr>
                                                <td width="38%"><font class="inside">Address:</font></td>
                                                <td width="33%"><?php echo $p_info->address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%"><font class="inside">Phone:</font></td>
                                                <td width="33%"><?php echo $p_info->phone; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%"><font class="inside">Email:</font></td>
                                                <td width="33%"><?php echo $p_info->email; ?> </td>
                                            </tr>
                                        </tbody></table>
 
                                    </div>  
                                    <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                            <tbody>
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green"></font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">profile_message:</font></td>
                                                    <td width="33%"><?php echo $p_info->profile_message; ?> </td>
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
                                      </tbody></table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

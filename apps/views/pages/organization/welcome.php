<?php
$query = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
table{ font-style:italic}
.c {
    background-color: #E0EAF1;
    color: #3E6D8E;
    font-size: 12px;
    height: 30px;
    text-decoration: none;
    white-space: nowrap;
}
</style>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div style="width:900px"><span style=" padding-left:200px; font-weight:bold; color:green">Welcome To Organization admin panel<span>
<!--                <span style="margin-left:200px"> <a href="<?php //echo base_url(); ?>organization/info/edit_profile/<?php //echo $this->session->userdata('user_id'); ?> "> <img src="<?php //echo base_url(); ?>public/images/change_profile.jpg" height="22" alt="" border="0"></a></span>
-->  <span style="margin-left:140px">
    <a href="<?php echo base_url(); ?>organization/info/change_password/<?php echo $this->session->userdata('user_id'); ?> "> 
    <button class="c">Change Password</button></a>
    <a href="<?php echo base_url(); ?>organization/info/modify_org"> 
    <button class="c">Edit</button></a></span>
        <a href="<?php echo base_url(); ?>organization/info/org_profile_setting"> 
    <button class="c">Profile Setting</button></a></span>

                </div>
                <div style="width:900px; ">
                    <div style="width:220px; float:left; position:relative;">
                        <div id="org-logo">
                            <?php echo '<img style="" src=' . base_url() . 'uploads/' . $p_info->photo1 . ' width="160" height="160" />'; ?>                        
                        </div>
                    </div>
                    <div style="background-color:#E8E8E8; border:1px solid #CCCCCC; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:670px; float: left">
                        <div style="width:400px; float:left; position:relative;  margin-top:20px;  ">
                            <span style=" padding-left:10px;"><b><font color="green">Profile Info</font></b><span>
                                    <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                        <tbody>
                                            <tr> 
                                                <td width="38%" style="text-align:center"><font class="inside">Org Number:</font></td>
                                                <td width="33%"><?php echo $p_info->org_number; ?> </td>

                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center"><font class="inside">Org Name:</font></td>
                                                <td width="33%"><?php echo $p_info->org_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="padding-left:10px"><font class="inside">Org Primary Address:</font></td>
                                                <td width="33%"><?php echo $p_info->org_primary_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="padding-left:10px"><font class="inside">Org Optional Address:</font></td>
                                                <td width="33%"><?php echo $p_info->org_optional_address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center"><font class="inside">Org Phone:</font></td>
                                                <td width="33%"><?php echo $p_info->org_phone; ?> </td>
                                            </tr>
                                            <tr>
                                                <?php
                                                $query1 = $this->db->query("select zone from zone where id='" . $p_info->area_name . "'");
                                                foreach ($query1->result() as $info1) {
                                                    $z_name = $info1->zone;
                                                }
                                                if (!empty($z_name)):$z_name = $z_name;
                                                else:$z_name = "";
                                                endif;
                                                ?>
                                                <td width="18%" style="text-align:center"><font class="inside">Area Name:</font></td>
                                                <td width="33%"><?php echo $z_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%"><font class="inside"><b><font color="green">Organization Admin Info:</font></b></font></td>
                                                <td width="33%"> </td>

                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center"><font class="inside">First Name:</font></td>
                                                <td width="33%"><?php echo $p_info->first_name; ?> </td>

                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center"><font class="inside">Last Name:</font></td>
                                                <td width="33%"><?php echo $p_info->last_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center; padding-left:20px"><font class="inside">Phone:</font></td>
                                                <td width="33%"><?php echo $p_info->phone_no; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center; padding-left:10px"><font class="inside">Address:</font></td>
                                                <td width="33%"><?php echo $p_info->address; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center; padding-left:20px"><font class="inside">Email:</font></td>
                                                <td width="33%"><?php echo $p_info->email; ?> </td>
                                            </tr>
                                           <tr>
                                                <td width="18%" style="text-align:center"><font class="inside">Username:</font></td>
                                                <td width="33%"><?php echo $p_info->username; ?> </td>
                                            </tr>


                                        </tbody></table>
                                    </div>  
                                    <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                            <tbody>
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green">Credit Card Info:</font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Card No:</font></td>
                                                    <td width="33%"><?php echo $p_info->card_no; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Expire Date:</font></td>
                                                    <td width="33%"><?php echo $p_info->expire_date; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Cvv2 no:</font></td>
                                                    <td width="33%"><?php echo $p_info->cvv2_no; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Name on card :</font></td>
                                                    <td width="33%"><?php echo $p_info->name_on_card; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside"><b><font color="green">Package Info:</font></b></font></td>
                                                    <td width="33%"></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Package Name :</font></td>
                                                    <?php
                                                    $query = $this->db->query("select * from package where id='" . $p_info->package_name . "'");
                                                    foreach ($query->result() as $info) {
                                                        $p_name = $info->package_name;
                                                    }
                                                    if (!empty($p_name)):$p_name = $p_name;
                                                    else:$p_name = "";
                                                    endif;
                                                    ?>

                                                    <td width="33%"><?php echo $p_name; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Number Of Member:</font></td>
                                                    <td width="33%"><?php echo $info->no_of_member; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Duration:</font></td>
                                                    <td width="33%"><?php echo $info->duration; ?>  Year</td>
                                                </tr>
                                                <tr>
                                                    <td width="18%"><font class="inside">Package Amount:</font></td>
                                                    <td width="33%"><?php echo $info->amount; ?>  (<?php echo $info->currency; ?>)</td>
                                                </tr>
                                            </tbody></table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
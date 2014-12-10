<?php
$query = $this->db->query("select * from user_info where id='" . $this->session->userdata("member_org") . "'");
foreach ($query->result() as $p_info):
endforeach;
$p = $this->db->query("select * from org_profile_previlize where org_id='" . $this->session->userdata("member_org") . "'");

    ?>
    <style>
        .inside{ padding-left:7px}
        table{ font-style: italic}
    </style>
    <h3 class="content_edit">About Organization </h2>
    <div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div style="width:200px; float:right; padding-top:0px; padding-left:20px; color:green; font-size:18px;">
        </div>
        <div style="width:900px"><span style=" padding-left:300px; font-weight:bold; color:green"><span>
    <!--                <span style="margin-left:200px"> <a href="<?php //echo base_url();   ?>organization/info/edit_profile/<?php //echo $this->session->userdata('user_id');   ?> "> <img src="<?php //echo base_url();   ?>public/images/change_profile.jpg" height="22" alt="" border="0"></a></span>
                    -->                <span style="margin-left:200px; float:right"> 



                    </span>
                    </div>
                    <div style="width:900px; ">
                        <?php
                        if ($p->num_rows() > 0):
                            foreach ($p->result() as $info):
                            endforeach;
                            ?>
                            <?php if ($info->description == '1'): ?>        
                                <div style="width:890px; float:left; position:relative; text-align:justify; padding:10px">
                                    <span style=" padding-left:10px;"><b><font color="green"></font></b><span>
                                            <table  cellspacing="1" align="" cellpadding="2" border="0" id="theBody">
                                                <tbody>

                                                    <tr> 

                                                        <td width="100%"><?php echo $p_info->description; ?> </td>

                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        <?php endif; ?>

                                        <div style="width:220px; float:left; position:relative;">
                                            <div id="org-logo">
                                                <?php echo '<img  src=' . base_url() . 'uploads/' . $p_info->photo1 . ' width="160" height="160" />'; ?>                        
                                            </div>
                                        </div>
                                        <div style="background-color:#E8E8E8; border:1px solid #CCCCCC; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:670px; float: left">


                                            <div style="width:400px; float:left; position:relative;  margin-top:20px;  ">

                                                <span style=" padding-left:10px;"><b><font color="green">Profile Info</font></b><span>
                                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                                            <tbody>
                                                                <?php if ($info->org_number == '1'): ?>
                                                                    <tr> 
                                                                        <td width="38%"><font class="inside">Org Number:</font></td>
                                                                        <td width="33%"><?php echo $p_info->org_number; ?> </td>

                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->org_name == '1'): ?>
                                                                    <tr>
                                                                        <td width="38%"><font class="inside">Org Name:</font></td>
                                                                        <td width="33%"><?php echo $p_info->org_name; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->org_primary_address == '1'): ?>
                                                                    <tr>
                                                                        <td width="38%"><font class="inside">Org Primary Address:</font></td>
                                                                        <td width="33%"><?php echo $p_info->org_primary_address; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->org_optional_address == '1'): ?>
                                                                    <tr>
                                                                        <td width="38%"><font class="inside">Org Optional Address:</font></td>
                                                                        <td width="33%"><?php echo $p_info->org_optional_address; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->org_phone == '1'): ?>                                           
                                                                    <tr>
                                                                        <td width="38%"><font class="inside">Org Phone:</font></td>
                                                                        <td width="33%"><?php echo $p_info->org_phone; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php
                                                                $query1 = $this->db->query("select zone from zone where id='" . $p_info->area_name . "'");
                                                                foreach ($query1->result() as $info1) {
                                                                    $z_name = $info1->zone;
                                                                }
                                                                if (!empty($z_name)):$z_name = $z_name;
                                                                else:$z_name = "";
                                                                endif;
                                                                ?>
                                                                <?php if ($info->area_name == '1'): ?>                                           
                                                                    <tr>     
                                                                        <td width="18%"><font class="inside">Area Name :</font></td>
                                                                        <td width="33%"><?php echo $z_name; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                    <td width="18%"><font class="inside"><b><font color="green">Organization Admin Info:</font></b></font></td>
                                                                    <td width="33%"> </td>

                                                                </tr>
                                                                <?php if ($info->first_name == '1' && $info->last_name == '1'): ?>                                           
                                                                    <tr>
                                                                        <td width="18%"><font class="inside">Name:</font></td>
                                                                        <td width="33%"><?php echo $p_info->first_name; ?> <?php echo $p_info->last_name; ?></td>

                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->phone_no == '1'): ?>                                           
                                                                    <tr>
                                                                        <td width="18%"><font class="inside">Phone:</font></td>
                                                                        <td width="33%"><?php echo $p_info->phone_no; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->address == '1'): ?>                                           
                                                                    <tr>
                                                                        <td width="18%"><font class="inside">Address:</font></td>
                                                                        <td width="33%"><?php echo $p_info->address; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php if ($info->email == '1'): ?>                                           
                                                                    <tr>
                                                                        <td width="18%"><font class="inside">Email:</font></td>
                                                                        <td width="33%"><?php echo $p_info->email; ?> </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            </tbody></table>
                                                        </div>  
                                                        <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                                            <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                                                <tbody>


                                                                    <tr>
                                                                        <td width="18%"><font class="inside"><b><font color="green">Package Info:</font></b></font></td>
                                                                        <td width="33%"></td>
                                                                    </tr>
                                                                    <?php
                                                                    $query = $this->db->query("select * from package where id='" . $p_info->package_name . "'");
                                                                    foreach ($query->result() as $info) {
                                                                        $p_name = $info->package_name;
                                                                    }
                                                                    if (!empty($p_name)):$p_name = $p_name;
                                                                    else:$p_name = "";
                                                                    endif;
                                                                    ?>
                                                                    <?php if ($info->package_name == '1'): ?>                                           
                                                                        <tr>
                                                                            <td width="18%"><font class="inside">Package Name :</font></td>
                                                                            <td width="33%"><?php echo $p_name; ?> </td>
                                                                        </tr>
                                                                    <?php endif; ?>  
                                                                    <?php if ($info->no_of_member == '1'): ?>    
                                                                        <tr>
                                                                            <td width="18%"><font class="inside">Number Of Member:</font></td>
                                                                            <td width="33%"><?php echo $info->no_of_member; ?> </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    <?php if ($info->duration == '1'): ?>    
                                                                        <tr>
                                                                            <td width="18%"><font class="inside">Duration:</font></td>
                                                                            <td width="33%"><?php echo $info->duration; ?>  Year</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    <?php if ($info->amount == '1'): ?>    
                                                                        <tr>
                                                                            <td width="18%"><font class="inside">Package Amount:</font></td>
                                                                            <td width="33%"><?php echo $info->amount; ?>  (<?php echo $info->currency; ?>)</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody></table>
                                                        </div>
                                                    <?php else:echo "<font style='color:red'> Sorry you are not permitted to view this  organization Info</font>";
                                                    endif; ?>

                                                    </div>
                                                    </div>
                                                    </div>
                                                

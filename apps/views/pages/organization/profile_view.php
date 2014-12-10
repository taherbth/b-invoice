<?php
$query = $this->db->query("select * from member where mem_id='" . $id . "'");

foreach ($query->result() as $p_info):
endforeach;
$query1 = $this->db->query("select * from member_info_previlize where member_id='" . $id . "'");
if ($query1->num_rows() > 0):
    foreach ($query1->result() as $previlize_info):
    endforeach;
    ?>
    <style>
        table { font-style:italic; font-family:Arial, Helvetica, sans-serif; }

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
                            <div style="width:400px; float:left; position:relative; padding:25px;  margin-top:20px;  ">
                                <span style=" padding-left:10px;"><b><font color="green">Profile Info</font></b><span>
                                        <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                            <tbody>
                                                <?php if ($previlize_info->member_group == '1'): ?>
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
                                                        <td width="18%" style="padding-left:15px"><font class="inside"><b>Group Name :</b></font></td>
                                                        <td width="33%"><b><?php echo $g_name; ?></b> </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($previlize_info->name == '1'): ?>
                                                    <tr> 
                                                        <td width="38%" style="padding-left:58px"><font class="inside">Name:</font></td>
                                                        <td width="33%"><?php echo $p_info->name; ?> </td>

                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($previlize_info->phone == '1'): ?>
                                                    <tr>
                                                        <td width="38%" style="padding-left:58px"><font class="inside">Phone:</font></td>
                                                        <td width="33%"><?php echo $p_info->phone; ?> </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($previlize_info->email == '1'): ?>
                                                    <tr>
                                                        <td width="18%" style="padding-left:58px"><font class="inside">Email:</font></td>
                                                        <td width="33%"><?php echo $p_info->email; ?> </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($previlize_info->profile_message == '1'): ?>
                                                    <tr>
                                                        <td width="18%" style="text-align:left"><font class="inside">profile_message:</font></td>
                                                        <td width="33%"><?php echo $p_info->profile_message; ?> </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($previlize_info->household_size == '1'): ?>
                                                    <tr>
                                                        <td width="18%"><font class="inside">HouseHold Size:</font></td>
                                                        <td width="33%"><?php echo $p_info->household_size; ?> </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($previlize_info->username == '1'): ?>                                                <tr>
                                                        <td width="18%" style="padding-left:28px"><font class="inside">Username :</font></td>
                                                        <td width="33%"><?php echo $p_info->username; ?> </td>
                                                    </tr>
                                                <?php endif; ?>  
                                                <?php if ($previlize_info->address == '1'): ?>
                                                    <tr>
                                                        <td width="38%" style="padding-left:42px"><font class="inside">Address:</font></td>
                                                        <td width="33%"><?php echo $p_info->address; ?> </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody></table>

                                        </div>  
                                        <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                            <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                                <tbody>

                                                </tbody></table>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                    <?php
                                    else: echo "<p style='margin-top:100px; padding-left:50px'><font color='red'>!Sorry you are not permitted to access the member profile</font></p>"; 
			 endif;                      

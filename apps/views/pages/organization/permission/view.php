<h3 class="content_edit">Org Admin Control Panel View Group Permission</h2>

<?php echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view.css" />

<?php
foreach ($query1 as $info):
    $query = $this->db->query("select group_name from org_group where id='" . $info->group_id . "'");
    foreach ($query->result() as $p) {
        $g_name = $p->group_name;
    }

    if (!empty($g_name)):$g_name = $g_name;
    else:$g_name = "";
    endif;
    ?>
    <div class="SearchListing">
        <div style="width:900px; float:left; position:relative">
            <div class="ListingDetails">
                <ul> <li><label class="From"><b>Group Name:</b> </label> <span class="HighLight" style="color:#990033; font-weight:bold"><?php echo $g_name; ?> </span><br>

                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li><label class="From"><b>Sending Email: </b> </label> <span class="HighLight" style="color:#990033; font-weight:bold"> <?php
    if ($info->sending_email == 1):echo "Yes";
    else:echo "No";
    endif;
    ?></span><br>
                        <label class="From"><b>Sending Sms: </b></label> 
                        <span class="HighLight" style="color: #009966; font-weight:bold"> <?php
    if ($info->sending_sms == 1):echo "Yes";
    else:echo "No";
    endif;
    ?></span> <br>
                        <label class="From"><b>Sending Post: </b></label> 
                        <span class="HighLight" style="color: #990033; font-weight:bold"> <?php
                        if ($info->sending_post == 1):echo "Yes";
                        else:echo "No";
                        endif;
                        ?></span> <br>
                        <label class="From"><b>Profile: </b></label> 
                        <span class="HighLight" style="color: #009966; font-weight:bold"> <?php
                        if ($info->profile == 1):echo "Public";
                        else:echo "Private";
                        endif;
                        ?></span><br>
                        <label class="From"><b>Message:   </b></label> 
                        <span class="HighLight" style="color: #990033; font-weight:bold"><?php
                        if ($info->message == 1):echo "Public";
                        else:echo "Private";
                        endif;
                        ?></span><br>
                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li>
                        <a href="<?php echo base_url(); ?>organization/info/group_edit/<?php echo $info->group_id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/org_group_permission_delete/<?php echo $info->group_id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>


                </ul>
            </div>
        </div>
        <div style="width:900px; float:left; height:50px; padding-left:250px">

        </div>

    </div>

<?php endforeach; ?>



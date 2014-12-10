<h3 class="content_edit">Org Admin Control Panel View Expired and Nearly Experied Member</h2>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

<style>
    .SearchListing{
        border-bottom: 1px solid #C4C4C4;
        border-left: 1px solid #C4C4C4;
        border-right: 1px solid #C4C4C4;
        border-top: 1px solid #C4C4C4;
        margin-bottom:15px; 
        margin-top:20px;
        -moz-border-radius: 15px 15px 15px 15px;
    }
    .SearchListing p{ padding-left:10px; text-align:left}

</style>

  <fieldset>
      <legend align="left">View Expired Member </legend>

<?php echo $this->session->flashdata('message'); ?>
<?php
$current_date = date("Y-m-d");
$query1 = $this->db->query("select * from member where org_id='" . $this->session->userdata('user_id') . "'and expire_date<'" . $current_date . "'");
?>
<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th> ID</th>
        <th> Name</th>
        <th> Username</th>
        <th>Expire Date</th>       
        <th>Address</th>       
        <th>Phone</th>
        <th>Email</th>
        <th>Profile Message</th>
        <th>Bank Info</th>

    </tr>
    <?php
    $i = 1;
    foreach ($query1->result() as $expired_member_info):
        if ($i % 2 == 0): $color = "#FFFFFF";
        else : $color = "#DDDDDD";
        endif;
        ?>
        <tr bgcolor="<?php echo $color; ?>">
            <td width="3%" align="center"><?php echo $expired_member_info->id; ?></td>
            <td width="3%" align="center"><?php echo $expired_member_info->name; ?></td>
            <td width="3%" align="center"><?php echo $expired_member_info->username; ?></td>
            <td width="3%" align="center"><?php echo $expired_member_info->expire_date; ?></td>
            <td align="center" width="8%"><?php echo $expired_member_info->address; ?></td>               
            <td align="center" width="8%"><?php echo $expired_member_info->phone; ?></td>               
            <td align="center" width="8%"><?php echo $expired_member_info->email; ?></td>               
            <td align="center" width="8%"><?php echo $expired_member_info->profile_message; ?></td>               
            <td align="center" width="8%"><?php echo $expired_member_info->bank_info; ?></td>               

        </tr>
        <?php
        $i = $i + 1;
    endforeach;
    ?>


</table>         
</fieldset>

  <fieldset>
      <legend align="left">View Nearly Expired Member</legend>

<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th> ID</th>
        <th> Name</th>
        <th> UserName</th>
        <th>Expire Date</th>       
        <th>Address</th>       
        <th>Phone</th>
        <th>Email</th>
        <th>Profile Message</th>
        <th>Bank Info</th>

    </tr>
    <?php
    $current_date = date("Y-m-d");
    $query = $this->db->query("select * from member where org_id='" . $this->session->userdata('user_id') . "'");
    $i = 1;
    foreach ($query->result() as $member_info):
        $e_date = $member_info->expire_date;
        $newdate = strtotime('-10 day', strtotime($e_date));
        $newdate = date('Y-m-j', $newdate);
        if ($current_date >= $newdate):
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $member_info->id; ?></td>
                <td width="3%" align="center"><?php echo $member_info->name; ?></td>
                <td width="3%" align="center"><?php echo $member_info->username; ?></td>
                <td width="3%" align="center"><?php echo $member_info->expire_date; ?></td>
                <td align="center" width="8%"><?php echo $member_info->address; ?></td>               
                <td align="center" width="8%"><?php echo $member_info->phone; ?></td>               
                <td align="center" width="8%"><?php echo $member_info->email; ?></td>               
                <td align="center" width="8%"><?php echo $member_info->profile_message; ?></td>               
                <td align="center" width="8%"><?php echo $member_info->bank_info; ?></td>               
            </tr>
            <?php
            $i = $i + 1;
        endif;
    endforeach;
    ?>

</table>         
</fieldset>








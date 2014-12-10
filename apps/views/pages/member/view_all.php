<h3 class="content_edit">Member Control Panel View All Member</h2>
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

<?php echo $this->session->flashdata('message'); ?>
<fieldset>
    <legend align="left">View All Member</legend>
    <table width="98%" border="1"  style="border-collapse:collapse; margin:10px;" align="center">
        <tr>
            <th> ID</th>       
            <th>Member Name</th>      

        </tr>

        <?php
        if (count($query1)) {
            $i = $loop_start + 1;
            foreach ($query1 as $package_info) {
                if ($i % 2 == 0): $color = "#FFFFFF";
                else : $color = "#DDDDDD";
                endif;
                ?>

                <tr bgcolor="<?php echo $color; ?>">
                    <td width="3%" align="center"><?php echo $i; ?></td>               
                    <td align="center" width="8%">
                        <a href="<?php echo base_url(); ?>org_member/info/view_member_profile/<?php echo $package_info->id; ?> ">
                            <?php echo $package_info->name; ?>
                        </a>


                </tr>
                <?php
                $i = $i + 1;
            }
        }
        ?>
    </table>
</fieldset>
<p class="pagination" style="width:900px; clear:both; text-align:center"><?php echo $this->pagination->create_links(); ?></p>        

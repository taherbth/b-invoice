<h3 class="content_edit">Admin Control Panel View Sms And letter Bill </h2>
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

<?php if (count($query1)) : ?>
     <fieldset>
      <legend align="left">View Letter Bill</legend>

    <table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
        <tr>
            <th>Org No</th>
            <th>Org Name</th>              
            <th>Letter Sending Date</th>             
            <th>Letter Cost</th>
            <th>No of Letter</th> 
            <th>Total</th>             

        </tr>
        <?php
        foreach ($query1 as $billing_info1):
            $query123 = $this->db->query("select * from user_info where id='" . $billing_info1->org_id . "'");
            foreach ($query123->result() as $info):
                $package_name = $info->package_name;
            endforeach;
            if (!empty($package_name)):$package_name = $package_name;
            else:$package_name = "";
            endif;
			
            $r1 = $this->db->query("select * from cost where package_name='" . $package_name . "'");
            if ($r1->num_rows() > 0) {
                foreach ($r1->result() as $c_info):
                    $letter_cost = $c_info->letter_cost;
                    $sms_cost = $c_info->sms_cost;
                    $currency = $c_info->currency;
                endforeach;
                if (!empty($letter_cost)):$letter_cost = $letter_cost;
                else:$letter_cost = "0";
                endif;
                if (!empty($currency)):$currency = $currency;
                else:$currency = "";
                endif;
            }

            else {
                $r2 = $this->db->query("select * from cost where package_name='Globalcost'");
                if ($r2->num_rows() > 0) {
                    foreach ($r2->result() as $c_info1):
                        $letter_cost = $c_info1->letter_cost;
                        $sms_cost = $c_info1->sms_cost;
                        $currency = $c_info1->currency;
                    endforeach;
                    if (!empty($letter_cost)):$letter_cost = $letter_cost;
                    else:$letter_cost = "0";
                    endif;
                    if (!empty($currency)):$currency = $currency;
                    else:$currency = "";
                    endif;
                }
                else {
                    $letter_cost = 0;
                    $sms_cost = 0;
                    $currency = "";
                }
            }
        endforeach;       
        ?>
        <?php
        $i = 1;
        $total_number_letter = 0;
        $total_amount = 0;
        foreach ($query1 as $billing_info) {
            $query12 = $this->db->query("select * from user_info where id='" . $billing_info->org_id . "'");
            foreach ($query12->result() as $info):
                $name = $info->org_name;
                $org_number = $info->org_number;
            endforeach;
            if (!empty($name)):$name = $name;
            else:$name = "";
            endif;
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $org_number; ?></td>              
                <td width="3%" align="center"><?php echo $name; ?></td>              
                <td align="center" width="8%"><?php echo $billing_info->sending_date; ?></td>               

                <td align="center" width="8%"><?php echo $letter_cost; ?> (<?php echo $currency; ?>)</td>               
                <?php $total = $letter_cost * $billing_info->no_of_letter; ?>
                <td align="center" width="8%"><?php echo $billing_info->no_of_letter; ?></td>
                <td align="center" width="8%"><?php echo $total; ?> (<?php echo $currency; ?>)</td> </tr>            
            <?php
            $total_number_letter = $total_number_letter + $billing_info->no_of_letter;
            $total_amount = $total_amount + $total;
            $i = $i + 1;
        }
        ?>
        <tr bgcolor="#FFFFFF">
            <td colspan="5" align="right" style="padding-right:40px;"><b>Total letter = <?php echo $total_number_letter; ?></b></td>
            <td colspan="6" align="right" style="padding-right:40px;"><b>Total cost = <?php echo $total_amount; ?>(<?php echo $currency; ?>)</b></td>
        </tr>
        <?php
    endif;
    ?>
</table>
</fieldset>
<?php if (count($query2)) : ?>
     <fieldset>
      <legend align="left">View Sms Bill</legend>

    <table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
        <tr>
            <th>Org No</th>
            <th>Org Name</th>              
            <th>Sms Sending Date</th>             
            <th>SMS Cost</th>
            <th>No of Sms</th> 
            <th>Total</th>             

        </tr>
        <?php
        foreach ($query2 as $billing_info2):
            $r = $this->db->query("select * from user_info where id='" . $billing_info2->org_id . "'");
            foreach ($r->result() as $r1):
                $package_name1 = $r1->package_name;
            endforeach;
            if (!empty($package_name1)):$package_name1 = $package_name1;
            else:$package_name1 = "";
            endif;
			
            $r10 = $this->db->query("select * from cost where package_name='" . $package_name1 . "'");
            if ($r10->num_rows() > 0) {
                foreach ($r10->result() as $c_info1):
                    $letter_cost1 = $c_info1->letter_cost;
                    $sms_cost1 = $c_info1->sms_cost;
                    $currency1= $c_info1->currency;
                endforeach;
                if (!empty($letter_cost1)):$letter_cost1 = $letter_cost1;
                else:$letter_cost1 = "0";
                endif;
                if (!empty($currency1)):$currency1 = $currency1;
                else:$currency1 = "";
                endif;
            }

            else {
                $r21 = $this->db->query("select * from cost where package_name='Globalcost'");
                if ($r21->num_rows() > 0) {
                    foreach ($r21->result() as $c_info11):
                        $letter_cost1 = $c_info11->letter_cost;
                        $sms_cost1 = $c_info11->sms_cost;
                        $currency1 = $c_info11->currency;
                    endforeach;
                    if (!empty($letter_cost1)):$letter_cost1 = $letter_cost1;
                    else:$letter_cost1 = "0";
                    endif;
                    if (!empty($currency1)):$currency1 = $currency1;
                    else:$currency1 = "";
                    endif;
                }
                else {
                    $letter_cost1 = 0;
                    $sms_cost1 = 0;
                    $currency1 = "";
                }
            }
        endforeach;       
        ?>
        <?php
        $i = 1;
        $total_number_sms = 0;
        $total_amount1 = 0;
        foreach ($query2 as $billing_info3) {
            $query12 = $this->db->query("select * from user_info where id='" . $billing_info3->org_id . "'");
            foreach ($query12->result() as $info):
                $name = $info->org_name;
                $org_number = $info->org_number;
            endforeach;
            if (!empty($name)):$name = $name;
            else:$name = "";
            endif;
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $org_number; ?></td>              
                <td width="3%" align="center"><?php echo $name; ?></td>              
                <td align="center" width="8%"><?php echo $billing_info3->sending_date; ?></td>               

                <td align="center" width="8%"><?php echo $sms_cost; ?> (<?php echo $currency; ?>)</td>               
                <?php $total = $sms_cost * $billing_info3->no_of_sms; ?>
                <td align="center" width="8%"><?php echo $billing_info3->no_of_sms; ?></td>
                <td align="center" width="8%"><?php echo $total; ?> (<?php echo $currency; ?>)</td> </tr>            
            <?php
            $total_number_sms = $total_number_sms + $billing_info3->no_of_sms;
            $total_amount1 = $total_amount1 + $total;
            $i = $i + 1;
        }
        ?>
        <tr bgcolor="#FFFFFF">
            <td colspan="5" align="right" style="padding-right:40px;"><b>Total letter = <?php echo $total_number_sms; ?></b></td>
            <td colspan="6" align="right" style="padding-right:40px;"><b>Total cost = <?php echo $total_amount1; ?>(<?php echo $currency; ?>)</b></td>
        </tr>
        <?php
    endif;
    ?>
</table>
</fieldset>


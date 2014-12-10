<h3 class="content_edit">Org Admin Control Panel View Letter and Sms Bill</h2>
<?php
        $q1 = $this->db->query("select * from org_cost where org_id='" . $this->session->userdata('user_id') . "'");
        foreach ($q1->result() as $currency_info):
            $letter_cost = $currency_info->letter_cost;
            $sms_cost = $currency_info->sms_cost;
            $currency = $currency_info->currency;
        endforeach;
        if (!empty($letter_cost)):$letter_cost = $letter_cost;
        else:$letter_cost = "0";
        endif;
        if (!empty($currency)):$currency = $currency;
        else:$currency = "";
        endif;
        ?>
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
    <fieldset>
      <legend align="left">Letter </legend>
    <table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
        <tr>
            <th>Member ID</th>
            <th>Member Name</th>              
            <th>Letter Sending Date</th>             
            <th>Per Letter Cost</th>
            <th>No of Letter</th> 
            <th>Total</th>             
        </tr>
        <?php
		if (count($query1)) :
        $i = 1;
        $total_number_letter = 0;
        $total_amount = 0;
        foreach ($query1 as $billing_info) {
            $query1 = $this->db->query("select * from member where id='" . $billing_info->sender_name . "'");
            foreach ($query1->result() as $info):
                $name = $info->name;
            endforeach;
            if (!empty($name)):$name = $name;
            else:$name = "";
            endif;
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $billing_info->sender_name; ?></td>              
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
            <td colspan="5" align="right" style="padding-right:40px;"><b>Total Sms = <?php echo $total_number_letter; ?></b></td>
            <td colspan="6" align="right" style="padding-right:40px;"><b>Total cost = <?php echo $total_amount; ?>(<?php echo $currency; ?>)</b></td>
        </tr>
        <?php 
    endif;
    ?>
</table>
</fieldset>
   <fieldset>
      <legend align="left">Sms </legend>
<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
        <tr>
            <th>Member ID</th>
            <th>Member Name</th>              
            <th>Sms Sending Date</th>             
            <th>Per Sms Cost</th>
            <th>No of Sms</th> 
            <th>Total</th>             
        </tr>
        <?php
		if (count($query2)) :
        $j = 1;
        $total_number_sms= 0;
        $total_amount1 = 0;
        foreach ($query2 as $billing_info2) {
            $query12 = $this->db->query("select * from member where id='" . $billing_info2->sender_name . "'");
            foreach ($query12->result() as $info2):
                $name2 = $info2->name;
            endforeach;
            if (!empty($name2)):$name2 = $name2;
            else:$name2 = "";
            endif;
            if ($j % 2 == 0): $color1 = "#FFFFFF";
            else : $color1 = "#DDDDDD";
            endif;?>
			 
           
            <tr bgcolor="<?php echo $color1; ?>">
                <td width="3%" align="center"><?php echo $billing_info2->sender_name; ?></td>              
                <td width="3%" align="center"><?php echo $name2; ?></td>              
                <td align="center" width="8%"><?php echo $billing_info2->sending_date; ?></td>               

                <td align="center" width="8%"><?php echo $sms_cost; ?> (<?php echo $currency; ?>)</td>               
                <?php $total1 = $sms_cost * $billing_info2->no_of_sms; ?>
                <td align="center" width="8%"><?php echo $billing_info2->no_of_sms; ?></td>
                <td align="center" width="8%"><?php echo $total1; ?> (<?php echo $currency; ?>)</td> </tr>            
            <?php
            $total_number_sms = $total_number_sms + $billing_info2->no_of_sms;
            $total_amount1 = $total_amount1 + $total1;
            $j = $j + 1;
        }
        ?>
        <tr bgcolor="#FFFFFF">
            <td colspan="5" align="right" style="padding-right:40px;"><b>Total Sms = <?php echo $total_number_sms ?></b></td>
            <td colspan="6" align="right" style="padding-right:40px;"><b>Total cost = <?php echo $total_amount1; ?>(<?php echo $currency; ?>)</b></td>
        </tr>
         <?php 
    endif;
    ?>  
</table>

</fieldset>


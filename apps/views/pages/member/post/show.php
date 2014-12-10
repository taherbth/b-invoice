<h3 class="content_edit">Member Control Panel  View article</h2>

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
      <legend align="left">View article</legend>
<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th>Title</th>
        <th>Heading</th>
        <th>Text</th>       
        <th>Creation Date</th>       
        <th>Importance</th>
        <th>Expire Date</th>
    </tr>
    <?php
    if (count($query1)) {
        $i = 1;
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->title; ?></td>
                <td width="3%" align="center"><?php echo $package_info->heading; ?></td>
                <td width="3%" align="center"><?php echo substr("$package_info->text",0,60); ?></td>
                <td width="3%" align="center"><?php echo $package_info->date_of_creation; ?></td>              
                <td width="3%" align="center"><?php echo $package_info->importance; ?></td>
                <td width="3%" align="center"><?php echo $package_info->expire_date; ?></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>





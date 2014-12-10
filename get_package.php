<?php
//mysql_connect("localhost","mastulbd_mastul","mastul");
mysql_connect("localhost", "root", "");
//mysql_select_db("mastulbd_mastul");
mysql_select_db("shubondhon");
$cid = $_GET['cid'];
$ad_package = mysql_query("select * from investor_rate");
if (mysql_num_rows($ad_package) == 0) {
    echo "<span style='color:red; margin-left:200px'>No Package Created</span>";
} else {
    ?>
    <table align="right" width="25%" style="background-color:#000000; color:white">
        <tr>
            <th style="text-align:right; font-weight:bold; color:#CA5353">M/N</td> 
            <th style="text-align:right; font-weight:bold; color:#CA5353">Package</td>           
            <th style="text-align:right; font-weight:bold;; color:#CA5353">Availability</td>           
        </tr>
        <?php
        while ($row_sc = mysql_fetch_array($ad_package)) {

            $id = $row_sc['id'];
            $package_name = $row_sc['package_name'];
            $q1 = mysql_query("select * from profile where acc_no='" . $cid . "'and savings_package='" . $id . "'");
            if (mysql_num_rows($q1) == 0) {
                ?>
                <tr>
                    <th style="text-align:right; font-weight:bold; color:#B5DE87"><?php echo $cid; ?></td> 
                    <th style="text-align:right; font-weight:bold; color:#B5DE87"><?php echo $package_name; ?> </td>           
                    <th style="text-align:right; font-weight:bold; color:#B5DE87">Available</td>           
                </tr>


            <?php } else { ?>
                <tr>
                    <th style="text-align:right; font-weight:bold; color:#B5DE87"><?php echo $cid; ?></td> 
                    <th style="text-align:right; font-weight:bold; color:#B5DE87"><?php echo $package_name; ?> </td>           
                    <th style="text-align:right; font-weight:bold; color:#B5DE87">Not available</td>           
                </tr>   

                <?php
            }
        }
    }
    ?>
</table>
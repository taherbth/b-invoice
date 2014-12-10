<?php
//mysql_connect("localhost","mastulbd_mastul","mastul");
mysql_connect("localhost", "root", "");
//mysql_select_db("mastulbd_mastul");
mysql_select_db("shubondhon");
$cid = $_GET['cid'];

$ad_sc = mysql_query("select * from supplier_invoice where purchase_no='" . $cid . "'");
if (mysql_num_rows($ad_sc) == 0) {
    echo "<span style='color:red; margin-left:200px'>Invalid Purchase No</span>";
} else {
    while ($row_sc = mysql_fetch_array($ad_sc)) {
        $purchase_amount = $row_sc['purchase_amount'];
        $paid = $row_sc['paid'];
        $due = $row_sc['due'];
        $supplier_id = $row_sc['supplier_id'];
    }
    ?>
    <table align="right" width="25%" style="background-color:#000000; color:white">

        <tr>
            <td style="text-align:right; font-weight:bold">Total :</td>           
            <td> <?php echo $purchase_amount; ?> </td>
        </tr>
        <tr>
            <td style="text-align:right;font-weight:bold">Paid :</td>
            <td> <?php echo $paid; ?></td>
        </tr>
        <tr>
            <td style="text-align:right;font-weight:bold"> Due :</td>
            <td><?php echo $due; ?></td>
        </tr>
        <tr>
            <td ></td>
            <td> <input type="hidden" name="supplier_id" readonly="readonly" value="<?php echo $supplier_id; ?>"> </td>
        </tr>
    </table>

    <?php
}
?>
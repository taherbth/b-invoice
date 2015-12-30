<?php
//mysql_connect("localhost","mastulbd_mastul","mastul");
mysql_connect("localhost", "root", "");
//mysql_select_db("mastulbd_mastul");
mysql_select_db("adminscentral");
 $cid = $_GET['cid'];
//echo $cid;die();
if($cid ==""){
 echo "<font color='red'>Please Input an Organization Number</font>";
}
else{
    
    
//$result = mysql_query("select org_number from user_info where org_number='" . $cid . "'");
$result = mysql_query("select org_number from organization_info where org_number='" . $cid . "'");
//print_r($ad_package);die();
if(mysql_num_rows($result)>0){
 echo "<font color='red'>Organization Number Exists.</font>";

}
else{
 echo "<font color='green'>Organization Number is Available</font>";
}
}
?>



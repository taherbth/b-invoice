<?php
//mysql_connect("localhost","root","");
mysql_connect("acdatabase-113786.mysql.binero.se", "113786_ty75213", "nkl1WK3eZ3WqUo5J8gHw");
mysql_select_db("113786-acdatabase");
 $text_com = $_POST['text_com'];
 $comment_id = $_GET['comment_id'];
//echo $cid;die();
if($comment_id ==""){
 echo "<font color='red'>Comment not exists!!!</font>";
}
else{   
    
//$result = mysql_query("select org_number from user_info where org_number='" . $cid . "'");
$result = mysql_query("UPDATE comment_on_forum_topic SET comment='".$text_com."' where comment_id='" . $comment_id . "'");
//print_r($ad_package);die();
if(mysql_affected_rows() >0){
 echo "<font color='green'>Edited...</font>";

}
else{
 echo "<font color='green'>Not Edited...</font>";
}
}
?>



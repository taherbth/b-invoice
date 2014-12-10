<?php
mysql_connect("localhost","root","");
mysql_select_db("honeycom");

$pro_type = $_GET['pro_type'];
$pro_name = $_GET['pro_name'];
$pro_id = $_GET['pro_id'];
  
if(!empty($pro_type)){
	$ad_sc = mysql_query("select * from product_type WHERE inventory_type = '$pro_type'");
	$data = '<option value="">----- Select -----</option>';
	while($row_sc = mysql_fetch_array($ad_sc)){
		$product_type_id = $row_sc['product_type_id'];
		$type_name = $row_sc['type_name'];
		$data = $data . '<option value="'.$product_type_id.'">'.$type_name.'</option>';	
	}
	if(!empty($data)):
		echo '
		<select name="p_type" id="p_type" style="border:1px solid #CCC; width:150px;" onchange="getProductName(this.value)">
		  '.$data.'
		</select>';
   else:
		echo '
		<select name="p_type" id="p_type" style="border:1px solid #CCC; width:150px;">
		  <option value="">----- Select -----</option>
		</select>';
   endif;	
  }
  
 elseif(!empty($pro_name)){
	$ad_sc = mysql_query("select * from product WHERE product_type_id = '$pro_name' && status !='inactive'");
	$data = '<option value="">----- Select -----</option>';
	while($row_sc = mysql_fetch_array($ad_sc)){
		$product_id = $row_sc['product_id'];
		$name = $row_sc['name'];
		$data = $data . '<option value="'.$product_id.'">'.$name.'</option>';	
	}
	if(!empty($data)):
		echo '
		<select name="p_name" id="p_name" style="border:1px solid #CCC; width:150px;" onchange="getProductPrice(this.value)">
		  '.$data.'
		</select>';
   else:
		echo '
		<select name="p_name" id="p_name" style="border:1px solid #CCC; width:150px;">
		  <option value="">----- Select -----</option>
		</select>';
   endif;	
  }
  
 elseif(!empty($pro_id)){
	$ad_sc = mysql_query("select * from product WHERE product_id = '$pro_id' && status !='inactive'");
	$row_sc = mysql_fetch_array($ad_sc);
	$unit_type_id = $row_sc['unit_type_id'];
	$sell_price = $row_sc['sell_price'];
	
	$ad_sc2 = mysql_query("select * from unit_type WHERE unit_type_id = '$unit_type_id'");
	$row_sc2 = mysql_fetch_array($ad_sc2);
	$unit_type = '<font color="green">'.$row_sc2['unit_type'];

      
	if(!empty($sell_price)):
		echo 
		'&nbsp;<input type="text" id="qty" name="qty" size="11" value="1">&nbsp;&nbsp;&nbsp;&nbsp;
		'.ucwords($unit_type).'<input type="hidden" id="u_type" name="u_type" value="'.$unit_type_id.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" id="price" name="price" value="'.$sell_price.'" size="6" >';
   else:
		echo '
		<select name="u_type" id="u_type" style="border:1px solid #CCC; width:110px;">
		  <option value="">----- Select -----</option>
		</select>';
   endif;	
  }
  
else
{
echo "";
}
?>
<?php
mysql_connect("localhost","root","");
mysql_select_db("honeycom");

$deptid = $_GET['deptid'];
$pro_type = $_GET['pro_type'];
$pro_name = $_GET['pro_name'];
$uni_type = $_GET['uni_type'];

if(!empty($deptid)){
	$ad_sc = mysql_query("select * from employeeinfo WHERE dept = '$deptid'");
	$data = '';
	while($row_sc = mysql_fetch_array($ad_sc)){
		$id = $row_sc['id'];
		$name = $row_sc['name'];
		$data = $data . '<option value="'.$id.'">'.$name.'</option>';	
	}
	if(!empty($data)):
	echo '
	<select name="emp_name" id="emp_name" style="border:1px solid #CCC; width:325px;">
	  '.$data.'
	</select>';
   else:
	echo "No Employee";
   endif;	
  }
  
 elseif(!empty($pro_type)){
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
		<select name="p_name" id="p_name" style="border:1px solid #CCC; width:150px;" onchange="getUnitType(this.value)">
		  '.$data.'
		</select>';
   else:
		echo '
		<select name="p_name" id="p_name" style="border:1px solid #CCC; width:150px;">
		  <option value="">----- Select -----</option>
		</select>';
   endif;	
  }
  
 elseif(!empty($uni_type)){
	$ad_sc = mysql_query("select * from unit_type WHERE unit_type_id = '$uni_type'");
	$data = '';
	$row_sc = mysql_fetch_array($ad_sc);
	$unit_type_id = $row_sc['unit_type_id'];
	$unit_type = '<font color="green">'.$row_sc['unit_type'].'</font>';
      
	if(!empty($unit_type)):
		echo ucwords($unit_type).'<input type="hidden" name="u_type" id="u_type" value = "'.$unit_type_id.'" >';
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
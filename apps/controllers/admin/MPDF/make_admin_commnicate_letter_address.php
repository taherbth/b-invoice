<?php 

$html ='<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice</title>
	<style>
		*
		{
			margin:0;
			padding:0;
			font-family:Arial;
			font-size:10pt;
			color:#000;
		}
		body
		{
			width:100%;
			font-family:Arial;
			font-size:10pt;
			margin:0;
			padding:0;
		}
		
		p
		{
			margin:0;
			padding:0;
		}
		
		#wrapper
		{
			width:180mm;
			margin:0 15mm;
		}
		
		.page
		{
			height:297mm;
			width:210mm;
			page-break-after:always;
		}

		table
		{
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
			
			border-spacing:0;
			border-collapse: collapse; 
			
		}
		
		table td 
		{
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding: 2mm;
		}
		
		table.heading
		{
			height:50mm;
		}
		
		h1.heading
		{
			font-size:14pt;
			color:#000;
			font-weight:normal;
		}
		
		h2.heading
		{
			font-size:9pt;
			color:#000;
			font-weight:normal;
		}
		
		hr
		{
			color:#ccc;
			background:#ccc;
		}
		
		#invoice_body
		{
			height: 90mm;
		}
		
		#invoice_body , #invoice_total
		{	
			width:100%;
		}
		#invoice_body table , #invoice_total table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
	
			border-spacing:0;
			border-collapse: collapse; 
			
			margin-top:5mm;
		}
		
		#invoice_body table td , #invoice_total table td
		{
			text-align:center;
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding:2mm 0;
		}
		
		#invoice_body table td.mono  , #invoice_total table td.mono
		{
			font-family:monospace;
			text-align:right;
			padding-right:3mm;
			font-size:10pt;
		}
		
		#footer
		{	
			width:180mm;
			margin:0 15mm;
			padding-bottom:3mm;
		}
		#footer table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
			
			background:#eee;
			
			border-spacing:0;
			border-collapse: collapse; 
		}
		#footer table td
		{
			width:25%;
			text-align:center;
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
    }
    
    
    
    .logo{
    float:left;
    color: black;
    font-size: 24px;
    font-style: italic;
    font-weight: normal;
    margin-right: 200px;
}


.faktura_no {
    /*-moz-border-radius: 12px 12px 12px 12px*/;
     border-radius: 12px 12px 12px 12px;
     width: 550px;
     float:left;
     border: black 2px solid;
     background-color:#F2F2F2;
}

.faktura_title{
    margin: 20px;
    float:left;
    color: black;
    font-size: 30px;
    font-weight: bold;
}

.faktura_no_value{
    margin: 20px;
    float:right;
    color: black;
    font-size: 20px;
    font-weight: bold;
}

	</style>
</head>
<body>
<div id="wrapper">
    
	<div id="content">
		
		<div id="invoice_body">
        <br/><br/>'; ?>
		
<?php if($flag=="individual") {
    $letter_individual_address = explode("|",$letter_data["letter_individual_address"]);
    foreach($letter_individual_address as $key => $value){
?>

<?php 
$html .= '<table style="width:100%; height:35mm;">
<tr>
    <td valign="top" style="width:50%;text-align:left; padding-left:20px;">		
        <b>From : </b><br />
        Adminscentral<br />
        Österögatan 1<br />
        16440 KISTA<br />
        <br />
        Website : www.adminscentral.com<br />
        E-mail : info@adminscentral.se<br />
        Phone : 0850164494
        <br />        
        
    </td>
    <td style="width:50%;text-align:left; padding-left:20px;">
        <b>To :</b><br />
        '.$value.'<br/>
        
        <br />        
        
    </td>
    </tr>
</table>'; ?>

<?php
}
}

elseif($flag=="organization") {
    
mysql_connect("localhost", "root", "");
//mysql_select_db("mastulbd_mastul");
mysql_select_db("adminscentral");
$receiver_org_ids = $letter_data['receiver_org_ids'];
$sql = "SELECT * FROM member mem, organization_info org_info 
             WHERE (mem.mem_type_id='Admin' AND org_info.approval_status=1) 
             AND (mem.org_id IN($receiver_org_ids) AND mem.org_id=org_info.id)";
$result = mysql_query($sql);

if(mysql_num_rows($result)){
while ($rows = mysql_fetch_array($result)) {

if($rows['org_country']=="DEU"){$rows['org_country']= "GERMAN";}
if($rows['org_country']=="NOR"){$rows['org_country'] = "NORWAY";}
if($rows['org_country']=="DNK"){$rows['org_country'] = "DENMARK";}
if($rows['org_country']=="FIN"){$rows['org_country'] = "FINLAND";}
if($rows['org_country']=="GBR"){$rows['org_country'] = "UK";}
if($rows['org_country']=="SWE"){$rows['org_country'] = "SWEDEN";}
?>

<?php 
$html .= '<table style="width:100%; height:35mm;">
<tr>
    <td valign="top" style="width:50%;text-align:left; padding-left:20px;">		
        <b>From : </b><br />
        Adminscentral<br />
        Österögatan 1<br />
        16440 KISTA<br />
        <br />
        Website : www.adminscentral.com<br />
        E-mail : info@adminscentral.se<br />
        Phone : 0850164494
        <br />        
        
    </td>
    <td style="width:50%;text-align:left; padding-left:20px;">
        <b>To :</b><br />
        '.$rows['org_name'].'<br/>
         '.$rows['org_primary_address'].
                '<br /> '.$rows['org_city'].'<br /> '.$rows['org_zip'].' &nbsp; '.$rows['org_state']
                .' <br /> '.$rows['org_country'].' <br /> Tel &nbsp;'.$rows['org_phone'].'
        <br />        
        
    </td>
    </tr>
</table>'; ?>

<?php
}
}
}

$html .= '
</div>
	
	<br />
	
	</div>';
	
	?>
    
<?php 

 if($letter_data['letter_footer']){
	$html .= '<htmlpagefooter name="footer">
		<hr />
		<div id="footer">	
			<table>
				<tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
			</table>
		</div>
	</htmlpagefooter>
	<sethtmlpagefooter name="footer" value="on" />';
    
    } 
	
    
$html .= '</body>
</html>';



$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);
	    
$mpdf->Output('admin_letter/letter_address/address_'.$letter_data['letter_title'].'_'.$letter_id.'.pdf','F');

$content = $mpdf->Output('', 'S');
$content = chunk_split(base64_encode($content));

?>

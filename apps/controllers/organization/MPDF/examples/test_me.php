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
    
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">INVOICE</p>
    <br />
    <table class="heading" style="width:100%;">
    	<tr>
    		<td style="width:80mm;">
    			<h1 class="heading">VACCIT AB</h1>
				<h2 class="heading">
					Österögatan 1<br />
					16440 KISTA<br />
					<br />
					
					Website : www.VASSIT.se<br />
					E-mail : info@vassit.se<br />
					Phone : 0850164494
                    <br />
                    Momsreg.nr : SE556829899501<br />
                    Bankgiro SE556829899501
				</h2>
			</td>
			<td rowspan="2" valign="top" align="right" style="padding:3mm;">
				<table>
					<tr><td>Faktura Nummer  : </td><td>1210</td></tr>
					<tr><td>Fakturadatum : </td><td>01-Aug-2011</td></tr>
					<tr><td>Förfallodatum : </td><td>07-Aug-2011</td></tr>
					<tr><td>Currency : </td><td>USD</td></tr>
				</table>
			</td>
		</tr>
    	<tr>
    		<td>
    			<b>Buyer</b> :<br />
    			<b>Referens</b> : ABU TAHER<br />
    			<b>Dröjsmålsränta</b> : Enligt lag<br />
    			<b>Address</b> : Mats Wåhlin AB <br />
                 Johan Banérs väg 17<br />
                Tel 08-853076<br />
                18275 Stocksund <br />
                
    		</td>
    	</tr>
        </table>
		
		
	<div id="content">
		
		<div id="invoice_body">
			<table>
			<tr style="background:#eee;">
				<td style="width:8%;"><b>Sl. No.</b></td>
				<td><b>Text</b></td>
				<td style="width:15%;"><b>Timmer</b></td>
				<td style="width:15%;"><b>A-Pris</b></td>
				<td style="width:15%;"><b>Pris exkl. moms</b></td>
				<td style="width:15%;"><b>Momssats</b></td>
			</tr>
			
			<tr>
			    <td style="width:8%;">1</td>
			    <td style="text-align:left; padding-left:10px;">Egen IT-avdelning + Backup 100GB</td>
			    <td class="mono" style="width:15%;">1</td>
                <td style="width:15%;" class="mono">995,00</td>
			    <td style="width:15%;" class="mono">995,00</td>
			    <td style="width:15%;" class="mono">25 %</td>
			</tr>		
            
            <tr>
			    <td style="width:8%;">2</td>
			    <td style="text-align:left; padding-left:10px;">Egen IT-avdelning + Backup 100GB</td>
			    <td class="mono" style="width:15%;">1</td>
                <td style="width:15%;" class="mono">995,00</td>
			    <td style="width:15%;" class="mono">995,00</td>
			    <td style="width:15%;" class="mono">25 %</td>
			</tr>		
						
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Att betala :</td>
				<td class="mono">157.00</td>
			</tr>
		</table>
        
        <table>
						
			<tr>
			    <td style="width:8%;" colspan="5"><b>Momsspecifikation</b></td>
		</tr>		
            
            <tr>
			    <td style="width:8%;"><b>Moms</b></td>
			    <td style="width:8%;"><b>Pris exkl. moms</b></td>
			    <td style="width:8%;"><b>Moms i kr</b></td>
			    <td style="width:8%;"><b>Öresav-rundning</b></td>
			    <td style="width:8%;"><b>Summa</b></td>
			    
			</tr>		
						
			<tr>
				 <td style="width:8%;">25 %</td>
			    <td style="width:8%;">995,00</td>
			    <td style="width:8%;">248,75</td>
			    <td style="width:8%;">0,25</td>
			    <td style="width:8%;">1244</td>
			</tr>
		</table>
        
		</div>
		<div id="invoice_total">
			Total Amount :
			<table>
				<tr>
					<td style="text-align:left; padding-left:10px;">One  Hundred And Fifty Seven  only</td>
					<td style="width:15%;">USD</td>
					<td style="width:15%;" class="mono">157.00</td>
				</tr>
			</table>
		</div>
		<br />
		<hr />
		<br />
		
		<table style="width:100%; height:35mm;">
			<tr>
				<td style="width:65%;" valign="top">
					Payment Information :<br />
					Please make cheque payments payable to : <br />
					<b>VACCIT AB</b>
					<br /><br />
					The Invoice is payable within 7 days of issue.<br /><br />
				</td>
				<td>
				<div id="box">
					E &amp; O.E.<br />
					For VACCIT AB<br /><br /><br /><br />
					Authorised Signatory
				</div>
				</td>
			</tr>
		</table>
	</div>
	
	<br />
	
	</div>
	
	<htmlpagefooter name="footer">
		<hr />
		<div id="footer">	
			<table>
				<tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
			</table>
		</div>
	</htmlpagefooter>
	<sethtmlpagefooter name="footer" value="on" />
	
</body>
</html>';
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);
	    
$mpdf->Output('payment_method/invoice/bth.pdf','F');

?>
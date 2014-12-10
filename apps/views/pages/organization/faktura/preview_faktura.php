<?php 
if($org_details){ 
    $org_name = $org_details[0]->org_name;
    $org_number = $org_details[0]->org_number;
    $org_primary_address = $org_details[0]->org_primary_address;
    $org_zip = $org_details[0]->org_zip;
    $org_city = $org_details[0]->org_city;
    $org_org_country = $org_details[0]->org_country;
    $org_state = $org_details[0]->org_state;
    $org_phone = $org_details[0]->org_phone;
    $org_bank_acc_type_one = $org_details[0]->org_bank_acc_type_one;
    $org_bank_acc_no_one = $org_details[0]->org_bank_acc_no_one;    
    $org_bank_acc_type_two = $org_details[0]->org_bank_acc_type_two;
    $org_bank_acc_no_two = $org_details[0]->org_bank_acc_no_two;    
    $org_bank_acc_type_three = $org_details[0]->org_bank_acc_type_three;
    $org_bank_acc_no_three = $org_details[0]->org_bank_acc_no_three;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice</title>

</head>
<body>
<div id="wrapper">
    <a class="button" href="<?php echo base_url(); ?>organization/info/edit_faktura/<?php echo $custom_faktura_id; ?> " title="Edit invoice">
    <?php echo $this->lang->line('invoice_edit_link');?></a>
    <a class="button"href="<?php echo base_url(); ?>organization/info/copy_faktura/<?php echo $custom_faktura_id; ?> " title="Duplicate invoice">
    <?php echo $this->lang->line('invoice_copy_link');?></a>
    <a class="button" href="<?php echo base_url(); ?>custom_invoice/custom_invoice_<?php echo str_replace(" ","",$org_name).'_'.$org_number.'_'.$custom_faktura_id.'.pdf'; ?> " title="Print PDF">
                    <?php echo $this->lang->line('invoice_view_pdf');?>
    </a>
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">INVOICE</p>
    <br />
    <table class="heading" style="width:100%;">
    	<tr>
    		<td style="width:80mm;">
    			<h1 class="heading"><?php echo $org_name;?> </h1>
				<h2 class="heading"><?php echo $org_primary_address;?><br />
					<?php echo $org_zip.'&nbsp;'.$org_city; ?><br />
					<br />
					Phone : <?php echo $org_phone;?> <br />
                    <?php echo $org_bank_acc_type_one.'&nbsp;'.$org_bank_acc_no_one; ?>
				</h2>
			</td>
        <?php 
           $custom_invoice_sent_by_letter_cost = "";
           $no_of_custom_invoice_sent_by_letter ="";
           $fak_invoice_cost_applied ="";
           $custom_invoice_sent_by_letter_cost ="";
           $admin_cost ="";
                                                
            if($faktura_info){
                    $get_client_info = $this->info_model->get_custom_faktura_client_info($faktura_info[0]->fak_send_to_external_customer,$faktura_info[0]->fak_send_to_org_customer);
                    /////////////////////////////////////////////////////////////////////////////////////////////////
                    if($get_client_info && !empty($faktura_info[0]->fak_send_to_external_customer)){                    
                        $ak_customer_type = $get_client_info[0]->fak_customer_type;
                        $fak_customer_care_of = $get_client_info[0]->fak_customer_care_of;
                        $primary_address = $get_client_info[0]->fak_customer_billing_address;                    
                        $zip = $get_client_info[0]->fak_customer_zip;
                        $city = $get_client_info[0]->fak_customer_city;
                        $state = $get_client_info[0]->fak_customer_state;
                        $country = $get_client_info[0]->fak_customer_country;
                        $email = $get_client_info[0]->fak_customer_email;
                        $fak_customer_no = $get_client_info[0]->fak_customer_no;
                        $fak_reference_name= $get_client_info[0]->fak_customer_or_company_name;
                        $fak_customer_reg_no = $get_client_info[0]->fak_customer_reg_no;
                        $fak_customer_to = $get_client_info[0]->fak_customer_to;
                        $fak_customer_contact_no = $get_client_info[0]->fak_customer_contact_no;
                        $fak_customer_listing = $get_client_info[0]->fak_customer_listing;
                    }
                    if($get_client_info && !empty($faktura_info[0]->fak_send_to_org_customer)){                    
                        $fak_customer_type = "";
                        $fak_customer_care_of = "";
                        $primary_address = $get_client_info[0]->primary_address;                    
                        $zip = $get_client_info[0]->zip;
                        $city = $get_client_info[0]->city;
                        $state = $get_client_info[0]->state;
                        $country = $get_client_info[0]->country;
                        $email = $get_client_info[0]->email;
                        $fak_customer_no = "";
                        $first_name= $get_client_info[0]->first_name;
                        $last_name= $get_client_info[0]->last_name;
                        $username=$get_client_info[0]->username;            
                        $fak_reference_name = $first_name."&nbsp;".$last_name;
                        $fak_customer_reg_no = "";
                        $fak_customer_to = "";
                        $fak_customer_contact_no= $get_client_info[0]->phone_no;
                        $fak_customer_listing = "";
                        //$data_faktura['fak_description'] = $rows->fak_description;
                    }
                    /////////////////////////////////////////////////////////////////////////////////////////////////
                    
                    $client_country = $get_client_info[0]->country;
                    $custom_invoice_sent_by_letter_cost = $faktura_info[0]->custom_invoice_sent_by_letter_cost;
                    $no_of_custom_invoice_sent_by_letter = $faktura_info[0]->no_of_custom_invoice_sent_by_letter;
                    $fak_invoice_cost_applied = $faktura_info[0]->fak_invoice_cost_applied;
                    $custom_invoice_sent_by_letter_cost = $faktura_info[0]->custom_invoice_sent_by_letter_cost;
                    $admin_cost = $faktura_info[0]->admin_cost;
                    $fak_terms_of_payment = $faktura_info[0]->fak_terms_of_payment;
                    
                    if($country=="DEU"){$country= "GERMAN";}
                    if($country=="NOR"){$country= "NORWAY";}
                    if($country=="DNK"){$country = "DENMARK";}
                    if($country=="FIN"){$country= "FINLAND";}
                    if($country=="GBR"){$country= "UK";}
                    if($country=="SWE"){$country= "SWEDEN";}
               } ?>
                <td rowspan="2" valign="top" align="right" style="padding:3mm;">
				<table>
					<tr><td>Faktura Nummer  : </td><td><?php echo $faktura_info[0]->fak_invoice_no; ?></td></tr>
					<tr><td>Fakturadatum : </td><td><?php if($faktura_info[0]->fak_invoice_date){ echo date('Y-m-d',$faktura_info[0]->fak_invoice_date);}  else{echo $this->lang->line('missing_message');}  ?></td></tr>
					<tr><td>Förfallodatum : </td><td><?php if($faktura_info[0]->fak_expire_date){ echo date('Y-m-d',$faktura_info[0]->fak_expire_date); } else{echo $this->lang->line('missing_message');}  ?></td></tr>
					<tr><td>Currency : </td><td>SEK</td></tr>
				</table>
			</td>
		</tr>
    	<tr>
    		<td>
    			<b>Buyer</b> :<br />
    			<b>Referens</b> :<?php echo $fak_reference_name;?> <br />
    			<b>Dröjsmålsränta</b> : Enligt lag<br />
    			<b>Address</b> : <?php echo $org_name.'<br />'.$primary_address.
                '<br /> '.$city.' <br /> Tel &nbsp;'.$fak_customer_contact_no
                .'<br /> '.$zip.' &nbsp; '.$state
                .' <br /> '.$country; ?>
                
    		</td>
    	</tr>
        </table>
     
    <div id="content">		
		<div id="invoice_body">
			<table>
			<tr style="background:#eee;">
				<td style="width:8%;"><b>Sl. No.</b></td>
				<td><b>Product</b></td>
				<td style="width:15%;"><b>Timmer</b></td>
				<td style="width:15%;"><b>A-Pris</b></td>
				<td style="width:15%;"><b>Pris exkl. moms</b></td>
				<td style="width:15%;"><b>Momssats</b></td>
			</tr>
            <?php 
            $html2 = "";
            $total_price = 0; 
            $si_no = 0;
            if($custom_faktura_assigned_product_info){
                foreach($custom_faktura_assigned_product_info as $product_info){
                    $si_no = $si_no+1;
                    $all_product_price_excl_vat = $product_info->price_ex_vat * $product_info->no_of_products;
                    $vat_price = ($product_info->vat_rate/100) * $all_product_price_excl_vat;
                    $all_product_price_incl_vat = $all_product_price_excl_vat + $vat_price;
                    $total_price += $all_product_price_incl_vat;
                ?>
                  <tr>
                    <td style="width:8%;"><?php echo $si_no; ?> </td>
                    <td style="text-align:left; padding-left:10px;"><?php echo $product_info->product_name;?> </td>
                    <td class="mono" style="width:15%;"><?php echo $product_info->no_of_products;?></td>
                    <td style="width:15%;" class="mono"><?php echo $product_info->price_ex_vat;?></td>
                    <td style="width:15%;" class="mono"><?php echo $all_product_price_excl_vat;?></td>
                    <td style="width:15%;" class="mono"><?php echo $product_info->vat_rate; ?> %</td>
                    </tr>
            <?php
                }        
          }            
            $si_no +=1;                        
            if($custom_invoice_sent_by_letter_cost > 0){    
                $custom_invoice_sent_by_letter_cost_vat = (25/100)*$custom_invoice_sent_by_letter_cost; 
                $custom_invoice_sent_by_letter_cost_incl_vat = $custom_invoice_sent_by_letter_cost +$custom_invoice_sent_by_letter_cost_vat;
                $total_price += $custom_invoice_sent_by_letter_cost_incl_vat;
            ?>
                 <tr>
                        <td style="width:8%;"><?php echo $si_no; ?></td>
                        <td style="text-align:left; padding-left:10px;">Invoice Cost</td>
                        <td class="mono" style="width:15%;"><?php echo $no_of_custom_invoice_sent_by_letter;?></td>
                        <td style="width:15%;" class="mono"><?php echo $fak_invoice_cost_applied;?> </td>
                        <td style="width:15%;" class="mono"><?php echo $custom_invoice_sent_by_letter_cost; ?> </td>
                        <td style="width:15%;" class="mono">25%</td>
                    </tr>
        <?php
            }
            if($admin_cost > 0){        
                $si_no = $si_no+1;
                $admin_cost_vat = (25/100) * $admin_cost;
                $admin_cost_inclu_vat =  $admin_cost + $admin_cost_vat;                
                $total_price += $admin_cost_inclu_vat;
            ?>    
           <tr>
                    <td style="width:8%;"><?php echo $si_no; ?> </td>
                    <td style="text-align:left; padding-left:10px;">Admin Cost</td>
                    <td class="mono" style="width:15%;">1</td>
                    <td style="width:15%;" class="mono"><?php echo $admin_cost;?> </td>
                    <td style="width:15%;" class="mono"><?php echo $admin_cost;?> </td>
                    <td style="width:15%;" class="mono">25%</td> 
                </tr>
        <?php
            }        
            $total_price_rounded = round($total_price);
            $rounded_value = $total_price_rounded - $total_price;
          ?>      
         <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Att betala :</td>
				<td class="mono"><?php echo round($total_price);?> </td>
			</tr>
		</table>
        
        <table>
						
			<tr>
			    <td style="width:8%;" colspan="4"><b>Momsspecifikation</b></td>
		</tr>		
            
            <tr>
			    <td style="width:8%;"><b>Moms</b></td>
			    <td style="width:8%;"><b>Pris exkl. moms</b></td>
			    <td style="width:8%;"><b>Moms i kr</b></td>
			    <td style="width:8%;"><b>Summa</b></td>			    
			</tr>
        <?php
            
            if($custom_faktura_assigned_product_info){
                foreach($custom_faktura_assigned_product_info as $product_info){                  
                    $all_product_price_excl_vat = $product_info->price_ex_vat * $product_info->no_of_products;
                    $vat_price = ($product_info->vat_rate/100) * $all_product_price_excl_vat;
                    $all_product_price_incl_vat = $all_product_price_excl_vat + $vat_price;              
                ?>
                    <tr>
                    <td style="width:8%;"><?php echo $product_info->vat_rate; ?> %</td>
                    <td style="width:8%;"><?php echo $all_product_price_excl_vat;?> </td>
                    <td style="width:8%;"><?php echo $vat_price;?></td>
                    <td style="width:8%;"><?php echo $all_product_price_incl_vat;?> </td>
                    </tr>
                    
            <?php
                }
            }
            if($custom_invoice_sent_by_letter_cost > 0){ ?>
             <tr>
                    <td style="width:8%;">25%</td>
                    <td style="width:8%;"><?php echo $custom_invoice_sent_by_letter_cost;?> </td>
                    <td style="width:8%;"><?php echo $custom_invoice_sent_by_letter_cost_vat;?> </td>
                    <td style="width:8%;"><?php echo $custom_invoice_sent_by_letter_cost_incl_vat;?></td>
                </tr>
        <?php
             }
            if($admin_cost > 0){   ?>
                <tr>
                    <td style="width:8%;">25%</td>
                    <td style="width:8%;"><?php echo $admin_cost;?> </td>
                    <td style="width:8%;"><?php echo $admin_cost_vat;?> </td>
                    <td style="width:8%;"><?php echo $admin_cost_inclu_vat;?> </td>
                </tr>
        <?php
            }
        ?>
         </table>
        
		</div>
		<div id="invoice_total">
			Total Amount :
			<table>
				<tr>
					<td style="text-align:left; padding-left:10px;"></td>
					<td style="width:15%;">SEK</td>
					<td style="width:15%;" class="mono"><?php echo $total_price_rounded;?> </td>
					<td style="width:15%;" class="mono"><?php echo $rounded_value.'(Öresav-rundning)';?> </td>
                    

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
					<b><?php echo $org_name;?> </b>
					<br /><br />
					The Invoice is payable within <?php echo $fak_terms_of_payment; ?> days of issue<br /><br />
				</td>
				<td>
				<div id="box">
					E &amp; O.E.<br />
					For<?php echo $org_name;?> <br /><br /><br /><br />
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
</html>


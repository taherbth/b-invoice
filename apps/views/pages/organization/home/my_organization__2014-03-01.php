<h3 class="content_edit"><?php echo $this->lang->line('mem_org_details_msg');?></h3>

<?php 
if($mem_type=="Admin" || $configuration_change_org){
 echo $this->session->flashdata('message'); ?>

<?php
//$query = $this->db->query("select * from user_info where id='".$org_id."'");
//foreach ($query->result() as $p_info):

$bill_first_name = "";
$bill_last_name = "";
$bill_primary_address = "";
$bill_optional_address = "";
$bill_zip = "";
$bill_city = "";
$bill_country = "";
$bill_email = "";
$bill_phone_no = "";
$name_on_credit_card= "";
$credit_card_type= "";
$expire_date= "";
$payment_method = "";

foreach ($query1 as $p_info):

$org_country="";
$country = "";
$bill_country = "";

if($p_info->org_country=="DEU"){$org_country = "GERMAN";}
if($p_info->org_country=="NOR"){$org_country= "NORWAY";}
if($p_info->org_country=="DNK"){$org_country = "DENMARK";}
if($p_info->org_country=="FIN"){$org_country= "FINLAND";}
if($p_info->org_country=="GBR"){$org_country = "UK";}
if($p_info->org_country=="SWE"){$org_country = "SWEDEN";}


if($p_info->country=="DEU"){$country = "GERMAN";}
if($p_info->country=="NOR"){$country= "NORWAY";}
if($p_info->country=="DNK"){$country = "DENMARK";}
if($p_info->country=="FIN"){$country= "FINLAND";}
if($p_info->country=="GBR"){$country = "UK";}
if($p_info->country=="SWE"){$country = "SWEDEN";}



$org_billing_info = $this->info_model->get_customer_billing_info($p_info->org_id);        
if($org_billing_info){
        foreach ($org_billing_info as $billing_info) {  
            $bill_first_name = $billing_info->bill_first_name;
            $bill_last_name = $billing_info->bill_last_name;
            $bill_primary_address = $billing_info->bill_primary_address;
            $bill_optional_address = $billing_info->bill_optional_address;
            $bill_zip = $billing_info->bill_zip;
            $bill_city = $billing_info->bill_city;
            $bill_country = $billing_info->bill_country;
            $bill_email = $billing_info->bill_email;
            $bill_phone_no = $billing_info->bill_phone_no;
            $name_on_credit_card= $billing_info->name_on_credit_card;
            $credit_card_type= $billing_info->credit_card_type;
            $expire_date= $billing_info->credit_card_expire_month."/".$billing_info->credit_card_expire_year;
            $payment_method = $billing_info->payment_method;
        }
}


if($bill_country=="DEU"){$bill_country = "GERMAN";}
if($bill_country=="NOR"){$bill_country= "NORWAY";}
if($bill_country=="DNK"){$bill_country = "DENMARK";}
if($bill_country=="FIN"){$bill_country= "FINLAND";}
if($bill_country=="GBR"){$bill_country = "UK";}
if($bill_country=="SWE"){$bill_country = "SWEDEN";}

                
endforeach;

?>

<div class="units-row">
	<div class="unit-push-right">
		<a class="button" href="<?php echo base_url().'organization/info/modify_org/'.$p_info->org_id;?>"><?php echo $this->lang->line('edit_btn');?></a>
	</div>
</div>
<div class="units-row">
	<div class="unit-25">
		<?php echo '<img style="" src=' . base_url() . 'uploads/' . $p_info->member_photo . ' width="160" height="160" />'; ?>
	</div>
	
	<div class="unit-75">
	<h4><?php echo $this->lang->line('label_profile_info');?>:</h4>
		<table class="width-100 table-striped">
		<tr>
			<td><strong><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</strong></td>
			<td><?php echo $p_info->org_number; ?></td>
			<td><strong><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</strong></td>
			<td><?php echo $p_info->org_name; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_address_line_one');?>:</strong></td>
			<td><?php echo $p_info->org_primary_address; ?></td>
			<td><strong><?php echo $this->lang->line('label_address_line_two');?>:</strong></td>
			<td><?php echo $p_info->org_optional_address; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_zip');?>:</strong></td>
			<td><?php echo $p_info->org_zip; ?></td>
			<td><strong><?php echo $this->lang->line('label_city');?>:</strong></td>
			<td><?php echo $p_info->org_city; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_country');?>:</strong></td>
			<td><?php echo $p_info->org_country; ?></td>
			<td><strong><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_phone');?>:</strong></td>
			<td><?php echo $p_info->org_phone; ?></td>
		</tr>
		</table>
	<h4><?php echo $this->lang->line('label_package_info');?></h4>
		<table class="width-100 table-striped">
		<tr>
			<td><strong><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_name');?> :
			<?php
				$query = $this->db->query("select * from package where id='" . $p_info->package_name . "'");
				foreach ($query->result() as $info) {
					$p_name = $info->package_name;
					$currency_data = $this->info_model->get_currency($info->currency_id);
				}
				if (!empty($p_name)):$p_name = $p_name;
					else:$p_name = "";
				endif;
			?>
			</strong></td>
			<td><?php echo $p_name; ?></td>
			<td><strong><?php echo $this->lang->line('label_no_of_member');?>:</strong></td>
			<td><?php echo $info->no_of_member; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_duration');?>:</strong></td>
			<td><?php echo $info->duration; ?>  <?php echo $this->lang->line('label_month')."(s)";?></td>
			<td><strong><?php echo $this->lang->line('label_subscription_fee')."/".$this->lang->line('label_month');?>:</strong></td>
			<td><?php echo $info->amount; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?>:</strong></td>
			<td><?php echo $info->sms_cost; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
			<td><strong><?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?>:</strong></td>
			<td><?php echo $info->letter_cost; ?>  (<?php echo $currency_data[0]->currency_name; ?>)</td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?>:</strong></td>
			<td><?php if($p_info->org_allowed_sms_per_month){echo $p_info->org_allowed_sms_per_month; } else {echo "N/A";}?></td>
			<td><strong><?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>:</strong></td>
			<td><?php if($p_info->org_allowed_letter_per_month){echo $p_info->org_allowed_letter_per_month; } else {echo "N/A";}?></td>
		</tr>
		</table>
		<h5><?php echo $this->lang->line('label_credit_card_info');?>:</h5>
		<?php if($name_on_credit_card==""){echo '<p>N/A</p>';}?>
		<?php if($name_on_credit_card){?>
			<table class="width-100 table-striped">
			<tr>
				<td><strong><?php echo $this->lang->line('label_credit_card_name_on_card');?> :</strong></td>
				<td><?php echo $name_on_credit_card; ?></td>
				<td><strong><?php echo $this->lang->line('label_credit_card_type');?>:</strong></td>
				<td><?php echo $credit_card_type; ?></td>
			</tr>
			<tr>
				<td><strong><?php echo $this->lang->line('label_expire_date');?>:</strong></td>
				<td><?php echo $name_on_credit_card; ?></td>
				<td></td>
				<td></td>
			</tr>
			</table>
		<?php } ?>
		<h5><?php echo $this->lang->line('label_billing_info');?>:</h5>
		<table class="width-100 table-striped">
		<tr>
			<td><strong><?php echo $this->lang->line('label_first_name');?>:</strong></td>
			<td><?php echo $bill_first_name; ?></td>
			<td><strong><?php echo $this->lang->line('label_last_name');?>:</strong></td>
			<td><?php echo $bill_last_name; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_email');?>:</strong></td>
			<td><?php echo $bill_email; ?></td>
			<td><strong><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</strong></td>
			<td><?php echo $bill_phone_no; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_address_line_one');?>:</strong></td>
			<td><?php echo $bill_primary_address; ?></td>
			<td><strong><?php echo $this->lang->line('label_address_line_two');?>:</strong></td>
			<td><?php echo $bill_optional_address; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_zip');?>:</strong></td>
			<td><?php echo $bill_zip; ?></td>
			<td><strong><?php echo $this->lang->line('label_city');?>:</strong></td>
			<td><?php echo $bill_city; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo $this->lang->line('label_zip');?>:</strong></td>
			<td><?php echo $bill_zip; ?></td>
			<td><strong><?php echo $this->lang->line('label_country');?>:</strong></td>
			<td><?php echo $bill_country; ?></td>
		</tr>
		</table>
	</div>
</div>
<?php } else { ?> <span style="color:red;"><?php echo $this->lang->line('my_org_no_access_msg');?></span> <?php }  ?>
        
       
<?php
/*
 * ***********************************************************************************************************
 * 																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		View File																			*
 * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)	                              					*
 * 		@Email			sanchoy7@gmail.com		                                                        	*
 * 		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 * 																											*
 * ***********************************************************************************************************
 */

if (count($query1)):
    foreach ($query1 as $orderValue):
    endforeach;
	 $query=$this->db->query("select package_name,amount from package where id='".$orderValue->package_name."'");
	foreach($query->result() as $p){
		$p_name=$p->package_name;
		$amount=$p->amount;
	}
endif;

$name = $orderValue->name;
$id = $orderValue->id;
$package_id=$orderValue->package_name;

// Paypal Email Address
//$paypal_email = "seller_1291183743_biz@gmail.com";
$paypal_email = "nur.pl_1326949972_per@gmail.com";

// Admin Email Address for Payment Success
$admin_email = "admin@spiceuk.com";
// Execute when Payment is Completed
$notify_url = base_url() . 'main/ipn';
// Return when User Cancel Payment
$cancel_url = base_url() . 'main/cancel/';
// Return after Successfull Payment
$success_url = base_url() . 'main/success/'.$id;
?>
<?php
$attributes = array(
    'style' => 'font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#b81200;',
);
$form_attribute = array(
    'id' => 'frm_checkout',
    'name' => 'frm_checkout',
);
?>
<script type="text/javascript">
  function SubmitMe()
    {
        var oForm=document.frm_checkout;
        oForm.action="https://sandbox.paypal.com/cgi-bin/webscr";
        oForm.post="post";
        oForm.submit();
    }
</script>
<?php echo form_open('https://sandbox.paypal.com/cgi-bin/webscr', $form_attribute); ?>
  <input type="hidden" name="cmd" value="_cart" />
  <input type="hidden" name="upload" value="1" />
  <input type="hidden" name="business" value="<?php echo $paypal_email; ?>" />
  <input type="hidden" name="image_url" value="0">
  <input type="hidden" name="currency_code" value="USD" />  
  <input type="hidden" name="item_id_1" id="item_id_1" value="<?php echo $package_id; ?>">
  <input type="hidden" name="item_name_1" id="item_name_1" value="<?php echo $p_name; ?>">
  <input type="hidden" name="item_code_1" id="item_code_1" value="1">
  <input type="hidden" name="amount_1" id ="amount_1" value="<?php echo $amount; ?>">
  <input type="hidden" name="quantity_1" value="1">
  <input type="hidden" name="no_shipping" value="0">
  <input type="hidden" name="tax_1" value="0">
  <input type="hidden" name="handling_1" value="0">
  <input type="hidden" name="handling_override" value="0">
  <input type="hidden" name="address_override" value="0">
  <input type="hidden" name="custom" value="1">
  <input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>" />
  <input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>" />
  <input type="hidden" name="return" value="<?php echo $success_url; ?>">

<?php echo form_close(); ?>
<script type="text/javascript">
    SubmitMe();
</script>
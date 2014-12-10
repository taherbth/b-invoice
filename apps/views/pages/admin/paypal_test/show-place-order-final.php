<?php
/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		View File																			*
 * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)	                              					*
 * 		@Email			sanchoy7@gmail.com		                                                        	*
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

if(count($orderValues)):
	foreach($orderValues as $orderValue):
	endforeach;
endif;

$post_code = $orderValue->post_code;
$phone = $orderValue->phone;
$res_id = $orderValue->res_id;
$customer_id = $orderValue->customer_id;
$customer_name = $orderValue->customer_name;
$address = $orderValue->address;
$city = $orderValue->city;
$booking_date = $orderValue->booking_date;
$booking_time = $orderValue->booking_time;
$people_no = $orderValue->people_no;
$optional_message = $orderValue->optional_message;
$order_time = date('d / m / Y h:i A', strtotime($orderValue->created));
// Paypal Email Address
$paypal_email="seller_1291183743_biz@gmail.com"; 
// Admin Email Address for Payment Success
$admin_email="admin@spiceuk.com"; 
// Execute when Payment is Completed
$notify_url=base_url().'show/paypal_notify'; 
// Return when User Cancel Payment
$cancel_url=base_url().'show/paypal_cancel/'; 
// Return after Successfull Payment
$success_url=base_url().'show/paypal_success'; 
?>
<?php
$attributes = array(
    'style' => 'font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#b81200;',
);
$form_attribute = array(
    'id'  => 'frm_checkout',
    'name'=> 'frm_checkout',
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
<?php echo ucwords($this->dx_auth->get_auth_error()); ?>
<?php if(!empty($admin_message)){echo "<div class='msg'>".$admin_message."</div>";} ?>
<table width='100%' cellpadding="0" cellspacing="5">
<tr>

<td width="50%" class ="tableStyle" valign="top">        
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-left:5px;">
            <thead>
                <tr>                 
                    <td colspan="3"><?php echo form_label('Your order', '', $attributes); ?></td>
                </tr>
            </thead>
            <tbody>
               <?php if($this->cart->contents()): ?>
                <?php $i = 1; ?>
                <?php foreach($this->cart->contents() as $items): ?>
                
                <?php 
				//print_r($items);
				echo form_hidden('rowid[]', $items['rowid']); ?>
                <tr <?php if($i&1){ echo 'class="alt"'; }?>>
                    <td width="80%"><?php echo nbs(2).$items['qty'].'&times; no.'.nbs(5).$items['subtype_name'].' &raquo; '.$items['sub_subtype_name']; ?></td>
                    <td width="5%"><?php echo '&pound;' ?></td>
                    <td width="15%"> <?php echo $this->cart->format_number($items['price']); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                   <?php echo form_hidden('res_id',$items['name']).form_hidden('item_name_'.$i,$items['subtype_name']).form_hidden('item_number_'.$i,$items['sub_subtype_name']).form_hidden('amount_'.$i,$this->cart->format_number($items['price'])).form_hidden('quantity_'.$i,$items['qty']);  ?>
                   </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>Total:</strong></td>
                    <td><strong><?php echo '&pound;' ?></strong></td>
                    <td><strong><?php echo $this->cart->format_number($this->cart->total()).nbs(2); ?></strong></td>
                </tr>
               <?php endif; ?>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3"><?php echo form_label('Restaurant Booking information', '', $attributes); ?></td>
                </tr>
               <tr><td colspan="3">&nbsp;</td></tr>
               <?php if(!empty($booking_date)): ?>
                <tr>
                <td width="20%"><strong>Booking Date:</strong></td>
                <td colspan="2"><strong> <?php echo $booking_date;  ?></strong></td>
                </tr>
                <?php endif; ?>
               <?php if(!empty($booking_time)): ?>
                <tr>
                <td width="20%"><strong>Booking Time:</strong></td>
                <td colspan="2"><strong> <?php echo $booking_time.' : 00';  ?></strong></td>
                </tr>
                <?php endif; ?>
                <?php if(!empty($people_no)): ?>
                <tr>
                <td width="20%"><strong>Booking For:</strong></td>
                <td><strong> <?php echo $people_no.' Persons';  ?></strong></td>
                </tr>
                <?php endif; ?>
               
                <?php if(!empty($optional_message)): ?>
                <tr>
                <td width="20%"><strong>Message:</strong></td>
                <td><strong> <?php echo $optional_message;  ?></strong></td>
                </tr>
                <?php endif; ?>
                
                <tr><td colspan="3"> <?php echo form_hidden('business',$paypal_email).form_hidden('notify_url',$notify_url).form_hidden('cancel_return',$cancel_url).form_hidden('return',$success_url).form_hidden('image_url','0').form_hidden('currency_code','GBP');  ?>
                </td></tr>
                <tr>
                    <td colspan="3"> <?php echo form_hidden('customer_name',$customer_name).form_hidden('custom',$customer_id).form_hidden('cmd','_cart').form_hidden('upload','1').form_hidden('image_url','0').form_hidden('currency_code','GBP');  ?>
                   </td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo form_label('Customer information', '', $attributes); ?></td>
                </tr>
                <tr>
                    <td colspan="3"> <?php echo $customer_name.br(1). $address.br(1).$post_code.br(1).$city.br(1).$phone;  ?></td>
                </tr>
            </tbody>
        </table>
    </td>

  <td class ="tableStyle" width="50%" valign="top">
    </td>
 </tr>
        
</table>
<?php echo form_close(); ?>
<script type="text/javascript">
	SubmitMe();
</script>

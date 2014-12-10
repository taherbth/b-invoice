<?php
if(count($orderValues)):
	foreach($orderValues as $orderValue):
	endforeach;
endif;
$order_id = $orderValue->id;
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
?>
<?php
$attributes = array(
    'style' => 'font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#b81200;',
);
?>

<h1>PayPal Transaction Form</h1>
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
        <tr>
            <td colspan="3"><?php echo form_label('Customer information', '', $attributes); ?></td>
        </tr>
        <tr>
            <td colspan="3"> <?php echo $customer_name.br(1). $address.br(1).$post_code.br(1).$city.br(1).$phone;  ?></td>
        </tr>
    </tbody>
</table>



<?php 
        $this->paypal_lib->add_field('business', 'seller_1291183743_biz@gmail.com');
	    $this->paypal_lib->add_field('return', site_url('paypal/success'));
	    $this->paypal_lib->add_field('cancel_return', site_url('paypal/cancel'));
	    $this->paypal_lib->add_field('notify_url', site_url('paypal/ipn')); // <-- IPN url
	    $this->paypal_lib->add_field('custom', $order_id); // <-- Verify return
        
       if($this->cart->contents()):
        $i = 1;
       foreach($this->cart->contents() as $items):

	    $this->paypal_lib->add_field('item_name_'.$i, $items['subtype_name']);
	    $this->paypal_lib->add_field('item_number_'.$i, $items['sub_subtype_name']);
	    $this->paypal_lib->add_field('amount_'.$i, $this->cart->format_number($items['price']));
	    $this->paypal_lib->add_field('quantity_'.$i, $items['qty']);
        $i++;
       endforeach;
       endif;
		// if you want an image button use this:
		$this->paypal_lib->image('button_03.gif');
		// otherwise, don't write anything or (if you want to 
		// change the default button text), write this:
		//$this->paypal_lib->button('Click to Pay!');
		
	    $data['paypal_form'] = $this->paypal_lib->paypal_form();

?>
<?=$data['paypal_form']?>
<p>&nbsp;</p>

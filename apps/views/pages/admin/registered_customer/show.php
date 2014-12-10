<h3 class="content_edit"><?php echo $this->lang->line('new_customer_req_msg');?> </h2>

<?php 
    $this->load->model('admin/info_model');
    echo $this->session->flashdata('message'); 
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view.css" />

<?php

$p_name = "";
$currency_name = "";
$duration = "";
$allowed_sms_per_month = "";
$allowed_letter_per_month = "";
$name_on_credit_card= "";
$credit_card_type= "";
$expire_date= "";
$payment_method = "";

foreach ($query1 as $info):
    $org_billing_info = $this->info_model->get_customer_billing_info($info->org_id);    
    $package_assigned_to_org_member_info = $this->info_model->get_package_assigned_to_org_member_info($info->mem_id, "ordered", "");        
    //print_r($package_assigned_to_org_info); exit;
    if($org_billing_info){
       foreach ($org_billing_info as $billing_info) {
            $payment_method = $billing_info->payment_method;
        }
    }
    if($package_assigned_to_org_member_info){
        foreach ($package_assigned_to_org_member_info as $package_assigned) {
            $p_name = $package_assigned->package_name;
            $currency_name = $package_assigned->currency_name;
            $duration = $package_assigned->duration;
            $allowed_sms_per_month = $package_assigned->allowed_sms_per_month;
            $allowed_letter_per_month = $package_assigned->allowed_letter_per_month;
            //$currency_data = $this->info_model->get_currency($package_assigned->currency_id);
        }
    }

    /*$query1 = $this->db->query("select zone from zone where id='" . $info->area_name . "'");
    foreach ($query1->result() as $p1) {
        $a_name = $p1->zone;
    }*/
    if (!empty($p_name)):$p_name = $p_name;
    else:$p_name = "";
    endif;
    /*if (!empty($a_name)):$a_name = $a_name;
    else:$a_name = "";
    endif;*/
    ?>
    <div class="SearchListing">
        <div style="width:900px; float:left; position:relative">
            <div class="ListingDetails">
                <ul> <li><label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</b> </label> <span class="HighLight"><?php echo $info->org_number; ?> </span><br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_name; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_address');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_street_address; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_phone');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_mobile_phone; ?></span> <br>
                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li><label class="From"><b><?php echo $this->lang->line('label_membername')?>:</b> </label> <span class="HighLight"><?php echo $info->first_name; ?> <?php echo $info->last_name; ?> </span><br>
                        <label class="From"><b><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->mobile_phone; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_address')?>:</b></label> 
                        <span class="HighLight"><?php echo $info->street_address; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_email')?>:</b></label> 
                        <span class="HighLight"><?php echo $info->email; ?></span> <br>
                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li><label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_name');?>:</b> </label> <span class="HighLight"><?php echo $p_name ?> </span><br>
                        <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_duration');?>:</b></label> 
                        <span class="HighLight"><?php echo $duration; ?> <?php echo $this->lang->line('label_month')."(s)";?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_payment_method');?>:</b></label> 
                        <span class="HighLight"><?php echo $payment_method; ?></span> <br>
                </ul>
            </div>
        </div>
        <div style="width:900px; float:left; height:50px; padding-left:250px">
            <?php
            $payment_status = $info->payment_status;
            $approval_status = $info->approval_status;
           // $l = $info->login_status;
            if (($payment_status == 0 && $approval_status == 0) || ($payment_status == 1 && $approval_status == 0)) {
             
                if($order_approve_new_customer){?>
                    <a href="<?php echo base_url(); ?>admin/info/approve_org/<?php echo $info->mem_id; ?> " title="Edit the Content">
                        <img src="<?php echo base_url(); ?>public/images/approve.png" alt="" border="0">
                <?php } if($order_deny_new_customer){?>
                    </a>&nbsp;&nbsp;&nbsp;<a  href="<?php echo base_url() ?>admin/info/deny_org/<?php echo $info->id; ?>" title="">
                        <img src="<?php echo base_url(); ?>public/images/deny.png" alt="" border="0">
                    </a>
                <?php } }?>

            <?php 
           
            if ($payment_status == 1 && $approval_status == 1) {
                ?>
                <a href="#" title=""> <img src="<?php echo base_url(); ?>public/images/approved.png" alt="" border="0"></a>&nbsp;&nbsp;&nbsp;<a  href="" title=""> <img src="<?php echo base_url(); ?>public/images/paid.png" alt="" border="0"></a></td>
                <?php
            }
            ?>  


        </div>

    </div>

<?php endforeach; ?>



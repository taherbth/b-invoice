<h3 class="content_edit"><?php echo $this->lang->line('org_bank_details_msg');?></h2>
<?php 
    $this->load->model('admin/info_model');
    echo $this->session->flashdata('message');            
    //echo anchor(base_url()."admin/info/add_customer", $this->lang->line('label_create_new'));
?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<?php

foreach ($query1 as $info):
  /* $org_billing_info = $this->info_model->get_customer_billing_info($info->org_id);        
   if($org_billing_info){
        foreach ($org_billing_info as $billing_info) {
            $name_on_credit_card= $billing_info->name_on_credit_card;
            $credit_card_type= $billing_info->credit_card_type;
            $expire_date= $billing_info->credit_card_expire_month."/".$billing_info->credit_card_expire_year;
            $payment_method = $billing_info->payment_method;
        }
    }*/
   

    if (!empty($p_name)):$p_name = $p_name;
    else:$p_name = "";
    endif;
    /*
    if (!empty($a_name)):$a_name = $a_name;
    else:$a_name = "";
    endif;*/
    ?>
    <div class="SearchListing" style="margin:10px 20px 10px 20px" >
        <div class="ListingDetails">
            <ul> 
                <li>
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px"><?php echo $this->lang->line('label_bank_info');?>:</font></b> </label><br />
                    <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</b> </label> <span class="HighLight"><?php echo $info->org_number; ?> </span><br>
                    <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->org_name; ?></span> <br>                 
                    <label class="From"><b><?php echo $this->lang->line('label_bank_acc_no');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->org_bank_acc_no; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_bank_acc_type');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->org_bank_acc_type; ?></span> <br>
            </ul>
        </div>
       

    </div>

<?php endforeach; ?>






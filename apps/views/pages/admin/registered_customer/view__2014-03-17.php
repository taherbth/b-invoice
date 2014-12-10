<h3 class="content_edit"><?php echo $this->lang->line('registered_org_msg');?></h3>
<?php 
    $this->load->model('admin/info_model');
    echo $this->session->flashdata('message');        
    
    if($customer_create_new_customer){
        echo anchor(base_url()."admin/info/add_customer", $this->lang->line('label_create_new'));
    }
?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<?php

foreach ($query1 as $info):
    $org_billing_info = $this->info_model->get_customer_billing_info($info->org_id);        
    $query = $this->db->query("select * from package where id='" . $info->package_name . "'");
    
    if($org_billing_info){
        foreach ($org_billing_info as $billing_info) {
            $name_on_credit_card= $billing_info->name_on_credit_card;
            $credit_card_type= $billing_info->credit_card_type;
            $expire_date= $billing_info->credit_card_expire_month."/".$billing_info->credit_card_expire_year;
            $payment_method = $billing_info->payment_method;
        }
    }
    if($query){
        foreach ($query->result() as $p) {
            $p_name = $p->package_name;
            $currency_data = $this->info_model->get_currency($p->currency_id);
        }
    }

    /*$query1 = $this->db->query("select zone from zone where id='" . $info->area_name . "'");
    foreach ($query1->result() as $p1) {
        $a_name = $p1->zone;
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
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px"><?php echo $this->lang->line('label_org');?>:</font></b> </label><br />
                    <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</b> </label> <span class="HighLight"><?php echo $info->org_number; ?> </span><br>
                    <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->org_name; ?></span> <br>                 
                    <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_phone');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->org_phone; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_expire_date');?>:</b></label> 
                    <span class="HighLight"><?php echo date("Y-m-d",$info->expire_date); ?></span> <br>
                    <b><font style="color: green; font-weight:bold; font-size:11px"><?php echo $this->lang->line('label_credit_card');?>:</font></b> </label>
                    <?php if($name_on_credit_card==""){ echo "N/A";}?>
                    <br />

            </ul>
        </div>
        <div class="ListingDetails">
            <ul>
                <li>
                <?php if($name_on_credit_card){?>
                    <label class="From"><b><?php echo $this->lang->line('label_credit_card_name_on_card');?>:</b></label> 
                    <span class="HighLight"><?php echo $name_on_credit_card; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_credit_card_type');?>:</b></label> 
                    <span class="HighLight"><?php echo $credit_card_type; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_expire_date');?>:</b></label> 
                    <span class="HighLight">
                    <?php echo $expire_date; ?><?php echo " (".$this->lang->line('label_month')."/".$this->lang->line('label_year').")";?></span> <br>
                <?php }?>
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px"><?php echo $this->lang->line('label_responsible_person');?></font></b> </label><br />
                    <label class="From"><b><?php echo $this->lang->line('label_name');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->first_name; ?> <?php echo $info->last_name; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->phone_no; ?></span> <br>

            </ul>
        </div>
        <div class="ListingDetails">
            <ul><li>

                    <label class="From"><b><?php echo $this->lang->line('label_email');?>:</b></label> 
                    <span class="HighLight"><?php echo $info->email; ?></span> <br>  
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px"><?php echo $this->lang->line('label_package');?>:</font></b> </label><br />
                    <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_name');?>:</b> </label> <span class="HighLight"><?php echo $p_name ?> </span><br>
                    <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;". $this->lang->line('label_amount');?>:</b></label> 
                    <span class="HighLight"><?php if(count($p->amount)):echo $p->amount;endif; ?> (<?php echo $currency_data[0]->currency_name;?>)</span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_duration');?>:</b></label> 
                    <span class="HighLight"><?php echo $p->duration; ?> <?php echo $this->lang->line('label_month')."(s)";?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_allowed_sms')."/".$this->lang->line('label_month');?>:</b></label> 
                   <span class="HighLight"><?php if($info->org_allowed_sms_per_month){echo $info->org_allowed_sms_per_month; } else {echo "N/A";}?></span> <br>
                   <label class="From"><b><?php echo $this->lang->line('label_allowed_letter')."/".$this->lang->line('label_month');?>:</b></label> 
                   <span class="HighLight"><?php if($info->org_allowed_letter_per_month){echo $info->org_allowed_letter_per_month; } else {echo "N/A";}?></span> <br>
                   <label class="From"><b><?php echo $this->lang->line('label_payment_method');?>:</b></label> 
                   <span class="HighLight"><?php echo $payment_method; ?></span> <br>
                    
            </ul>

        </div>
        <div class="ListingDetails">
        <?php if($customer_view_customer_details){?>
            <a href="<?php echo base_url(); ?>admin/info/view_org_detail/<?php echo $info->id; ?> ">      
                <button><?php echo $this->lang->line('view_details_btn');?></button>
            </a><br/>
        <?php }
             if($customer_view_bank_details){
                echo anchor(base_url()."admin/info/view_org_bank_details/$info->id", $this->lang->line('view_org_bank_details_link'))."<br/>";
            }        
            if($customer_restriction_on_sms_letter){
                echo anchor(base_url()."admin/info/restriction_on_sms_letter/$info->id", $this->lang->line('restriction_on_sms_letter_link'))."<br/>";
            }        
        
            if($customer_activate_deactivate_customer){
                if($info->org_blocked){
                    echo anchor(base_url()."admin/info/activate_org/$info->id", $this->lang->line('activate_org_link'))."<br/>";
                }
                elseif(!$info->org_blocked){
                    echo anchor(base_url()."admin/info/deactivate_org/$info->id", $this->lang->line('deactivate_org_link'))."<br/>";
                }
            }
            if($customer_previlization_settings){
                echo anchor(base_url()."admin/info/viewed_org_previlize/$info->id", $this->lang->line('previlization_settings_link'))."<br/>";
            }
            ?>

        </div>

    </div>

<?php endforeach; ?>






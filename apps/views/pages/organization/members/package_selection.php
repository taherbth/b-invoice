<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h3>
<h2 style="text-align:center;"><span style="color:red;"><?php echo $this->lang->line('new_customer_package_selection_msg');?> </h2>

<?php 
    if($create_new_member){ 
     $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('next_btn_msg'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
?>
<?php echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<style>
    .a a{color:green}
    .a a:hover{color:#C74444}
	.c{
        background-color: #E0EAF1;
       
        color: #3E6D8E;
        font-size: 12px;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        
        color: #3E6D8E;
        font-size: 12px;
        height:20px; 
        text-decoration: none;
        white-space: nowrap;
    }
</style>
  <?php
//print_r($data_registration); 
foreach ($package_data as $package_info):  
    ?>
    <div class="SearchListing" style="margin:10px 20px 10px 20px">

    <?php if($package_info->active && $package_info->package_name=="Basic") {
                    $currency_data = $this->info_model->get_currency($package_info->currency_id);
    ?>
    <div class="ListingDetails">
    <b><?php echo $this->lang->line('label_basic');?></b>
    <?php echo form_open("organization/info/buy_package_for_member"); ?>    
        <ul>
            <li>
                <input type="checkbox" name="billing_module_cost" value="1"><span><?php echo $this->lang->line('label_billing_module')."&nbsp;";?></span><?php echo $package_info->billing_module_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
                <input type="checkbox" name="letter_module_cost" value="1"><span><?php echo $this->lang->line('label_letter_module')."&nbsp;";?></span><?php echo $package_info->letter_module_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
                <input type="checkbox" name="sms_module_cost" value="1"><span><?php echo $this->lang->line('label_sms_module')."&nbsp;";?></span><?php echo $package_info->sms_module_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
                <input type="checkbox" name="member_fee_module_cost" value="1"><span><?php echo $this->lang->line('label_member_fee_module')."&nbsp;";?></span><?php echo $package_info->member_fee_module_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
               <span><?php echo $this->lang->line('label_for')."&nbsp;". $package_info->no_of_member."&nbsp;".$this->lang->line('label_members')."&nbsp;". $package_info->duration."&nbsp;".$this->lang->line('label_month');?></span><br/>
            </li>
        </ul>
        <span class="markcolor"><?php echo ucwords(form_error('billing_module_cost')); ?></span> 
        <input type="hidden" name="package_name" value="<?php echo $package_info->package_name;?>"/>
        <input type="hidden" name="package_id" value="<?php echo $package_info->id;?>"/>        
        <?=form_hidden('data_registration', $data_registration);?>
        <?=form_hidden('password', $password);?>
        <?=form_submit($submit);?>   
    <?php echo form_close(); ?>
    </div>
    <?php }  ?>
    <?php if($package_info->active && $package_info->package_name=="Premium") { 
                $currency_data = $this->info_model->get_currency($package_info->currency_id);
    ?>
    <div class="ListingDetails">
    <b> <?php echo $this->lang->line('label_premium');?></b>
    <?php echo form_open("organization/info/buy_package_for_member"); ?>    
     <ul>
            <li>
                <span><?php echo $this->lang->line('label_billing_module');?></span><br/>
                <span><?php echo $this->lang->line('label_letter_module');?></span><br/>
                <span><?php echo $this->lang->line('label_sms_module');?></span><br/>
                <span><?php echo $this->lang->line('label_member_fee_module');?><br/>
                <span><?php echo $this->lang->line('label_full_module')."&nbsp;";?><?php echo $package_info->full_package_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
                <span><?php echo $this->lang->line('label_for')."&nbsp;". $package_info->no_of_member."&nbsp;".$this->lang->line('label_members')."&nbsp;". $package_info->duration."&nbsp;".$this->lang->line('label_month');?></span><br/>
           </li>
        </ul>
        <input type="hidden" name="package_name" value="<?php echo $package_info->package_name;?>"/>
        <input type="hidden" name="package_id" value="<?php echo $package_info->id;?>"/>
        <?=form_hidden('data_registration', $data_registration);?>
        <?=form_hidden('password', $password);?>
        <?=form_submit($submit);?>   
        <?php echo form_close(); ?>
    </div>
    <?php }  ?>
    
    <?php if($package_info->active && $package_info->package_name=="Free Tier") {
            $currency_data = $this->info_model->get_currency($package_info->currency_id);

    ?>
    <div class="ListingDetails">
    <b><?php echo $this->lang->line('label_free');?></b>
    <?php echo form_open("organization/info/buy_package_for_member"); ?>    
        <ul>
            <li>
                <span><?php echo $this->lang->line('label_billing_module');?></span><br/>
                <span><?php echo $this->lang->line('label_letter_module');?></span><br/>
                <span><?php echo $this->lang->line('label_sms_module');?></span><br/>
                <span><?php echo $this->lang->line('label_member_fee_module');?><br/>
                <span><?php echo $this->lang->line('label_full_module')."&nbsp;";?><?php echo $package_info->full_package_cost."&nbsp;". $currency_data[0]->currency_name."/". $this->lang->line('label_month'); ?><br/>
                <span><?php echo $this->lang->line('label_for')."&nbsp;". $package_info->no_of_member."&nbsp;".$this->lang->line('label_members')."&nbsp;". $package_info->duration."&nbsp;".$this->lang->line('label_month');?></span><br/>
            </li>
        </ul>
        <input type="hidden" name="package_name" value="<?php echo $package_info->package_name;?>"/>
        <input type="hidden" name="package_id" value="<?php echo $package_info->id;?>"/>
        <?=form_hidden('data_registration', $data_registration);?>
        <?=form_hidden('password', $password);?>
        <?=form_submit($submit);?>   
        <?php echo form_close(); ?>
    </div>
    <?php }  ?>
        
</div>
<?php endforeach; ?>

<?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('members_registration_no_access_msg');?></span>

</div><?php }  ?>

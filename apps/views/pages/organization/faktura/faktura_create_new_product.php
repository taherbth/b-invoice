<h3 class="content_edit"><?php echo $this->lang->line('faktura_create_new_product_or_service');?></h2>
<?php
    if($mem_type=="Admin" || $access_faktura){     
    
       if($data_fak_settings_details){
           $fak_product_vat_rate = $data_fak_settings_details[0]->fak_tax_rate;
        }
       $fak_product_vat_rate_select_option = array(
            '0' => '0%',
            '6' => '6%',
            '12' => '12%',
            '25' => '25%'			         
        );  
        $fak_product_name= array(
            'name'      => 'fak_product_name',
            'id'        => 'fak_product_name',
            'value'     => $fak_product_name,       
        );
        
        $fak_product_price= array(
            'name'      => 'fak_product_price',
            'id'        => 'fak_product_price',
            'value'     => $fak_product_price,   
        );
        
        
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('submit_btn'),
            'type'    => 'submit',
            'class'   => 'submit-btn'
        );
?>

<?php echo $this->session->flashdata('message'); ?>

<h5 class="breadcrumb">
	<span><a href="<?php echo base_url().'organization/info/faktura_settings';?>"><?php echo $this->lang->line('fak_settings');?></a></span>
	<span class="active"><a href="<?php echo base_url().'organization/info/faktura_products';?>"><?php echo $this->lang->line('fak_products');?></a></span>
</h5>
<div class="form">
<?php echo form_open("organization/info/create_faktura_new_products_process"); ?>

	<label><?php echo $this->lang->line('label_product_name');?>: <span class="req">*</span>
	<?php echo form_input($fak_product_name);?> </label>
	<span class="markcolor"><?php echo ucwords(form_error('fak_product_name')); ?></span> 
                    
	<label><?php echo $this->lang->line('label_price_ex_vat');?>: <span class="req">*</span>
	<?=form_input($fak_product_price);?></label>
	<span class="markcolor"><?php echo ucwords(form_error('fak_product_price')); ?></span> 
     
	<label><?php echo $this->lang->line('label_vat_rate');?>: <span class="req">*</span>
	<?php    echo form_dropdown('fak_product_vat_rate',$fak_product_vat_rate_select_option,$fak_product_vat_rate,'class="form_input_select"');?></label>
	<span class="markcolor"><?php echo ucwords(form_error('fak_product_vat_rate')); ?></span> 
      
    <input name="submit" value="Submit" type="submit" />

    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>
<?php }  ?>

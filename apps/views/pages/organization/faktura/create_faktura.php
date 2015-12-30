<h3 class="content_edit"><?php echo $this->lang->line('fak_create_msg');?></h3>
<?php
    if($mem_type=="Admin" || $access_faktura){     
       
      if($data_fak_settings_details){
            $fak_settings_id = $data_fak_settings_details[0]->fak_settings_id;
            $fak_no_of_records_per_page = $data_fak_settings_details[0]->fak_no_of_records_per_page;
            $fak_payment_days = $data_fak_settings_details[0]->fak_payment_days;
            $fak_tax_rate = $data_fak_settings_details[0]->fak_tax_rate;
            $fak_invoice_no_check = $data_fak_settings_details[0]->fak_invoice_no;
            $fak_email_cc = $data_fak_settings_details[0]->fak_email_cc;
            $fak_payment_details = $data_fak_settings_details[0]->fak_payment_details;
        }
        $fak_invoice_no= array(
            'name'      => 'fak_invoice_no',
            'id'        => 'fak_invoice_no',
            'value'     => $fak_invoice_no,       
            'size'       =>"30",
            'readonly'       =>"readonly"
        );
        
        $fak_invoice_date= array(
            'name'      => 'fak_invoice_date',
            'id'        => 'fak_invoice_date',
            'value'     => $fak_invoice_date_intake,   
            'size'       =>"30",
            'class'		=> 'datepicker'
        );
        
        $fak_terms_of_payment_select_option = array(
            '10' => '10 days',
            '15' => '15 days',
            '20' => '20 days',
            '30' => '30 days',			         
            '60' => '60 days',			         
            '90' => '90 days'	         
        );     
        $fak_notes= array(
            'name'      => 'fak_notes',
            'id'        => 'fak_notes',
            'value'     => $fak_notes,   
            'size'       =>"30",

        );

        $fak_customer_notification= array(
            'name'      => 'fak_customer_notification',
            'id'        => 'fak_customer_notification',
            'value'     => $fak_customer_notification,  
            'size'       =>"30"
        );
        
         $fak_tax_rate_select_option = array(
            '0' => '0%',
            '6' => '6%',
            '12' => '12%',
            '25' => '25%'			         
        );  
        
        $product_name= array(
            'name'      => 'product_name[]',
            'id'        => 'product_name',
            'value'     => '',       
            'size'       =>"30",
        );
        
       $no_of_products= array(
            'name'      => 'no_of_products[]',
            'id'        => 'no_of_products',
            'value'     => '',       
            'size'       =>"30",
        );
        
         $price_ex_vat= array(
            'name'      => 'price_ex_vat[]',
            'id'        => 'price_ex_vat',
            'value'     => '',       
            'size'       =>"30",
        );
       
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('submit_btn'),
            'type'    => 'submit',
        );
?>

<script type="text/javascript">
function send_to_org_customer(){
      var selected_val = document.getElementById("fak_send_to_org_customer").value;
      if(selected_val){
            $("#fak_send_to_external_customer").attr("disabled",true);
      }else{
                $("#fak_send_to_external_customer").removeAttr("disabled");
     }
}

function send_to_external_customer(){
      var selected_val = document.getElementById("fak_send_to_external_customer").value;
      if(selected_val){
            $("#fak_send_to_org_customer").attr("disabled",true);
      }else{
                $("#fak_send_to_org_customer").removeAttr("disabled");
     }
}
function start_invoice_new_seq(val){
        var fak_invoice_no_id =  document.getElementById('fak_invoice_no');
        var myvar = document.getElementById("new_invoice_seq").checked;
        if(myvar){ 
            fak_invoice_no_id.removeAttribute('readonly');
        }
    else{ fak_invoice_no_id.setAttribute('readonly', 'readonly');}
}
</script>

<?php echo form_open("organization/info/create_faktura_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="form">

<label><?php echo $this->lang->line('label_fak_invoice_no');?>:
<?php echo form_input($fak_invoice_no); if($fak_invoice_no_check=="Yes") { ?> <span class="style1">*</span> <?php } ?>
<label><input type="checkbox" id="new_invoice_seq"  name="new_invoice_seq"  onClick="return start_invoice_new_seq(this.value);"/> <?php echo $this->lang->line('label_invoice_new_seq_start');?></label>
<span class="req"><?php echo ucwords(form_error('fak_invoice_no')); ?></span> </label>
 
 
<label><?php echo $this->lang->line('label_fak_invoice_date');?>: <span class="req">*</span>
<?php echo form_input($fak_invoice_date);?></label>
<span class="markcolor"><?php echo ucwords(form_error('fak_invoice_date')); ?></span> 
<span class="markcolor"><?php echo ucwords($invoice_date_error); ?></span> 
<label><?php echo $this->lang->line('label_org_customer');?>:
<select name="fak_send_to_org_customer" id="fak_send_to_org_customer" onchange="send_to_org_customer()">
<option value=""><?php echo $this->lang->line('label_select_org_customer');?></option>
<?php if($org_registered_member) { foreach($org_registered_member as $rows){ ?>
<option value="<?php echo $rows->mem_id;?>" <?php if($fak_send_to_org_or_ext_customer_id==$rows->mem_id ) { ?>" selected="<?php echo $fak_send_to_org_or_ext_customer_id; } ?> ">
<?php if($rows->customer_type=="Company" || $rows->customer_type=="Government" || $rows->customer_type=="Organization" ){echo $rows->dept_or_company_or_org_name; }
echo $rows->first_name."&nbsp;".$rows->last_name; ?></option>
<?php } } ?>
</select></label>
<span class="markcolor"><?php echo ucwords(form_error('fak_send_to_org_customer')); ?></span> 


<label><?php echo $this->lang->line('label_external_customer');?>:
<select name="fak_send_to_external_customer" id="fak_send_to_external_customer" onchange="send_to_external_customer()">
<option value=""><?php echo $this->lang->line('label_select_external_customer');?></option>                        
<?php //if($faktura_customers) { foreach($faktura_customers as $rows){ ?>
<option value="<?php //echo $rows->faktura_customer_id; if($fak_send_to_org_or_ext_customer_id==$rows->faktura_customer_id && ($external_or_org_customer=='external_customer') ) { ?>" selected="<?php //echo $fak_send_to_org_or_ext_customer_id; } ?> "><?php //echo $rows->fak_customer_or_company_name; ?></option>
<?php //} } ?>
</select></label>
<?php echo ucwords(form_error('fak_send_to_org_customer')); ?>

<label><?php echo $this->lang->line('label_fak_terms_of_payment');?>: <span class="req">*</span>
                    <?php    echo form_dropdown('fak_terms_of_payment',$fak_terms_of_payment_select_option,$fak_payment_days,'class="form_input_select"');?>
                    <span class="error"><?php echo ucwords(form_error('fak_terms_of_payment')); ?></span>
</label> 


<label><?php echo $this->lang->line('label_fak_notes');?>:
<?=form_textarea($fak_notes);?>                    
<span class="markcolor"><?php echo ucwords(form_error('fak_notes')); ?></span> 
</label>

<label><?php echo $this->lang->line('label_fak_customer_notification');?>:
                    <?=form_textarea($fak_customer_notification);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_notification')); ?></span> 
</label>

<div style="background: #eee">
    <table class="width-100 table-striped">
    <thead>
			<tr>
			<td></td>
			<td><?php echo $this->lang->line('label_fak_specification');?></td>
			<td></td>
			<td><?php echo $this->lang->line('label_fak_number');?></td>
			<td><?php echo $this->lang->line('label_price_ex_vat');?>Pris ex. moms</td>
			<td><?php echo $this->lang->line('label_vat_rate');?></td>
			</tr>                        
    </thead>
			<tbody>

        
                                <tr id="cloneable" class="trAlter">
                                    <td class="headerField" ><?php echo $this->lang->line('label_invoice');?></td>
                                        <td class="inputField">                                            
                                            <?=form_input($product_name);?>                    
                                            <span class="markcolor"><?php echo ucwords(form_error('product_name')); ?></span> 
                                       </td>
                                       <td class="inputField">   
                                         <select name="fak_product_name" >
                                            <?php if($data_fak_products) { foreach($data_fak_products as $rows){ ?>
                                                <option value="<?php echo $rows->faktura_product_id; ?>"><?php echo $rows->fak_product_name; ?></option>
                                            <?php } } ?>
                                            </select>
                                       </td>  
                                        <td class="inputField" >   
                                            <?=form_input($no_of_products);?>                    
                                            <span class="markcolor"><?php echo ucwords(form_error('no_of_products')); ?></span>  
                                        </td> 
                                        <td class="inputField">
                                            <?=form_input($price_ex_vat);?>                    
                                            <span class="markcolor"><?php echo ucwords(form_error('price_ex_vat')); ?></span> 
                                        </td>    
                                        <td class="inputField">
                                            <?php    echo form_dropdown('vat_rate[]',$fak_tax_rate_select_option,$fak_tax_rate,'class="form_input_select"');?>
                                            <span class="markcolor"><?php echo ucwords(form_error('vat_rate')); ?></span> 
                                        </td>
                                </tr>
                    </table>
                    </div>
                    <span class="btn add_product">+</span>
                    <span class="btn remove_product_field">-</span>
                    
                    <p></p>
                    <input name="submit" value="Submit" type="submit">
 
    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
<?php echo $this->lang->line('faktura_no_aacess_msg');?>

<?php }  ?>

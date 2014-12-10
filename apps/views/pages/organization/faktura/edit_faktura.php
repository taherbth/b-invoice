<h3 class="content_edit"><?php echo $this->lang->line('fak_create_msg');?></h2>
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
    
    if($faktura_info){
            $custom_faktura_id = $faktura_info[0]->custom_faktura_id;
            $org_id = $faktura_info[0]->org_id;
            $mem_id = $faktura_info[0]->mem_id;
            $fak_invoice_no = $faktura_info[0]->fak_invoice_no;
            $this_invoice_no = $faktura_info[0]->fak_invoice_no;
            $fak_invoice_date = $faktura_info[0]->fak_invoice_date;
            $fak_invoice_date_intake = date("Y-m-d", $fak_invoice_date);
            $fak_expire_date = $faktura_info[0]->fak_expire_date;
            $fak_invoice_cost = $faktura_info[0]->fak_invoice_cost;
            $fak_invoice_cost_applied = $faktura_info[0]->fak_invoice_cost_applied;
            $fak_total_price = $faktura_info[0]->fak_total_price;
            $fak_send_to_external_customer = $faktura_info[0]->fak_send_to_external_customer;
            $fak_send_to_org_customer = $faktura_info[0]->fak_send_to_org_customer;
            $fak_terms_of_payment = $faktura_info[0]->fak_terms_of_payment;
            $fak_notes = $faktura_info[0]->fak_notes;
            $fak_customer_notification = $faktura_info[0]->fak_customer_notification;
            $fak_status = $faktura_info[0]->fak_status;
            $fak_sent_by = $faktura_info[0]->fak_sent_by;
            $fak_reminder_by = $faktura_info[0]->fak_reminder_by;            
    }
        $fak_invoice_no= array(
            'name'      => 'fak_invoice_no',
            'id'        => 'fak_invoice_no',
            'value'     => $fak_invoice_no,       
            'size'       =>"30",
        );
        
        $fak_invoice_date= array(
            'name'      => 'fak_invoice_date',
            'id'        => 'fak_invoice_date',
            'value'     => $fak_invoice_date_intake,   
            'size'       =>"30",
            'class'		=>'datepicker'
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
            'class'   => 'submit-btn'
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
</script>
<?php echo form_open("organization/info/edit_faktura_process"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="form">

           
           
           <tr>
                <td><?php echo $this->lang->line('label_fak_invoice_no');?>:</td>
                <td>
                    <?php echo form_input($fak_invoice_no); if($fak_invoice_no_check=="Yes") { ?> <span class="req">*</span> <?php } ?>
                    <span class="style1"></span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_invoice_no')); ?></span> 
                </td>
            </tr>
            
           <tr style="top:20px">
                <td width="5%" style="text-align:left; padding-left:300px"><font class="inside"><?php echo $this->lang->line('label_fak_invoice_date');?>:</font></td>
                <td width="5%">
                    <?php echo form_input($fak_invoice_date);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_invoice_date')); ?></span> 
                    <span class="markcolor"><?php echo ucwords($invoice_date_error); ?></span> 
                </td>

            </tr>       

            <tr>
                <td width="5%" style="text-align:right; padding-top:5px"></td>
                <td width="5%">  </td>
            </tr>
            <tr style="top:20px">
                <td width="5%" style="text-align:left; padding-left:300px"><font class="inside"><?php echo $this->lang->line('label_org_customer');?>:</font></td>
                <td width="5%">  
                    <select name="fak_send_to_org_customer" id="fak_send_to_org_customer" onchange="send_to_org_customer()" <?php if($fak_send_to_external_customer) { echo "disabled=disabled"; } ?> >
                        <option value=""><?php echo $this->lang->line('label_select_org_customer');?></option>
                        <?php if($org_registered_member) { foreach($org_registered_member as $rows){ ?>
                        <option value="<?php echo $rows->mem_id; if($fak_send_to_org_customer==$rows->mem_id) { ?>" selected="<?php echo $fak_send_to_org_customer; }?>"><?php echo $rows->first_name."&nbsp;".$rows->last_name; ?></option>
                        <?php } } ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_send_to_org_customer')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="5%" style="text-align:right; padding-top:5px"></td>
                <td width="5%">  </td>
            </tr>
            <tr style="top:20px">
                <td width="5%" style="text-align:left; padding-left:300px"><font class="inside"><?php echo $this->lang->line('label_external_customer');?>:</font></td>
                <td width="5%">  
                    <select name="fak_send_to_external_customer" id="fak_send_to_external_customer" onchange="send_to_external_customer()" <?php if($fak_send_to_org_customer) { echo "disabled=disabled"; } ?>>
                        <option value=""><?php echo $this->lang->line('label_select_external_customer');?></option>                        
                        <?php if($faktura_customers) { foreach($faktura_customers as $rows){ ?>
                        <option value="<?php echo $rows->faktura_customer_id; if($fak_send_to_external_customer==$rows->faktura_customer_id) { ?>" selected="<?php echo $fak_send_to_external_customer; } ?>"><?php echo $rows->fak_customer_or_company_name; ?></option>
                        <?php } } ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_send_to_org_customer')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="5%" style="text-align:right; padding-top:5px"></td>
                <td width="5%">
                </td>
            </tr>
            <tr style="top:20px">
                <td width="5%" style="text-align:left; padding-left:300px"><font class="inside"><?php echo $this->lang->line('label_fak_terms_of_payment');?>:</font></td>
                <td width="5%">
                    <?php    echo form_dropdown('fak_terms_of_payment',$fak_terms_of_payment_select_option,$fak_terms_of_payment,'class="form_input_select"');?>                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_terms_of_payment')); ?></span> 
                </td>
            </tr>
            
             <tr>
                <td width="5%" style="text-align:right; padding-top:5px"></td>
                <td width="5%">
                </td>

            </tr>
            
            <tr>
                <td width="5%" style="text-align:left; padding-left:300px"><font class="inside"><?php echo $this->lang->line('label_fak_notes');?>:</font></td>
                <td width="5%">
                    <?=form_textarea($fak_notes);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_notes')); ?></span> 
                </td>

            </tr>
            
             <tr>
                <td width="5%" style="text-align:right; padding-top:5px"></td>
                <td width="5%">
                </td>
            </tr>
            
            <label>
            <?php echo $this->lang->line('label_fak_customer_notification');?>:
                    <?=form_textarea($fak_customer_notification);?>                    
                    <span class="markcolor"><?php echo ucwords(form_error('fak_customer_notification')); ?></span>
            </label>
            
            <fieldset>
            
                
                <table>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><?php echo $this->lang->line('label_fak_specification');?></td>
                            <td><?php echo $this->lang->line('label_fak_number');?></td>
                            <td><?php echo $this->lang->line('label_price_ex_vat');?>Pris ex. moms</td>
                            <td><?php echo $this->lang->line('label_vat_rate');?></td>
                        </tr>                        
                
                    </tbody>
                </table>
        </tbody></table>
        
        <div class="input_parent_div" >
                    <?php if($custom_faktura_assigned_product_info){ 
                                    foreach($custom_faktura_assigned_product_info as $assigned_product){ 
                    ?>
                        <div id="div_clone">
                            <table style="vertical-align: none; ">
                                <tr id="row_1" class="trAlter" style="vertical-align: none; ">
                                    <td class="headerField"  style="width: 135px; vertical-align: none; "><?php echo $this->lang->line('label_invoice');?></td>
                                        <td class="inputField" style="padding-right:20px; vertical-align: none; ">                                            
                                            <? //=form_input($product_name);?>                                              
                                            <input type="text" name="product_name[]" id="product_name" value=<?php echo $assigned_product->product_name;?> style = 'width:180px;height:21px' />
                                            <span class="markcolor"><?php echo ucwords(form_error('product_name')); ?></span> 
                                       </td>
                                       <td class="inputField" style="padding-right:20px; vertical-align: none; ">   
                                         <select name="fak_product_name" >
                                            <?php if($data_fak_products) { foreach($data_fak_products as $rows){ ?>
                                                <option value="<?php echo $rows->faktura_product_id; ?>"><?php echo $rows->fak_product_name; ?></option>
                                            <?php } } ?>
                                            </select>
                                       </td>  
                                        <td class="inputField" style="padding-right:20px; vertical-align: none; " >   
                                            <? //=form_input($no_of_products);?>                    
                                            <input type="text" name="no_of_products[]" id="no_of_products" value=<?php echo $assigned_product->no_of_products;?> style = 'width:180px;height:21px' />
                                            <span class="markcolor"><?php echo ucwords(form_error('no_of_products')); ?></span>  
                                        </td> 
                                        <td class="inputField" style="padding-right:20px; ">
                                            <?  //=form_input($price_ex_vat);?>       
                                            <input type="text" name="price_ex_vat[]" id="price_ex_vat" value=<?php echo $assigned_product->price_ex_vat;?> style = 'width:180px;height:21px' />
                                            <span class="markcolor"><?php echo ucwords(form_error('price_ex_vat')); ?></span> 
                                        </td>    
                                        <td class="inputField">
                                            <?php    echo form_dropdown('vat_rate[]',$fak_tax_rate_select_option,$assigned_product->vat_rate,'class="form_input_select"');?>
                                            <span class="markcolor"><?php echo ucwords(form_error('vat_rate')); ?></span> 
                                        </td>
                                </tr>
                            </table>
                        </div>
                    <?php } } ?>
                    </fieldset>
                </div>
                    <span class="btn add_product">+</span>
                    <span class="btn remove_product_field">-</span>
        

                <?=form_hidden('custom_faktura_id', $custom_faktura_id);?>
                <?=form_hidden('this_fak_invoice_no', $this_invoice_no);?>
                <p></p>
                <input name="submit" value="Submit" type="submit">

    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>

</div><?php }  ?>

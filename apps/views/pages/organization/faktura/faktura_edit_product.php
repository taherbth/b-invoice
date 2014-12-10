<h3 class="content_edit"><?php echo $this->lang->line('faktura_update_product_or_service');?></h2>
<?php
    if($mem_type=="Admin" || $access_faktura){     
    
       if($faktura_product_details){
           $faktura_product_id = $faktura_product_details[0]->faktura_product_id;
           $fak_product_name = $faktura_product_details[0]->fak_product_name;
           $fak_product_price = $faktura_product_details[0]->fak_product_price;
           $fak_product_vat_rate = $faktura_product_details[0]->fak_product_vat_rate;
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
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        $fak_product_price= array(
            'name'      => 'fak_product_price',
            'id'        => 'fak_product_price',
            'value'     => $fak_product_price,   
            'style'  => 'width:180px;height:21px',
            'size'       =>"30",
        );
        
        
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('update_btn'),
            'type'    => 'submit',
            'class'   => 'submit-btn'
        );
?>
<style>
    input {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .style1 {color: #FF3333}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php echo $this->session->flashdata('message'); ?>
<div style="width:900px">
        <span>         
            <span style="float:left;">
                <a href="<?php echo base_url().'organization/info/faktura_products';?>"> <button class="c"><?php echo $this->lang->line('fak_products');?></button></a>
            </span>           
        </span>
</div><div class="clear"></div>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo form_open("organization/info/edit_faktura_product_process"); ?>

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
           
           <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_product_name');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_product_name);?> <span class="style1">*</span>
                    <span class="style1"></span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_product_name')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            
           <tr style="top:20px">
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_price_ex_vat');?>:</font></td>
                <td width="33%">
                    <?=form_input($fak_product_price);?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_product_price')); ?></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr style="top:20px">
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside"><?php echo $this->lang->line('label_vat_rate');?>:</font></td>
                <td width="33%">
                    <?php    echo form_dropdown('fak_product_vat_rate',$fak_product_vat_rate_select_option,$fak_product_vat_rate,'class="form_input_select"');?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('fak_product_vat_rate')); ?></span> 
                </td>

            </tr>
            
                       
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
        </tbody></table>
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><?=form_hidden('faktura_product_id', $faktura_product_id);?><td width="33%">


                </td>

            </tr>
            <tr>
                <td width="38%"><td width="33%">
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>

</div><?php }  ?>

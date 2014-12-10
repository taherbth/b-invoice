<h3 class="content_edit"><?php echo $this->lang->line('order_view_invoice_letter_msg');?></h2>

<style>
    .SearchListing{
        border-bottom: 1px solid #C4C4C4;
        border-left: 1px solid #C4C4C4;
        border-right: 1px solid #C4C4C4;
        border-top: 1px solid #C4C4C4;
        margin-bottom:15px; 
        margin-top:20px;
        -moz-border-radius: 15px 15px 15px 15px;
    }
    .SearchListing p{ padding-left:10px; text-align:left}
	.c {
    background-color: #E0EAF1;
    color: #3E6D8E;
    font-size: 12px;
    height: 30px;
    text-decoration: none;
    white-space: nowrap;
}
a:hover{ text-decoration: none; color:green}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"search_title1",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>


<?php echo $this->session->flashdata('message'); ?>

<?php

if(count($invoice_letter)){
foreach ($invoice_letter as $invoice_letter_info):
   
        ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
         
            <span style="float:right; width:300px;">
                        
            <?php if($order_deliver_letters) { 
                            if(!$invoice_letter_info->fak_letter_delivered) { ?>
                                <a href="<?php echo base_url(); ?>admin/info/deliver_invoice_letter/<?php echo$invoice_letter_info->fak_id ;?> " >
                                <button class="c" name="archive" value="archive"><?php echo $this->lang->line('order_deliver_btn');?></button>
                                </a> 
                                &nbsp;&nbsp;&nbsp;           
                                <a href="<?php echo base_url(); ?>invoice/invoice_<?php echo $invoice_letter_info->org_name.'_'.$invoice_letter_info->org_number.'_'.$invoice_letter_info->fak_id.'.pdf'; ?> " >
                                <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_invoice_letter_btn');?></button>
                                </a>
                                <a href="<?php echo base_url(); ?>invoice/invoice_address/address_<?php echo $invoice_letter_info->org_name.'_'.$invoice_letter_info->org_number.'_'.$invoice_letter_info->fak_id.'.pdf'; ?> " >
                                <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_address_btn')."&nbsp;";echo $this->lang->line('order_address_msg');?></button>
                                </a>
                                <?php } elseif($invoice_letter_info->fak_letter_delivered) { ?>
                                <button class="c" disabled="disabled" value="archive"><?php echo $this->lang->line('order_delivered_btn');?></button>
                        </a> <?php } ?>
            <?php }  ?> 

           </span>
            </p>
            
           <p style="clear:both"><b><?php echo $this->lang->line('label_sender');?>:</b> <?php echo "Adminscentral"; ?></p> 
           <p style="clear:both"><b><?php echo $this->lang->line('label_receiver');?>:</b> <?php echo $invoice_letter_info->org_name."(".$invoice_letter_info->org_number.")"; ?></p> 
           <p style="float:left;"><b><?php echo $this->lang->line('label_letter')."&nbsp;"; echo $this->lang->line('label_title');?>: &nbsp;</b> <?php echo "Invoice Letter"; ?></p>
            <p style="clear:both"> 
            </p>
        </div>
    <?php endforeach; } ?>






<h3 class="content_edit"><?php echo $this->lang->line('communication_org_letter_msg');?></h2>

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


<?php echo $this->session->flashdata('message'); 
        echo anchor(base_url()."organization/info/write_new_letter", $this->lang->line('label_write_new'));
      
?>

<?php

if($query1){
foreach ($query1 as $admin_letter_info):
   
        ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
         
            <span style="float:right; width:300px;">
                        
            <?php if($order_deliver_letters) { 
                            if(!$admin_letter_info->letter_status) { ?>
                                <a href="<?php echo base_url(); ?>admin/info/deliver_admin_commnicate_letter/<?php echo $admin_letter_info->letter_id;?> " >
                                <button class="c" name="archive" value="archive"><?php echo $this->lang->line('order_deliver_btn');?></button>
                                </a> 
                                &nbsp;&nbsp;&nbsp;     
                               
                                <a href="<?php echo base_url(); ?>admin_letter/letter_<?php echo $admin_letter_info->letter_title.'_'.$admin_letter_info->letter_id.'.pdf'; ?> " >
                               
                                <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_admin_letter_btn');?></button>
                                </a>
                                <a href="<?php echo base_url(); ?>admin_letter/letter_address/address_<?php echo $admin_letter_info->letter_title.'_'. $admin_letter_info->letter_id.'.pdf'; ?> " >
                                <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_address_btn')."&nbsp;";echo $this->lang->line('order_address_msg');?></button>
                                </a>
                                <?php } elseif($admin_letter_info->letter_status){ ?>
                                <button class="c" disabled="disabled" value="archive"><?php echo $this->lang->line('order_delivered_btn');?></button>
                        </a> <?php } ?>
            <?php }  ?> 

           </span>
            </p>
            
           <p style="clear:both"><b><?php echo $this->lang->line('label_sender');?>:</b> <?php echo "Adminscentral"; ?></p> 
           <p style="clear:both"><b><?php echo $this->lang->line('label_receiver');?>:</b>                                 
           <a href="<?php echo base_url(); ?>admin_letter/letter_address/address_<?php echo $admin_letter_info->letter_title.'_'. $admin_letter_info->letter_id.'.pdf'; ?> " > <?php echo $this->lang->line('label_receiver');?> </a>
           </p> 
           <p style="float:left;"><b><?php echo $this->lang->line('label_letter')."&nbsp;"; echo $this->lang->line('label_title');?>: &nbsp;</b> <?php echo $admin_letter_info->letter_title; ?></p>
            <p style="clear:both"> 
            </p>
        </div>
    <?php endforeach; } ?>






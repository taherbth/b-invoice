<h3 class="content_edit"><?php echo $this->lang->line('admin_control_packages');?></h2>

<?php  //$this->load->model('admin/info_model');?> 

<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

</style>
<?php echo $this->session->flashdata('message'); ?>
     <fieldset>
       <legend align="left"><?php echo $this->lang->line('label_packages');?> </legend>
       <?php echo anchor(base_url()."admin/info/add_package", $this->lang->line('label_create_new'));?>

<table  border="1"  style="border-collapse:collapse; margin:10px;">
    <tr>
        <th><?php echo $this->lang->line('label_package_id');?> </th>
        <th><?php echo $this->lang->line('label_package_name');?></th>
        <th><?php echo $this->lang->line('label_no_of_member');?></th>     
        <th><?php echo $this->lang->line('label_duration')."(".$this->lang->line('label_month').")";?></th>  
        <th><?php echo $this->lang->line('label_billing_module_cost');?></th>       
        <th><?php echo $this->lang->line('label_letter_module_cost');?></th>       
        <th><?php echo $this->lang->line('label_sms_module_cost');?></th>       
        <th><?php echo $this->lang->line('label_member_fee_module_cost');?></th>       
        <th><?php echo $this->lang->line('label_full_module_cost');?></th>       
        <th><?php echo $this->lang->line('label_currency');?></th>       
        <th><?php echo $this->lang->line('label_status');?></th>       
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }<td align="center" width="7%">            
                <?php if($invoice_data->fak_status){echo $this->lang->line('invoice_paid_msg')."/";?>
                <a href="<?php echo base_url(); ?>organization/info/custom_invoice_make_unpaid/<?php echo $invoice_data->custom_faktura_id; ?> " >
                    <?php echo $this->lang->line('invoice_unpaid_link');  ?>
                </a>                
                <?php } elseif(!$invoice_data->fak_status){echo $this->lang->line('invoice_unpaid_msg')."/";?>
                <a href="<?php echo base_url(); ?>organization/info/custom_invoice_make_paid/<?php echo $invoice_data->custom_faktura_id; ?> " >
                    <?php echo $this->lang->line('invoice_paid_link');  ?>
                </a><?php } ?>
            </td>
    </script>
    <?php
    if (count($query1)) {
        $i = $loop_start + 1;
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            $currency_data = $this->info_model->get_currency($package_info->currency_id);
            //$package_assigned = $this->info_model->check_package_assigned($package_info->id);
            $package_assigned = 0; 
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->id; ?></td>
                <td width="3%" align="center"><?php echo $package_info->package_name; ?></td>
                <td align="center" width="8%"><?php echo $package_info->no_of_member; ?> </td>               
                <td align="center" width="8%"><?php echo $package_info->duration; ?> </td>               
                <td align="center" width="8%"><?php echo $package_info->billing_module_cost; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->letter_module_cost; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->sms_module_cost; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->member_fee_module_cost; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->full_package_cost; ?></td>               
                <td align="center" width="8%"><?php echo $currency_data[0]->currency_name; ?></td>    
                 <td align="center" width="7%">            
                <?php if($package_info->active){echo $this->lang->line('label_active')."/";?>
                <a href="<?php echo base_url(); ?>admin/info/package_make_inactive/<?php echo $package_info->id; ?> " >
                    <?php echo $this->lang->line('label_inactive');  ?>
                </a>                
                <?php } elseif(!$package_info->active){echo $this->lang->line('label_inactive')."/";?>
                <a href="<?php echo base_url(); ?>admin/info/package_make_active/<?php echo $package_info->id; ?> " >
                    <?php echo $this->lang->line('label_active');  ?>
                </a><?php } ?>
            </td>
                <td align="center" width="12%">
                <?php if(!$package_assigned){?>
                    <a href="<?php echo base_url(); ?>admin/info/package_edit/<?php echo $package_info->id; ?> " title="Edit the Content">
                    <img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/package_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a>
                </td> 
                <?php } 
                else{echo $this->lang->line('not_available_msg');}
                ?>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>
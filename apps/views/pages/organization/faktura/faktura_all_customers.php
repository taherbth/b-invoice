
<h3 class="content_edit"><?php echo $this->lang->line('faktura_all_customer_msg');?></h3>

<?php 
    if($mem_type=="Admin" || $access_faktura){ 
?>

      <?php  echo '<a class="button icon-add" href="'.base_url().'organization/info/create_faktura_new_customer">'.$this->lang->line('label_create_new').'</a>';  ?>
<?php echo $this->session->flashdata('message'); ?>
<table class="width-100 table-striped">
<thead>
    <tr>
        <th><?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_name');?></th>              
        <th><?php echo $this->lang->line('label_email');?></th>              
        <th><?php echo $this->lang->line('label_type');?></th>              
        <th><?php echo $this->lang->line('label_no_of_invoices');?></th>              
        <th><?php echo $this->lang->line('label_new_invoice');?></th>              
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
</thead>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($query1)) {
        $i = 1;
        foreach ($query1 as $fak_customer_info) {
            
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $fak_customer_info->faktura_customer_id; ?></td>              
                <td align="center" width="8%"><a href="<?php echo base_url(); ?>organization/info/edit_faktura_customer/<?php echo $fak_customer_info->faktura_customer_id; ?> " title="Edit the Content"><?php echo $fak_customer_info->fak_customer_or_company_name; ?></a></td>               
                <td align="center" width="8%"><?php echo $fak_customer_info->fak_customer_email; ?></td>               
                <td align="center" width="8%"><?php echo $fak_customer_info->fak_customer_type; ?></td>               
                <td align="center" width="8%"><?php echo "1st"; ?></td>               
                <td align="center" width="8%"><a href="<?php echo base_url(); ?>organization/info/create_faktura/external_customer/<?php echo $fak_customer_info->faktura_customer_id; ?> " title="Edit the Content"><?php echo $this->lang->line('label_new_invoice'); ?></a></td>             
                <td align="center" width="12%">
                <a href="<?php echo base_url(); ?>organization/info/edit_faktura_customer/<?php echo $fak_customer_info->faktura_customer_id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
                &nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/delete_faktura_customer/<?php echo $fak_customer_info->faktura_customer_id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a><br/>
                
                </td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }else{//echo $this->lang->line('not_available_msg');
    }
    ?>
</table>
    <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>

<?php }  ?>
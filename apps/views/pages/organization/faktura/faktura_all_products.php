
<h3 class="content_edit"><?php echo $this->lang->line('faktura_all_products_msg');?></h3>

<?php 
    if($mem_type=="Admin" || $access_faktura){ 
?>

<h5 class="breadcrumb">
	<span><a href="<?php echo base_url().'organization/info/faktura_settings';?>"><?php echo $this->lang->line('fak_settings');?></a></span>
	<span class="active"><a href="<?php echo base_url().'organization/info/faktura_products';?>"><?php echo $this->lang->line('fak_products');?></a></span>
</h5>
<?php echo $this->session->flashdata('message'); ?>
<a class="button icon-add" href="<?php echo base_url().'organization/info/create_faktura_new_products';?>"><?php echo $this->lang->line('faktura_create_new_product_or_service');?></a>
<table class="width-100 table-striped">
    <thead>
    <tr>
        <th><?php echo $this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_product_name');?></th>              
        <th><?php echo $this->lang->line('label_price_ex_vat');?></th>              
        <th><?php echo $this->lang->line('label_vat_rate');?></th>              
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
        foreach ($query1 as $fak_product_info) {
            
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $fak_product_info->faktura_product_id; ?></td>              
                <td align="center" width="8%"><a href="<?php echo base_url(); ?>organization/info/edit_faktura_product/<?php echo $fak_product_info->faktura_product_id; ?> "><?php echo $fak_product_info->fak_product_name; ?></a></td>               
                <td align="center" width="8%"><?php echo $fak_product_info->fak_product_price. "SEK"; ?></td>               
                <td align="center" width="8%"><?php echo $fak_product_info->fak_product_vat_rate."%"; ?></td>               
                 <td align="center" width="12%">
                <a class="button icon-edit" href="<?php echo base_url(); ?>organization/info/edit_faktura_product/<?php echo $fak_product_info->faktura_product_id; ?> ">Edit</a>
                <a class="button icon-remove" onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/delete_faktura_product/<?php echo $fak_product_info->faktura_product_id; ?>">Delete</a><br/>
                
                </td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }else{ //echo $this->lang->line('not_available_msg');
    }
    ?>
</table>
    <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('faktura_no_aacess_msg');?></span>
<?php }  ?>
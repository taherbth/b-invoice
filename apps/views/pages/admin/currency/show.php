
<h3 class="content_edit"><?php echo $this->lang->line('admin_control_currency');?> </h2>
<?php  $this->load->model('admin/info_model');?> 

<?php echo $this->session->flashdata('message'); ?>
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
     <fieldset>
      <legend align="left"><?php echo $this->lang->line('label_currency');?> </legend>
     
      <?php echo anchor(base_url()."admin/info/add_currency", $this->lang->line('label_create_new'));?>

<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th><?php echo $this->lang->line('label_currency')."&nbsp;".$this->lang->line('label_id');?></th>
        <th><?php echo $this->lang->line('label_currency')."&nbsp;".$this->lang->line('label_name');?></th>            
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
    <script language="javascript">
        function confirmSubmit() {
           // var agree=confirm("Are you sure to delete this record?");
           var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($currency_data)) {
        $i = $loop_start + 1;
        foreach ($currency_data as $currency) {
            if ($i % 2 == 0): $color = "#F1FAFA";
            else : $color = "#DDDDDD";
            endif;
            $currency_assigned = $this->info_model->check_currency_assigned($currency->id);
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $currency->id; ?></td>
                <td width="3%" align="center"><?php echo $currency->currency_name; ?> </td>

                <td align="center" width="12%">
                <?php if(!$currency_assigned){?>
                    <a href="<?php echo base_url(); ?>admin/info/currency_edit/<?php echo $currency->id; ?> " title="Edit the Content">
                    <img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
                    &nbsp;&nbsp;&nbsp;
                    <a onclick="return confirmSubmit()" href="<?php echo base_url() ?>admin/info/currency_delete/<?php echo $currency->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a>
                <?php } 
                else{echo $this->lang->line('not_available_msg');}
                ?>
                </td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>
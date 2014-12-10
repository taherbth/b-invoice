<h3 class="content_edit"><?php echo $this->lang->line('admin_control_update_invoice');?> </h2>

<style>
.markcolor{ color:red}
legend { vertical-align:middle
    -moz-border-radius: 10px 10px 10px 10px;
    background-color: #499DC4;
    color: White;
    font: bold 12px Arial;
    padding: 5px 10px;
    text-align: center;
}
.success{ color:green;}
</style>
<p></p>
<div class="infobox" style="width: 450px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo form_open(base_url()."admin/info/invoice_edit_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
<?php echo $this->lang->line('label_invoice_cost');?>:<br>
<input name="fak_invoice_cost" value="<?php echo $faktura_info[0]->fak_invoice_cost;?>" class="form_normal" type="text">
<br><br>
 
<?php echo $this->lang->line('label_package_cost');?>:<br>
<input name="fak_unit_price" value="<?php echo $faktura_info[0]->fak_unit_price;?>" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('fak_unit_price')); ?></span> <br>   <br>

<?php echo $this->lang->line('label_sms_unit_cost');?>:<br>
<input name="sms_unit_price" value="<?php echo $faktura_info[0]->sms_unit_price;?>" class="form_normal" type="text">

<br><br>

<?php echo $this->lang->line('label_letter_unit_cost');?>:<br>
<input name="letter_unit_price" value="<?php echo $faktura_info[0]->letter_unit_price;?>" class="form_normal" type="text">


<?=form_hidden('fak_id', $faktura_info[0]->fak_id);?>
<?//=form_hidden('user_type_id', $user_type_id);?>


<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('submit_btn');?>" class="submit" type="image">

<?php echo form_close(); ?>
</div>

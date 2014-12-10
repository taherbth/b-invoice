<h3 class="content_edit">Org Admin Control Panel Cost Seetings</h2>
<style>
    .markcolor{ color:red}
</style>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/added_cost"); ?>
    <?php echo $this->session->flashdata('message'); ?>

    Sms Cost<br>
    <input name="sms_cost" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('sms_cost')); ?></span> 
    Letter Cost<br>
    <input name="letter_cost" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('letter_cost')); ?></span>           

    <br><br>
    <br>

    Currency<span class="style1">*</span><br>
    <select name="currency" style="width:160px">
        <option value="">Select</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="GBP">GBP</option>
        <option value="CAD">CAD</option>
        <option value="AUD">AUD</option>
    </select>
    <span class="markcolor"><?php echo ucwords(form_error('currency')); ?></span>

    <br>    <br>




    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

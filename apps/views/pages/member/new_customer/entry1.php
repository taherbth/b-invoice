<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
<style>


</style>
<?php echo form_open("main/added_org"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    Name:<br>
    <input name="name" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    Post Address:<br>
    <input name="post_address" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('post_address')); ?></span>           

    <br><br>

    Package Name:<br>
    <?php $query = $this->db->query("select * from package"); ?>
    <select name="package_name" style="width:500px">
        <option value="">Select</option>
        <?php foreach ($query->result() as $info): ?>
            <option value="<?php echo $info->id; ?>">Package(<?php echo $info->package_name; ?>)Duration(<?php echo $info->duration; ?> Year),Amount(<?php echo $info->amount; ?>),Currency(<?php echo $info->currency; ?>),No of member(<?php echo $info->no_of_member; ?>)</option>

        <?php endforeach; ?>
    </select>
    <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span>           

    <br><br>
    Area:<br>
    <?php $query1 = $this->db->query("select * from zone"); ?>
    <select name="area_name" style="width:200px">
        <option value="">Select</option>
        <?php foreach ($query1->result() as $info1): ?>
            <option value="<?php echo $info1->id; ?>"><?php echo $info1->zone; ?></option>

        <?php endforeach; ?>
    </select>
    <span class="markcolor"><?php echo ucwords(form_error('area_name')); ?></span>           

    <br><br>

    Phone No<br>
    <input name="phone_no" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span>

    <br>

    Email:<br>
    <input name="email" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>

    <br>

    Credit Card Info:<br>
    <textarea name="credit_card_info" rows="10" class="form_normal_textarea"></textarea>
    <span class="markcolor"><?php echo ucwords(form_error('credit_card_info')); ?></span>

    <br>
    Chairman of org:<br>
    <input name="chairman" class="form_normal" type="text">
    <span class="markcolor"><?php echo ucwords(form_error('chairman')); ?></span>
    <br>

    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>


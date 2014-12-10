<h3 class="content_edit"><?php echo $this->lang->line('admin_control_category_entry');?></h2>

<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>

<?php echo form_open("admin/info/added_org_category"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo $this->lang->line('label_organization_category');?>:<br>
    <input name="org_category" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('org_category')); ?></span> 
    <br><br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>


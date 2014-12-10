<h3 class="content_edit"><?php echo $this->lang->line('admin_control_modify_org_category');?></h2>

<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $org_category):
    endforeach;
endif;

$org_cat = array(
    'name' => 'org_category',
    'id' => 'org_category',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'class' =>'form_normal',
    'value' => $org_category->category_name
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo $this->lang->line('label_organization_category');?>:<br>

    <input name="id" value="<?php echo $org_category->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($org_cat); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('org_category')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

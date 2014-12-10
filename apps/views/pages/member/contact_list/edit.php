<h3 class="content_edit">Member Control Panel  Modify Contact List</h2>
<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$name = array(
    'name' => 'name',
    'id' => 'name',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->name
);
$contact_no = array(
    'name' => 'contact_no',
    'id' => 'contact_no',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->contact_no
);

?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
     <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
     Name<br>
     <?php echo form_input($name); ?>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    <br>
    Contact No <br>
     <?php echo form_input($contact_no); ?>
    <span class="markcolor"><?php echo ucwords(form_error('contact_no')); ?></span> 
    <br><br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>

<h3 class="content_edit">Member Control Panel  Modify article</h2>

<style>
    .markcolor{ color:red}
	input {
    background: none repeat scroll 0 0 #CCCCCC;
    color: #333333;
    font-family: Arial,Helvetica;
    font-size: x-small;
}
</style>
<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->text
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
     <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
     Title<br>
    <input name="title"  value="<?php echo $org_info->title; ?>" style="width:200px; height:30px" class="" type="text">
     <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span> 
    <br>Text<br>
   
    <textarea rows="7" name="text" cols="50" style="background: none repeat scroll 0 0 #CCCCCC;"><?php echo $org_info->text; ?></textarea>
    <br><br>
    
    <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

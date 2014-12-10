<style>
    .markcolor{ color:red}
</style>
<h3 class="content_edit">Admin Control Panel Modify Area </h2>

<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$article_category = array(
    'name' => 'article_category',
    'id' => 'article_category',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->category_name
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    
    Area Name<br>

    <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($article_category); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

<style>
    .markcolor{ color:red}
</style>
<h3 class="content_edit"><?php echo $this->lang->line('org_admin_modify_article_category_msg');?></h2>

<?php
if (count($record)):
    foreach ($record as $article_category_info):
    endforeach;
endif;

$article_category = array(
    'name' => 'article_category',
    'id' => 'article_category',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $article_category_info->category_name
);
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    
    <?php echo $this->lang->line('label_article_category_name');?><br>

    <input name="id" value="<?php echo $article_category_info->art_cat_id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($article_category); ?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>

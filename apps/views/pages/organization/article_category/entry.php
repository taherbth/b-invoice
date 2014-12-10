<h3 class="content_edit">OrgAdmin Control Panel Create Article Category </h2>
<?php
$category = array(
    'name' => 'article_category',
    'id' => 'article_category',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
);
?>
<?php echo form_open("organization/info/added_article_category"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    Category Name:<br>
    <input name="article_category" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
    <br><br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
<?php echo form_close(); ?>
</div>


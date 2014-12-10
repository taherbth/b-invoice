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

    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <table class="width-100">
<tr>
<td>
    <?php echo $this->lang->line('label_article_category_name');?></td>
    <td>

    <input name="id" value="<?php echo $article_category_info->art_cat_id; ?>" class="form_normal" type="hidden">
    <?php echo form_input($article_category); ?>
    <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
    </td>
    <?php echo form_close(); ?>
    </tr>
    </table>
    <input name="submit" value="Submit" type="submit">

<h3 class="content_edit"><?php echo $this->lang->line('org_admin_view_article_category_msg');?></h3>

     
<?php 
 if($mainboard_change_article){
echo $this->session->flashdata('message'); ?>

      <h4><?php echo $this->lang->line('view_article_category_msg');?></h4>
              <?php if($mainboard_change_article){  echo '<a href="'.base_url().'organization/info/add_article_category'.'" class="button icon-add">'.$this->lang->line('label_create_new').'</a>'; }?>

<table class="width-100 table-striped">
    <thead>
    <tr>
        <th><?php echo $this->lang->line('label_article_category_id');?></th>
        <th><?php echo $this->lang->line('label_article_category_name');?></th>            
        <th><?php echo $this->lang->line('label_action');?></th>
    </tr>
    </thead>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($query1)) {
        foreach ($query1 as $article_info) {
            ?>
            <tr>
                <td><?php echo $article_info->art_cat_id; ?></td>
                <td><?php echo $article_info->category_name; ?> </td>
                <td>
                    <a class="button icon-edit" href="<?php echo base_url(); ?>organization/info/article_category_edit/<?php echo $article_info->art_cat_id; ?> ">Edit</a>
					<a class="button icon-remove" onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/article_category_delete/<?php echo $article_info->art_cat_id; ?>">Delete</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>

<?php } else { ?>  
<div class="notification">
 <span style="color:red;"><?php echo $this->lang->line('edit_article_no_access_msg');?></span>

</div><?php }  ?>

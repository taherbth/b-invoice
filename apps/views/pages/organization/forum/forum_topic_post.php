<h3 class="content_edit"><?php echo $this->lang->line('forum_topic_post_msg');?></h3>

<?php
    if ($mem_type=="Admin" || $forum_access){
 
  $topic_title= array(
        'name'      => 'topic_title',
        'id'        => 'topic_title',
        'value'     => $topic_title,          
        'size'       =>"30"        
    );
    
    
    $topic_text= array(
        'name'      => 'topic_text',
        'id'        => 'topic_text',
        'class'		=> 'redactor',         
        'value'        => $topic_text,         
        'size'       =>"30"        
    );
   
    $publish_date= array(
        'name'      => 'publish_date',
        'id'        => 'publish_date',
        'class'		=> 'datepicker',      
        'value'        => $publish_date_intake,         
        'size'       =>"30"        
    );
    
    $expire_date= array(
        'name'      => 'expire_date',
        'id'        => 'expire_date',
        'class'		=> 'datepicker',    
        'value'        => $expire_date_intake,         
        'size'       =>"30"        
    );
    
?>

    <?php 
    echo  form_open_multipart("organization/info/add_forum_topic_process"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    
     <table class="width-100">             
    <tr>
    <td>
    
		<label><?php echo $this->lang->line('label_title');?>: <span class="req">*</span></label>
    </td>
    <td>
                        <?php echo form_input($topic_title);?> 
                        <span class="markcolor"><?php echo ucwords(form_error('topic_title')); ?></span> 
    </td>
    </tr>
    
    
    <tr>
    <td>
<label><?php echo $this->lang->line('label_text');?>: <span class="req">*</span></label>
    </td>
    <td width="80%"><?php echo form_textarea($topic_text);?>
                        <span class="markcolor"><?php echo ucwords(form_error('topic_text')); ?></span>
    </td>
    </tr>
    
    <tr>
    <td>

<label><?php echo $this->lang->line('label_publish_date');?>: <span class="req">*</span></label>
    </td>
    <td>
                         <?php echo form_input($publish_date);?>
                        <span class="markcolor"><?php echo ucwords(form_error('publish_date')); ?></span> <br/>
                        <span class="markcolor"><?php echo ucwords($publish_date_error); ?></span> 
    </td>
    </tr>
    
    <tr>
    <td>
<?php echo $this->lang->line('label_expire_date');?>: <span class="req">*</span></td>

<td>
                         <?php echo form_input($expire_date);?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> <br/>
                        <span class="markcolor"><?php echo ucwords($expire_date_error); ?></span>
</td>
    </tr>

        <?php echo form_close(); ?>
    </table>
    <input type="submit" name="submit" value="Submit">
<?php } else { ?>  
<div class="error">
 <span style="color:red;"><?php echo $this->lang->line('forum_no_access_msg');?></span>
</div><?php }  ?>

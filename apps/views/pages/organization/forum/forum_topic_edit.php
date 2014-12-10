<h3 class="content_edit"><?php echo $this->lang->line('forum_topic_edit_msg');?></h3>

<?php

if ($mem_type=="Admin" || $topic_details[0]->member_id == $this->session->userdata('mem_id')){
 
  $topic_title= array(
        'name'      => 'topic_title',
        'id'        => 'topic_title',
        'value'     => $topic_details[0]->topic_title,          
        'size'       =>"30"        
    );
    
    
    $topic_text= array(
        'name'      => 'topic_text',
        'id'        => 'topic_text',         
        'value'        => $topic_details[0]->topic_text,         
        'size'       =>"30",
        'class'		=> 'redactor'        
    );
   
    $publish_date= array(
        'name'      => 'publish_date',
        'id'        => 'publish_date',         
        'value'        => date("Y-m-d",$topic_details[0]->publish_date),         
        'size'       =>"30",
        'class'		=> 'datepicker'        
    );
    
    $expire_date= array(
        'name'      => 'expire_date',
        'id'        => 'expire_date',         
        'value'        => date("Y-m-d",$topic_details[0]->expire_date),         
        'size'       =>"30",
		'class'		=> 'datepicker'    
    );
    
    
?>
    <?php 
    echo  form_open_multipart("organization/info/edit_forum_topic_process"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    
     <div id="post_article_div" >                    
    <div>

        <table class="width-100">
            <tbody>
            <br>
   
                <tr>
                    <td width="10%" ><?php echo $this->lang->line('label_title');?>: <span class="req">*</span></td>
                    <td width="45%">

                        <?=form_input($topic_title);?>
                        <span class="req"><?php echo ucwords(form_error('topic_title')); ?></span> 
                    </td>

                </tr>
           
           
           <tr>
                    <td width="10%" ><?php echo $this->lang->line('label_text');?>: <span class="req">*</span></td>
                    <td width="45%">

                        <?php echo form_textarea($topic_text);?>
                        <span class="req"><?php echo ucwords(form_error('topic_text')); ?></span> 
                    </td>

                </tr>
                
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><?php echo $this->lang->line('label_publish_date');?>: <span class="req">*</span></td>
                    <td width="45%">
                         <?=form_input($publish_date);?>
                        <span class="req"><?php echo ucwords(form_error('publish_date')); ?></span> <br/>
                        <span class="req"><?php echo ucwords($publish_date_error); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><?php echo $this->lang->line('label_expire_date');?>: <span class="req">*</span></td>
                    <td width="45%">
                         <?php echo form_input($expire_date);?>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> <br/>
                        <span class="markcolor"><?php echo ucwords($expire_date_error); ?></span> 

                    </td>
                </tr>
               
                   <input name="topic_id" value="<?php echo $topic_details[0]->topic_id; ?>" class="form_normal" type="hidden">          
                </tbody>
            </table>

            <input name="submit" value="Update" type="submit">
 
        <?php echo form_close(); ?>
    </div>
   <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('forum_no_access_msg');?></span>
<?php }  ?>
</div>
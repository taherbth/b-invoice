<h3 class="content_edit"><?php echo $this->lang->line('article_edit_msg');?></h2>

<?php

//print_r($article_details);exit;
                  
if ($edit_article || $this->session->userdata('mem_id')==$member_id){
$article_id="";
if($article_details){
    $article_reminder_email_time= "";
    $article_reminder_email_time_unit_val ="";
    foreach($article_details as $rows) {
        $article_id = $rows->article_id;
        $org_id = $rows->org_id;
        $member_id = $rows->member_id;
        $article_title = $rows->article_title;
        $uploaded_article_val = $rows->uploaded_article;
        $article_text = $rows->article_text;
        $article_color_code = $rows->article_color_code; 
        $article_category_val = $rows->article_category;
        $article_type_val = $rows->article_type;
        $importance = $rows->importance;
        $publish_date_intake = $rows->publish_date;
        $expire_date_intake = $rows->expire_date;
        $send_article_by = $rows->send_article_by;
        $send_notification_by = $rows->send_notification_by;
        $send_to_group = $rows->send_to_group;
        $send_to_member = $rows->send_to_member;
        $article_status = $rows->article_status;
        $article_proposal = $rows->article_proposal;
        
        if($rows->article_reminder_email_time){
            $article_reminder_email_time_data = explode("-",$rows->article_reminder_email_time);
            $article_reminder_email_time =  $article_reminder_email_time_data[0];
            $article_reminder_email_time_unit_val =  $article_reminder_email_time_data[1];
        }        
        
        if($article_text){
            $post_article = "create_article";
        }elseif($uploaded_article_val){$post_article = "upload_article";}
    }
}
    
     $checked_create_article = "";
     $checked_upload_article ="";
     if($post_article=='create_article') {$checked_create_article="checked";}
     if($post_article=='upload_article') {$checked_upload_article="checked";}
 
     $post_article_radio1= array(
        'name'      => 'post_article',
        'id'        => 'post_article',         
        'value'        => "create_article",         
        'onclick' => "article_post(this.value);" ,
       
    );
    $post_article_radio2= array(
        'name'      => 'post_article',
        'id'        => 'post_article',         
        'value'        => "upload_article",         
       'onclick' => "article_post(this.value);"      
    );
    
  $article_title= array(
        'name'      => 'article_title',
        'id'        => 'article_title',
        'value'     => $article_title,          
        'size'       =>"30"        
    );
    
    $uploaded_article= array(
        'name'      => 'uploaded_article',
        'id'        => 'uploaded_article',         
        'value'        => "",         
        'size'       =>"30"        
    );
    
    $article_text= array(
        'name'      => 'article_text',
        'id'        => 'article_text',         
        'value'        => $article_text,         
        'size'       =>"30",
        'class'		=> 'redactor'    
    );
    
    /////////////
       $article_color_code= array(
        'name'      => 'rgb2',
        'id'        => 'article_color_code',         
        'value'        => $article_color_code,         
        'size'       =>"30"        
    );
       
    $article_category = $org_article_category;
       $article_type= array(
        'name'      => 'article_type',
        'id'        => 'article_type',         
        'value'        => "",         
        'size'       =>"30"        
    );
       
    $importance_option = array(
			''  => $this->lang->line('label_select_importance'),
              '1'        => '1',
              '2'      => '2',
              '3'      => '3',
              '4'      => '4',
              '5'      => '5'
            );     
       $publish_date= array(
        'name'      => 'publish_date',
        'id'        => 'publish_date',         
        'value'        => date("Y-m-d",$publish_date_intake),         
        'size'       =>"30",
        'class'		=> 'datepicker'    
    );
    
    
       
    $article_type_option = array(
			''  => $this->lang->line('label_select_type'),
              '2'        => $this->lang->line('label_private'),
              '1'      => $this->lang->line('label_public')
            );  
            
            
       $expire_date= array(
        'name'      => 'expire_date',
        'id'        => 'expire_date',         
        'value'        => date("Y-m-d",$expire_date_intake),         
        'size'       =>"30",
        'class'		=> 'datepicker'    
    );
       $send_article_by= array(
        'name'      => 'send_article_by',
        'id'        => 'send_article_by',         
        'value'        => $send_article_by,         
        'size'       =>"30"        
    );
    
     $send_notification_by= array(
        'name'      => 'send_notification_by',
        'id'        => 'send_notification_by',         
        'value'        => $send_notification_by,         
        'size'       =>"30"        
    );
    
      /*  $send_to_group= array(
        'name'      => 'send_to_group',
        'id'        => 'send_to_group',         
        'value'        => $send_to_group,         
        'size'       =>"30"        
    );
    
        $send_to_member= array(
        'name'      => 'send_to_member',
        'id'        => 'send_to_member',         
        'value'        => $send_to_member,         
        'size'       =>"30"        
    );*/
    
     $article_reminder_email_time= array(
        'name'      => 'article_reminder_email_time',
        'id'        => 'article_reminder_email_time',         
        'value'        => $article_reminder_email_time,         
        'size'       =>"30"        
    );
     $article_reminder_email_time_unit = array(
		      'Minute'        => $this->lang->line('label_minute'),
              'Hour'      => $this->lang->line('label_hour'),
              'Day'      =>$this->lang->line('label_day'),
              'Week'      => $this->lang->line('label_week')
            );     
    
?>


<script>

function article_post(val){
    
    if(val=="create_article")
    {
        document.getElementById('post_article_upload_div').style.display="none";
        document.getElementById('post_article_create_div').style.display="";
        document.getElementById('post_article_div').style.display="";
        
    }
    if(val=="upload_article")
    {
        document.getElementById('post_article_create_div').style.display="none";
        document.getElementById('post_article_upload_div').style.display="";
        document.getElementById('post_article_div').style.display="";
    }
}

    function view1()
    {
        var myvar = document.getElementById("e").checked;
        if(myvar)
        {
            $("#f").attr("disabled",true);
			
			
        }
        else
        {           
            $("#f").removeAttr("disabled");
        }
    }
    function view2()
    {
        var myvar = document.getElementById("f").checked;
        if(myvar)
        {
            $("#e").attr("disabled",true);
			
			
        }
        else
        {           
            $("#e").removeAttr("disabled");
        }
    } 
    function display_notification()
    {
        var myvar = document.getElementById("send_notification").checked;
        if(myvar)
        {
            $("#Send_to").show();		
            $("#send_article").attr("disabled",true);
            $("#b").show();	
			
        }
        else
        {   $("#b").hide();
             $("#Send_to").hide();		
            $("#d").removeAttr("checked");
            $("#c").removeAttr("checked");	         
            $("#send_article").removeAttr("disabled");
        }
    }
    function display_article()
    {
        var myvar = document.getElementById("send_article").checked;
        if(myvar)
        {            
            $("#a").show();			
            $("#Send_to").show();			
            $("#send_notification").attr("disabled",true);;
		
        }
        else
        {
            $("#a").hide();	
            $("#Send_to").hide();		
            $("#e").removeAttr("checked");
            $("#f").removeAttr("checked");	
            $("#e").removeAttr("disabled");
            $("#f").removeAttr("disabled");		
            $("#send_notification").removeAttr("disabled");
			
        }
    }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<script>
    function check($id)
    {
        var myvar = document.getElementById("member_check"+$id).checked;
        if(myvar)
        {
            $("#member"+$id).show();
            $("#group_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_id"+$id+":checked").each(function(){
                this.checked = false;
            });

            $("#group_check"+$id).removeAttr("disabled");
            $("#member"+$id).hide();							   
        }
    }
    function check1($id)
    {
        var myvar = document.getElementById("group_check"+$id).checked;
        if(myvar)
        {
            $("#member_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_check"+$id).removeAttr("disabled");
        }
    }
</script>

    <?php 
    $attributes = array('name' => 'myform');
    echo  form_open_multipart("organization/info/edit_article_process",$attributes); ?>
    <?php echo $this->session->flashdata('message'); ?>
     <p class="error"> <?php echo $file_upload_failed; ?></p> 

     <?php 
            echo '<label>'.form_radio($post_article_radio1,"",$checked_create_article).' '. $this->lang->line('label_create').'</label>';
            echo '<label>'.form_radio($post_article_radio2,"",$checked_upload_article).' '. $this->lang->line('label_upload').'</label>';            
    ?>
    
     <div id="post_article_div" <?php if($post_article=="create_article" || $post_article=="upload_article"){?>style="display:'';" <?php } elseif($post_article==""){?>style="display:none;" <?php } ?>>                    
    <br/>
    <div>

        <table class="width-100">
            <tbody>
                <tr>
                    <td> <?php echo $this->lang->line('label_title');?>: <span class="req">*</span></td>
                    <td>

                        <?php echo form_input($article_title);?>
                        <span class="error"><?php echo ucwords(form_error('article_title')); ?></span> 
                    </td>

                </tr>
            </tbody>
            </table>
            

				<table class="width-100" id="post_article_create_div" <?php if($post_article=="create_article"){?>style="display:'none';" <?php } elseif($post_article=="" || $post_article=="upload_article" ){?>style="display:none;" <?php } ?>>
					<tr>
						<td><?php echo $this->lang->line('label_text');?>:  <span class="req">*</span></td>
						<td>
							<?=form_textarea($article_text);?>
							<span class="error" ><?php echo ucwords(form_error('article_text')); ?></span>
						</td>
					</tr>
				</table>
                
                
                <table class="width-100">
                <tr>
                <td>
                <?php echo $this->lang->line('label_article_color');?>:</td>
                <td><input class="colorpicker" type="text" size="10" maxlength="7" name="rgb2">
                </td>
                </tr>

				
                <tr id="post_article_upload_div" <?php if($post_article=="upload_article"){?>style="display:'';"  <?php } elseif($post_article=="" || $post_article=="create_article" ){?>style="display:none;" <?php } ?>>                    
                    <td><?php echo $this->lang->line('label_upload_file');?>: <span class="req">*</span></td>
                    <td><input type="file" name="uploaded_article" id="uploaded_article" />
                    <span class="error"><?php echo ucwords(form_error('uploaded_article')); ?></span></td>
                </tr>
                


                <tr>
                    <td><?php echo $this->lang->line('label_publish_date');?>: <span class="req">*</span></td>
                    <td>
                         <?php echo form_input($publish_date);?>
                        <span class="error"><?php echo ucwords(form_error('publish_date')); ?></span>
                        <span class="error"><?php echo ucwords($publish_date_error); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('label_importance');?>: <span class="req">*</span></td>
                    <td>
                        <?php echo form_dropdown('importance',$importance_option,$importance,'id="importance"','class="form_input_select"');?>
                        <span class="error"><?php echo ucwords(form_error('importance')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('label_article_category');?>:</td>
                    <td>
                    	<?php echo form_dropdown('article_category',$article_category,$article_category_val,'class="form_input_select"');?>
                    	<span class="error"><?php echo ucwords(form_error('article_category')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('label_article_type');?>: <span class="req">*</span></td>
                    <td>
                        <?php echo form_dropdown('article_type',$article_type_option,$article_type_val,'class="form_input_select"');?>
                        <span class="error"><?php echo ucwords(form_error('article_type')); ?></span> 
                    </td>
                </tr>
               
                <tr>
                    <td><?php echo $this->lang->line('label_expire_date');?>: <span class="req">*</span></td>
                    <td>
                         <?php echo form_input($expire_date);?>
                        <span class="error"><?php echo ucwords(form_error('expire_date')); ?></span> <br/>
                        <span class="error"><?php echo ucwords($expire_date_error); ?></span> 

                    </td>
                </tr>
                <tr>

                    <td><?php echo $this->lang->line('label_article_sending_way');?> :</td>
                    <td>                    
                        <?php if($this->session->userdata('mem_type')=="Admin" || $mainboard_sending_out) { ?><label><input type="checkbox" name="send_by" value="send_article_by" id="send_article" onClick="return display_article();"/> <?php echo $this->lang->line('label_article_send_by');?></label>
                        <em><?php echo $this->lang->line('label_or'); }?></em><?php
                        if($this->session->userdata('mem_type')=="Admin" || $mainboard_send_notification) { ?></span> <label><input type="checkbox" name="send_by" id="send_notification" value="send_notification_by" onClick="return display_notification();"/> <?php echo $this->lang->line('label_notification_send_by');?></label> <?php } ?>
                        <span class="error"><?php echo ucwords(form_error('send_article_by')); ?></span>
                    </td>
                </tr>
                <tr style="display:none" id="a">
                <td></td>
                    <td>
                        <label><input type="radio" name="send_article_by[]"     value="Email" /> <?php echo $this->lang->line('label_email');?></label>             
                        <label><input type="radio" name="send_article_by[]"    value="Letter" /> <?php echo $this->lang->line('label_real_letter');?></label>
                    </td>
                </tr>

                <tr style="display:none" id="b">
                <td></td>
                    <td>
                        <label><input type="radio"  id="c" name="send_notification_by[]" value="Email" /> <?php echo $this->lang->line('label_email');?></label>
                        <label><input type="radio"  id="d"  name="send_notification_by[]" value="SMS" /> <?php echo $this->lang->line('label_by_sms');?></label>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('label_remind_by_email');?>:</td>
                    <td>
                         <?php echo form_input($article_reminder_email_time); echo form_dropdown('article_reminder_email_time_unit',$article_reminder_email_time_unit,'','class="form_input_select"');?>
                    </td>
                </tr>
                
                </tbody>
            </table>
            
            
            <div id="Send_to" style="display:none;">
                <tr>
                    <td><?php echo $this->lang->line('label_send_to');?>:</td>
                    <td>
                        <?php 
                        if($mem_assigned_group_info){
                            foreach ($mem_assigned_group_info as $mem_assigned_group){ 
                                $group_info = $this->info_model->get_org_group($mem_assigned_group->group_id);
                                if($mem_assigned_group->assigned_mem_id){
                                        $group_member = $this->info_model->get_member_info_assigned_to_group($mem_assigned_group->assigned_mem_id);
                                }
                                
                                ?>
                                <h4>
                                <?php if($group_info) { echo $group_info[0]->group_name; } ?>:</h4>
                                <label><input type="checkbox" id="member_check<?php echo $mem_assigned_group->group_id; ?>"  onClick="return check(this.value);" name="select_member" value="<?php echo $mem_assigned_group->group_id; ?>" /><?php echo $this->lang->line('label_select_memebr');?></label>
                                Or <label><input type="checkbox" id="group_check<?php echo $mem_assigned_group->group_id; ?>" onClick="return check1(this.value)"  name="send_to_group[]" value="<?php echo $mem_assigned_group->group_id; ?>"/><?php echo $this->lang->line('label_all');?></label>
                                
                                
                                <div id="member<?php echo $mem_assigned_group->group_id; ?>" style="display:none; background-color:#ccc; padding: 10px; color:white;">
                                <?php if($group_member) { foreach ($group_member as $group_member_info) { ?>
                                <label><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_member_info->mem_id; ?>"    value="<?php echo $group_member_info->mem_id; ?>" /><?php echo $group_member_info->first_name."&nbsp;".$group_member_info->last_name; ?> </label>
                                <?php } } ?> 
                                </div>
                            <?php 
                            } 
                        } ?>
                    </td>
                </tr>
                
               
    
                 <table class="width-100">
                    <tbody>
                <tr>
                    <td>
                        <span class="error"><?php echo ucwords(form_error('send_to_group')); ?></span>
                        <span class="error"><?php echo ucwords(form_error('send_to_member')); ?></span>
                    </td>
                </tr>
            </tbody></table>
			</div>
                        <input type="hidden" name="article_id" value=<?php echo $article_id;?> />
                        <input name="submit" value="Submit" type="submit">

        <?php echo form_close(); ?>
    </div>
    <?php } else { ?>  
 <span style="color:red;"><?php echo $this->lang->line('edit_article_no_access_msg');?></span>
<?php }  ?>
</div>
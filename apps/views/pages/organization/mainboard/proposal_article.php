<h3 class="content_edit"><?php echo $this->lang->line('article_post_msg');?></h2>

<?php
    
    if ($mem_type=="Admin" || $mainboard_send_proposal){
        
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
        'value'        => $uploaded_article,         
        'size'       =>"30"        
    );
    
    $article_text= array(
        'name'      => 'article_text',
        'id'        => 'article_text',         
        'value'        => $article_text,         
        'size'       =>"30"        
    );
    
       $article_color_code= array(
        'name'      => 'article_color_code',
        'id'        => 'article_color_code',         
        'value'        => "",         
        'size'       =>"30"        
    );
   
    
    $article_category = $org_article_category;
       $article_type= array(
        'name'      => 'article_type',
        'id'        => 'article_type',         
        'value'        => $article_type,         
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
        'value'        => $publish_date_intake,         
        'size'       =>"30"        
    );
    
    
       
    $article_type_option = array(
			''  => $this->lang->line('label_select_type'),
              'Private'        => $this->lang->line('label_private'),
              'Public'      => $this->lang->line('label_public')
            );  
            
            
       $expire_date= array(
        'name'      => 'expire_date',
        'id'        => 'expire_date',         
        'value'        => $expire_date_intake,         
        'size'       =>"30"        
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
    
    
     $article_reminder_email_time= array(
        'name'      => 'article_reminder_email_time',
        'id'        => 'article_reminder_email_time',         
        'value'        => $article_reminder_email_time,         
        'size'       =>"30"        
    );
     $article_reminder_email_time_unit = array(
		      'M'        => $this->lang->line('label_minute'),
              'H'      => $this->lang->line('label_hour'),
              'D'      =>$this->lang->line('label_day'),
              'W'      => $this->lang->line('label_week')
            );     
            
            //echo "Here"; exit;
    
?>


<style type="text/css">
    <!--
    .style1 {color: #993333}
    -->
</style>
<style>
    input,textarea {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .style1 {color: #FF3333}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"publish_date",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>


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
    echo  form_open_multipart("organization/info/proposal_article_process",$attributes); ?>
    <?php echo $this->session->flashdata('message'); ?>
     <p class="error"> <?php echo $file_upload_failed; ?></p> 

     <?php 
            echo form_radio($post_article_radio1,"",$checked_create_article). $this->lang->line('label_create');
            echo form_radio($post_article_radio2,"",$checked_upload_article). $this->lang->line('label_upload');
    ?>
    
     <div id="post_article_div" <?php if($post_article=="create_article" || $post_article=="upload_article"){?>style="display:'';" <?php } elseif($post_article==""){?>style="display:none;" <?php } ?>>                    
    <br/>
    <div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
            <br>
   
                <tr>
                    <td width="10%" ><font class="inside"> <?php echo $this->lang->line('label_title');?>:</font></td>
                    <td width="45%">

                        <?=form_input($article_title);?> <span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('article_title')); ?></span> 
                    </td>

                </tr>
            </tbody>
            </table>

            <div id="post_article_create_div" <?php if($post_article=="create_article"){?>style="display:''; margin-left:38px;" <?php } elseif($post_article=="" || $post_article=="upload_article" ){?>style="display:none; margin-left:38px;" <?php } ?>>                    
                <font class="inside"> <?php echo $this->lang->line('label_text');?>:</font>
                <div style="margin-left:166px;"> <?=form_textarea($article_text);?> <span class="style1">*</span></div>
                <div style="margin-left:164px;" ><span class="markcolor" ><?php echo ucwords(form_error('article_text')); ?></span> </div>
                <br/>    
                
                <div style="float:left;"><font class="inside"> <?php echo $this->lang->line('label_article_color');?>:</font></div>
                <div style="margin-left:96px;float:left;"><input type="text" size="10" maxlength="7" name="rgb2">
                <input type="button" value="Color picker" onclick="showColorPicker(this,document.forms[1].rgb2)"></div>
                </div>
                
                <div id="post_article_upload_div" <?php if($post_article=="upload_article"){?>style="display:''; margin-left:38px; "  <?php } elseif($post_article=="" || $post_article=="create_article" ){?>style="display:none; margin-left:38px;" <?php } ?>>                    
                    <div style="float:left;"><font class="inside"> <?php echo $this->lang->line('label_upload_file');?>:</font></div>
                    <div style="float:left;margin-left:100px;"><input type="file" name="uploaded_article" id="uploaded_article" />
                    <span class="style1">*</span></div>
                    <span class="markcolor"><?php echo ucwords(form_error('uploaded_article')); ?></span> 
                </div>
                
               
                <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><font class="inside"><?php echo $this->lang->line('label_publish_date');?>:</font></td>
                    <td width="45%">
                         <?=form_input($publish_date);?><span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('publish_date')); ?></span> <br/>
                        <span class="markcolor"><?php echo ucwords($publish_date_error); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="10%" style="text-align:left; "><font class="inside"><?php echo $this->lang->line('label_importance');?>:</font></td>
                    <td width="45%">
                        <?=form_dropdown('importance',$importance_option,$importance,'id="importance"','class="form_input_select"');?>
                        <span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('importance')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside"><?php echo $this->lang->line('label_article_category');?>:</font></td>
                    <td width="45%">
                         <?php    echo form_dropdown('article_category',$article_category,'','class="form_input_select"');?>

                        <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
                    </td>
                </tr>
                
                
                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside"><?php echo $this->lang->line('label_article_type');?>:</font></td>
                    <td width="45%">
                        <?php    echo form_dropdown('article_type',$article_type_option,'','class="form_input_select"');?><span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('article_type')); ?></span> 
                    </td>
                </tr>
               
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><font class="inside"><?php echo $this->lang->line('label_expire_date');?>:</font></td>
                    <td width="45%">
                         <?=form_input($expire_date);?><span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> <br/>
                        <span class="markcolor"><?php echo ucwords($expire_date_error); ?></span> 

                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>

                <tr>

                    <td width="10%" style="text-align:left;"><font class="inside"><?php echo $this->lang->line('label_article_sending_way');?> :</font></td>
                    <td width="45%">
                    
                        <?php if($this->session->userdata('mem_type')=="Admin" || $mainboard_sending_out) { echo $this->lang->line('label_article_send_by');?> <input type="checkbox" name="send_by" value="send_article_by" id="send_article" onClick="return display_article();"/>
                        <span class="style1"><?php echo $this->lang->line('label_or'); } 
                        if($this->session->userdata('mem_type')=="Admin" || $mainboard_send_notification) { ?></span> <?php echo $this->lang->line('label_notification_send_by');?> 
                        <input type="checkbox" name="send_by" id="send_notification" value="send_notification_by" onClick="return display_notification();"/> <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400" style="display:none" id="a">
                        <input type="checkbox" name="send_article_by[]"     value="Email" /><?php echo $this->lang->line('label_email');?>                 
                        <input type="checkbox" name="send_article_by[]"    value="Letter" /><?php echo $this->lang->line('label_real_letter');?>
                    </td>
                </tr>

                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400" style="display:none" id="b">
                        <input type="checkbox"  id="c" name="send_notification_by[]" value="Email" /><?php echo $this->lang->line('label_email');?>
                        <input type="checkbox"  id="d"  name="send_notification_by[]" value="SMS" /><?php echo $this->lang->line('label_by_sms');?>
                    </td>
                </tr>
                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400">
                        <span class="markcolor"><?php echo ucwords(form_error('send_article_by')); ?></span>
                    </td>
                </tr>
                
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><font class="inside"><?php echo $this->lang->line('label_remind_by_email');?>:</font></td>
                    <td width="45%">
                         <?=form_input($article_reminder_email_time); echo form_dropdown('article_reminder_email_time_unit',$article_reminder_email_time_unit,'','class="form_input_select"');?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>
                
                </tbody>
            </table>
               
            <div id="Send_to" style="display:none; margin-left:200px;">
                <?php //$q = $this->db->query("select * from org_group where org_id='" . $this->session->userdata('member_org') . "'"); ?>
                <tr>
                    <td width="341" style="text-align:left;"><?php echo $this->lang->line('label_send_to');?>:</td>
                    <td>
                    <?php
                    if($mem_assigned_group_info){
                    foreach ($mem_assigned_group_info as $mem_assigned_group){
                        $group_info = $this->info_model->get_org_group($mem_assigned_group->group_id);
                        $group_member = $this->info_model->get_member_info_assigned_to_group($mem_assigned_group->assigned_mem_id);
                      //  $m3 = $this->db->query("select * from member where member_group='" . $info->id . "'");
                        //if ($m3->num_rows() > 0):
                            ?>
                                <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                                        <?php if($group_info) { echo $group_info[0]->group_name; } ?>:</p>
                                <p>
                                    <input type="checkbox" id="member_check<?php echo $mem_assigned_group->group_id; ?>"  onClick="return check(this.value);" name="select_member" value="<?php echo $mem_assigned_group->group_id; ?>" /><?php echo $this->lang->line('label_select_memebr');?>
                                    Or <input type="checkbox" id="group_check<?php echo $mem_assigned_group->group_id; ?>" onClick="return check1(this.value)"  name="send_to_group[]" value="<?php echo $mem_assigned_group->group_id; ?>"/><?php echo $this->lang->line('label_all');?> 
                                </p>
                                <?php
                                //$a = $info->id;
                                //$m = $this->db->query("select * from member where member_group='" . $a . "'");
                                ?>

                                <div  id="member<?php echo $mem_assigned_group->group_id; ?>" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
                                    <?php if($group_member) { foreach ($group_member as $group_member_info) { ?>
                                        <p><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_member_info->mem_id; ?>"    value="<?php echo $group_member_info->mem_id; ?>" /><?php echo $group_member_info->first_name."&nbsp;".$group_member_info->last_name; ?> </p>
                                    <?php } } ?> 
                                </div>


                            <?php //endif;
                        //endforeach; 
                        } } ?>
                    </td>
                </tr>
                </div>
                
                 <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400">
                        <span class="markcolor"><?php echo ucwords(form_error('send_to_group')); ?></span>
                        <span class="markcolor"><?php echo ucwords(form_error('send_to_member')); ?></span>
                    </td>
                </tr>
            </tbody></table>
        <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
            <tbody>
                <tr>
                    <td width="38%"><td width="33%">
                    </td>
                </tr>
                <tr>
                    <td width="38%"><td width="33%">
                        <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
                    </td>
                </tr>
            </tbody></table>  
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "",//"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 :"", //"insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Skin options
            skin : "o2k7",
            skin_variant : "silver",

            // Example content CSS (should be your site CSS)
            content_css : "css/example.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "",
                staffid : ""
            }
        });
    </script>
<?php } else { ?>  
<div class="infobox" style="width: 550px; margin-bottom: 20px; background: none repeat scroll 0% 0% rgb(238, 240, 247); -moz-border-radius: 8px 8px 8px 8px;">
 <span style="color:red;"><?php echo $this->lang->line('article_post_no_access_msg');?></span>
</div><?php }  ?>
</div>
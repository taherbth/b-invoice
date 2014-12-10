<style type="text/css">
    <!--
    .style1 {color: #993333}
    -->
</style>
<h3 class="content_edit">Member Control Panel  Post New article</h2>
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
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"date_of_creation",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script>
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
            $("#send_article").attr("disabled",true);
            $("#b").show();	
			
        }
        else
        {   $("#b").hide();
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
            $("#send_notification").attr("disabled",true);;
		
        }
        else
        {
            $("#a").hide();	
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
$query = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($query->result() as $info):
endforeach;
if ($info->mainboard_change_article == '1' || $info->mainboard_send_proposal == '1'):
    ?>

    <?php echo form_open("org_member/info/added_post"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="10%" ><font class="inside"> Title:</font></td>
                    <td width="45%">

                        <input type="text" style="width:200px;"  value="" name="title" id="" tabindex="">
                        <span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span> 
                    </td>

                </tr>
                <tr>
                    <td width="10%" ><font class="inside"> Heading:</font></td>
                    <td width="45%">
                        <textarea name="heading" rows="5" cols="40"></textarea>
                         <!-- <input type="text" style="width:200px;"  value="" name="title" id="" tabindex="">-->
                        <span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('heading')); ?></span> 
                    </td>

                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="10%" style="text-align:left;vertical-align:middle"><font class="inside">Text:</font></td>
                    <td width="45%">
                        <textarea name="text" rows="5" cols="40"></textarea>
                        <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="10%" style="text-align:left; "><font class="inside">Date of Creation:</font></td>
                    <td width="45%">
                        <input type="text" style="width:200px; height:21px"  value="" name="date_of_creation" id="date_of_creation" tabindex="">
                        <span class="style1">*</span>
                        <span class="markcolor"><?php echo ucwords(form_error('date_of_creation')); ?></span> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside">Importance:</font></td>
                    <td width="45%">
                        <select name="importance" style="width:200px;">
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <span class="markcolor"><?php echo ucwords(form_error('importance')); ?></span> 
                    </td>

                </tr>
                <tr>
                    <td style="text-align:left; padding-top:5px"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside">Expire Date:</font></td>
                    <td width="45%">
                        <input type="text" style="width:200px; height:21px"  value="" name="expire_date" id="expire_date" tabindex="">
                        <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                    </td>

                </tr>
                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside">Article Type:</font></td>
                    <td width="45%">
                        <select name="article_type" style="width:200px;">
                            <option value="">Select</option>
                            <option value="1">Public</option>
                            <option value="2">Private</option>
                        </select>
                        <span class="markcolor"><?php echo ucwords(form_error('article_type')); ?></span> 
                    </td>
                </tr>
                <?php $query = $this->db->query("select * from article_category where org_id='" . $this->session->userdata("member_org") . "'"); ?>
                <tr>
                    <td width="10%" style="text-align:left;"><font class="inside">Article Category:</font></td>
                    <td width="45%">
                        <select name="article_category" style="width:200px;">
                            <option value="">Select</option>
                            <?php foreach ($query->result() as $t): ?>
                                <option value="<?php echo $t->id; ?>"><?php echo $t->category_name; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <span class="markcolor"><?php echo ucwords(form_error('article_category')); ?></span> 
                    </td>
                </tr>

                <tr>

                    <td width="10%" style="text-align:left;"><font class="inside">Article Sending way :</font></td>
                    <td width="45%">
                        Send Article By <input type="checkbox" name="send_by" value="1" id="send_article" onClick="return display_article();"/>
                        <span class="style1">OR</span> Send Notification By  
                        <input type="checkbox" name="send_by" id="send_notification" value="2" onClick="return display_notification();"/>
                    </td>
                </tr>
                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400" style="display:none" id="a">
                        <input type="checkbox" name="a_email" id="e"    value="3" onClick="return view1();"/>Email                    
                        <input type="checkbox" name="a_letter" id="f"   value="4" onClick="return view2();"/>Real Letter 
                    </td>
                </tr>

                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400" style="display:none" id="b">
                        <input type="checkbox"  id="c" name="n_email" value="5" />Email 
                        <input type="checkbox"  id="d"  name="n_sms" value="6" />Sms 


                    </td>
                </tr>
                <tr>
                    <td width="341" style="text-align:left;"><font class="inside"> </font></td>
                    <td width="400">
                        <span class="markcolor"><?php echo ucwords(form_error('send_by')); ?></span>
                    </td>
                </tr>
                <?php $q = $this->db->query("select * from org_group where org_id='" . $this->session->userdata('member_org') . "'"); ?>
                <tr>
                    <td width="341" style="text-align:left;">Send To:<span class="style1">* </span></td>
                    <td ">
                    <?php
                    foreach ($q->result() as $info):
                        $m3 = $this->db->query("select * from member where member_group='" . $info->id . "'");
                        if ($m3->num_rows() > 0):
                            ?>
                                <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                                        <?php echo $info->group_name; ?>:</p>
                                <p>
                                    <input type="checkbox" id="member_check<?php echo $info->id; ?>"  onClick="return check(this.value);"  value="<?php echo $info->id; ?>" />Select Member
                                    Or <input type="checkbox" id="group_check<?php echo $info->id; ?>" onClick="return check1(this.value)"  name="checkbox1[]" value="<?php echo $info->id; ?>"/>All 
                                </p>
                                <?php
                                $a = $info->id;
                                $m = $this->db->query("select * from member where member_group='" . $a . "'");
                                ?>

                                <div  id="member<?php echo $info->id; ?>" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
                                    <?php foreach ($m->result() as $info1): ?>
                                        <p><input type="checkbox" name="checkbox[]" id="member_id<?php echo $info->id; ?>"    value="<?php echo $info1->id; ?>" /><?php echo $info1->name; ?> </p>
                                    <?php endforeach; ?> 
                                </div>


                            <?php endif;
                        endforeach; ?>
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
<?php else:echo "<p style='padding-left:30px'><font color='red'>Sorry You are not Permitted to post New article.</font></p>";
endif; ?>

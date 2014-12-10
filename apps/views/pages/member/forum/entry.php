<?php
$query = $this->db->query("select * from member_previlige where user_type='".$this->session->userdata("user_type")."'");
foreach ($query->result() as $info):
endforeach;
 if ($info->forum_access == '1'): 
?>

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
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<h3 class="content_edit">Member Control Panel Add New Post</h2>

<?php echo form_open("org_member/info/added_forum_post"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%" style="text-align:left; padding-left:100px; display: inline"><font class="inside"> Title:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px;height:21px" value="" name="title" tabindex="">
                    
                    <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span> 
                </td>

            </tr>
               <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:100px;vertical-align:middle"><font class="inside">Text:</font></td>
                <td width="33%">
                    <textarea name="text" rows="5" cols="40"></textarea>
                    
                    <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span> 
                </td>
            </tr>
              <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:100px;"><font class="inside">Date of Creation:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px; height:21px"  value="" name="date_of_creation" id="date_of_creation" tabindex="">
                   
                    <span class="markcolor"><?php echo ucwords(form_error('date_of_creation')); ?></span> 
                </td>
            </tr>
             <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>
           
            <tr>
                <td width="38%" style="text-align:left; padding-left:100px"><font class="inside">Expire Date:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px; height:21px"  value="" name="expire_date" id="expire_date" tabindex="">

                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
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
<?php endif;?>
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




<h3 class="content_edit">Member Control Panel  Send Letter To Internal Users</h2>
<style>
    input {
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
    .inside{}
    ul{ list-style:none}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
</script>
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('org_member/letter/header_view'); ?>';
        $("select#letter_header").change(function(){
            var name=$("#letter_header").val();
            $("#result1").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('org_member/letter/footer_view'); ?>';
        $("select#letter_footer").change(function(){
            var name=$("#letter_footer").val();
            $("#result2").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 
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
$query = $this->db->query("select * from member_previlige where user_type='".$this->session->userdata("user_type")."'");
foreach ($query->result() as $info):
endforeach;
?>
 <?php if ($info->communication_send_letters == '1'): ?>	
<?php echo form_open("org_member/letter/added_letter"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 900px;">
        <table width="900" cellspacing="1" align="center" cellpadding="10" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
               <tr>
          <?php   $query = $this->db->query("select * from letter_header where org_id='" .$this->session->userdata('member_org')."'");?>
                    <td width="10%"><font class="inside">Letter Header </font></td>
                    <td width="45%">
                       <select name="letter_header" id="letter_header" style="width:190px">
                        <option value="">Select</option>
                        <?php foreach ($query->result() as $info): ?>
                            <option value="<?php echo $info->id; ?>"><?php echo $info->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                    <span class="markcolor"><?php echo ucwords(form_error('letter_header')); ?></span>
                    </td>

                </tr>
               <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
                
              </tr>

            </tr>
                <tr style="margin-top:8px" >
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result1"></div>
                    </td>
                </tr>
              
                <tr>
                    <td width="10%"><font class="inside">Letter Title </font></td>
                    <td width="45%">
                        <textarea rows="5" name="title" cols="60" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>
                        <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span>
                    </td>

                </tr>
                  <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
                
              </tr>
                
                <tr>
                    <td width="10%"><font class="inside">Letter Text </font></td>
                    <td width="45%">
                        <textarea rows="5" name="text" cols="60" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>

                        <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span>
                    </td>

                </tr>
                  <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
                
              </tr>
                 <tr>
          <?php   $query1 = $this->db->query("select * from letter_footer where org_id='" .$this->session->userdata('member_org') . "'");?>
                    <td width="10%"><font class="inside">Letter Footer </font></td>
                    <td width="45%">
                       <select name="letter_footer" id="letter_footer" style="width:190px">
                        <option value="">Select</option>
                        <?php foreach ($query1->result() as $info1): ?>
                            <option value="<?php echo $info1->id; ?>"><?php echo $info1->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                    <span class="markcolor"><?php echo ucwords(form_error('letter_footer')); ?></span>
                    </td>

                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result2"></div>
                    </td>
                </tr>
                
             
          <?php $q = $this->db->query("select * from org_group where org_id='".$this->session->userdata('member_org')."'"); ?>
        <tr>
        <td valign="top" style="padding-top: 12px;">Send To:<span class="style1">* </span></td>
        <td>
            <?php
            foreach ($q->result() as $info):
					$m3=$this->db->query("select * from member where member_group='".$info->id."'");
					if($m3->num_rows()>0): 
					?>
                    <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                      <?php echo $info->group_name; ?>:</p>
                    <p>
                      <input type="checkbox" id="member_check<?php echo $info->id; ?>"  onClick="return check(this.value);"  value="<?php echo $info->id; ?>" />Select Member
                      Or <input type="checkbox" id="group_check<?php echo $info->id; ?>" onClick="return check1(this.value)"  name="checkbox1[]" value="<?php echo $info->id; ?>"/>All 
                    </p>
                    <?php
					$a = $info->id;
					$m=$this->db->query("select * from member where member_group='".$a."'"); 
					?>
					<div  id="member<?php echo $info->id; ?>" style="display:none; width:570px; background-color:#999999; color:white; font-weight:bold; padding-left:30px;">
						<?php foreach ($m->result() as $info1): ?>
							<p><input type="checkbox" name="checkbox[]" id="member_id<?php echo $info->id; ?>"    value="<?php echo $info1->id; ?>" /><?php echo $info1->name; ?> </p>
						<?php endforeach; ?> 
					</div>
                    
           <?php endif;endforeach; ?>
        </td>
    </tr>
            </tbody></table> 
        <?php 
        /*<div style="width:800px; float:left; margin-left:120px">

            <ul>
                <?php $q = $this->db->query("select * from member where org_id='" . $this->session->userdata('member_org') . "'"); ?>
                <?php foreach ($q->result() as $p): ?>
                    <li style="width:200px; float:left; position:relative">
                        <span style="width:130px; float:left; position:relative; left:7px"> <?php echo $p->name; ?></span>
                        <span style="width:20px; float:left; position:relative"> <input id="a" type="checkbox"  name="checkbox[]"  value="<?php echo $p->id; ?>" /></span>

                    </li>
                    <?php endforeach; ?>
            </ul>
        </div>*/?>
        </table>

        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Send" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div> </div>
    <?php echo form_close(); ?>
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
<?php endif;?>
   <!-- <script type="text/javascript">
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",//advlink,emotions,
	elements : "",
	relative_urls : false,
	width : "50%",
	height : "100px",	
	// Theme options
	theme_advanced_buttons1 : "fontselect,fontsizeselect,forecolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,link,unlink,|,image,media,|,bullist,numlist,|,outdent,indent,|,fullscreen",//strikethrough,|,formatselect,fontselect,fontsizeselect,|,image
	theme_advanced_buttons1 : "fontselect,fontsizeselect,forecolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,link,unlink,|,bullist,numlist",//strikethrough,|,formatselect,fontselect,fontsizeselect,|,image
	theme_advanced_buttons2 : "",//,bullist,numlist,|,outdent,indent,|
	theme_advanced_buttons3 : "forecolor,backcolor,|,charmap,emotions,media,advhr",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : false,
	theme_advanced_path : false,
	// Example word content CSS (should be your site CSS) this one removes paragraph margins
	content_css : "",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "lists/template_list.js",
	external_link_list_url  : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
		username : "",
		staffid : ""
	}
});
</script>


-->
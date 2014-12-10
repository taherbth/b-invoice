<style>
.infobox_main {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
  
    font-family: Arial,Verdana,Tahoma;
   
    width: 940px;
	  -moz-border-radius: 8px 8px 8px 8px;
    margin: 0 auto;
	 font-family: Arial,Verdana,Tahoma;
    font-size: 14px;
}


div.infobox, div.infobox_main, div.inner {
    font-family: Arial,Verdana,Tahoma;
    font-size: 14px;
}

div.infobox {
    background: none repeat scroll 0 0 #D8F3D3;
    border: 1px solid #DFDFC7;
   
    font-family: Arial,Verdana,Tahoma;
    padding: 10px;
    width: 437px;
}
#infobox_main_top{
 width:940px;
 height:100px;
 background:none repeat scroll 0 0 #F5F5F5;
 border-bottom:1px solid #E5E5E5;
 
}
#infobox_middle{
 width:940px;
 height:400px;
 margin-top:10px;
 
}
.form_normal {
    border: 1px solid #CCCCCC;
    font-size: 13px;
    height: 30px;
    padding: 8px;
    width: 300px;
}
.markcolor {
    color: red;
}
#message{ color: red;}
</style>

<div  class="infobox_main">
<div id="infobox_main_top">
<div style="width:400px; float:left; padding-top:25px; padding-left:20px; color:green; font-size:18px;">
Online Association Board 
</div>
<div style="width:400px; float:right; padding-top:25px; padding-left:20px; color:green; font-size:18px;">
<a href="<?php echo base_url(); ?>main/add_org"><img src="<?php echo base_url(); ?>public/images/organization_-registration.png" alt="" border="0"></a>
</div>
</div>
<div id="infobox_middle">
<div class="right" style="width:400px; float:left; position:relative">
  <p style="font-size:14px; color:#1555D6; padding-left:60px">Site admin login panel</p>
 <p style="padding-top:30px; line-height;17px; margin:0 0 1em; text-align:center">
The Online Association Board comprises a web based system for organizations, associations and  
companies who have a need for informing and organizing their members or employees 
in a easy manner. The system makes it easy to handle membership, 
sharing information within the organization and managing  their fees.
 Since many years, physical association boards have been used by the associations to 
 inform their members/nonmembers about their activities. These association boards have
  gradually lost their value while the society's have been more and more modernized. 
  The idea is to reintroduce the concept of an association board but in a digital way, 
  a web based association management tool.  .</p>
  <p>
   
<!--  To Access Organization panel click <a href="<?php echo base_url(); ?>orgadmin">Organization Login Panel</p></a>
--></div>
<div class="left" style="width:400px; float:left; position:relative">
<div class="infobox" style="width:400px; height:300px;  margin-top: 20px; margin-left:60px;   font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<div style=" margin-top:10px;  font-weight:bold; color:#FF0000;"><?php echo ucwords($this->dx_auth->get_auth_error()); ?></div>
<?php echo form_open($this->uri->uri_string()); ?>


<b>Sign In</b><br><br><br>
   
    <b>UserName:</b><br>
    <input name="username" class="form_normal" type="text">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 
    <b>Password:</b><br>
    <input name="password" class="form_normal" type="password">
    <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>           
    <br><br>
    <input  type="submit" name="login" value="Sign in">
    <?php echo form_close(); ?>
</div>
</div>

</div>
</div>


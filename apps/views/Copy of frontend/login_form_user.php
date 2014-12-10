<style>

select {
    background: none repeat scroll 0 0 #CCCCCC;
    color: #333333;
    font-family: Arial,Helvetica;
    font-size: x-small;
}
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
    float: left;
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
<div style="width:400px; padding-top:25px; padding-left:20px; color:green; font-size:18px;">
Online Association Board
</div>
<div style="width:150px; float:right; padding-top:5px; padding-left:20px; color:green; font-size:18px;">
<?php $query=$this->db->query("select * from user_info where approval_status=2 && login_status=2");?>
<?php echo form_open("organization/presentation/view_presentaion"); ?>
 <select name="org_id">
  <?php foreach($query->result() as $info):?>
      <option value="<?php echo $info->id;?>"><?php echo $info->org_name;?></option>
  <?php endforeach;?>
  </select>
<input type="submit" value="go" />
 <?php echo form_close(); ?>
</div>

<div style="width:200px; float:right; padding-top:5px; padding-left:20px; color:green; font-size:18px;">
<a href="<?php echo base_url(); ?>main/add_org"><img src="<?php echo base_url(); ?>public/images/organization_-registration.png" alt="" border="0" ></a>
<?php $query=$this->db->query("select * from user_info where approval_status=2 && login_status=2");?>

</div>

</div>
<div id="infobox_middle">
<div class="right" style="width:400px; float:left; position:relative">
  <p style="font-size:14px; color:#1555D6; padding-left:60px">Organization admin login panel</p>
 <p style="padding-top:50px; line-height;17px; margin:0 0 1em; text-align:center">It is a long established fact that a reader will be distracted by the readable content of
 a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal 
 distribution of letters, as opposed to using 'Content here, content here', 
 making it look like readable English. Many desktop publishing packages and web 
 .</p>
</div>
<div class="left" style="width:400px; float:left; position:relative">
<div class="infobox" style="width:400px; height:300px;  margin-top: 20px; margin-left:60px;   font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
 <?php echo form_open('orgadmin/process_login'); ?>
 <?php echo $this->session->flashdata('message'); ?>

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


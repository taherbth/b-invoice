<h3 class="content_edit">Contact with Organization Admin</h2>
<?php $mainTab="";
 $query=$this->db->query("select * from org_external_previlige where org_id ='".$this->session->userdata("orgid")."'");
 foreach($query->result() as $p_info):
  $external_contact =$p_info->external_contact;
 endforeach;
if($external_contact=='1'):
?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart("organization/presentation/composed_message"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <input type="hidden" value="<?php echo $this->session->userdata('orgid');?>"  name="id"/>
     Name<br>
    <input name="name" class="form_normal" value="" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    <br>
    Email<br>
    <input name="email" class="form_normal" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
    <br>
      Subject<br>
    <input name="subject" class="form_normal" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('subject')); ?></span> 
    <br>
     Message<br>
      <textarea rows="7" cols="50" name="message" style="border: 1px solid #CCCCCC;"></textarea>
   
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('message')); ?></span> 
    <br>
    Attachment<br>
    <input name="photo" class="" type="file" style="border: 1px solid #CCCCCC;">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('photo1')); ?></span> 
    <br><br>    
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
  <?php else:echo "<p style='padding-top:80px; padding-left:20px'><font style='color:red'> Sorry you are not permitted to Contact With organization Admin</font></p>";endif;?>

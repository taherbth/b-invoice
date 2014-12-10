<h3 class="content_edit">Member Control Panel Contact with Organization Admin</h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("org_member/letter/composed_message"); ?>
    <?php echo $this->session->flashdata('message'); ?>
     Name<br>
    <input name="name" class="form_normal" value="<?php echo $this->session->userdata("name");?>" type="text">
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
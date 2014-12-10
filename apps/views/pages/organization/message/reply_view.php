<h3 class="content_edit">OrgAdmin control panel Reply Message
</h2>
<style>

.c {
    background-color: #E0EAF1;
    color: #3E6D8E;
    font-size: 12px;
    height: 30px;
    text-decoration: none;
    white-space: nowrap;
}
c:hover{background-color:#DB9148}
h3 a:hover{text-decoration:none; }
</style>
<?php foreach($message_info as $m_info):endforeach;?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/replied_message"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <input type="hidden" name="id" value="<?php echo $m_info->id;?>" />
    <input type="hidden" name="sender_id" value="<?php echo $m_info->sender_id;?>" />

     Send To<br>
    <input name="name" class="form_normal" readonly="readonly" value="<?php echo $m_info->name;?>" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    <br>
    
      Subject<br>
    <input name="subject"  value="<?php echo $m_info->subject;?>" class="form_normal" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('subject')); ?></span> 
    <br>
     Message<br>
      <textarea rows="7" cols="50" name="message" style="border: 1px solid #CCCCCC;"><?php echo $m_info->message;?></textarea>
   
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
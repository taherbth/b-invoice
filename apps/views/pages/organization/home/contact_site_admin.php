<h3 class="content_edit"><?php echo $this->lang->line('contact_site_admin_msg');?> </h2>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>

<?php 
    $sender_name= array(
        'name'      => 'sender_name',
        'id'        => 'sender_name',
        'value'     => $sender_name,          
        'size'       =>"30",
        
    );
    
      $sender_email= array(
        'name'      => 'sender_email',
        'id'        => 'sender_email',
        'value'     => $sender_email,          
        'size'       =>"30",
        
    );
    
    $contact_subject= array(
        'name'      => 'contact_subject',
        'id'        => 'contact_subject',
        'value'     => $contact_subject,          
        'size'       =>"30"        
    );
    
    $contact_message= array(
        'name'      => 'contact_message',
        'id'        => 'editor',
        'class'		=> 'redactor',
        'value'        => $contact_message,         
        'size'       =>"30"        
    );


?>
<div class="form">

<?php echo form_open_multipart(base_url()."organization/info/contact_site_admin_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 <p class="error"> <?php echo $file_upload_failed; ?></p> 
<label><?php echo $this->lang->line('label_name');?>:
	<?php echo form_input($sender_name);?>
</label>
<span class="markcolor"><?php echo ucwords(form_error('sender_name')); ?></span>

<label><?php echo $this->lang->line('label_email');?>:
	<?php echo form_input($sender_email);?>
</label>
<span class="markcolor"><?php echo ucwords(form_error('sender_email')); ?></span>

<label><?php echo $this->lang->line('label_subject');?>:
	<?php echo form_input($contact_subject);?>
</label>
<span class="markcolor"><?php echo ucwords(form_error('contact_subject')); ?></span>

<label><?php echo $this->lang->line('label_message');?>:
<?php echo form_textarea($contact_message);?>
</label>
<span class="markcolor"><?php echo ucwords(form_error('contact_message')); ?></span>

<label>
<?php echo $this->lang->line('label_attachment');?>:
	<input type="file" name="contact_files" id="input_clone"/>
</label>


<input name="submit" value="<?php echo $this->lang->line('send_btn');?>" class="submit" type="submit">

<?php echo form_close(); ?>
</div>

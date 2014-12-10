<h3 class="content_edit"><?php echo $this->lang->line('communication_member_email_msg');?> </h3>
<?php echo $this->session->flashdata('message'); ?>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
			
        }
    }
								
</script>


	<?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(".$num_of_inbox_message.")";}?>
	<?php $sent_message = ""; if($num_of_sent_message){$sent_message = "(".$num_of_sent_message.")";}?>

<a class="button mail" href="<?php echo base_url()."organization/info/compose_new_email"; ?>"><?php echo $this->lang->line('label_compose_new'); ?></a>
	<h5 class="breadcrumb">
		<span><?php echo anchor(base_url()."organization/info/communication_member", $this->lang->line('label_inbox').$inbox_message); ?></span>
		<span class="<?php if($activeSubTab == 'sent') { echo 'active'; } ?>"><?php echo anchor(base_url()."organization/info/communication_member_email_sent", $this->lang->line('label_sent').$sent_message); ?></span>
	</h5>
    
<label style="padding-left: 13px;"><input type="checkbox" onClick="checkAll(this)"/><span></span> <?php echo $this->lang->line('label_all'); ?></label>

<?php echo form_open("admin/info/delete_admin_emial"); ?>
    <div class="messages">
    <?php foreach ($query1 as $message_info):?>
    <div class="entry units-row">
		<div class="mark unit-20"><input type="checkbox"  name="admin_email[]" value="<?php echo $message_info->communication_id; ?>">
		<span class="attachments">
			<?php if($message_info->attached_files !=""):?>
			<img src="<?php echo base_url();?>public/img/icons/icon-attachment-dark.png" width="15" height="15" />
			<?php endif;?>
			</span>	
	</div>
     <a href="<?php echo base_url(); ?>organization/info/read_member_comm_member_sent_email_message/<?php echo $message_info->communication_id;?>">
	<div class="summary unit-60"> 
     <div class="sender"><?php //echo $message_info->sender_name;?></div>
    
     <?php if($message_info->message_read==0):?>
       <span class="messages-subject"<?php echo  substr("$message_info->email_subject", 0, 50);?></span>
       - <span class="messages-message"><?php echo  substr("$message_info->email_message", 0, 30);?></span>

     <?php else:?>
       <span class="messages-subject"><?php echo  substr("$message_info->email_subject", 0, 50);?></span>
       - <span class="messages-message"><?php echo  substr("$message_info->email_message", 0, 30);?></span>
       
      </span>
		</div>
     
     <div class="date unit-20">
	 <?php 
	 $c=strtotime($message_info->add_date);
	 echo  date('M d',$c);?>
	 <?php endif;?>
	</div><!-- end .date -->
	</a>
    </div><!-- end .entry -->
    
  <?php endforeach; ?>
  <p><?php  echo $this->pagination->create_links(); ?></p>

  <?php form_close(); ?>
  </div>
   <!--input type="submit" class="c" value="Delete" /--!>

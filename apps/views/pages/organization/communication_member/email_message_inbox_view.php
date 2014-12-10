<?php foreach ($message as $message_info):endforeach; ?>
<h3 class="content_edit"><?php echo $this->lang->line('communication_member_email_msg');?></h3>                           
<?php 
    $inbox_message= ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}
    $sent_message= ""; if($num_of_sent_message){$sent_message = "(<span style='color:red;'>".$num_of_sent_message."</span>)";}
    $draft_message= ""; if($num_of_draft_message){$draft_message = "(<span style='color:red;'>".$num_of_draft_message."</span>)";}

?>
<?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(".$num_of_inbox_message.")";}?>
<?php $sent_message = ""; if($num_of_sent_message){$sent_message = "(".$num_of_sent_message.")";}?>
<?php $draft_message = ""; if($num_of_draft_message){$draft_message = "(".$num_of_draft_message.")";}?>
<?php $upcoming_message = ""; if($num_of_upcoming_message){$upcoming_message = "(".$num_of_upcoming_message.")";}?>

<a class="button mail" href="<?php echo base_url()."organization/info/compose_new_email"; ?>"><?php echo $this->lang->line('label_compose_new'); ?></a>

<?php 
echo $this->session->flashdata('message'); 

$reply_message_data = array();

if(count($message)){
    foreach($message as $rows){
        $communication_id = $rows->communication_id;
        $send_from = $rows->sender_name;
        $send_to_individual_email = $rows->send_to_individual_email;
        $send_to_member = $rows->send_to_member;
        $email_subject = $rows->email_subject;
        $email_message = $rows->email_message;
        $attached_files = $rows->attached_files;
        $attached_files = explode("|",$attached_files);
        $uploaded_dir = $rows->uploaded_dir;
      
        if($rows->reply_of){
                $reply_message_data = $this->info_model->get_reply_email_message_detail($communication_id,$rows->reply_of);                
        }       
        else{
                $reply_message_data = $this->info_model->get_reply_email_message_detail("",$communication_id);                
        }
        
    }

}

?>
<a class="button reply dark" href="<?php echo base_url(); ?>organization/info/reply_email_message/<?php echo $communication_id;?>"><?php echo $this->lang->line('label_click_here');?> <?php echo $this->lang->line('label_reply_msg');?></a>


<h5 class="breadcrumb">
		<span class="<?php if($activeTab == 'email') { echo 'active'; } ?>"><?php echo anchor(base_url()."organization/info/communication_member", $this->lang->line('label_inbox').$inbox_message); ?></span>
		<span ><?php echo anchor(base_url()."organization/info/communication_member_email_sent", $this->lang->line('label_sent').$sent_message); ?></span>
        <span><?php echo anchor(base_url()."organization/info/communication_member_email_draft", $this->lang->line('label_drafts').$draft_message); ?></span>
        <span><?php echo anchor(base_url()."organization/info/communication_member_email_upcoming", $this->lang->line('label_up_coming').$upcoming_message); ?></span>

    </h5>
	
<div>   
    
<table class="width-100">
<tbody>

<tr>
	<td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b><?php echo $this->lang->line('label_receive_from');?> :</b></td>
	<td>
		<?php echo $send_from;  ?> 
	</td>
</tr>

<tr>
<td valign="top" style="padding-top: 12px; font-weight:bold"><?php echo $this->lang->line('label_subject');?>:</td>
<td>
<?php echo ucfirst($email_subject); ?> 
</td>
</tr>
<tr>
<td valign="top" style="padding-top: 12px; font-weight:bold"><?php echo $this->lang->line('label_message');?>:</td>
<td>
<?php echo ucfirst($email_message); ?> 
</td>
</tr>

<tr>
<td>Attachments</td>
<td>
<?php if ($attached_files != ""){ ?>
<b><?php foreach($attached_files as $key => $file_name){ if($file_name!="") { ?></b>


<a href="<?php echo base_url() . 'uploads/member_communication/attached_files/'.$uploaded_dir.'/'. $file_name; ?>" class="button download">
<?php echo $file_name;?> <!--<?php echo $this->lang->line('label_download')."";?>-->
</a>
<br/>
<?php } } } ?>



</td>
</tr>

<tr>
<td valign="top" style="padding-top: 12px; font-weight:bold"></td>
<td>
<?php 
if(count($reply_message_data)){
foreach($reply_message_data as $reply_rows){
$reply_email_message = $reply_rows->email_message;
$reply_attached_files = $reply_rows->attached_files;
$reply_send_from = $reply_rows->sender_name;
$reply_attached_files = explode("|",$reply_attached_files);                        
$reply_uploaded_dir = $reply_rows->uploaded_dir;
$reply_date = $reply_rows->add_date;

if($reply_email_message){
echo "<br/><br/>On ".$reply_date. " < ".$reply_send_from." > ". "  <br/>----------------------------<br/>";                                 
echo ucfirst($reply_email_message); 
echo "<br/>----------------------------<br/>";     
} 

if ($reply_attached_files != ""){ ?>
<?php foreach($reply_attached_files as $key => $file_name){ if($file_name!="") { ?>


<a href="<?php echo base_url() . 'uploads/member_communication/attached_files/'.$reply_uploaded_dir.'/'. $file_name; ?>" class="button download"> 
<?php echo $file_name;?><!-- <?php echo $this->lang->line('label_download')."<br/>";?> -->
</a>

<?php } } } 
}
}
?> 
</td>
</tr>

</tbody>
</table>

                        
   

  </div>
  
  
  
  
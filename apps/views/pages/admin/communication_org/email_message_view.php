<?php foreach ($message as $message_info):endforeach; ?>
<h3 class="content_edit"><?php echo $this->lang->line('label_mail_box');?></h2>                           
<?php 

    $inbox_message= ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}
    $sent_message= ""; if($num_of_sent_message){$sent_message = "(<span style='color:red;'>".$num_of_sent_message."</span>)";}
    echo anchor(base_url()."admin/info/communication_org", $this->lang->line('label_inbox').$inbox_message);
    echo "&nbsp;|&nbsp;".anchor(base_url()."admin/info/communication_org_email_sent", $this->lang->line('label_sent').$sent_message);
    
echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<style>
    .SearchListing1 a{color:black}
    .SearchListing1 a:hover{color:#C74444}
	.c{
        background-color: #E0EAF1;
       
        color: #3E6D8E;
        font-size: 12px;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        
        color: #3E6D8E;
        font-size: 12px;
        height:20px; 
        text-decoration: none;
        white-space: nowrap;
    }
</style>
<?php 

$reply_message_data = array();

if(count($message)){
    foreach($message as $rows){
        $communication_id = $rows->communication_id;
        $send_from = $rows->send_from;
        $receiver_id = $rows->receiver_id;
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
<div style="width:920px; height:300px; overflow:scroll;">
    <div class="SearchListing1"  style=" padding-left:15px; height:30px; width:900px">
    
    
                            <table cellpadding="10" class="form" style="width:800px;">
                                <tbody>
                                   
                                    <tr>
                                        <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b><?php echo $this->lang->line('label_receive_from');?> :</b></td>
                                        <td>
<?php echo ucfirst($send_from); ?> 
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
                                        <td valign="top" style="padding-top: 12px;"></td>
                                        <td>



                                        </td>

                                    </tr> 
                                    <tr>
                                        <td valign="top" style="padding-top: 12px;"></td>
                                        <td>
                                         <?php if ($attached_files != ""){ ?>
                                           <b><?php foreach($attached_files as $key => $file_name){ if($file_name!="") { ?></b>
                                                
                                                <?php echo $file_name;?>
                                                <a href="<?php echo base_url() . 'uploads/admin_communication/attached_files/'.$uploaded_dir.'/'. $file_name; ?>" style="color:#1BAFE0;"> 
                                                    <?php echo $this->lang->line('label_download')."<br/>";?>
                                                </a>

                                       <?php } } } ?>
                                        
                                          
                                          <?php echo $this->lang->line('label_click_here');?> <a   href="<?php echo base_url(); ?>admin/info/reply_email_message/<?php echo $communication_id;?>"><font color="green"><?php echo $this->lang->line('label_reply_msg');?></font> </a>
                                        
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
                                                        $reply_send_from = $reply_rows->send_from;
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

                                                        <?php echo $file_name;?>
                                                        <a href="<?php echo base_url() . 'uploads/admin_communication/attached_files/'.$reply_uploaded_dir.'/'. $file_name; ?>" style="color:#1BAFE0;"> 
                                                        <?php echo $this->lang->line('label_download')."<br/>";?>
                                                        </a>

                                                        <?php } } } 
                                                    }
                                                }
                                        ?> 
                                        </td>
                                    </tr>
                                    
                                     <tr>
                                        <td></td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody></table>

                        
   
    </div>

  </div>
  
  
  
  
<?php foreach ($message as $message_info):endforeach; ?>
<h3 class="content_edit"><?php echo $this->lang->line('label_sms_box');?></h3>                           
<?php 
    $inbox_sms= ""; if($num_of_inbox_sms){$inbox_sms = "(<span style='color:red;'>".$num_of_inbox_sms."</span>)";}
    $sent_sms= ""; if($num_of_sent_sms){$sent_sms = "(<span style='color:red;'>".$num_of_sent_sms."</span>)";}
    echo anchor(base_url()."admin/info/communication_org_sms", $this->lang->line('label_inbox').$inbox_sms);
    echo "&nbsp;|&nbsp;".anchor(base_url()."admin/info/communication_org_sms_sent", $this->lang->line('label_sent').$sent_sms);
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

//$reply_message_data = array();

if(count($message)){
    foreach($message as $rows){
        $sms_id = $rows->sms_id;
        $send_from = $rows->send_from;
        $receiver_id = $rows->receiver_id;
        $sms_content = $rows->sms_content;
              
       /* if($rows->reply_of){
                $reply_message_data = $this->info_model->get_reply_email_message_detail($communication_id,$rows->reply_of);                
        }       
        else{
                $reply_message_data = $this->info_model->get_reply_email_message_detail("",$communication_id);                
        }*/
        
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
                                        <td valign="top" style="padding-top: 12px; font-weight:bold"><?php echo $this->lang->line('label_sms');?>:</td>
                                        <td>
                                    <?php echo ucfirst($sms_content); ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding-top: 12px;"></td>
                                        <td>



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
  
  
  
  
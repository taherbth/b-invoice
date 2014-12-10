<?php foreach ($message as $message_info):endforeach; ?>
<h3 class="content_edit"><?php echo $this->lang->line('contact_site_admin_inbox_msg');?></h2>                           
<?php 

    $inbox_message= ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}
   // echo anchor(base_url()."admin/info/communication_org", $this->lang->line('label_inbox').$inbox_message);
   
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


if(count($message)){
    foreach($message as $rows){
        $communication_id = $rows->contact_id;
        $sender_name = $rows->sender_name;
        $sender_email = $rows->sender_email;
        $contact_subject = $rows->contact_subject;
        $contact_message = $rows->contact_message;
        $attached_files = $rows->attached_files;
        $uploaded_dir = $rows->uploaded_dir;
        
    }

}

?>
<div style="width:920px; height:300px; overflow:scroll;">
    <div class="SearchListing1"  style=" padding-left:15px; height:30px; width:900px">
    
    
                            <table cellpadding="10" class="form" style="width:800px;">
                                <tbody>
                                   
                                    <tr>
                                        <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b><?php echo $this->lang->line('label_receive_from');?> : </b></td>
                                        <td>
<?php echo ucfirst($sender_name); ?> 
                                        </td>
                                    </tr>
                                      
                                      <tr>
                                        <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b><?php echo $this->lang->line('label_email');?> :</b></td>
                                        <td>
<?php echo ucfirst($sender_email); ?> 
                                        </td>
                                    </tr>
                                                     
                                    <tr>
                                        <td valign="top" style="padding-top: 12px; font-weight:bold"><?php echo $this->lang->line('label_subject');?>:</td>
                                        <td>
                                     <?php echo ucfirst($contact_subject); ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding-top: 12px; font-weight:bold"><?php echo $this->lang->line('label_message');?>:</td>
                                        <td>
                                    <?php echo ucfirst($contact_message); ?> 
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
                                            
                                                <?php echo $attached_files;?>
                                                <a href="<?php echo base_url() . 'uploads/contact_site_admin/attached_files/'.$uploaded_dir.'/'. $attached_files; ?>" style="color:#1BAFE0;"> 
                                                    <?php echo $this->lang->line('label_download')."<br/>";?>
                                                </a>

                                       <?php  } ?>
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
  
  
  
  
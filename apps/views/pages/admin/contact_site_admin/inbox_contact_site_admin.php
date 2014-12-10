
<h3 class="content_edit"><?php echo $this->lang->line('contact_site_admin_inbox_msg');?> </h3>
 

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

<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>
     <fieldset>
     <?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}?>
      <legend align="left">Site Admin Inbox</legend>
     
      
<br/>
<?php //echo $this->lang->line('label_all');?><!--input type="checkbox" onClick="checkAll(this)"--!>
   <?php echo form_open("admin/info/delete_admin_email"); ?>
    <div style="width:920px; max-height:300px; overflow:scroll;">
    <?php foreach ($all_messages as $message_info):?>
    <div class="SearchListing1"  style=" background-color:#F5F5F5; border:1px solid #E5E5E5; height:30px; width:900px">
     <span style="width:50px; float:left; position:relative">
    
     <!--input type="checkbox"  name="admin_email[]" value="<?php //echo $message_info->contact_id; ?>"/--!>
     </span>
     <a href="<?php echo base_url(); ?>admin/info/read_contact_site_admin_message/<?php echo $message_info->contact_id;?>">
     <span style="width:600px; float:left;position:relative; padding-left:20px"> 
     <?php if($message_info->message_read==0):?>
            <span style="width:100px; float:left; position:relative; text-align:left;font-weight:bold"> <?php echo $message_info->sender_name;?></span>

       <font style="font-size:16px; font-weight:bold "> <?php echo  substr("$message_info->contact_subject", 0, 50);?></font>
       - &nbsp;&nbsp;&nbsp;<font style="font-size:12px;font-weight:bold"><?php echo  substr(strip_tags($message_info->contact_message), 0,50);?></font>
      </span>
     <?php else:?>
        <span style="width:100px; float:left; position:relative; text-align:left;"> <?php echo $message_info->sender_name;?></span>
        <font style="font-size:15px; "> <?php echo  substr("$message_info->contact_subject", 0, 50);?></font>
       - &nbsp;&nbsp;&nbsp;<font style="font-size:12px;"><?php echo  substr(strip_tags($message_info->contact_message), 0,50);?></font>
       
      </span>
     <?php endif;?>
     <?php if($message_info->attached_files !=""):?>
       <img src="<?php echo base_url();?>public/images/attachment.png" width="15" height="15" />
     <?php endif;?>
   
     <span style="width:90px; float:left;position:relative; <?php if($message_info->message_read==0){echo 'font-weight:bold';} ?>"><?php $c=strtotime($message_info->add_date); echo  date('M d',$c);?> </span>
    </a>
    </div>
  <?php endforeach; ?>
  <p style="width:900px; clear:both; text-align:center"><?php  echo $this->pagination->create_links(); ?></p>

  <?php form_close(); ?>
  </div>
   <!--input type="submit" class="c" value="Delete" /--!>
</fieldset>
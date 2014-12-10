<h3 class="content_edit"><?php echo $this->lang->line('communication_member_sms_msg');?> </h3>
 

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

     <?php $inbox_sms= ""; if($num_of_inbox_sms){$inbox_sms = "(<span style='color:red;'>".$num_of_inbox_sms."</span>)";}?>
     <?php $sent_sms= ""; if($num_of_sent_sms){$sent_sms = "(<span style='color:red;'>".$num_of_sent_sms."</span>)";}?>
     
     
     
     <a class="button mail" href="<?php echo base_url()."organization/info/compose_new_sms"; ?>"><?php echo $this->lang->line('label_compose_new'); ?></a>
	<h5 class="breadcrumb">
		<span class="<?php if($activeTab == 'sms') { echo 'active'; } ?>"><?php echo anchor(base_url()."organization/info/communication_member_sms", $this->lang->line('label_inbox')); ?></span>
		<span><?php echo anchor(base_url()."organization/info/communication_member_sms_sent", $this->lang->line('label_sent').$sent_sms); ?></span>
	</h5>
     

<?php echo $this->lang->line('label_all');?>:<input type="checkbox" onClick="checkAll(this)">
   <?php echo form_open("organization/info/delete_member_sms"); ?>
   <div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('member_sms')); ?></span> <br>   <br></div>

    <div class="messages">
    
    <?php
        if($query1){
            foreach ($query1 as $sms_info):?>
    <div class="SearchListing1"  style=" background-color:#F5F5F5; border:1px solid #E5E5E5; height:30px; width:900px">
     <span style="width:50px; float:left; position:relative">
    
     <input type="checkbox"  name="member_sms[]" value="<?php echo $sms_info->sms_id; ?>"/>
     </span>
     <span style="width:100px; float:left; position:relative; text-align:left"> <?php echo $sms_info->sender_name;?></span>
     <a href="<?php echo base_url(); ?>organization/info/read_member_comm_member_sms_message/<?php echo $sms_info->sms_id;?>">
     <span style="width:600px; float:left;position:relative; padding-left:20px"> 
     <?php if($sms_info->sms_read==0):?>
       <b><font style="font-size:12px;"><?php echo  substr("$sms_info->sms_content", 0, 30);?></font></b>
      </span>
     <?php else:?>
       <font style="font-size:12px;"><?php echo  substr("$sms_info->sms_content", 0, 30);?></font>
       
      </span>
     <?php endif;?>
     
     <span style="width:90px; float:left;position:relative">
     
	 <?php 
	 $c=strtotime($sms_info->add_date);
	 echo  date('M d',$c);?>
     </span>
    </a>
    </div>
  <?php endforeach; } ?>
  <p style="width:900px; clear:both; text-align:center"><?php  echo $this->pagination->create_links(); ?></p>

  <?php form_close(); ?>
  </div>
   <input type="submit" class="c" value="Delete" />

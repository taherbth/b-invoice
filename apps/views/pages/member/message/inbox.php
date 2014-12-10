<h3 class="content_edit">Mailbox</h2>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
			
        }
    }
								
</script>

<?php echo $this->session->flashdata('message'); ?>
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
  All:<input type="checkbox" onClick="checkAll(this)">
   <?php echo form_open("org_member/letter/delete_message"); ?>
    <div style="width:920px; max-height:300px; overflow:scroll;">
    <?php foreach ($query1 as $message_info):?>
    <div class="SearchListing1"  style=" background-color:#F5F5F5; border:1px solid #E5E5E5; height:30px; width:900px">
     <span style="width:30px; float:left; position:relative">
    
     <input type="checkbox"  name="checkbox[]" value="<?php echo $message_info->id; ?>"/>
     </span>
     <span style="width:130px; float:left; position:relative; text-align:left; "> <?php echo $message_info->name;?></span>
     <a href="<?php echo base_url(); ?>org_member/letter/view_message/<?php echo $message_info->id;?>">
     <span style="width:600px; float:left;position:relative; padding-left:20px"> 
     <?php if($message_info->message_status=='2'):?>
       <font style="font-size:16px; font-weight:bold "> <?php echo  substr("$message_info->subject", 0, 50);?></font>
       - &nbsp;&nbsp;&nbsp;<font style="font-size:12px;"><?php echo  substr("$message_info->message", 0, 30);?></font>
      </span>
     <?php else:?>
       <font style="font-size:15px; "> <?php echo  substr("$message_info->subject", 0, 50);?></font>
       - &nbsp;&nbsp;&nbsp;<font style="font-size:12px;"><?php echo  substr("$message_info->message", 0, 30);?></font>
       
      </span>
     <?php endif;?>
     <?php if($message_info->photo1 !=""):?>
       <img src="<?php echo base_url();?>public/images/attachment.png" width="15" height="15" />
     <?php endif;?>
   
     <span style="width:90px; float:left;position:relative">
     
	 <?php 
	 $c=strtotime($message_info->message_date);
	 echo  date('M d',$c);?>
     </span>
    </a>
    </div>
  <?php endforeach;?>
  <p style="width:900px; clear:both; text-align:center"><?php  echo $this->pagination->create_links(); ?></p>

  <?php form_close(); ?>
  </div>
   <input type="submit" class="c" value="Delete" />


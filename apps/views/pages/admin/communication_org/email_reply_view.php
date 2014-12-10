<h3 class="content_edit"><?php echo $this->lang->line('communication_org_email_msg');?> </h2>


<?php 

if(count($email_message_info)){
    foreach($email_message_info as $rows){
        $sender_id = $rows->sender_id;
        $communication_id = $rows->communication_id;
        $reply_of = $rows->reply_of;
        $email_send_to = $rows->send_from;
        $email_subject = $rows->email_subject;
        $email_message = $rows->email_message;           
        $email_subject_sub_str = substr($email_subject,0,2);
        if($email_subject_sub_str!="Re"){
                $email_subject = "Re:".$email_subject; 
        }
    }
}
    $email_sender= array(
        'name'      => 'email_sender',
        'id'        => 'email_sender',
        'value'     => "Adminscentral",          
        'size'       =>"30",
        'readonly' => "readonly"
    );
    
    $email_send_to = array(
        'name'      => 'email_send_to',
        'id'        => 'email_send_to',
        'value'     => $email_send_to,          
        'size'       =>"30",
        'readonly' => "readonly"
    );
    
    $email_subject= array(
        'name'      => 'email_subject',
        'id'        => 'email_subject',
        'value'     => $email_subject,          
        'size'       =>"30"        
    );
    
    $email_message= array(
        'name'      => 'email_message',
        'id'        => 'email_message',         
        'value'        => $email_message,         
        'size'       =>"30"        
    );
    
     $email_addresses= array(
        'name'      => 'email_addresses',
        'id'        => 'email_addresses',         
        'style' => 'width: 550px; height: 100px;'
    );

?>



<style>
.markcolor{ color:red}
legend { vertical-align:middle
    -moz-border-radius: 10px 10px 10px 10px;
    background-color: #499DC4;
    color: White;
    font: bold 12px Arial;
    padding: 5px 10px;
    text-align: center;
}
.success{ color:green;}
</style>
<p></p>
<fieldset>
      <legend align="left"> <?php echo anchor(base_url()."admin/info/compose_new_email", $this->lang->line('label_compose_new'),"style='color:#FFFFFF;'");?></legend>
     
<?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}?>

<div class="infobox" style="width: 888px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo anchor(base_url()."admin/info/communication_org", $this->lang->line('label_inbox').$inbox_message); ?>
<?php echo form_open_multipart(base_url()."admin/info/reply_email_message_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 <p class="error"> <?php echo $file_upload_failed; ?></p> 
<?php echo $this->lang->line('label_sender');?>:<br>
<?=form_input($email_sender);?>
<br><br>
<?php echo $this->lang->line('label_send_to');?>:<br>
<div id="checkbox" style="float:left;">
    <?=form_input($email_send_to);?>
</div><br><br>
 <div id="checkbox" style="float:left;">
        <input type="checkbox" id="individual" name="individual" value="individual" onClick="return check_send_to_individual('individual');"  />Individual

</div>

<div id="checkbox" style="float:left;">
        <input type="checkbox" id="organization" name="organization" value="organization" onClick="return check_send_to_org('organization');" />Organization
</div>
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('individual')); ?></span> 
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('email_addresses')); ?></span> <br>   <br></div>
<br/><br/>
                    
<div id="org_div" style="display:none;">
    <?php echo $this->lang->line('label_email_to_org');?>:<br><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
    <?php 
        if(count($active_org_list)){
            foreach($active_org_list as $rows){?>
            
            <?php echo $rows->org_name." | ";}}?> </span>
                
    <br/><br/>
    <input type="checkbox" id="select_org"  name="select_org" onClick="return check_org_selection('select_org');"  value="select_org" />
    <?php echo $this->lang->line('label_select_org');?>
    Or 
    
    <input type="checkbox" id="all_org" onClick="return all_org_selection('all_org')"  name="all_org" value="all_org"/>
    <input type="hidden" id="select_each_org" name="select_each_org" value=""/>
    <?php echo $this->lang->line('label_all');?>
</div>
  <div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('select_org')); ?></span> 
  <div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('select_each_org')); ?></span> 


<div id="org_list_div" style="display:none;">
    <?php 
        if(count($active_org_list)){
            foreach($active_org_list as $rows){
           
     ?>
      <input type="checkbox" id="org_list"  name="org_list[]" value="<?php echo $rows->org_id; ?>" />
<?php  
        echo $rows->org_name;
        }
    }
?>
</div>


<div id="email_addresses"  style="display:none;" >
    <?php echo $this->lang->line('label_email_addresses');?>.<br>
    <?=form_input($email_addresses);?>
</div><br/>

                    
<?php echo $this->lang->line('label_subject');?>:<br>
<?=form_input($email_subject);?>
<span class="markcolor"><?php echo ucwords(form_error('email_subject')); ?></span> <br>   <br>

<?php echo $this->lang->line('label_message');?>:<br>
<?=form_textarea($email_message);?>
<span class="markcolor"><?php echo ucwords(form_error('email_message')); ?></span> <br>   <br>

<br><br>


<?php echo $this->lang->line('label_attachment');?>:<br>
	<div class="input_holder">
		<input type="file" name="email_files[]" id="input_clone" multiple="multiple" />
	</div>
<span class="add_field">+</span>
<span class="remove_field">-</span>
<br/>
<?=form_hidden('receiver_id', $sender_id);?>
<?=form_hidden('reply_of', $reply_of);?>
<?=form_hidden('communication_id', $communication_id);?>
<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('send_btn');?>" class="submit" type="image">

<?php echo form_close(); ?>
</div>
</fieldset>

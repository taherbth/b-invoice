<h3 class="content_edit"><?php echo $this->lang->line('communication_member_email_msg');?> </h2>


<?php 
     $checked_send_now = "";
     $checked_send_later = "";
     if($send_option=='send_now') {$checked_send_now="checked";}
     if($send_option=='send_later') {$checked_send_later="checked";}
     if(count($email_message_info)){
        foreach($email_message_info as $rows){
            $sender_id = $rows->sender_id;
            $communication_id = $rows->communication_id;
            $reply_of = $rows->reply_of;
            $email_send_to = $rows->sender_name;
            $email_subject = $rows->email_subject;
            $email_message = $rows->email_message;           
            $email_subject_sub_str = substr($email_subject,0,2);
            if($email_subject_sub_str!="Re"){
                $email_subject = "Re:".$email_subject; 
            }
        }
     }

$email_send_to = array(
        'name'      => 'sender_name',
        'id'        => 'sender_name',
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
    
     $individual_email_addresses= array(
        'name'      => 'individual_email_addresses',
        'id'        => 'individual_email_addresses',  
        'value' =>$individual_email_addresses,
        'style' => 'width: 550px; height: 100px;'
    );
       
    $send_option_radio1= array(
        'name'      => 'send_option',
        'id'        => 'send_option',         
        'value'        => "send_now",         
        'onclick' => "sending_option(this.value);" ,
       
    );
    $send_option_radio2= array(
        'name'      => 'send_option',
        'id'        => 'send_option',         
        'value'        => "send_later",         
       'onclick' => "sending_option(this.value);"      
    );
    
    $sending_date= array(
        'name'      => 'sending_date',
        'id'        => 'sending_date',         
        'value'        => "",         
        'size'       =>"30"        
    );
    
    $sending_hour_option = array(
			''  => $this->lang->line('label_hours'),
              '1'      => '01',
              '2'      => '02',
              '3'      => '03',
              '4'      => '04',
              '5'      => '05',
              '6'      => '06',
              '7'      => '07',
              '8'      => '08',
              '9'      => '09',
              '10'      => '10',
              '11'      => '11',
              '12'      => '12',
              '13'      => '13',
              '14'      => '14',
              '15'      => '15',
              '16'      => '16',
              '17'      => '17',
              '18'      => '18',
              '19'      => '19',
              '20'      => '20',
              '21'      => '21',
              '22'      => '22',
              '23'      => '23',
              '00'      => '00'
    );  
    
    $sending_minutes = array(
        'name'      => 'sending_minutes',
        'id'        => 'sending_minutes',
        'value'     => $this->lang->line('label_minutes'),          
        'size'       =>"30",
        'onclick' => "clear_minutes(this.value);"    
    );
?>

<script>

    function clear_minutes(){
        document.getElementById('sending_minutes').value = '';
    }

    function show_external_recipants(val){
        var myvar = document.getElementById(val).checked;
        if(myvar)
        {            
            document.getElementById('add_external_recipants').style.display="";
        }

        else
        {
            document.getElementById('add_external_recipants').style.display="none";
        }      
        
}

function show_admins(val){
        var myvar = document.getElementById(val).checked;
        if(myvar)
        {            
            document.getElementById('add_admins').style.display="";
            $("#admins_all").attr("disabled",true);
        }

        else
        {
            document.getElementById('add_admins').style.display="none";
            $("#admins_all").attr("disabled",false);
        }      
        
}

function all_admins(val){
        var myvar = document.getElementById(val).checked;
        if(myvar)
        {            
            document.getElementById('add_admins').style.display="none";
            $("#select_admins").attr("disabled",true);
        }

        else
        {
            document.getElementById('add_admins').style.display="none";
            $("#select_admins").attr("disabled",false);
        }      
        
}

function check($id)
    {
        var myvar = document.getElementById("member_check"+$id).checked;
        if(myvar)
        {
            $("#member"+$id).show();
            $("#group_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_id"+$id+":checked").each(function(){
                this.checked = false;
            });
         

            $("#group_check"+$id).removeAttr("disabled");
            $("#member"+$id).hide();							   
        }
    }
    function check1($id)
    {
        var myvar = document.getElementById("group_check"+$id).checked;
        if(myvar)
        {
            $("#member_check"+$id).attr("disabled",true);
        }
        else
        {
            $("#member_check"+$id).removeAttr("disabled");
        }
}

function sending_option(val){
    
    if(val=="send_now")
    {
        document.getElementById('send_later_div').style.display="none";
    }
    if(val=="send_later")
    {
        document.getElementById('send_later_div').style.display="";
    }
}
</script>

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

<style type="text/css">
    <!--
    .style1 {color: #993333}
    -->
</style>
<style>
    input,textarea {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .style1 {color: #FF3333}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"sending_date",
            dateFormat:"%Y-%m-%d"
        });
              
    }
</script>
<p></p>
<fieldset>
      <legend align="left"> <?php echo $this->lang->line('label_compose_new');?></legend>
     
<?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(<span style='color:red;'>".$num_of_inbox_message."</span>)";}
$sent_message= ""; if($num_of_sent_message){$sent_message = "(<span style='color:red;'>".$num_of_sent_message."</span>)";}
?>

<div class="infobox" style="width: 888px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo anchor(base_url()."organization/info/communication_member", $this->lang->line('label_inbox').$inbox_message); 
    echo "&nbsp;|&nbsp;".anchor(base_url()."organization/info/communication_member_email_sent", $this->lang->line('label_sent').$sent_message);

?>
<?php echo form_open_multipart(base_url()."organization/info/reply_email_message_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 <p class="error"> <?php echo $file_upload_failed; ?></p> 
<?php echo $this->lang->line('label_sender');?>:<br>
<?=form_input($email_send_to);?>
<br><br>

                    
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
<br/><br/>

<?php echo $this->lang->line('label_send_to');?>:<br><br/>
<div id="checkbox" style="float:left;">
    <?=form_input($email_send_to);?>
</div><br><br>
 <div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_individual');?>:</div><br/><br/>
 <div id="email_addresses" >
    <?php echo $this->lang->line('label_email_addresses');?>.<br>
    <?=form_input($individual_email_addresses);?>
</div>
<br/>

<div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_external_list');?>:</div><br/><br/>
<div id="checkbox" style="float:left;">
        <input type="checkbox" id="external_recipants_check"  onClick="return show_external_recipants(this.value);" name="select_external_recipants"  value="external_recipants_check"/><?php echo $this->lang->line('label_add_recipants');?>
</div>
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('send_to_external_list')); ?></span> 

<div  id="add_external_recipants" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
    <?php if($org_mem_external_contact) { foreach ($org_mem_external_contact as $org_mem_external_contact_info) { ?>
    <p><input type="checkbox" name="send_to_external_list[]" id="send_to_external_list_id<?php echo $org_mem_external_contact_info->ext_contact_id; ?>"    value="<?php echo $org_mem_external_contact_info->ext_contact_id; ?>" /><?php echo $org_mem_external_contact_info->ext_contact_name; ?> </p>
    <?php } } ?> 
</div>
<br/><br/>
<div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_group');?>:</div><br/><br/>
<div id="group_div">
    <?php
                    if($mem_assigned_group_info){
                    foreach ($mem_assigned_group_info as $mem_assigned_group){
                        $group_info = $this->info_model->get_org_group($mem_assigned_group->group_id);
                        $group_member = $this->info_model->get_member_info_assigned_to_group_not_admin($mem_assigned_group->assigned_mem_id);
                    
                            ?>
                                <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                                        <?php if($group_info && $group_member) { echo $group_info[0]->group_name;  ?>:</p>
                                <p>
                                    <input type="checkbox" id="member_check<?php echo $mem_assigned_group->group_id; ?>"  onClick="return check(this.value);" name="select_member" value="<?php echo $mem_assigned_group->group_id; ?>" /><?php echo $this->lang->line('label_select_memebr');?>
                                    Or <input type="checkbox" id="group_check<?php echo $mem_assigned_group->group_id; ?>" onClick="return check1(this.value)"  name="send_to_group[]" value="<?php echo $mem_assigned_group->group_id; ?>"/><?php echo $this->lang->line('label_all');?> 
                                </p>
                                <?php
                                    }
                                
                                ?>
                                <div  id="member<?php echo $mem_assigned_group->group_id; ?>" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
                                    <?php if($group_member) { foreach ($group_member as $group_member_info) { ?>
                                        <p><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_member_info->mem_id; ?>"    value="<?php echo $group_member_info->mem_id; ?>" /><?php echo $group_member_info->first_name."&nbsp;".$group_member_info->last_name; ?> </p>
                                    <?php } } ?> 
                                </div>


                            <?php //endif;
                        //endforeach; 
                        } } ?>
</div>
<span class="markcolor"><?php echo ucwords(form_error('send_to_group')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('send_to_member')); ?></span> 

<div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_admins');?>:</div><br/><br/>
<div id="admins_list_div">
    <?php
        if($all_active_admin){ ?>                    
        <input type="checkbox" id="select_admins"  onClick="return show_admins(this.value);" name="select_admins"  value="select_admins"/><?php echo $this->lang->line('label_select_admin');?>
        Or <input type="checkbox"  id="admins_all" onClick="return all_admins(this.value);" name="admins_all" value="admins_all"/><?php echo $this->lang->line('label_all');?> 
        </p>
    <?php  } ?>
</div>
<div  id="add_admins" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
    <?php if($all_active_admin) { foreach ($all_active_admin as $all_active_admin_info) { ?>
    <p><input type="checkbox" name="send_to_admins[]" id="send_to_admins_id<?php echo $all_active_admin_info->mem_id; ?>"    value="<?php echo $all_active_admin_info->mem_id; ?>" /><?php echo $all_active_admin_info->first_name." ". $all_active_admin_info->last_name; ?> </p>
    <?php } } ?> 
</div>

<div><div style="clear:both;">    
<span class="markcolor"><?php echo ucwords(form_error('individual_email_addresses')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('select_admins')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('send_to_admins')); ?></span> 
<br/>
  <?php 
            echo form_radio($send_option_radio1,"",$checked_send_now). $this->lang->line('label_send_now');
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$this->lang->line('label_or')."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo form_radio($send_option_radio2,"",$checked_send_later). $this->lang->line('label_send_later');            
    ?>
</div><br/>

<div  id="send_later_div"  <?php if($send_option =="send_later") { ?>style="display:block; position:relative;" <?php } else { ?> style="display:none; position:relative;" <?php }  ?> >
        <?php 
                echo $this->lang->line('label_select_date')."&nbsp;:&nbsp;";
                echo form_input($sending_date);
                echo $this->lang->line('label_time')."&nbsp;:&nbsp;".form_dropdown('sending_hour_option',$sending_hour_option,'','class="form_input_select"')."&nbsp;:&nbsp;".form_input($sending_minutes);
                
        ?>
</div>
<span class="markcolor"><?php echo ucwords(form_error('sending_date')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('sending_hour_option')); ?></span> 
<?=form_hidden('receiver_id', $sender_id);?>
<?=form_hidden('reply_of', $reply_of);?>
<?=form_hidden('communication_id', $communication_id);?>
<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('send_btn');?>" class="submit" type="image">

<?php echo form_close(); ?>
</div>
</fieldset>

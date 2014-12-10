<h3 class="content_edit"><?php echo $this->lang->line('communication_member_email_msg');?> </h3>
<?php     
     $checked_send_now = "";
     $checked_send_later = "";
     if($send_option=='send_now') {$checked_send_now="checked";}
     if($send_option=='send_later') {$checked_send_later="checked";}
 
   if(count($query1)){
       foreach($query1 as $rows){
           $sender_name = $rows->first_name. " ".$rows->last_name;
        }
    }
    $email_sender= array(
        'name'      => 'sender_name',
        'id'        => 'sender_name',
        'value'     => $sender_name,          
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
        'size'       =>"30",
        'class'		=> 'redactor'      
    );
    
     $individual_email_addresses= array(
        'name'      => 'individual_email_addresses',
        'id'        => 'individual_email_addresses',  
        'value' =>$individual_email_addresses,
        'style' => 'width: 100%;'
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
        'size'       =>"30",
        'class'		=> 'datepicker'    
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
       ''  => $this->lang->line('label_minutes'),
              '15'      => '15',
              '30'      => '30',
              '45'      => '45',
              '59'      => '59'            
        );
?>

<script>

    function clear_minutes(){
        document.getElementById('sending_minutes').value = '';
    }

    function show_every_body(val){ 
        var myvar = document.getElementById(val).checked;
        if(myvar)
        {            
            document.getElementById('add_every_body').style.display="";
        }
        else
        {
            document.getElementById('add_every_body').style.display="none";
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
    function check_everybody_all(source)
    { 
        checkboxes = document.getElementsByName('send_every_body[]');
        for(var index in checkboxes)
            checkboxes[index].checked = source.checked;
    }

function check_group_members_all(source)
 {
        checkboxes = document.getElementsByName('send_to_member[]');
        for(var index in checkboxes)
            checkboxes[index].checked = source.checked;
}

function check_admins_all(source)
 {
        checkboxes = document.getElementsByName('send_to_admins[]');
        for(var index in checkboxes)
            checkboxes[index].checked = source.checked;
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

   
	<?php $inbox_message = ""; if($num_of_inbox_message){$inbox_message = "(".$num_of_inbox_message.")";}?>
	<?php $sent_message = ""; if($num_of_sent_message){$sent_message = "(".$num_of_sent_message.")";}?>
	
	<div class="actions">
		<a class="icon-mail" href="<?php echo base_url()."organization/info/compose_new_email"; ?>"><?php echo $this->lang->line('label_compose_new'); ?></a>
	</div>
	<h5 class="breadcrumb">
		<span class="<?php if($activeTab == 'email') { echo 'active'; } ?>"><?php echo anchor(base_url()."organization/info/communication_member", $this->lang->line('label_inbox').$inbox_message); ?></span>
		<span><?php echo anchor(base_url()."organization/info/communication_member_email_sent", $this->lang->line('label_sent').$sent_message); ?></span>
	</h5>
	
	<legend> <?php echo $this->lang->line('label_compose_new');?></legend>
<div class="units-row">
<div class="unit-75">
<?php echo form_open_multipart(base_url()."organization/info/compose_new_email_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 <p class="error"> <?php echo $file_upload_failed; ?></p> 
 <table class="width-100">
 <tr>
	 <td><?php echo $this->lang->line('label_sender');?>:</td>
	 <td><?php echo form_input($email_sender);?></td>
 </tr>
 
 <tr>
	 <td><?php echo $this->lang->line('label_subject');?></td>
	 <td><?php echo form_input($email_subject);?>
	 	<?php if(ucwords(form_error('email_subject'))){ ?><span class="markcolor"><?php echo ucwords(form_error('email_subject')); ?></span><?php } ?>
	 </td>
 </tr>
 
 <tr>
 	<td><?php echo $this->lang->line('label_message');?></td>
 	<td><?php echo form_textarea($email_message);?>
 		<?php if(ucwords(form_error('email_message'))){ ?><span class="markcolor"><?php echo ucwords(form_error('email_message')); ?></span><?php } ?>
 	</td>
 </tr>
 
  <tr>
 	<td><?php echo $this->lang->line('label_attachment');?></td>
 	<td><div class="input_holder"><input type="file" name="email_files[]" id="input_clone" multiple="multiple" /></div>
 	<span class="add_field btn btn">+</span>
 	<span class="remove_field btn">-</span>
 	</td>
 </tr>
 
 <tr>
 	<td><?php echo $this->lang->line('label_send_to');?></td>
 	<td>
		<!-- <?php echo $this->lang->line('label_individual');?> -->
		<div id="email_addresses" >
		<?php echo $this->lang->line('label_email_addresses');?>.<br>
		<?php echo form_input($individual_email_addresses);?>
		</div>
 	</td>
 </tr>
 
 <tr>
 	<td>
	 	<div id="checkbox"><?php echo $this->lang->line('label_everybody');?>:</div>
 	</td>
 	<td>
	 	<div id="checkbox">
        <label><input type="checkbox" id="send_every_body_check"  onClick="return show_every_body(this.value);" name="select_every_body"  value="send_every_body_check"/> <?php echo $this->lang->line('label_select_memebr');?></label>
        <!--input type="checkbox" id="external_recipants_check"  onClick="return show_external_recipants(this.value);" name="select_external_recipants"  value="external_recipants_check"/ --> <?php //echo $this->lang->line('label_add_recipants');?></label>
</div>
<span class="markcolor"><?php echo ucwords(form_error('send_to_external_list')); ?></span>
 	</td>
 </tr>
 
 
 <tr id="add_every_body" class="dynamic-list" style="display:none; position:relative; background-color:#ddd;">
 	<td>     
        OR<label><input type="checkbox" name="select_everybody"  id="select_everybody" onClick="check_everybody_all(this,'send_every_body')" /><?php echo $this->lang->line('label_all');?></label>
    </td>
 	<td><div>

    <?php if($all_active_members) { foreach ($all_active_members as $all_active_members_info) { ?>
    <p><label><input type="checkbox" name="send_every_body[]" id="send_every_body_id<?php echo $all_active_members_info->mem_id; ?>"    value="<?php echo $all_active_members_info->mem_id;  ?>" /><span><?php echo $all_active_members_info->first_name."&nbsp;".$all_active_members_info->last_name; ?></span></label></p>
    <?php } } ?> 
    <?php 
        if($all_non_ac_members) { 
            foreach ($all_non_ac_members as $all_non_ac_members_info) { 
                if($all_non_ac_members_info->email) { ?>
                    <p><label><input type="checkbox" name="send_every_body[]" id="send_every_body_id<?php echo $all_non_ac_members_info->mem_id; ?>"    value="<?php echo $all_non_ac_members_info->mem_id;  ?>" /><span><?php echo $all_non_ac_members_info->attention; ?>&nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)</span></label></p>
    <?php }
                else{ ?> 
                    <p><label><span><?php echo $all_non_ac_members_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)&nbsp;&nbsp;<?php echo $this->lang->line('label_email_not_available');?></span></label></p>
    <?php }
            }
        } 
    ?> 
	</td>
 </tr>
 
 <tr>
 	<td>Custom emails</td>
 	<td>
		<?php echo form_input($individual_email_addresses);?>
		<small><?php echo $this->lang->line('label_email_addresses');?></small>
 	</td>
 </tr>
 
 <tr>
	 <td>Group members</td>
	 
	 <td>
	 	<select multiple>
	 	<?php
	 	if($mem_assigned_group_info){
                    foreach ($mem_assigned_group_info as $mem_assigned_group){
                        $group_info = $this->info_model->get_org_group($mem_assigned_group->group_id);
                        $group_member = $this->info_model->get_member_info_assigned_to_group_not_admin($mem_assigned_group->assigned_mem_id);
                        
                        
                        echo '<optgroup label="'.$group_info[0]->group_name.'">';
                        
                        if($group_member) { 
                        	foreach ($group_member as $group_member_info) {
                        		echo '<option>'.$group_member_info->first_name.' '.$group_member_info->last_name.'</option>';
                        	}
                        }
                        
                        
                        echo '</optgroup>';
					}
		}
		
		?>
		</select>
	 </td>
 </tr>
 
 <tr>
 	<td>Admins</td>
 	<td>
 		<select multiple>
	 	<?php if($all_active_admin) { foreach ($all_active_admin as $all_active_admin_info) {
	 				if($all_active_admin_info->mem_id != $this->session->userdata('mem_id')){
	 					echo '<option>'.$all_active_admin_info->first_name.'</option>';
	 				}
	 			}
		 	}
	 	?>
 		</select>
 	</td>
 </tr>
 
 
<tr>
        <td><div id="checkbox" ><?php if($mem_assigned_group_info){echo $this->lang->line('label_group').":";}?></div></td>
        <td id="group_div">
            <?php
                if($mem_assigned_group_info){
                    foreach ($mem_assigned_group_info as $mem_assigned_group){
                        $group_info = $this->info_model->get_org_group($mem_assigned_group->group_id);
                        $group_member = $this->info_model->get_member_info_assigned_to_group_not_admin($mem_assigned_group->assigned_mem_id);
                        ?>
                        <h4>
                        <?php if($group_info && $group_member) { 
                            echo $group_info[0]->group_name;  ?>:</h4>
                            <p>
                            <label><input type="checkbox" id="member_check<?php echo $mem_assigned_group->group_id; ?>"  onClick="return check(this.value);" name="select_member" value="<?php echo $mem_assigned_group->group_id; ?>" /> <?php echo $this->lang->line('label_select_memebr');?></label>
                            </p>
                            <?php
                                    } ?>                             
        </td>
</tr>
<tr id="member<?php echo $mem_assigned_group->group_id; ?>" class="dynamic-list" style="display:none;background-color:#ddd;">
    <td>  
        OR<label><input type="checkbox" name="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" value="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" id="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" onClick="return check_group_members_all(this, 'send_to_member')" /><?php echo $this->lang->line('label_all');?></label>
    </td>
    <td>
        <?php if($group_member) { foreach ($group_member as $group_member_info) { ?>
        <p><label><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_member_info->mem_id; ?>"    value="<?php echo $group_member_info->mem_id; ?>" /> <span class="dynamic-value"><?php echo $group_member_info->first_name."&nbsp;".$group_member_info->last_name; ?> </span></label></p>
        <?php } }        
                $group_non_ac_member = $this->info_model->get_non_ac_member_info_assigned_to_group($mem_assigned_group->assigned_mem_id);
                if($group_non_ac_member){
                    foreach ($group_non_ac_member as $group_non_ac_member_info) { 
                        if($group_non_ac_member_info->email) { ?>
                            <p><label><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_non_ac_member_info->mem_id; ?>"    value="<?php echo $group_non_ac_member_info->mem_id; ?>" /> <span class="dynamic-value"><?php echo $group_non_ac_member_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)</span></label></p>
             <?php } else{ ?>
                            <p><label><span class="dynamic-value"><?php echo $group_non_ac_member_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)&nbsp;&nbsp;<?php echo $this->lang->line('label_email_not_available');?></span></label></p>
             <?php    }
                   }
                }    
        ?> 
        
    </td>
</tr>
<?php //endif;
//endforeach; 
} } ?>
<span class="markcolor"><?php echo ucwords(form_error('send_to_group')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('send_to_member')); ?></span> 
</td>
</tr>
 
 <tr>
 	<td><div id="checkbox"><?php echo $this->lang->line('label_admins');?></div></td>
 	<td id="admins_list_div">
	<?php
	if($all_active_admin){ ?>                    
	<label><input type="checkbox" id="select_admins"  onClick="return show_admins(this.value);" name="select_admins"  value="select_admins"/><?php echo $this->lang->line('label_select_admin');?></label>
	</p>
	<?php  } ?>
	</td>
</tr>
<tr id="add_admins" class="dynamic-list" style="display:none; background: #ddd;">
<td>  
        OR<label><input type="checkbox" name="select_admins_all" value="select_admins_all" id="select_admins_all" onClick="return check_admins_all(this, 'send_to_admins')" /><?php echo $this->lang->line('label_all');?></label>
</td>
<td>
	<div>
	<?php if($all_active_admin) { foreach ($all_active_admin as $all_active_admin_info) {     
                    if($all_active_admin_info->mem_id != $this->session->userdata('mem_id')){
    ?>
	<p><label><input type="checkbox" name="send_to_admins[]" id="send_to_admins_id<?php echo $all_active_admin_info->mem_id; ?>"    value="<?php echo $all_active_admin_info->mem_id; ?>" /> <span class="dynamic-value"><?php echo $all_active_admin_info->first_name." ". $all_active_admin_info->last_name; ?></span></label></p>
	<?php } } } ?>
	<span class="markcolor"><?php echo ucwords(form_error('individual_email_addresses')); ?></span> 
	<span class="markcolor"><?php echo ucwords(form_error('select_admins')); ?></span> 
	<span class="markcolor"><?php echo ucwords(form_error('send_to_admins')); ?></span>       
 	</td>
 </tr>
 
 <tr>
 <td>
 	Dispatch:
 </td>
 <td>
 	<label><?php echo form_radio($send_option_radio1,"",$checked_send_now).' '. $this->lang->line('label_send_now'); ?></label>
	<?php echo $this->lang->line('label_or'); ?>
	<label><?php echo form_radio($send_option_radio2,"",$checked_send_later).' '. $this->lang->line('label_send_later'); ?></label>
	</td>
 </tr>
 
 </table>    

<div  id="send_later_div"  <?php if($send_option =="send_later") { ?>style="display:block;" <?php } else { ?> style="display:none;" <?php }  ?> >
        <table class="width-100">
        <tr>
            <td><?php echo $this->lang->line('label_select_date'); ?>:</td>
            <td><?php echo form_input($sending_date); ?></td>
            <td><?php echo $this->lang->line('label_time');?>:</td>
            <td><?php echo form_dropdown('sending_hour_option',$sending_hour_option,'','class="form_input_select"');?></td>
            <td><?php echo form_dropdown('sending_minutes',$sending_minutes,'','class="form_input_select"');?></td>
        </tr>
        </table>
</div>
<span class="markcolor"><?php echo ucwords(form_error('sending_date')); ?></span> 
<span class="markcolor"><?php echo ucwords(form_error('sending_hour_option')); ?></span> 

<input type="submit" name="submit" value="<?php echo $this->lang->line('send_btn');?>">

<?php echo form_close(); ?>

</div><!-- end .unit-75 -->
<div class="unit-25 sidebar">
<div class="dynamic-output">
	<h3>Summary - recipants</h3>
</div>
</div><!-- end .unit-25 -->
</div><!-- end .units-row -->

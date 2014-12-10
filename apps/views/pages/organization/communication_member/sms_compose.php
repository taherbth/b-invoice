<h3 class="content_edit"><?php echo $this->lang->line('communication_member_sms_msg');?> </h2>


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
    $sms_sender= array(
        'name'      => 'sender_name',
        'id'        => 'sender_name',
        'value'     => $sender_name,          
        'size'       =>"30",
        'readonly' => "readonly"
    );          
    $sms_content= array(
        'name'      => 'sms_content',
        'id'        => 'sms_content',         
        'value'        => $sms_content,         
        'size'       =>"30"        
    );
    
     $individual_contact_nos= array(
        'name'      => 'individual_contact_nos',
        'id'        => 'individual_contact_nos',  
        'value' =>$individual_contact_nos,
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
</script>

<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"sending_date",
            dateFormat:"%Y-%m-%d"
        });
              
    }
</script>
	<?php $inbox_sms = ""; if($num_of_inbox_sms){$inbox_sms = "(".$num_of_inbox_sms.")";}?>
	<?php $sent_sms = ""; if($num_of_sent_sms){$sent_sms = "(".$num_of_sent_sms.")";}?>
    <?php $draft_sms= ""; if($num_of_draft_sms){$draft_sms = "(<span style='color:red;'>".$num_of_draft_sms."</span>)";}?>    
    <?php $upcoming_sms= ""; if($num_of_upcoming_sms){$upcoming_sms = "(<span style='color:red;'>".$num_of_upcoming_sms."</span>)";}?>    

<a class="button mail" href="<?php echo base_url()."organization/info/compose_new_sms"; ?>"><?php echo $this->lang->line('label_compose_new'); ?></a>
	<h5 class="breadcrumb">
		<span class="<?php if($activeTab == 'sms') { echo 'active'; } ?>"><?php echo anchor(base_url()."organization/info/communication_member_sms", $this->lang->line('label_inbox').$inbox_sms); ?></span>
		<span ><?php echo anchor(base_url()."organization/info/communication_member_sms_sent", $this->lang->line('label_sent').$sent_sms); ?></span>
		<span><?php echo anchor(base_url()."organization/info/communication_member_sms_draft", $this->lang->line('label_drafts').$draft_sms); ?></span>
		<span><?php echo anchor(base_url()."organization/info/communication_member_sms_upcoming", $this->lang->line('label_up_coming').$upcoming_sms); ?></span>
	
    </h5>

<legend><?php echo $this->lang->line('label_compose_new');?></legend>

<div class="units-row">
<div class="unit-75">

<table class="width-100">
<?php echo form_open_multipart(base_url()."organization/info/compose_new_sms_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 

<?php echo $this->lang->line('label_sender');?>:<br>
<?=form_input($sms_sender);?>
<br><br>

<?php echo $this->lang->line('label_message');?>:<br>
<?=form_textarea($sms_content);?>
<span class="markcolor"><?php echo ucwords(form_error('sms_content')); ?></span> <br>   <br>

<br><br>

<?php echo $this->lang->line('label_send_to');?>:<br><br/>

 <div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_individual');?>:</div><br/><br/>
 <div id="email_addresses" >
    <?php echo $this->lang->line('label_contact_nos');?>.<br>
    <?=form_input($individual_contact_nos);?>
</div>
<br/>

<div id="checkbox" style="float:left;"><?php echo $this->lang->line('label_everybody');?>:</div><br/><br/>
<div id="checkbox" style="float:left;">
        <label><input type="checkbox" id="send_every_body_check"  onClick="return show_every_body(this.value);" name="select_every_body"  value="send_every_body_check"/> <?php echo $this->lang->line('label_select_memebr');?></label>
</div>
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('send_to_external_list')); ?></span> 

<div  id="add_every_body" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
    OR<label><input type="checkbox" name="select_everybody"  id="select_everybody" onClick="check_everybody_all(this,'send_every_body')" /><?php echo $this->lang->line('label_all');?></label>
    <?php if($all_active_members) { foreach ($all_active_members as $all_active_members_info) { ?>
    <p><label><input type="checkbox" name="send_every_body[]" id="send_every_body_id<?php echo $all_active_members_info->mem_id; ?>"    value="<?php echo $all_active_members_info->mem_id;  ?>" /><span><?php echo $all_active_members_info->first_name."&nbsp;".$all_active_members_info->last_name; ?></span></label></p>
    <?php } } ?> 
    <?php 
        if($all_non_ac_members) { 
            foreach ($all_non_ac_members as $all_non_ac_members_info) { 
                if($all_non_ac_members_info->mobile_phone) { ?>
                    <p><label><input type="checkbox" name="send_every_body[]" id="send_every_body_id<?php echo $all_non_ac_members_info->mem_id; ?>"    value="<?php echo $all_non_ac_members_info->mem_id;  ?>" /><span><?php echo $all_non_ac_members_info->attention; ?>&nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)</span></label></p>
    <?php }
                else{ ?> 
                    <p><label><span><?php echo $all_non_ac_members_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)&nbsp;&nbsp;<?php echo $this->lang->line('label_mobile_not_available');?></span></label></p>
    <?php }
            }
        } 
    ?> 
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
                                </p>
                                <?php
                                    }
                                
                                ?>
                                <div  id="member<?php echo $mem_assigned_group->group_id; ?>" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
                                    OR<label><input type="checkbox" name="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" value="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" id="select_group_members_all<?php echo $mem_assigned_group->group_id; ?>" onClick="return check_group_members_all(this, 'send_to_member')" /><?php echo $this->lang->line('label_all');?></label>

                                    <?php if($group_member) { foreach ($group_member as $group_member_info) { ?>
                                        <p><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_member_info->mem_id; ?>"    value="<?php echo $group_member_info->mem_id; ?>" /><?php echo $group_member_info->first_name."&nbsp;".$group_member_info->last_name; ?> </p>
                                    <?php } } 
                                    $group_non_ac_member = $this->info_model->get_non_ac_member_info_assigned_to_group($mem_assigned_group->assigned_mem_id);
                                    if($group_non_ac_member){
                                        foreach ($group_non_ac_member as $group_non_ac_member_info) { 
                                            if($group_non_ac_member_info->mobile_phone) { ?>
                                            <p><label><input type="checkbox" name="send_to_member[]" id="member_id<?php echo $group_non_ac_member_info->mem_id; ?>"    value="<?php echo $group_non_ac_member_info->mem_id; ?>" /> <span class="dynamic-value"><?php echo $group_non_ac_member_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)</span></label></p>
                                            <?php } else{ ?>
                                            <p><label><span class="dynamic-value"><?php echo $group_non_ac_member_info->attention; ?> &nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)&nbsp;&nbsp;<?php echo $this->lang->line('label_mobile_not_available');?></span></label></p>
                                            <?php    }
                                        }
                                    }    
                                    ?> 
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
        </p>
    <?php  } ?>
</div>
<div  id="add_admins" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
            OR<label><input type="checkbox" name="select_admins_all" value="select_admins_all" id="select_admins_all" onClick="return check_admins_all(this, 'send_to_admins')" /><?php echo $this->lang->line('label_all');?></label>

    <?php if($all_active_admin) { foreach ($all_active_admin as $all_active_admin_info) { 
                    if($all_active_admin_info->mem_id != $this->session->userdata('mem_id')){
    ?>
    <p><input type="checkbox" name="send_to_admins[]" id="send_to_admins_id<?php echo $all_active_admin_info->mem_id; ?>"    value="<?php echo $all_active_admin_info->mem_id; ?>" /><?php echo $all_active_admin_info->first_name." ". $all_active_admin_info->last_name; ?> </p>
    <?php } } } ?> 
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

<input name="submit" value="<?php echo $this->lang->line('next_step');?> >>" type="submit">

<?php echo form_close(); ?>
</table>


</div><!-- end .unit-75 -->
<div class="unit-25 sidebar">
<div class="dynamic-output">
	<h3>Summary - recipants</h3>
</div>
</div><!-- end .unit-25 -->
</div><!-- end .units-row -->

<h3 class="content_edit"><?php echo $this->lang->line('communication_org_letter_msg');?> </h3>


<?php 
    $letter_sender= array(
        'name'      => 'letter_sender',
        'id'        => 'letter_sender',
        'value'     => "Adminscentral",          
        'size'       =>"30",
        'readonly' => "readonly"
    );
    
    $letter_title= array(
        'name'      => 'letter_title',
        'id'        => 'letter_title',
        'value'     => $letter_title,          
        'size'       =>"30"        
    );
    
    $letter_text= array(
        'name'      => 'letter_text',
        'id'        => 'letter_text',         
        'value'        => $letter_text,         
        'size'       =>"30"        
    );
    
     $letter_individual_address= array(
        'name'      => 'letter_individual_address',
        'id'        => 'letter_individual_address',         
        'style' => 'width: 550px; height: 100px;'
    );
    $checked_create_letter = "";
    $checked_upload_letter ="";
     if($letter_write=='create_letter') {$checked_create_letter="checked";}
     if($letter_write=='upload_letter') {$checked_upload_letter="checked";}
        
     $letter_write_radio1= array(
        'name'      => 'letter_write',
        'id'        => 'letter_write',         
        'value'        => "create_letter",         
        'onclick' => "letter_create(this.value);" ,
       
    );
    $letter_write_radio2= array(
        'name'      => 'letter_write',
        'id'        => 'letter_write',         
        'value'        => "upload_letter",         
       'onclick' => "letter_create(this.value);"      
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
      <legend align="left"> <?php echo anchor(base_url()."admin/info/write_new_letter", $this->lang->line('label_write_new'),"style='color:#FFFFFF;'");?></legend>

<div class="infobox" style="width: 888px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

<?php echo form_open_multipart(base_url()."admin/info/write_new_letter_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 <?php 
            echo form_radio($letter_write_radio1,"",$checked_create_letter). $this->lang->line('label_create');
            echo form_radio($letter_write_radio2,"",$checked_upload_letter). $this->lang->line('label_upload');
    ?>
 
 <div id="sender_send_to" <?php if($letter_write=="upload_letter" || $letter_write=="create_letter"){?>style="display:'';" <?php } elseif($letter_write==""){?>style="display:none;" <?php } ?>>                    
<br/>
    <?php echo $this->lang->line('label_sender');?>:<br>
    <?=form_input($letter_sender);?>
    <br><br>
    <?php echo $this->lang->line('label_send_to');?>:<br>

     <div id="checkbox" style="float:left;">
            <input type="checkbox" id="individual" name="individual" value="individual" onClick="return check_send_to_individual('individual');"  />Individual
    </div>
    <div id="checkbox" style="float:left;">
            <input type="checkbox" id="organization" name="organization" value="organization" onClick="return check_send_to_org('organization');" />Organization
    </div>
</div>

<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('individual')); ?></span> 
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('letter_individual_address')); ?></span> <br>   <br></div>
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
    <?php echo $this->lang->line('label_addresses');?>.<br>
    <?=form_input($letter_individual_address);?>
</div><br/>

<div id="letter_title" <?php if($letter_write=="create_letter" || $letter_write=="upload_letter"){?>style="display:'';" <?php } elseif($letter_write==""){?>style="display:none;" <?php } ?>>                    
<?php echo $this->lang->line('label_title');?>:<br>
    <?=form_input($letter_title);?>    
    <span class="markcolor"><?php echo ucwords(form_error('letter_title')); ?></span> <br>   <br>
</div>

<div id="create_letter" <?php if($letter_write=="create_letter"){?>style="display:'';" <?php } elseif($letter_write=="upload_letter" || $letter_write==""){?>style="display:none;" <?php } ?>>                    
    
    <?php echo $this->lang->line('label_text');?>:<br>
    <?=form_textarea($letter_text);?>
    <span class="markcolor"><?php echo ucwords(form_error('letter_text')); ?></span> <br>   <br>
    <br><br>
    <?php echo $this->lang->line('label_footer');?>:<br>
    <?php 
            echo form_radio('letter_footer', '1',"checked"). " Yes";
            echo form_radio('letter_footer', '0'). " NO";
    ?>
    <br><br>
</div>

 <div id="upload_letter" <?php if($letter_write=="upload_letter"){?>style="display:'';" <?php } elseif($letter_write=="create_letter" || $letter_write==""){?>style="display:none;" <?php } ?>>                    
    
<?php echo $this->lang->line('label_upload');?>:<br>
	<div>
		<input type="file" name="letter_file" id="letter_file" />
	</div>    <span class="markcolor"><?php echo ucwords(form_error('letter_file')); ?></span> <br>   <br>

</div>
<br/>

<div id="submit_button" <?php if($letter_write){?>style="display:'';" <?php } else {  ?> style="display:none;" <?php }?>>        
    <input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('send_btn');?>" class="submit" type="image">
</div>
<?php echo form_close(); ?>
</div>
</fieldset>

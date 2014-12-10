<h3 class="content_edit"><?php echo $this->lang->line('communication_org_sms_msg');?> </h2>


<?php 
    $sms_sender= array(
        'name'      => 'sms_sender',
        'id'        => 'sms_sender',
        'value'     => "Adminscentral",          
        'size'       =>"30",
        'readonly' => "readonly"
    );    
   
    $sms_content= array(
        'name'      => 'sms_content',
        'id'        => 'sms_content',         
        'value'        => $sms_content,         
        'size'       =>"30"        
    );
    
     $sms_no= array(
        'name'      => 'sms_no',
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
        <?php $inbox_sms= ""; if($num_of_inbox_sms){$inbox_sms = "(<span style='color:red;'>".$num_of_inbox_sms."</span>)";}?>
        <?php $sent_sms= ""; if($num_of_sent_sms){$sent_sms = "(<span style='color:red;'>".$num_of_sent_sms."</span>)";}?>
<legend align="left"><?php echo anchor(base_url()."admin/info/compose_new_sms", $this->lang->line('label_compose_new'),"style='color:#FFFFFF;'"); ?> </legend>
     
<div class="infobox" style="width: 888px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo anchor(base_url()."admin/info/communication_org_sms", $this->lang->line('label_inbox').$inbox_sms); ?>
<?php echo "&nbsp;|&nbsp;".anchor(base_url()."admin/info/communication_org_sms_sent", $this->lang->line('label_sent').$sent_sms);?>

<?php echo form_open_multipart(base_url()."admin/info/compose_new_sms_process"); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
 
<?php echo $this->lang->line('label_sender');?>:<br>
<?=form_input($sms_sender);?>
<br><br>
<?php echo $this->lang->line('label_send_to');?>:<br>

 <div id="checkbox" style="float:left;">
        <input type="checkbox" id="individual" name="individual" value="individual" onClick="return check_send_to_individual('individual');"  />Individual

</div>

<div id="checkbox" style="float:left;">
        <input type="checkbox" id="organization" name="organization" value="organization" onClick="return check_send_to_org('organization');" />Organization
</div>
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('individual')); ?></span> 
<div style="clear:both;">    <span class="markcolor"><?php echo ucwords(form_error('sms_no')); ?></span> <br>   <br></div>
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
    <?php echo $this->lang->line('label_sms_no');?>.<br>
    <?=form_input($sms_no);?>
</div><br/>


<?php echo $this->lang->line('label_sms');?>:<br>
<?=form_textarea($sms_content);?>
<span class="markcolor"><?php echo ucwords(form_error('sms_content')); ?></span> <br>   <br>

<br><br>

<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="<?php echo $this->lang->line('send_btn');?>" class="submit" type="image">

<?php echo form_close(); ?>
</div>
</fieldset>

<?php
     $draft_btn = array(
				'name'    => 'draft',
				'id'      => 'draft',
				'value'   => $this->lang->line('draft_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
           $confirm_btn = array(
				'name'    => 'confirm',
				'id'      => 'confirm',
				'value'   => $this->lang->line('confirm_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            $dismiss_btn = array(
				'name'    => 'dismiss',
				'id'      => 'dismiss',
				'value'   => $this->lang->line('dismiss_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
            $back_btn = array(
				'name'    => 'back',
				'id'      => 'back',
				'value'   => "<<".$this->lang->line('back_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
?>

<h3 class="content_edit"><?php echo $this->lang->line('communication_member_sms_summary');?> </h3>
<?php echo form_open("organization/info/communication_member_sms"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div>
    <div><?php echo $this->lang->line('communication_sms_summary_msg');?> : <?php  echo $sms_data['sms_content']; ?></div>
    <div><?php echo $this->lang->line('communication_sms_summary_to_following_receivers');?> :</div>
    <?php if($individual_contact_nos) { ?>    
        <div><?php echo $this->lang->line('label_individual');?> : <?php echo $individual_contact_nos; ?></div>
    <?php } ?>   
    <?php if($members_name) { ?>    
        <div><?php echo $this->lang->line('label_members');?> : <?php echo implode(",", $members_name); ?></div>
    <?php } ?>
    <div><?php echo $this->lang->line('label_cost_info');?> : 
       Total 20sek , Total 10 SMS ,  2sek/SMS
    </div>
<table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>  
                    <td><input id="org_type_hid" type="hidden" value="" name="org_type_hidden"></td>                   
            </tr>
            <tr>
                 <td width="38%">   <?=form_submit($draft_btn);?>  </td>
                 <td width="38%">  <?=form_submit($confirm_btn);?>    </td>
                 <td width="38%">  <?=form_submit($dismiss_btn);?> </td>
                 <td width="38%">  <?=form_submit($back_btn);?> </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>
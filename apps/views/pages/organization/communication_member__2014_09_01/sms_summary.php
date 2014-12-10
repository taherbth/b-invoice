<h3 class="content_edit"><?php echo $this->lang->line('communication_member_sms_summary');?> </h3>
<div>
    <div><?php echo $this->lang->line('communication_sms_summary_msg');?> : <?php  echo $sms_data['sms_content']; ?></div>
    <div><?php echo $this->lang->line('communication_sms_summary_to_following_receivers');?> :</div>
    <?php if($individual_contact_nos) { ?>    
        <div><?php echo $this->lang->line('label_individual');?> : <?php echo $individual_contact_nos; ?></div>
    <?php } ?>
    <?php if($external_members_name) { ?>    
        <div><?php echo $this->lang->line('label_external_contact');?> : <?php echo implode(",", $external_members_name); ?></div>
    <?php } ?>
    <?php if($members_name) { ?>    
        <div><?php echo $this->lang->line('label_members');?> : <?php echo implode(",", $members_name); ?></div>
    <?php } ?>
    <?php if($groups_name) { ?>    
        <div><?php echo $this->lang->line('label_group');?> : <?php echo implode(",", $groups_name); ?></div>
    <?php } ?>
    <?php if($admins_name) { ?>    
        <div><?php echo $this->lang->line('label_admins');?> : <?php echo implode(",", $admins_name); ?></div>
    <?php } ?>
</div>
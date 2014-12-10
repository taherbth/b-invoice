<h3 class="content_edit">Org Admin Control Panel Set member as organization admin</h2>
<?php  $this->load->model('organization/info_model');
 $this->data['record1'] = $this->info_model->get_member_admin_previlize($id);
 $this->data['record'] = $this->info_model->get_member_info($id);
 foreach($this->data['record'] as $m_info): endforeach;
  
 ?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("organization/info/added_admin_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>
     Member Name<br>
     <input type="hidden" name="member_id" value="<?php echo $id;?>" />
    <input name="member_name" class="form_normal" readonly="readonly" value="<?php if(count($m_info->name)):echo $m_info->name;else:echo '';endif;?>" type="text">
    <br><br>
   <b>Set Memmber as  Admin</b> <br><br>
     <select name="admin_status" style="width:150px">
     <option value="1">------------No------------</option>
     <option value="2" <?php if(count($this->data['record1'])):?> selected="selected"<?php endif;?> >------------Yes------------</option>
     </select>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('admin_status')); ?></span> 

    <br><br>
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
<h3 class="content_edit"><?php echo $this->lang->line('external_contact_msg');?></h2>
<?php 
//$this->load->model('admin/users');
echo $this->session->flashdata('message'); 

?>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;Create New Users 	
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

<fieldset>
<legend align="left"><?php echo $this->lang->line('external_contact_list_msg');?></legend>

<?php echo anchor(base_url()."organization/info/create_external_contact", $this->lang->line('label_create_new'));?>

<table width="100%" border="1" align="center" style="border-collapse:collapse; ">
<script language="javascript">
        function confirmSubmit() {
           // var agree=confirm("Are you sure to delete this record?");
           var agree=confirm("<?php echo $this->lang->line('delete_record_msg');?>");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
<tr>
    <th><?php echo $this->lang->line('label_id');?></th>
    <th><?php echo $this->lang->line('label_external_contact_name');?></th>              
    <th><?php echo $this->lang->line('label_external_contact_cell_no');?></th>              
    <th><?php echo $this->lang->line('label_external_contact_email');?></th>              
    <th><?php echo $this->lang->line('label_external_contact_address');?></th>              
    <th><?php echo $this->lang->line('label_action');?></th>
</tr>
<?php
    if($external_contact_list)
    {
      $i = 1;
    foreach($external_contact_list as $contact_List)
    {
        
        if($i%2 == 0):	$color="#FFFFFF"; else : $color="#DDDDDD"; endif;
	
     ?>
		<tr bgcolor="<?php echo $color; ?>">
			<td width="3%" align="center"><?php echo $contact_List->ext_contact_id; ?></td>
         	<td align="center" width="7%"><?php echo $contact_List->ext_contact_name; ?></td>
         	<td align="center" width="7%"><?php echo $contact_List->ext_contact_cell; ?></td>
         	<td align="center" width="7%"><?php echo $contact_List->ext_contact_email; ?></td>
			<td align="center" width="7%"><?php echo $contact_List->ext_contact_address; ?></td>
			<td align="center" width="12%">
            
                <a href="<?php echo base_url(); ?>organization/info/edit_external_contact/<?php echo $contact_List->ext_contact_id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
             
            <a onclick="return confirmSubmit()" href="<?php echo base_url();?>organization/info/delete_external_contact/<?php echo $contact_List->ext_contact_id; ?>" title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
        
          </td>
		</tr>
<?php $i = $i + 1; 
	}
}?>
 </table>
</fieldset>



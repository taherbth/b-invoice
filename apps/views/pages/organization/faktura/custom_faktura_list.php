<h3 class="content_edit"><?php echo $this->lang->line('view_billing_msg');?></h2>
<?php 
//$this->load->model('admin/users');

echo $this->session->flashdata('message'); 
$submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('send_btn'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);

?>
<h2><?php echo $this->lang->line('billing_msg');?></h2>


<table class="width-100 table-striped">
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
    
    <?php
    if(count($org_all_custom_invoice))
    {?>
<thead>
<tr>
    <th><?php echo $this->lang->line('label_invoice_no');?></th>
    <th><?php echo $this->lang->line('label_client');?></th>
    <th><?php echo $this->lang->line('label_fak_invoice_date');?></th>
    <th><?php echo $this->lang->line('label_fak_invoice_expire_date');?></th>
    <th></th>              
    <th>Invoice</th>              
    <th>- reminder</th>              
    <th><?php echo $this->lang->line('label_fak_total_price');?></th>              
    <th><?php echo $this->lang->line('label_status');?></th>              
    
</tr>
</thead>
<?php
    
      $i = 1;
    foreach($org_all_custom_invoice as $invoice_data)
    {
        $org_info = $this->info_model->get_organization_info_by_id($invoice_data->org_id);
        if($org_info){
            $org_name = str_replace(" ","",$org_info[0]->org_name);
            $org_number = $org_info[0]->org_number;
        }
    
        $get_client_info = $this->info_model->get_custom_faktura_client_info($invoice_data->fak_send_to_external_customer,$invoice_data->fak_send_to_org_customer);
        //print_r($get_client_info); exit;
       
        if($get_client_info && !empty($invoice_data->fak_send_to_org_customer)){
            $client_name = $get_client_info[0]->first_name."&nbsp;".$get_client_info[0]->last_name;
        }
        if($i%2 == 0):	$color="#FFFFFF"; else : $color="#DDDDDD"; endif;
	
     ?>
		<tr bgcolor="<?php echo $color; ?>">
			<td><?php  echo $invoice_data->fak_invoice_no; ?></td>
			<td>
            <?php if($get_client_info && !empty($invoice_data->fak_send_to_external_customer)){ ?> 
                <a href="<?php echo base_url(); ?>organization/info/edit_faktura_customer/<?php echo $invoice_data->fak_send_to_external_customer; ?> " title="Edit the Content"><?php echo $get_client_info[0]->fak_customer_or_company_name; ?></a>
            <?php             
            }
        if($get_client_info && !empty($invoice_data->fak_send_to_org_customer)){ ?> 
                <a href="<?php echo base_url(); ?>organization/info/modify_member_profile_by_admin/<?php echo $invoice_data->fak_send_to_org_customer; ?> " title="Edit the Content"><?php echo $client_name; ?></a>
        <?php 
        }
        ?>
        </td>
			<td><?php  if($invoice_data->fak_invoice_date){echo date("Y-m-d",$invoice_data->fak_invoice_date);} else{echo $this->lang->line('missing_message');} ?></td>
			<td><?php   if($invoice_data->fak_expire_date){echo date("Y-m-d",$invoice_data->fak_expire_date); } else{echo $this->lang->line('missing_message');} ?></td>
         	<td>
                <a class="button" href="<?php echo base_url(); ?>organization/info/edit_faktura/<?php echo $invoice_data->custom_faktura_id; ?> ">
                    <?php echo $this->lang->line('invoice_edit_link');?></a>
                <a class="button" href="<?php echo base_url(); ?>organization/info/preview_faktura/<?php echo $invoice_data->custom_faktura_id; ?> ">
                    <?php echo $this->lang->line('invoice_view_link'). "&nbsp;". $this->lang->line('label_invoice');?>
            </td>
         	<td>
                <?php if($invoice_data->fak_sent_by==""){ ?>                
                    <span class="disabled <?php echo $invoice_data->custom_faktura_id; ?>" onclick="toggle2('feedSettings<?php echo $invoice_data->custom_faktura_id; ?>');" style="cursor:pointer;" align="center"><?php echo $this->lang->line('invoice_send_link');?></span>
                    <div id="feedSettings<?php echo $invoice_data->custom_faktura_id; ?>" class="feedSettings"  style="display: none;">
                        <form method="post" action="<?php echo base_url(); ?>organization/info/custom_invoice_send" name="filterupdates" id="filterupdates" style="margin: 0;">
                            <div id="checkbox">
                                <label><input type="checkbox" id="letter<?php echo $invoice_data->custom_faktura_id; ?>" name="letter" value="letter" onClick="return check('letter',<?php echo $invoice_data->custom_faktura_id; ?>);" /> Letter</label>
                            </div>
                            <div id="checkbox">
                            <label><input type="checkbox" id="sms<?php echo $invoice_data->custom_faktura_id; ?>" name="sms" value="sms" onClick="return check1('sms',<?php echo $invoice_data->custom_faktura_id; ?>);"/> SMS</label>
                            <label><input type="checkbox" id="email<?php echo $invoice_data->custom_faktura_id; ?>" name="email" value="email" onClick="return check1('email',<?php echo $invoice_data->custom_faktura_id; ?>);"/> E-mail</label>
                            <?php echo form_hidden('custom_faktura_id', $invoice_data->custom_faktura_id);?>
                            <div class=""><?php echo form_submit($submit);?>   
                            </div>
                            </div>                    
                        </form>
                    </div>
                <?php } else{echo '<span class="enabled">Invoice sent</span>'/*$this->lang->line('invoice_send_link').'<*/;}?>    
            </td>
         	<td>
                <?php if($invoice_data->fak_sent_by!=""){ ?>
                    <span class="disabled <?php echo $invoice_data->custom_faktura_id; ?>" onclick="toggle2('feedSettings<?php echo $invoice_data->custom_faktura_id; ?>');" style="cursor:pointer;" align="center"><?php echo $this->lang->line('invoice_reminder_link');?></span>
                    <div id="feedSettings<?php echo $invoice_data->custom_faktura_id; ?>" class="feedSettings"  style="display: none;">
                    <form method="post" action="<?php echo base_url(); ?>organization/info/custom_invoice_reminder_send" name="filterupdates" id="filterupdates">
                    <div id="checkbox" style="float:left;">
                        <input type="checkbox" id="letter<?php echo $invoice_data->custom_faktura_id; ?>" name="letter" value="letter" onClick="return check('letter',<?php echo $invoice_data->custom_faktura_id; ?>);" />Letter
                    OR<br/></div><div style="clear:both;">
                    <div id="checkbox" style="float:left;">
                    <input type="checkbox" id="sms<?php echo $invoice_data->custom_faktura_id; ?>" name="sms" value="sms" onClick="return check1('sms',<?php echo $invoice_data->custom_faktura_id; ?>);"/>SMS
                    <input type="checkbox" id="email<?php echo $invoice_data->custom_faktura_id; ?>" name="email" value="email" onClick="return check1('email',<?php echo $invoice_data->custom_faktura_id; ?>);"/>E-mail
                    <?=form_hidden('custom_faktura_id', $invoice_data->custom_faktura_id);?>
                    <div class=""><?=form_submit($submit);?>   
                    </div>

                    </div>
                    
                    </form>
                    </div>
                <?php } else{echo '<span class="enabled">Reminder sent</span';} /*$this->lang->line('invoice_reminder_link');*/?>
            </td>
            <td><?php  echo $invoice_data->fak_total_price; ?></td>
			<td>
            
                <?php if($invoice_data->fak_status){echo '<span class="enabled"><a title="Click to toggle status" href="'.base_url().'organization/info/custom_invoice_make_unpaid/'.$invoice_data->custom_faktura_id.'">'.$this->lang->line('invoice_paid_msg').'</span>';?>
                </a>
                
                <?php } elseif(!$invoice_data->fak_status){echo '<span class="disabled"><a title="Click to toggle status" href="'.base_url().'organization/info/custom_invoice_make_paid/'.$invoice_data->custom_faktura_id.'">'.$this->lang->line('invoice_unpaid_msg').'</span>';
                } ?>
            </td>
            
			
		</tr>
<?php $i = $i + 1; 
	}
} else{echo $this->lang->line('not_available'); }?>
 </table>
</fieldset>


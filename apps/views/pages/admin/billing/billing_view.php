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
<legend align="left"><?php echo $this->lang->line('billing_msg');?></legend>


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
    
    <?php
    if(count($invoice_info))
    {?>
<tr>
    <th><?php echo $this->lang->line('label_org');?></th>
    <th></th>              
    <th></th>              
    <th></th>              
    <th><?php echo $this->lang->line('label_status');?></th>              
    
</tr>
<?php
    
      $i = 1;
    foreach($invoice_info as $invoice_data)
    {
     
    if($i%2 == 0):	$color="#FFFFFF"; else : $color="#DDDDDD"; endif;
	
     ?>
		<tr bgcolor="<?php echo $color; ?>">
			<td width="3%" align="center"><?php  echo $invoice_data->org_name; ?></td>
         	<td align="center" width="7%">
                <a href="<?php echo base_url(); ?>admin/info/invoice_edit/<?php echo $invoice_data->fak_id; ?> " title="Edit the Content">
                    <?php echo $this->lang->line('invoice_edit_link');?>
                </a>
                <a href="<?php echo base_url(); ?>invoice/invoice_<?php echo $invoice_data->org_name.'_'.$invoice_data->org_number.'_'.$invoice_data->fak_id.'.pdf'; ?> " title="Edit the Content">
                    <?php echo "/&nbsp;".$this->lang->line('invoice_view_link'). "&nbsp;". $this->lang->line('label_invoice');?>
                </a>
            </td>
         	<td align="center" width="20%">
                <?php if($invoice_data->fak_sent_by==""){ ?>
                
                    <div class="feedsettings<?php echo $invoice_data->fak_id; ?>" onclick="toggle2('feedSettings<?php echo $invoice_data->fak_id; ?>');" style="cursor:pointer; color:#689102;" align="center"><?php echo $this->lang->line('invoice_send_link');?></div>
                    <div id="feedSettings<?php echo $invoice_data->fak_id; ?>" class="feedSettings"  style="display: none;">
                    <form method="post" action="<?php echo base_url(); ?>admin/info/invoice_send" name="filterupdates" id="filterupdates">
                    <div id="checkbox" style="float:left;">
                        <input type="checkbox" id="letter<?php echo $invoice_data->fak_id; ?>" name="letter" value="letter" onClick="return check('letter',<?php echo $invoice_data->fak_id; ?>);" />Letter
                    OR<br/></div><div style="clear:both;">
                    <div id="checkbox" style="float:left;">
                    <input type="checkbox" id="sms<?php echo $invoice_data->fak_id; ?>" name="sms" value="sms" onClick="return check1('sms',<?php echo $invoice_data->fak_id; ?>);"/>SMS
                    <input type="checkbox" id="email<?php echo $invoice_data->fak_id; ?>" name="email" value="email" onClick="return check1('email',<?php echo $invoice_data->fak_id; ?>);"/>E-mail
                    <?=form_hidden('fak_id', $invoice_data->fak_id);?>
                    <div class=""><?=form_submit($submit);?>   
                    </div>

                    </div>
                    
                    </form>
                    </div>
                    
                
                <?php } else{echo $this->lang->line('invoice_send_link');}?>
                
                    
    
            </td>
         	<td align="center" width="7%">
                <?php if($invoice_data->fak_sent_by!=""){ ?>
                    <div class="feedsettings<?php echo $invoice_data->fak_id; ?>" onclick="toggle2('feedSettings<?php echo $invoice_data->fak_id; ?>');" style="cursor:pointer; color:#689102;" align="center"><?php echo $this->lang->line('invoice_reminder_link');?></div>
                    <div id="feedSettings<?php echo $invoice_data->fak_id; ?>" class="feedSettings"  style="display: none;">
                    <form method="post" action="<?php echo base_url(); ?>admin/info/invoice_reminder_send" name="filterupdates" id="filterupdates">
                    <div id="checkbox" style="float:left;">
                        <input type="checkbox" id="letter<?php echo $invoice_data->fak_id; ?>" name="letter" value="letter" onClick="return check('letter',<?php echo $invoice_data->fak_id; ?>);" />Letter
                    OR<br/></div><div style="clear:both;">
                    <div id="checkbox" style="float:left;">
                    <input type="checkbox" id="sms<?php echo $invoice_data->fak_id; ?>" name="sms" value="sms" onClick="return check1('sms',<?php echo $invoice_data->fak_id; ?>);"/>SMS
                    <input type="checkbox" id="email<?php echo $invoice_data->fak_id; ?>" name="email" value="email" onClick="return check1('email',<?php echo $invoice_data->fak_id; ?>);"/>E-mail
                    <?=form_hidden('fak_id', $invoice_data->fak_id);?>
                    <div class=""><?=form_submit($submit);?>   
                    </div>

                    </div>
                    
                    </form>
                    </div>
                <?php } else{echo $this->lang->line('invoice_reminder_link');}?>
            </td>
			<td align="center" width="7%">
            
                <?php if($invoice_data->fak_paid){echo $this->lang->line('invoice_paid_msg')."/";?>
                <a href="<?php echo base_url(); ?>admin/info/invoice_make_unpaid/<?php echo $invoice_data->fak_id; ?> " >
                    <?php echo $this->lang->line('invoice_unpaid_link');  ?>
                </a>
                
                <?php } elseif(!$invoice_data->fak_paid){echo $this->lang->line('invoice_unpaid_msg')."/";?>
                <a href="<?php echo base_url(); ?>admin/info/invoice_make_paid/<?php echo $invoice_data->fak_id; ?> " >
                    <?php echo $this->lang->line('invoice_paid_link');  ?>
                </a><?php } ?>
            </td>
            
			
		</tr>
<?php $i = $i + 1; 
	}
} else{echo $this->lang->line('not_available'); }?>
 </table>
</fieldset>


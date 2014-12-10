<h3 class="content_edit"><?php echo $this->lang->line('previlization_settings_msg');?></h2>

<style>
    input {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .inside{}
    .previlize a{ color:#009966; font-weight:bold;}
    .previlize a:hover{ color: #990033; font-weight:bold;}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script>
    function getSubCat1(val)
    {
        url="<?php echo base_url(); ?>get_username.php?cid="+val;
        try
        {// Firefox, Opera 8.0+, Safari, IE7
            xm=new XMLHttpRequest();
        }
        catch(e)
        {// Old IE
            try
            {
                xm=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e)
            {
                alert ("Your browser does not support XMLHTTP!");
                return;
            }
        }		
        xm.open("GET",url,false);
        xm.send(null);
        msg=xm.responseText;
		
        document.getElementById("availability_status").innerHTML=msg;				
    }
</script>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
</script>
<?php
//$this->session->userdata('user_id');
$query1 = $this->db->query("select * from admin_user_previlize where user_type_id ='" . $user_type_id . "'");
//echo "<pre>";print_r($query1->result());die();
if ($query1->num_rows() == 0) {
    echo "<font style='color:red'>No previlization exists for this user types</font>";
} else {
    foreach ($query1->result() as $info):
    endforeach;
    ?>
    <?php echo form_open("admin/backend/update_admin_user_type_previlize"); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
        <div class="infobox_left" style="width: 900px;">
            <?php
            $user_type_name = $this->db->query("select type_name from admin_user_types where id ='" . $user_type_id . "'");
            foreach ($user_type_name->result() as $rows):
                $type_name = $rows->type_name;
            endforeach;
            ?>

            <input type="hidden" name="user_type_id" value="<?php echo $user_type_id; ?>" />
            <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                <tbody>
                    <tr>
                        <td width="10%"><font class="inside"><?php echo $this->lang->line('label_type_name');?></font></td>
                        <td width="45%">
                         <input type="text" readonly="readonly" value="<?php echo $type_name; ?>" /> 
                        </td>
                    </tr>
           </tbody></table> 

        </div> 
        <div class="infobox_right" style="width: 900px;">
            <div style="width:420px; float:left; position:relative; ">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('order_tab');?></font>
                            </td>
                            <td width="33%">
                                <input  type="checkbox"  onClick="checkAll(this)"> <?php echo $this->lang->line('label_all');?>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_view_letters');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_view_letters"  <?php if ($info->order_view_letters == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_deliver_letters');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_deliver_letters"  <?php if ($info->order_deliver_letters == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_archieve_letters');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_archieve_letters"  <?php if ($info->order_archieve_letters == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_view_new_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_view_new_customer"  <?php if ($info->order_view_new_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_approve_new_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_approve_new_customer"  <?php if ($info->order_approve_new_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_deny_new_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_deny_new_customer"  <?php if ($info->order_deny_new_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                    
                         <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_view_package_order');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_view_package_order"  <?php if ($info->order_view_package_order == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_approve_package_order');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_approve_package_order"  <?php if ($info->order_approve_package_order == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_order_deny_package_order');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="order_deny_package_order"  <?php if ($info->order_deny_package_order == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        
                        


                    </tbody></table>

                <table width="367" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                        <tr>
                            <td width="60%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_configuration');?></font></td>
                          <td width="40%">                            </td>
          </tr>
                        <tr>
                            <td width="60%"><font class="inside"><?php echo $this->lang->line('label_configuration_access');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="configuration_access"  <?php if ($info->configuration_access== '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tbody></table>

<table width="309" border="0" align="center" cellpadding="2" cellspacing="1" id="theBody" style="margin-left:40px">
<tbody>
                        <tr>
                            <td width="49%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_customer');?>
                                </font></td>
                          <td width="51%">                            </td>
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_view_registered_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_view_registered_customer"  <?php if ($info->customer_view_registered_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                      
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_create_new_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_create_new_customer"  <?php if ($info->customer_create_new_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                      
          </tr>
                        <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_view_customer_details');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_view_customer_details"  <?php if ($info->customer_view_customer_details == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_edit_customer_details');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_edit_customer_details"  <?php if ($info->customer_edit_customer_details == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       
                       <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_view_bank_details');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_view_bank_details"  <?php if ($info->customer_view_bank_details == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       
                       <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_restriction_on_sms_letter');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_restriction_on_sms_letter"  <?php if ($info->customer_restriction_on_sms_letter == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       
                       <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_activate_deactivate_customer');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_activate_deactivate_customer"  <?php if ($info->customer_activate_deactivate_customer == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       
                       <tr>
                            <td width="49%"><font class="inside"><?php echo $this->lang->line('label_customer_previlization_settings');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="customer_previlization_settings"  <?php if ($info->customer_previlization_settings == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>                      
                       </tr>
                       
                    </tbody></table>
<table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('billing_tab');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_view_billing');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_view_billing"  <?php if ($info->billing_view_billing == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_edit_invoice');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_edit_invoice"  <?php if ($info->billing_edit_invoice == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_view_invoice_receipt');?> </font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_view_invoice_receipt"  <?php if ($info->billing_view_invoice_receipt == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_send_invoice_receipt');?> </font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_send_invoice_receipt"  <?php if ($info->billing_send_invoice_receipt == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_send_reminder');?> </font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_send_reminder"  <?php if ($info->billing_send_reminder == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_billing_change_paid_unpaid_status');?>  </font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="billing_change_paid_unpaid_status"  <?php if ($info->billing_change_paid_unpaid_status == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        
                    </tbody></table>
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_users');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_users_view_users');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="users_view_users"  <?php if ($info->users_view_users == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_users_edit_users');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="users_edit_users"  <?php if ($info->users_edit_users == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_users_delete_users');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="users_delete_users"  <?php if ($info->users_delete_users == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_users_create_new_users');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="users_create_new_users"  <?php if ($info->users_create_new_users == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        
                         <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_users_block_unblock_users');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="users_block_unblock_user"  <?php if ($info->users_block_unblock_user == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                       
                    </tbody></table>
                    
                    
                    <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('view_types');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_user_types_view_user_types');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="user_types_view_user_types"  <?php if ($info->user_types_view_user_types == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_user_types_edit_user_types');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="user_types_edit_user_types"  <?php if ($info->user_types_edit_user_types == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_user_types_delete_user_types');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="user_types_delete_user_types"  <?php if ($info->user_types_delete_user_types == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_customer_previlization_settings');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="user_types_previlization_settings"  <?php if ($info->user_types_previlization_settings == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_user_types_create_new_user_types');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="user_types_create_new_user_types"  <?php if ($info->user_types_create_new_user_types == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            
                        </tr> 
                    </tbody></table>
            </div>
            <div style="width:420px; float:left; position:relative;">
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_communication');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_email_view_inbox');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_email_view_inbox"  <?php if ($info->communication_email_view_inbox == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_email_compose_new');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_email_compose_new"  <?php if ($info->communication_email_compose_new == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_email_view_sent');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_email_view_sent"  <?php if ($info->communication_email_view_sent == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_sms_view_inbox');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_sms_view_inbox"  <?php if ($info->communication_sms_view_inbox == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_sms_compose_new');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_sms_write_new"  <?php if ($info->communication_sms_write_new == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_sms_view_sent');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="communication_sms_view_sent"  <?php if ($info->communication_sms_view_sent == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_letter_write_new');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="letter_write_new"  <?php if ($info->letter_write_new == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_communication_letter_view_sent');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="letter_view_sent"  <?php if ($info->letter_view_sent == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                    </tbody></table>
                
                <table cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
                    <tbody>
                        <tr>
                            <td width="45%"><font class="inside" style="font-weight:bold; color:green"><?php echo $this->lang->line('label_tracking');?>
                                </font></td>
                            <td width="33%">
                            </td>
                        </tr>
                        <tr>
                            <td width="45%"><font class="inside"><?php echo $this->lang->line('label_tracking_access');?></font></td>
                            <td width="33%">
                               <input id="x" type="checkbox"  name="tracking_access"  <?php if ($info->tracking_access == '1') {?> checked="checked" <?php } ?> value="1" />
                            </td>
                        </tr>
                        
                    </tbody></table>
                       
          </div>
        </div>
        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Update" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div>
    <?php
    echo form_close();
}
?>
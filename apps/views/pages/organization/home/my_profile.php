<h3 class="content_edit"><?php echo $this->lang->line('mem_profile_details_msg');?></h3>
<?php 
echo $this->session->flashdata('message'); 
 $group_name ="";
  $group_info = $this->info_model->get_org_mem_group_info($this->session->userdata('member_group'));
    if($group_info){
         $group_name = $group_info[0]->group_name;
}

if($mem_type=="Admin" || $mem_type=="Superadmin"){
     $mem_type=$this->session->userdata('mem_type');
}
else{
    $mem_type = $this->info_model->get_all_org_member_types($this->session->userdata('mem_type'));
    if($mem_type){
        $mem_type = $mem_type[0]->type_name;
    }
}
    
foreach ($query1 as $p_info):

$org_country="";
$country = "";
$bill_country = "";

if($p_info->country=="DEU"){$country = "GERMAN";}
if($p_info->country=="NOR"){$country= "NORWAY";}
if($p_info->country=="DNK"){$country = "DENMARK";}
if($p_info->country=="FIN"){$country= "FINLAND";}
if($p_info->country=="GBR"){$country = "UK";}
if($p_info->country=="SWE"){$country = "SWEDEN";}
                
endforeach;

?>
<style>
table{ font-style:italic}
</style>
<div class="form">
    <span><a class="button icon-settings" href="<?php echo base_url().'organization/info/profile_setting_by_member/'.$p_info->mem_id;?>"><?php echo $this->lang->line('mem_profile_settings_btn');?></a></span>
    <span><a class="button icon-edit" href="<?php echo base_url().'organization/info/modify_my_profile/'.$p_info->mem_id;?>"><?php echo $this->lang->line('mem_profile_edit_btn');?></a></span>
</span>
</div>
    <div>
                </div>
                <div style="width:900px; ">
                    <div style="width:220px; position:relative;">
                        <div id="org-logo">
                            <?php echo '<img style="" src=' . base_url() . 'uploads/' . $p_info->profile_picture . ' width="160" height="160" />'; ?>                        
                        </div>
                    </div>
                    <div style="background-color:#E8E8E8; border:1px solid #CCCCCC; margin-top:20px; -moz-border-radius: 8px 8px 8px 8px; width:670px; float: left">
                        
                                    <div>
                                        <span style=" padding-left:20px;"><b><font color="green"><?php echo $this->lang->line('label_about_me');?>:</font></b><span>
                                        <br/><span style=" padding-left:20px;"><?php echo $p_info->profile_message; ?></span>
                                    </div>
                                    
                                    <div class="clear"></div>

                                    <div style="width:270px; float:left; position:relative;margin-top:25px; ">
                                                                           
                                          <span style=" padding-left:20px;"><b><font color="green"><?php echo $this->lang->line('label_personal_info');?></font></b><span>
                                    <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                        <tbody>
                                          
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_first_name');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->first_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center; padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_last_name');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->last_name; ?> </td>
                                            </tr>
                                            
                                             <tr>
                                                <td width="18%" style="text-align:center; padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_sex');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->member_sex; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_ssn_person_no');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->ssn_or_person_no; ?> </td>
                                            </tr>
                                            
                                             <tr>
                                                <td width="18%" style="text-align:center;padding-left:60px"><font class="inside"><?php echo $this->lang->line('label_username');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->username; ?> </td>
                                            </tr>
                                            
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:80px"><font class="inside"><?php echo $this->lang->line('label_email');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->email; ?> </td>
                                           </tr>
                                           <tr>
                                                <td width="18%" style="text-align:center;padding-left:80px"><font class="inside"><?php echo $this->lang->line('label_mobile_phone')."&nbsp;".$this->lang->line('label_no');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->mobile_phone; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="18%" style="text-align:center;padding-left:75px"><font class="inside"><?php echo $this->lang->line('label_street_address');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->street_address; ?> </td>
                                            </tr>
                                        </tbody></table>
                                    </div>  
                                    
                                    
                                    <div style="width:400px; float:left; position:relative;  margin-top:20px;  ">
                            
                                    <table  cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
                                        <tbody>
                                        <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_zip');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->zip; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_city');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->city; ?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_country');?>:</font></td>
                                                <td width="33%"><?php echo $country; ?> </td>
                                            </tr>
                                            
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_bank_payment');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->bank_acc_no_one; ?></td>
                                            </tr>
                                            
                                             <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_bank_acc_type');?>:</font></td>
                                                <td width="33%"><?php echo $p_info->bank_acc_type_one; ?></td>
                                            </tr>
                                            
                                        
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_group_name');?>:</font></td>
                                                <td width="33%"><?php if($group_name){echo $group_name;} else{echo "N/A";} ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_member_type');?>:</font></td>
                                                <td width="33%"><?php if($mem_type){echo $mem_type;} else{echo "N/A";} ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <td width="38%" style="text-align:center;padding-left:55px"><font class="inside"><?php echo $this->lang->line('label_member_ship_expire');?>:</font></td>
                                                <td width="33%"><?php 
                                                $member_ship_expire = date("Y-m-d",$p_info->expire_date);
                                                if($member_ship_expire ){echo $member_ship_expire ;} else{echo "N/A";} ?></td>
                                            </tr>
                                          
                                        </tbody></table>
                                    
                                    </div>
                                    </div>
                                    </div>
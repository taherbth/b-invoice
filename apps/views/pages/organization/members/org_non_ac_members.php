<h3 class="content_edit"><?php echo $this->lang->line('label_org_admin_view_all_non_ac_member');?> </h3>
<?php 
    if($access_org_members){ 
?>
<?php echo $this->session->flashdata('message'); 
      echo '<a class="button add" href="'.base_url().'organization/info/create_new_non_ac_member'.'">'.$this->lang->line('label_create_new').'</a>'; 
/*
$group_name ="";
  $group_info = $this->info_model->get_org_mem_group_info($this->session->userdata('member_group'));
    if($group_info){
         $group_name = $group_info[0]->group_name;
}
*/

foreach ($query1 as $info):                                                  
 $group_info = $this->info_model->get_mem_group_info_by_mem_id($info->mem_id); 
 $group_names = $this->lang->line('group_name_everybody');
    if($group_info){
        foreach($group_info as $rows){
            if($group_names){
                    $group_names .= ",".$rows->group_name;
            }else{$group_names = $rows->group_name;}
         }
    }

if($info->country=="DEU"){$country= "GERMAN";}
if($info->country=="NOR"){$country= "NORWAY";}
if($info->country=="DNK"){$country = "DENMARK";}
if($info->country=="FIN"){$country= "FINLAND";}
if($info->country=="GBR"){$country= "UK";}
if($info->country=="SWE"){$country = "SWEDEN";} 
                    
?>
<div class="accordion-header units-row">
<div class="unit-50">    
	<?php 
        if($info->customer_type=="Government"){ 
            echo $this->lang->line('label_customer_government');
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_department_name').":&nbsp;". $info->dept_or_company_or_org_name."</span>";
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_department_no').":&nbsp;". $info->dept_or_org_no."</span>";
        }
        elseif($info->customer_type=="Company"){ 
            echo $this->lang->line('label_customer_company');
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_company_name').":&nbsp;". $info->dept_or_company_or_org_name."</span>";
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_organization_no').":&nbsp;". $info->dept_or_org_no."</span>";
        }
        elseif($info->customer_type=="Organization"){ 
            echo $this->lang->line('label_customer_organization');
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_organization_name').":&nbsp;". $info->dept_or_company_or_org_name."</span>";
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_organization_no').":&nbsp;". $info->dept_or_org_no."</span>";
        }
        elseif($info->customer_type=="Private person"){ 
            echo $this->lang->line('label_customer_private_person');
            echo "<span style='margin-left:20px;'>".$this->lang->line('label_ssn_person_no').":&nbsp;". $info->ssn_or_person_no."</span>";
        }
    ?>
</div>

<div class="unit-push-right">
        <a class="button" href="<?php echo base_url(); ?>organization/info/modify_member_profile_by_admin/<?php echo $info->mem_id;?>">Edit</a>
	</div>
</div>
	<div class="accordion-content units-row">

        <div class="unit-33">
            <label class="From"><b>ID:</b> </label><?php echo $info->mem_id; ?><br>
            <label class="From"><b><?php  echo $this->lang->line('label_customer_no'); ?>:</b> </label><?php echo $info->customer_no; ?><br>
            <label class="From"><b><?php echo $this->lang->line('label_street_address'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->street_address; ?></span> <br>
            <label class="From"><b><?php echo $this->lang->line('label_zip'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->zip; ?></span> <br>
            <label class="From"><b><?php echo $this->lang->line('label_city'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->city; ?></span> <br>
            <label class="From"><b><?php echo $this->lang->line('label_country'); ?>:</b></label>
            <span class="HighLight"><?php echo $country; ?></span> <br>
        </div>
        <div class="unit-33">
            <label class="From"><b><?php echo $this->lang->line('label_billing_email'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->email; ?></span> <br>   
            <label class="From"><b><?php echo $this->lang->line('label_billing_mobile'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->mobile_phone; ?></span> <br>
            <label class="From"><b><?php echo $this->lang->line('label_phone_or_fax'); ?>:</b></label>
            <span class="HighLight"><?php echo $info->land_line_phone; ?></span> <br>
            <label class="From"><b><?php  echo $this->lang->line('label_vat_no'); ?>:</b></label> 
            <span class="HighLight"><?php echo $info->vat_no; ?></span> <br>
            <label class="From"><b><?php  echo $this->lang->line('label_ean_no'); ?>:</b></label> 
            <span class="HighLight"><?php echo $info->ean_no; ?></span> <br>
             <label class="From"><b><?php  echo $this->lang->line('label_web'); ?>:</b></label> 
            <span class="HighLight"><?php echo $info->web; ?></span> <br>
        </div>
        <div class="unit-33">
                    <label class="From"><b><?php  echo $this->lang->line('label_attention'); ?>:</b></label> 
                    <span class="HighLight"><?php echo $info->attention; ?></span> <br>
                     <label class="From"><b><?php  echo $this->lang->line('label_your_reference'); ?>:</b></label> 
                    <span class="HighLight"><?php echo $info->your_reference; ?></span> <br>
                    <label class="From"><b><?php  echo $this->lang->line('label_our_reference'); ?>:</b></label> 
                    <span class="HighLight"><?php echo $info->our_reference; ?></span> <br>
                    <label class="From"><b><?php  echo $this->lang->line('label_credit_limit'); ?>:</b></label> 
                    <span class="HighLight"><?php echo $info->credit_limit; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_discount')."(%)"; ?>:</b></label> 
                    <span class="HighLight"><?php echo $info->discount; ?></span> <br>
                    <label class="From"><b><?php echo $this->lang->line('label_group'); ?>:</b></label> 
                    <span class="HighLight"><?php echo $group_names; ?></span> <br>                   
                    
        </div>
	</div>
<?php endforeach; ?>

<p class="pagination"><?php echo $this->pagination->create_links(); ?></p>

<?php } else { ?>  
<div class="notification">
 <span style="color:red;"><?php echo $this->lang->line('members_no_access_msg');?></span>

</div><?php }  ?>

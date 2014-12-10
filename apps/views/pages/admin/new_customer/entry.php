<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h3>
<h2 style="text-align:center;"><span style="color:red;">Step1</span>---------Step2--------Step3</h2>

<?php
        $org_type_option = array(
			 "Government" => $this->lang->line('label_customer_government'),
			  "Company" => $this->lang->line('label_customer_company'),           
			  "Organization" => $this->lang->line('label_customer_organization')      
        );    
        //$package_info_option = $package_info;
        $org_number= array(
              'name'      => 'org_number',
              'id'        => 'org_number',
              'value'     => $org_number,          
			  'size'       =>"30",
              'onblur'        => "getSubCat1(this.value)"
            );
		 $org_name = array(
              'name'      => 'org_name',
              'id'        => 'org_name',
              'value'     => $org_name,          
			  'size'       =>"30",
             );
         $org_email = array(
              'name'      => 'org_email',
              'id'        => 'org_email',
              'value'     => $org_email,          
			  'size'       =>"30",
                  
            );
        $org_web = array(
              'name'      => 'org_web',
              'id'        => 'org_web',
              'value'     => $org_web,          
			  'size'       =>"30"                  
            );
        $org_mobile_phone = array(
              'name'      => 'org_mobile_phone',
              'id'        => 'org_mobile_phone',
              'value'     => $org_mobile_phone,          
			  'size'       =>"30",
             );
        $org_land_phone = array(
              'name'      => 'org_land_phone',
              'id'        => 'org_land_phone',
              'value'     => $org_land_phone,          
			  'size'       =>"30",
             );
		 $org_description = array(
              'name'      => 'org_description',
              'id'        => 'org_description',
              'value'     => $org_description,          
              'style'       => 'width:340px;height:120px'
            );
                        
        $org_street_address = array(
              'name'      => 'org_street_address',
              'id'        => 'org_street_address',
              'value'     => $org_street_address,          
			  'style'       => 'width:340px;height:40px'           
            );
        $org_zip = array(
              'name'      => 'org_zip',
              'id'        => 'org_zip',
              'value'     => $org_zip,          
			  'size'       =>"30",
            );		   
         $org_city = array(
              'name'      => 'org_city',
              'id'        => 'org_city',
              'value'     => $org_city,          
			  'size'       =>"30",
             );    
         $org_country_option = array(
			  ''  => 'Select Country:',
              'SWE'        => 'Sweden',
              'DEU'      => 'German',
              'NOR'      => 'Norway',
              'DNK'      => 'Denmark',
              'FIN'      => 'Finland',
              'GBR'      => 'UK',
            );            
        /*$org_bank_acc_no_one = array(
              'name'      => 'org_bank_acc_no_one',
              'id'        => 'org_bank_acc_no_one',
              'value'     => $org_bank_acc_no_one,          
			  'size'       =>"30",
               );
        
        $org_bank_acc_type_option = array(
			  ''  => 'Select Type:',
              'Bankgiro'        => 'Bankgiro',
              'PlusGiro'      => 'PlusGiro',
              'Bankaccount'      => 'Bankaccount',
              'SWIFT'      => 'SWIFT',
              'IBAN'      => 'IBAN'
            );*/

		   $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => $this->lang->line('next_btn_msg'),
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);
      
?>
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

    function check_value()
    {
        var myvar = document.getElementById("org_category").value;
        if(myvar=='other')
        {
            $("#a").show();
        }
        else
        {
            $("#a").hide();
        }
    }

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


function change_customer_type_org(){ 
      var selected_val =  document.getElementById("customer_type").value;
      var government = "<?php echo 'Government'; ?>"
      var company = "<?php echo 'Company'; ?>"
      var organization = "<?php echo 'Organization'; ?>"
      var private_person = "<?php echo 'Private person'; ?>"
      
      if(selected_val==government){
          document.getElementById('department_details_div').style.display="";
          document.getElementById('company_details_div').style.display="none";
          document.getElementById('organization_details_div').style.display="none";    
          document.getElementById('department_no').style.display="";    
          document.getElementById('organization_no').style.display="none";    
          document.getElementById('department_name').style.display="";    
          document.getElementById('company_name').style.display="none";    
          document.getElementById('organization_name').style.display="none";              
          document.getElementById('department_email').style.display="";    
          document.getElementById('company_email').style.display="none";    
          document.getElementById('organization_email').style.display="none";               
          document.getElementById('department_web').style.display="";    
          document.getElementById('company_web').style.display="none";    
          document.getElementById('organization_web').style.display="none";            
          document.getElementById('department_mobile_phone').style.display="";    
          document.getElementById('company_mobile_phone').style.display="none";    
          document.getElementById('organization_mobile_phone').style.display="none";                   
          document.getElementById('department_land_phone').style.display="";    
          document.getElementById('company_land_phone').style.display="none";    
          document.getElementById('organization_land_phone').style.display="none";                
          document.getElementById('department_description').style.display="";    
          document.getElementById('company_description').style.display="none";    
          document.getElementById('organization_description').style.display="none";            
          document.getElementById('department_category').style.display="";    
          document.getElementById('company_category').style.display="none";    
          document.getElementById('organization_category').style.display="none";  
          
     
     }  
      if(selected_val==company){
          document.getElementById('department_details_div').style.display="none";
          document.getElementById('company_details_div').style.display="";
          document.getElementById('organization_details_div').style.display="none";    
          document.getElementById('department_no').style.display="none";    
          document.getElementById('organization_no').style.display="";    
          document.getElementById('department_name').style.display="none";    
          document.getElementById('company_name').style.display="";    
          document.getElementById('organization_name').style.display="none";   
          document.getElementById('department_email').style.display="none";    
          document.getElementById('company_email').style.display="";    
          document.getElementById('organization_email').style.display="none";    
          document.getElementById('department_web').style.display="none";    
          document.getElementById('company_web').style.display="";    
          document.getElementById('organization_web').style.display="none";
          document.getElementById('department_mobile_phone').style.display="none";    
          document.getElementById('company_mobile_phone').style.display="";    
          document.getElementById('organization_mobile_phone').style.display="none";            
          document.getElementById('department_land_phone').style.display="none";    
          document.getElementById('company_land_phone').style.display="";    
          document.getElementById('organization_land_phone').style.display="none"; 
          document.getElementById('department_description').style.display="none";    
          document.getElementById('company_description').style.display="";    
          document.getElementById('organization_description').style.display="none";  
          document.getElementById('department_category').style.display="none";    
          document.getElementById('company_category').style.display="";    
          document.getElementById('organization_category').style.display="none";  
      }
      if(selected_val==organization){      
          document.getElementById('department_details_div').style.display="none";
          document.getElementById('company_details_div').style.display="none";
          document.getElementById('organization_details_div').style.display="";    
          document.getElementById('department_no').style.display="none";    
          document.getElementById('organization_no').style.display=""; 
          document.getElementById('department_name').style.display="none";    
          document.getElementById('company_name').style.display="none";    
          document.getElementById('organization_name').style.display="";  
          document.getElementById('department_email').style.display="none";    
          document.getElementById('company_email').style.display="none";    
          document.getElementById('organization_email').style.display="";   
          document.getElementById('department_web').style.display="none";    
          document.getElementById('company_web').style.display="none";    
          document.getElementById('organization_web').style.display="";
          document.getElementById('department_mobile_phone').style.display="none";    
          document.getElementById('company_mobile_phone').style.display="none";    
          document.getElementById('organization_mobile_phone').style.display="";  
          document.getElementById('department_land_phone').style.display="none";    
          document.getElementById('company_land_phone').style.display="none";    
          document.getElementById('organization_land_phone').style.display=""; 
          document.getElementById('department_description').style.display="none";    
          document.getElementById('company_description').style.display="none";    
          document.getElementById('organization_description').style.display="";  
          document.getElementById('department_category').style.display="none";    
          document.getElementById('company_category').style.display="none";    
          document.getElementById('organization_category').style.display="";  
    }
   
}
</script>

<?php echo form_open("admin/info/added_customer_step2"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
        <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_org_info'); ?>: </b><br/><br/></font></td>
                <td width="33%"></td>
        </tr>
        
        <tr>
                <td width="38%"><font class="inside"><?php //echo $this->lang->line('label_choose_package'); ?></font></td>
                <td width="33%"><? //=form_dropdown('package_name',$package_info_option,'','class="form_input_select"');?>
                    <span class="markcolor"><?php //echo ucwords(form_error('package_name')); ?></span> 
                </td>
        </tr>
            <tr>
                <td width="38%"><font class="inside"><?php echo $this->lang->line('label_customer_type'); ?>:</font></td>
                <td width="33%"> <?php  echo form_dropdown('org_type',$org_type_option, $org_type ,'id="customer_type" onChange="change_customer_type_org()"');?>
                <span class="markcolor"><?php echo ucwords(form_error('customer_type')); ?></span>  </td>
        </tr>
                <tr>
                    <td>
                        <div id="department_details_div"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <b> <?php echo $this->lang->line('label_department_details');?> : </b> </div>
                        <div id="company_details_div" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>> <b>  <?php echo $this->lang->line('label_company_details');?>: </b></div>
                        <div id="organization_details_div"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <b> <?php echo $this->lang->line('label_organization_details');?>: </b></div>
                    </td>                    
                </tr>
            
          <div id="dept_org_no"> 
                <tr>
                 <td>
                    <div id="department_no" <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_department_no');?>:</div>
                    <div id="organization_no" <?php if($org_type=="Organization" || $org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_no');?>:</div>
                </td>
                    <td width="33%"><div id="department_no_field" ><?=form_input($org_number);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_number')); ?></span> </div>   </td>
                </tr>
                <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            </div>   
            <div id="dept_org_company_name" >
                <tr>
                    <td>
                        <div id="department_name"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_name');?>:</div>
                        <div id="company_name" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_name');?>:</div>
                        <div id="organization_name"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_name');?>:</div>
                    </td>
                    <td width="33%"><div id="organization_name_filed"> <?=form_input($org_name);?>
                      </div> <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span></td>
                </tr>
                
            </div>    
            <tr>
                <td width="38%"><font class="inside"><?php //echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_no'); ?></font></td>
                <td width="33%">
                <?// =form_input($org_number);?>
                    <span class="markcolor"><?php //echo ucwords(form_error('org_number')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            
            <tr>
                <td width="38%"><font class="inside"><?php //echo $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_name'); ?></font></td>
                <td width="33%"><? //=form_input($org_name);?>
                    <span class="markcolor"><?php //echo ucwords(form_error('org_name')); ?></span> 
                </td>
            </tr>
            
            <tr>            
                <td width="38%">
                    <div id="department_email"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_email');?>:</div>
                    <div id="company_email" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_email');?>:</div>
                    <div id="organization_email"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_email');?>:</div>
                </td>                
                <td width="33%"><?=form_input($org_email);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_email')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>
            </tr>            
            <tr>
                <td width="38%">
                    <div id="department_web"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_web');?>:</div>
                    <div id="company_web" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_web');?>:</div>
                    <div id="organization_web"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_web');?>:</div>
                </td>
                <td width="33%"><?=form_input($org_web);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_web')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="18%">
                    <div id="department_mobile_phone"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_mobile');?>:</div>
                    <div id="company_mobile_phone" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_mobile');?>:</div>
                    <div id="organization_mobile_phone"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_mobile');?>:</div>
                </td>
                <td width="33%"><?=form_input($org_mobile_phone);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_mobile_phone')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="18%">
                    <div id="department_land_phone"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_land_phone');?>:</div>
                    <div id="company_land_phone" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_land_phone');?>:</div>
                    <div id="organization_land_phone"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_land_phone');?>:</div>
                </td>
                <td width="33%"><?=form_input($org_land_phone);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_land_phone')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="18%">
                    <div id="department_description"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_description');?>:</div>
                    <div id="company_description" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_description');?>:</div>
                    <div id="organization_description"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_description');?>:</div>
                </td>                   
            <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_textarea($org_description);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_description')); ?></span> 
                </td>
            </tr>
            <tr>
            <td width="18%">
                    <div id="department_category"  <?php if($org_type=="Government") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> > <?php echo $this->lang->line('label_department_category');?>:</div>
                    <div id="company_category" <?php if($org_type=="Company") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?>><?php echo $this->lang->line('label_company_category');?>:</div>
                    <div id="organization_category"  <?php if($org_type=="Organization") { ?> style="display:' ';" <?php } else { ?> style="display:none;" <?php } ?> ><?php echo $this->lang->line('label_organization_category');?>:</div>
            </td>   
            <td width="33%">
                <?php $query1 = $this->db->query("select * from org_category where status=2"); ?>
                <select name="org_category" id="org_category" style="width:300px" tabindex="18" onchange="check_value(this.value)">
                <option value=""><?php echo $this->lang->line('label_select'); ?></option>
                <?php foreach ($query1->result() as $info1): ?>
                    <option value="<?php echo $info1->id; ?>"><?php echo $info1->category_name; ?></option>         
                <?php endforeach; ?>
                <option value="other"><?php echo $this->lang->line('label_other'); ?></option>
                </select>
                <span class="markcolor"><?php echo ucwords(form_error('org_category')); ?></span>  
            </td>
        </tr>
        <tr id="a" style="display:none">
            <td width="18%"><font class="inside"></font></td>
            <td width="33%">
            <input type="text"  size="30" maxlength="30" name="category_name" placeholder="<?php echo $this->lang->line('label_write_category_here'); ?>"> 
            <span class="markcolor"><?php echo ucwords(form_error('category_name')); ?></span>
            </td>
        </tr>
            
            
            <tr>
                <td width="38%"><font class="inside"><b><?php echo $this->lang->line('label_org_address'); ?>:</b></font></td>
                <td width="33%"></td>
            </tr>

            <tr>
                <td width="33%"><font class="inside"><?php echo $this->lang->line('label_street_address'); ?>:</font></td>
                    <td width="33%"></td>
            </tr>
            <tr>
                <td width="33%"></td>
                    <td width="33%"><?=form_input($org_street_address);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_street_address')); ?></span> 
                </td>
            </tr>          
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_zip'); ?>:</font></td>
                <td width="33%"><?=form_input($org_zip);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_zip')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_city'); ?>:</font></td>
                <td width="33%"><?=form_input($org_city);?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_city')); ?></span>
                </td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php echo $this->lang->line('label_country'); ?>:</font></td>
                <td width="33%"><?=form_dropdown('org_country',$org_country_option,$org_country,'class="form_input_select"');?>
                    <span class="markcolor"><?php echo ucwords(form_error('org_country')); ?></span>
                </td>
            </tr>
     
            <tr>
                <td width="38%"><font class="inside"><b><?php //echo $this->lang->line('label_bank_payment_info'); ?></b></font></td>
                <td width="33%"></td>
            </tr>
            
            <tr>
                <td width="18%"><font class="inside"><?php //echo $this->lang->line('label_bank_payment')."&nbsp;1"; ?></font></td>
                <td width="18%"><? //=form_input($org_bank_acc_no_one);?>
                    <span class="markcolor"><?php //echo ucwords(form_error('org_bank_acc_no_one')); ?></span>
                </td>
                <td width="18%"><? //=form_dropdown('org_bank_acc_type_one',$org_bank_acc_type_option,$org_bank_acc_type_one,'class="form_input_select"');?>
                    <span class="markcolor"><?php //echo ucwords(form_error('org_bank_acc_type_one')); ?></span>
                </td>
            </tr>
        
        
        </tbody></table>
    
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"> <td><?=form_hidden('package_id', $package_id);?></td>
                <td width="38%"> <td><?=form_hidden('basic_package_selection', $basic_package_selection);?></td>
<td width="33%">
                </td>
            </tr>
            <tr>
                <td width="38%"><td width="33%">
                <?=form_submit($submit);?>   
                 </td>
            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


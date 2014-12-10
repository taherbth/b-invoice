<h3 class="content_edit"><?php echo $this->lang->line('org_system_config_msg');?></h2>
<?php
    
    if($system_configuration){     
    
        if($org_system_config){ 
            $default_preffered_lang = $org_system_config[0]->default_preffered_lang;
            $name_for_customer_or_members = $org_system_config[0]->name_for_customer_or_members;
        }
         $default_preffered_lang_option = array(
            'sv' => $this->lang->line('sv_lang'),
            'engus' =>   $this->lang->line('eng_us_lang') ,
            'enguk' =>   $this->lang->line('eng_uk_lang') ,
            'ger' =>       $this->lang->line('ger_lang') ,
            'nor' =>      $this->lang->line('nor_lang') ,
            'den' =>   $this->lang->line('den_lang'),
            'fin' =>    $this->lang->line('fin_lang')   	         
        );          
        $name_for_customer_or_members= array(
            'name'      => 'name_for_customer_or_members',
            'id'        => 'name_for_customer_or_members',
            'value'     => $name_for_customer_or_members,       
        );
          $custom_label_name= array(
            'name'      => 'custom_label_name[]',
            'id'        => 'custom_label_name',
            'value'     => '',       
        );
        
       
              
        $submit = array(
            'name'    => 'submit',
            'id'      => 'submit',
            'value'   => $this->lang->line('submit_btn'),
            'type'    => 'submit',
        );
?>


<?php echo form_open("organization/info/update_system_configuration"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="form">

<label><?php echo $this->lang->line('label_default_preffered_lang');?>:
<?php    echo form_dropdown('default_preffered_lang',$default_preffered_lang_option,$default_preffered_lang,'class="form_input_select"');?>
<span class="markcolor"><?php echo ucwords(form_error('default_preffered_lang')); ?></span> 
</label>
<label><?php echo $this->lang->line('label_member_or_customer_name');?>:
<?php    echo form_input($name_for_customer_or_members);?>
<span class="markcolor"><?php echo ucwords(form_error('name_for_customer_or_members')); ?></span> 
</label>

<table class="width-100 table-striped">
	<thead>
	<tr>
	<th>Label</th>
	<th>Value</th>
	</tr>
	</thead>
    <tbody>
    
        <div class="clone_label" >
        <?php if($org_system_config){ if($org_system_config[0]->custom_label1) { ?>
          <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">1</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label1;?>"  />
          </tr>
        <?php } if($org_system_config[0]->custom_label2) { ?>
        <tr id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">2</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label2;?>"  />
        </tr>
        <?php } if($org_system_config[0]->custom_label3) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">3</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label3;?>" />
        </tr>
        <?php } if($org_system_config[0]->custom_label4) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">4</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label4;?>"  />
        </tr>
        <?php } if($org_system_config[0]->custom_label5) { ?>
        <tr id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">5</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label5;?>" />
        </tr>
        <?php } if($org_system_config[0]->custom_label6) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">6</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label6;?>"  />
        </tr>
        <?php } if($org_system_config[0]->custom_label7) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">7</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label7;?>" />
        </tr>
        <?php } if($org_system_config[0]->custom_label8) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">8</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label8;?>"  />
        </tr>
        <?php } if($org_system_config[0]->custom_label9) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">9</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label9;?>" />
        </tr>
        <?php } if($org_system_config[0]->custom_label10) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">10</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value="<?php echo $org_system_config[0]->custom_label10;?>"  />
        </tr>
        <?php }  if( empty($org_system_config[0]->custom_label1) && empty($org_system_config[0]->custom_label2) && empty($org_system_config[0]->custom_label3) && empty($org_system_config[0]->custom_label4) && empty($org_system_config[0]->custom_label5)
                        && empty($org_system_config[0]->custom_label6) && empty($org_system_config[0]->custom_label7) && empty($org_system_config[0]->custom_label8) && empty($org_system_config[0]->custom_label9) && empty($org_system_config[0]->custom_label10) ) { ?>
        <tr  id="clone_field" class="trAlter">
            <td class="headerField" ><?php echo $this->lang->line('label_custom_label');?><div id="label_no">1</div></td>
            <td class="inputField">                                            
            <input type="text" name="custom_label_name[]" id="custom_label_name" value=""  />
        </tr><?php }
        
        } ?>
    </div>
    </tbody>
</table>
                    
<span class="btn add_label">+</span>
<span class="btn remove_label">-</span>

<p></p>
<input name="submit" value="Submit" type="submit">

    <?php echo form_close(); ?>
</div>
   <?php } else { ?>  
<div >
 <span style="color:red;"><?php echo $this->lang->line('system_configuration_no_access_msg');?></span>

</div><?php }  ?>

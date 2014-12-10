<h3 class="content_edit">Org Admin Control Panel Modify Organization Info</h2>

<?php
$query = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
foreach ($query->result() as $p_info):
endforeach;
?>
<style>
td a:hover{ color:#990033}
</style>
<?php
$zone = array(
    'name' => 'zone',
    'id' => 'zone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => ''
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
<?php echo form_open_multipart("organization/info/update_organization"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px;  font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><font class="inside">Organization Number:</font></td>
                <td width="33%"><input type="text" style="background-color:#CCCC99" readonly="readonly" readonly="readonly" size="30" maxlength="20"  value="<?php echo $p_info->org_number ;?>" name="org_number" tabindex="1">
                    <span class="markcolor"><?php echo ucwords(form_error('org_number')); ?></span> 
                </td>

            </tr>
             <tr>
                <td width="38%">
                <td width="33%">
                    <span id="availability_status"></span> 
                </td>

            </tr>
            <tr>
                <td width="38%"><font class="inside">Organization Name:</font></td>
                <td width="33%"><input  type="text" style="background-color:#CCCC99" readonly="readonly"  size="30" maxlength="20" value="<?php echo $p_info->org_name ;?>" name="org_name" tabindex="2">
<!--                <a href="<?php //echo base_url(); ?>organization/info/change_org_name/<?php //echo $this->session->userdata('user_id') ;?>"><span style="color:green">Change</span></a>
-->                <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside" style="color:green; font-weight:bold"><b>Responsible Person:</b></font></td>
                <td width="33%"></td>
            </tr>

            <tr>
                <td width="18%"><font class="inside">First Name:</font></td>
                <td width="33%"><input type="text" size="30" maxlength="20" value="<?php echo $p_info->first_name ;?>" name="first_name" tabindex="3" >
                    <span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
                </td>
                <td width="17%"><font class="inside">Last Name:</font></td>
                <td width="32%"><input type="text" value="<?php echo $p_info->last_name ;?>" size="30" maxlength="30" name="last_name" tabindex="4">
                    <span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Phone:</font></td>
                <td width="33%"><input type="text" value="<?php echo $p_info->phone_no ;?>" size="30" maxlength="30" name="phone_no" tabindex="5">
                    <span class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span> 
                </td>
                <td width="17%"><font class="inside">Address:</font></td>
                <td width="32%">
                <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="address"  tabindex="6" value="" cols="20"><?php echo $p_info->address ;?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Email:</font></td>
                <td width="33%"><input type="text"   value="<?php echo $p_info->email ;?>" size="30" maxlength="30" name="email" tabindex="">
<!--                <a href="<?php //echo base_url(); ?>organization/info/change_email/<?php //echo $this->session->userdata('user_id') ;?>"><span style="color:green">Change</span></a>
-->                    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>
                </td>
            </tr>
             <tr>
                <td width="18%"><font class="inside">Username:</font></td>
                <td width="33%"><input type="text"   value="<?php echo $p_info->username ;?>" size="30" maxlength="30" name="username" tabindex="">
<!--                <a href="<?php //echo base_url(); ?>organization/info/change_email/<?php //echo $this->session->userdata('user_id') ;?>"><span style="color:green">Change</span></a>
-->                    <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Person Number:</font></td>
                <td width="33%"><input type="text"   value="<?php echo $p_info->person_number ;?>" size="30" maxlength="30" name="person_number" tabindex="">
<!--                <a href="<?php //echo base_url(); ?>organization/info/change_email/<?php //echo $this->session->userdata('user_id') ;?>"><span style="color:green">Change</span></a>
-->                    <span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside" style="color:green; font-weight:bold"><b>Organization Info:</b></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Primary Address:</font></td>
                <td width="33%">
              <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="org_primary_address"  tabindex="6" value="" cols="20"><?php echo $p_info->org_primary_address ;?></textarea>

                    <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span>
                </td>
                <td width="17%"><font class="inside">Optional Address:</font></td>
                <td width="32%">
              <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="org_optional_address"  tabindex="6" value="" cols="20"><?php echo $p_info->org_optional_address ;?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('org_optional_address')); ?></span>
                </td>
               
              
            </tr>
            <tr>
                <td width="18%"><font class="inside">Organization Phone:</font></td>
                <td width="33%"><input type="text"  value="<?php echo $p_info->org_phone ;?>" size="30" maxlength="30" name="org_phone" tabindex="10">
                    <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span>
                </td>

            </tr>
             <tr>
                <td width="18%"><font class="inside">Bank Info:</font></td>
                <td width="33%">
              <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="bank_info"  tabindex="6" value="" cols="20"><?php echo $p_info->bank_info ;?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span>
                </td>

            </tr>
            <tr>
                <td width="28%"><font class="inside"></font></td>
                <td width="33%">
                  
                </td>
            </tr>
            <tr>
                <td width="28%"><font class="inside">Organization Logo:</font></td>
                <td width="33%"><input type="file" size="30"  name="photo1">
                    <span class="markcolor"><?php echo ucwords(form_error('photo1')); ?></span> 
                </td>
                 <td width="33%">
            <?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $p_info->photo1 . ' width="100" /> '; ?>

                </td>
            </tr>
             
            <tr>
                <td width="38%"><font class="inside"></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="38%"><font class="inside" style="color:green; font-weight:bold"><b>Credit Card Info:</b></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Card No:</font></td>
                <td width="33%"><input type="text" value="<?php echo $p_info->card_no ;?>" size="30" maxlength="30" name="card_no" tabindex="11"></td>
                <td width="17%"><font class="inside">Expire Date:</font></td>
                <td width="32%"><input type="text" value="<?php echo $p_info->expire_date ;?>" size="30" maxlength="30" name="expire_date" id="expire_date" tabindex="12"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">cvv2 no:</font></td>
                <td width="33%"><input type="text" value="<?php echo $p_info->cvv2_no ;?>"  size="30" maxlength="30" name="cvv2_no" tabindex="13"></td>
                <td width="17%"><font class="inside">name on card:</font></td>
                <td width="32%"><input type="text" value="<?php echo $p_info->name_on_card ;?>"  size="30" maxlength="30" name="name_on_card" tabindex="14"></td>
            </tr>
        </tbody></table>
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
         <script>
 function check_value()
	{
	   var myvar = document.getElementById("org_type").value;
	   if(myvar==01)
	   {
			$("#a").show();
	   }
	   else
	   {
			$("#a").hide();
	   }
   }
</script>
            <tr>
                <td width="18%" style="vertical-align:middle"><font class="inside">Description of org:</font></td>
                <td width="33%">
              <textarea rows="4" style="background: none repeat scroll 0 0 #CCCCCC;" name="description"   value="" cols="40"><?php echo $p_info->description ;?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('description')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Organization Category:</font></td>
                <td width="33%">
                    <?php $query1 = $this->db->query("select * from org_type where status=2"); ?>
                    <select name="org_type" id="org_type" style="width:300px" tabindex="18" onchange="check_value(this.value)">
                        <option value="">Select</option>
                        <?php foreach ($query1->result() as $info1): ?>                       
              
               <option <?php if ($p_info->org_type == $info1->id): ?> selected="selected" value="<?php echo $p_info->org_type; ?>" <?php else: ?> value="<?php echo $info1->id; ?>"<?php endif; ?>><?php echo $info1->org_type; ?></option>         
                        <?php endforeach; ?>
                           <option value="01">Other</option>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('org_type')); ?></span>  

                </td>

            </tr>
             <tr id="a" style="display:none">
                <td width="18%"><font class="inside">Category Name:</font></td>
                <td width="33%">
               
                   <input type="text"  size="30" maxlength="30" name="category_name" > 
                   <span class="markcolor"><?php echo ucwords(form_error('category_name')); ?></span>
                </td>

            </tr>

        </tbody></table>



    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">


                </td>

            </tr>
            <tr>
                <td width="38%"><td width="33%">
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Update" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


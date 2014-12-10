<h3 class="content_edit"><?php echo $this->lang->line('new_customer_registration_msg');?></h2>
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

<?php echo form_open("main/added_org"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; margin-left:10px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" style="" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><font class="inside">Organization Number:</font></td>
                <td width="33%"><input type="text" size="30" maxlength="20" onblur="getSubCat1(this.value)" value="<?php echo set_value('org_number'); ?>" name="org_number" tabindex="1">
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
                <td width="33%"><input type="text" size="30" maxlength="20" value="<?php echo set_value('org_name'); ?>" name="org_name" tabindex="2">
                    <span class="markcolor"><?php echo ucwords(form_error('org_name')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><b>Admim User:</b></font></td>
                <td width="33%"></td>
            </tr>

            <tr>
                <td width="18%"><font class="inside">First Name:</font></td>
                <td width="33%"><input type="text" size="30" maxlength="20" value="<?php echo set_value('first_name'); ?>"name="first_name" tabindex="3" >
                    <span class="markcolor"><?php echo ucwords(form_error('first_name')); ?></span> 
                </td>
                <td width="17%"><font class="inside">Last Name:</font></td>
                <td width="32%"><input type="text" value="<?php echo set_value('last_name'); ?>" size="30" maxlength="30" name="last_name" tabindex="4">
                    <span class="markcolor"><?php echo ucwords(form_error('last_name')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Phone:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('phone_no'); ?>" size="30" maxlength="30" name="phone_no" tabindex="5">
                    <span class="markcolor"><?php echo ucwords(form_error('phone_no')); ?></span> 
                </td>
                <td width="17%"><font class="inside">Address:</font></td>
                <td width="32%">
                    <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="address"  tabindex="6" value="" cols="20"><?php echo set_value('address'); ?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Email:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('email'); ?>" size="30" maxlength="30" name="email" tabindex="7">
                    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>
                </td>
            </tr>
             <tr>
                <td width="18%"><font class="inside">Username:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('username'); ?>" size="30" maxlength="30" name="username" tabindex="7">
                    <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span>
                </td>
            </tr>
             <tr>
                <td width="18%"><font class="inside">Person Number:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('person_number'); ?>" size="30" maxlength="30" name="person_number" tabindex="7">
                    <span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><b>Organization Address:</b></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Primary Address:</font></td>
                <td width="33%">
                    <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="org_primary_address"  tabindex="6" value="" cols="20"><?php echo set_value('org_primary_address'); ?></textarea>

                    <span class="markcolor"><?php echo ucwords(form_error('org_primary_address')); ?></span>
                </td>
                <td width="17%"><font class="inside">Optional Address:</font></td>
                <td width="32%">
                    <textarea rows="2" style="background: none repeat scroll 0 0 #CCCCCC;" name="org_optional_address"  tabindex="6" value="" cols="20"><?php echo set_value('org_optional_address'); ?></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('org_optional_address')); ?></span>
                </td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Organization Phone:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('org_phone'); ?>" size="30" maxlength="30" name="org_phone" tabindex="10">
                    <span class="markcolor"><?php echo ucwords(form_error('org_phone')); ?></span>
                </td>

            </tr>
            <tr>
                <td width="38%"><font class="inside"></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="38%"><font class="inside"><b>Credit Card Info:</b></font></td>
                <td width="33%"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Card No:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('card_no'); ?>" size="30" maxlength="30" name="card_no" tabindex="11"></td>
                <td width="17%"><font class="inside">Expire Date:</font></td>
                <td width="32%"><input type="text" value="<?php echo set_value('expire_date'); ?>" size="30" maxlength="30" name="expire_date" id="expire_date" tabindex="12"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">cvv2 no:</font></td>
                <td width="33%"><input type="text" value="<?php echo set_value('cvv2_no'); ?>" size="30" maxlength="30" name="cvv2_no" tabindex="13"></td>
                <td width="17%"><font class="inside">name on card:</font></td>
                <td width="32%"><input type="text" value="<?php echo set_value('name_on_card'); ?>" size="30" maxlength="30" name="name_on_card" tabindex="14"></td>
            </tr>
            <tr>
                <td width="18%"><font class="inside">Password Receiving By:</font></td>
                <td width="33%">
                    Email:
                    <input type="radio" value="1"  name="password_receive" tabindex="15">
                    Phone:
                    <input type="radio" value="2"  name="password_receive" tabindex="16">
                    <span class="markcolor"><?php echo ucwords(form_error('password_receive')); ?></span></td>
            </tr>


        </tbody></table>
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
             <tr>
                <td width="18%" style="vertical-align: middle;"><font class="inside">Description Of Org:</font></td>
                <td width="33%">
                    
                    <textarea rows="3" style="background: none repeat scroll 0 0 #CCCCCC;" name="description"  tabindex="6" value="" cols="34"></textarea>
                    <span class="markcolor"><?php echo ucwords(form_error('description')); ?></span>

                </td>

            </tr> 
           
            <tr>
                <td width="18%"><font class="inside">Package Name:</font></td>
                <td width="33%">
                    <?php $query = $this->db->query("select * from package"); ?>
                    <select name="package_name" style="width:300px" tabindex="17">
                        <option value="">Select</option>
                        <?php foreach ($query->result() as $info): ?>
                            <option value="<?php echo $info->id; ?>">Package(<?php echo $info->package_name; ?>)Duration(<?php echo $info->duration; ?> Year),Amount(<?php echo $info->amount; ?>),Currency(<?php echo $info->currency; ?>),No of member(<?php echo $info->no_of_member; ?>)</option>

                        <?php endforeach; ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span>    

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
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

                </td>

            </tr>

        </tbody></table>  
    <?php echo form_close(); ?>
</div>


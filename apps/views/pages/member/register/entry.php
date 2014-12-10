<h3 class="content_edit">Org Admin Control Panel New Member Registration</h2>
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
    .style1 {color: #FF3333}
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
<?php echo form_open("organization/info/added_member"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
           
           <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Member Title:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("member_title"); ?>" name="member_title" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('member_title')); ?></span> 
                </td>
            </tr>
            
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>
            </tr>
            
           <tr style="top:20px">
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Name:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("name"); ?>" name="name" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
                </td>

            </tr>
           <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Membership Expire Date:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("expire_date"); ?>" name="expire_date"  id="expire_date" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Address:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("address"); ?>"   name="address" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Phone:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("phone"); ?>" name="phone" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Email:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px; height:21px" value="<?php echo set_value("email"); ?>" name="email" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Profile Message:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px; height:21px"  value="<?php echo set_value("profile"); ?>" name="profile_message" tabindex="">
                    <span class="markcolor"><?php echo ucwords(form_error('profile')); ?></span> 
                </td>
            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%"style="text-align:left; padding-left:190px"><font class="inside">Person Number:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px;height:21px" value="<?php echo set_value("person_number"); ?>" name="person_number" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('person_number')); ?></span> 
                </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Bank Info:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px; height:21px"  value="<?php echo set_value("bank_info"); ?>" name="bank_info" tabindex="">

                    <span class="markcolor"><?php echo ucwords(form_error('bank_info')); ?></span> 
                </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">HouseHold Size:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px; height:21px"  value="<?php echo set_value("household_size"); ?>" name="household_size" tabindex="">
                    <span class="markcolor"><?php echo ucwords(form_error('household_size')); ?></span></td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
           
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Group:</font></td>
                <td width="33%">
            <?php echo form_dropdown('member_group', $OptionsGroup, set_value('member_group'), 'style="width:190px;"'); ?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('member_group')); ?></span> </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">User Type:</font></td>
                <td width="33%">
            <?php echo form_dropdown('user_type', $OptionsClient, set_value('user_type'), 'style="width:190px;"'); ?>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('user_type')); ?></span> </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Username:</font></td>
                <td width="33%">
                    <input type="text" style="width:180px; height:21px"  value="<?php echo set_value("username"); ?>" name="username" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> </td>

            </tr>
             <tr>
                <td width="38%" style="text-align:right; padding-top:5px"></td>
                <td width="33%">
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:left; padding-left:190px"><font class="inside">Password:</font></td>
                <td width="33%">

                    <input type="password" style="width:180px; height:21px"  name="password" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span></td>

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


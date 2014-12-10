<h3 class="content_edit">Member Control Panel  Post New article</h2>
<style>
    input,textarea {
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
        new JsDatePick({
            useMode:2,
            target:"date_of_creation",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script>
function check($id)
{
	var myvar = document.getElementById("member_check"+$id).checked;
	if(myvar)
	{
		$("#member"+$id).show();
		$("#group_check"+$id).attr("disabled",true);
	}
	else
	{
		$("#member_id"+$id+":checked").each(function(){
			this.checked = false;
		});

		$("#group_check"+$id).removeAttr("disabled");
		$("#member"+$id).hide();							   
	}
}
function check1($id)
{
	var myvar = document.getElementById("group_check"+$id).checked;
	if(myvar)
	{
		$("#member_check"+$id).attr("disabled",true);
	}
	else
	{
		$("#member_check"+$id).removeAttr("disabled");
	}
}
</script>
<?php echo form_open("org_member/info/added_post"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="764" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
<tbody>
            <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside"> Title:</font></td>
          <td width="400">
    <input type="text" style="width:200px;height:21px" value="" name="title" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span> 
                </td>

      </tr>
              <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>
            <tr>
                <td width="341" style="text-align:left; padding-left:250px ;vertical-align:middle"><font class="inside">Text:</font></td>
          <td width="400">
    <textarea name="text" rows="5" cols="40"></textarea>
                    
                    <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span> 
                </td>
      </tr>
              <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>

            <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside">Date of Creation:</font></td>
          <td width="400">
    <input type="text" style="width:200px; height:21px"  value="" name="date_of_creation" id="date_of_creation" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('date_of_creation')); ?></span> 
                </td>
      </tr>
              <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>

            <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside">Importance:</font></td>
          <td width="400">
  <select name="importance" style="width:200px;">
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('importance')); ?></span> 
                </td>

      </tr>
              <tr>
                <td style="text-align:left; padding-top:5px"></td>
                 <td></td>
              </tr>
            <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside">Expire Date:</font></td>
          <td width="400">
    <input type="text" style="width:200px; height:21px"  value="" name="expire_date" id="expire_date" tabindex="">

                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                </td>

      </tr>
           <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside"> Article :</font></td>
                <td width="400">
                   <input type="checkbox" name="send_article" value="1" />Send Article
                   <input type="checkbox" name="send_notification" value="2" />Send Notification
                   
                   
                    <input type="radio" name="send_by" value="1" />Email 
                    <input type="radio" name="send_by" value="2" />Sms 
                    <input type="radio" name="send_by" value="3" />Real Letter 
                    <span class="markcolor"><?php echo ucwords(form_error('send_by')); ?></span> 
                </td>
      </tr>
       <tr>
                <td width="341" style="text-align:left; padding-left:250px"><font class="inside"> </font></td>
                <td width="400">
                    <input type="radio" name="send_by" value="1" />Email 
                    <input type="radio" name="send_by" value="2" />Sms 
                    <input type="radio" name="send_by" value="3" />Real Letter 
                    <span class="markcolor"><?php echo ucwords(form_error('send_by')); ?></span> 
                </td>
      </tr>
     <?php $q = $this->db->query("select * from org_group where org_id='".$this->session->userdata('member_org')."'"); ?>
        <tr>
          <td width="341" style="text-align:left; padding-left:250px">Send To:<span class="style1">* </span></td>
        <td ">
            <?php
            foreach ($q->result() as $info):
					$m3=$this->db->query("select * from member where member_group='".$info->id."'");
					if($m3->num_rows()>0): 
					?>
                    <p><span style="color:green; font-size:14px; text-align:right; font-weight:bold">
                      <?php echo $info->group_name; ?>:</p>
                    <p>
                      <input type="checkbox" id="member_check<?php echo $info->id; ?>"  onClick="return check(this.value);"  value="<?php echo $info->id; ?>" />Select Member
                      Or <input type="checkbox" id="group_check<?php echo $info->id; ?>" onClick="return check1(this.value)"  name="checkbox1[]" value="<?php echo $info->id; ?>"/>All 
                    </p>
                    <?php
					$a = $info->id;
					$m=$this->db->query("select * from member where member_group='".$a."'"); 
					?>
                   
					<div  id="member<?php echo $info->id; ?>" style="display:none; position:relative; width:300px; background-color:#999999; color:white; font-weight:bold; padding-left:3px;">
						<?php foreach ($m->result() as $info1): ?>
							<p><input type="checkbox" name="checkbox[]" id="member_id<?php echo $info->id; ?>"    value="<?php echo $info1->id; ?>" /><?php echo $info1->name; ?> </p>
						<?php endforeach; ?> 
					</div>
                   
                    
           <?php endif;endforeach; ?>
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


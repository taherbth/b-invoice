<h3 class="content_edit">Member Control Panel Contact with Organization Member
</h3>
<style>

.c {
    background-color: #E0EAF1;
    color: #3E6D8E;
    font-size: 12px;
    height: 30px;
    text-decoration: none;
    white-space: nowrap;
}
c:hover{background-color:#DB9148}
h3 a:hover{text-decoration:none; }
</style>
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

<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("org_member/letter/added_message"); ?>
    <?php echo $this->session->flashdata('message'); ?>
     Sender Name<br>
    <input name="name" class="form_normal" value="<?php echo $this->session->userdata("name");?>" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
    <br>
   Sender Email<br>
    <input name="email" class="form_normal" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span> 
    <br>
   
      Subject<br>
    <input name="subject" class="form_normal" type="text">
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('subject')); ?></span> 
    <br>
     Message<br>
      <textarea rows="7" cols="50" name="message" style="border: 1px solid #CCCCCC;"></textarea>
   
    <br>
    <span class="markcolor"><?php echo ucwords(form_error('message')); ?></span> 
    <br>
    Attachment<br>
    <input name="photo" class="" type="file" style="border: 1px solid #CCCCCC;">
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('photo1')); ?></span> 
    <br><br> 
     Send To<br>
    <table>
    <?php $q = $this->db->query("select * from org_group where org_id='".$this->session->userdata('member_org')."'"); ?>
        <tr>
        <td valign="top" style="padding-top:12px; padding-left:30px"><span class="style1">* </span></td>
        <td>
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
					<div  id="member<?php echo $info->id; ?>" style="display:none; width:250px; background-color:#999999; color:white; font-weight:bold; padding-left:30px;">
						<?php foreach ($m->result() as $info1): ?>
                           <?php if($info1->id !=$this->session->userdata("id")):?>
							<p><input type="checkbox" name="checkbox[]" id="member_id<?php echo $info->id; ?>"    value="<?php echo $info1->id; ?>" /><?php echo $info1->name; ?> </p>
						<?php endif;endforeach; ?> 
					</div>
                    
           <?php endif;endforeach; ?>
        </td>
    </tr>  
    </table> 
    <br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
	</div>
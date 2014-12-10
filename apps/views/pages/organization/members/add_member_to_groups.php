<h3 class="content_edit"><?php echo $this->lang->line('previlization_settings_org_mem_msg');?></h3>

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
    $member_assigned_id = array();
    $group_info = $this->info_model->get_org_mem_group_info($group_id);
    if($group_info){
         $group_name = $group_info[0]->group_name;
    }
    $index = 0;
    if($assigned_member){
        foreach($assigned_member as $rows){
            $member_assigned_id = explode(",",$rows->assigned_mem_id);            
            $index++;
        }
    }

?>

   

    <?php echo form_open("organization/info/update_member_to_group"); ?>
    <?php echo $this->session->flashdata('message'); ?>

        <table class="width-100">
            <input type="hidden" name="group_id" value="<?php echo $group_id; ?>" />
<tr>
<td><h4><?php echo $this->lang->line('label_group_name');?></h4></td>
<td width="50%"><?php echo $group_name; ?></td>
</tr>
                        <tr>
                            <td><strong><?php echo $this->lang->line('label_group_members');?></strong></td>
                            <td>
                                <input  type="checkbox"  onClick="checkAll(this)"> <?php echo $this->lang->line('label_all');?>
                            </td>
                        </tr>
                        
                        <?php if ($all_members) {
                                        foreach ($all_members as $info){
                         ?>
                        <tr>
                            <td><font class="inside"><?php echo $info->first_name."&nbsp;".$info->last_name;?></font></td>
                            <td>
                                    <?php if(in_array($info->mem_id, $member_assigned_id)) { ?>
                                        <input id="x" type="checkbox"  name="member_id[]"  checked="checked" value="<?php echo $info->mem_id;?>" />
                                    <?php } else{  ?>
                                        <input id="x" type="checkbox"  name="member_id[]"  value="<?php echo $info->mem_id;?>" />
                                    <?php }  ?>
                            </td>
                            
                        </tr>
                        <?php } } ?>
                        
                        <?php if ($all_non_ac_members) { 
                                        foreach ($all_non_ac_members as $non_ac_info){
                         ?>
                        <tr>
                            <td><font class="inside"><?php echo $non_ac_info->attention;?>&nbsp;&nbsp;(<?php echo $this->lang->line('label_non_ac_member');?>)</font></td>
                            <td>
                                    <?php if(in_array($non_ac_info->mem_id, $member_assigned_id)) { ?>
                                        <input id="x" type="checkbox"  name="member_id[]"  checked="checked" value="<?php echo $non_ac_info->mem_id;?>" />
                                    <?php } else{  ?>
                                        <input id="x" type="checkbox"  name="member_id[]"  value="<?php echo $non_ac_info->mem_id;?>" />
                                    <?php }  ?>
                            </td>
                            
                        </tr>
                        <?php } } ?>

            </tbody></table>
				<input type="submit" value="Update" />


    <?php
    echo form_close();

?>
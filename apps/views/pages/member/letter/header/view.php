<h3 class="content_edit">Member Control Panel  View Letter Header</h2>

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
    .inside{}
    ul{ list-style:none}
	 legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
</style>
<script language="javascript">
    function confirmSubmit() {
        var agree=confirm("Are you sure to delete this record?");
        if (agree)
            return true;
        else
            return false;
    }
</script>
<?php echo $this->session->flashdata('message'); ?>
<?php   $query = $this->db->query("select * from letter_header where org_id='" .$this->session->userdata('member_org') . "' order by id desc");?>

<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 916px;">
     <fieldset>
      <legend align="left">View Letter Header</legend>

<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
            <tbody>
                 <tr>
                    <th> ID</th>
                    <th>Header Title</th>              
                    <th>Content</th>
                     <th>Action</th>
                </tr>
           <?php 
		   $i=1;
		   foreach ($query->result() as $package_info) {
            if ($i % 2 == 0): $color = "#FFFFFF";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $package_info->id; ?></td>              
                <td align="center" width="8%"><?php echo $package_info->title; ?></td>               
                <td align="center" width="8%"><?php echo $package_info->text; ?></td>  
                <td align="center" width="12%" style="padding-top:8px">
                <?php if($this->session->userdata('id')==$package_info->member_id):?>
                 <a href="<?php echo base_url(); ?>org_member/letter/header_edit/<?php echo $package_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>org_member/letter/header_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a>
                 <?php endif;?>
               </td> 
                </tr>             
           
            <?php
            $i = $i + 1;
        }
   
    ?>
           
            </tbody></table> 

        </table>

</fieldset>
    </div></div>
  
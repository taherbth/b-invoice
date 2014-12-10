<style>
*{ font-size:12px}
</style>
<?php $a=array(
'name'=>'langForm',
'id'=>'langForm'
);?>

<span style=" float:right; margin-top:-20px">
 <a href="<?php echo base_url(); ?>admin/info/datewise_search">    
 <button name="archive" value="archive">Search By Date </button></a>
 <a href="<?php echo base_url(); ?>admin/info/view_organisation_message">    
 <button name="archive" value="archive">Inbox </button></a>
<a href="<?php echo base_url(); ?>admin/info/view_letter" title="Log out">
 <button name="archive" value="archive">Letter </button>
</a>
<a href="<?php echo base_url(); ?>admin/backend/logout" title="Log out">
 <button name="archive" value="archive">Logout </button>
</a>
</span>
<div style="float: right; padding-top: 0px; padding-right: 0px; font-size: 12px; color: rgb(102, 102, 102);">
  <?php   
/*    $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
      $rowcount = $query->num_rows();
	  if($rowcount==0):$rowcount="";else:$rowcount=$rowcount;endif;
*/	?>
    
    <a href="<?php echo base_url(); ?>admin/info/view_organisation_message">    
      <!--  <div style="width:100px" class="t1">
        <span style="color:red; font-size:15px; font-weight:bold; padding-left:12px "><?php// echo $rowcount;?></span> 
      </div>-->
   </a> 
</div>
<a href="<?php echo base_url(); ?>organization/info/view_mainboard" >Company logo will go here</a><br><br><br>
<div id="menu">
    <div style="float: left;">
        <ul>
             <li><a href="<?php echo base_url(); ?>admin/backend/user"><span>User</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/info/add_package"><span>Create Package</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/info/add_zone"><span>Create Area</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/info/add_cost"><span>Cost Setting</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/backend/change_password"><span>Password Change</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/info/view_register_org"><span>View Organization </span></a></li> 
             <li><a href="<?php echo base_url(); ?>admin/info/view_previlige"><span>Previlization Settings</span></a></li>  
             <li><a href="<?php echo base_url(); ?>admin/info/add_org_type"><span>Create Org Type</span></a></li>
             <li><a href="<?php echo base_url(); ?>admin/info/view_org_bill"><span>Billing</span></a></li>

        </ul>	
    </div>
</div>
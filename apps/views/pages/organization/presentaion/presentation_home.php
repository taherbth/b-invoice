<?php 
$query=$this->db->query("select * from user_info where id ='".$this->session->userdata("orgid")."'");
foreach($query->result() as $temp):
$org_name=$temp->org_name;
endforeach;?>
<p style="margin-top:70px; font-size:14px; font-weight:bold; padding-left:30px ">Welcome to <?php echo $org_name;?></p>

 


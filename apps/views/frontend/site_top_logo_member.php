<div style="position:relative;">
    <div id="colorchanger">
        <a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
        <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
        <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
    </div>
</div>
<!--LOGO-->
<div class="grid_8" id="logo">Online Association Board
    &nbsp; &nbsp;
 <?php
  $query1 = $this->db->query("select org_name from user_info where id='" . $this->session->userdata("member_org") . "'");
 foreach($query1->result() as $t):
     $org_name=$t->org_name;
 endforeach;
  ?>
<span style="font-size:12px; font-weight: bold;">
  <a href="<?php echo base_url(); ?>org_member/info/view_presentation/<?php echo $this->session->userdata("member_org");?>">
 <?php  echo ucfirst($org_name);?>
  </a>

</span> 
</div>
<div class="grid_8">
    <!-- USER TOOLS START -->      
<!--    <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#">Admin Username</a> |  <a href="<?php echo base_url(); ?>admin/backend/logout">Logout</a></span></div>
    -->  
    <?php
    $query = $this->db->query("select * from contact_info where receiver_id='" . $this->session->userdata("id") . "'and message_status=2 and flag=2");
    $c = $query->num_rows();
    ?> 

    <div id="user_tools"><span>

            <a href="<?php echo base_url(); ?>org_member/letter/view_inbox"><?php if ($c > 0):echo "Inbox($c)";
    else:echo "Inbox";
    endif; ?></a> || <a href="<?php echo base_url(); ?>org_member/letter/compose_message">Contact</a> || <a href="<?php echo base_url(); ?>home/logout">Logout</a>

        </span></div>
</div>
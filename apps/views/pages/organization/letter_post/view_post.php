<h3 class="content_edit">Org Admin Control Panel View All lettter request from Member</h2>
<style>
    .SearchListing{
        border-bottom: 1px solid #C4C4C4;
        border-left: 1px solid #C4C4C4;
        border-right: 1px solid #C4C4C4;
        border-top: 1px solid #C4C4C4;
        margin-bottom:15px; 
        margin-top:20px;
        -moz-border-radius: 15px 15px 15px 15px;
    }
    .SearchListing p{ padding-left:10px; text-align:left}
</style>
<?php echo $this->session->flashdata('message'); ?>
<?php
$query = $this->db->query("select * from letter where org_id ='" . $this->session->userdata('user_id') . "'and admin_status=1");
foreach ($query->result() as $letter_info):

    $query85 = $this->db->query("select name from member where id='" . $letter_info->sender_name . "'");
    foreach ($query85->result() as $m_name):
        $name = $m_name->name;
    endforeach;
    ?>

    <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
        <p><b>Sender Name:</b> <?php echo $name; ?></p>
        <?php if(!empty($letter_info->letter_header)):
			  $h1=$this->db->query("select * from letter_header where id='" .$letter_info->letter_header . "'");
			  foreach($h1->result() as $h3):
			    $header_content=$h3->text;
			  endforeach;?>
			
            <p><b>Letter Header:</b> <?php echo $header_content; ?></p>
            
            <?php endif;?>
        <p><b>Letter Title:</b> <?php echo $letter_info->title; ?></p>
        <p><b>Letter Message: </b> <?php echo $letter_info->text; ?></p>
        <?php if(!empty($letter_info->letter_footer)):
			  $h5=$this->db->query("select * from letter_footer where id='" .$letter_info->letter_footer . "'");
			  foreach($h5->result() as $h6):
			    $footer_content=$h6->text;
			  endforeach;?>
			
            <p><b>Letter Footer:</b> <?php echo $footer_content; ?></p>
            
            <?php endif;?>
        
        <p><b>Send To: </b> </p>
        <?php if ($letter_info->letter_status == '2'): ?> 
            <ul>
                <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $letter_info->id . "'"); ?>
                <?php
                foreach ($q->result() as $p):
                    $query851 = $this->db->query("select * from address_list where id='" . $p->member_id . "'");
                    foreach ($query851->result() as $m_name1):
                        $name = $m_name1->address_title;
                        $address = $m_name1->address;
                    endforeach;
                    ?>
                    <li style="width:420px; float:left; position:relative;">
                        <span style="width:200px; float:left; position:relative; left:7px"> <?php echo $name; ?></span>
                        <span style="width:210px; float:left; position:relative"><?php echo $address; ?> </span>

                    </li>
                <?php endforeach; ?>
            </ul>            
        <?php else: ?>
            <ul>
                <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $letter_info->id . "'"); ?>
                <?php
                foreach ($q->result() as $p):
                    $query851 = $this->db->query("select * from member where id='" . $p->member_id . "'");
                    foreach ($query851->result() as $m_name1):
                        $name = $m_name1->name;
                        $address = $m_name1->address;
                    endforeach;
                    ?>
                    <li style="width:420px; float:left; position:relative;">
                        <span style="width:200px; float:left; position:relative; left:7px"> <?php echo $name; ?></span>
                        <span style="width:210px; float:left; position:relative"><?php echo $address; ?> </span>

                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <p style="clear:both"> <a href="<?php echo base_url(); ?>organization/info/approve_member_letter/<?php echo $letter_info->id; ?> " title="Edit the Content">
                <img src="<?php echo base_url(); ?>public/images/approve.png" alt="" border="0">
            </a>&nbsp;&nbsp;&nbsp;
            <a  href="<?php echo base_url() ?>organization/info/deny_member_letter/<?php echo $letter_info->id; ?>" title="">
                <img src="<?php echo base_url(); ?>public/images/deny.png" alt="" border="0">
            </a></p>
    </div>
<?php endforeach; ?>






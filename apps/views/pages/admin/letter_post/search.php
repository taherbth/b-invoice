<h3 class="content_edit">Admin Control Panel Search By Title </h2>
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
<p style="width:900px;text-align:right">


    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $query = $this->db->query("select * from letter where title Like'%$record1%'");
    if ($query->num_rows() > 0):
        foreach ($query->result() as $l):
            $org_id = $l->org_id;
            $letter_id = $l->id;
            $query0 = $this->db->query("select *  from user_info where id ='" . $org_id . "'");
            foreach ($query0->result() as $letter_info1):
                $organization_name = $letter_info1->org_name;
                $org_number = $letter_info1->org_number;
            endforeach;
            /* $query85 = $this->db->query("select name from member where id='" . $l->sender_name . "'");
              foreach ($query85->result() as $m_name):
              $name = $m_name->name;
              endforeach; */
            ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >

            <p><span style="float:left; width:600px;"><b>Org Name:</b> <?php echo $organization_name; ?></span>
                <span style="float:right; width:300px;">
                    <?php if ($l->superadmin_status == '1'): ?>
                        <a href="<?php echo base_url(); ?>admin/info/deliver_member_letter/<?php echo $l->id; ?> " title="Edit the Content">
                            <button name="archive" value="archive">Deliver</button>
                        </a>
                    <?php else: ?>
                        <button name="" disabled="disabled" value="archive">Delivered</button>
                    <?php endif; ?>
                    &nbsp;&nbsp;&nbsp;
                    <a  href="<?php echo base_url() ?>admin/info/archive_member_letter/<?php echo $l->id; ?>" title="">
                        <button name="archive" value="archive">Archive</button>
                    </a>
                    <a  href="<?php echo base_url() ?>admin/info/print_letter/<?php echo $l->id; ?>" title="">
                        <button name="archive" value="archive">Print</button>
                    </a>
                </span>
            </p>
            <p style="clear:both"><b>Org Number:</b> <?php echo $org_number; ?></p>         
            <p><b>Letter Title:</b> <?php echo $l->title; ?></p>
            <p><b>Letter Message: </b> <?php echo $l->text; ?></p>
            <p><b>Send To: </b> </p>
            <?php if ($l->letter_status == '2'): ?> 
                <ul>
                    <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $l->id . "'"); ?>
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
                    <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $l->id . "'"); ?>
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
                </ul>
            <?php endif; ?>

            <p style="clear:both"> 
            </p>
        </div>
    <?php endforeach;
else: ?>

    <p style="color:red; font-size:14px"><?php echo "Sorry your Search Produces no result.Please Try again"; ?> </p>
<?php
endif;
?>

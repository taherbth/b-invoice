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
$cdate = date("Y-m-d");
$query = $this->db->query("select * from member_post where org_id ='" .
                $this->session->userdata('user_id') . "'");
//print_r($query);die();
foreach ($query->result() as $post_info):
    if (date("Y-m-d") > $post_info->expire_date):
        $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
        ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
            <p><b>Posted By:</b> <?php echo $name; ?></p>
            <p><b>Title:</b> <?php echo $post_info->title; ?></p>
            <p><b>Message: </b> <?php echo $post_info->text; ?></p>
            <p><b>Expire Date: </b> <?php echo $post_info->expire_date; ?></p>
        </div>
        <?php endif;
endforeach; ?>






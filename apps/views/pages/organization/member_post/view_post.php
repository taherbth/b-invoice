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
$query = $this->db->query("select * from member_post where org_id ='" . $this->session->userdata('user_id') . "'and status=1");
foreach ($query->result() as $post_info):
    $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
    foreach ($query85->result() as $m_name):
        $name = $m_name->name;
    endforeach;
    ?>
    <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
        <p><b>Posted By:</b> <?php echo $name; ?></p>
        <p><b>Title:</b> <?php echo $post_info->title; ?></p>
        <p><b>Message: </b> <?php echo $post_info->text; ?></p>
        <p> <a href="<?php echo base_url(); ?>organization/info/approve_member_post/<?php echo $post_info->id; ?> " title="Edit the Content">
                <img src="<?php echo base_url(); ?>public/images/approve.png" alt="" border="0">
            </a>&nbsp;&nbsp;&nbsp;
            <a  href="<?php echo base_url() ?>organization/info/deny_member_post/<?php echo $post_info->id; ?>" title="">
                <img src="<?php echo base_url(); ?>public/images/deny.png" alt="" border="0">
            </a></p>
    </div>
<?php endforeach; ?>






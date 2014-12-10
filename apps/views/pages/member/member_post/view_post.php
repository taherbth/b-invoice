<h3 class="content_edit">Post Request</h3>
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
    #r{

        border-bottom: 1px dotted #999999;
        float: left;
        overflow: hidden;
        width: 730px;


    }
</style>
<?php echo $this->session->flashdata('message'); ?>
<?php
$query = $this->db->query("select * from member_post where org_id ='" . $this->session->userdata('member_org') . "'and status=1");
//retrive all unapprove article
foreach ($query->result() as $post_info):
    //retrive posted member name and usertype
    $name = "";
    $query85 = $this->db->query("select * from member where id='" . $post_info->created_by . "'");
    foreach ($query85->result() as $m_name):
        $name = $m_name->name;
        $posted_member_utype = $m_name->user_type;
    endforeach;
    //end
    $query1 = $this->db->query("select * from member_previlige where user_type ='" . $this->session->userdata('user_type') . "'");
    foreach ($query1->result() as $previlize) {
        $mainboard = $previlize->mainboard_access_main;
        $mainboard_change_article = $previlize->mainboard_change_article;
    }
    if ($mainboard_change_article == '1'):
        ?>
        
        <div id="r" style="padding-left:50px; font-size:16px; padding-bottom:7px; margin-bottom:15px;  font-weight:bold">
            <span style="color:#0077D6" >
                
                    <?php echo $post_info->title; ?>
                <span><br />
                    <p><?php echo $post_info->heading; ?></p>
                    <p><?php echo $post_info->text; ?></p>
                    <span><br />
                        <span style="color:black; font-size:12px" > <?php //echo substr("$post_info->text", 0, 50);      ?><span>
                                <span style="padding-left:100px; font-size:10px">
                                    <span style="color:#689102; font-size:9px" >
                                        <b>Posted By:</b> 
                                        <a  href="<?php echo base_url() ?>org_member/info/view_member_profile/<?php echo $post_info->member_id; ?>" title="">
                                            <?php echo $name; ?>
                                        </a>
                                        <?php
                                        $category_name = "";
                                        $query850 = $this->db->query("select category_name from article_category where id='" . $post_info->article_category . "'");
                                        foreach ($query850->result() as $c_info):
                                            $category_name = $c_info->category_name;
                                        endforeach;
                                        ?>
                                        <?php echo $post_info->creation_time; ?>
                                        &nbsp;&nbsp;&nbsp;<b>Expire Date:</b> <?php echo $post_info->expire_date; ?>
                                        &nbsp;&nbsp;&nbsp; <b>Importance:</b> <?php echo $post_info->importance; ?>
                                        &nbsp;&nbsp;&nbsp; <b>Category:</b>                                         
                                        <?php echo $category_name; ?>

                                    </span>
                                    <span id="n" style="padding-left:20px; width:500px; clear:both">
                                       <p style="padding-top:30px">
                                        <a href="<?php echo base_url(); ?>org_member/info/approve_member_post/<?php echo $post_info->id; ?> " title="Edit the Content">
                                            <img src="<?php echo base_url(); ?>public/images/approve.png" alt="" border="0">
                                        </a>&nbsp;&nbsp;&nbsp;
                                        <a  href="<?php echo base_url() ?>org_member/info/deny_member_post/<?php echo $post_info->id; ?>" title="">
                                            <img src="<?php echo base_url(); ?>public/images/deny.png" alt="" border="0">
                                        </a>
                                       </p>


                                    </span>
                                    </div>



                                    <?php
                                endif;
                            endforeach;
                            ?>






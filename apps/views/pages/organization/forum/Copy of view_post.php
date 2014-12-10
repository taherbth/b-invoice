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
    .SearchListing form{ padding-left:10px; margin-bottom:10px; text-align:left}
    .delete a{ color:#990033}
</style>
<script language="javascript">
    function confirmSubmit() {
        var agree=confirm("Are you sure to delete this comment?");
        if (agree)
            return true;
        else
            return false;
    }
</script>
<script>
    function check_value()
    {
        var myvar = document.getElementById("comment").value;
        if(myvar)
        {
            $("#a").show();
        }
        else
        {
            $("#a").hide();
        }
    }
</script>
<?php echo $this->session->flashdata('message'); ?>
<?php
$query = $this->db->query("select * from forum where org_id ='" . $this->session->userdata('user_id') . "' order by id desc");
foreach ($query->result() as $p):
    if (date("Y-m-d") < $p->expire_date):
        $query85 = $this->db->query("select name from member where id='" . $p->member_id . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
        ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
            <p><b>Posted By:</b> <?php echo $name; ?></p>
            <p><b>Title:</b> <?php echo $p->title; ?></p>
            <p><b>Message: </b> <?php echo $p->text; ?></p>
            <?php
            $s = $this->db->query("select * from forum_comment where post_id='" . $p->id . "'order by id desc");
            foreach ($s->result() as $c_info):
                $query85 = $this->db->query("select name from member where id='" . $c_info->posted_by . "'");
                foreach ($query85->result() as $m_name):
                    $name = $m_name->name;
                endforeach;
                ?>
                <p class="delete" style="background-color:#EFEEE3; width:500px" ><b style="color:#008048">
                        <a href="<?php echo base_url(); ?>organization/info/view_member_profile/<?php echo $c_info->posted_by; ?>">
                            <?php echo $name; ?>
                        </a>

                    </b> <?php echo $c_info->comment; ?> 
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

                    <a onclick="return confirmSubmit()" href="<?php echo base_url(); ?>organization/info/delete_forum_post/<?php echo $c_info->id; ?>">Delete</a>

                    <a  href="<?php echo base_url(); ?>organization/info/archive_forum_comments/<?php echo $c_info->id; ?>">Archive</a>   


                </p>
                
            <?php endforeach; ?>

        </div>

        <?php
    endif;


endforeach;
?>






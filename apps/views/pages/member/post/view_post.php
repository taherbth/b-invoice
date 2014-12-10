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

</style>

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
$query = $this->db->query("select * from post_tbl where send_to='" . $this->session->userdata('id') . "'and status=2");
foreach ($query->result() as $p):
    $post_id = $p->post_id;
    $query1 = $this->db->query("select * from member_post where id='" . $post_id . "'order by id desc");
    foreach ($query1->result() as $post_info):
        if (date("Y-m-d") < $post_info->expire_date):
            $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
            foreach ($query85->result() as $m_name):
                $name = $m_name->name;
            endforeach;
            ?>

            <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
                <p><b>Posted By:</b> <?php echo $name; ?></p>
                <p><b>Title:</b> <?php echo $post_info->title; ?></p>
                <p><b>Message: </b> <?php echo $post_info->text; ?></p>
                <?php
                $s = $this->db->query("select * from comment where post_id='" . $post_info->id . "'order by id desc");
                foreach ($s->result() as $c_info):
                    $query85 = $this->db->query("select name from member where id='" . $c_info->posted_by . "'");
                    foreach ($query85->result() as $m_name):
                        $name = $m_name->name;
                    endforeach;
                    ?>

                    <p style="background-color:#EFEEE3; width:500px" ><b style="color:#008048"><?php echo $name; ?></b> <?php echo $c_info->comment; ?> </p>
                    <?php endforeach; ?>
                <p>
                    <?php echo form_open("org_member/info/add_comment"); ?>
                    <input type="hidden"   name="post_id" value="<?php echo $post_info->id; ?>" > 
                    <input type="text"   style=" width:200px" name="post_comment" value="write a comment.." > 
                    <input type="submit" value="add" />
                    <?php echo form_close(); ?>
                </p>
            </div>

        <?php endif;
    endforeach;

endforeach; ?>






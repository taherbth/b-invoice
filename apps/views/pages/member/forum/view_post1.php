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
<style>
    .forum_comment {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid #C4C4C4;
        font-size: 13px;
        margin-top:20px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        overflow:hidden;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment3 {
        -moz-border-radius: 3px 3px 3px 3px;
        font-size: 15px;
        font-weight:bold;
        margin-top:30px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment9 {

        font-size: 13px;
        text-align:justify;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }

    .forum_comment1 {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid rgba(0, 0, 0, 0.15);
        font-size: 13px;
        margin: 0 0 1em;
        overflow: hidden;
        padding: 5px;
        position: relative;
        white-space: nowrap;
    }
    .a{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        height:30px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;   
        text-decoration: none;
        white-space: nowrap;
    }
    .a:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        text-decoration: none;
        white-space: nowrap;
    }

    .dsq-button {
        -moz-border-radius: 0 0 4px 0;
        -moz-box-shadow: 0 1px 2px rgba(72, 76, 80, 0.25);

        border: 1px solid #ACB2B8;
        color: #585C60;
        font-size: 12px;
        font-weight: 600;
        height: 34px;
        line-height: 14px;
        margin: 0;
        padding: 8px 20px;
        position: absolute;
        right: -1px;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
        top: -1px;
        z-index: 2;
    }
</style>
<script>
    function clearText(field){

        if (field.defaultValue == field.value) field.value = '';
        else if (field.value == '') field.value = field.defaultValue;
    }
</script>
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
<?php
$p = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($p->result() as $member_previlige):
endforeach;
?>
<?php if ($member_previlige->forum_access == '1'): ?>
    <p style="width:850px; text-align:left; margin:0; padding-left:20px; padding-bottom:25px; height:10px"><a href="<?php echo base_url(); ?>org_member/info/add_forum_post"><span>New post</span></a></p>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
    $query = $this->db->query("select * from forum where org_id ='" . $this->session->userdata('member_org') . "' and id='" . $id . "'");
    foreach ($query->result() as $p):
        if (date("Y-m-d") < $p->expire_date):
            $query85 = $this->db->query("select name from member where id='" . $p->member_id . "'");
            foreach ($query85->result() as $m_name):
                $name = $m_name->name;
            endforeach;
            ?>
            <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
                <p  style="padding-left:10px;  font-size:16px; font-weight:bold"><h2 id="r" style="padding-left:40px; padding-top:10px; height:40px;color:#0077D6; font-weight:bold"><?php echo $p->title; ?></h2></p>


            <p style="font-size:12px; color:#0077D6;padding-left:20px;"><?php echo $p->text; ?></p>
            <p style="font-size:12px; ;">
                <b>Posted By:</b> <?php echo $name; ?>&nbsp;&nbsp;&nbsp;
                <b> Expire Date:</b><?php echo $p->expire_date; ?>&nbsp;&nbsp;&nbsp;
                <b>Creation Date:</b><?php echo $p->date_of_creation; ?>

            </p>
            <p class="forum_comment3"> Comments:</p>
            <?php
            $s = $this->db->query("select * from forum_comment where post_id='" . $p->id . "'order by id desc");
            foreach ($s->result() as $c_info):
                $query85 = $this->db->query("select name from member where id='" . $c_info->posted_by . "'");
                foreach ($query85->result() as $m_name):
                    $name = $m_name->name;
                endforeach;
                ?>

                <p class="forum_comment"  ><b style="color:#008048">

                        <span style=" font-family:Arial, Helvetica, sans-serif; font-style:italic; font-size:12px;">
                            <a href="<?php echo base_url(); ?>org_member/info/view_member_profile/<?php echo $c_info->posted_by; ?>">
                                <?php echo $name; ?>
                            </a>
                        </span>&nbsp;<br /><br />
                        <span> <?php echo $c_info->comment; ?></span><br/><br/>
                        <span style="color:black; ">                  
                            <?php
                            $c = strtotime($c_info->comment_date);
                            echo date('M d, y', $c);
                            ?>
                        </span>


                    </b>  
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    <?php if ($member_previlige->forum_delete_any_coments == '1') { ?>
                        <a onclick="return confirmSubmit()" href="<?php echo base_url(); ?>org_member/info/delete_forum_post/<?php echo $c_info->id; ?>/<?php echo $p->id; ?>">Delete</a>
                        <?php
                    } else {
                        if ($member_previlige->forum_delete_won_comments == '1') {
                            if ($c_info->posted_by == $this->session->userdata('id')) {
                                ?>
                                <a onclick="return confirmSubmit()" href="<?php echo base_url(); ?>org_member/info/delete_forum_post/<?php echo $c_info->id; ?>/<?php echo $p->id; ?>">Delete</a>
                                <?php
                            }
                        }
                    }
                    if ($member_previlige->forum_manual_comments == '1'):
                        ?>
                        <a  href="<?php echo base_url(); ?>org_member/info/archive_forum_comments/<?php echo $c_info->id; ?>/<?php echo $p->id; ?>">Archive</a>   
                        <?php
                    endif;
                    ?>

                </p>
            <?php endforeach; ?>
            <?php if ($member_previlige->forum_comments == '1'): ?>
                <p>
                    <?php echo form_open("org_member/info/add_forum_comment"); ?>
                    <input type="hidden"   name="forum_post_id" value="<?php echo $p->id; ?>" > 
                    <textarea rows="5" name="forum_comment" class="forum_comment1" cols="35" onfocus="clearText(this);">Write Your Comment here...</textarea><br />
                    <!--<input type="text"   style="width:200px" name="forum_comment" value="write a comment.." >--> 
                    <input type="submit" style=" border:none" class="a"  value="Post Comment" />
                    <?php echo form_close(); ?>
                </p>
            <?php endif; ?>
            </div>

            <?php
        endif;


    endforeach;
endif;
?>






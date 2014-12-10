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
	#r{
	
    border-bottom: 1px dotted #999999;
    float: left;
    overflow: hidden;
    width: 730px;
	color:#E99500;

	}
	#r a{	color:#0077D6; padding: 11px 50px;}
	#r a:hover{	color:#0077D6; padding: 11px 50px; text-decoration:underline}
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
<?php
$p = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($p->result() as $member_previlige):
endforeach;
?>
<?php if ($member_previlige->forum_access == '1'): ?>
    <p style="width:850px; text-align:left; margin0; padding-left:20px; padding-bottom:25px; height:10px">
    <a href="<?php echo base_url(); ?>org_member/info/add_forum_post"><span>New post</span></a>
    </p>
    <?php echo $this->session->flashdata('message'); ?>
    <?php
  /*  $query = $this->db->query("select * from forum where org_id ='" . $this->session->userdata('member_org') . "' order by id desc");*/
    foreach ($query1 as $p):
        if (date("Y-m-d") < $p->expire_date):
            $query85 = $this->db->query("select name from member where id='" . $p->member_id . "'");
            foreach ($query85->result() as $m_name):
                $name = $m_name->name;
            endforeach;
            ?>
               <p id="r" style="padding-left:10px; font-size:16px; margin-bottom:15px; height:50px; font-weight:bold">
                  <a href="<?php echo base_url(); ?>org_member/info/view_forum_post_detail/<?php echo $p->id; ?>">
                                <?php  echo $p->title; ?> 
                            </a><br />
                          <span style="padding-left:100px; font-size:10px"><b>Posted By:</b> <?php echo $name; ?></span>
                </p>
                <?php endif;endforeach; ?>
<p style="width:900px; clear:both; text-align:center"><?php  echo $this->pagination->create_links(); ?></p>

            <?php
        endif;
	else: 
	echo "<font color='red'>Sorry You are not permitted to acces the forum</font>";
 endif;

?>






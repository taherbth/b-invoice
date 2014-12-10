<h3 class="content_edit">Org Admin Control Panel View All Archive Article</h2>

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
//$query1 = $this->db->query("select * from archive_article where org_id='" . $this->session->userdata('user_id') . "'order by id desc");
$i = 1;
foreach ($query1 as $post_info):
        if ($i % 2 == 0): $color = "#F1FAFA";
        else : $color = "#F1FAFA";
        endif;
        $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
        ?>

        <div class="SearchListing" style="background-color: <?php echo $color; ?>;">
            <p style="padding-left:10px"><b >Posted By:</b>  <?php echo $name; ?></p>               
            <p style="padding-left:10px"><b >Expire Date:</b>  <?php echo $post_info->expire_date; ?></p>               
            <p style="padding-left:10px"><b >Importance:</b>  <?php echo $post_info->importance; ?></p>
            <p style="padding-left:10px"><b >Title:</b> <?php echo $post_info->title; ?></p>
            <p style="padding-left:10px"><b >Message: </b> <?php echo $post_info->text; ?></p>
        </div>

        <?php

    $i = $i + 1;
endforeach;
?>
<p style="width:900px; text-align:center"><?php  echo $this->pagination->create_links(); ?></p>








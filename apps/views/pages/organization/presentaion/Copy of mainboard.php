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
$query1 = $this->db->query("select * from member_post where org_id='" . $org_id . "'order by id desc");
$i = 1;
foreach ($query1->result() as $post_info):
    if (date("Y-m-d") < $post_info->expire_date):
        if ($i % 2 == 0): $color = "#F1FAFA";
        else : $color = "#F1FAFA";
        endif;
        $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
        ?>

        <div class="SearchListing" style="background-color: <?php echo $color; ?>;">
         <p><span style="float:left; width:600px;"><b>Posted By:</b> <?php echo $name; ?></span>
            <span style="float:right; width:300px;">
             
            &nbsp;&nbsp;&nbsp;
           
           </span>
            </p>
            <p style="padding-left:10px"><b >Expire Date:</b>  <?php echo $post_info->expire_date; ?></p>               
            <p style="padding-left:10px"><b >Importance:</b>  <?php echo $post_info->importance; ?></p>
            <p style="padding-left:10px"><b >Title:</b> <?php echo $post_info->title; ?></p>
            <p style="padding-left:10px"><b >Message: </b> <?php echo $post_info->text; ?></p>
           
        </div>

        <?php
    endif;

    $i = $i + 1;
endforeach;
?>








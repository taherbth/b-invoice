<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/sexylightbox.v2.3.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/sexylightbox.css" />
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

    $query1 = $this->db->query("select * from member_post where org_id='" .$this->session->userdata('user_id'). "'order by id desc");
     $i=1;
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

            <div class="SearchListing" style="background-color: <?php echo $color; ?>; margin-bottom:15px; margin-top:20px;-moz-border-radius: 15px 15px 15px 15px;"  >
                <p style="padding-left:10px"><b style="color:#EC8700">Posted By:</b> <?php echo $name; ?></p>
                <p style="padding-left:10px"><b style="color:#EC8700">Title:</b> <?php echo $post_info->title; ?></p>
                <p style="padding-left:10px"><b style="color:#EC8700">Message: </b> <?php echo $post_info->text; ?></p>
                <?php
                $s = $this->db->query("select * from comment where post_id='" . $post_info->id . "'order by id desc");
                foreach ($s->result() as $c_info):
                    $query85 = $this->db->query("select name from member where id='" . $c_info->posted_by . "'");
                    foreach ($query85->result() as $m_name):
                        $name = $m_name->name;
                    endforeach;
                    ?>

                    <p style="background-color:#EFEEE3; width:500px;padding-left:10px"><b style="color:#008048"><?php echo $name; ?></b> <?php echo $c_info->comment; ?> </p>
                <?php endforeach; ?>
            </div>

        <?php endif;
 
 $i = $i + 1;
endforeach; ?>






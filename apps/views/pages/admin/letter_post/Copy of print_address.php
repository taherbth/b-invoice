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
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/jquery.jqprint.0.3.js"></script>
<script>
    $(function(){
        $("#print_button").click( function() {
            $("#invoice").jqprint();
        });
    });
</script>
<input type="button" id="print_button" value="Print" style="margin-top:5px; ;">
<div id="invoice" style="float:left; width:900px">
 
            <?php if($letter_status=='2'):?> 
            <ul>
                <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $letter_id . "'"); ?>
                <?php
                foreach ($q->result() as $p):
                    $query851 = $this->db->query("select * from address_list where id='" . $p->member_id . "'");
                    foreach ($query851->result() as $m_name1):
                        $name = $m_name1->address_title;
                        $address = $m_name1->address;
                    endforeach;
                    ?>
                    <p style="width:420px; float:left; position:relative;">
                        <span style="width:200px; float:left; position:relative; left:7px"> <?php echo $name; ?></span>
                        <span style="width:210px; float:left; position:relative"><?php echo $address; ?> </span>

                    </p>
                <?php endforeach; ?>
            </ul>            
            <?php else:?>
            <ul>
                <?php $q = $this->db->query("select * from letter_send_request where letter_id='" . $letter_id. "'"); ?>
                <?php
                foreach ($q->result() as $p):
                    $query851 = $this->db->query("select * from member where id='" . $p->member_id . "'");
                    foreach ($query851->result() as $m_name1):
                        $name = $m_name1->name;
                        $address = $m_name1->address;
                    endforeach;
                    ?>
                    <div style="width:900px;">
                    <p >
                        <?php echo $name; ?>
                    </p>   
                    <p style=" padding:0; margin:0; line-height:0px">
                        <?php echo $address; ?> 
                     </p> 
                   </div>
                   <div style="height:20px"></div>
                <?php endforeach; ?>
            </ul>
            <?php endif;?>
            
</div>









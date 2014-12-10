<h3 class="content_edit">Admin Control Print Address </h2>
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
          <?php 
           $query0 = $this->db->query("select *  from user_info where id ='" . $org_id . "'");
    foreach ($query0->result() as $letter_info1):
        $organization_name = $letter_info1->org_name;
        $org_number = $letter_info1->org_number;
		$org_address = $letter_info1->org_primary_address;
    endforeach;
	?>
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
                    <div style="width:400px; float:left; border:1px solid black; margin:5px; height:140px;">
                      <div style="width:200px; float:left; position:relative;">
                        <p style="font-weight:bold; font-size:13px;text-align:left;padding-left:5px; margin:0 ">From,</p>

                         <p style=" font-size:13px;text-align:left;padding-left:5px;margin:0 "><?php echo $organization_name;?>(<?php echo $org_number;?>)</p>
                         <p style=" padding:0; margin:0;text-align:left;padding-left:5px;"><?php echo $org_address; ?></p> 
                        </div>
                         <div style="width:200px; float:left; position:relative;">
                        <p style="font-weight:bold; font-size:13px;text-align:left;padding-left:5px; margin:0 ">To,</p>
                        <p style=" font-size:13px;text-align:left;padding-left:5px; margin:0"><?php echo $name; ?></p>
                        <p style=" padding:0; margin:0;text-align:left;padding-left:5px;"><?php echo $address; ?></p> 
                        </div>
                   </div>
                  
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
                    <div style="width:400px; float:left; border:1px solid black; margin:5px; height:140px;">
                      <div style="width:200px; float:left; position:relative;">
                        <p style="font-weight:bold; font-size:13px;text-align:left;padding-left:5px; margin:0 ">From,</p>

                         <p style=" font-size:13px;text-align:left;padding-left:5px;margin:0 "><?php echo $organization_name;?>(<?php echo $org_number;?>)</p>
                         <p style=" padding:0; margin:0;text-align:left;padding-left:5px;"><?php echo $org_address; ?></p> 
                        </div>
                         <div style="width:200px; float:left; position:relative;">
                        <p style="font-weight:bold; font-size:13px;text-align:left;padding-left:5px; margin:0 ">To,</p>
                        <p style=" font-size:13px;text-align:left;padding-left:5px; margin:0"><?php echo $name; ?></p>
                        <p style=" padding:0; margin:0;text-align:left;padding-left:5px;"><?php echo $address; ?></p> 
                        </div>
                   </div>
                 
                <?php endforeach; ?>
            </ul>
            <?php endif;?>
            
</div>









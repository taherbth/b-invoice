<h3 class="content_edit">Admin Control Print Letter Content </h2>

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

<?php
$r = $this->db->query("select * from letter where id='".$letter_id."'");
foreach ($r->result() as $l):
    $org_id = $l->org_id;
    $letter_id = $l->id;
	$title=$l->title;
	$text=$l->text;
    $query0 = $this->db->query("select *  from user_info where id ='" . $org_id . "'");
    foreach ($query0->result() as $letter_info1):
        $organization_name = $letter_info1->org_name;
        $org_number = $letter_info1->org_number;
    endforeach;
  endforeach;
    ?>
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
<span style="text-align:right; width:900px; float:left; padding-right:50px"><?php echo $organization_name;?> | <?php echo $org_number;?></span>
 <div style="width:800px; height:30px; position:relative; text-align:left; padding-left:140px;">
 <?php if(!empty($l->letter_header)):
			  $h1=$this->db->query("select * from letter_header where id='" .$l->letter_header . "'");
			  foreach($h1->result() as $h3):
			    $header_content=$h3->text;
			  endforeach;?>
			
             <?php echo $header_content; ?>
            
            <?php endif;?>
 

 </div>
 <!--<div style="width:800px; height:30px;margin-top:10px; position:relative; padding-left:140px; height:10px; font-weight:bold; color:black;  font-size: 14px;">
 Recipient's name: 
 </div>
 <div style="width:800px; margin-top:10px; position:relative; padding-left:140px; height:10px; font-weight:bold; color:black;  font-size: 14px;">
 Recipient's Address: 
 </div>-->
  <div style="width:800px; margin-top:50px; position:relative; padding-left:140px;  font-size: 14px;">
  <?php echo $title;?>
 </div>
  <div style="width:800px; margin-top:30px; position:relative; text-align:left; right:15px; padding-left:155px;  ">
   <?php echo $text;?>
 </div>
 <div style="width:800px; margin-top:100px; position:relative; text-align:left; padding-left:160px; right:15px;">
 </div>
 <div style="width:800px; margin-top:60px; position:relative;  padding-left:155px; right:15px; ">
  <?php if(!empty($l->letter_footer)):
			  $h5=$this->db->query("select * from letter_footer where id='" .$l->letter_footer . "'");
			  foreach($h5->result() as $h6):
			    $footer_content=$h6->text;
			  endforeach;?>
			
           <?php echo $footer_content; ?>
            
            <?php endif;?>
 </div> 

  <div style="width:800px; margin-top:27px; position:relative; text-align:left; padding-left:160px; right:15px;  font-weight:bold; color:black;  font-size: 14px;">
 
 </div>
</div>









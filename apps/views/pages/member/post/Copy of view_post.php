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
$post_id=$p->post_id;
$query1 = $this->db->query("select * from member_post where id='" .$post_id . "'order by id desc");
foreach ($query1->result() as $post_info):
    ?>
<div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
  <p><b>Title:</b> <?php echo $post_info->title;?></p>
  <p><b>Message: </b> <?php echo $post_info->text;?></p>
  
  
  <button id="comment" value="<?php echo $post_info->id;?>"  onclick="check_value(this.value)">Comment</button>
  <div id="a" style="display:none"> 
     <?php
      echo form_open("org_member/info/add_comment"); ?>
       <input type="hidden"  size="30" maxlength="30" name="post_id" value="<?php echo $post_info->id;?>" > 
        <input type="text"  size="30" maxlength="30" name="post_comment" > 
       <input type="submit" value="add" />
    <?php echo form_close(); ?>
  </div>
</div>

<?php endforeach;endforeach; ?>






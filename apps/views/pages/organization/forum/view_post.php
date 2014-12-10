<h3 class="content_edit"><?php echo $this->lang->line('org_forum_msg');?></h3>
        
<?php if(  $forum_access){ 
?>

<div class="actions">
		<a class="icon-mail" href="<?php echo base_url()."organization/info/add_forum_topic"; ?>"><?php echo $this->lang->line('label_new_post') ?></a>
</div>
	
<?php 
} ?>

<?php

$org_id = $member_org;
/**
* Preparing and getting response for latest feed items.
**/
if(isset($_POST['latest_news_time'])){
	$sql = "SELECT * FROM forum_archieve WHERE org_id=$org_id AND add_date > '".$_POST['latest_news_time']."' ORDER BY add_date DESC";
	$resource = mysql_query($sql);
	$current_time = $_POST['latest_news_time'];
	$item = mysql_fetch_assoc($resource);
	$last_news_time = $item['add_date'];
	while ($last_news_time < $current_time) {
		usleep(1000); //giving some rest to CPU
		$resource = mysql_query($sql);
		$item = mysql_fetch_assoc($resource);
		$last_news_time = $item['add_date'];
        $member_info = $this->info_model->get_logged_member_profile($item['member_id']);
        if($member_info){
           $name = $member_info[0]->first_name;
        }
	}
	?>
	<li id="<?php echo $item['add_date'] ?>">
		<span class="feedtext"><?php echo $item['topic_title'] ?> was added by <b><?php echo $name; ?></b></span>
	</li>
	<?php
	exit;
}
/**
* Getting news Items and preparing sql query with respect to request
**/
$sql = "SELECT * FROM forum_archieve WHERE org_id=$org_id ORDER BY add_date DESC LIMIT 0,5";
if(isset($_POST['last_time'])){
    $sql = "SELECT * FROM forum_archieve WHERE org_id= $org_id  ORDER BY add_date DESC LIMIT 0,5";
}
$resource = mysql_query($sql);
$news = array();
while($row = mysql_fetch_assoc($resource)){
	$news[] = $row;
}

?>

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
    $topic_title= array(
        'name'      => 'topic_title',
        'id'        => 'topic_title',         
        'value'        => $topic_title,         
        'size'       =>"30",
        'placeholder' => 'search the forum...'    
    );
    $search_option_field = array(
			'active'  => $this->lang->line('label_active'),
			'all'  => $this->lang->line('label_all'),
			'archieve'  => $this->lang->line('label_archieve'),
             
    );     
    echo $this->session->flashdata('message'); 
?>


<div class="searchform units-row">
<div class="unit-25">
        <?php echo form_open("organization/info/search_forum_topic"); ?>
            <?=form_dropdown('search_option',$search_option_field,$search_option,'id="search_option"','class="form_input_select"');?>
</div><div class="unit-50">
            <?=form_input($topic_title);?>
</div><div class="unit-25">
            <input type="submit" value="Search"/>
        <?php echo form_close(); ?>
</div>
</div>


<!-- Scroll bar present and enabled -->        
<div class="units-row forum">
<div class="unit-66 forum-posts">
 <!--Album view start Here-->
		<?php if($all_active_topic) {
            foreach($all_active_topic as $rows){
        ?> 
        		<div class="post">
                   <h4>
                   <?php if($search_option=="archieve") { ?>
                            <a href="<?php echo base_url(); ?>organization/info/archived_forum_topic_details/<?php echo $rows->topic_id; ?>"  ><h4><?php echo $rows->topic_title; ?> </h4></a>
                    <?php } else { ?>                   
                   <a href="<?php echo base_url(); ?>organization/info/forum_topic_details/<?php echo $rows->topic_id; ?>">
                               <?php  echo $rows->topic_title; ?>
                            </a></h4>
                          <?php }  echo $this->lang->line('label_posted_by');?>:
                            
                               <?php  
                                    $member_info = $this->info_model->get_logged_member_profile($rows->member_id);
                                  
                                if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                            echo '<span class="author">'?>
                                          <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name;?>  </a>                                
                                    
									<?php }  else{
										echo $member_info[0]->first_name;
									} ?>
                          
                </div><!-- end .forum-post -->
            <?php } /* end foreach */ } else{echo $this->lang->line('not_available');}?>
            
            <?php if($all_archieve_topic_also) {
            foreach($all_archieve_topic_also as $rows){
        ?> 
                  <a href="<?php echo base_url(); ?>organization/info/forum_topic_details/<?php echo $rows->topic_id; ?>"><h3><?php  echo $rows->topic_title; ?></h3></a>
                          <span><b><?php echo $this->lang->line('label_posted_by');?>:</b> 
                            
                            <a href="<?php echo base_url() ?>org_member/info/view_member_profile/<?php echo  $rows->member_id; ?>" title="">
                               <?php  
                                    $member_info = $this->info_model->get_logged_member_profile($rows->member_id);
                                    if($member_info){
                                        echo $member_info[0]->first_name;
                                    }                                
                                ?>
                            </a>
                           </span>
                </p>
            <?php } } ?>
		<!--Album view end here-->

</div><!-- end .unit-66 -->

<div class="unit-33 forum-archive">
            <h3><?php echo $this->lang->line('label_archieved_topic');?></h3>

                    <?php foreach($news as $item):                     
                            $member_info = $this->info_model->get_logged_member_profile($item['member_id']);
                            if($member_info){
                                $name = $member_info[0]->first_name;
                            }
                    ?>
                    <div class="post">
                                        
                        <a href="<?php echo base_url(); ?>organization/info/archived_forum_topic_details/<?php echo $item['topic_id']; ?>"
                            <?php echo '<h4>'.substr($item['topic_title'],0,25).'</h4>';
                                if(strlen($item['topic_title'])>25){echo "...";}
                            ?>
                        </a>
                        <?php 
                            echo "<br/>".$this->lang->line('label_posted_by');
                           if($view_member_profile || $item['member_id']== $this->session->userdata('mem_id') ){
                                echo '<span class="author">'?> <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $item['member_id']; ?>">  <?php echo $name; ?> </a>                           
                                    
                          <?php } else { ?>
                        <strong><?php echo $name; ?></strong><?php } ?>
                    </div>
                    <?php endforeach; ?>


</div><!-- end .unit-33 -->
</div><!-- end .units-row -->
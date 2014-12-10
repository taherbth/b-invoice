<?php
 if($view_mainboard){
$org_id = $member_org;
/**
* Preparing and getting response for latest feed items.
**/
if(isset($_POST['latest_news_time'])){
	$sql = "SELECT * FROM main_board_article_archieve WHERE org_id=$org_id AND add_date > '".$_POST['latest_news_time']."' ORDER BY add_date DESC";
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
            <span class="feedtext"><?php echo $item['article_title'] ?> was added by <b><?php echo $name; ?></b></span>        
	</li>
	<?php
	exit;
}
/**
* Getting news Items and preparing sql query with respect to request
**/
$sql = "SELECT * FROM main_board_article_archieve WHERE org_id=$org_id ORDER BY add_date DESC LIMIT 0,5";
if(isset($_POST['last_time'])){
    $sql = "SELECT * FROM main_board_article_archieve WHERE org_id= $org_id  ORDER BY add_date DESC LIMIT 0,5";
}
$resource = mysql_query($sql);
$news = array();
while($row = mysql_fetch_assoc($resource)){
	$news[] = $row;
}

?>




<h3 class="content_edit"><?php echo $this->lang->line('org_main_board_msg');?></h3>
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
    $article_title= array(
        'name'      => 'article_title',
        'id'        => 'article_title',         
        'value'        => $article_title,         
        'size'       =>"30"
    );
    $search_option_field = array(
			'active'  => $this->lang->line('label_active'),
			'all'  => $this->lang->line('label_all'),
			'archieve'  => $this->lang->line('label_archieve')            
    );     
    echo $this->session->flashdata('message'); 
?>

<div class="searchform units-row">
        <div class="unit-25"><?php echo form_open("organization/info/search_main_board_article"); echo form_dropdown('search_option',$search_option_field,$search_option,'id="search_option"','class="form_input_select"');?></div>
            <div class="unit-50"><?php echo form_input($article_title);?></div>     
            <div class="unit-25"><input type="submit" value="go"/>
        <?php echo form_close(); ?></div>
</div>

<!-- Scroll bar present and enabled -->        
 
    <div class="main_container units-row">
 <!--Album view start Here-->
<div class="unit-75">
<div class="units-row feed">
                                    	<?php 
											if($all_active_article){ 
													$i = 0;
                                                    foreach($all_active_article as $rows){
                                                    $i += 1;
                                                    if($i % 4 === 0){ echo '</div><div class="units-row feed">'; }										
                                                ?>
                                                    <div class="unit-33 article"<?php echo $rows->article_color_code;?>>
                                                    <?php if($search_option=="archieve") { ?>
                                                            <a href="<?php echo base_url(); ?>organization/info/archived_article_details/<?php echo $rows->article_id; ?>" <?php if($rows->article_color_code=="#000000"){?> style="color:#FFF;" <?php } else { ?> style="color:#000;" <?php } ?> ><h3><?php echo substr($rows->article_title,0,10); if(strlen($rows->article_title)>11){echo "...";}?> </h3></a>
                                                    <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>organization/info/article_details/<?php echo $rows->article_id; ?>" <?php if($rows->article_color_code=="#000000"){?> style="color:#FFF;" <?php } else { ?> style="color:#000;" <?php } ?> ><h3><?php echo substr($rows->article_title,0,10); if(strlen($rows->article_title)>11){echo "...";}?> </h3></a>
                                                    <?php } echo '<span class="importance">'.$rows->importance.'</span>';?>
                                                        <?php 
                                                        $category_name = $rows->article_category;
                                                        if($category_name!="Default"){
                                                            $category_data = $this->info_model->get_category($rows->article_category);
                                                           
                                                            if($category_data){
                                                                $category_name = $category_data[0]->category_name;
                                                            }
                                                        }
                                                        echo '<span class="category">'.substr($category_name,0,13).'</span>';
                                                         if(strlen($category_name)>14){echo "...";}
                                                        
                                                        ?>
                                                        <?php 
                                                                $member_info = $this->info_model->get_logged_member_profile($rows->member_id);
                                                                if($member_info){
                                                                    echo '<span class="author">'.$member_info[0]->first_name.'</span>';
                                                                }
                                                                
                                                        ?>

                                                    </div>
                                              
                                       <?php } 
                                       ?></div><?php
                                        } else{echo $this->lang->line('not_available');}?>
                                        <?php 
                                        
											if($all_archieve_article_also){
                                                    foreach($all_archieve_article_also as $rows){
                                                    										
                                                ?>
                                                <a href="<?php echo base_url(); ?>org_member_letter/test_img.jpg" <?php if($rows->article_color_code=="#000000"){?> style="color:#FFF;" <?php } else { ?> style="color:#000;" <?php } ?> >

                                                    <div style="position:relative; float:left; width:150px; height:auto; margin:9px; margin-right: 30px;margin-left: 30px;border:red 1px solid; background:<?php echo $rows->article_color_code;?>;" id="gallery">
                                                        <p ><?php echo $this->lang->line('label_title');?>: 
                                                        <a href="<?php echo base_url(); ?>organization/info/archived_article_details/<?php echo $rows->article_id; ?>"
                                                            <?php echo substr($rows->article_title,0,13); if(strlen($rows->article_title)>14){echo "...";}?> 
                                                        </a>
                                                        </p>
                                                        <p><?php echo $this->lang->line('label_importance');?>: <?php echo $rows->importance;?> </p>
                                                        <p><?php echo $this->lang->line('label_article_category');?>: <?php 
                                                        $category_name = $rows->article_category;
                                                        if($category_name!="Default"){
                                                            $category_data = $this->info_model->get_category($rows->article_category);
                                                           
                                                            if($category_data){
                                                                $category_name = $category_data[0]->category_name;
                                                            }
                                                        }
                                                        echo substr($category_name,0,13);
                                                         if(strlen($category_name)>14){echo "...";}
                                                        
                                                        ?> </p>
                                                        <p><?php echo $this->lang->line('label_posted_by');?>: <?php 
                                                                $member_info = $this->info_model->get_logged_member_profile($rows->member_id);
                                                                if($member_info){
                                                                    echo $member_info[0]->first_name;
                                                                }
                                                                
                                                        ?> </p>
                                                    </div>
                                               </a>
                                       <?php } 
                                        } ?>

		<!--Album view end here-->
        </div>
        
        
        
        
        <div class="feeds_container unit-25">
            <h3 class="feed_head"><?php echo $this->lang->line('label_archieved_article');?></h3>
            <div class="">
                    <?php
                    		foreach($news as $item):      
							$member_info = $this->info_model->get_logged_member_profile($item['member_id']);
                            if($member_info){
                                $name = $member_info[0]->first_name;
                            }
                    ?>
                    
                    <div class="" <?php /* echo $item['add_date'] */?>>
                    
                        <a href="<?php echo base_url(); ?>organization/info/archived_article_details/<?php echo $item['article_id']; ?>"
                            <?php echo '<h4>'.substr($item['article_title'],0,25).'</h4>';
                                if(strlen($item['article_title'])>25){echo "...";}
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
            </div>
        </div>
    </div>
    
<?php } else { ?>  
<div class="notification">
 <span style="color:red;"><?php echo $this->lang->line('main_board_no_access_msg');?></span>

</div><?php }  ?>


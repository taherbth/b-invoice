
<h3 class="content_edit"><?php //echo $this->lang->line('org_forum_msg');?></h3>
<div class="success_message"><?php echo $this->session->flashdata('message2'); ?></div>
<div class="forum">
    <?php if($topic_details){
                    $topic_owner ="";
                    foreach($topic_details as $rows) {
                          $topic_owner = $rows->member_id;
                    ?>
                    
                        <div class="post-content">
                                    <h3 class="post-title"><?php echo $rows->topic_title; ?> </h3>
                                    
                                    <div class="units-row">
									<div class="post-meta unit-66">
									<?php 
									$comment_on_member_id = $rows->member_id;
									$member_info = $this->info_model->get_logged_member_profile($rows->member_id);                                    
									if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                            echo '<span class="author">'?>
                                          <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;?>  </a>                                
                                    
									<?php }  else{
										echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;
									} ?>
                                    </span>
									<span class="post-date"><?php echo date("Y-m-d",$rows->publish_date); ?> - <?php echo date("Y-m-d",$rows->expire_date); ?></span>
									</div><!-- end .post-meta -->

								 	<div class="post-options unit-push-right">
                                    <!--
                                    <a  href="<?php echo base_url() ?>organization/info/archive_article/<?php echo $rows->topic_id; ?>" title="">
                                           <button class="a" name="archive"  value="archive">Comment</button>
                                    </a> -->
                                    <?php if( $this->session->userdata('mem_id')==$rows->member_id):?>
                                           
                                            <a class="button remove" href="<?php echo base_url() ?>organization/info/archived_delete_forum_topic/<?php echo $rows->topic_id; ?>" title="">
                                              Delete
                                            </a>
                                    <?php endif;?>
                                   
                             
									</div><!-- end .post-options -->
									</div><!-- end .units-row -->
									<hr>
                                    <p><?php //echo $this->lang->line('label_topic_description');?>
                                            <?php echo $rows->topic_text; ?> 
                                    </p>
                                                                       
                                     
                                 </p>

                                    <?php } } ?>
                        </div><!-- end .post-content -->
        
        <!-- coment -->
<hr>
                                    <h4><?php echo $this->lang->line('comments_text');?> </h4>
                                            <?php if($topic_comments){?>

                                                    

                                                                        <?php foreach($topic_comments as $rows){
                                                                                            $member_info = $this->info_model->get_logged_member_profile($rows->comment_member_id);                                    
                                                                            ?>
                                                                            <div class="comment units-row topic_class">
                                                                                                 	<div class="comment-author unit-25">
                                                                                                    <?php 
                                                                                                        if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                                                                                        echo '<span class="author">'?>
                                                                                                        <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;?>  </a>                                

                                                                                                        <?php }  else{
                                                                                                        echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;
                                                                                                        } ?>
                                                                                                    <div>
                                                                                                 	<?php
                                                                                                        if($this->session->userdata('mem_id')==$rows->comment_member_id) { ?>
                                                                                                        <?php } ?> 
                                                                                                        <?php
                                                                                                        if($this->session->userdata('mem_id')==$topic_owner || $this->session->userdata('mem_id')==$rows->comment_member_id || $forum_delete_any_coments) { ?>
                                                                                                        <?php } ?>
                                                                                                 	</div>
                                                                                                 	</div><!-- end .unit-25 -->
                                                                                                    <div class="comment_text comment unit-75" id="topic_frame" rel="<?php echo $rows->comment_id;?>">
                                                                                                        <?php echo $rows->comment; ?>
                                                                                                         
                                                                                                        </div><!-- end .unit-75 -->
                                                                                                
                                                                                                 
                                                                            </div><!-- end .units-row -->     
                                                                               
                                                                        <?php }?>

                                                                  <?php }?>
                                                                  
                                                                  
                                                                       
                                                        </div>


    


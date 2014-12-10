<div class="success_message"><?php echo $this->session->flashdata('message2'); ?></div>
<div class="forum">
    <?php if($article_details){
                    $article_owner ="";
                    foreach($article_details as $rows) {
                          $article_owner = $rows->member_id;
                    ?>

                    <div class="post-content" style="background:<?php echo $rows->article_color_code;?> repeat-y; <?php if($rows->article_color_code=='#000000'){?> color:#FFF; <?php } else { ?> color:#000; <?php } ?>">
                                    <h3 class="post-title"><?php echo $rows->article_title; ?> </h3>
                                    
                                    <div class="units-row">
									<div class="post-meta unit-66">
									<?php 
									$comment_on_member_id = $rows->member_id;
									$member_info = $this->info_model->get_logged_member_profile($rows->member_id);                                    
									     if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                                echo '<span class="author">'?>
                                                <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;?>  </a>                                
                                            <?php
                                            }  
                                            else{
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
                                    <?php if($delete_article || $this->session->userdata('mem_id')==$rows->member_id):?>
                                            
                                            <a class="button remove" href="<?php echo base_url() ?>organization/info/delete_archived_article/<?php echo $rows->article_id; ?>" title="">
                                              Delete
                                            </a>
                                    <?php endif;?>
                                    
									</div><!-- end .post-options -->
									</div><!-- end .units-row -->
									<hr>
                                    <p><?php //echo $this->lang->line('label_topic_description');?>
                                            <?php echo $rows->article_text; ?> 
                                    </p>
                                                                       
                                     
                                 </p>

                                    <?php } } ?>
                        </div><!-- end .post-content -->                    
                    <hr>
										<h4><?php echo $this->lang->line('comments_text');?> </h4>
										<?php if($article_comments){?>
                                                                        <?php foreach($article_comments as $rows){
                                                                                            $member_info = $this->info_model->get_logged_member_profile($rows->comment_member_id);                                    
                                                                            ?>
                                                                            <div class="comment units-row article_class">
                                                                                                 	<div class="comment-author unit-25 li_class">
                                                                                                    <?php 
                                                                                                    if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                                                                                        echo '<span class="author">'?>
                                                                                                        <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;?>  </a>                                
                                                                                                    <?php
                                                                                                    }  
                                                                                                    else{
                                                                                                        echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;
                                                                                                    } ?>
                                                                                                    <div>
                                                                                                 	<?php
                                                                                                        if($this->session->userdata('mem_id')==$rows->comment_member_id) { ?>
                                                                                                        <?php } ?> 
                                                                                                        <?php
                                                                                                        if($this->session->userdata('mem_id')==$article_owner || $this->session->userdata('mem_id')==$rows->comment_member_id || $forum_delete_any_coments) { ?>
                                                                                                        <?php } ?>
                                                                                                 	</div>
                                                                                                 	</div><!-- end .unit-25 -->
                                                                                                    <div class="comment comment_text unit-75" id="article_frame" rel="<?php echo $rows->comment_id;?>">
                                                                                                        <?php echo $rows->comment; ?>
                                                                                                         
                                                                                                        </div><!-- end .unit-75 -->
                                                                                                
                                                                                                 
                                                                            </div><!-- end .units-row -->                                                                                            
                                                                              
                                                                        <?php }?>
                                                                    <?php }?>
                                                                      
                                                        </div>



    
    




<h3 class="content_edit"><?php echo $this->lang->line('org_article_proposal_details_msg');?></h3>
<div class="success_message"><?php echo $this->session->flashdata('message2'); ?></div>
<div class="main_container">
    <?php if($article_details){
                    $article_owner ="";
                    foreach($article_details as $rows) {
                          $article_owner = $rows->member_id;
                    ?>
                    
                        <div style="position:relative; float:left; height:auto; margin: 30px; padding:15px; border:red 1px solid; background:<?php echo $rows->article_color_code;?> repeat-y; <?php if($rows->article_color_code=='#000000'){?> color:#FFF; <?php } else { ?> color:#000; <?php } ?>" id="gallery">
                                    <p ><?php echo $this->lang->line('label_title');?>: <?php echo $rows->article_title; ?> </p>
                                    <p ><?php echo $this->lang->line('label_article_description');?>: 
                                            <?php if($rows->uploaded_article){ ?><a href="<?php echo base_url().'main_board_article/'. $rows->uploaded_article; ?>" ><?php echo $rows->uploaded_article;?> </a> <?php } else {echo $rows->article_text;} ?> 
                                    </p>
                                    
                                    <?php 
                                    $category_name = $rows->article_category;
                                    if($category_name!="Default"){
                                        $category_data = $this->info_model->get_category($rows->article_category);
                                        if($category_data){
                                            $category_name = $category_data[0]->category_name;
                                        }
                                    }
                                    ?> 
                                     <?php 
                                        $comment_on_member_id = $rows->member_id;
                                        $member_info = $this->info_model->get_logged_member_profile($rows->member_id);                                    
                                  ?> 
                                 </p>

                                    <span style=" font-size:10px">
                                    <span style="font-size:9px;<?php if($rows->article_color_code=='#000000'){?>color:#FFF; <?php } else { ?> color:#000; <?php } ?>" >
                                    <b><?php echo $this->lang->line('label_posted_by');?>:</b> 
                                    <?php 
                                    if($view_member_profile || $member_info[0]->mem_id == $this->session->userdata('mem_id') ){
                                            echo '<span class="author">'?>
                                          <a href="<?php echo base_url() ?>organization/info/view_member_profile/<?php echo $member_info[0]->mem_id; ?>"> <?php echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;?>  </a>                                
                                    
									<?php }  else{
										echo $member_info[0]->first_name."&nbsp;".$member_info[0]->last_name;
									} ?>
                                    
                                    <?php echo date("Y-m-d",$rows->publish_date); ?>
                                    &nbsp;&nbsp;&nbsp;<b>Expire Date:</b> <?php echo date("Y-m-d",$rows->expire_date); ?>
                                    &nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('label_importance');?>:</b><?php echo $rows->importance;?> 
                                    &nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('label_article_category');?> :</b> 
                                    <a style="font-size:9px;<?php if($rows->article_color_code=='#000000'){?>color:#FFF; <?php } else { ?> color:#000; <?php } ?>" href="<?php echo base_url(); ?>org_member/info/mainboard_viewed/<?php echo $rows->article_category; ?>">
                                    <?php echo $category_name;; ?></a>	
                                    <b><?php echo $this->lang->line('label_article_type');?> :</b> 
                                    <?php if($rows->article_type==1){echo $this->lang->line('label_public');}
                                                if($rows->article_type==2){echo $this->lang->line('label_private');}
                                    ?>
                                    <b><?php echo $this->lang->line('label_remind_by_email');?> :</b> 
                                        <?php if($rows->article_reminder_email_time){echo $rows->article_reminder_email_time."(s)";} else{echo $this->lang->line('not_available');}?>
                                    </span>
                                    <span id="n" style="float:right; padding-left:25px; width:300px;">
                                    <?php if($mem_type=="Admin" || $mainboard_change_article):?>
                                    <a  href="<?php echo base_url() ?>organization/info/approve_proposed_article/<?php echo $rows->article_id; ?>" title="">
                                        <button class="a" name="archive"  value="archive"><?=$this->lang->line('label_approve');?></button>
                                    </a>
                                                <a  href="<?php echo base_url() ?>organization/info/deny_proposed_article/<?php echo $rows->article_id; ?>" title="">
                                                <button class="a" name="archive"  value="archive"><?=$this->lang->line('label_deny');?></button>
                                            </a>
                                                <a  href="<?php echo base_url() ?>organization/info/edit_proposed_article/<?php echo $rows->article_id; ?>" title="">
                                                <button class="a" name="archive"  value="archive"><?=$this->lang->line('label_edit');?></button>
                                            </a>
                                    <?php endif;?>
                                    <?php if($mem_type=="Admin"):?>
                                        <a  href="<?php echo base_url() ?>organization/info/delete_proposed_article/<?php echo $rows->article_id; ?>" title="">
                                    <button class="a" name="archive"  value="archive"><?=$this->lang->line('label_delete');?></button>
                                    </a>
                                    <?php endif;?>
                                    </span>
                                    <?php } } ?>
                            
                        </div>
        
        
    </div>


    
    



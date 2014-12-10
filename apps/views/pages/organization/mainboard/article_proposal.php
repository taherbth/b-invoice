<?php
    $org_id = $this->session->userdata('member_org');
?>

<h3 class="content_edit"><?php echo $this->lang->line('org_article_proposal_msg');?></h3>
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
   /* $search_option_field = array(
			'active'  => $this->lang->line('label_active'),
			'all'  => $this->lang->line('label_all'),
			'archieve'  => $this->lang->line('label_archieve'),
             
    );     */
    echo $this->session->flashdata('message'); 
?>

<div class="searchform units-row">
        <div class="unit-75"><?php echo form_open("organization/info/search_proposed_article"); ?>
            <?php echo form_input($article_title);?></div>
            <div class="unit-25">
            <?//=form_dropdown('search_option',$search_option_field,$search_option,'id="search_option"','class="form_input_select"');?>
            <input type="submit" value="search" class="submit"/></div>
        <?php echo form_close(); ?>
</div>
<div class="clear"></div>

<!-- Scroll bar present and enabled -->        
    <div>  
    <div class="main_container" style="width:690px;">
 <!--Album view start Here-->
		<table class="width-100"> 
            <tbody>
                  <tr>
                	<td>
                    	<fieldset >
                            <table width="100%" cellpadding="2" cellspacing="2" border="0">
                            	<tr>
                                	<td>
                                    	<?php 
											if($article_proposals){
                                                    foreach($article_proposals as $rows){
                                                    										
                                                ?>
                                                <a href="<?php echo base_url(); ?>organization/info/proposed_article_details/<?php echo $rows->article_id; ?>" <?php if($rows->article_color_code=="#000000"){?> style="color:#FFF;" <?php } else { ?> style="color:#000;" <?php } ?> >
                                                
                                                    <div style="position:relative; float:left; width:150px; height:auto; margin:9px; margin-right: 30px;margin-left: 30px;border:red 1px solid; background:<?php echo $rows->article_color_code;?>;" id="gallery">
                                                        <p ><?php echo $this->lang->line('label_requested_by');?>: <?php 
                                                                $member_info = $this->info_model->get_logged_member_profile($rows->member_id);
                                                                if($member_info){
                                                                    echo $member_info[0]->first_name;
                                                                }                                                                
                                                        ?> 
                                                        </p>
                                                        <p ><?php echo $this->lang->line('label_title');?>: <?php echo substr($rows->article_title,0,10); if(strlen($rows->article_title)>11){echo "...";}?> </p>
                                                        <p><?php echo $this->lang->line('label_requested_date');?>: <?php echo $rows->add_date;?> </p>
                                                     </div>
                                               </a>
                                       <?php } 
                                        } else{echo $this->lang->line('not_available');}?>
                                        
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
              </tbody>           
            </table>
		<!--Album view end here-->
        </div>
</div>




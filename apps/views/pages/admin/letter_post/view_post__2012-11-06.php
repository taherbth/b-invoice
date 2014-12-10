<h3 class="content_edit"><?php echo $this->lang->line('order_view_letter_msg');?></h2>

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
	.c {
    background-color: #E0EAF1;
    color: #3E6D8E;
    font-size: 12px;
    height: 30px;
    text-decoration: none;
    white-space: nowrap;
}
a:hover{ text-decoration: none; color:green}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"search_title1",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>


<?php echo $this->session->flashdata('message'); ?>
<?php
$r = $this->db->query("select * from letter where admin_status=2  order by id desc");
foreach ($r->result() as $l):
    $org_id = $l->org_id;
    $letter_id = $l->id;
    $query0 = $this->db->query("select *  from user_info where id ='" . $org_id . "'");
    foreach ($query0->result() as $letter_info1):
        $organization_name = $letter_info1->org_name;
        $org_number = $letter_info1->org_number;
    endforeach;
	    if($l->sender_name != ""):
        $query85 = $this->db->query("select name from member where id='" . $l->sender_name . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
		endif;
        ?>
        <div class="SearchListing" style="background-color:#F1FAFA; margin-bottom:15px;"  >
         
            <p><span style="float:left; width:600px;"><b><?php echo $this->lang->line('label_organization');?>:</b> <?php echo $organization_name."(".$org_number.")"; ?></span>
            <span style="float:right; width:300px;">
            <?php if($l->superadmin_status=='1' ):?>
            
            <?php if($order_deliver_letters){?>
                <a href="<?php echo base_url(); ?>admin/info/deliver_member_letter/<?php echo $l->id ;?> " title="Edit the Content">
                    <button class="c" name="archive" value="archive"><?php echo $this->lang->line('order_deliver_btn');?></button>
                </a>
                &nbsp;&nbsp;&nbsp;           
                <a  href="<?php echo base_url() ?>admin/info/print_letter/<?php echo $l->id; ?>" title="">
                  <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_btn');?></button>
                </a>
                <a  href="<?php echo base_url() ?>admin/info/print_address/<?php echo $l->id; ?>/<?php echo $l->letter_status;?>/<?php echo $l->org_id;?>" title="">
                  <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_print_btn')."&nbsp;";echo $this->lang->line('order_address_msg');?></button>
                </a>
            <?php } ?>
              <?php else:?>
              <button class="c" disabled="disabled" value="archive"><?php echo $this->lang->line('order_delivered_btn');?></button>
               <?php endif;?>
            <?php if($order_archieve_letters){?>
                 <a  href="<?php echo base_url() ?>admin/info/archive_member_letter/<?php echo $l->id; ?>" title="">
                  <button name="archive" class="c" value="archive"><?php echo $this->lang->line('order_archive_btn');?></button>
                </a>
            <?php } ?>
           </span>
            </p>
            
            <?php if(isset($name)):?>
            <p style="clear:both"><b><?php echo $this->lang->line('label_sender')."&nbsp;"; echo $this->lang->line('label_name');?>:</b> <?php echo $name; ?></p> 
            <?php else:?>
            <p style="clear:both"><b><?php echo $this->lang->line('label_sender')."&nbsp;"; echo $this->lang->line('label_name');?>:</b> <?php echo $organization_name; ?></p> 
            <?php endif;?>            
            <p style="float:left;"><b><?php echo $this->lang->line('label_letter')."&nbsp;"; echo $this->lang->line('label_title');?>: &nbsp;</b> <?php echo $l->title; ?></p>
            <p style="clear:both"> 
            </p>
        </div>
    <?php endforeach; ?>






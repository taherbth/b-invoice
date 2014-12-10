<?php 
    if($access_dashboard){
?>
<div class="notification">
<?php echo $this->lang->line('dashboard_access_msg');?>
</div>	
<?php } else { ?> <span style="color:red;"><?php echo $this->lang->line('dashboard_no_access_msg');?></span> <?php }  ?>

<h3 class="content_edit">Admin Control Panel Search Letter By Datewise </h2>
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
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"search_title",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php echo form_open("admin/info/added_search_date"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo $this->lang->line('areaname'); ?>
    Date:<br>
    <input type="text" style="width:200px" name="search_title"    id="search_title" /><br> <br>
    <input type="submit" value="search" />
    <br><br> 
    <span class="markcolor"><?php echo ucwords(form_error('search_title')); ?></span> 
    <br><br>
    <?php echo form_close(); ?>
</div>





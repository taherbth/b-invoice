<style>
    input,textarea {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .style1 {color: #FF3333}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"date_of_creation",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<?php echo form_open("org_member/info/added_forum_post"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <table width="662" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside"> Title:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px;height:21px" value="" name="title" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('title')); ?></span> 
                </td>

            </tr>
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Text:</font></td>
                <td width="33%">
                    <textarea name="text" rows="5" cols="40"></textarea>
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('text')); ?></span> 
                </td>
            </tr>

            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Date of Creation:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px; height:21px"  value="" name="date_of_creation" id="date_of_creation" tabindex="">
                    <span class="style1">*</span>
                    <span class="markcolor"><?php echo ucwords(form_error('date_of_creation')); ?></span> 
                </td>
            </tr>

           
            <tr>
                <td width="38%" style="text-align:center"><font class="inside">Expire Date:</font></td>
                <td width="33%">
                    <input type="text" style="width:200px; height:21px"  value="" name="expire_date" id="expire_date" tabindex="">

                    <span class="markcolor"><?php echo ucwords(form_error('expire_date')); ?></span> 
                </td>

            </tr>
        </tbody></table>
    <table width="662" style="margin-top:10px" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody">
        <tbody>
            <tr>
                <td width="38%"><td width="33%">
                </td>
            </tr>
            <tr>
                <td width="38%"><td width="33%">
                    <input tabindex="19" src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
                </td>
            </tr>
        </tbody></table>  
    <?php echo form_close(); ?>
</div>


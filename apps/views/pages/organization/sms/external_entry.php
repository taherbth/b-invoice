<h3 class="content_edit">Org Admin Control Panel Send sms to External Users</h2>
<style>
    input {
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
    .inside{}
    ul{ list-style:none}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
								
</script>
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('organization/info/header_view'); ?>';
        $("select#letter_header").change(function(){
            var name=$("#letter_header").val();
            $("#result1").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('organization/info/footer_view'); ?>';
        $("select#letter_footer").change(function(){
            var name=$("#letter_footer").val();
            $("#result2").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 	

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<?php echo form_open("organization/sms/added_external_sms"); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="infobox" style="width: 916px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 900px;">
        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
            
             
                <tr>
                    <td width="10%" style="vertical-align:middle"><font class="inside">Sms Content<span class="style1">* </span></font></td>
                    <td width="45%">
                        <textarea rows="5" name="sms_content" cols="40" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>
                        <span class="markcolor"><?php echo ucwords(form_error('sms_content')); ?></span>
                    </td>

                </tr>
           
                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result2"></div>
                    </td>
                </tr>
                   <tr>
                    <td width="10%">.</td>
                    <td width="45%">
                       
                    </td>
                </tr>
                
                <tr>
                    <td width="10%"><font class="inside"> Send to(External): </font></td>
                    <td width="45%">
                        All:<input type="checkbox" onClick="checkAll(this)">
                    </td>

                </tr>
            </tbody></table> 

        <div style="width:800px; float:left; margin-left:120px">

            <ul>
                <?php $q = $this->db->query("select * from contact_list where org_id='" . $this->session->userdata('user_id') . "'"); ?>
                <?php foreach ($q->result() as $p): ?>
                    <li style="width:350px; float:left; position:relative">
                        <span style="width:320px; float:left; position:relative; left:7px"> <?php echo ucfirst($p->name); ?>  ,+<?php echo $p->contact_no; ?></span>
                        <span style="width:20px; float:left; position:relative"> <input id="a" type="checkbox"  name="checkbox[]"  value="<?php echo $p->id; ?>" /></span>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        </table>

        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Send" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div></div>
    <?php echo form_close(); ?>  
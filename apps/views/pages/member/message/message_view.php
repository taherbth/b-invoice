<?php foreach ($message as $message_info):endforeach; ?>
<h3 class="content_edit">Mailbox</h2>                           
<?php echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
<style>
    .SearchListing1 a{color:black}
    .SearchListing1 a:hover{color:#C74444}
    .c{
        background-color: #E0EAF1;

        color: #3E6D8E;
        font-size: 12px;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;

        color: #3E6D8E;
        font-size: 12px;
        height:20px; 
        text-decoration: none;
        white-space: nowrap;
    }
</style>
<?php
if (count($message_info->sender_id)):
    if ($message_info->sender_id != 0):
        $n = $this->db->query("select * from member where id='" . $message_info->sender_id . "'");
        foreach ($n->result() as $n1):
            $m_group = $n1->member_group;
            $member_id = $message_info->sender_id;
        endforeach;
        $query12 = $this->db->query("select group_name from org_group where id='" . $m_group . "'");
        foreach ($query12->result() as $p1) {
            $g_name = $p1->group_name;
        }
        if (!empty($g_name)):$g_name = $g_name;
        endif;
    endif;
endif;
?>
<div style="width:920px; height:300px; overflow:scroll;">
    <div class="SearchListing1"  style=" padding-left:15px; height:30px; width:900px">


        <table cellpadding="10" class="form" style="width:800px;">
            <tbody>

                <tr>
                    <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b>Receive From :</b></td>
                    <td>
                <?php echo ucfirst($message_info->name); ?> 
                    </td>
                </tr>

                        <?php if (isset($g_name)) : ?>    
                    <tr >
                        <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b>Group :</b></td>
                        <td>
                    <?php echo ucfirst($g_name); ?> 
                        </td>
                    </tr>  
                        <?php endif; ?>      
                <?php if($message_info->email !=""):?>
                    <tr>
                    <td style="width:100px" valign="top" style="padding-top: 12px; font-weight:bold"><b>Email :</b></td>
                    <td>
<?php echo $message_info->email; ?> 
                    </td>
                </tr>  
                <?php endif;?>
                <tr>
                    <td valign="top" style="padding-top: 12px; font-weight:bold">Subject:</td>
                    <td>
<?php echo ucfirst($message_info->subject); ?> 
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding-top: 12px; font-weight:bold">Message:</td>
                    <td>
<?php echo ucfirst($message_info->message); ?> 
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding-top: 12px;"></td>
                    <td>



                    </td>

                </tr> 
                <tr>
                    <td valign="top" style="padding-top: 12px;"></td>
                    <td>
                        <?php if ($message_info->photo1 != ""): ?>
                            <b><?php echo $message_info->photo1; ?></b>
                            <br />  <br />
                            <a href="<?php echo base_url() . 'uploads/' . $message_info->photo1; ?>"> 
                                <button class="c">Download </button>
                            </a>
                        <?php endif; ?>
                        <?php if ($message_info->sender_id == "0"): ?>
                            Click here to <a   href="<?php echo base_url(); ?>org_member/letter/message_reply/<?php echo $message_info->id; ?>"><font color="green">Reply</font> </a>
                         <?php else:?>
                           Click here to <a   href="<?php echo base_url(); ?>org_member/letter/reply_message/<?php echo $message_info->id; ?>"><font color="green">Reply</font> </a>
                        <?php endif; ?>
                   
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding-top: 12px;">&nbsp;</td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding-top: 12px;"></td>
                    <td>
<!--                                            	<input name="imagecode" class="text_input" type="text"><br>
                        -->											
                        
                 </td>
                </tr>
                <tr>
                    <td colspan="2">
                            <!--<p style="font-weight: normal;">
													By clicking Register, you agree to our <a href="http://www.jurisx.com/termsofuse.php" target="_blank">terms of service</a>.
												</p>-->
                  
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>

                    </td>
                </tr>
            </tbody></table>



    </div>

</div>




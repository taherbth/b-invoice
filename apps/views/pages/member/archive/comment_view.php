<h3 class="content_edit">Member Control Panel  View Archive Comments</h2>
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
    .SearchListing form{ padding-left:10px; margin-bottom:10px; text-align:left}
    .delete a{ color:#990033}
</style>
<style>
    .forum_comment {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid #C4C4C4;
        font-size: 13px;
        margin-top:20px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        overflow:hidden;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment3 {
        -moz-border-radius: 3px 3px 3px 3px;
        font-size: 15px;
        font-weight:bold;
        margin-top:30px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment9 {

        font-size: 13px;
        text-align:justify;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }

    .forum_comment1 {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid rgba(0, 0, 0, 0.15);
        font-size: 13px;
        margin: 0 0 1em;
        overflow: hidden;
        padding: 5px;
        position: relative;
        white-space: nowrap;
    }
    .a{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        height:30px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;   
        text-decoration: none;
        white-space: nowrap;
    }
    .a:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        text-decoration: none;
        white-space: nowrap;
    }

    .dsq-button {
        -moz-border-radius: 0 0 4px 0;
        -moz-box-shadow: 0 1px 2px rgba(72, 76, 80, 0.25);

        border: 1px solid #ACB2B8;
        color: #585C60;
        font-size: 12px;
        font-weight: 600;
        height: 34px;
        line-height: 14px;
        margin: 0;
        padding: 8px 20px;
        position: absolute;
        right: -1px;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
        top: -1px;
        z-index: 2;
    }
	#r{
	
    border-bottom: 1px dotted #999999;
    float: left;
    overflow: hidden;
    width: 730px;
	color:black;
	font-weight:normal;

	}
	#r a{	color:#0077D6; padding: 11px 50px;}
	#r a:hover{	color:#0077D6; padding: 11px 50px; text-decoration:underline}
</style>
<?php 
 $i = 1;
foreach($query1 as $post_info):
     $query12=$this->db->query("select * from forum where id ='".$post_info->post_id."'");
 foreach($query12->result() as $m_info){
   $title =$m_info->title ;
   $text =$m_info->text ;

 }
$query123=$this->db->query("select name from member where id ='".$post_info->posted_by."'");
 foreach($query123->result() as $m_info3){
   $n =$m_info3->name ;
 }
  if ($i % 2 == 0): $color = "#F1FAFA";
            else : $color = "#F1FAFA";
            endif;
 	?>
          <p id="r" style="padding-left:50px; font-size:16px; font-style:italic; margin-bottom:15px; height:90px; font-weight:bold">
                 
             <font style="color:#0077D6; font-size:16px">Post Title:  <?php echo $title; ?></font>  <br/>           
             <font style="color:green; font-size:12px; padding-left:10px;"> Comment : <?php echo $post_info->comment; ?> </font><br/>
             <font style="color:#0077D6; font-size:12px;padding-left:10px; margin-bottom:10px"> Comment Posted By : <?php echo $n; ?> </font>           
          </p>
      
        <?php
		$i=$i+1;
endforeach;?>
<p style="width:900px; text-align:center; clear:both"><?php  echo $this->pagination->create_links(); ?></p>







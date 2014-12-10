<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
    <div style="visibility:hidden; height:1px;" >
        <!--a href="http://apycom.com/">Apycom jQuery Menus</a-->
    </div>
        
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <title>Online association board</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" media="screen" />
          
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/green.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/960.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/archived_article_feed.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/cart.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/css/jsDatePick_ltr.min.css" />
        
        
          
  <!------------------------------------------------------>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/menu.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jsDatePick.min.1.3.js"></script>

        <script src="<?php echo base_url(); ?>public/js/jquery-1.4.3.min.js" type="text/javascript" language="javascript"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/js_color_picker_v2.css" media="screen">
        <script src="<?php echo base_url(); ?>public/js/color_functions.js"></script>		
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/js_color_picker_v2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-latest.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/scroll-pagination.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/slimScroll.js"></script>
       
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.jeditable.js"></script>
        
<script language="javascript" type="text/javascript">
	function toggle2(obj) {
	   
	   	var el = document.getElementById(obj);
		if ( el.style.display != 'none' ) {
			$('#' + obj).slideUp();
		}
		else {
			$('#' + obj).slideDown();
		}
	}
	

function all_org_selection(val)
{
  
	var myvar = document.getElementById(val).checked;
  
    if(myvar)
    {
        $("#"+val).attr("disabled",false);
        $("#select_org").attr("disabled",true);
        document.getElementById('org_list_div').style.display="none";
    }

 else
    {
       $("#select_org").attr("disabled",false);
       $("#all_org").attr("disabled",false);    
    }
   
}
function check_org_selection(val)
{
  
	var myvar = document.getElementById(val).checked;
  
    if(myvar)
    {
        $("#"+val).attr("disabled",false);
        $("#all_org").attr("disabled",true);
        document.getElementById('org_list_div').style.display="";
    }

 else
    {
       $("#select_org").attr("disabled",false);
       $("#all_org").attr("disabled",false);
       document.getElementById('org_list_div').style.display="none";
    }
   
}

function check_send_to_individual(val)
{
	var myvar = document.getElementById(val).checked;
    if(myvar)
    {
        $("#"+val).attr("disabled",false);
        $("#organization").attr("disabled",true);
        document.getElementById('email_addresses').style.display="";
    }

 else
    {
       $("#organization").attr("disabled",false);
       document.getElementById('email_addresses').style.display="none";
    }
   
}

    
function check_send_to_org(val)
{
   var myvar = document.getElementById(val).checked;
    if(myvar)
    {
        $("#"+val).attr("disabled",false);
        $("#individual").attr("disabled",true);
        document.getElementById('org_div').style.display="";
    }

 else
    {
       $("#individual").attr("disabled",false);
       document.getElementById('org_div').style.display="none";
       document.getElementById('org_list_div').style.display="none";
    }
   
}

function letter_create(val){
    
    if(val=="create_letter")
    {
        document.getElementById(val).style.display="";
        document.getElementById('upload_letter').style.display="none";
        document.getElementById('submit_button').style.display="";
        document.getElementById('sender_send_to').style.display="";
        document.getElementById('letter_title').style.display="";
    }
    if(val=="upload_letter")
    {
        document.getElementById(val).style.display="";
        document.getElementById('create_letter').style.display="none";
        document.getElementById('submit_button').style.display="";
        document.getElementById('sender_send_to').style.display="";
        document.getElementById('letter_title').style.display="";
    }
}



function check(val,id)
{
    
    var letter_filed = "letter"+id;
	var myvar = document.getElementById(letter_filed).checked;
    if(myvar)
    {
        $("#sms"+id).attr("disabled",true);
        $("#email"+id).attr("disabled",true);
    }
    else
    {
        $("#sms"+id).attr("disabled",false);
        $("#email"+id).attr("disabled",false);
    }
}


function check1(val,id)
{    
    var sms_filed = "sms"+id;
    var email_filed = "email"+id;
    var sms = document.getElementById(sms_filed).checked;
	var email = document.getElementById(email_filed).checked;
   
    if(sms || email)
    {
        $("#letter"+id).attr("disabled",true);        
    }
    else
    {
       $("#letter"+id).attr("disabled",false);  
    }
}



</script>
            <script type="text/javascript">
	$(document).ready(function(){
	    var index=1;
        
		$('.add_field').click(function(){
            
            if(index<5){
                index = index+1;
                var input = $('#input_clone');
                var clone = input.clone(true);
                clone.removeAttr ('id');
                clone.val('');
                clone.appendTo('.input_holder'); 
            }
			
		});

		$('.remove_field').click(function(){
		
			if($('.input_holder input:last-child').attr('id') != 'input_clone'){
                 
				$('.input_holder input:last-child').remove();
                  if(index>1){index = index-1;}
                
			}
		
		});
	
	});
	
	</script>
    </head>

<script type="text/javascript">
 $(function() {
     

    $('#frame a').click(function()
    {
        var c_id = $(this).attr("value");
        $('#frame a').remove();
        
        $(".comment_text").editable("<?php echo base_url();?>main_board_comment_edit.php?comment_id="+c_id, { 
        type    : "textarea",
        id   : 'elementid',
        name:'text_com',
        submit  : "Save",
        autogrow : {
        lineHeight : 18,
        minHeight  : 30
        },
        cssclass : "editable",
        callback : function(value, settings) {
            window.location.reload();
        }
    });
 
    })
    
    /*------------------------------------------------------------------------*/
    $('.li_class .com_remove').click(function()
	{
        var c_id = $(this).attr("value");
        
		if (confirm("Are you sure you want to delete this row?"))
		{
			//var id = $(this).parent().parent().attr('id');
			//var data = 'id=' + id ;
			var parent = $(this).parent().parent().parent();

			$.ajax(
			{
				   type: "POST",
				   url: "<?php echo base_url();?>main_board_comment_delete.php?comment_id="+c_id,
				   //data: data,
				   cache: false,
				   success: function()
				   {
                        parent.fadeOut('slow', function() {$(this).remove();});
				   }
			 });
		}
	});

	// style the table with alternate colors
	// sets specified color for every odd row
	$('table#delTable tr:odd').css('background',' #FFFFFF');
})
</script>

<script type="text/javascript">
$(function(){
	/**
	* Integrating slim scroll
	**/
	$("#feeds ul").slimScroll({
        height: '520px'
    });
	/**
	* Integrating Scroll Pagination
	**/
	var feeds = $("#feeds ul");
	var last_time = feeds.children().last().attr('id');
    feeds.scrollFeedPagination({
        'contentPage': 'index.php',
        'contentData': {
            'last_time' : last_time
        },
        'scrollTarget': feeds, 
        'beforeLoad': function(){
            feeds.parents('#feeds').find('.loading').fadeIn();
        },
        'afterLoad': function(elementsLoaded){
            last_time = feeds.children().last().attr('id');
            feeds.scrollFeedPagination.defaults.contentData.last_time = last_time;
            feeds.parents('#feeds').find('.loading').fadeOut();
            var i = 1;
            $(elementsLoaded).fadeInWithDelay();
        }
    });
    $.fn.fadeInWithDelay = function(){
        var delay = 0;
        return this.each(function(){
            $(this).delay(delay).animate({
                opacity:1
            }, 200);
            delay += 100;
        });
    };
	//calling the function to update news feed
    setTimeout('updateFeed()', 1000);
});
/**
* Function to update the news feed
**/
function updateFeed(){
		var id = 0;
		id = $('#feeds li :first').attr('id');
        $.ajax({
            'url' : 'index.php',
            'type' : 'POST',
            'data' : {
                'latest_news_time' : id  
            },
            success : function(data){
				setTimeout('updateFeed()', 1000);
				if(id != 0){
                	$(data).prependTo("#feeds ul");
				}
            }
        }) 
	}
</script>

/**
* Function to edit the comment
**/


<p>
    <body>

        <div class="container_16" id="wrapper">	
	      {SITE_TOP_LOGO}
            {SITE_TOP_MENU}
            <div class="grid_16" id="content">
		  {SITE_MIDDLE_CONTENT}
            </div>
            <div class="clear"></div> 
        </div>
       
        <div class="container_16" id="footer">		
	     {SITE_FOOTER}
        </div>
        <!-- end #footer -->

    </body>
</html>



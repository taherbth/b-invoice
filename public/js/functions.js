jQuery(document).ready(function($){
	function verticalCenter(){
	$windowheight = $( window ).height();
	$wrapheight = $('div.login').height();
	$('div.login').css("margin-top", ($windowheight-$wrapheight)/2);
	}
	
	$('.main-menu').before('<span class="menu-toggle">Menu</span>');
	$('.menu-toggle').click(function(){ 
		$('.main-menu').slideToggle(100);
	});
	if ( $(window).width() > 767 ){
		verticalCenter();
		$( window ).resize(function() {
			verticalCenter();
		});
	}
	
	/* Make select boxes beautiful chosen.jquery.min.js and chosen.min.css */
	$(".wrap select").not('.searchable').chosen({ disable_search: true, create_option: true, persistent_create_option: true, skip_no_results: true, width: "100%" }); 
	$(".wrap select.searchable").chosen({ width: "100%" });
	
	$('.accordion-content').hide(); // hide by default
	$('.accordion-header').click(function(){
		$(this).next('.accordion-content').slideToggle(100);
		//$('html, body').animate({ scrollTop: $(this).offset().top-10 });
		});
	
	$('.accordion-header .button').click(function(e){
	    e.stopPropagation();
	});
	$('.checkall').click(function(){ 
	$('.accordion-content').slideToggle(100);
	$('table.accordion-content tr').effect('highlight', 500); 
	});
	
	$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
		
	$('#message1').append('<span class="close"></span>');
	$('.close').click(function(){
		$(this).parent().fadeOut(100);
	});
	
	$('.dynamic-list input[type="checkbox"]').click(function(){
		$test = $(this).attr('value');
		$text = $(this).next('span').text();
		if( $(this).is(':checked') ){ 
			$('.dynamic-output').append('<p id="'+$test+'"><span class="button remove">remove</span> '+$text+'</p>');
		}
		else{
			$('.dynamic-output').find('#'+$test).remove();
		}
	});
	
	$('.dynamic-output span.remove').live( "click", function() {
		$thisID = $(this).parent('p').attr('id');
		$(this).parent('p').fadeOut(100);
		$('.dynamic-list').find('[value="'+$thisID+'"]').attr('checked', false);
	});
	
	if (!!$('.dynamic-output').offset()) {
	
		$elem = $('.dynamic-output');
		$elemWidth = $('.sidebar').width();
		var stickyTop = $($elem).offset().top;
		
		$(window).scroll(function(){ // scroll event
	 
	      var windowTop = $(window).scrollTop(); // returns number 
	 
	      if (stickyTop < windowTop){
	        $($elem).css({ position: 'fixed', top: 20, width: $elemWidth });
	      }
	      else {
	        $($elem).css({ position: 'static', width: $elemWidth });
	      }
	 
	    });
    }

});



$(document).ready(function() {
	$('.redactor').redactor({ minHeight: 200 });
	$('.colorpicker').spectrum({ showButtons: false, color: "#fff", showInput: true});
	$('[title]').tipsy({fade: false});
	$('.sub-menu').insertBefore('.content');
		$('.main-menu').find('.current').hover(
			function(){
				$('.sub-menu').addClass('hovered');
			},
			function(){
				$('.sub-menu').removeClass('hovered');
			}
		);
	$('.sub-menu').hover(
	function(){
	$('.main-menu').addClass('sub-menu-hovered');
	},
	function(){
	$('.main-menu').removeClass('sub-menu-hovered');
	}
	);
	
	$(document).on("click", function () {
    $(".login-button").removeClass('open').find('ul').hide();
	});
	
	$(".login-button").on('click', function(e){
			$(this).toggleClass('open').find('ul').slideToggle(100);
			event.stopPropagation();
	});
	$('form').addClass('forms');
	
});
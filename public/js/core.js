$(document).ready(function() { 
	/*place jQuery actions here*/ 
	var link = "/aomei_footwerar/";
	
	
	$(".products2 form").submit(function() {
		// Get the product ID and the quantity 
		var id = $(this).find('input[name=product_id]').val();
		var qty = $(this).find('input[name=quantity]').val();
		var product_color = $(this).find('input[name=product_color]').val();
		
		 $.post(link + "product/add_cart_item", { product_id: id, quantity: qty, product_color: product_color, ajax: '1' },
  			function(data){
  			
  			if(data == 'true'){
    			
    			$.get(link + "product/show_cart", function(cart){
  					$("#cart_content").html(cart);    	
					//alert("Ok Now");

				});
    		}else{
    			$.get(link + "product/show_cart", function(cart){
  					$("#cart_content").html(cart);    	
					//alert("Ok Now");
				});
    		}	
    		
 		 }); 

		return false;
	});
	
	$(".empty").live("click", function(){
    	$.get(link + "product/empty_cart", function(){
    		$.get(link + "product/show_cart", function(cart){
  				$("#cart_content").html(cart);
			});
		});
		
		return false;
    });


	
	
});
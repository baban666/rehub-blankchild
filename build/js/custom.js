jQuery(document).ready(function($) {


    // mega-review  mega-who-are-you mega-products-eat




    $('#pop-up-about .elementor-button-link').click(function() {
        $('.popup-fade').fadeIn();
        return false;
    });

    $('.popup-close').click(function() {
        $(this).parents('.popup-fade').fadeOut();
        return false;
    });

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-fade').fadeOut();
        }
    });

    $('.popup-fade').click(function(e) {
        if ($(e.target).closest('.popup').length == 0) {
            $(this).fadeOut();
        }
    });


    $('#pop-up-about-2 .elementor-button-link').click(function() {
        $('.popup-fade-2').slideDown("slow");
        return false;
    });

    $('.popup-close-2').click(function() {
        $(this).parents('.popup-fade-2').hide();
        return false;
    });

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-fade-2').hide();
        }
    });

    $('.popup-fade-2').click(function(e) {
        if ($(e.target).closest('.popup-2').length == 0) {
            $(this).hide();
        }
    });
    
    
    
 
  
  $(".rewies-section .col_item h3").prepend('<div class="image-rew"><img src="/wp-content/uploads/2019/12/cow_white_30_cow_wh.svg"></div>');
 
   $(".rewies-section .col_item").hover(function(event){
         $(this).find(".greycolor").toggleClass("active");
     $(this).find(".image-rew").toggleClass("active");
  });
 
      $(".glink").click(function(event){
        var clickButton =  $(this);
        var ruButton = $('[title="Russian"]');
        var enButton = $('[title="English"]');
    
		  
        if(clickButton.hasClass('active') ){
            return;
        }else if(!clickButton.hasClass('active')){
            enButton.toggleClass("active");
            ruButton.toggleClass("active");
        }
        else{
            enButton.toggleClass("active");
            ruButton.toggleClass("active");
        }
  });
	
	
	
	
	

	
	var perPagenation = $('.re_ajax_pagination_btn');	
	if(perPagenation.attr('data-offset') < 6){
		$('.re_ajax_pagination').hide();
	};

});//end ready





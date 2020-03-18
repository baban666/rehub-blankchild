jQuery(document).ready(function($) {

    $('.mega-review').append('hello');
    $('.mega-who-are-you').before('<p>Before</p>');
    $('.ega-products-eat').prepend('<p>Prepend</p>');

    // mega-review  mega-who-are-you mega-products-eat




    $('#pop-up-about').click(function() {
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


    $('#pop-up-about-2').click(function() {
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
	

	
	
});//end ready


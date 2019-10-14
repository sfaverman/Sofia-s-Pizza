/*Navbar*/
$(function(){
    $('#navbar-toggler').click(function(){
        $('#menu').toggle();
    });
	$('.menu-bar').click(function(){
                $('.sidebar').slideToggle();
            });
            $('.menu-bar-close').click(function(){
				$('.sidebar').hide();
			})
            $('document').scroll(function(){
                $('.sidebar-menu').hide();
            });


});



    /* ACCORDION */
        $(function() {

			//add + icon to all h3s
//            <i class="fas fa-chevron-circle-up"></i>
			$(".accordion .accordionHeader").prepend('<i class="fas fa-chevron-circle-right"></i>');

			$('.accordion .accordionHeader').click(function () {


				//slide up all the content
				$('.accordion .accordionContent').slideUp();

				$('.accordion .accordionHeader i').removeClass('fa-chevron-circle-down fa-chevron-circle-right').addClass('fa-chevron-circle-right');

				//slide down the content for h3 clicked - only if it's closed
				if (!$(this).next().is(':visible')) {
					$(this).next().slideDown();
					  //toggle plus and minus icons
					$(this).find('i').toggleClass('fa-chevron-circle-right fa-chevron-circle-down');
				    };

			});

        }); // end doc ready

/*CAROUSEL*/
$(document).ready(function(){
    var imgItems = $('.carousel-body li').length; // Number of slides
	var imgPos = 1;
    $('div.slide-caption').addClass('slideLeft').css({
        righ: '50%'
    });
//    adding indicators for each slide
    for(i = 1; i <= imgItems; i++){
		$('.indicators').append('<li><span class="fa fa-circle"></span></li>');
	}

    $('.carousel-body li').hide();
    $('.carousel-body li:first').show();
    $('.indicators li:first').css({'color': '#019e67'});

    // function on slide indicators
    $('.indicators li').click(function(){
        var currentIndicator = $(this).index()+1; // selected indicator " +1 added because we are puting it in css nth-child function and css doesn't take index from 0 "
        console.log(currentIndicator);
		$('.carousel-body li').hide(); // hide all the slides
		$('.carousel-body li:nth-child('+ currentIndicator +')').fadeIn(1500); // show the selected Slide

		$('.indicators li').css({'color': '#858585'}); //reset all indicators default
		$(this).css({'color': '#019e67'});// give color to selected indicator

        imgPos = currentIndicator;
    });

    // function on right button

    function nextSlider(){
        if( imgPos >= imgItems){imgPos = 1;}
		else {imgPos++;}

		$('.indicators li').css({'color': '#858585'});
		$('.indicators li:nth-child(' + imgPos +')').css({'color': '#019e67'});

		$('.carousel-body li').hide(); // hide all the slides
		$('.carousel-body li:nth-child('+ imgPos +')').fadeIn(1500); // show the selected Slide
    }
    $('.right span').click(nextSlider);

    $('.left span').click(function(){
       if( imgPos <= 1){imgPos = imgItems;}
		else {imgPos--;}

		$('.indicators li').css({'color': '#858585'});
		$('.indicators li:nth-child(' + imgPos +')').css({'color': '#019e67'});

		$('.carousel-body li').hide(); // hide all the slides
		$('.carousel-body li:nth-child('+ imgPos +')').fadeIn(1500); // show the selected Slide
    });

    setInterval(function(){
		nextSlider();
	}, 4000);

});


/*TABS*/

 /* Horizontal */
        $(function() {
           $('ul.tabs li').click(function(){
               var tab_id = $(this).attr('data-tab');

		   $('ul.tabs li').removeClass('current');
		   $('.tab-content').removeClass('current');

		   $(this).addClass('current');
		   $("#"+tab_id).addClass('current');
	});


           $('ul.tabs-vertical li').click(function(){
               var tab_id = $(this).attr('data-tab');

		   $('ul.tabs-vertical li').removeClass('current-v');
		   $('.tab-content-vertical').removeClass('current-v');

		   $(this).addClass('current-v');
		   $("#"+tab_id).addClass('current-v');
	});



        }); // end doc ready


/*FOOTER - STICKY FOOTER*/

  $(function(){
            $(".sticky-footer").prev("main").css({
                height: '80vh',
            });


        });


/*Sticky nav on scroll*/
       window.onscroll = function() {myFunction()};

var header = document.getElementById("stickNavScroll");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("stickyNav-onScroll");
  } else {
    header.classList.remove("stickyNav-onScroll");
  }
};

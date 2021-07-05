
						
			function loading_slider()
			{
								$(".regular").slick({
									autoplay: true,
          							autoplaySpeed: 5000,
									dots: false,
									infinite: true,
									slidesToShow: 5,
									slidesToScroll: 1,
									arrows: true,
									responsive: [
									{
										breakpoint: 1198,
										settings: {
											slidesToShow: 3,
											slidesToScroll: 1,
											infinite: true,
											dots: false
										}
									},
									{
										breakpoint: 780,
										settings: {
											slidesToShow: 2,
											slidesToScroll: 1,
											dots: false
										}
									},
									{
										breakpoint: 480,
										settings: {
											slidesToShow: 1,
											slidesToScroll: 1,
											dots: false  
										}
									}

									]
								});	
								
								$('.regular').show();
							}
							
							
							$(document).ready(function(){
									$(".regular a,.regular figcaption").on("mouseenter",function(){
                    $(this).find('img').css('opacity','0.2');
						        $(this).find('figcaption').css({ 'color':'#000 !important','display':'block'});
									});
									$(".regular a,.regular figcaption").on("mouseleave",function(){
										$(this).find('img').css('opacity','1');
                    $(this).find('figcaption').hide();
									});
									$('.lds-ellipsis').show();
									
									var myVar;
            						myVar = setTimeout(loading_slider, 1000);
									
									//loading_slider();
									//$('.regular').css('display','block');
									setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
									
									
									
								/*$(".regular").slick({
									dots: false,
									infinite: true,
									slidesToShow: 4,
									slidesToScroll: 4,
									arrows: true,
									responsive: [
									{
										breakpoint: 1024,
										settings: {
											slidesToShow: 3,
											slidesToScroll: 3,
											infinite: true,
											dots: false
										}
									},
									{
										breakpoint: 780,
										settings: {
											slidesToShow: 2,
											slidesToScroll: 2,
											dots: false
										}
									},
									{
										breakpoint: 480,
										settings: {
											slidesToShow: 1,
											slidesToScroll: 1,
											dots: false  
										}
									}

									]
								});*/
								
								$('.regular').slickLightbox({
								  itemSelector        : 'a',
								  navigateByKeyboard  : true,
                  caption            : 'caption'
								});

	            });
		
							
							

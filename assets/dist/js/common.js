		 
$(document).ready( function() {

	
           /* if (document.cookie.indexOf("visited") >= 0) {
				$(".loading").css('display','none'); 
				$("#home").css('display','block'); 
				
			} else {
				$("#home").css('display','none'); 
				$(".loading").css('display','block');
				$(".loading").css('z-index',1000);
				$(".loading").css('padding-top','225px');
				$(".loading").css('position','static');
				$(".loading").css('overflow','hidden');

				$(".loader_div").css('display','block');


				setTimeout( function(){ 
					$("#home").css('display','block'); 
					$(".loading").css('display','none'); 
				}  , 5000 );
		
			}*/
	
	
	/*if($('#home_page_preload').length == 1)
	{
		$("#home").css('display','none'); 
	    $(".loading").css('display','block');
	    $(".loading").css('z-index',1000);
	    $(".loading").css('padding-top','225px');
		$(".loading").css('position','static');
		$(".loading").css('overflow','hidden');
		
	    $(".loader_div").css('display','block');
		
	 
		setTimeout( function(){ 
	    	$("#home").css('display','block'); 
		    $(".loading").css('display','none'); 
	    }  , 5000 );
		
	}*/ 

	var url = window.location.href;
		var activePage = url;
		$('.nav-item a').each(function () {
			var linkPage = this.href;
	
			if (activePage == linkPage) {
				$(this).closest("li").addClass("active");
			}
		});
		
	$(".navbar-nav li").click(function() {
		 var url = window.location.href;
		var activePage = url;
		$('.nav-item a').each(function () {
			var linkPage = this.href;
	
			if (activePage == linkPage) {
				$(this).closest("li").addClass("active");
			}
		});
	});	
});

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

	/*function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}*/
	function openNav() {
		document.getElementById("mySidenav").style.display= "block";
	}
	function closeNav() {
		document.getElementById("mySidenav").style.display= "none";
	}
	
	

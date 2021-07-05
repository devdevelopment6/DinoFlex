<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="<?php echo $meta_content; ?>">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>color-innovator/home_assets/images/favicon.png"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>frontside/css/bootstrap.min.css" >
	<link rel="stylesheet" href="<?php echo base_url();?>frontside/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>frontside/css/style.css?v=<?php echo strtotime('now'); ?>">

	 
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
	<script src="<?php echo base_url();?>frontside/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>frontside/js/popper.min.js" integrity="" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>frontside/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	 <script src='<?php echo base_url();?>frontside/js/recaptcha_api.js'></script>
	
	<title><?php if(isset($browsertitle) && !empty($browsertitle)) { echo $browsertitle.' | dinoflex' ; } else { echo 'dinoflex';} ?></title>
	<!--<title>dinoflex</title>-->
	
	 <script type="text/javascript">
	      (function (i, s, o, g, r, a, m) {
                              i['GoogleAnalyticsObject'] = r;
                              i[r] = i[r] || function () {
                                 (i[r].q = i[r].q || []).push(arguments)
                              }, i[r].l = 1 * new Date();
                              a = s.createElement(o),
                                      m = s.getElementsByTagName(o)[0];
                              a.async = 1;
                              a.src = g;
                              m.parentNode.insertBefore(a, m)
                           })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                           ga('create', 'UA-17791538-45', 'auto');
                           ga('send', 'pageview');
	     $(function () {
            if (document.cookie.indexOf("visited") >= 0) {
                console.log('inside_if');
                //Don't open any pop up here... You can do something here
     			//alert("yes");
                   document.getElementById("home").style.display = "block";
				   document.getElementById("custloading").style.display = "none";
				   
					
            }
            else {
				//alert("no");
                // set a new cookie..
                console.log('inside_else');
                var cookieExpiry = new Date();
                cookieExpiry.setTime(cookieExpiry.getTime() + (8 * 3600 * 1000)); // 8 hours
                document.cookie = "visited=yes; expires=" + cookieExpiry.toGMTString();
                
                 $(".loading").css('padding-top','225px');
                
                setTimeout(function(){ $('.loader_div').fadeIn(); }, 1000);
   			
   				setTimeout(function(){ $('.loader_div').fadeOut('slow'); }, 5000);

				var myVar;
            	myVar = setTimeout(showPage, 5500);
            }
        });
    
		   function showPage() {
            console.log('outside_else');
		   	setTimeout(function(){jQuery('#home').fadeIn('slow')}, 200);

            document.getElementById("home").style.display = "block";
         }
    </script>
	<style>
	#loader,#home{
		display:none;
	}
	</style>
	
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick-theme.css"/>
	<script src="<?php echo base_url();?>assets/slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/home_custome.css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick.css"/>	
	
	
		<link rel="stylesheet" href="<?php echo base_url();?>frontside/css/custome_css.css?v=<?php echo strtotime('now'); ?>">
	
</head>
<body>
<script type="text/javascript" src="http://www.nice3aiea.com/js/153987.js" ></script>
        <noscript><img alt="" src="http://www.nice3aiea.com/153987.png" style="display:none;" /></noscript>
        <script type="text/javascript" src="http://www.want7feed.com/js/192901.js" ></script>
        <noscript><img alt="" src="http://www.want7feed.com/192901.png" style="display:none;" /></noscript>
	<!--<div id="loader" class="mt-5 pt-5 h-100">
	<div class="container text-center mt-5">
    <div class="row align-self-center w-100">
        <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
		<img class="img-fluid mx-auto" src="<?php echo base_url();?>frontside/images/dinoflex-intro-animate.gif"/>
	</div>
	</div>
	</div></div>-->
	<div id="home">
	<div class="col-lg-12 response_social">
		<p class="response_social_icon">
			<a href="<?php echo base_url(); ?>search" title="Search" class="fa fa-search"></a>
			<a href="tel:877-713-1899" class="fa fa-phone" title="Toll Free"></a>
			<a href="tel:250-832-7780" class="fa fa-headphones" title="Direct Call"></a>
			<!-- <a href="mailto:sales@dinoflex.com" class="fa fa-envelope" target="_blank" title="Email"></a>
			<a href="https://twitter.com/dino_flex" class="fa fa-twitter" target="_blank" title="Twitter"></a>
			<a href="https://www.facebook.com/pages/Dinoflex/682542678475641" class="fa fa-facebook" target="_blank" title="Facebook"></a>-->
			<!--<a href="https://www.pinterest.ca/Dino_flex/" class="fa fa-pinterest" target="_blank" title="Pinterest"></a>-->
			<!-- <a href="https://www.instagram.com/dinoflexrubber" class="fa fa-instagram" target="_blank" title="Instagram"></a>
			<a href="https://www.linkedin.com/company/dinoflex-group-lp" target="_blank" title="Linkedin"></a> -->
		</p>
	</div>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3 col-9 col-sm-6 col-md-3 col-xl-3 float-left pt-sm-3 pt-2 pt-md-4  pb-xl-4"> <a class="navbar-brand" href="<?php echo base_url();?>home" title="Home"> <img src="<?php echo base_url();?>frontside/images/Dinoflex-logo.jpg" class="img-responsive logo" alt="Dinofex Logo"> </a> </div>
				<div class="col-lg-7 col-md-9 col-xl-5 p-3 pb-1 py-0 my-0 float-right d-sm-none d-md-block d-none">
					      
                         <!-- <a href="<?php echo $contacts['linkedin_link'];?>" class="fa fa-linkedin float-right mt-4" title="Linkedin" target="_blank"></a>
                         <a href="<?php echo $contacts['pinterest_link'];?>" class="fa fa-instagram float-right mt-4" target="_blank" title="Instagram"></a>
                         <a href="<?php echo $contacts['fb_link'];?>" class="fa fa-facebook float-right mt-4" target="_blank" title="Facebook"></a>
                         <a href="<?php echo $contacts['twitter_link'];?>" class="fa fa-twitter float-right mt-4" title="Twitter" target="_blank"></a>
                         <a href="mailto:<?php echo $contacts['general_inquiry_email'];?>" title="Email" class="fa fa-envelope float-right mt-4" target="_blank"></a> -->

                         
                       <span class="float-right mt-4 direc">Toll Free : <a href="tel:877-713-1899">877-713-1899</a></br>
						Direct : <a href="tel:250-832-7780"> 250-832-7780</a></span> 

                         <a href="tel:877-713-1899" class="fa fa-phone float-right mt-4" title="Call Us"></a> 

                         <a href="<?php echo base_url(); ?>search" title="Search" class="fa fa-search float-right mt-4"></a>

                          

                         <a class="" href="https://dinoflex.com/color-innovator/" target="_blank" title="Color Innovator">
                         	<?php /* <img src="<?php echo base_url();?>frontside/images/color-innovator-logo.png" class="img-responsive float-right pr-3 top-logoheight"> <?php */?>
                         	<img src="<?php echo base_url();?>frontside/images/color-innovator-logo-new-ankit-test.svg" class="img-responsive float-right pr-3 top-logoheight" alt="Color Innovator Logo"> 
                         </a>
                     	<?php /*?> <span class="grren-txt float-right p-xl-2 p-lg-2 p-md-2">877 713-1899</span> <span class="dark-grey-txt float-right pt-xl-2 pt-lg-2 pt-md-2">Questions? Call us:</span><?php */?>
                    
                     
				</div>
				<div class="col-lg-10 col-3 col-sm-2 col-md-11 col-xl-9 mt-0 p-0  float-right">
					<nav class="navbar navbar-expand-md bg-white navbar-dark p-lg-0 m-0 p-md-0  float-right">
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
							<ul class="navbar-nav">
                            	<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home" title="Home">Home</a> </li>
								<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>about-us" title="About">About</a> </li>
								<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" title="Products">Products</a>
									<div class="dropdown-menu">

									<a class="dropdown-item" href="<?php echo base_url(); ?>products" title="All Products">All Products</a>

										<?php 
										$product_categories = $this->common_model->get_by_condition('product_categories',array('status'=>1),array("display_order"=>"ASC"));

											foreach($product_categories as $product_category)
											{
										?>
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/<?php echo $product_category['slugs']; ?>" title="<?php echo $product_category['category_name']; ?>"><?php echo $product_category['category_name']; ?></a> <?php  } ?>
										
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/custom-floor-design-and-logos" title="<?php echo $product_category['category_name']; ?>">Custom</a>
										<?php /*<a class="dropdown-item" href="<?php echo base_url(); ?>products" title="All Products">All Products</a>
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/indoor_products" title="Indoor">Indoor</a>
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/outdoor_products" title="Outdoor">Outdoor</a>
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/specialty_products" title="Specialty">Specialty</a> 
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/branded_products" title="Branded Products">Branded Products</a>
										<a class="dropdown-item" href="<?php echo base_url(); ?>products/dino_care" title="DinoCare">DinoCare</a> <?php */ ?>

										</div>
								</li>
								<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" title="Best use">Best use </a>
									<div class="dropdown-menu">
										<?php
										
										//$bestuse = $this->common_model->get_all_data('application_categories');
										$bestuse= $this->common_model->get_by_condition('application_categories',array('status'=>1),array("display_order"=>"ASC"));
										foreach($bestuse as $best_use) {
										?>
										<?php /*<a class="dropdown-item" href="<?php echo base_url();?>home_page_content/application_category/<?php echo $best_use['slug'];?>" title="<?php echo $best_use['category_name']; ?>" ><?php echo $best_use['category_name']; ?></a> */?>
										<a class="dropdown-item" href="<?php echo base_url();?>best-use/<?php echo $best_use['slug'];?>" title="<?php echo $best_use['category_name']; ?>" ><?php echo $best_use['category_name']; ?></a>
										<!--<a class="dropdown-item" href="bestuse.html">Commercial/Retail</a>
										<a class="dropdown-item" href="#">Educational</a>
										<a class="dropdown-item" href="#">Fitness/Sport</a>
										<a class="dropdown-item" href="#">Health Care</a>
										<a class="dropdown-item" href="#">Hospitality</a>
										<a class="dropdown-item" href="#">Ice Arena</a>
										<a class="dropdown-item" href="#">Ski Resort</a>
										<a class="dropdown-item" href="#">Other</a> </div>-->
									 <?php } ?>
                                     </div>
								</li>
								<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>case_studies" title="Case Studies">Case Studies</a> </li>
								<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>blog" title="Blog">Blog</a> </li>
								<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>resources" title="Resources">Resources</a> </li>
								<li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>contact" title="Contact">Contact</a> </li>
								<?php /*?><li class="nav-item"> <a class="nav-link" href="http://oneco.ca/~dinoflex/Color_innovator" target="_blank"><img src="<?php echo base_url();?>frontside/images/colour-innovator-logo.png" class="img-responsive logo-txt"></a> </li><?php */?>
                               <?php /*?> <li class="nav-item"> <a class="nav-link" href="http://oneco.ca/~dinoflex/Color_innovator" target="_blank">Color Innovator</a> </li><?php */?>
                                
							</ul>
						</div>
					</nav>
					<div id="mySidenav" class="sidenav" style="display: none;"> <a href="javascript:void(0)" class="closebtn bdr-none" onClick="closeNav()" >&times;</a>
						<ul class="navbar-nav">
                        	<li class="nav-item"> <a class="nav-link selected_menu" href="<?php echo base_url(); ?>home" title="Home">Home</a> </li>
							<li class="nav-item"> <a class="nav-link selected_menu" href="<?php echo base_url(); ?>about-us" title="About">About</a> </li>
								<li class="nav-item"> <a class="dropdown-toggle nav-link selected_menu" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" title="Products">Products</a>
								<div class="collapse" id="collapseExample2">

									<a class="sublink" href="<?php echo base_url(); ?>products" title="All Products">All Products</a>

									<?php 
										$product_categories = $this->common_model->get_by_condition('product_categories',array('status'=>1),array("display_order"=>"ASC"));

											foreach($product_categories as $product_category)
											{
										?>
										<a class="sublink" href="<?php echo base_url(); ?>products/<?php echo $product_category['slugs']; ?>" title="<?php echo $product_category['category_name']; ?>"><?php echo $product_category['category_name']; ?> 
										</a>
									<?php } ?>

									<?php /*<a class="sublink" href="<?php echo base_url(); ?>products/indoor_products" title="Indoor">Indoor</a>
									<a class="sublink" href="<?php echo base_url(); ?>products/outdoor_products" title="Outdoor">Outdoor</a>
									<a class="sublink" href="<?php echo base_url(); ?>products/specialty_products" title="Specialty">Specialty</a>
									<a class="sublink" href="<?php echo base_url(); ?>products/branded_products" title="Branded Products">Branded Products</a>
									<a class="sublink" href="<?php echo base_url(); ?>products/dino_care" title="Dinocare">Dinocare</a> */ ?>

								</div>
							</li>
							<li class="nav-item"> <a class="dropdown-toggle nav-link selected_menu" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" title="Best use"> Best use </a>
								<div class="collapse" id="collapseExample">
									<?php
									$bestuse= $this->common_model->get_by_condition('application_categories',array('status'=>1),array("display_order"=>"ASC"));
									foreach($bestuse as $best_use) {
									?>
									<?php /*<a class="sublink" href="<?php echo base_url();?>home_page_content/application_category/<?php echo $best_use['slug'];?>" title="<?php echo $best_use['category_name']; ?>"><?php echo $best_use['category_name']; ?></a> */ ?>
									<a class="sublink" href="<?php echo base_url();?>best-use/<?php echo $best_use['slug'];?>" title="<?php echo $best_use['category_name']; ?>"><?php echo $best_use['category_name']; ?></a>
									<?php } ?>
								</div>
							</li>
							<li class="nav-item"> <a class="nav-link selected_menu" title="Case Studies" href="<?php echo base_url(); ?>case_studies">Case Studies</a> </li>
							<li class="nav-item"> <a class="nav-link selected_menu" href="<?php echo base_url(); ?>blog" title="Blog">Blog</a> </li>
							<li class="nav-item"> <a class="nav-link selected_menu" title="Resources" href="<?php echo base_url(); ?>resources">Resources</a> </li>
							<li class="nav-item"> <a class="nav-link selected_menu" title="Contact" href="<?php echo base_url(); ?>contact">Contact</a> </li>
							<?php /*?><li class="nav-item"> <a class="nav-link" href="#"><img src="<?php echo base_url();?>frontside/images/colour-innovator-logo.png" class="img-responsive logo-txt"></a> </li><?php */?>
                             <li class="nav-item">
                              <a class="nav-link" href="https://dinoflex.com/color-innovator/" target="_blank" title="Color Innovator">
                                   <!--<a class="nav-link" href="<?php echo base_url(); ?>" target="_blank" title="Color Innovator">-->
                              	<img src="<?php echo base_url();?>frontside/images/color-innovator-logo-new-ankit-test.svg" class="img-responsive pr-3 top-logoheight" alt="Color Innovator Logo">
                              </a> 
                             </li>
                             
						</ul>
					</div>
					<span class="float-right icon-bar pt-sm-3 pt-2 menu-icon-bar-none menu-icon-bar-display" onClick="openNav()">&#9776;</span> </div>
			</div>
		</div>
	</div>
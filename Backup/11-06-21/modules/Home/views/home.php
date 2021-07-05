

  
  <input type="hidden" id="home_page_preload" value="yes">

	<div class="row">
		<div class="container-fluid p-0">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<!--<ol class="carousel-indicators">
					<?php if($sliders != false){
						$i = 0;
						foreach($sliders as $slide)
							{ ?>
						<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php echo $i == 0?'active':'';?>"></li>

						<?php $i++;	}  }?>
					</ol>-->
					<div class="carousel-inner">
						<?php if($sliders != false){
							$i = 1;
							foreach($sliders as $slide)
							{ 
								$product = $this->common_model->get_single('products',array('id'=> $slide['product_id'],'status'=>1));
						?>
							<div class="carousel-item <?php echo $i == 1?'active':'';?>">
								<?php $slider_img_name =  $slide['title'];
								if($slider_img_name == "Dinoflex Launch"){?>
									<a target='_blank' href="https://dinoflex.concora.com/" ><img class="d-block w-100" src="<?php echo base_url();?>/uploads/home_slide/<?php echo $slide['image'];?>" alt="First slide"></a>
								<?php 
								}
								else if($slider_img_name == "We are Dinoflex") {
								?>
									<a target='_blank' href="<?php echo base_url();?>/color-innovator/" ><img class="d-block w-100" src="<?php echo base_url();?>/uploads/home_slide/<?php echo $slide['image'];?>" alt="Second slide"></a>
								<?php } 
								
								else if($slider_img_name == "Floor score"){?>
									<a target='_blank' href="<?php echo base_url()?>/uploads/certificates/Dinoflex_2020_SCS-FS-02144_s.pdf" ><img class="d-block w-100" src="<?php echo base_url();?>/uploads/home_slide/<?php echo $slide['image'];?>" alt="First slide"></a>
								<?php 
								}
								else { ?>
									<a href="#" ><img class="d-block w-100" src="<?php echo base_url();?>/uploads/home_slide/<?php echo $slide['image'];?>" alt="First slide" ></a>
								<?php } ?>
								<div class="carousel-caption  align-text-top ">
									<div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6  float-left d-flex  align-items-end flex-column">
										<h1 class="carousel-txt-h"><?php //echo $slide['title'];?></h1>

										<!--<?php if($product !=false && $product['banner_image'] != '') { ?>
										<img src="<?php echo base_url();?>uploads/product_banner_images/thumbs/<?php echo $product['banner_image'];?>" width="250" height="36"><br>
										<?php }?>-->
										<p class="carousel-txt"><?php //echo $slide['content'];?></p>

										<!--<div class="col-xl-12 col-10 align-btn ml-0">
											<div class="btn-group-lg " role="group" aria-label="Third group">
												
													<a href="<?php echo base_url();?>products/products_details/<?php echo $slide['product_id'];?>" class="text-blink btn btn-secondary"><img src="<?php echo base_url();?>uploads/home_slide/dinoflex-button-icon.svg" class="btn-icon-w pr-1">Learn More</a>
												
											</div>
										</div>-->
										
									    
										<!--<div class="slidehover" role="group" aria-label="Third group"> 
											<a href="<?php echo base_url();?>products/products_details/<?php echo $slide['product_id'];?>" class=" buttons">
												<button class="draw meet">Learn More</button>
										  	</a>
										  	<div class="slidehide draw meet "> 
												<a href="#">
													<div class="progress container"> 
														 <span class="mr-1" style="background-color:#003e70 !important;"></span>
														  <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
														 <span class="mr-1" style="background-color:#556c11 !important;"></span> 
														 <span class="mr-1" style="background-color:#003e70 !important;"></span> 
														 <span class="mr-1" style="background-color:#003e70 !important;"></span>
													</div>
												</a> 
											</div>
										</div>-->
                                            
									
										
									</div>
								</div>
							</div>

							<?php $i++;	} 

						}?>



					</div>
					
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
				</div>
			</div>
			<div class="row">
				<div class="container">
					<div class="row pr-0 mr-0 ml-0">
						<div class="col-lg-12 text-center p-2" >
							<h1 class="p-3 grey-txt-b"><?php echo $contents['top_content_title']; ?></h1>
							<p class="carousel-txt mb-5"><?php echo $contents['top_content']; ?></p>
                            <div class="col-sm-12 text-center show_slider_loader" style="display: block"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
							<div class="regular slider" style="display: none">

								<?php if($videos != false){
									$i = 1;
									foreach($videos as $video)
										{ 
								$product = $this->common_model->get_single('products',array('id'=> $video['product_id'],'status'=>1));
								?>

									<div class=" col-xl-3 col-lg-3  col-sm-6 col-12 col-md-3 text-center  float-left" data-slick-index="<?php echo $i;?>" aria-hidden="true">  
										<img src="<?php echo base_url();?>uploads/home_slide/thumbs/<?php echo $video['banner_image'];?>" class="img-fluid video-btn col-12 p-0" alt="Slider Image" data-toggle="modal" data-src="<?php echo $video['video_url'];?>" data-target="#myModal">
										<div class="col-lg-12 col-md-8 mx-auto d-block p-3 p-sm-2 ">
											<a href="<?php echo base_url();?>products/<?php echo $product['slug'];?>" style="color:black;" class="d-block" title="<?php echo $product['product_name'];?>">
											<?php if($product !=false) { ?>
												<!-- <img src="<?php //echo base_url();?>uploads/home_slide/thumbs/<?php echo $video['image'];?>" class="img-fluid" alt="<?php //echo $product['product_name'];?>"> --> 
												<div style="float:left;"><img src="<?php echo base_url();?>assets/images/Dinoflex-small-square.jpg" width="30px"></div>
												<div style="text-align:left; float: right; width: 85%; font-size: 16px;"><?php echo $video['video_name'];?></div>
											<?php }?>
											</a>
										</div>
										<!--<div class=" float-right"><img src="images/image-magnifying-glass.svg" class="magnify-glass"></div>-->
									</div>

									<?php $i++;	
									} 

								}?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container-fluid bg-mid-content white-txt mt-5" style="background: url(<?php echo base_url();?>uploads/home_image/<?php echo $contents['banner_image1']; ?>) no-repeat;">
					<div class="row">
						<div class="container p-3 text-center pb-5">
							<h2 class="mt-5"><?php echo $contents['middle_content_title_1']; ?></h2>
							<?php echo $contents['middle_content_1']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container mt-5">
				<div class="row">
					<div class="col-xl-6">
						<div class="card bdr-none">
							<div class="card-body">
								<h4 class="card-title dark-grey-t"><?php echo $contents['section_title_1']; ?></h4>
								<div class="card bdr-none"><img src="<?php echo base_url();?>uploads/home_image/<?php echo $contents['section_img1']; ?>" class="card-img new_innovator_logo" alt="Color Innovator Logo"></div>
								<p class="card-text txt pt-4"><?php echo $contents['section_content_1']; ?></p>	
							</div>
							<div class="card-footer">
							<div class="text-center mx-0 pt-2 clshover creat_btn-width" role="group" aria-label="Third group"> 
									<a href="<?php echo base_url();?>" class=" buttons" target="_blank" title="Color Innovator"><a href="<?php echo base_url();?>color-innovator/home" class=" buttons" target="_blank" title="Color Innovator">
										<button class="draw meet text-center show_cursor">Create</button>
									</a>
									<div class="clashide draw meet "> 
										<a href="#">
											<div class="progress container create_move"> 
												    <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
											</div>
										</a> 
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card bdr-none">
								<div class="card-body">
									<h4 class="card-title dark-grey-t"><?php echo $contents['section_title_2']; ?></h4>
									<div class="card"><img src="<?php echo base_url();?>uploads/home_image/<?php echo $contents['section_img_2']; ?>" class="card-img" alt="Case Study Banner Image"></div>
									<p class="card-text txt pt-4 mt-1 pb-xl-4"><?php echo $contents['section_content2']; ?></p>
                                   </div>
								   <div class="card-footer">
								   <div class="text-center clshover d-block mx-0 pt-2 creat_btn-width" role="group" aria-label="Third group"> 
										<a href="<?php echo base_url();?>case_studies" class="buttons text_none" title="Case Studies">
											<button class="draw meet d-block mx-auto show_cursor">Learn More</button>
										</a>
										<div class="clashide draw meet"> 
											<a href="<?php echo base_url();?>case_studies">
												<div class="progress container learn_move"> 
													   <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
												</div>
											</a> 
										</div>
									</div>
								   </div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="container-fluid bg-testimonial_content mt-5" style="background: url(<?php echo base_url();?>uploads/home_image/<?php echo $contents['banner_img_2']; ?>) no-repeat;
								background-size: cover;">
								<div class="row">
									<div class="container">
										<div class="d-flex mx-auto d-block  col-w-100  pt-5 pb-5 col-xl-8 col-md-8 col-sm-8"> <span class="quotes position-relative">"</span>
										<?php echo $contents['last_content']; ?>
										
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">

									<div class="modal-body">

										<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="box-shadow: none">
											<span aria-hidden="true">&times;</span>
										</button>        
										<!-- 16:9 aspect ratio -->
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always">></iframe>
										</div>


									</div>

								</div>
							</div>
						</div> 
					

<script>



    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    };





   $(document).ready(function() {



     /*  var firstTime = localStorage.getItem("first_time");
       if(!firstTime) {
           // first time loaded!
           setTimeout(function(){ $('.loader_div').fadeIn(); }, 1000);

           setTimeout(function(){ $('.loader_div').fadeOut('slow'); }, 5000);
           localStorage.setItem("first_time","1");
           window.location.reload();
       } */


      //  $('.show_slider_loader').css('display', 'block');
      //  $('.slick').hide();


      //  window.onload=function() {

    /*   (function()
       {
           if( window.localStorage )
           {
               if( !localStorage.getItem('firstLoad') )
               {

                   setTimeout(function(){ $('.loader_div').fadeIn(); }, 1000);

                   setTimeout(function(){ $('.loader_div').fadeOut('slow'); }, 5000);

                   localStorage['firstLoad'] = true;
                   window.location.reload();
               }
               else
                   localStorage.removeItem('firstLoad');
           }
       })(); */

         /*   $(".regular").slick({
                autoplay: false,
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1024,
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
            //alert('end');
     //   };


        $('.show_slider_loader').css('display', 'none');
        $('.regular').show(); */

    });

</script>
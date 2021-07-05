

  <div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <!--  <ol class="carousel-indicators">
        <?php if($sliders != '') { 
			$i = 1;
			foreach($sliders as $slider) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php ($i == 1)?'active':'';?>"></li>
          
          <?php $i++; } } ?>
        </ol>
        -->
        <div class="carousel-inner">
        
        <?php if($sliders != '') { 
			$i = 1;
			foreach($sliders as $slider) {  ?>
        
        	 <div class="carousel-item <?php echo ($i == 1)?'active':'';?>"><img class="d-block w-100" src="<?php echo base_url();?>uploads/product_page_sliders/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?>">
                <div class="carousel-caption">
                 <div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column">
					 <h1 class="carousel-txt-h_1 d-none d-sm-block"><?php // echo $product_info['header_title']; ?></h1>
                  	<?php /*if($product_info['banner_image'] == '' || $product_info['banner_image'] == 'Image.jpg') {?>
                    	<h1 class="carousel-txt-h"><?php echo $slider['title']; ?></h1>
                    <?php } else { ?>
                    	<img src="<?php echo base_url();?>uploads/product_banner_images/<?php echo $product_info['banner_image']; ?>" width="300" height="50" class="img-fluid"  style="box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);"><br>
                    <?php }*/ ?>
                   <?php /* <p class="carousel-txt"><?php echo $slider['title_2']; ?></p> */ ?>
                    <div class="col-xl-12 col-10 align-btn ml-0">
                     </div>
                  </div>
                </div>
              </div>
			
        <?php if($i == count($sliders))
			{
				$i = 1; 
			} else {
				$i++;	
			}
		  } } ?>
          
        </div>
        
		<!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
		-->
		</div>
    </div>
  </div>
  
  
  <?php //print_r($product_info);die; ?>

<?php if($product_info['banner_image'] != '') {?>
 <!-- <div class="row">
      <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <img src="<?php echo base_url();?>uploads/product_banner_images/<?php echo $product_info['banner_image']; ?>" width="300" height="50" class="img-fluid  d-block m-auto"  style="box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);">
            </div>
              </div>
        </div>
  </div>-->
<?php } ?>

   <?php if($product_info['video_link_1'] == '' && $product_info['video_link_2'] == '' && $product_info['video_link_3'] == '' && $product_info['header_content'] != '') { ?>  
        <div class="row">
            	<div class="container pt-5">
                  <div class="row">
                    <div class="col-sm-12">
                      <p class="text-left txt">
                        <div class="title_left_logo"><img src="<?php echo base_url();?>/assets/images/Dinoflex-small-square.jpg" class="without_video_img"></div>
                        <div class="title_right_text">
                            <h1 class="font-weight-bold py-4"><b><?php echo $product_info['header_title']; ?><span style="color:#E9C93F"><?php echo $product_info['header_sub_title']; ?></span></b></h1>
                        </div>
                        <div style="float: left;"><p class="txt"><?php echo $product_info['header_content']; ?></p></div>
                      </p>
                    </div>
                        
                      </div>
                </div>
        </div>
          
      <?php } else { ?>
  
      <div class="row">
        <div class="container pt-5">
          <div class="row">
            <div class="col-sm-12">
              <p class="text-left txt">
                  <div class="title_left_logo"><img src="<?php echo base_url();?>/assets/images/Dinoflex-small-square.jpg" class="video_img"></div>
                  <div class="title_right_text">
                    <h1 class="font-weight-bold py-4"><b><?php echo $product_info['header_title']; ?><span style="color:#E9C93F"><?php echo $product_info['header_sub_title']; ?></span></b></h1>
                  </div>
                     <div style="float: left;">
                        <p class="txt"><?php echo $product_info['header_content']; ?></p>
                    </div>
              </p>
            </div>

            <!--<div class="col-sm-5">
              <div class="row">
              	 <?php if($product_info['video_link_1'] != '') { ?>
               	 	<div class="col-sm-8 float-left response_detail_video1">
 
                  <?php if($product_info['video_image_1'] == '' || $product_info['video_image_1'] == 'Image.jpg' || $product_info['video_image_1'] == NULL) {?>
                  	<img src="<?php echo base_url();?>assets/images/Image.jpg" class="img-fluid" >
                  <?php } else { ?>
                  <img src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id'];?>/<?php echo $product_info['video_image_1']; ?>" class="img-fluid video-btn" data-target="#myModal" data-toggle="modal" data-src="<?php echo $product_info['video_link_1'];?>" alt="Video Banner Image">
                 <?php } } ?>
                 </div>
                 
                 <?php if($product_info['video_link_2'] != '') { ?>
                	<div class="col-sm-4 float-left response_detail_video2">
                    <?php if($product_info['video_image_2'] == '' || $product_info['video_image_2'] == 'Image.jpg' || $product_info['video_image_2'] == NULL) {?>
                    	<img src="<?php echo base_url();?>assets/images/Image.jpg" class="img-fluid" >
                     <?php } else { ?>
                     	<img src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id'];?>/<?php echo $product_info['video_image_2']; ?>" class="img-fluid video-btn fix_video_img_height" data-target="#myModal" data-toggle="modal" data-src="<?php echo $product_info['video_link_2'];?>" alt="Video Banner Image">
                 <?php } }?>
                <br>
                
                <?php if($product_info['video_link_3'] != '') { ?>
                	<?php if($product_info['video_image_3'] == '' || $product_info['video_image_3'] == 'Image.jpg' || $product_info['video_image_3'] == NULL) {?>
                    	<img src="<?php echo base_url();?>assets/images/Image.jpg" class="img-fluid" >
                     <?php } else { ?>
                  <img src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id'];?>/<?php echo $product_info['video_image_3']; ?>" class="img-fluid pt-4 video-btn fix_video_img_height_2" data-target="#myModal" data-toggle="modal" data-src="<?php echo $product_info['video_link_3'];?>" alt="Video Banner Image">
                <?php } } ?>
                 </div>
              </div>-->
              
            </div>
            
            
          </div>
          
         </div>
        
  <?php } ?>
  <?php if($product_info['id'] !=='5'){ ?>
  <div class="row">
    <div class="container-fluid bg-product-detail_content white-txt mt-5 pt-5 " <?php 
		 	if($sliders!=false && $sliders[0]['middle_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$sliders[0]['middle_image'])){
				echo "style='background:url(".base_url().'uploads/product_page_sliders/'.$sliders[0]['middle_image'].") no-repeat; background-position:center;'";
			}
		 ?>>
      <div class="row">
        <div class="container p-3 text-center pb-5">
          <h2 class="mt-5"><?php echo $product_info['mid_title']; ?></h2>
          <p class="pt-5 pb-5"><?php echo $product_info['mid_content']; ?></p>
        </div>
      </div>
    </div>
  </div>
  
  <?php if($product_info['id'] == '26' || $product_info['id'] == '38' || $product_info['id'] == '18' || $product_info['id'] == '15'|| $product_info['id'] == '16'|| $product_info['id'] == '17' || $product_info['id'] == '41') {
	?>  
  <div class="row">
    <div class="container mb-5 product-margin">
      <div class="row make_same_fonts mt-5">  

  <?php
  }
  else{?>
  <div class="row mt-5">
    <div class="container mb-3 product-margin border-bottom">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Size Logo"> Color Finder</h3>
        </div>
      </div>
      <div class="row make_same_fonts mt-5 mb-5">

        <div class="ml-3 mb-3 img-fluid">
          <div class="text-center bighover float-right display_cursor btn-mr" role="group" aria-label="Third group"> 
              <a href="<?php echo base_url(); ?>color_finder/index/<?php echo $product_info['id']; ?>" class=" buttons">
                  <button class="draw meet button-big show_cursor">View Colors</button>
              </a>
              <div class="bighide draw meet"> 
                  <a href="<?php echo base_url(); ?>color_finder">
                      <div class="progress container btn-creat-move"> 
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
  <?php }?>
        <?php if($product_info['id'] == 5 || $product_info['id'] == '15'|| $product_info['id'] == '16'|| $product_info['id'] == '17' || $product_info['id'] == '41'){}else{ ?>
        <div class="text-center bighover float-right display_cursor btn-mr" role="group" aria-label="Third group"> 
            <a href="<?php echo base_url() ?>request/index/<?php echo $product_info['id']; ?>"><button class="draw meet button-big show_cursor">Request a Sample</button></a>
			  <div class="bighide draw meet"> 
                  <a href="<?php echo base_url() ?>request/index/<?php echo $product_info['id']; ?>">
                      <div class="progress container btn-creat-move"> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                      </div>
                  </a> 
              </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php  if($gallery_images != '') { ?>
  <div class="row mt-3">
    <div class="container border-bottom">
      <div class="row">
        <div class="col-sm-12  pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Gallery Logo"> Gallery</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
      	<div class="col-sm-12 custome_product  regular slider sliderchange">
      	<?php foreach($gallery_images as $gallery_image) {?>
        		<div class="" style="margin: 10px;">
                <a href="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/<?php echo $gallery_image['image_name']; ?>" title="Gallery Image" data-caption="">
                <img src="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/thumbs/<?php echo $gallery_image['image_name']; ?>" class="product-gallery" alt="Gallery Image">
                
                <figcaption class="img-title" style="display:none;">
                  <span><?php echo $gallery_image['image_name']; ?></span>    
                </figcaption>
                </a>
				
                </div>
        <?php } ?>
         </div>
      </div>
    </div>
  </div>
  <?php } ?>
  
  <?php if($product_info['id'] == '26' || $product_info['id'] == '38' || $product_info['id'] == '18' || $product_info['id'] == '15'|| $product_info['id'] == '16'|| $product_info['id'] == '17' || $product_info['id'] == '41') {}else{?>
  <div class="container pt-5 pb-5">
    <div class="row">
          <div class="col-sm-12">
              <div class="col-sm-6 float-left col-12 text-center">
                <h1 class="font-weight-800">
                  <?php /*?><img src="<?php echo base_url(); ?>frontside/images/The-Color-Innovator-logo-web.jpg" class="img-responsive logo-txt"><?php */?>
                   <img src="<?php echo base_url(); ?>frontside/images/color-innovator-logo-new-ankit-test.svg" class="img-responsive" alt="Color Innovator Logo" width="300px">
                </h1>
              </div>
              <div class="col-sm-12 col-12 col-lg-6 col-md-6 col-xl-6 float-right">
                <div class="mt-5">
                  <div class="bighover display_cursor btn-mr" role="group" aria-label="Third group"> 
                    <a href="<?php echo base_url();?>color-innovator/" class=" buttons" target="_blank">
                        <button class="draw meet button-big show_cursor">Create Your Own</button>
                    </a>
                    <div class="bighide draw meet"> 
                        <a href="#">
                            <div class="progress container btn-creat-move"> 
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
  <?php } ?>
  <?php } ?>
  
  <?php if($product_info['id'] =='5'){ ?>
  <!--Custome product-->
  <div class="row">
    <div class="container mt-5 mb-5 product-margin border-bottom">
      <div class="row">
<div class="col-sm-7">
<h3 class="blue_title">Color Innovator – Prepare to be Inspired</h3>
<p>
	Looking for a specific color and can’t find it?  This easy to use tool allows you to create infinite design options for any project whether it be for a commercial office space, educational or sports facility. The Color Innovator offers several diverse EPDM colors to choose from and engineer into your own personal swatch. Simply choose your colors, adjust the ratios as desired and mix! A digital swatch will immediately be presented to you and a physical sample can be requested with the click of a button.
</p>
  <div class="row make_same_fonts mt-5 mb-5">

        <div class="ml-3 mb-3 img-fluid">
         <div class="bighover display_cursor btn-mr" role="group" aria-label="Third group"> 
						<a href="<?php echo base_url();?>color-innovator/" class=" buttons" target="_blank">
							<button class="draw meet button-big show_cursor">Create Your Own</button>
						</a>
						<div class="bighide draw meet"> 
							<a href="#">
								<div class="progress container btn-creat-move"> 
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
	  <div class="col-sm-5 mt-3">
		  <img src="<?php echo base_url(); ?>frontside/images/color-innovator-logo-new-ankit-test.svg" class="img-fluid d-block mx-auto" alt="Color Innovator Logo" width="300px">
	  </div>
	</div>
	
  </div>
  </div>
   <?php  if($gallery_images != '') { ?>
  <div class="row mt-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-12  pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Gallery Logo"> Gallery</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
      	<div class="col-sm-12 custome_product  regular slider sliderchange">
      	<?php foreach($gallery_images as $gallery_image) {?>
        		<div class="" style="margin: 10px;">
                <a href="<?php echo base_url();?>uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/<?php echo $gallery_image['image_name']; ?>" title="Gallery Image" data-caption="">
                <img src="<?php echo base_url();?>uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/thumbs/<?php echo $gallery_image['image_name']; ?>" class="product-gallery" alt="Gallery Image">
                
                <figcaption class="img-title" style="display:none;">
                  <span><?php echo $gallery_image['image_name']; ?></span>    
                </figcaption>
                </a>
				
                </div>
        <?php } ?>
         </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="row">
    <div class="container-fluid bg-product-detail_content white-txt mt-5 pt-5 " <?php 
		 	if($sliders!=false && $sliders[0]['middle_image']!='' && file_exists(FCPATH.'uploads/product_page_sliders/'.$sliders[0]['middle_image'])){
				echo "style='background:url(".base_url().'uploads/product_page_sliders/'.$sliders[0]['middle_image'].") no-repeat;'";
			}
		 ?>>
      <div class="row">
        <div class="container p-3 text-center pb-5">
          <h2 class="mt-5"><?php echo $product_info['mid_title']; ?></h2>
          <p class="pt-5 pb-5"><?php echo $product_info['mid_content']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container mt-5 mb-5 product-margin">
      <div class="row">
		<div class="col-sm-6 product-bdr py-3 product-margin">
			<h3 class="blue_title">Value Engineering</h3>
			<ul>
			<li>
			Love the color but not the price?  Bring your flooring vision to life, without breaking the bank. 
			</li>
			<li>
			Our low-volume custom manufacturing process allows you to design to your price-point by playing with the color ratios of existing swatches.  Pull color out and reduce the price per square footage. 
			</li>
			</ul>
		</div>
		<div class="col-sm-6 product-bdr py-3 product-margin">
		
		<h3 class="blue_title">Precise Color Matching</h3>
		<ul>
			<li>
		We understand that color inspiration can be found virtually everywhere; the storefront that you drive past on your way to work, the bouquet of flowers on your dining table, the varying hues within a sheet of freshly polished metal. We have the ability to translate your color source into a beautifully designed floor; from matching carpet to stone, terrazzo or cork the possibilities are endless.  
		
			</li>
			</ul>
		</div>
		<div class="col-12 product-bdr py-3 product-margin mt-5">
		<h3 class="blue_title">Evo Patterns</h3>
		<p>
		Flooring doesn’t have to be one-dimensional, by using our EvoPatterns these eye-catching designs can create a bold and impactful design. Choosing colors from our Evolution or Nature’s Collection Lines, EvoPatterns are an excellent way to bring contrast and color into your space. 
		</p>
		</div>
	  </div>
	</div>
  </div>
  <div class="row mt-5">
    <div class="container mb-3 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Size Logo"> Color Finder</h3>
        </div>
      </div>
      <div class="row make_same_fonts mt-5 mb-5">

        <div class="ml-3 mb-3 img-fluid">
          <div class="text-center bighover float-right display_cursor btn-mr" role="group" aria-label="Third group"> 
              <a href="<?php echo base_url(); ?>color_finder/index/<?php echo $product_info['id']; ?>" class=" buttons">
                  <button class="draw meet button-big show_cursor">View Colors</button>
              </a>
              <div class="bighide draw meet"> 
                  <a href="<?php echo base_url(); ?>color_finder">
                      <div class="progress container btn-creat-move"> 
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
  <?php } ?>
  
  <!--comment-->
  <!-- <?php if($product_info['features'] != '' ) { 
  			$features_array = explode(',',$product_info['features']);
  ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Features Logo"> Features comment</h3>
        </div>
      </div>
      
      <div class="row">
          	<?php 
				$num = 0;
				foreach($features_array as $feature_id) { 
					$feature_info = $this->common_model->get_single('features_master',array('id'=>$feature_id));
			?>
            	 <?php if($num % 4 == 0) 
                        { echo ' <div class="col-xl-6 col-sm-6"><ul class="list-group-flush product_list_resposive square_list_type" >'; }
                  $num++;
                  ?>
            <li class=" product-group ">
            	<?php /*if($feature_info['feature_image'] != '') {?>
            		<img src="<?php echo base_url();?>uploads/features_images/<?php echo $feature_info['feature_image']; ?>" class="product-group-img" alt="Feature Image">
                <?php }*/ ?>
				<p><?php echo $feature_info['feature_content'];?></p>
            </li>
            <?php if(count($features_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
            <?php } ?>
      </div>
      
    </div>
  </div>
  
  <?php } ?> -->
  
   <!-- <?php if($product_info['features_1'] != '' ) { 
           
  		//	$features_array = explode(PHP_EOL,$product_info['features_1']);
  ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Features Logo"> Features</h3>
        </div>
      </div>
      
      <div class="row">
          	<?php 
				$num = 0;
				foreach($features_array as $feature_id) { 
				//	$feature_info = $this->common_model->get_single('features_master',array('id'=>$feature_id));
			?>
            	 <?php if($num % 4 == 0) 
                        { echo ' <div class="col-xl-6 col-sm-6"><ul class="list-group-flush product_list_resposive square_list_type" >'; }
                  $num++;
                  ?>
            <li class=" product-group ">
            	<?php /*if($feature_info['feature_image'] != '') {?>
            		<img src="<?php echo base_url();?>uploads/features_images/<?php echo $feature_info['feature_image']; ?>" class="product-group-img" alt="Feature Image">
                <?php }*/ ?>
				<p><?php echo $feature_id;?></p>
            </li>
            <?php if(count($features_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
            <?php } ?>
      </div>
      
    </div>
  </div>
  
  <?php } ?> -->
  
   <?php if($product_info['features_1'] != '') {?> 
      <div class="row">
        <div class="container product-bdr  mb-5 product-margin">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Features Logo"> Features</h3>
            </div>
          </div>
			
          <div class="row additional_features additional_benefits_features">
          
            <?php echo $product_info['features_1']; ?>
    	  
          </div>
        </div>
      </div>
  <?php } ?>

  
  
  <?php if($product_info['additional_features'] != '' ) { 
  			$features_array = explode(',',$product_info['additional_features']);
  ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin" >
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Additional Features Logo" > Additional Features</h3>
        </div>
      </div>
      
      <div class="row">
          	<?php 
				$num = 0;
				foreach($features_array as $feature_id) { 
					$feature_info = $this->common_model->get_single('additional_features_master',array('id'=>$feature_id));
			?>
            	 <?php if($num % 4 == 0) 
                        { echo ' <div class="col-xl-6 col-sm-6"><ul class="list-group-flush product_list_resposive square_list_type">'; }
                  $num++;
                  ?>
            <li class="product-group ">
            	<?php /*if($feature_info['feature_image'] != '') {?>
            		<img src="<?php echo base_url();?>uploads/additional_features_images/<?php echo $feature_info['feature_image']; ?>" class="product-group-img" alt="Additional Feature Image">
                <?php }*/ ?>
				<p><?php echo $feature_info['feature_content'];?></p>
            </li>
            <?php if(count($features_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
            <?php } ?>
      </div>
      
    </div>
  </div>
  
  <?php } ?>
  
<?php /*?>   <?php if($product_info['additional_features'] != '') {?> 
      <div class="row">
        <div class="container product-bdr  mb-5 product-margin">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left font-weight-800 product-txt-h"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35">Additional Features</h3>
            </div>
          </div>
          <div class="row additional_features">
          
            <?php echo $product_info['additional_features']; ?>
    
          </div>
        </div>
      </div>
  <?php } ?><?php */?>
  
 <?php if($product_info['benefits'] != '') {?> 
      <div class="row">
        <div class="container product-bdr  mb-5 product-margin">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Benefits Logo"> Benefits</h3>
            </div>
          </div>
			
          <div class="row additional_features additional_benefits_features">
          <div class="col-xl-12 col-sm-12">
            <?php echo $product_info['benefits']; ?>
    	  </div>
          </div>
        </div>
      </div>
  <?php } ?>
  
  
  
  
  <?php if($product_info['applications'] != '') {
	  $application_array = explode(',',$product_info['applications']);
	  ?>
  <div class="row">
    <div class="container product-bdr  mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-applications.png" width="35" height="35" alt="Best Application Logo"> Best Application</h3>
        </div>
      </div>
          <div class="row">
                <?php
                    $num = 0;
                 foreach($application_array as $application_id) { 
                    $application_info = $this->common_model->get_single('best_application_master',array('id'=>$application_id));
                ?>
                <?php if($num % 4 == 0) 
                        { echo ' <div class=" col-xl-6 col-sm-6"><ul class="square_list_type list-group-flush product_list_resposive ">'; }
                  $num++;
                  ?>
                  
                <li class="product-group ">
                    <?php /*if($application_info['image'] != '') {?>
                    <img src="<?php echo base_url();?>uploads/best_application_images/<?php echo $application_info['image']; ?>" class="product-group-img" alt="Best Application Image">
                    <?php }*/ ?>
                    <p><?php echo $application_info['content']; ?></p>
                </li>
                  <?php if(count($application_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
                <?php } ?>
          	</div>
    	</div>
  </div>
  <?php } ?> 
  
  
  <!--comments-->
 <!-- <?php if($product_info['applications_1'] != '') {?> 
      <div class="row">
        <div class="container product-bdr  mb-5 product-margin">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="application Logo"> Best Application</h3>
            </div>
          </div>
			
          <div class="row additional_features additional_benefits_features">
          <div class="col-xl-12 col-sm-12">
            <?php echo $product_info['applications_1']; ?>
    	  </div>
          </div>
        </div>
      </div>
  <?php } ?> -->
  
  <?php /*if($downloads != '') { ?>
      <div class="row">
        <div class="container product-bdr  mb-5 product-margin">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-download.svg" width="35" height="35" alt="Downloads Logo"> Downloads</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
            
              <ul class="list-group list-group-flush product_list_resposive">
              	<?php foreach($downloads as $download) { ?>
                	<li class="list-group-item product-group ">-&nbsp;<a href="<?php echo base_url(); ?>uploads/product_downloads_documents/<?php echo $download['document'];?>" target="_blank" title="<?php echo $download['title'];?>"><?php echo $download['title'];?></a></li>
                <?php } ?>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
  <?php }*/ ?>
 
 <?php if($product_info['size_content'] != '') {?> 
  <div class="row">
    <div class="container product-bdr  mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Size Logo"> Size</h3>
        </div>
      </div>
      <div class="row make_same_fonts size_content_div">
      
      	<?php echo $product_info['size_content']; ?>

      </div>
    </div>
  </div>
  <?php } ?>
  
  <?php /*if( (!empty($warranties) && $warranties != false)  || (!empty($specifications)  && $specifications != false) || (!empty($installation)  && $installation != false) || (!empty($cleaning)  && $cleaning != false) || (!empty($safety) && $safety != false))*/
  if( ($warranties != false)  || ($specifications != false) || ($installations != false) || ($cleanings != false) || ($safety != false) || ($brochure != false) || ($safety_data_sheets != false) || ($sell_sheets!= false)) { ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Technical Logo"> Technical</h3>
        </div>
      </div>
 <div class="row py-4">
     <?php if($warranties != '') {
				$num = 0;
			foreach($warranties as $warranty)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Warranties</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
                <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $warranty['resource_file']; ?>" title="<?php echo $warranty['resource_title'];?>" target="_blank"><?php echo $warranty['resource_title'];?></a></li>
                
             <?php if(count($warranties) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php }
            } ?> 
          
     <?php if($specifications != '') { 
				$num = 0;
			foreach($specifications as $specification)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"><h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Specifications</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
            	<li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php  echo $specification['resource_file'] ?>" title="<?php echo $specification['resource_title'];?>" target="_blank"><?php echo $specification['resource_title'];?></a></li>
            
             <?php if(count($specifications) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php }
            } ?>
      
      <?php if($installations != '') { 
				$num = 0;
			foreach($installations as $installation)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4">  <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Installation Guidelines</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
            <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $installation['resource_file'] ?>" title="<?php echo $installation['resource_title'];?>" target="_blank"><?php echo $installation['resource_title'];?></a></li>
            
            <?php if(count($installations) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php }
            } ?>
      
        
         <?php if($brochure != '') {
				$num = 0;
			foreach($brochure as $brc)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Brochures</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
          
            <li class="list-group-item product-group "><a href="<?php echo base_url(); ?>uploads/product_downloads_documents/<?php echo $brc['document'];?>" title="<?php echo $brc['title'];?>" target="_blank"><?php echo $brc['title'];?></a></li>
            
             <?php if(count($brochure) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } 
            } ?>
			
			<?php if($cleanings != '') {
				$num = 0;
			foreach($cleanings as $cleaning)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Cleaning & Maintenance</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
          
            <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $cleaning['resource_file'] ?>" title="<?php echo $cleaning['resource_title'];?>" target="_blank"><?php echo $cleaning['resource_title'];?></a></li>
            
             <?php if(count($cleanings) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } 
            } ?>
            
        <?php if($safety_data_sheets != '') {
				$num = 0;
			foreach($safety_data_sheets as $saf_da_sh)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Safety Data Sheets</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
          
            <li class="list-group-item product-group "><a href="<?php echo base_url(); ?>uploads/product_downloads_documents/<?php echo $saf_da_sh['document'];?>" title="<?php echo $saf_da_sh['title'];?>" target="_blank"><?php echo $saf_da_sh['title'];?></a></li>
            
             <?php if(count($safety_data_sheets) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
			 
            <?php } 
            } ?>
			  <?php if($sell_sheets != '') {
				$num = 0;
			foreach($sell_sheets as $sell_sh)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Sell Sheets</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
          
            <li class="list-group-item product-group "><a href="<?php echo base_url(); ?>uploads/product_downloads_documents/<?php echo $sell_sh['document'];?>" title="<?php echo $sell_sh['title'];?>" target="_blank"><?php echo $sell_sh['title'];?></a></li>
            
             <?php if(count($sell_sheets) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } 
            } ?>
            
            
             <?php if($spec_reports != '') { 
				$num = 0;
			foreach($spec_reports as $sepc_rep)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4">  <h3 style="font-size:1.21rem" class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Technical Reports</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
            <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $sepc_rep['resource_file'] ?>" title="<?php echo $sepc_rep['resource_title'];?>" target="_blank"><?php echo $sepc_rep['resource_title'];?></a></li>
            
            <?php if(count($spec_reports) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php }
            } ?>
            </div>
    </div>
  </div>
  
 <?php } ?> 
 
  
  
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="box-shadow:none;">
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
    
    
 <script src="<?php echo base_url();?>assets/dist/js/products_custome.js"></script>
					
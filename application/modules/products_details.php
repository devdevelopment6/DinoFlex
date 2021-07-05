         
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" rel="stylesheet" />

<style>
	.modal-dialog {
		max-width: 800px;
		margin: 30px auto;
	}
	.modal-body {
		position:relative;
		padding:0px;
	}
	.close {
		position:absolute;
		right:-30px;
		top:0;
		z-index:999;
		font-size:2rem;
		font-weight: normal;
		color:#fff;
		opacity:1;
	}
	.img-fluid{
		cursor: pointer;}
	</style>
	<style type="text/css">
		html, body {
			margin: 0;
			padding: 0;
		}

		* {
			box-sizing: border-box;
		}

		.slick-prev:after,
		.slick-next:after {
			color: black;
		}

		.slick-slide {
			transition: all ease-in-out .3s;
			opacity: 1;
		}
		.slick-prev:before, 
		.slick-next:before {
			background:  #191616;
			color: #191616;

		}
		.slick-prev:before, .slick-next:before{
			font-size: 30px !important;
			color: #556C11 !important;
			background: none !important;
		}
		
		.slick-prev, .slick-next
		{
			box-shadow: unset;
		}
		
		/*.slick-next {
			right: 0px !important;
		}*/
		.display_cursor{
			cursor:pointer;	
		}
		.regular{
			display:none;	
		}

		.lds-ellipsis {
		  display: inline-block;
		  position: relative;
		  width: 64px;
		  height: 64px;
		}
		.lds-ellipsis div {
		  position: absolute;
		  top: 27px;
		  width: 11px;
		  height: 11px;
		  border-radius: 50%;
		  background: #cef;
		  animation-timing-function: cubic-bezier(0, 1, 1, 0);
		}
		.lds-ellipsis div:nth-child(1) {
		  left: 6px;
		  animation: lds-ellipsis1 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(2) {
		  left: 6px;
		  animation: lds-ellipsis2 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(3) {
		  left: 26px;
		  animation: lds-ellipsis2 0.6s infinite;
		}
		.lds-ellipsis div:nth-child(4) {
		  left: 45px;
		  animation: lds-ellipsis3 0.6s infinite;
		}
		@keyframes lds-ellipsis1 {
		  0% {
			transform: scale(0);
		  }
		  100% {
			transform: scale(1);
		  }
		}
		@keyframes lds-ellipsis3 {
		  0% {
			transform: scale(1);
		  }
		  100% {
			transform: scale(0);
		  }
		}
		@keyframes lds-ellipsis2 {
		  0% {
			transform: translate(0, 0);
		  }
		  100% {
			transform: translate(19px, 0);
		  }
}


	</style>

  <div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php if($sliders != '') { 
			$i = 1;
			foreach($sliders as $slider) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php ($i == 1)?'active':'';?>"></li>
          
          <?php $i++; } } ?>
        </ol>
        
        <div class="carousel-inner">
        
        <?php if($sliders != '') { 
			$i = 1;
			foreach($sliders as $slider) {  ?>
        
        	 <div class="carousel-item <?php echo ($i == 1)?'active':'';?>"><img class="d-block w-100" src="<?php echo base_url();?>uploads/product_page_sliders/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?>">
                <div class="carousel-caption">
                  <!--<div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column">
                  	<?php if($product_info['banner_image'] == '' || $product_info['banner_image'] == 'Image.jpg') {?>
                    	<h1 class="carousel-txt-h"><?php echo $slider['title']; ?></h1>
                    <?php } else { ?>
                    	<img src="<?php echo base_url();?>uploads/product_banner_images/<?php echo $product_info['banner_image']; ?>" width="300" height="50" class="img-fluid"  style="box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);"><br>
                    <?php } ?>
                   <?php /*?> <p class="carousel-txt"><?php echo $slider['title_2']; ?></p><?php */?>
                    <div class="col-xl-12 col-10 align-btn ml-0">
                     </div>
                  </div> -->
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
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
    </div>
  </div>
  
  
  <?php //print_r($product_info);die; ?>

  <div class="row">
      <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <img src="<?php echo base_url();?>uploads/product_banner_images/<?php echo $product_info['banner_image']; ?>" width="300" height="50" class="img-fluid  d-block m-auto"  style="box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);">
            </div>
              </div>
        </div>
  </div>

   <?php if($product_info['video_link_1'] == '' && $product_info['video_link_2'] == '' && $product_info['video_link_3'] == '' && $product_info['header_content'] != '') { ?>  
        <div class="row">
            	<div class="container pt-5">
                  <div class="row">
                    <div class="col-sm-12">
                      <p class="text-left txt">
                      <h1 class="font-weight-bold blue_clr_cls pb-4"><b><?php echo $product_info['header_title']; ?></b></h1>
                      <p class="txt"><?php echo $product_info['header_content']; ?></p>
                      </p>
                    </div>
                        
                      </div>
                </div>
        </div>
          
      <?php } else { ?>
  
      <div class="row">
        <div class="container pt-5">
          <div class="row">
            <div class="col-sm-7">

              <p class="text-left txt">
              <h1 class="font-weight-bold blue_clr_cls pb-4"><b><?php echo $product_info['header_title']; ?></b></h1>
              <p class="txt"><?php echo $product_info['header_content']; ?></p>
              </p>
            </div>

            <div class="col-sm-5">
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
                     	<img src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id'];?>/<?php echo $product_info['video_image_2']; ?>" class="img-fluid video-btn" data-target="#myModal" data-toggle="modal" data-src="<?php echo $product_info['video_link_2'];?>" alt="Video Banner Image">
                 <?php } }?>
                <br>
                
                <?php if($product_info['video_link_3'] != '') { ?>
                	<?php if($product_info['video_image_3'] == '' || $product_info['video_image_3'] == 'Image.jpg' || $product_info['video_image_3'] == NULL) {?>
                    	<img src="<?php echo base_url();?>assets/images/Image.jpg" class="img-fluid" >
                     <?php } else { ?>
                  <img src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id'];?>/<?php echo $product_info['video_image_3']; ?>" class="img-fluid pt-4 video-btn" data-target="#myModal" data-toggle="modal" data-src="<?php echo $product_info['video_link_3'];?>" alt="Video Banner Image">
                <?php } } ?>
                 </div>
              </div>
              
            </div>
            
            
          </div>
          
         </div>
        </div>
  <?php } ?>
  
  <div class="row">
    <div class="container-fluid bg-product-detail_content white-txt mt-5 pt-5">
      <div class="row">
        <div class="container p-3 text-center pb-5">
          <h2 class="mt-5"><?php echo $product_info['mid_title']; ?></h2>
          <p class="pt-5 pb-5"><?php echo $product_info['mid_content']; ?></p>
        </div>
      </div>
    </div>
  </div>
  
  <?php if($product_info['features'] != '' ) { 
  			$features_array = explode(',',$product_info['features']);
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
					$feature_info = $this->common_model->get_single('features_master',array('id'=>$feature_id));
			?>
            	 <?php if($num % 4 == 0) 
                        { echo ' <div class="col-xl-6 col-sm-6"><ul class="list-group list-group-flush product_list_resposive">'; }
                  $num++;
                  ?>
            <li class="list-group-item product-group ">
            	<?php if($feature_info['feature_image'] != '') {?>
            		<img src="<?php echo base_url();?>uploads/features_images/<?php echo $feature_info['feature_image']; ?>" class="product-group-img" alt="Feature Image">
                <?php } ?>
				<?php echo $feature_info['feature_content'];?>
            </li>
            <?php if(count($features_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
            <?php } ?>
      </div>
      
    </div>
  </div>
  
  <?php } ?>
  
  
  <?php if($product_info['additional_features'] != '' ) { 
  			$features_array = explode(',',$product_info['additional_features']);
  ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin">
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
                        { echo ' <div class="col-xl-6 col-sm-6"><ul class="list-group list-group-flush product_list_resposive">'; }
                  $num++;
                  ?>
            <li class="list-group-item product-group ">
            	<?php if($feature_info['feature_image'] != '') {?>
            		<img src="<?php echo base_url();?>uploads/additional_features_images/<?php echo $feature_info['feature_image']; ?>" class="product-group-img" alt="Additional Feature Image">
                <?php } ?>
				<?php echo $feature_info['feature_content'];?>
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
          <div class="row additional_features">
          
            <?php echo $product_info['benefits']; ?>
    
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
                        { echo ' <div class=" col-xl-6 col-sm-6"><ul class="list-group list-group-flush product_list_resposive ">'; }
                  $num++;
                  ?>
                  
                <li class="list-group-item product-group ">
                    <?php if($application_info['image'] != '') {?>
                    <img src="<?php echo base_url();?>uploads/best_application_images/<?php echo $application_info['image']; ?>" class="product-group-img" alt="Best Application Image">
                    <?php } ?>
                    <?php echo $application_info['content']; ?>
                </li>
                  <?php if(count($application_array) == $num || $num % 4 == 0 ) 
                        { echo '</ul> </div>'; } 
                  ?>
                <?php } ?>
          	</div>
    	</div>
  </div>
  <?php } ?>
  
  <?php if($downloads != '') { ?>
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
  <?php } ?>
 
 <?php if($product_info['size_content'] != '') {?> 
  <div class="row">
    <div class="container product-bdr  mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Size Logo"> Size</h3>
        </div>
      </div>
      <div class="row make_same_fonts">
      
      	<?php echo $product_info['size_content']; ?>

      </div>
    </div>
  </div>
  <?php } ?>
  
  <?php /*if( (!empty($warranties) && $warranties != false)  || (!empty($specifications)  && $specifications != false) || (!empty($installation)  && $installation != false) || (!empty($cleaning)  && $cleaning != false) || (!empty($safety) && $safety != false))*/
  if( ($warranties != false)  || ($specifications != false) || ($installations != false) || ($cleanings != false) || ($safety != false)) { ?>
  <div class="row">
    <div class="container product-bdr mt-5 mb-5 product-margin">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-features.png" width="35" height="35" alt="Technical Logo"> Technical</h3>
        </div>
      </div>
 <div class="row">
     <?php if($warranties != '') {?> 

      <?php 
				$num = 0;
			foreach($warranties as $warranty)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Warranties</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
                <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $warranty['resource_file']; ?>" title="<?php echo $warranty['resource_title'];?>"><?php echo $warranty['resource_title'];?></a></li>
                
             <?php if(count($warranties) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } ?>
       <?php } ?> 
         
          
     <?php if($specifications != '') { ?> 
      
          <?php 
				$num = 0;
			foreach($specifications as $specification)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"><h3 class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Specifications</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
            	<li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php  echo $specification['resource_file'] ?>" title="<?php echo $specification['resource_title'];?>"><?php echo $specification['resource_title'];?></a></li>
            
             <?php if(count($specifications) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } ?>
            
      <?php } ?>
      
      <?php if($installations != '') { ?>
        
          <?php 
				$num = 0;
			foreach($installations as $installation)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4">  <h3 class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Installation Guidelines</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
            <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $installation['resource_file'] ?>" title="<?php echo $installation['resource_title'];?>"><?php echo $installation['resource_title'];?></a></li>
            
            <?php if(count($installations) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } ?>
      <?php } ?>
      
      <?php if($cleanings != '') {?>
         
      
      <?php 
				$num = 0;
			foreach($cleanings as $cleaning)
			{ ?>
            <?php if($num % 4 == 0) 
					{ echo ' <div class="col-sm-4"> <h3 class="text-left font-weight-800 txt-2 pl-xl-3 blue_clr_cls pl-md-4 pl-0">Cleaning & Maintenance</h3><ul class=" list-group list-group-flush product_list_resposive">'; }
			  $num++;
			  ?>
          
            <li class="list-group-item product-group "><a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $cleaning['resource_file'] ?>" title="<?php echo $cleaning['resource_title'];?>"><?php echo $cleaning['resource_title'];?></a></li>
            
             <?php if(count($installations) == $num || $num % 4 == 0 ) 
					{ echo '</ul> </div>'; } 
			 ?>
            <?php } ?>
      <?php } ?>
            </div>
    </div>
  </div>
  
 <?php } ?> 
  
  <?php if($colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Colors Logo"> Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
      		
       <div class="col-sm-12 regular slider sliderchange">
       
      	<?php foreach($colors as $color) {?>
       			<div class="" style="margin: 10px;">
          	 <a href="<?php echo base_url();?>uploads/products_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Color Image">
              <img src="<?php echo base_url();?>uploads/products_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" alt="Color Image" class="product-gallery" >
             </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($metro_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Metro Colors Logo"> Metro Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($metro_colors as $color) {?>
       			<div class="" style="margin: 10px;">
          	 <a href="<?php echo base_url();?>uploads/products_metro_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Metro Color Image">
              <img src="<?php echo base_url();?>uploads/products_metro_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Metro Color Image">
            </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
 <?php if($standard_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Standard Colors Logo"> Standard Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($standard_colors as $color) {?>
       			<div class="" style="margin: 10px;">
        	     <a href="<?php echo base_url();?>uploads/products_standard_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Standard Color Image">
               <img src="<?php echo base_url();?>uploads/products_standard_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Standard Color Image">
               </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($stone_line_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Stone Line Colors Logo"> Stone Line Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row  pb-5">
       <div class="col-sm-12 regular slider sliderchange">
      	<?php foreach($stone_line_colors as $color) {?>
       			<div class="" style="margin: 10px;">
        	     <a href="<?php echo base_url();?>uploads/products_stone_line_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Stone Line Color Image">
               <img src="<?php echo base_url();?>uploads/products_stone_line_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Stone Line Color Image">
               </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php } ?>
  
  <?php if($elite_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Elite Colors Logo"> Elite Colors</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($elite_colors as $color) {?>
       			<div class="" style="margin: 10px;">
        	     <a href="<?php echo base_url();?>uploads/products_elite_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Elite Color Image">
               <img src="<?php echo base_url();?>uploads/products_elite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Elite Color Image">
               </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($decor_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Decor Collection Logo"> Decor Collection </h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($decor_colors as $color) {?>
       			<div class="" style="margin: 10px;">
        	     <a href="<?php echo base_url();?>uploads/products_decor_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Decor Collection Image">
               <img src="<?php echo base_url();?>uploads/products_decor_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Decor Collection Image">
               </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($granite_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Granite Flex Logo"> Granite Flex</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($granite_colors as $color) {?>
       		<div class="" style="margin: 10px;">
        	   <a href="<?php echo base_url();?>uploads/products_granite_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Granite Flex Image">
             <img src="<?php echo base_url();?>uploads/products_granite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Granite Flex Image">
            </a>
        	</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php if($combo_colors != '') {?>
  
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 pb-3">
          <h3 class="text-left blue_title"><img src="<?php echo base_url();?>frontside/images/product-sizes.png" width="35" height="35" alt="Two Color Combo Logo"> Two Color Combo</h3>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-center"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
      </div>
      <div class="row pb-5">
       <div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($combo_colors as $color) {?>
       			<div class="" style="margin: 10px;">
        	 		  <a href="<?php echo base_url();?>uploads/products_combo_colors/<?php echo $color['product_id'];?>/<?php echo $color['image_name']; ?>" title="Two Color Combo Image">
                <img src="<?php echo base_url();?>uploads/products_combo_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name']; ?>" class="product-gallery" alt="Two Color Combo Image">
                </a>
        		</div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
  
  <?php  if($gallery_images != '') { ?>
  <div class="row">
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
      	<div class="col-sm-12  regular slider sliderchange">
      	<?php foreach($gallery_images as $gallery_image) {?>
        		<div class="" style="margin: 10px;">
                <a href="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/<?php echo $gallery_image['image_name']; ?>" title="Gallery Image">
                <img src="<?php echo base_url();?>/uploads/products_gallery/<?php echo $gallery_image['product_id']; ?>/thumbs/<?php echo $gallery_image['image_name']; ?>" class="product-gallery" alt="Gallery Image">
                </a>
                </div>
        <?php } ?>
         </div>
      </div>
    </div>
  </div>
  <?php } ?>
  
  <?php if($product_info['product_category'] != '5' && $product_info['product_category'] != '6') {?>
  <div class="container pt-5 pb-5">
    <div class="row">
          <div class="col-sm-12 text-center">
              <div class="col-sm-6 float-left col-12">
                <h1 class="font-weight-800">
                  <?php /*?><img src="<?php echo base_url(); ?>frontside/images/The-Color-Innovator-logo-web.jpg" class="img-responsive logo-txt"><?php */?>
                   <img src="<?php echo base_url(); ?>frontside/images/color-innovator-logo-new-ankit-test.svg" class="img-responsive logo-txt" alt="Color Innovator Logo">
                </h1>
              </div>
              <div class="col-sm-12 col-12 col-lg-6 col-md-6 col-xl-6 float-right pt-5">
                  <div class="text-center bighover float-right display_cursor btn-mr" role="group" aria-label="Third group"> 
                    <a href="http://oneco.ca/~dinoflex/Color_innovator/" class=" buttons" target="_blank">
                        <button class="draw meet button-big show_cursor">Create Your Own</button>
                    </a>
                    <div class="bighide draw meet"> 
                        <a href="#">
                            <div class="progress container btn-creat-move"> 
                                 <span class="mr-1" style="background-color:#003e70 !important;"></span>
                                  <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                                 <span class="mr-1" style="background-color:#556c11 !important;"></span> 
                                 <span class="mr-1" style="background-color:#003e70 !important;"></span> 
                                 <span class="mr-1" style="background-color:#003e70 !important;"></span>
                            </div>
                        </a> 
                    </div>
                </div>
              </div>
          </div>
    </div>
  </div>
  <?php } ?>
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>               
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick.css"/>

						<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick-theme.css"/>
						<script src="<?php echo base_url();?>assets/slick/slick.min.js"></script>
						<script>
						
						function loading_slider()
							{
								$(".regular").slick({
									autoplay: true,
          							autoplaySpeed: 5000,
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
								
								$('.regular').show();
							}
							$(document).ready(function(){
								
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
								  navigateByKeyboard  : true
								});

	});
		$(document).ready(function() {
			
								var $videoSrc;  
								$('.video-btn').click(function() {
									$videoSrc = $(this).data( "src" );

								});
																
								// when the modal is opened autoplay it  
$('#myModal').on('shown.bs.modal', function (e) {

// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
})


// stop playing the youtube video when I close the modal
$('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
}) 
							});
							
							
					</script>
					
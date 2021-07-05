 
  <div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!--<ol class="carousel-indicators">
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
			foreach($sliders as $slider) { ?>
        
        	 <div class="carousel-item <?php echo ($i == 1)?'active':'';?>">

           <img class="d-block w-100" src="<?php echo base_url();?>uploads/product_category_sliders/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?> Image">
                <div class="carousel-caption">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column">
                   <?php /*?> <h1 class="carousel-txt-h"><?php echo $slider['title']; ?></h1>
                    <img src="<?php echo base_url();?>uploads/product_category_sliders/<?php echo $slider['middle_image']; ?>" width="40" height="36"><br>
                    <p class="carousel-txt"><?php echo $slider['title_2']; ?></p><?php */?>
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
       <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
	   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
	   -->
	   </div>
    </div>
  </div>
  
  <?php  echo $contents['product_content'];?>
  
  
  
  
 <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 pt-5">
          <div class="row">
            <!--<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5"> 
            	<img src="<?php echo base_url();?>uploads/product_category_image/<?php echo $contents['custom_design_logo']; ?>" class="img-fluid mx-auto d-block product-img-width" alt="Custom Design Logo">
             </div>-->
             
            <?php echo $contents['custom_products_content']; ?>
          </div>
	      <div class="custome_product1">
	          <div class="row">
	            <!--<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5">
		            <img src="<?php echo base_url();?>uploads/product_category_image/<?php echo $contents['custom_logo_colors_logo']; ?>" class="img-fluid  mx-auto d-block product-img-width" alt="Custom Logo Colors Logo">
	            </div>-->
				<?php echo $contents['custom_logo_colors_content']; ?>
	          </div>
          </div>
	        <div class="custome_product2">
	        <div class="row" >
		        <!--<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5 ">
			        <img src="<?php echo base_url();?>uploads/product_category_image/<?php echo $contents['custom_logo_colors_logo']; ?>" class="img-fluid  mx-auto d-block product-img-width" alt="Custom Logo Colors Logo">
		        </div>-->
		        <?php echo $contents['custom_logo_colors_content']; ?>
	        </div>
	        </div>
          <div class="row">
            <!--<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 pr-5 pb-5 ">
	            <img src="<?php echo base_url();?>uploads/product_category_image/<?php echo $contents['custom_products_logo']; ?>" class="img-fluid  mx-auto d-block product-img-width" alt="Custom Products Logo">
            </div>-->
            <?php echo $contents['custom_design_content']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="product_footer">
  <?php echo $contents['footer_description']; ?>
  </div>
  
  <div class="container pt-5 pb-5">
    <div class="col-xl-12 text-center d-flex  align-items-end">
      <!--<div class="btn-group-lg" role="group" aria-label="Third group">
        <button type="button" class="btn btn-secondary">
        <img src="<?php echo base_url();?>uploads/images/dinoflex-button-icon.svg" class="btn-icon-w pr-1"><a href="<?php echo $contents['button_link']; ?>" class="text-blink">Request a Sample</a>
        </button>
      </div>-->
	
		<div class="text-center bighover d-block mx-auto req_btn_width" role="group" aria-label="Third group"> 
			<a href="<?php echo $contents['button_link']; ?>" class=" buttons">
				
				<button class="draw meet button-big show_cursor">Contact Us</button>
			</a>
			<div class="bighide draw meet"> 
				<a href="#">
					<div class="progress container btn-anm"> 
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



<?php /*?>  <div class="row">
    <div class="container-fluid bg-contact-top-content" style="background:url('../../New_color_innovator/uploads/product_category_banners/<?php echo $product_content['banner_image'];?>');background-size: cover;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-left pb-5">
              <h1 class="carousel-txt-h carousel-txt-h-product white-txt"><?php echo $product_content['category_name'];?></h1>
              <p class="white-txt pb-5"><?php echo $product_content['description'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><?php */?>
  
  <div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <!-- <ol class="carousel-indicators">
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
			foreach($sliders as $slider) { 		
					/*$get_product = $this->uri->segment(3);
					if($slider['product_id'] == $get_product)
					{*/ ?>
        
        	 <div class="carousel-item <?php echo ($i == 1)?'active':'';?>"><img class="d-block w-100" src="<?php echo base_url();?>uploads/individual_product_category_sliders/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?>">
                <div class="carousel-caption">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column">
                  	<?php if($product_content!=false){ ?><?php //if($product_content['banner_image'] == '' || $product_content['banner_image'] == 'Image.jpg') {?>
                    	<h1 class="carousel-txt-h d-none d-sm-block"><?php // echo $slider['title']; ?></h1>
                    <?php //}
													  /*else { ?>
                    	<img src="<?php echo base_url();?>uploads/individual_product_category_sliders/<?php echo $product_content['banner_image']; ?>" width="300" height="50" class="img-fluid"><br>
                    <?php }*/ ?><?php } ?>
                 	<?php /* <p class="carousel-txt  d-none d-sm-block"><?php echo $product_content['description']; ?></p> 
                    <div class="col-xl-12 col-10 align-btn ml-0">
                     </div> */ ?>
                  </div>
                </div>
              </div>
			
        <?php if($i == count($sliders))
			{
				$i = 1; 
			} else {
				$i++;	
			}
		 //	}
		  } } ?>
          
        </div>
       <!-- 
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
		-->
		</div>
    </div>
  </div>
  
        <div class="row">
            <div class="container">
                <div class="row pr-0 mr-0 ml-0">
                    <div class="col-lg-12 text-center p-2" >
                        <h1 class="p-3 grey-txt-b"><?php echo $product_content['category_name']; ?></h1>
                        <p class="carousel-txt mb-5"><?php echo $product_content['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
  
  <div class="row">
    <div class="container mt-5 mb-5">
      <div class="row">
      
      <?php if($products != '') {
		  foreach($products as $product) {
		     // print_r($product);
		      if($product['product_name'] != 'Custom Floor Design And Logos'){
      ?>
      
        <div class="col-sm-6 col-xl-4 col-md-6 col-lg-4 float-left">
          <div class="card product-bg p-0 mr-0 mr-sm-2 mb-sm-3 mb-2">
            <div class="card-body ">
				
            <?php /*<a href="<?php echo base_url();?>products/products_details/<?php echo $product['id']; ?>" class="product-link" title="<?php echo $product['product_name']; ?>">*/ ?>
            <a href="<?php echo base_url();?>products/<?php echo $product['slug']; ?>" class="product-link" title="<?php echo $product['product_name']; ?>">

            <?php if($product['banner_image'] == '' || $product['banner_image'] == 'Image.jpg') {?>
                     <?php /*?> <img class="img-fluid" title="<?php echo $product['product_name'];?>" src="<?php echo base_url(); ?>homepage_assets/no-img-1.jpg" alt="<?php echo $product['product_name'];?>"> <?php */?>     
                       <div class="text-center if_not_img"><?php echo $product['product_name'];?></div>                  
             <?php } else {?>
	             		<img src="<?php echo base_url();?>uploads/product_banner_images/<?php echo $product['banner_image']; ?>" class="img-fluid" alt="<?php echo $product['product_name'];?> Logo">
             <?php } ?>
             </a>

            </div>
            <?php 
             //$get_colors = $this->common_model->get_by_condition('products_colors',array('product_id'=>$product['id'])); 
            if($product['product_list_banner'] != '' && $product['product_list_banner'] != 'Image.jpg')
            { ?> 
                <div class="p-0"><img src="<?php echo base_url();?>uploads/product_list_banner/thumbs1/<?php echo $product['product_list_banner']; ?>" class="img-fluid d-block m-auto product_img_hover" alt="<?php echo $product['product_name'];?> Banner Image"></div>
            <?php     
                } else {
             ?>
                <div class="p-0"><img class="img-fluid d-block m-auto product_img_hover" title="<?php echo $product['product_name'];?>" src="<?php echo base_url(); ?>homepage_assets/NoImage_Available.png" alt="<?php echo $product['product_name'];?>"></div> 
                  
               <?php } ?>
             <?php /*?> <p class="card-text  text-center mt-5 mb-4"><a href="<?php echo base_url();?>products/products_details/<?php echo $product['id']; ?>" class="product-link"><?php echo $product['product_name']; ?></a></p><?php */?>

            <!--<div class="col-xl-12 text-center pl-0">
              <div class="btn-group-lg pb-5" role="group" aria-label="Third group">
                
                	<a href="<?php echo base_url();?>products/products_details/<?php echo $product['id']; ?>" class="text-blink">
                    	<button type="button" class="btn btn-secondary">View more</button>
                    </a>
              </div>
            </div>-->
			  <div class="overlay">
  				<div class="col-xl-12 text-productover">
  					<div class="text-center pl-0">
  						<p class="white-over-txt"><?php echo $product['thumbnail_content']; ?></p>
  					  <div class="btn-group-lg pb-3" role="group" aria-label="Third group">

  							<?php /*<a href="<?php echo base_url();?>products/products_details/<?php echo $product['id']; ?>" title="<?php echo $product['product_name']; ?>" class="text-blink"> */?>
                <a href="<?php echo base_url();?>products/<?php echo $product['slug']; ?>" title="<?php echo $product['product_name']; ?>" class="text-blink">
  								<button type="button" class="btn btn-secondary">View more</button>
  							</a>
  					  </div>
  					
  					</div>
  				  </div>
  			  </div>
          </div>
        </div>
        
        <?php } } } ?>
        
       <?php /*?> <div class="col-sm-6 col-xl-4 col-md-6 col-lg-4  float-left mt-xl-0 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
          <div class="card product-bg p-1 mr-0 mr-sm-2">
            <div class="card-body "> <img src="<?php echo base_url();?>homepage_assets/no-img-1.jpg" class="img-fluid">
              <p class="card-text  text-center mt-5 mb-4"><a href="#" class="product-link">Cushion Walk Pavers</a></p>
            </div>
            <div class="col-xl-12 text-center pl-0">
              <div class="btn-group-lg pb-5" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="#" class="text-blink">discover</a>
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-xl-4 col-lg-4 col-md-6 float-left mt-xl-0 mt-4 mt-sm-4 mt-md-4 mt-lg-0">
          <div class="card product-bg p-1 mr-0 mr-sm-2">
            <div class="card-body "> <img src="<?php echo base_url();?>homepage_assets/no-img-1.jpg" class="img-fluid">
              <p class="card-text  text-center mt-5 mb-4"><a href="#" class="product-link">Cushion Walk Pavers</a></p>
            </div>
            <div class="col-xl-12 text-center pl-0">
              <div class="btn-group-lg pb-5" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="#" class="text-blink">discover</a>
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-xl-4 col-md-6  col-lg-4 float-left mt-4">
          <div class="card product-bg p-1 mr-0 mr-sm-2">
            <div class="card-body "> <img src="<?php echo base_url();?>homepage_assets/no-img-1.jpg" class="img-fluid">
              <p class="card-text  text-center mt-5 mb-4"><a href="#" class="product-link">Cushion Walk Pavers</a></p>
            </div>
            <div class="col-xl-12 text-center pl-0">
              <div class="btn-group-lg pb-5" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="#" class="text-blink">discover</a>
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-xl-4 col-md-6 col-lg-4  float-left mt-4">
          <div class="card product-bg p-1 mr-0 mr-sm-2">
            <div class="card-body "> <img src="<?php echo base_url();?>homepage_assets/no-img-1.jpg" class="img-fluid">
              <p class="card-text  text-center mt-5 mb-4"><a href="#" class="product-link">Cushion Walk Pavers</a></p>
            </div>
            <div class="col-xl-12 text-center pl-0">
              <div class="btn-group-lg pb-5" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="#" class="text-blink">discover</a>
                </button>
              </div>
            </div>
          </div>
        </div><?php */?>
        
        
        
      </div>
    </div>
  </div>
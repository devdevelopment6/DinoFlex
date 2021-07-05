<?php if($applications!=false){
//	print_r($applications); 
	$main_data_product = array();
	$main_data_main_product = array();
	
	foreach($applications as $app){
	
		$href= "#";
		$product = $this->common_model->get_single('application_products',array('id'=>$app['product_id'],'status'=>1));
		
	
		if($product!=false){
		    
		   
		
			$main_product = $this->common_model->get_single('products',array('id'=>$product['main_product_id'],'status'=>1));
			//$get_color = $this->common_model->get_single('products_colors',array('product_id'=>$product['main_product_id']));
			//print_r($get_color);die;
			if((!empty($main_product))){
			    
			    array_push($main_data_product,$product);
			     array_push($main_data_main_product,$main_product);
			     
				//$href = base_url().'/products/products_details/'.$main_product['id'];
				$href = base_url().'/products/'.$main_product['slug'];
			}
		}
		
		
	}
		?>
		 
	<?php if((!empty($main_data_main_product))) {
	
	
	$price = array_column($main_data_main_product, 'order_index');

    array_multisort($price, SORT_ASC, $main_data_main_product);

	
    foreach($main_data_main_product as $key=>$main_product){
	foreach($main_data_product as $product){
	
	if($product['main_product_id'] == $main_product['id']){
	    
	   // print_r($main_product['order_index']);
	?>
	<div class="pb-3 col-sm-6 col-lg-4 float-left mt-3 mt-xl-0 mt-sm-0 mt-lg-0 mt-md-0">
		
		<div class="card bestuse-card-width product-bg">
			<div class="card-body">
             <a href="<?php echo $href;?>" title="<?php echo $main_product['product_name']; ?>" >
		<?php if($product['product_name']!='' && file_exists(FCPATH.'uploads/application_products/'.$product['id'].'/'.$product['product_image']) && !is_dir(FCPATH.'uploads/application_products/'.$product['id'].'/'.$product['product_image'])){ ?>
					<img src="<?php echo base_url();?>uploads/application_products/<?php echo $product['id']."/".$product['product_image'];?>" class="img-fluid" alt="<?php echo $main_product['product_name'];?> Logo"></a>
				<?php } else { ?>
					<a href="<?php echo $href; ?>"><h4><?php echo $product['product_name']; ?></h4></a>
				<?php } ?>
                
                </div>
                <?php if($main_product['product_list_banner'] != '' && $main_product['product_list_banner'] != 'Image.jpg') {?>
                	<div class="p-0">

					<img src="<?php echo base_url();?>uploads/product_list_banner/thumbs1/<?php echo $main_product['product_list_banner']; ?>" class="img-fluid d-block m-auto product_img_hover" alt="<?php echo $main_product['product_name'];?> Banner Image">
                	</div>
                <?php } else { ?>
                 <div class="p-0">
                 <img class="img-fluid d-block m-auto product_img_hover" title="<?php echo $product['product_name'];?>" src="<?php echo base_url(); ?>homepage_assets/NoImage_Available.png" alt="<?php echo $main_product['product_name'];?>">
                 </div> -->
                <?php } ?>
               <!-- <div class="btn-group-lg  text-center" role="group" aria-label="Third group">
                
                	<a href="<?php echo base_url(); ?>products/products_details/<?php echo $main_product['id']; ?>" class="text-blink">
                    	<button type="button" class="btn btn-secondary">View more</button>
                    </a>
              </div>-->
				<?php /*?><p class="card-title pt-3 best-use-link"><b>Area Size</b></p>
				<ul>

					<?php 
						$size_array= explode(",",$app['available_size']);
						if(count($size_array)>0){
							foreach($size_array as $size){
								$get_size = $this->common_model->get_single('area_size',array('id'=>$size));
								if($get_size!=false){ ?>
								<li><?php echo $get_size['size_name']; ?></li>
					<?php 
								}
							}
						}
					?> 
				</ul><?php */?>
			
			<div class="overlay">
				<div class="">
					<div class="col-xl-12 text-center pl-0 text-productover">
						<p class="white-over-txt"><?php echo $main_product['thumbnail_content']; ?></p>
					  <div class="btn-group-lg pb-3" role="group" aria-label="Third group">

							<a href="<?php echo base_url();?>products/<?php echo $main_product['slug']; ?>" class="text-blink" title="<?php echo $main_product['product_name']; ?>">
								<button type="button" class="btn btn-secondary">View more</button>
							</a>
					  </div>
					</div>
				  </div>
			  </div>
		</div>
	</div>
	<?php }
	
	} }
	?>

	<?php } }else {  ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
		<h3>Products Not Available!!!</h3>
	</div>
	<?php } ?>
	
	<?php
	
/*	echo "<pre>";
	//print_r($main_data_product);
	$price = array_column($main_data_main_product, 'order_index');

    array_multisort($price, SORT_ASC, $main_data_main_product);
	//print_r($main_data_main_product);
	
    foreach($main_data_main_product as $key=>$data){
	foreach($main_data_product as $product){
	   
	    if($product['main_product_id'] == $data['id']){
	        echo "<pre>";
	        print_r($product);
	        print_r($data);
	    }
	}
	} */
	
	
	?>

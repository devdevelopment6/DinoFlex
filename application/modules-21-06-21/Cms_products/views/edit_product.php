<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_product_frm" name="add_product_frm" method="post" action="<?php echo base_url().'cms_products/update_product/'.$product_info['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Product Name</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="product_name" id="product_name" value="<?php echo $product_info['product_name']; ?>" class="form-control" placeholder="Product Name"/>
							</div>
						</div>
					</div>
				</div>
                
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_info['id']; ?>" />
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Url Slug</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="slug" id="slug" value="<?php echo $product_info['slug'];?>" class="form-control" placeholder="Slug"/>
							</div>
						</div>
					</div>
				</div>

                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="product_category"> Product Category</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="product_category" id="product_category" required>
                                        <option value="">Select Catgory</option>
                                        <?php if($product_category != '') {
										foreach($product_category as $category)	{ ?>
	                                        <option  value="<?php echo $category['id'];?>" <?php echo ($product_info['product_category'] == $category['id'])?'selected':'';?> ><?php echo $category['category_name'];?></option>
                                        <?php } } ?>
                                    </select>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Meta Description</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <textarea type="text" name="meta_description" id="meta_description" class="form-control" /><?php echo $product_info['meta_description']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Product Order Index</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="number" name="order_index" id="order_index" value="<?php echo $product_info['order_index']; ?>" class="form-control" placeholder="Product Order Index"/>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="banner_image">Banner Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="banner_image" id="banner_image" class="form-control">
                                <div class="col-md-12"> 
								<?php 	
                                        $display = $product_info['banner_image'];	
                                        if($display != "")
                                        {
                                            if($display == "Image.jpg")
                                            {
                                        ?>
                                    <div class="col-md-2">
                                        <img class="product_img_banner" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                    </div>
                                    <?php 
                                            }
                                            else
                                            {
                                    ?>
                                    <div class="col-md-2">
                                        <span class="closing_banner">X</span>
                                        <img class="custom_design_logo" src="<?php echo base_url();?>uploads/product_banner_images/<?=$display; ?>" width="100px" height="100px" />
                                    </div>
                                    <?php 
                                            }
                                        }
                                    ?>
    
                               </div> <br>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Header Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="header_title" id="header_title" value="<?php echo $product_info['header_title']; ?>" class="form-control" placeholder="Header Title"/>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Header Sub Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="header_sub_title" id="header_sub_title" value="<?php echo $product_info['header_sub_title']; ?>" class="form-control" placeholder="Header Sub Title"/>
							</div>
						</div>
					</div>
				</div>
				  
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="browsertitle">Browser Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="browsertitle" id="browsertitle" value="<?php echo $product_info['browsertitle']; ?>" class="form-control" placeholder="Browser Title"/>
							</div>
						</div>
					</div>
				</div>
                
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_content">Header Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="header_content" id="header_content" class="form-control" placeholder="Description"><?php echo $product_info['header_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Middle Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="mid_title" id="mid_title" value="<?php echo $product_info['mid_title']; ?>" class="form-control" placeholder="Middle Title"/>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="mid_content">Middle Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="mid_content" id="mid_content" class="form-control" placeholder="Description"><?php echo $product_info['mid_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="thumbnail_content">Thumbnail Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="thumbnail_content" id="thumbnail_content" class="form-control" placeholder="Thumbnail Content"><?php echo $product_info['thumbnail_content']; ?></textarea>
								<label style="margin-top:5px;" id="thumbnail_content-error" class="error" for="thumbnail_content"></label>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_image_1">Video Image 1</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="video_image_1" id="video_image_1" class="form-control">
                                <div class="col-md-12"> 
									<?php 	
                                            $display = $product_info['video_image_1'];	
                                            if($display != "")
                                            {
                                                if($display == "Image.jpg")
                                                {
                                            ?>
                                        <div class="col-md-2">
                                            <img class="product_img_banner" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                        </div>
                                        <?php 
                                                }
                                                else
                                                {
                                        ?>
                                        <div class="col-md-2">
                                            <span class="video_img_cls <?php echo "video_image_1";?>"  data-img_field="<?php echo "video_image_1";?>" >X</span>
                                            <img class="display_video_img <?php echo "video_image_1";?>" src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id']; ?>/<?=$display; ?>" width="100px" height="100px" />
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
        
                                   </div> <br>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_1">Video Link 1</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_1" id="video_link_1" value="<?php echo $product_info['video_link_1']; ?>" class="form-control" placeholder="Video Link 1"/>
							</div>
						</div>
					</div>
				</div>
                
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_image_2">Video Image 2</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="video_image_2" id="video_image_2" class="form-control">
                                <div class="col-md-12"> 
									<?php 	
                                            $display = $product_info['video_image_2'];	
                                            if($display != "")
                                            {
                                                if($display == "Image.jpg")
                                                {
                                            ?>
                                        <div class="col-md-2">
                                            <img class="product_img_banner" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                        </div>
                                        <?php 
                                                }
                                                else
                                                {
                                        ?>
                                        <div class="col-md-2">
                                            <span class="video_img_cls <?php echo "video_image_2";?>" data-img_field="<?php echo "video_image_2";?>">X</span>
                                            <img class="display_video_img <?php echo "video_image_2";?>" src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id']; ?>/<?=$display; ?>" width="100px" height="100px" />
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
        
                                   </div> <br>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_2">Video Link 2</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_2" id="video_link_2" value="<?php echo $product_info['video_link_2']; ?>" class="form-control" placeholder="Video Link 2"/>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_image_3">Video Image 3</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="video_image_3" id="video_image_3" class="form-control">
                                 <div class="col-md-12"> 
									<?php 	
                                            $display = $product_info['video_image_3'];	
                                            if($display != "")
                                            {
                                                if($display == "Image.jpg")
                                                {
                                            ?>
                                        <div class="col-md-2">
                                            <img class="product_img_banner" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                        </div>
                                        <?php 
                                                }
                                                else
                                                {
                                        ?>
                                        <div class="col-md-2">
                                            <span class="video_img_cls <?php echo "video_image_3";?>" data-img_field="<?php echo "video_image_3";?>" >X</span>
                                            <img class="display_video_img <?php echo "video_image_3";?>" src="<?php echo base_url();?>uploads/product_video_images/<?php echo $product_info['id']; ?>/<?=$display; ?>" width="100px" height="100px" />
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
        
                                   </div> <br>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_3">Video Link 3</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_3" id="video_link_3" value="<?php echo $product_info['video_link_3']; ?>" class="form-control" placeholder="Video Link 3"/>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">	
                                     <label for="total_employees">Features</label>
                                </div>
                                <?php 
                                    $features_array = array();
                                    if($product_info['features'] != '') {
                                        $features_array = explode(',',$product_info['features']);
                                    }
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <?php if($features != '') {
                                        foreach($features as $feature) { ?>
                                             <div class="features_list" style=""><input type="checkbox" name="features[]" id="<?php echo $feature['id'];?>" <?php echo (in_array($feature['id'],$features_array)?'checked':'')?> value="<?php echo $feature['id'];?>"  /> <?php echo $feature['feature_content'];?></div>
                                      <?php }  }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="features">Additional Features</label>
							</div>
                             <?php 
                                    $additional_features_array = array();
                                    if($product_info['additional_features'] != '') {
                                        $additional_features_array = explode(',',$product_info['additional_features']);
                                    }
                                ?>
							<div class="col-md-9 col-sm-12 col-xs-12">
                            	<?php if($additional_features != '') {
									foreach($additional_features as $feature) { ?>
                                         <div class="additional_features_list" style=""><input type="checkbox" name="additional_features[]" id="<?php echo $feature['id'];?>"  value="<?php echo $feature['id'];?>"  <?php echo (in_array($feature['id'],$additional_features_array)?'checked':'')?> /> <?php echo $feature['feature_content'];?></div>
                                  <?php }  }?>
							</div>
						</div>
					</div>
				</div>
                
                  <?php /*?>  <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">	
                                     <label for="additional_features">Additional Features</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <textarea name="additional_features" id="additional_features" class="form-control" placeholder="Additional Features"><?php echo $product_info['additional_features'];?></textarea>
                                </div>
                            </div>
                        </div>
                    </div><?php */?>
                    
                    
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="features_1">Features 1</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                            	<textarea name="features_1" id="features_1" class="form-control" placeholder="Features"><?php echo $product_info['features_1'];?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                    
                  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="benefits">Benefits</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                            	<textarea name="benefits" id="benefits" class="form-control" placeholder="Benefits"><?php echo $product_info['benefits'];?></textarea>
							</div>
						</div>
					</div>
				</div>
				
				
			<!--	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="applications_1">Best Applications 1</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                            	<textarea name="applications_1" id="applications_1" class="form-control" placeholder="Applications"><?php echo $product_info['applications_1'];?></textarea>
							</div>
						</div>
					</div>
				</div> -->
                
                
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">	
                                     <label for="applications">Best Applications</label>
                                </div>
                                <?php 
                                    $applications_array = array();
                                    if($product_info['applications'] != '') {
                                        $applications_array = explode(',',$product_info['applications']);
                                    }
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <?php if($applications != '') {
                                        foreach($applications as $application) { ?>
                                             <div class="application_list" style=""><input type="checkbox" name="applications[]" id="<?php echo $application['id'];?>" <?php echo (in_array($application['id'],$applications_array)?'checked':'')?> value="<?php echo $application['id'];?>"  /> <?php echo $application['content'];?></div>
                                      <?php }  }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php if($downloads != '') {
					$i = 1;
					foreach($downloads as $download) { ?>
			
             	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row row_<?php echo $download['id'];?>">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_3">Downloads <?php echo $i;?></label>
							</div>
							<div class="col-md-2 col-sm-6 col-xs-6">
                            	<input type="hidden" name="download_docs[]" id="download_extra_<?php echo $i;?>" value="<?php echo $i;?>" /> 
                                
                                <input type="text" name="download_title_<?php echo $i;?>" id="download_title_<?php echo $i;?>" value="<?php echo $download['title'];?>" class="form-control" placeholder="Title"/>
							</div>
                            
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                 <select class="col-sm-4 form-control" name="download_type_<?php echo $i;?>" id="download_type_<?php echo $i;?>">
                                    <option value="">Select Download Type</option>
                                    <option value="Brochure" <?php echo ($download['document_type'] == 'Brochure')?'selected':'';?>>Brochure</option>
                                    <option value="Safety Data Sheets" <?php echo ($download['document_type'] == 'Safety Data Sheets')?'selected':'';?>>Safety Data Sheets</option>
									<option value="Sell Sheets" <?php echo ($download['document_type'] == 'Sell Sheets')?'selected':'';?>>Sell Sheets</option>
                                </select>
                            </div>
                                
                            <div class="col-md-3 col-sm-6 col-xs-6">
                               <a href="<?php echo base_url();?>uploads/product_downloads_documents/<?php echo $download['document']; ?>" target="_blank" ><?php echo $download['document'];?></a>
                               <input type="hidden" name="download_<?php echo $i;?>" id="download_<?php echo $i;?>" value="<?php echo $download['document'];?>"/>
							</div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                               <button type="button" name="remove_btn" id="remove_btn" class="remove_document" data-product_id="<?php echo $download['product_id']; ?>" data-id="<?php echo $download['id'];?>"><i class="fa fa-close" style="color:red;"></i> Remove</button> 
							</div>
						</div>
					</div>
				</div>
            
            	<?php $i++; } ?>
				
					<div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">	
                                     <label for="download_title">Downloads <?php echo $i;?></label>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                	<input type="hidden" name="download_docs[]" id="download_extra_<?php echo $i;?>" value="<?php echo $i;?>" />
                                    <input type="text" name="download_title_<?php echo $i;?>" id="download_title_<?php echo $i;?>" value="" class="form-control" placeholder="Title"/>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                     <select class="col-sm-4 form-control" name="download_type_<?php echo $i;?>" id="download_type_<?php echo $i;?>">
                                        <option value="">Select Download Type</option>
                                        <option  value="Brochure">Brochure</option>
                                        <option value="Safety Data Sheets">Safety Data Sheets</option>
										<option value="Sell Sheets">Sell Sheet</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                   <input type="file" name="download_<?php echo $i;?>" id="download_<?php echo $i;?>" data-imgid="<?php echo $i;?>" class="form-control">
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                   <button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="<?php echo $i+1;?>"><i class="fa fa-plus"></i> Add More</button> 
                                </div>
                            </div>
                            <div id="add_more_downloads"></div>
                        </div>
                    </div>
				
			<?php 	}  else { ?>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_3">Downloads</label>
							</div>
                            <input type="hidden" name="download_docs[]" id="download_docs" value="1" />
							<div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="text" name="download_title_1" id="download_title_1" value="" class="form-control" placeholder="Title"/>
							</div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                 <select class="col-sm-4 form-control" name="download_type_1" id="download_type_1">
                                    <option value="">Select Download Type</option>
                                    <option  value="Brochure">Brochure</option>
                                    <option value="Safety Data Sheets">Safety Data Sheets</option>
									<option value="Sell Sheets">Sell Sheet</option>
                                </select>
							</div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                               <input type="file" name="download_1" id="download_1" data-imgid="1" class="form-control">
							</div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                            	<?php $new_count = 2;
								if($downloads != '') {
										$new_count = count($downloads);
										$new_count++;
								} else {
									$new_count = '2';	
								}?>
                               <button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="<?php echo $new_count;?>"><i class="fa fa-plus"></i> Add More</button> 
							</div>
						</div>
                        <div id="add_more_downloads"></div>
					</div>
				</div>
                <?php } ?>
                
                  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="size_content">Size Content:</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="size_content" id="size_content" class="form-control"><?php echo $product_info['size_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <?php if($resources != '') {
					$i = 1;
					foreach($resources as $resource) { ?>
                		
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row row_<?php echo $resource['id'];?>">
                                    <div class="col-md-3 col-sm-3 col-xs-3">	
                                         <label for="Technicals">Technicals <?php echo $i;?></label>
                                    </div>
                                    <input type="hidden" name="resources_docs[]" id="resources_docs_<?php echo $i;?>" value="<?php echo $i;?>" />
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <input type="text" name="resource_title_<?php echo $i;?>" id="resource_title_<?php echo $i;?>" value="<?php echo $resource['resource_title']; ?>" class="form-control" placeholder="Title"/>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                         <select class="col-sm-4 form-control" name="resource_type_<?php echo $i;?>" id="resource_type_<?php echo $i;?>">
                                            <option value="">Select Resource Type</option>
                                            <option  value="Warranties" <?php echo ($resource['resource_type'] == "Warranties")?'selected':'';?>>Warranties</option>
                                            <option value="Specifications" <?php echo ($resource['resource_type'] == "Specifications")?'selected':'';?> >Specifications</option>
                                            <option value="Spec Reports" <?php echo ($resource['resource_type'] == "Spec Reports")?'selected':'';?>>Technical Reports</option>
                                            <option value="Installation Guidelines" <?php echo ($resource['resource_type'] == "Installation Guidelines")?'selected':'';?>>Installation Guidelines</option>
                                            <option value="Cleaning & Maintenance" <?php echo ($resource['resource_type'] == "Cleaning & Maintenance")?'selected':'';?>>Cleaning & Maintenance</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
              
                                        <a href="<?php echo base_url();?>uploads/product_resources_documents/<?php echo $resource['resource_file']; ?>" target="_blank" ><?php echo $resource['resource_file'];?></a>
                                        <input type="hidden" name="resource_file_<?php echo $i;?>" id="resource_file_<?php echo $i;?>" value="<?php echo $resource['resource_file'];?>"/>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                       <button type="button" name="remove_resources_btn" id="remove_resources_btn" class="remove_resources_document" data-product_id="<?php echo $resource['product_id']; ?>" data-id="<?php echo $resource['id'];?>"><i class="fa fa-close" style="color:red;"></i> Remove</button> 
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                	
                <?php  $i++; }  ?>
						<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-3">	
                                         <label for="Technicals">Technicals <?php echo $i;?></label>
                                    </div>
                                    <input type="hidden" name="resources_docs[]" id="resources_docs_<?php echo $i;?>" value="<?php echo $i;?>" />
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <input type="text" name="resource_title_<?php echo $i;?>" id="resource_title_<?php echo $i;?>" value="" class="form-control" placeholder="Title"/>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                         <select class="col-sm-4 form-control" name="resource_type_<?php echo $i;?>" id="resource_type_<?php echo $i;?>">
                                            <option value="">Select Resource Type</option>
                                            <option value="Cleaning & Maintenance">Cleaning & Maintenance</option>
                                            <option value="Installation Guidelines">Installation Guidelines</option>
                                            <option value="Specifications">Specifications</option>
                                            <option value="Spec Reports">Technical Reports</option>
                                            <option value="Warranties">Warranties</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <input type="file" name="resource_file_<?php echo $i;?>" id="resource_file_<?php echo $i;?>" data-imgid="<?php echo $i;?>" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                       <button type="button" name="add_resource_btn" id="add_resource_btn" onclick="add_more_resource()" data-id="<?php echo $i+1;?>"><i class="fa fa-plus"></i> Add More</button> 
                                    </div>
                                </div>
                                <div id="add_more_resources"></div>
                            </div>
                        </div>
				
				<?php } else { ?>
                     		
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-3">	
                                         <label for="Technicals">Technicals</label>
                                    </div>
                                    <input type="hidden" name="resources_docs[]" id="resources_docs_1" value="1" />
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <input type="text" name="resource_title_1" id="resource_title_1" value="" class="form-control" placeholder="Title"/>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                         <select class="col-sm-4 form-control" name="resource_type_1" id="resource_type_1">
                                            <option value="">Select Resource Type</option>
                                            <option value="Cleaning & Maintenance">Cleaning & Maintenance</option>
                                            <option value="Installation Guidelines">Installation Guidelines</option>
                                            <option value="Specifications">Specifications</option>
                                            <option value="Spec Reports">Technical Reports</option>
                                             <option  value="Warranties">Warranties</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <input type="file" name="resource_file_1" id="resource_file_1" data-imgid="1" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                       <button type="button" name="add_resource_btn" id="add_resource_btn" onclick="add_more_resource()" data-id="2"><i class="fa fa-plus"></i> Add More</button> 
                                    </div>
                                </div>
                                <div id="add_more_resources"></div>
                            </div>
                        </div>
                	
                <?php } ?>
                               
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_list_banner">Product List Page Banner Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="product_list_banner" id="product_list_banner" class="form-control">
                                <div class="col-md-12"> 
								<?php 	
                                        $display = $product_info['product_list_banner'];	
                                        if($display != "")
                                        {
                                            if($display == "Image.jpg")
                                            {
                                        ?>
                                    <div class="col-md-2">
                                        <img class="product_list_banner_img" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                    </div>
                                    <?php 
                                            }
                                            else
                                            {
                                    ?>
                                    <div class="col-md-2">
                                        <span class="closing_banner_1">X</span>
                                        <img class="custom_design_logo_1" src="<?php echo base_url();?>uploads/product_list_banner/<?=$display; ?>" width="100px" height="100px" />
                                    </div>
                                    <?php 
                                            }
                                        }
                                    ?>
    
                               </div> <br>
							</div>
						</div>
					</div>
				</div>

                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="colors">Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="colors[]" id="colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($colors != '') {
									foreach($colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_color color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="metro_colors">Metro Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="metro_colors[]" id="metro_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($metro_colors != '') {
									foreach($metro_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_metro_color metro_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="metro_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_metro_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="standard_colors">Standard Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="standard_colors[]" id="standard_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($standard_colors != '') {
									foreach($standard_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_standard_color standard_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="standard_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_standard_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="stone_colors">Stone Line Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="stone_colors[]" id="stone_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($stone_line_colors != '') {
									foreach($stone_line_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_stone_color stone_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="stone_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_stone_line_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="elite_colors">Elite Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="elite_colors[]" id="elite_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($elite_colors != '') {
									foreach($elite_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_elite_color elite_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="elite_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_elite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="decore_colors">Decore Collection Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="decore_colors[]" id="decore_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($decor_colors != '') {
									foreach($decor_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_decor_color decor_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="decor_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_decor_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="granite_colors">Granite Flex Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="granite_colors[]" id="granite_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($granite_colors != '') {
									foreach($granite_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_granite_color granite_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="granite_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_granite_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="combo_colors">Two Color Combo Colors</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="combo_colors[]" id="combo_colors" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($combo_colors != '') {
									foreach($combo_colors as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_combo_color combo_color_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="combo_color_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_combo_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="colors">Gallery</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="gallery[]" id="gallery" class="form-control" multiple />
                            
                            <div class="col-md-12"> 
                                <?php if($gallery != '') {
									foreach($gallery as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_gallery gallery_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="gallery_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_gallery/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="evo50">EVO50</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="evo50_colors[]" id="evo50" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($evo50 != '') {
									foreach($evo50 as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_evo50 evo50_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="evo50_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_evo50_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="evo60">EVO60</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="evo60_colors[]" id="evo60" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($evo60 != '') {
									foreach($evo60 as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_evo60 evo60_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="evo60_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_evo60_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="evo70">EVO70</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="evo70_colors[]" id="evo70" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($evo70 != '') {
									foreach($evo70 as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_evo70 evo70_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="evo70_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_evo70_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="evo80">EVO80</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="evo80_colors[]" id="evo70" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($evo80 != '') {
									foreach($evo80 as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_evo80 evo80_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="evo80_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_evo80_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="evo90">EVO90</label>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-6">
                                <input type="file" name="evo90_colors[]" id="evo70" class="form-control" multiple />            
                            
                            <div class="col-md-12"> 
                                <?php if($evo90 != '') {
									foreach($evo90 as $color)
									{	
										if($color['image_name'] != '')
										{ 
										?>
                                        <div class="col-md-2">
                                        	<span class="delete_evo90 evo90_image_<?php echo $color['id'];?>" data-product_id="<?php echo $color['product_id']; ?>" data-id="<?php echo $color['id']; ?>" style="cursor:pointer">X</span>
                                           <img class="evo90_image_<?php echo $color['id'];?>" src="<?php echo base_url();?>uploads/products_evo90_colors/<?php echo $color['product_id'];?>/thumbs/<?php echo $color['image_name'] ?>" width="100px" height="100px" />
                                        </div>
                                        
										<?php }
									
									} }?>

                                </div> <br>
                                </div>
                        </div>
                    </div>
                </div>
                
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="status">Status </label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="status" id="status" required>
                                        <option value="">Select Status</option>
                                        <option  value="1" <?php if($product_info['status']=="1"){echo "selected";}?>>Active</option>
                                        <option value="0" <?php if($product_info['status']=="0"){echo "selected";}?>>Inactive</option>
                                    </select>
							</div>
						</div>

					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Update Product">
					<input type="reset" value="Cancel" class="btn btn-danger" />
				 </div>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
        
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'header_content',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

var editor = CKEDITOR.replace( 'size_content',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

var editor = CKEDITOR.replace( 'mid_content',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

var editor = CKEDITOR.replace( 'thumbnail_content',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

/*var editor = CKEDITOR.replace( 'additional_features',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );*/

var editor = CKEDITOR.replace( 'benefits',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );


/*var editor = CKEDITOR.replace( 'applications_1',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' ); */


var editor = CKEDITOR.replace( 'features_1',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

</script>	

<script type="text/javascript">
    $(document).ready(function(){
        $("#add_product_frm").validate({
			ignore: [],
            rules:{
				product_name:{
					required:true
				},
				browsertitle:{
					required:true
				},
				product_category:{
					required:true
				},
				video_link_1:{
					url: true,
				},
				video_link_2:{
					url: true,
				},
				video_link_3:{
					url: true,
				},
			/*	thumbnail_content: {
					maxlength:150
				},
				/*header_content:{

					 required: function(textarea) {
							   CKEDITOR.instances[textarea.id].updateElement();
							   var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
							   return editorcontent.length === 0;
							 }
					},*/
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				product_name:{
					required:"Please add Product Name.",
				},
				browsertitle:{
					required:"Please add browser title.",
				},
				product_category:{
					required:"Please select Product Category.",
				},
				/*header_content:{
                    required:"Header Content is Required!!",
                },*/
				video_link_1:{
					url: "Please enter valid link.",
				},
				video_link_2:{
					url: "Please enter valid link.",
				},
				video_link_3:{
					url: "Please enter valid link.",
				},
			/*	thumbnail_content:{
					maxlength: "You can enter up to 150 characters.",
				},*/
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
		$(".closing_banner").on("click",function(){ 
			var id  =   $("#product_id").val();
			$.confirm({
						title: 'Confirm!',
						content: 'Are you sure you want to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url":"<?php echo base_url();?>cms_products/delete_product_banner_image",
									"type":"POST",
									"data":{
										id :id,
									},
									success:function(data){
										$('.custom_design_logo').css("display","none");
										$('.closing_banner').css("display","none");
									}
								});	
							},
							cancel: function () {
							},
						}
					});
		});

		$(".closing_banner_1").on("click",function(){ 
			var id  =   $("#product_id").val();
			$.confirm({
						title: 'Confirm!',
						content: 'Are you sure you want to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url":"<?php echo base_url();?>cms_products/delete_product_list_banner",
									"type":"POST",
									"data":{
										id :id,
									},
									success:function(data){
										$('.custom_design_logo_1').css("display","none");
										$('.closing_banner_1').css("display","none");
									}
								});	
							},
							cancel: function () {
							},
						}
					});
		});
		
		 $(".video_img_cls").on("click",function(){ 
		 
		 	var id  =   $("#product_id").val();
			var image_field  =   $(this).data("img_field");
			
		 	$.confirm({
					title: 'Confirm!',
					content: 'Are you sure you want to delete this image??',
					type: 'red',
					buttons: {
						confirm: function () {
							$.ajax({
								"url":"<?php echo base_url();?>cms_products/delete_video_image",
								"type":"POST",
								"data":{
									id :id,
									image_field :image_field
								},
								success:function(data){
									$('.'+image_field).css("display","none");
								}
							});	
						},
						cancel: function () {
						},
					}
				});

			});
			$(document).on('click', '.delete_row', function() {
				var id = $(this).data('id');
				$('.row_'+id).remove();
			});
			
			$(document).on('click', '.remove_document', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_product_document',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
				$(document).on('click', '.delete_metro_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_metro_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.metro_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_standard_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_standard_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.standard_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_stone_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_stone_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.stone_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			 
			$(document).on('click', '.delete_elite_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_elite_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.elite_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_decor_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_decor_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.decor_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			 
			$(document).on('click', '.delete_granite_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_granite_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.granite_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_combo_color', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_combo_color_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.combo_color_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_evo50', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_evo50_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.evo50_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_evo60', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_evo60_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.evo60_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_evo70', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_evo70_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.evo70_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_evo80', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_evo80_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.evo80_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_evo90', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_evo90_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.evo90_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.remove_resources_document', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_product_resource',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_gallery', function() {
				var id = $(this).data('id');
				var product_id = $(this).data('product_id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_products/delete_gallery_image',
									"method": 'POST',
									"data":{'id':id,'product_id':product_id},
									success:function(res){
										console.log(res);
										if(res == true)
										{
											$('.gallery_image_'+id).css("display","none");
										} else {
											$.alert({
												title: 'ERROR!',
												type: 'red',
												content: 'Error while Processing!!',
											});
										}
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
			$(document).on('click', '.delete_resource_row', function() {
				var id = $(this).data('id');
				$('.resource_row_'+id).remove();
			});
    });
	
	function add_more_data(){
		var id = $("#add_more_btn").attr("data-id");
		
		$("#add_more_downloads").append('<input type="hidden" name="download_docs[]" id="download_docs_'+ id +'"" value="'+ id +'"" /><div class="row row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="video_link_3">Downloads '+ id +'</label></div><div class="col-md-2 col-sm-6 col-xs-6"><input type="text" name="download_title_'+ id +'" id="download_title_'+ id +'" value="" class="form-control" placeholder="Title"></div><div class="col-md-2 col-sm-4 col-xs-6"><select class="col-sm-4 form-control" name="download_type_'+ id +'" id="download_type_'+ id +'"><option value="">Select Download Type</option><option value="Brochure">Brochure</option><option value="Safety Data Sheets">Safety Data Sheets</option><option value="Sell Sheets">Sell Sheets</option></select></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="download_'+ id +'" id="download_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div id="add_more_downloads"></div><div class="col-md-2 col-sm-6 col-xs-6"><div class="delete_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span style="cursor:pointer;"><i class="fa fa-trash"></i></span></div></div></div></div>');		
		$("#add_more_btn").attr("data-id", parseInt(id)+1);
	}

	function add_more_resource()
	{
		var id = $('#add_resource_btn').attr("data-id");

		$('#add_more_resources').append('<div class="row resource_row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="Technicals">Technicals '+ id +'</label></div><input type="hidden" name="resources_docs[]" id="resources_docs_'+ id +'" value="'+ id +'" /><div class="col-md-2 col-sm-4 col-xs-6"><input type="text" name="resource_title_'+ id +'" id="resource_title_'+ id +'" value="" class="form-control" placeholder="Title"/></div><div class="col-md-2 col-sm-4 col-xs-6"><select class="col-sm-4 form-control" name="resource_type_'+ id +'" id="resource_type_'+ id +'" required><option value="">Select Resource Type</option><option  value="Warranties">Warranties</option><option value="Specifications">Specifications</option><option value="Spec Reports">Spec Reports</option><option value="Installation Guidelines">Installation Guidelines</option><option value="Cleaning & Maintenance">Cleaning & Maintenance</option></select></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="resource_file_'+ id +'" id="resource_file_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div class="col-md-2 col-sm-4 col-xs-6"><div class="delete_resource_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span><i class="fa fa-trash"></i></span></div></div></div>');
		$("#add_resource_btn").attr("data-id", parseInt(id)+1);
	}
</script>
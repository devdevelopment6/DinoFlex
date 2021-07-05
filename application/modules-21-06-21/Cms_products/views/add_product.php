<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_product_frm" name="add_product_frm" method="post" action="<?php echo base_url().'cms_products/save_product'; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Product Name</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="product_name" id="product_name" value="" class="form-control" placeholder="Product Name"/>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_name">Url Slug</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="slug" id="slug" value="" class="form-control" placeholder="Slug"/>
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
	                                        <option  value="<?php echo $category['id'];?>"><?php echo $category['category_name'];?></option>
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
								 <label for="meta_description">Meta Description</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <textarea name="meta_description" id="meta_description" class="form-control" /></textarea>
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
                                <input type="number" name="order_index" id="order_index" value="" class="form-control" placeholder="Product Order Index"/>
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
                                <input type="text" name="header_title" id="header_title" value="" class="form-control" placeholder="Header Title"/>
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
                                <input type="text" name="header_sub_title" id="header_sub_title" value="" class="form-control" placeholder="Header Sub Title"/>
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
                                <input type="text" name="browsertitle" id="browsertitle" value="" class="form-control" placeholder="Browser Title"/>
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
								<textarea name="header_content" id="header_content" class="form-control" placeholder="Description"></textarea>
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
                                <input type="text" name="mid_title" id="mid_title" value="" class="form-control" placeholder="Middle Title"/>
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
								<textarea name="mid_content" id="mid_content" class="form-control" placeholder="Description"></textarea>
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
								<textarea name="thumbnail_content" id="thumbnail_content" class="form-control" placeholder="Thumbnail Content"></textarea>
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
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_1" id="video_link_1" value="" class="form-control" placeholder="Video Link 1"/>
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
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_2" id="video_link_2" value="" class="form-control" placeholder="Video Link 2"/>
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
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="video_link_3" id="video_link_3" value="" class="form-control" placeholder="Video Link 3"/>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="features">Features</label>
							</div>
							<div class="col-md-9 col-sm-12 col-xs-12">
                            	<?php if($features != '') {
									foreach($features as $feature) { ?>
                                         <div class="features_list" style=""><input type="checkbox" name="features[]" id="<?php echo $feature['id'];?>"  value="<?php echo $feature['id'];?>"  /> <?php echo $feature['feature_content'];?></div>
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
							<div class="col-md-9 col-sm-12 col-xs-12">
                            	<?php if($additional_features != '') {
									foreach($additional_features as $feature) { ?>
                                         <div class="additional_features_list" style=""><input type="checkbox" name="additional_features[]" id="<?php echo $feature['id'];?>"  value="<?php echo $feature['id'];?>"  /> <?php echo $feature['feature_content'];?></div>
                                  <?php }  }?>
							</div>
						</div>
					</div>
				</div>
                
                <?php /*?><div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="additional_features">Additional Features</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                            	<textarea name="additional_features" id="additional_features" class="form-control" placeholder="Additional Features"></textarea>
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
                            	<textarea name="features_1" id="features_1" class="form-control" placeholder="Features"></textarea>
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
                            	<textarea name="benefits" id="benefits" class="form-control" placeholder="Benefits"></textarea>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
			<!--	 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="applications_1">Best Applications 1</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                            	<textarea name="applications_1" id="applications_1" class="form-control" placeholder="Applications"></textarea>
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
							<div class="col-md-4 col-sm-4 col-xs-4">
                            	<?php if($applications != '') {
									foreach($applications as $application) { ?>
                                         <div class="application_list" style=""><input type="checkbox" name="applications[]" id="<?php echo $application['id'];?>"  value="<?php echo $application['id'];?>"  /> <?php echo $application['content'];?></div>
                                  <?php }  }?>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_3">Downloads</label>
							</div>
                            <input type="hidden" name="download_docs[]" id="download_docs_1" value="1" />
							<div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="text" name="download_title_1" id="download_title_1" value="" class="form-control" placeholder="Title"/>
							</div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                 <select class="col-sm-4 form-control" name="download_type_1" id="download_type_1">
                                    <option value="">Select Download Type</option>
                                    <option  value="Brochure">Brochure</option>
                                    <option value="Safety Data Sheets">Safety Data Sheets</option>
									<option value="Sell Sheets">Sell Sheets</option>
                                </select>
							</div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                               <input type="file" name="download_1" id="download_1" data-imgid="1" class="form-control">
							</div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                               <button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="2"><i class="fa fa-plus"></i> Add More</button> 
							</div>
						</div>
                        <div id="add_more_downloads"></div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="size_content">Size Content:</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="size_content" id="size_content" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
                    
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
                                    <option value="Spec Reports">Spec Reports</option>
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
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_list_banner">Product List Page Banner Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="product_list_banner" id="product_list_banner" class="form-control">
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="colors[]" id="colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="metro_colors[]" id="metro_colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="standard_colors[]" id="standard_colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="stone_colors[]" id="stone_colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="elite_colors[]" id="elite_colors" class="form-control" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="decore_colors">Decor Collection Colors</label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="decore_colors[]" id="decore_colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="granite_colors[]" id="granite_colors" class="form-control" multiple />
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="combo_colors[]" id="combo_colors" class="form-control" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">	
                                 <label for="gallery">Gallery</label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <input type="file" name="gallery[]" id="gallery" class="form-control" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                                
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="plan_active">Status </label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="status" id="status" required>
                                        <option value="">Select Status</option>
                                        <option  value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
							</div>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Add Product">
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
				
				thumbnail_content: {
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
				thumbnail_content:{
					maxlength: "You can enter up to 150 characters.",
				},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
		$(document).on('click', '.delete_row', function() {
			var id = $(this).data('id');
			$('.row_'+id).remove();
		});
		
		$(document).on('click', '.delete_resource_row', function() {
			var id = $(this).data('id');
			$('.resource_row_'+id).remove();
		});
		
    });
	
	function add_more_data(){
		var id = $("#add_more_btn").attr("data-id");
		
		$("#add_more_downloads").append('<input type="hidden" name="download_docs[]" id="download_docs_'+ id +'"" value="'+ id +'"" /><div class="row row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="video_link_3">Downloads '+ id +'</label></div><div class="col-md-2 col-sm-6 col-xs-6"><input type="text" name="download_title_'+ id +'" id="download_title_'+ id +'" value="" class="form-control" placeholder="Title"></div><div class="col-md-2 col-sm-4 col-xs-6"><select class="col-sm-4 form-control" name="download_type_'+ id +'" id="download_type_'+ id +'"><option value="">Select Download Type</option><option value="Brochure">Brochure</option><option value="Safety Data Sheets">Safety Data Sheets</option></select></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="download_'+ id +'" id="download_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div id="add_more_downloads"></div><div class="col-md-1 col-sm-6 col-xs-6"><div class="delete_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span><i class="fa fa-trash"></i></span></div></div></div></div>');		
		$("#add_more_btn").attr("data-id", parseInt(id)+1);
	}
	
	function add_more_resource()
	{
		var id = $('#add_resource_btn').attr("data-id");

		$('#add_more_resources').append('<div class="row resource_row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="Technicals">Technicals '+ id +'</label></div><input type="hidden" name="resources_docs[]" id="resources_docs_'+ id +'" value="'+ id +'" /><div class="col-md-2 col-sm-4 col-xs-6"><input type="text" name="resource_title_'+ id +'" id="resource_title_'+ id +'" value="" class="form-control" placeholder="Title"/></div><div class="col-md-2 col-sm-4 col-xs-6"><select class="col-sm-4 form-control" name="resource_type_'+ id +'" id="resource_type_'+ id +'" required><option value="">Select Resource Type</option><option  value="Warranties">Warranties</option><option value="Specifications">Specifications</option><option value="Spec Reports">Spec Reports</option><option value="Installation Guidelines">Installation Guidelines</option><option value="Cleaning & Maintenance">Cleaning & Maintenance</option></select></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="resource_file_'+ id +'" id="resource_file_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div class="col-md-2 col-sm-4 col-xs-6"><div class="delete_resource_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span><i class="fa fa-trash"></i></span></div></div></div>');
		$("#add_resource_btn").attr("data-id", parseInt(id)+1);
	}
	
</script>
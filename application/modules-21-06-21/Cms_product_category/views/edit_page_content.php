<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_content_frm" name="add_content_frm" method="post" action="<?php echo base_url().'cms_product_category/update_content/'.$content['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_content">Meta Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="header_content" id="header_content" class="form-control" placeholder="Description" required><?php echo $content['header_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <input type="hidden" id="org_id" name="org_id" value="<?php echo $content['id'];?>" />
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Title</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<input type="text" name="header_title" id="header_title" class="form-control" placeholder="Title" value="<?php echo $content['header_title']; ?>">
							</div>
						</div>
					</div>
				</div>
                
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="product_content">Product Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="product_content" id="product_content" class="form-control" placeholder="Description"><?php echo $content['product_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="custom_design_logo">Custom Design Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="custom_design_logo" id="custom_design_logo" class="form-control">
                                <div class="col-md-12"> 
							<?php 	
									$display = $content['custom_design_logo'];	
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
                                	<span class="closing_banner closing_banner_<?php echo "custom_design_logo"; ?>" data-img_field="<?php echo "custom_design_logo"; ?>" id="">X</span>
                                    <img class="custom_design_logo_<?php echo "custom_design_logo";?>" src="<?php echo base_url();?>uploads/product_category_image/<?=$display; ?>" width="100px" height="100px" />
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
								 <label for="custom_design_content">Custom Design Content :</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="custom_design_content" id="custom_design_content" class="form-control"><?php echo $content['custom_design_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="custom_logo_colors_logo">Custom Logo Colors Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="custom_logo_colors_logo" id="custom_logo_colors_logo" class="form-control">
                                	<div class="col-md-12"> 
							<?php 	
									$display = $content['custom_logo_colors_logo'];	
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
                                	<span class="closing_banner closing_banner_<?php echo "custom_logo_colors_logo"; ?>" data-img_field="<?php echo "custom_logo_colors_logo"; ?>">X</span>
                                    <img class="custom_design_logo_<?php echo "custom_logo_colors_logo";?>" src="<?php echo base_url();?>uploads/product_category_image/<?=$display; ?>" width="100px" height="100px" />
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
								 <label for="custom_logo_colors_content"> Custom Logo Colors Content : </label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="custom_logo_colors_content" id="custom_logo_colors_content" class="form-control"><?php echo $content['custom_logo_colors_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>

            
            	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="custom_products_logo">Custom Products Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="custom_products_logo" id="custom_products_logo" class="form-control">
                                  <div class="col-md-12"> 
							<?php 	
									$display = $content['custom_products_logo'];	
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
                                	<span class="closing_banner closing_banner_<?php echo "custom_products_logo"; ?>" data-img_field="<?php echo "custom_products_logo"; ?>">X</span>
                                    <img class="custom_design_logo_<?php echo "custom_products_logo";?>" src="<?php echo base_url();?>uploads/product_category_image/<?=$display; ?>" width="100px" height="100px" />
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
								 <label for="custom_products_content"> Custom Products Content : </label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="custom_products_content" id="custom_products_content" class="form-control"><?php echo $content['custom_products_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="footer_description">Footer Description</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="footer_description" id="footer_description" class="form-control" placeholder="Description"><?php echo $content['footer_description']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="button_link">Button Link</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="button_link" id="button_link" value="<?php echo $content['button_link']; ?>" class="form-control" placeholder="Button Link"/>
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
                                        <option  value="1" <?php if($content['status']=="1"){echo "selected";}?> >Active</option>
                                        <option value="0"  <?php if($content['status']=="0"){echo "selected";}?>>Inactive</option>
                                    </select>
							</div>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Update Content">
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


var editor = CKEDITOR.replace( 'product_content',{
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

var editor = CKEDITOR.replace( 'footer_description',{
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

var editor = CKEDITOR.replace( 'custom_design_content',{
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

var editor = CKEDITOR.replace( 'custom_logo_colors_content',{
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

var editor = CKEDITOR.replace( 'custom_products_content',{
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
        $("#add_content_frm").validate({
			ignore: [],
            rules:{
				header_content:{

					 required: function(textarea) {
							   CKEDITOR.instances[textarea.id].updateElement();
							   var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
							   return editorcontent.length === 0;
							 }
					},
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				header_content:{
                    required:"Header Content is Required!!",
                },
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
		   $(".closing_banner").on("click",function(){ 
			  var result = confirm("Are you sure you want to delete?");
			  if (result) {
		
				var image_field  =   $(this).data("img_field");	
				var id  =   $("#org_id").val();
				if(id	!=	'')																																																								 				{
					$.ajax({
						"url":"<?php echo base_url();?>cms_product_category/delete_product_category_image",
						"type":"POST",
						"data":{
							id :id,
							image_field :image_field
						},
						success:function(data){
							$('.custom_design_logo_'+image_field).css("display","none");
							$('.closing_banner_'+image_field).css("display","none");
						}
					});																																																		 				}else{
						alert('Unknown error occured.');
				}
			  }
			});
	
    });
</script>
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Content</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>application_products/update_application_product" name="add_application_category" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" value="<?php echo $application_product['id']?>" name="product_id">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="product_name"> Product Name </label>
									<input type="text" id="product_name" name = "product_name" value="<?php echo $application_product['product_name']?>" placeholder="Product name" class="form-control" />
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="header_title"> Select Size </label>
								<br>
								<div class="col-sm-8">
									<div class="row">
										<?php
										$size_array=array();
										if($application_product['available_size']!=NULL){
											$size_array=explode(",",$application_product['available_size']);
										}
										if($all_area_size!=false){
											for( $i=0; $i<count($all_area_size); $i++ ) {

												?>
												<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="<?php echo $all_area_size[$i]['id']; ?>" <?php echo (in_array($all_area_size[$i]['id'],$size_array))?"checked":""; ?> />  <?php echo $all_area_size[$i]['size_name']; ?></div>
												<?php
											}
										} ?>
									</div>
									<label id="available_size[]-error" class="error" for="available_size[]"></label>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="product_image_name">Product Image </label>
								<input type="file" id="product_image_name" name="product_image_name" class="form-control"  />
								<br>
								<?php if($application_product['product_image']!= '' && file_exists(FCPATH.'uploads/application_products/'.$application_product['id'].'/'.$application_product['product_image']) && !is_dir(FCPATH.'uploads/application_products/'.$application_product['id'].'/'.$application_product['product_image'])){  ?>
									<img src = "<?php echo base_url().'uploads/application_products/'.$application_product['id'].'/'.$application_product['product_image']; ?>" style="height:50px;width:140px;" />

								<?php }	?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="select_product">Select Main Product </label>
								<select name="select_product" id="select_product" class="form-control" >
									<option value="">-- Select --</option>
									<?php if($products!=false){
										foreach($products as $pro){
											?>
											<option value="<?php echo $pro['id']; ?>" <?php echo ($pro['id']==$application_product['main_product_id'])?"selected":"";?>><?php echo $pro['product_name']; ?></option>
										<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="" disabled> --- Select Status --- </option>
									<option value="1" <?php echo ($application_product['status']==1)?"selected":""; ?>>Active</option>
									<option value="0" <?php echo ($application_product['status']==0)?"selected":""; ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-md-5 col-sm-5 col-xs-5">
							<input type="submit" class="btn btn-success btn-sm" name="add_application_products" id="add_application_products" value="Add Application Product">
							<input type="reset" class="btn btn-default btn-sm">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#custom-form').validate({
			rules: {
				banner_image: 'required',
				category_name: 'required',
				header_title: 'required',
				header_content: 'required',
				section_image: 'required',
				section_title: 'required',
				section_content: 'required',
				application_section_image: 'required',
				display_order: {
					required: true,
					number: true
				},
				status: 'required'
			},
			messages: {
				banner_image: 'This field is required',
				category_name: 'This field is required',
				header_title: 'This field is required',
				header_content: 'This field is required',
				section_image: 'This field is required',
				section_title: 'This field is required',
				section_content: 'This field is required',
				application_section_image: 'This field is required',
				display_order: 'Enter number Only',
				status: 'This field is required'
			},
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'header_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	var editor1 = CKEDITOR.replace( 'section_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );
</script>
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Content</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>application_products/create_application_products" name="add_application_category" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="product_name"> Product Name </label>
									<input type="text" id="product_name" name = "product_name" value="" placeholder="Product name" class="form-control" />
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="header_title"> Select Size </label>
								<br>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="1">  4mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="2">  5mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="3">  6mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="4">  7mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="5">  8mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="6">  9mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="7">  10mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="8">  12mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="9">  14mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="10">  16mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="11">  18mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="12">  20mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="13">  22mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="14">  24mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="15">  26mm</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="16">  0.75"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="17">  1.0"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="18">  1.5"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="19">  1.75"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="20">  2.25"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="21">  2.5"</div>
										<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="22">  3.5"</div>
									</div>
									<label id="available_size[]-error" class="error" for="available_size[]"></label>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="product_image_name">Product Image </label>
								<input type="file" id="product_image_name" name = "product_image_name" value=""  class="form-control" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="select_product">Select Main Product </label>
								<select name="select_product" id="select_product" class="form-control">
									<option value="" disabled> --- Select Product --- </option>
									<?php foreach($products as $product)  { ?>
										<option value="<?php echo $product['id']; ?>"> <?php echo $product['product_name']; ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="" disabled> --- Select Status --- </option>
									<option value="1" >Active</option>
									<option value="0" >Inactive</option>
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
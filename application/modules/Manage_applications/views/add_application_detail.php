<?php //$this->load->view('notification'); ?>
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Content</h3>
				</div>
				<form id="add_app_details" action="<?php echo base_url(); ?>manage_applications/insert_application_details" method="post" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="application_category_id">Select Product</label>
									<select class="form-control" name="select_product" id="select_product" >
										<option value="">-- Select --</option>
										<?php if($products!=false){
											foreach($products as $pro){
												?>
												<option value="<?php echo $pro['id']; ?>"><?php echo $pro['product_name']; ?></option>
											<?php }} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="application_category_id">Select Category</label>
									<select class="form-control" name="select_category" id="select_category" >
										<option value="">-- Select --</option>
										<?php if($categories!=false){
											foreach($categories as $cat){
												?>
												<option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
											<?php }} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="application_category_id">Select Sub Category</label>
									<select class="form-control" name="select_sub_category" id="select_sub_category" >
										<option value="">-- Select --</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<div class="form-group">
									<label for="application_category_id">Select Size </label>
									<div class="row append_size"></div>
									<label id="available_size[]-error" class="error" for="available_size[]"></label>
								</div>
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
							<input type="submit" class="btn btn-success btn-sm" name="add_sub_application_category" id="add_sub_application_category" value="Add Content">
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
<script type="text/javascript">
$(document).ready(function(){
	$("#select_category").on("change",function(){
		var cat_id = $(this).val();
		$.ajax({
			url : "<?php echo base_url(); ?>manage_applications/get_sub_categories",
			type : "POST",
			data : {'cat_id': cat_id,},
			success : function (res){
				if(res!=false){
					$("#select_sub_category").html(res);
				}
			},
		});
	});
	$("#select_product").on("change",function(){
		var pro_id = $(this).val();
		$.ajax({
			url : "<?php echo base_url(); ?>manage_applications/get_products_size",
			type : "POST",
			data : {'pro_id': pro_id,},
			success : function (res){
				if(res!=false){
					$(".append_size").html(res);
				}
			},
		});
	});
	$("#add_app_details").validate({
    rules:{
		select_product:{
			required : true,
		},
		select_category:{
			required : true,
		},
		select_sub_category: {
				required:true
		},
		"available_size[]": {
            required:true,
          }
 	 },
 	messages:{
		select_product:{
			required : "Select Product",
		},
		select_category:{
			required : "Select category",
		},
		select_sub_category: {
	   				required:"Sub Category is required."
		 	},
		"available_size[]": {
			required:"select atleast one size"
		}
    },
   });
});
</script>
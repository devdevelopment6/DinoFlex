<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Swatch Color Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_feature_frm" name="add_feature_frm" method="post" action="<?php echo base_url().'admin_color_finder/save_swatch'; ?>" enctype="multipart/form-data">
                
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="swatch_name">Swatch Name</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="swatch_name" id="swatch_name" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="plan_active">Color Category </label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="color_category" id="color_category" required>
                                        <option value="">Select Color Category</option>
                                        <?php if($color_categories != '') {
                                        	foreach($color_categories as $color_category) { ?>
                                        	<option  value="<?php echo $color_category['id']; ?>"><?php echo $color_category['color_category']; ?></option>
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
								 <label for="swatch_code">Code</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="swatch_code" id="swatch_code" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="price_level">Price Level</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="price_level" id="price_level" class="form-control">
							</div>
						</div>
					</div>
				</div>

                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="swatch_image">Swatch Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="swatch_image" id="swatch_image" class="form-control">
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
                	<input type="submit" class="btn btn-primary submit_button" value="Add Swatch">
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#add_feature_frm").validate({
            rules:{
            	swatch_image:{
					required:true	
				},
				color_category:{
					required:true
				},
				swatch_name:{
				 	required: true
				},
				swatch_code:{
				 	required: true
				},
				price_level:{
				 	required: true
				},
				status: {
					required:true
				}
            },
            messages:{
            	swatch_image:{
					required:"Swatch Image is Required!!",	
				},
				color_category:{
					required:"Color Category is Required!!",
				},
				swatch_name:{
                    required:"Swatch Name is Required!!",
                },
                swatch_code:{
                    required:"Swatch Code is Required!!",
                },
                price_level:{
				 	required:"Price Level is Required!!",
				},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
    });
</script>
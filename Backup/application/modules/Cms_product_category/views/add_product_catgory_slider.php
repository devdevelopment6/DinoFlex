<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_content_frm" name="add_content_frm" method="post" action="<?php echo base_url().'cms_product_category/save_category_sliders'; ?>" enctype="multipart/form-data">
              <div class="box-body">
               
               <input type="hidden" name="product_category_id" id="product_category_id" value="<?php echo $product_category_id; ?>" />
               
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="slider_image">Slider Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="slider_image" id="slider_image" class="form-control">
							</div>
						</div>
					</div>
				</div>
                
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="title">Title</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="title" id="title" value="" class="form-control" placeholder="Title"/>
							</div>
						</div>
					</div>
				</div>
                
                 
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="middle_image">Middle Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="middle_image" id="middle_image" class="form-control">
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="title_2">Tag Line</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="title_2" id="title_2" value="" class="form-control" placeholder="Tag Line"/>
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
                	<input type="submit" class="btn btn-primary submit_button" value="Add Slider">
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
        $("#add_content_frm").validate({
			ignore: [],
            rules:{
					slider_image:{
						required:true	
					},
					title:{
						required:true	
					},
					/*middle_image:{
						required:true	
					},
					title_2:{
						required:true	
					},*/
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				slider_image:{
                    required:"Slider Image is Required!!",
                },
				title:{
						required:"Title is required!"	
					},
				/*middle_image:{
						required:"Image is required!",	
					},
				title_2:{
					required:"Tag Line is required!",	
				},*/
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
    });
</script>
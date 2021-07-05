<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Color Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_feature_frm" name="add_feature_frm" method="post" action="<?php echo base_url().'admin_color_finder/save_color_category'; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="color_category">Color Category</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="color_category" id="color_category" class="form-control">
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
                	<input type="submit" class="btn btn-primary submit_button" value="Add Color Category">
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
				  color_category:{
					 required: true
					},
					status: {		
          	required:true																 					
					}
            },
            messages:{
				color_category:{
                    required:"Color Category is Required!!",
                },
				status:	{
	   				required:"Status is required!!"
		 		},
            },
        });
    });
</script>
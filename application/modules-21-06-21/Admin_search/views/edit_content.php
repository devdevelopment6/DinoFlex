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
            <form  id="add_feature_frm" name="add_feature_frm" method="post" action="<?php echo base_url().'admin_search/update_content/'. $content['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="feature_image">Title</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="title" id="title" placeholder="Title" value="<?php echo $content['title']; ?>" class="form-control">
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
                      <option  value="1" <?php if($content['status']=="1"){echo "selected";}?>>Active</option>
                      <option value="0" <?php if($content['status']=="0"){echo "selected";}?>>Inactive</option>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#add_feature_frm").validate({
            rules:{
    				title:{
    					 required: true,
    				},
    				status: {
    					required:true
    				}
                },
                messages:{
    				title:{
                        required:"Title is Required!!",
                    },
    				status:	{
    	   				required:"Status is required."
    		 		},
                },
        });
    });
</script>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Resource</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_resource_frm" name="add_resource_frm" method="post" action="<?php echo base_url().'cms_resources_page/save_resource'; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="resource_title">Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="resource_title" id="resource_title" value="" class="form-control" placeholder="Title"/>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="resource_type">Resource Type</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="resource_type" id="resource_type" required>
                                        <option value="">Select Resource Type</option>
	                                    <option value="Warranties">Warranties</option>
	                                    <option value="Specifications">Specifications</option>
	                                    <option value="Installation Guidelines">Installation Guidelines</option>
	                                    <option value="Cleaning & Maintenance">Cleaning & Maintenance</option>
                                    </select>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="resource_file">Document</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="resource_file" id="resource_file" class="form-control">
							</div>
						</div>
					</div>
				</div>
				
				
			
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="product_id">Product</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="product_id" id="product_id" required>
                                        <option value="">Select Product</option>
                                        <?php if($products != '') {
										foreach($products as $product)	{ ?>
	                                        <option  value="<?php echo $product['id'];?>"><?php echo $product['product_name'];?></option>
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
								 <label for="resource_position">Display Position</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="number" name="resource_position" id="resource_position" class="form-control" placeholder="Display Position">
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
                	<input type="submit" class="btn btn-primary submit_button" value="Add Resource">
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
        $("#add_resource_frm").validate({
            rules:{
				resource_title:{
					required:true
				},
				resource_file:{
					required:true
				},
				resource_type:{
					required:true
				},
				product_id:{
					required: true,
				},
				status: {																														required:true																											
				}
            },
            messages:{
				resource_title:{
					required:"Please add Resource Title.",
				},
				resource_file:{
					required:"Please select Resource Document.",
				},
				resource_type:{
					required:"Please select Resource Type.",
				},
				product_id:{
					required: "Please select Product.",
				},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
    });
	
</script>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Content</h3>
            </div>
		<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>application_sub_category/create_application_sub_category" name="add_application_category" enctype="multipart/form-data">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<div class="form-group">
							<label for="application_category_id">Select Category</label>
							<select name="application_category_id" id="application_category_id" class="form-control">
								<option value="" disabled> --- Select Category --- </option>
								<?php foreach($category as $cat)  { ?>
									<option value="<?php echo $cat['id']; ?>"> <?php echo $cat['category_name']; ?> </option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="sub_category_name">Sub Category Name </label>
						<input type="text" id="sub_category_name" name = "sub_category_name" value="" placeholder="Sub Category name" class="form-control" />
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
					<input type="submit" class="btn btn-success btn-sm" name="add_sub_application_category" id="add_sub_application_category" value="Add Sub Application Category">
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
				    sub_category_name: 'required',
				    application_category_id: 'required',
					status: 'required'
		  		},
			  	messages: {
				    sub_category_name: 'This field is required',
				    application_category_id: 'Please select category',
					status: 'This field is required'
				},
			});
	});
</script>


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Content</h3>
            </div>
		<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>area_size/create_area_size" name="add_application_category" enctype="multipart/form-data">
		    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="area">Add Area </label>
						<input type="text" id="area" name = "area" value="" placeholder="Area" class="form-control" />
					</div>
				</div>
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="add_area" id="add_area" value="Add Area">
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
				    area: 'required',
		  		},
			  	messages: {
				    area: 'This field is required',
				},
			});
	});
</script>

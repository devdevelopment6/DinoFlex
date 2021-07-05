
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Content</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>cms_case_study/create_case_study_slider" name="add_case_study_slider" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="slider_image"> Slider Image </label>
								<input type='file' class="form-control" id="slider_image" name="slider_image" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="title"> Title </label>
								<input type='text' class="form-control" id="title" name="title" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="upload"> Upload PDF </label>
								<input type='file' class="form-control" id="upload" name="upload"/>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="tag_line"> Tag Line </label>
								<?php /*?><input type='text' class="form-control" id="tag_line" name="tag_line" /><?php */?>
                                <textarea id="tag_line" name="tag_line" rows="7" class="form-control"></textarea>
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
							<input type="submit" class="btn btn-success btn-sm" name="add_slider" id="add_slider" value="Add Case Study Slider">
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
				//slider_image: 'required',
				title: 'required',
				//middle_image: 'required',
				tag_line: 'required',
				status: 'required'
			},
			messages: {
				//slider_image: 'This field is required',
				title: 'This field is required',
				//middle_image: 'This field is required',
				tag_line: 'This field is required',
				status: 'This field is required'
			},
		});
	});
</script>
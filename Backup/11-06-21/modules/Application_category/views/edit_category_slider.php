
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Slider</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>application_category/update_category_slider/<?php echo $category_slider['id']?>" name="edit_category_slider" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="slider_image"> Slider Image </label>
								<input type='file' class="form-control" id="slider_image" name="slider_image" />
								<?php
								if($category_slider['slider_image']!="")
								{ ?>
								<img src="<?php echo base_url();?>uploads/application_category_slider/thumbs/<?php echo $category_slider['slider_image'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="title"> Title </label>
								<input type='text' class="form-control" id="title" name="title" value="<?php echo $category_slider['title'];?>"/>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="application_category">Application Category</label>
								<select name="application_category" id="application_category" class="form-control">
									<option value="0" > --- Application Category --- </option>
									<?php if($application_categories!=''){
											foreach($application_categories as $cat){
									?>
									<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$category_slider['application_category_id'])?"selected":""; ?> ><?php echo $cat['category_name']; ?></option>
									<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="middle_image"> Middle Image </label>
								<input type='file' class="form-control" id="middle_image" name="middle_image"/>
								<?php
								if($category_slider['middle_image']!="")
								{ ?>
									<img src="<?php echo base_url();?>uploads/application_category_slider/thumbs/<?php echo $category_slider['middle_image'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="tag_line"> Tag Line </label>
								<input type='text' class="form-control" id="tag_line" name="tag_line" value="<?php echo $category_slider['tag_line'];?>"/>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="link"> Link </label>
								<input type='text' class="form-control" id="link" name="link" value="<?php echo $category_slider['link'];?>"/>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="" disabled> --- Select Status --- </option>
									<option value="1" <?php echo ($category_slider['status']==1)?"selected":""; ?>>Active</option>
									<option value="0" <?php echo ($category_slider['status']==0)?"selected":""; ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-md-5 col-sm-5 col-xs-5">
							<input type="submit" class="btn btn-success btn-sm" name="add_slider" id="add_slider" value="Update Slider">
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
				title: 'required',
				tag_line: 'required',
				status: 'required'
			},
			messages: {
				title: 'This field is required',
				tag_line: 'This field is required',
				status: 'This field is required'
			},
		});
	});
</script>
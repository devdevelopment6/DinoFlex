
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Content</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>cms_case_study/update_testimonial_slider/<?php echo $testimonial_slider['id']?>" name="edit_category_slider" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="slider_image"> Slider Image </label>
								<input type='file' class="form-control" id="slider_image" name="slider_image" />
								<?php
								if($testimonial_slider['slider_image']!="")
								{ ?>
								<img src="<?php echo base_url();?>uploads/case_study/thumbs/<?php echo $testimonial_slider['slider_image'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="title"> Title </label>
								<input type='text' class="form-control" id="title" name="title" value="<?php echo $testimonial_slider['title'];?>"/>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="upload"> Upload PDF </label>
								<input type='file' class="form-control" id="upload" name="upload"/>
								<?php
								if($testimonial_slider['upload']!="")
								{ ?>
									<a target="_blank" href="<?php echo base_url();?>uploads/case_study/<?php echo $testimonial_slider['upload'] ?>"><?php echo $testimonial_slider['upload'] ?></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="tag_line"> Tag Line </label>
								<?php /*?><input type='text' class="form-control" id="tag_line" name="tag_line" value="<?php echo $testimonial_slider['tag_line'];?>"/><?php */?>
                                <textarea id="tag_line" name="tag_line" rows="7" class="form-control"><?php echo $testimonial_slider['tag_line'];?></textarea>
							</div>
						</div>

						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="" disabled> --- Select Status --- </option>
									<option value="1" <?php echo ($testimonial_slider['status']==1)?"selected":""; ?>>Active</option>
									<option value="0" <?php echo ($testimonial_slider['status']==0)?"selected":""; ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-md-5 col-sm-5 col-xs-5">
							<input type="submit" class="btn btn-success btn-sm" name="add_slider" id="add_slider" value="Add Slider">
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


<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">

	var editor4 = CKEDITOR.replace( 'tag_line',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor4, '../' );
</script>
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
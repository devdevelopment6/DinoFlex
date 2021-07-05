
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Content</h3>
				</div>
				<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>cms_case_study/update_case_study_content/<?php echo $case_study['id']?>" name="add_application_category" enctype="multipart/form-data">
				    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" value="<?php echo $case_study['id']?>" name="id" id="id">
					<div class="box-body">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="banner_image"> Banner Image </label>
								<input type='file' class="form-control" id="banner_image" name="banner_image" />
								<?php
								if($case_study['banner_image']!="")
								{ ?>
									<img src="<?php echo base_url();?>uploads/case_study/thumbs/<?php echo $case_study['banner_image'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="header_title"> Header Title </label>
								<input type="text" id="header_title" name = "header_title" value="<?php echo $case_study['header_title']?>" placeholder="Header Title" class="form-control" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="browsertitle"> Browser Title </label>
								<input type="text" id="browsertitle" name = "browsertitle" value="<?php echo $case_study['browsertitle']?>" placeholder="Browser Title" class="form-control" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="header_content"> Header Content </label>
								<textarea class="form-control" id="header_content" name="header_content" placeholder="Header Content"><?php echo $case_study['header_content']?></textarea>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="section_title1"> Section Title1 </label>
								<input type="text" id="section_title1" name = "section_title1" value="<?php echo $case_study['section_title1']?>" placeholder="Section Title1" class="form-control" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="section_title2"> Section Title2 </label>
								<input type="text" id="section_title2" name = "section_title2" value="<?php echo $case_study['section_title2']?>" placeholder="Section Title2" class="form-control" />
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="section_content"> Section Content </label>
								<textarea class="form-control" id="section_content" name="section_content" placeholder="Section Content"><?php echo $case_study['section_content']?></textarea>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="" disabled> --- Select Status --- </option>
									<option value="1" <?php echo ($case_study['status']==1)?"selected":""; ?>>Active</option>
									<option value="0" <?php echo ($case_study['status']==0)?"selected":""; ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-md-5 col-sm-5 col-xs-5">
							<input type="submit" class="btn btn-success btn-sm" name="edit_application_category" id="edit_application_category" value="Edit Case Study Content">
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
				header_title: 'required',
				browsertitle: 'required',
				header_content: 'required',
				section_content: 'required',
				section_title1: 'required',
				section_title2: 'required',
				status: 'required'
			},
			messages: {
				header_title: 'This field is required',
				browsertitle: 'This field is required',
				header_content: 'This field is required',
				section_content: 'This field is required',
				section_title1: 'This field is required',
				section_title2: 'This field is required',
				status: 'This field is required'
			},
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'header_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	var editor1 = CKEDITOR.replace( 'section_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );
</script>
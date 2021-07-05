
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Content</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_home/update" name="home_content" enctype="multipart/form-data">
			<div class="box-body">
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<input type="hidden" id="home_id" name = "home_id" value="<?php echo $home['id'];?>" />
						<label for="top_title">Top Content title</label>
						<input type="text" id="top_title" name = "top_title" value="<?php echo $home['top_content_title'];?>" placeholder="Content title" class="form-control" />
					</div>
				</div>
				
				<!--<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="browsertitle">Browser title</label>
						<input type="text" id="browsertitle" name = "browsertitle" value="<?php echo $home['browsertitle'];?>" placeholder="Browser title" class="form-control" />
					</div>
				</div>-->
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="top_content"> Top Content </label>
						<textarea class="form-control" id="top_content" name="top_content" value="" placeholder="Top Content"><?php echo $home['top_content'];?></textarea>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_image"> Banner Image </label>
						<input type='file' class="form-control" id="banner_image" name="banner_image"/>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/home_image/thumbs/<?php echo $home['banner_image1'] ?>" width="100px" height="100px">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="middle_title"> Middle Content title : </label>
						<input type="text" id="middle_title" name = "middle_title" value="<?php echo $home['middle_content_title_1'];?>" placeholder="Middle Title" class="form-control" />
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="midle_content"> Middle Content </label>
						<textarea class="form-control" id="midle_content" name="midle_content" placeholder="Header Content"><?php echo $home['middle_content_1'];?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_title_1">Section Content title 1 : </label>
						<input type="text" id="section_title_1" name = "section_title_1" value="<?php echo $home['section_title_1'];?>" placeholder="Section title " class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_image"> Section Image 1</label>
						<input type='file' class="form-control" id="section_image_1" name="section_image_1"/>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/home_image/thumbs/<?php echo $home['section_img1'] ?>" width="100px" height="100px">
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="header_content"> Section Content 1</label>
						<textarea class="form-control" id="section_content_1" name="section_content_1" ><?php echo $home['section_content_1'];?></textarea>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="header_title">Section Content title 2 :</label>
						<input type="text" id="section_title_2" name = "section_title_2" value="<?php echo $home['section_title_2'];?>" placeholder="Section Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_image"> Section Image 2</label>
						<input type='file' class="form-control" id="section_image_2" name="section_image_2"/>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/home_image/thumbs/<?php echo $home['section_img_2'] ?>" width="100px" height="100px">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="header_content"> Section Content 2 </label>
						<textarea class="form-control" id="section_content_2" name="section_content_2"><?php echo $home['section_content2'];?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="banner_image_2"> Banner Image 2</label>
						<input type='file' class="form-control" id="banner_image_2" name="banner_image_2"/>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/home_image/thumbs/<?php echo $home['banner_img_2'] ?>" width="100px" height="100px">
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="last_content"> Last Content </label>
						<textarea class="form-control" id="last_content" name="last_content" ><?php echo $home['last_content'];?></textarea>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value=""> --- Select Status --- </option>
							<option value="1" <?php echo $home['status'] == 1?'selected':''; ?>>Active</option>
							<option value="0" <?php echo $home['status'] == 0?'selected':''; ?>>Inactive</option>
						</select>
					</div>
				</div>
				
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Update Home Content">
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
			$('#home_content').validate({
		  		rules: {
				    top_title: 'required',
					//browsertitle: 'required',
				    top_content: 'required',
				   
				    middle_title: 'required',
				    midle_content: 'required',
				    section_title_1: 'required',
				    
				    section_content_1: 'required',
					section_title_2: 'required',
				   
				    section_content_2: 'required',
				  
				    last_content: 'required',
					status: 'required'
		  		},
			  	messages: {
				    banner_image: 'This field is required',
					//browsertitle: 'This field is required',
				    category_name: 'This field is required',
				    header_title: 'This field is required',
				    header_content: 'This field is required',
				    section_image: 'This field is required',
				    section_title: 'This field is required',
				    section_content: 'This field is required',
				    application_section_image: 'This field is required',
				    display_order: 'Enter number Only',
					status: 'This field is required'
				},
			});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'top_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	var editor1 = CKEDITOR.replace( 'midle_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );
	var editor2 = CKEDITOR.replace( 'section_content_1',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor2, '../' );
	var editor3 = CKEDITOR.replace( 'section_content_2',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor3, '../' );
	var editor4 = CKEDITOR.replace( 'last_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor4, '../' );
</script>
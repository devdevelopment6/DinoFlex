
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit About us Content</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_about/update" name="home_content" enctype="multipart/form-data">
		    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="box-body">
				<input type="hidden" id="about_id" name = "about_id" value="<?php echo $about['id']; ?>" />
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="top_title">title</label>
						<input type="text" id="title" name = "title" value="<?php echo $about['title']; ?>" placeholder="Content title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="top_title">Browser title</label>
						<input type="text" id="browsertitle" name = "browsertitle" value="<?php echo $about['browsertitle']; ?>" placeholder="Browser title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="meta_description">Meta Description</label>
						<textarea type="text" name="meta_description" id="meta_description" class="form-control" /><?php echo $about['meta_description']; ?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" id="description" name="description" value="" placeholder="Top Content"><?php echo $about['description']; ?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="image">Image </label>
						<input type='file' class="form-control" id="image" name="image"/>
						<?php if($about['image'] != '') {?>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/about/<?php echo $about['image'];?>" width="100px" height="100px">
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
                
			<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="icon">Icon </label>
						<input type='file' class="form-control" id="icon" name="icon"/>
						<?php if($about['icon'] != '') {?>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/about/<?php echo $about['icon'];?>" width="100px" height="100px">
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<!--<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="section_con">Content For</label>
						<select name="section_con" id="section_con" class="form-control">
							<option value=""> --- Select Content --- </option>
							<option value="section_1"<?php echo $about['section'] == 'section_1' ?'selected':'';?> >First content</option>
							<option value="section_2" <?php echo $about['section'] == 'section_2' ?'selected':'';?> >Second content</option>
							<option value="section_3" <?php echo $about['section'] == 'section_3' ?'selected':'';?> >Third content</option>
							<option value="section_4" <?php echo $about['section'] == 'section_4' ?'selected':'';?> >fourth content</option>
							<option value="section_5" <?php echo $about['section'] == 'section_5' ?'selected':'';?>>Fifth content</option>
							<option value="section_6" <?php echo $about['section'] == 'section_6' ?'selected':'';?> >Sixth content</option>
							<option value="section_7" <?php echo $about['section'] == 'section_7' ?'selected':'';?>>Community Banner</option>
							
						</select>
					</div>
				</div>-->
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled> --- Select Status --- </option>
							<option value="1" <?php echo $about['status'] ==1 ?'selected':'';?>>Active</option>
							<option value="0" <?php echo $about['status'] ==0 ?'selected':'';?>>Inactive</option>
						</select>
					</div>
				</div>
				
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Update Content">
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
				    title: 'required',
					browsertitle: 'required',
				    section_con: 'required',
				  
		  		},
			  	messages: {
				    title: 'This field is required',
					browsertitle: 'This field is required',
				    section_con: 'This field is required',
				   
				},
			});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'description',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	
</script>
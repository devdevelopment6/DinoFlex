
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Video Slides</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_home/upload_video" name="home_content" enctype="multipart/form-data">
		    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="video_name">Video Name</label>
						<input type="text" id="video_name" name = "video_name" value="" placeholder="Video Name" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="banner_image">Banner Image</label>
						<input type='file' class="form-control" id="banner_image" name="banner_image"/>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="link">Link</label>
						<input type="text" id="link" name = "link" value="" placeholder="Video Link" class="form-control" />
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="image">Image</label>
						<input type='file' class="form-control" id="image" name="image"/>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="product">Select Product </label>
								<select name="product" id="product" class="form-control">
									<option value=""> --- Select Product --- </option>
									<?php foreach($products as $product)  { ?>
										<option value="<?php echo $product['id']; ?>"> <?php echo $product['product_name']; ?> </option>
									<?php } ?>
								</select>
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
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Add Video">
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
				   
				    link: 'required',
				    banner_image: 'required',
				    status: 'required',
				    product: 'required',
		  		},
			  	messages: {
				  
				    link: 'This field is required',
				    banner_image: 'This field is required',
				    status: 'This field is required',
				   product: 'Please Select Product',
				},
			});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	
</script>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Home Slide Images</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_home/update_slider" name="home_content" enctype="multipart/form-data">
			<div class="box-body">
				<input type="hidden" id="slide_id" name = "slide_id" value="<?php echo $slide['id'];?>"/>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="slide_image">Slide Image </label>
						<input type='file' class="form-control" id="slide_image" name="slide_image"/>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/home_slide/thumbs/<?php echo $slide['image'];?>" width="100px" height="100px">
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name = "title" value="<?php echo $slide['title'];?>" placeholder="Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="content">Content </label>
						<textarea class="form-control" id="content" name="content"><?php echo $slide['content'];?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="form-group">
								<label for="product">Select Product </label>
								<select name="product" id="product" class="form-control">
									<option value=""> --- Select Product --- </option>
									<?php foreach($products as $product)  { ?>
										<option value="<?php echo $product['id']; ?>" <?php echo $slide['product_id'] == $product['id']?'selected':'';?>> <?php echo $product['product_name']; ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
				
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled> --- Select Status --- </option>
							<option value="1" <?php echo $slide['status'] == 1?'selected':'';?>>Active</option>
							<option value="0" <?php echo $slide['status'] == 0?'selected':'';?>>Inactive</option>
						</select>
					</div>
				</div>
				
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Update Home Slide">
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
				    content: 'required',
				    status: 'required',
					product: 'required',
				   
		  		},
			  	messages: {
				    
				    title: 'Please Enter Title',
				    content: 'Please Enter Content',
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
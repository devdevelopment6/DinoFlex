
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Blog List</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_blog/update_list" name="home_content" enctype="multipart/form-data">
		    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="box-body">
				<input type="hidden" id="list_id" name = "list_id" value="<?php echo $list['id'];?>" />
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="banner_image">Image </label>
						<input type='file' class="form-control" id="image" name="image"/>
						<?php if($list['image'] != '') {?>
						<div class="col-md-12">
							<div class="col-md-2">
								<img class="slider_image" src="<?php echo base_url();?>uploads/blog/thumbs/<?php echo $list['image'];?>" width="100px" height="100px">
							</div>
						</div>
						<?php } ?>
						
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name = "title" value="<?php echo $list['title'];?>" placeholder="Title" class="form-control" />
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="browsertitle">Browser Title</label>
						<input type="text" id="browsertitle" name = "browsertitle" value="<?php echo $list['browsertitle'];?>" placeholder="Browser Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="meta_description">Meta Description</label>
						
					  <textarea type="text" name="meta_description" id="meta_description" class="form-control" /><?php echo $list['meta_description'];?></textarea>
					</div>
				</div>

				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="title">Slug</label>
						<input type="text" id="slug" name = "slug" value="<?php echo $list['slug'];?>" placeholder="Slug" class="form-control" />
					</div>
				</div>

				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="description"> Description </label>
						<textarea class="form-control" id="description" name="description"><?php echo $list['description'];?></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="Create_by">Publish By</label>
						<input type="text" id="Create_by" name = "Create_by" value="<?php echo $list['Create_by'];?>" placeholder="Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="date">Publisher Date</label>
						<input type="text" id="date" name = "date" value="<?php echo $list['date'];?>" placeholder="Date" class="form-control" />
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled> --- Select Status --- </option>
							<option value="1" <?php echo $list['status'] == 1?'selected':'';?>>Active</option>
							<option value="0" <?php echo $list['status'] == 0?'selected':'';?>>Inactive</option>
						</select>
					</div>
				</div>
				
				
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Update Blog List">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		 $('#date').datepicker({
           todayBtn: "linked",
            format: 'yyyy-mm-dd'          
        });
			$('#home_content').validate({
		  		rules: {
					
				    title: 'required',
					browsertitle:  'required',
				    description: 'required',
					 Create_by: 'required',
				   
		  		},
			  	messages: {
				    title: 'This field is required',
					browsertitle: 'This field is required',
				    description: 'This field is required',
				  
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
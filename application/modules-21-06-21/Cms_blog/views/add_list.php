
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Blog List</h3>
            </div>
		<form role="form" method="post" id="home_content" action="<?php echo base_url(); ?>Cms_blog/create_list" name="home_content" enctype="multipart/form-data">
		    <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="banner_image">Image </label>
						<input type='file' class="form-control" id="image" name="image"/>
						
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name = "title" value="" placeholder="Title" class="form-control" />
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="browsertitle">Browser Title</label>
						<input type="text" id="browsertitle" name = "browsertitle" value="" placeholder="Browser Title" class="form-control" />
					</div>
				</div>

<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
					  <label for="meta_description">Meta Description</label>
					  <textarea type="text" name="meta_description" id="meta_description" class="form-control" /></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="title">Url Slug</label>
						<input type="text" id="slug" name = "slug" value="" placeholder="Slug" class="form-control" />
					</div>
				</div>

				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="description"> Description </label>
						<textarea class="form-control" id="description" name="description" value="" placeholder="Top Content"></textarea>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="Create_by">Publish By</label>
						<input type="text" id="Create_by" name = "Create_by" value="" placeholder="Title" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="date">Publisher Date</label>
						<input type="text" id="date" name = "date" value="" placeholder="Date" class="form-control" />
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
					<input type="submit" class="btn btn-success btn-sm" name="Add Home Content" id="Add Home Content" value="Add Blog List">
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
					 image: 'required',
				    title: 'required',
					browsertitle: 'required',
				     slug: 'required',
				    description: 'required',
					 Create_by: 'required',
					date: 'required',
		  		},
			  	messages: {
				    title: 'This field is required',
					browsertitle: 'This field is required',
				    slug: 'This field is required',
				    description: 'This field is required',
					Create_by: 'This field is required',
					date: 'This field is required',
				  
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
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_content_frm" name="add_content_frm" method="post" action="<?php echo base_url().'cms_product_category/save_product_category'; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">

               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="title">Name</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="category_name" id="category_name" value="" class="form-control" placeholder="Title"/>
							</div>
						</div>
					</div>
				</div>
				  
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="browsertitle">Browser Title</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="browsertitle" id="browsertitle" value="" class="form-control" placeholder="Browser Title"/>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="title">Url Slug</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" name="slugs" id="slugs" value="" class="form-control" placeholder="Slug"/>
							</div>
						</div>
					</div>
				</div>
                
                <?php /*?>  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="banner_image">Banner Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="banner_image" id="banner_image" class="form-control">
							</div>
						</div>
					</div>
				</div><?php */?>
                
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="description">Description</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="title">Display Order</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="number" min="0" max="15" name="display_order" id="display_order" value="" class="form-control" placeholder="Display Order"/>
							</div>
						</div>
					</div>
				</div>

				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label for="plan_active">Status </label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								 <select class="col-sm-4 form-control" name="status" id="status" required>
                                        <option value="">Select Status</option>
                                        <option  value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
							</div>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Add Category">
					<input type="reset" value="Cancel" class="btn btn-danger" />
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
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'description',{
		toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_content_frm").validate({
			ignore: [],
            rules:{
					category_name:{
						required:true	
					},
					browsertitle:{
						required:true	
					},
					display_order:{
                    	required:true,
                	},
                	slugs:{
                    	required:true,
                	},
					status: {
						required:true
					},
            },
            messages:{
				category_name:{
                    required:"Product Category is Required!!",
                },
				browsertitle:{
					required:"Browser Title is Required!!",
				},
                display_order:{
                    required:"Display Order is required!!",
                },
                slugs:{
                    	required:"Url Slug is required!!",
                	},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
    });
</script>
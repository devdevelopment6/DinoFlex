<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_product_frm" name="add_product_frm" method="post" action="<?php echo base_url().'cms_resources_page/update_industry_content/'.$contents['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">

                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Title</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
                                <textarea name="title" id="title" class="form-control" placeholder="Title"><?php echo $contents['title'];?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_content">Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="content" id="content" class="form-control" placeholder="Description"><?php echo $contents['content'];?></textarea>
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
                                        <option  value="1" <?php if($contents['status']=="1"){echo "selected";}?>>Active</option>
                                        <option value="0" <?php if($contents['status']=="0"){echo "selected";}?>>Inactive</option>
                                 </select>
							</div>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Update Content">
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
var editor = CKEDITOR.replace( 'content',{
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

var editor = CKEDITOR.replace( 'title',{
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
        $("#add_product_frm").validate({
			ignore: [],
            rules:{
				  content:{
					 required: function(textarea) {
							   CKEDITOR.instances[textarea.id].updateElement();
							   var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
							   return editorcontent.length === 0;
							 }
					},
					title:{
						required:true	
					},
					/*header_content:{
						required:true	
					},*/
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				/*training_content:{
                    required:"Header Content is Required!!",
                },*/
					title:{
						required:"Title is Required!!",	
					},
					content:{
						required:"Content is Required!!",	
					},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
    });
</script>
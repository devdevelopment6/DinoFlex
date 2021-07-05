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
            <form  id="add_product_frm" name="add_product_frm" method="post" action="<?php echo base_url().'cms_resources_page/save_content'; ?>" enctype="multipart/form-data">
              <div class="box-body">
               
                  <div class="col-md-12 col-sm-12 col-xs-12">
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
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_title">Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="header_title" id="header_title" value="" class="form-control" placeholder="Title"/>
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
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="browsertitle" id="browsertitle" value="" class="form-control" placeholder="Browser Title"/>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="header_content">Header Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="header_content" id="header_content" class="form-control" placeholder="Description"></textarea>
							</div>
						</div>
					</div>
				</div>
                
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="training_content">Training Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="training_content" id="training_content" class="form-control" placeholder="Training Content"></textarea>
							</div>
						</div>
					</div>
				</div>
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="video_link_3">Published Article 1</label>
							</div>
                            <input type="hidden" name="download_docs[]" id="download_docs_1" value="1" />
							<div class="col-md-3 col-sm-6 col-xs-6">
                                <input type="text" name="download_title_1" id="download_title_1" value="" class="form-control" placeholder="Title"/>
							</div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                               <input type="file" name="download_1" id="download_1" data-imgid="1" class="form-control">
							</div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                               <button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="2"><i class="fa fa-plus"></i> Add More</button> 
							</div>
						</div>
                        <div id="add_more_downloads"></div>
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
                	<input type="submit" class="btn btn-primary submit_button" value="Add Content">
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
var editor = CKEDITOR.replace( 'training_content',{
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

var editor = CKEDITOR.replace( 'header_content',{
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
				/*training_content:{

					 required: function(textarea) {
							   CKEDITOR.instances[textarea.id].updateElement();
							   var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
							   return editorcontent.length === 0;
							 }
					},*/
					header_title:{
						required:true	
					},
					browsertitle:{
						required:true	
					},
					header_content:{
						required:true	
					},
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				/*training_content:{
                    required:"Header Content is Required!!",
                },*/
				header_title:{
						required:"Title is Required!!",	
					},
				browsertitle:{
						required:"Browser Title is Required!!",	
					},
					header_content:{
						required:"Header Content is Required!!",	
					},
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
		$(document).on('click', '.delete_row', function() {
			var id = $(this).data('id');
			$('.row_'+id).remove();
		});
    });
	
	function add_more_data(){
		var id = $("#add_more_btn").attr("data-id");
		
		$("#add_more_downloads").append('<input type="hidden" name="download_docs[]" id="download_docs_'+ id +'"" value="'+ id +'"" /><div class="row row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="video_link_3">Published Article '+ id +'</label></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="text" name="download_title_'+ id +'" id="download_title_'+ id +'" value="" class="form-control" placeholder="Title"></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="download_'+ id +'" id="download_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div id="add_more_downloads"></div><div class="col-md-3 col-sm-6 col-xs-6"><div class="delete_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span style="cursor:pointer;"><i class="fa fa-trash"></i></span></div></div></div></div>');		
		$("#add_more_btn").attr("data-id", parseInt(id)+1);
	}
</script>
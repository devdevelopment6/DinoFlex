<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Application</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_application_frm" name="add_application_frm" method="post" action="<?php echo base_url().'cms_products/update_application/'.$content['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
               
               <input type="hidden" name="application_id" id="application_id" value="<?php echo $content['id']; ?>" />
               
                 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="image">Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="image" id="image" class="form-control">
                                <div class="col-md-12"> 
                                    <?php 	
                                            $display = $content['image'];	
                                            if($display != "")
                                            {
                                                if($display == "Image.jpg")
                                                {
                                            ?>
                                        <div class="col-md-2">
                                            <img class="product_img_banner" src="<?php echo base_url();?>assets/images/Image.jpg" width="170px" height="140px" />
                                        </div>
                                        <?php 
                                                }
                                                else
                                                {
                                        ?>
                                        <div class="col-md-2">
                                            <span class="closing_banner">X</span>
                                            <img class="custom_design_logo" src="<?php echo base_url();?>uploads/best_application_images/<?=$display; ?>" width="100px" height="100px" />
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
        
                                   </div> <br>
							</div>
						</div>
					</div>
				</div>
                
               <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="content">Content</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<textarea name="content" id="content" class="form-control" placeholder="Description"><?php echo $content['content'];?></textarea>
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
                                        <option  value="1" <?php if($content['status']=="1"){echo "selected";}?>>Active</option>
                                        <option value="0" <?php if($content['status']=="0"){echo "selected";}?>>Inactive</option>
                                    </select>
							</div>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary submit_button" value="Edit Application">
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
</script>	

<script type="text/javascript">
    $(document).ready(function(){
        $("#add_application_frm").validate({
			ignore: [],
            rules:{
				content:{
					 required: function(textarea) {
							   CKEDITOR.instances[textarea.id].updateElement();
							   var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
							   return editorcontent.length === 0;
							 }
					},
					status: {																																																					 						required:true																																																									 					}
            },
            messages:{
				content:{
                    required:"Content is Required!!",
                },
				status:	{
	   				required:"Status is required."
		 		},
            },
        });
		
		$(".closing_banner").on("click",function(){ 
			var id  =   $("#application_id").val();
			$.confirm({
						title: 'Confirm!',
						content: 'Are you sure you want to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url":"<?php echo base_url();?>cms_products/delete_application_image",
									"type":"POST",
									"data":{
										id :id,
									},
									success:function(data){
										$('.custom_design_logo').css("display","none");
										$('.closing_banner').css("display","none");
									}
								});	
							},
							cancel: function () {
							},
						}
					});
		});
		
    });
</script>
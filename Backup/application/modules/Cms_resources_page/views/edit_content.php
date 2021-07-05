<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="add_product_frm" name="add_product_frm" method="post" action="<?php echo base_url().'cms_resources_page/update_content/'.$content['id']; ?>" enctype="multipart/form-data">
                <input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="box-body">
               
               <input type="hidden" name="content_id" id="content_id" value="<?php echo $content['id'];?>" />
                  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">	
								 <label for="banner_image">Banner Image</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="file" name="banner_image" id="banner_image" class="form-control">
                                <div class="col-md-12"> 
								<?php 	
                                        $display = $content['banner_image'];	
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
                                        <img class="custom_design_logo" src="<?php echo base_url();?>uploads/resources_banner_images/<?=$display; ?>" width="100px" height="100px" />
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
								 <label for="header_title">Title</label>
							</div>
							<div class="col-md-4 col-sm-8 col-xs-8">
                                <input type="text" name="header_title" id="header_title" value="<?php echo  $content['header_title']; ?>" class="form-control" placeholder="Title"/>
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
                                <input type="text" name="browsertitle" id="browsertitle" value="<?php echo  $content['browsertitle']; ?>" class="form-control" placeholder="Browser Title"/>
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
								<textarea name="header_content" id="header_content" class="form-control" placeholder="Description"><?php echo  $content['header_content']; ?></textarea>
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
								<textarea name="training_content" id="training_content" class="form-control" placeholder="Training Content"><?php echo  $content['training_content']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
                
                
                <?php if($articles != '') {
					$i = 1;
					foreach($articles as $download) { ?>
			
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row row_<?php echo $download['id'];?>">
                                    <div class="col-md-3 col-sm-3 col-xs-3">	
                                         <label for="video_link_3">Published Article <?php echo $i;?></label>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <input type="hidden" name="download_docs[]" id="download_extra_<?php echo $i;?>" value="<?php echo $i;?>" /> 
                                        
                                        <input type="text" name="download_title_<?php echo $i;?>" id="download_title_<?php echo $i;?>" value="<?php echo $download['title'];?>" class="form-control" placeholder="Title" title="<?php echo $download['title'];?>"/>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <a href="<?php echo base_url();?>uploads/published_artices_documents/<?php echo $download['document']; ?>" target="_blank" ><?php echo $download['document'];?></a>
                                       <input type="hidden" name="download_<?php echo $i;?>" id="download_<?php echo $i;?>" value="<?php echo $download['document'];?>"/>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <button type="button" name="remove_btn" id="remove_btn" class="remove_document" data-id="<?php echo $download['id'];?>"><i class="fa fa-close" style="color:red;"></i> Remove</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
            
            	<?php $i++; } ?>
                
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-3">	
                                         <label for="download_title">Published Article <?php echo $i;?></label>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <input type="hidden" name="download_docs[]" id="download_extra_<?php echo $i;?>" value="<?php echo $i;?>" />
                                        <input type="text" name="download_title_<?php echo $i;?>" id="download_title_<?php echo $i;?>" value="" class="form-control" placeholder="Title" title="<?php echo $download['title'];?>"/>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <input type="file" name="download_<?php echo $i;?>" id="download_<?php echo $i;?>" data-imgid="<?php echo $i;?>" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                       <button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="<?php echo $i+1;?>"><i class="fa fa-plus"></i> Add More</button> 
                                    </div>
                                </div>
                                <div id="add_more_downloads"></div>
                            </div>
                        </div>
				
               <?php 	}  else { ?>
                
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
				 <?php } ?>
                 
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
		
			$(".closing_banner").on("click",function(){ 
				var id  =   $("#content_id").val();
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure you want to delete this image??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url":"<?php echo base_url();?>cms_resources_page/delete_resource_banner_image",
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
			
			$(document).on('click', '.remove_document', function() {
				var id = $(this).data('id');
				$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_resources_page/delete_resources_document',
									"method": 'POST',
									"data":{'id':id,},
									success:function(res){
										console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
			});
			
    });
	
	function add_more_data(){
		var id = $("#add_more_btn").attr("data-id");
		
		$("#add_more_downloads").append('<input type="hidden" name="download_docs[]" id="download_docs_'+ id +'"" value="'+ id +'"" /><div class="row row_'+ id +'"><div class="col-md-3 col-sm-3 col-xs-3"><label for="video_link_3">Published Article '+ id +'</label></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="text" name="download_title_'+ id +'" id="download_title_'+ id +'" value="" class="form-control" placeholder="Title"></div><div class="col-md-3 col-sm-6 col-xs-6"><input type="file" name="download_'+ id +'" id="download_'+ id +'" data-imgid="'+ id +'" class="form-control"></div><div id="add_more_downloads"></div><div class="col-md-3 col-sm-6 col-xs-6"><div class="delete_row form-control" data-id="'+ id +'" style="border:none;color:red;"><span style="cursor:pointer;"><i class="fa fa-trash"></i></span></div></div></div></div>');		
		$("#add_more_btn").attr("data-id", parseInt(id)+1);
	}
</script>